<?php
/*
 * CurtisAndRebecca.com
 * dynamicContent.php
 * Copyright 2007-2008 Curtis Free and Rebecca Drake. All rights reserved.
 */

# Includes
include 'utils.php';

# Global
putenv("TZ=US/Eastern"); // set the local timezone

# Functions

/**
 * This function is used to generate a random image each time
 * the page is loaded.
 */
function getRandomImage() {

    // this is the subdirectory that contains the images
    $imgDir = 'images/';

    /*
     * The array $imgs will contain various image locations. Using the
     * scandir(...) function will automatically read the files inside
     * the image-containing directory.
     */
    $imgs[] = scandir($imgDir);

    /*
     * echo the location of a randomly-chosen image. We specify that
     * the random image index must be at least 2, for the array of
     * image directory contents contains "." and ".." entries at
     * at indices 0 and 1, respectively.
     */
    echo ($imgDir . $imgs[0][mt_rand(2, (count($imgs[0]) - 1))]);
}

/**
 * This function is used to calculate the number of days that have
 * elapsed since we became "Us."
 */
function getUsTimeStr() {

    // get the current time
    $current = time();

    // calculate the number of days to display
    $days = intval(date("j", $current)) - 11; // 11 --> 11th day
    // keep track of the original value
    $origDays = $days;

    // if before the 11th (negative days)...
    if ($days < 0) {
        // retrieve the length (in days) of the current month
        $currentMonth = intval(date("n", $current));
        $monthLength = intval(date("j", mktime(0, 0, 0, $currentMonth, 0)));

        // calculate the portion of a month (in days)
        $days += $monthLength;
    }

    // calculate the number of months to display
    $months = intval(date("n", $current)) - 2; // 2 --> February
    // keep track of the original value
    $origMonths = $months;

    // if before February, calculate the portion of a year (in months)
    if ($months < 0) {
        $months += 12;
    }

    // subtract a month if the original day calculation was negative
    if ($origDays < 0) {
        $months -= 1;
    }

    // calculate the number of years to display
    $years = intval(date("Y", $current)) - 2005;

    // subtract a year if the original month calculation was negative
    if ($origMonths < 0) {
        $years -= 1;
    }

    // echo the duration as a properly-formatted stringOA
    echo buildDurationString($years, $months, $days);
}

?>

