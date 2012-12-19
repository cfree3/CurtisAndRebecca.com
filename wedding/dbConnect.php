<?php
/**
 * dbConnect.php
 * wedding/dbConnect.php
 * Copyright 2008 Curtis Free. All rights reserved.
 */

    /* Constant used to allow stored procedures to return resultsets. */
    define('CLIENT_MULTI_RESULTS', 131072);

    /* Database connection settings. */
    $db_server   = 'localhost';  // MySQL server
    $db_username = 'RSVPEngine'; // MySQL username
    $db_password = 'vooweeJ9';   // MySQL password
    $db_db       = 'RSVP';       // MySQL database

    /**
     * This function returns a connection to the database.
     *
     * $select_proc <-- (OPTIONAL) True if the connection will be used for a SELECT stored procedure.
     */
    function get_connection($select_proc=false) {

        // signal that the DB connection variables are global
        global $db_server, $db_username, $db_password, $db_db;

        // create a connection to MySQL
        if ($select_proc) {
            // ensure that the connection can handle multiple results (if SELECTing from within a stored procedure)
            $conn = mysql_connect($db_server, $db_username, $db_password, false, CLIENT_MULTI_RESULTS)
                    or die("Error connecting to DB:<br /><br />" . mysql_error());
        } else {
            $conn = mysql_connect($db_server, $db_username, $db_password, false)
                    or die("Error connecting to DB:<br /><br />" . mysql_error());
        }

        // select the proper database
        mysql_select_db($db_db, $conn);

        return $conn;
    }

    /**
     * This function runs the given select query and returns a multidimensional associative array
     * of results.
     *
     * $query <-- The SQL query to be run.
     */
    function select_query($query) {

        // attempt to run the query
        $query_result = mysql_query($query, get_connection(false));

        // die if an error occurred
        if (!$query_result) {
            die("Error running select query:<br /><br />" . mysql_error() . "<br /></br />" . $query);
        }

        // add each result row array to the $results array
        while ($result_arr = mysql_fetch_assoc($query_result)) {
            $results[] = $result_arr;
        }

        return $results;
    }

    /**
     * This function runs the given input query.
     *
     * $query <-- The SQL query to be run.
     */
    function input_query($query) {

        // attempt to run the query
        $query_result = mysql_query($query, get_connection(false));

        // die if an error occurred
        if (!$query_result) {
            die("Error running input query:<br /><br />" . mysql_error() . "<br /><br />" . $query);
        }
    }

    /**
     * This function runs the given stored procedure and returns a multidimensional associative
     * array of results.
     *
     * $proc <-- The name of the stored procedure to be run.
     * $args <-- (OPTIONAL) The arguments to the stored procedure.
     */
    function proc_query($proc, $args=null) {

        $query = "call " . $proc . "(";

        if ($args != null) {
            foreach ($args as $arg) {
                $query .= $arg . ", ";
            }
            $query = substr($query, 0, (strlen($query) - 2));
        }

        $query .= ")";

        // attempt to run the query
        $query_result = mysql_query($query, get_connection(true));

        // die if an error occurred
        if (!$query_result) {
            die("Error running stored procedure:<br /></br />" . mysql_error() . "<br /><br />" . $query);
        }

        // ensure that -- even if there are no results -- a valid array is returned
        $results = array();

        // add each result row array to the $results array
        //while ($result_arr = mysql_fetch_assoc($query_result)) {
            //$results[] = $result_arr;
        //}

        return $results;
    }

    /**
     * This function is used to determine if the given array of results is empty.
     *
     * $results <-- An array of results.
     */
    function contains_results($results) {
        return (count($results) > 0);
    }

    /**
     * This function sanitizes the given query parameter.
     *
     * $param <-- The parameter to be sanitized.
     */
    function sanitize_param($param) {

        // if magic quotes are being used, strip slashes
        if (get_magic_quotes_gpc()) {
            $param = stripslashes($param);
        }

        // return the sanitized form of the parameter
        return string_param(mysql_real_escape_string($param, get_connection()));
    }

    /**
     * This function converts the given query parameter into a valid string form for
     * use in a query (by surrouding it in quotation marks).
     *
     * $param <-- The parameter to be converted into string format.
     */
    function string_param($param) {
        return "\"" . $param . "\"";
    }

?>

