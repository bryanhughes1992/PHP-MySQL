<?php
require_once 'models/DataBase.php';
require_once 'models/Cars.php';

$dbConn = DataBase::getDB();
$dbCars = new Cars();
$clientCars = $dbCars->getAllCars(DataBase::getDB());
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Bryan Hughes">
    <meta name="description" content="PHP and MySQL">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
  </head>

  <body>
    <p class="h1 text-center">PHP and MySQL</p>
    <div class="m-1">
      <table class="table table-bordered tbl">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Year</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cars as $car) { ?>
            <tr>
              <th><?= $car->id; ?></th>
              <td><?= $car->make; ?></td>
              <td><?= $car->model; ?></td>
              <td><?= $car->year; ?></td>
              <td>
                <form action="./UpdateCar.php" method="post">
                  <input type="hidden" name="id" value="<?= $car->id; ?>" />
                  <input type="submit" class="button btn btn-primary" name="updateCar" value="Update" />
                </form>
              </td>
              <td>
                <form action="./DeleteCar.php" method="post">
                  <input type="hidden" name="id" value="<?= $car->id; ?>" />
                  <input type="submit" class="button btn btn-danger" name="deleteCar" value="Delete" />
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="./AddCar.php" id="btn_addCar" class="btn btn-success btn-lg float-right">Add Car</a>
    </div>
  </body>

</html>