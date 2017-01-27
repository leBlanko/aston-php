<?php
require("../model/client.php");
require("../model/assurance.php");

$id = isset($_POST["idInsurance"])? $_POST["idInsurance"] : "";
$name = isset($_POST["name"])? $_POST["name"] : "";
$price = isset($_POST["price"])? $_POST["price"]: "";
$idType = isset($_POST["idType"])? $_POST["idType"]: "";

if($name != "" && $price != "" && $id != "" && $idType != "")
{
  $insurance = new Insurance($name,$price,$idType);
  $insurance->setId($id);
  $insurance->updateInBDD();
}
else {
  echo "Veuillez remplir tous les champs </br>";
}


 ?>
