<?php
/*
 * CurtisAndRebecca.com
 * utils.php
 * Copyright 2008 Curtis Free and Rebecca Drake. All rights reserved.
 */

# Functions

/**
 * This function is used to build a string that gives a duration
 * in years, months, and days.
 *
 * $years:  This is the number of years.
 * $months: This is the number of months.
 * $days:   This is the number of days.
 */
function buildDurationString($years, $months, $days) {

    // this string will be used to build the date
    $dateStr = "";

    // if there are any years to list...
    if ($years > 0) {

        // add the years to the string
        $dateStr = $dateStr . ($years . " year");

        // take care of the plural "years" (if needed)
        if ($years > 1) {
            $dateStr = $dateStr . "s";
        }
    }

    // if there are any months to list...
    if ($months > 0) {

        // if any text currently exists, use appropriate grammar
        if ($dateStr != "") {
            if (($years > 0) and ($days > 0)) {
                $dateStr = $dateStr .  ", ";
            } else {
                $dateStr = $dateStr . " and ";
            }
        }

        // add the months to the string
        $dateStr = $dateStr . ($months . " month");

        // take care of the plural "months" (if needed)
        if ($months > 1) {
            $dateStr = $dateStr . "s";
         }
    }

    // if there are any days to list...
    if ($days > 0) {

        // if any text currently exists, use appropriate grammar
        if ($dateStr != "") {
            if (($years > 0) and ($months > 0)) {
                $dateStr = $dateStr . ", and ";
            } else {
                $dateStr = $dateStr . " and ";
            }
        }

        // add the days to the string
        $dateStr = $dateStr .  ($days . " day");

        // take care of the plural "days" (if needed)
        if ($days > 1) {
            $dateStr = $dateStr . "s";
        }
    }

    // return the string
    return $dateStr;
}

?>

