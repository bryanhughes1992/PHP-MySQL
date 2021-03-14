<?php
require_once 'models/Cars.php';
require_once 'modelsDataBase.php';

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $db = DataBase::getDB();

  $dbCar = new Cars();
  $clientCar = $dbCar->deleteCar($id, $db);
  if($clientCar) {
    header("Location: list-car.php");
  } else {
    echo "DELETION ERROR";
  }
}