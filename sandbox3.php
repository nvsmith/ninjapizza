<?php

  // File System - Part 2

  $file = 'quotes.txt';

  // opening a file for reading only ('r')
  // opening a file for reading & writing at the pointer ('r+')
  // opening a file for reading & writing, appended at the end ('a+')
  // $variable = fopen(source, 'code')
  $handle = fopen($file, 'a+');

  // read the file (source, number of bytes to read)
  echo fread($handle, filesize($file) - 50);

  // read a single line: fgets (s for single line)
  echo fgets($handle);

  // read a single character: fgetc (c for character)
  echo fgetc($handle);

  // writing to a file
  fwrite($handle, "\nEverything in its right place.")

  // close the file
  // fclose($handle);

  // delete the file
  // unlink($file);



?>
