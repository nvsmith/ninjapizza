<?php

  // Use ternary operator in HTML
  // to replace if/else statement with single line of code.
  $score = 50;

  // if ($score > 40) {
  //   echo 'high score';
  // } else {
  //   echo 'low score';
  // }
  //
  // $val = $score > 40 ? 'high score' : 'low score';
  // echo $val;

  // superglobal variables
  echo $_SERVER['SERVER_NAME'] . '<br />';
  echo $_SERVER['REQUEST_METHOD'] . '<br />';
  echo $_SERVER['SCRIPT_FILENAME'] . '<br />';
  echo $_SERVER['PHP_SELF'] . '<br />';




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Tutorial</title>
  </head>
  <body>
    <?php echo $score > 40 ? 'high score' : 'low score'; ?>
  </body>
</html>
