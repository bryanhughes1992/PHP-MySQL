<?php

require_once('models/DataBase.php');

/**
 * CARS MODEL
 */
class Cars
{
  /**
   * ADD/CREATE FUNCTIONALITY
   */
  public function addCar($make, $model, $year, $db) {
    $query =
      'INSERT INTO
        carList (make, model, year)
      VALUES
        (:make, :model, :year)
      ';
    $pdoStm = $db->prepare($query);

    $pdoStm->bindParam(':make', $make);
    $pdoStm->bindParam(':model', $model);
    $pdoStm->bindParam(':year', $year);

    $count = $pdoStm->execute();
    return $count;
  }

  /**
   * UPDATE FUNCTIONALITY
   */
  public function updateCar($id, $make, $model, $year, $db) {
    $query =
      "UPDATE carList
        SET
          make = :make,
          model = :model,
          year = :year
        WHERE
          id = :id
      ";
    $pdoStm = $db->prepare($query);

    $pdoStm->bindParam(":make", $make);
    $pdoStm->bindParam(":model", $model);
    $pdoStm->bindParam(":year", $year);
    $pdoStm->bindParam("id", $id);

    $count = $pdoStm->execute();
    return $count;
  }

  /**
   * DELETE FUNCTIONALITY
   */
  public function deleteCar($id, $db) {
    $query = "DELETE FROM carList WHERE id = :id";
    $pdoStm = $db->prepare($query);
    $pdoStm->bindParam(':id', $id);

    $count = $pdoStm->execute();
    return $count;
  }

  /**
   * GET MAKE
   */
  public function getMake($db) {
    $query = "SELECT DISTINCT  make FROM carList";
    $pdoStm = $db->prepare($query);
    $pdoStm->execute();

    $result = $pdoStm->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  /**
   * GET CAR MAKE
   */
  public function getCarMake($db, $make) {
    $query = "SELECT * FROM carList WHERE make = :make";
    $pdoStm = $db->prepare($query);
    $pdoStm->bindValue(":make", $make, PDO::PARAM_STR);
    $pdoStm->execute();

    $result = $pdoStm->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  /**
   * GET CAR BY ID
   */
  public function getCarById($db, $id) {
    $query = "SELECT * FROM carList WHERE id = :id";
    $pdoStm = $db->prepare($query);
    $pdoStm->bindParam(":id", $id);
    $pdoStm->execute();

    $result = $pdoStm->fetch(PDO::FETCH_OBJ);
    return $result;
  }

  /**
   * GET ALL CARS
   */
  public function getAllCars($db) {
    $query = "SELECT * FROM carList";
    $pdoStm = $db->prepare($query);
    $pdoStm = $db->execute();

    $result = $pdoStm->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
}
