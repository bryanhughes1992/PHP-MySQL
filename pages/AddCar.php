<?php
require_once '../models/DataBase.php';
require_once '../models/Cars.php';

if(isset($_POST['addCar'])) {
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];

  $db = DataBase::getDB();
  $dbCar = new Cars();
  $clientCar = $dbCar->addCar($make, $model, $year, $db);

  if($clientCar) {
    header('Location: ListCar.php');
  } else {
    echo "ERROR";
  }
}
?>

<html lang="en">
  <head>
      <title>Car Management System - ADD</title>
      <meta name="description" content="Car Management System">
      <meta name="keywords" content="Student, PHP, SQL, Car">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="CSS/style.css" type="text/css">
  </head>
  <body>
    <div>
        <form action="" method="post">
          <fieldset>

            <div class="form-group">
                <label for="make">Make :</label>
                <input type="text" class="form-control" name="make" id="make" value="" placeholder="Enter car make">
                <span style="color: red"></span>
            </div>

            <div class="form-group">
                <label for="model">Model :</label>
                <input type="text" class="form-control" id="model" name="model" value="" placeholder="Enter model">
                <span style="color: red"></span>
            </div>

            <div class="form-group">
                <label for="program">Year :</label>
                <input type="number" name="year" value="" class="form-control" id="year" placeholder="Enter year">
                <span style="color: red"></span>
            </div>
            <a href="./list-car.php" id="btn_back" class="btn btn-success float-left">Back</a>
            <button type="submit" name="addCar" class="btn btn-primary float-right" id="btn-submit">Add Car</button>
          </fieldset>
        </form>
    </div>
  </body>
</html>
