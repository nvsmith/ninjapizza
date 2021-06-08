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
