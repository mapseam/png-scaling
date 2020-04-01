<?php
  // the file name
  $srcFileName = 'image.png';

  // type of content
  header('Content-Type: image/png');

  function pngResize($srcFN, $trgWidth = 0, $trgHeight = 0): bool 
  {
    if (($trgWidth < 0) || ($trgHeight < 0)) 
    {
      echo "Invalid input parameters!";
      return false;
    }

    // get the size of the input image
    list($srcHeight, $srcHeight) = getimagesize($srcFN); 

    // сalculate the height of the target image if height is not set
    if (0 === $trgHeight) 
      $trgHeight = $trgWidth / ($srcWidth / $srcHeight);

    // Calculate the width of the target image if width is not set
    if (0 === $trgWidth) 
      $trgWidth = $trgHeight / ($srcHeight / $srcWidth);

    // сreate a handle to the source image
    $srcHandle = imagecreatefrompng($srcFN);
   
    // сreate a handle to the target image
    $trgHandle = imagecreatetruecolor($trgWidth, $trgHeight);

    // transfer the image from the source to the target, scaling it
    $result = imagecopyresized($trgHandle, $srcHandle, 0, 0, 0, 0, $trgWidth, $trgHeight, $srcWidth, $srcHeight);
  
    return $result and imagepng($trgHandle);
  }

  // function call
  pngResize($srcFileName, 200, 100);
?>