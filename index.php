<?php
  // reference file to connect to database
  include ('config/db_connect.php');

  // Write sql (desired query) for all pizzas: 'SELECT column1, column2...FROM table_name'
  // Sort by time stamp: ORDER BY column
  $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

  // Make query & get its result using mysqli_query(database connection, desired query)
  $result = mysqli_query($conn, $sql);

  // Fetch the resulting rows as an array: mysqli_fetch_all(fetch what, return as associative array)
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Free query's result from memory
  mysqli_free_result($result);

  // Close the database connection
  mysqli_close($conn);

  // Check query fetch from database
  // print_r($pizzas);

  // Check: convert 1st pizza ingredients CSV into array: explode('separation mark', column)
  // print_r(explode(',' , $pizzas[0]['ingredients']));


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include 'templates/header.php'; ?>

  <h4 class="center grey-text">Pizzas</h4>

  <div class="container">
    <div class="row">
      <?php foreach ($pizzas as $pizza): ?>
        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6>
                <?php echo htmlspecialchars($pizza['title']); ?>
              </h6>

              <ul>
                <?php foreach (explode(',', $pizza['ingredients']) as $ingredient): ?>
                  <li><?php echo htmlspecialchars($ingredient); ?></li>
                <?php endforeach; ?> <!-- end explode ingredients array -->
              </ul>

            </div> <!-- end .card-content -->

            <div class="card-action right-align">
              <a href="#" class="brand-text">More Info</a>
            </div> <!-- end .card-action -->
          </div> <!-- end .card -->
        </div> <!-- end .col -->
      <?php endforeach; ?> <!-- end foreach pizzas loop -->
    </div>
  </div>

  <?php include 'templates/footer.php'; ?>
</html>
