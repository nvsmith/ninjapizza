<?php

  // file system - part 1

  // // Read a file
  // $quotes = readfile('readme.txt');
  // echo $quotes;

  $file = 'readme.txt';

  if (file_exists($file)) {
    // output file to browser if it exists
    echo readfile($file) . '<br />';

    // copy file (source, destination)
    copy($file, 'quotes.txt');

    // absolute path
    echo realpath($file) . '<br />';

    // output file size
    echo filesize($file) . '<br />';

    // rename file (source, new-name)
    rename($file, 'test.txt');

  } else {
    // file doesn't exist
    echo 'File does not exist';
  }

  // make directory
  mkdir('quotes');



?>
