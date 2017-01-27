<?php
require("../model/car.php");
require("../include/config.inc.php");

$name = isset($_POST["name"])? $_POST["name"] : "";
$brand = isset($_POST["brand"])? $_POST["brand"]: "";
$year = isset($_POST["year"])? $_POST["year"]: "";
$color = isset($_POST["color"])? $_POST["color"]: "";
$nbKms = isset($_POST["nbKms"])? $_POST["nbKms"]: "";
$idClient = isset($_POST["idClient"])? $_POST["idClient"]: "";

if($name != "" && $brand != "" && $year != "" && $color != "" && $nbKms != "" && $idClient != "")
{
  $car = new Car($name,$brand,$year,$color,$nbKms,$idClient);
  $car->addInBDD();
}
else {
  echo "Veuillez remplir tous les champs </br>";
}
?>
