<?php
require_once 'models/Database.php';
require_once 'models/Cars.php';

$make = $model = $year = "";

if (isset($_POST['updateCar'])) {


  $id = $_POST['id'];
  $db = Database::getDb();

  $dbCar = new Cars();
  $car = $dbCar->getCarById($id, $db);

  $make = $car->make;
  $model = $car->model;
  $year = $car->year;
}

if (isset($_POST['updateBtn'])) {
  $id = $_POST['id'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];

  $db = Database::getDb();
  $dbCar = new Cars();
  $count = $dbCar->updateCar($id, $make, $model, $year, $db);

  if ($count) {
    header('Location:  ListCar.php');
  } else {
    echo "ERROR";
  }
}
?>

<html lang="en">
  <head>
    <title>Car Management System</title>
    <meta name="description" content="Car Management System">
    <meta name="keywords" content="PHP, SQL">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
  </head>

  <body>
    <div>
      <form action="" method="post">

        <input type="hidden" name="id" value="<?= $id; ?>" />

        <div class="form-group">
          <label for="make">Make:</label>
          <input type="text" class="form-control" name="make" id="make" value="" placeholder="Enter car make">
          <span style="color: red"> </span>
        </div>

        <div class="form-group">
          <label for="model">Model:</label>
          <input type="text" class="form-control" id="model" name="model" value="" placeholder="Enter Model">
          <span style="color: red"> </span>
        </div>

        <div class="form-group">
          <label for="year">Year:</label>
          <input type="number" name="year" value="" class="form-control" id="year" placeholder="Enter year">
          <span style="color: red"> </span>
        </div>

        <a href="../ListCar.php" id="btn_back" class="btn btn-success float-left">Back</a>

        <button type="submit" name="updateBtn" class="btn btn-primary float-right" id="btn-submit">
          Update Car
        </button>
      </form>
    </div>
  </body>

</html