<?php
  // connect to database
  include 'config/db_connect.php';

  // check if submit button (to delete the pizza) has been clicked
  if (isset($_POST['delete'])) {

    // store Delete Form input to variable
    //escape potentially sensitive character submissions
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    // sql: DELETE FROM table_name WHERE id = input from Delete Form
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    // redirect if user clicks submit button to delete their pizza
    if (mysqli_query($conn, $sql)) {
      // success
      header('Location: index.php');
    } else {
      // failure
      echo 'query error: ' . mysqli_error($conn);
    }


  }

  // check GET request ID parameter
  if (isset($_GET['id'])) {
    // escape potentially sensitive character submissions
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // sql: SELECT all_fields (*) FROM table_name
    // WHERE query is only for an individual row
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in an associative array
    $pizza = mysqli_fetch_assoc($result);

    // Free query's result from memory
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($conn);


  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('templates/header.php'); ?>

<div class="container center">
  <?php if($pizza): ?>
    <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
    <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
    <p><?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

    <!-- Delete Form -->
    <form action="details.php" method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
      <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

  <?php else: ?>
    <h5>No such pizza exists</h5>

  <?php endif; ?>
</div>


<?php include('templates/footer.php'); ?>

</html>
