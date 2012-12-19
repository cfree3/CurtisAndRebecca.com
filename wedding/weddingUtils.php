<?php
/*
 * CurtisAndRebecca.com
 * wedding/weddingUtils.php
 * Copyright 2009 Curtis Free and Rebecca Drake. All rights reserved.
 */

    # Environment
    putenv("TZ=US/Eastern"); // set the local timezone

    # Global

    /* Colors */
    $colors = array();
    $colors['Canary']     = "#FCF3CA";
    $colors['Clover']     = "#619A6C";
    $colors['Cornflower'] = "#46A5DF";

    # Functions

    /**
     * Returns the hex color code for a (pseudo)randomly-chosen color.
     */
    function getRandomColor() {
        global $colors;
        // return a randomly-chosen color code
        return $colors[array_rand($colors)];
    }

    /**
     * Returns the number of days remaining until Our Wedding!
     */
    function getDaysUntil() {

        // obtain a timestamp for the Wedding Date
        $wedding_date_tstamp = strtotime("2010-08-21");

        // calcualte the number of seconds until Our Wedding
        $seconds_until = $wedding_date_tstamp - time();

        // determine the number of days (rounded up) until Our Wedding
        $days_until = ceil($seconds_until / 86400); // number of secs in a day

        return $days_until;
    }

?>
