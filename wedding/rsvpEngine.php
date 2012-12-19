<?php
/*
 * rsvpEngine.php
 * wedding/rsvpEngine.php
 * Copyright 2009 Curtis Free and Rebecca Drake. All rights reserved.
 */

    require('dbConnect.php');

    // ensure that all required parameters are provided
    if (!(isset($_REQUEST['code']) && isset($_REQUEST['attending'])
          && isset($_REQUEST['guests']))) {

        // if something is missing, redirect to the error page
        header("Location: rsvp/oops");

    } else {

        // build a list of the parameters
        $params[] = sanitize_param($_REQUEST['code']);
        $params[] = sanitize_param($_REQUEST['attending']);
        $params[] = sanitize_param($_REQUEST['guests']);

        // ensure that the given code is valid
        $query = "select count(code) as code_count
                    from Code
                   where code not in ( select code from Response )
                     and code = " . sanitize_param($_REQUEST['code']);

        // run the query and extract the count
        $results = select_query($query);
        $count = $results[0]['code_count'];

        // if there are no matching valid codes, redirect to the error page
        if ($count == 0) {
            header("Location: rsvp/oops");

        // otherwise, add the RSVP info and redirect to the success page
        } else {
            proc_query("add_rsvp", $params);
            header("Location: rsvp/thanks");
        }
    }

?>
