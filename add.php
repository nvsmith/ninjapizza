<?php

  include('config/db_connect.php');

  $email = $title = $ingredients = '';
  $errors = array('email' => '', 'title' => '', 'ingredients' => '');

  if (isset($_POST['submit'])) {
    // email check
    if (empty($_POST['email'])) {
      $errors['email'] = 'An email is required';
    } else {
      // check test with XSS attack protection.
      // echo htmlspecialchars($_POST['email']) . '<br />';
      $email = $_POST['email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'You must include a valid email address';
      }
    }

    // title check
    if (empty($_POST['title'])) {
      $errors['title'] = 'A title is required';
    } else {
      // check test with XSS attack protection.
      // echo htmlspecialchars($_POST['title']) . '<br />';
      $title = $_POST['title'];
      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'You must include a valid title with letters and spaces only';
      }
    }

    // ingredients check
    if (empty($_POST['ingredients'])) {
      $errors['ingredients'] = 'At least one ingredient is required';
    } else {
      // check test with XSS attack protection.
      // echo htmlspecialchars($_POST['ingredients']) . '<br />';
      $ingredients = $_POST['ingredients'];
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors['ingredients'] = 'Ingredients must be a comma separated list';
      }
    }

    // check for submission errors on form
    if (array_filter($errors)) {
      // echo 'There are form errors';
    } else {

      // secure data being saved to the database
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

      // create SQL
      // INSERT INTO table_name(colum1, column2, etc)
      // VALUES('variable1, variable2, etc')
      $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

      // save to DB and check
      if (mysqli_query($conn, $sql)) {
        // success
        header('Location: index.php');
      } else {
        // error
        echo 'query error: ' . mysqli_error($conn);
      }
    }

  } //end POST isset check

?>

<!DOCTYPE html>
<html>
  <?php include ('templates/header.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form class="white" action="add.php" method="POST">
      <label>Your Email:</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
      <div class="red-text"><?php echo htmlspecialchars($errors['email']); ?></div>

      <label>Pizza Title:</label>
      <input type="text" name="title" value="<?php echo $title; ?>">
      <div class="red-text"><?php echo htmlspecialchars($errors['title']); ?></div>

      <label>Ingredients (comma separated):</label>
      <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
      <div class="red-text"><?php echo htmlspecialchars($errors['ingredients']); ?></div>

      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>


  <?php include ('templates/footer.php'); ?>
</html>
