<?php

// set the local timezone
putenv("TZ=US/Eastern");

  /*
   * This function is used to generate a random image each time
   * the page is loaded.
   */
  function getRandomImage() {

    // this is the subdirectory that contains the images
    $imgDir = 'images/';

    /*
     * The array $imgs will contain various image locations. If addional
     * images are added, only a single line of new code will need to be
     * provided here. Note that indices need not be provided when new
     * items are added to the array.
     */
    $imgs[] = $imgDir . 'smiles.jpg';
    $imgs[] = $imgDir . 'seniorprom.jpg';
    $imgs[] = $imgDir . 'gtbanduniform.jpg';
    $imgs[] = $imgDir . 'cozumelcruise.jpg';
    $imgs[] = $imgDir . 'loveseat.jpg';
    $imgs[] = $imgDir . 'hands.jpg';
    $imgs[] = $imgDir . 'lounge.jpg';

    // echo the location of a randomly-chosen image
    echo $imgs[array_rand($imgs)];

  }

  /*
   * This function is used to calculate the number of days that have
   * elapsed since we became "Us."
   */
  function getDayCount() {

    // this is the number of seconds in a day
    $secsInDay = 86400;

    // calculate the integer value representing the current time
    $today = time();
    // calculate the integer value representing 11 February 2005.
    $usDate = strtotime('11 Feb 2005');

    // echo the total number of days (essentially truncating partial days)
    echo floor(($today - $usDate) / $secsInDay);

  }

?>

