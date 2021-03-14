<?php

$dbname = "hughesbu_PHP_LAB06";
$user = "hughesbu_bryan_hughes";
$pass = 'xsSt(3rtE2uk$y';
$dsn = "mysql:host=167.114.195.192; dbname=$dbname";

$dbConn = new PDO($dsn, $user, $pass);

echo("Connected!");

$query = "SELECT * FROM carList";

$pdoStm = $dbConn->prepare($query);
$pdoStm->execute();
var_dump($pdoStm->fetchAll());

?>