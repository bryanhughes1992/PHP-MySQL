<?php
require_once '../models/Cars.php';
require_once '../models/DataBase.php';

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $db = DataBase::getDB();

  $dbCar = new Cars();
  $clientCar = $dbCar->deleteCar($id, $db);
  if($clientCar) {
    header('Location: "./ListCar.php"');
  } else {
    echo "DELETION ERROR";
  }
}