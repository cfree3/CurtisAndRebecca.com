<?php
/*
 * CurtisAndRebecca.com
 * wedding/weddingUtils.php
 * Copyright 2009 Curtis Free and Rebecca Drake. All rights reserved.
 */

    # Environment
    putenv("TZ=US/Eastern"); // set the local timezone

    # Global

    /**
     * Returns the number of days since Our Wedding!
     */
    function getDaysSince() {

        // obtain a timestamp for the Wedding Date
        $wedding_date_tstamp = strtotime("2009-12-19");

        // calculate the number of seconds since Our Wedding
        $seconds_since = time() - $wedding_date_tstamp;

        // determine the number of days (rounded down) since Our Wedding
        $days_since = floor($seconds_since / 86400); // number of secs in a day

        return $days_since;
    }

?>
