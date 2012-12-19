<?php

  /*
   * This function is used to generate a random image each time
   * the page is loaded.
   */   
  function getRandomImage() {

    /*
     * The array $imgs will contain various image locations. If addional
     * images are added, only a single line of new code will need to be
     * provided here. Note that indices need not be provided when new
     * items are added to the array.
     */   
    $imgs[] = 'images/smiles.jpg';
    $imgs[] = 'images/seniorprom.jpg';
    $imgs[] = 'images/gtbanduniform.jpg';

    // echo the location of a randomly-chosen image
    echo $imgs[array_rand($imgs)];
  
  }

?>
