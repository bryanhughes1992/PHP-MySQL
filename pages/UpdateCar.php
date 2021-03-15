<?php
require_once '../models/Cars.php';
require_once '../models/DataBase.php';

$make = $model = $year = "";

if (isset($_POST['updateCar'])) {
  $id = $_POST['id'];
  $db = DataBase::getDB();

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

  $db = DataBase::getDB();
  $dbCar = new Cars();
  $count = $dbCar->updateCar($id, $make, $model, $year, $db);

  if ($count) {
    header('Location:  ../index.php');
  } else {
    echo "ERROR";
  }
}
?>
<html lang="en">
  <head>
    <title>Update Car</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css" type="text/css">
  </head>
  <body>
    <div class="master-container">
      <form action="" method="post">
        <h2 class="title">Update</h2>
        <fieldset>
          <input type="hidden" name="id" value="<?= $id; ?>" />
          <div class="form-group">
            <label for="make">Make:</label>
            <input
              type="text"
              class="form-control"
              name="make"
              id="make"
              value="<?=$make?>"
              placeholder="Make"
            >
          </div>
          <div class="form-group">
            <label for="model">Model:</label>
            <input
              type="text"
              class="form-control"
              id="model"
              name="model"
              value="<?=$model?>"
              placeholder="Model">
          </div>
          <div class="form-group">
            <label for="year">Year:</label>
            <input
              type="number"
              name="year"
              value="<?=$year?>"
              class="form-control"
              id="year"
              placeholder="Year"
            >
          </div>
          <a href="../index.php" id="btn_back" class="btn btn-success float-left">Back</a>
          <button
            type="submit"
            name="updateBtn"
            class="btn btn-primary float-right"
            id="btn-submit"
          >
            Update Car
          </button>
        </fieldset>
      </form>
    </div>
  </body>
</html