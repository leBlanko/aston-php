<?php
require("../model/assurance.php");
require("../include/config.inc.php");

$name = isset($_POST["name"])? $_POST["name"] : "";
$price = isset($_POST["price"])? $_POST["price"]: "";
$idType = isset($_POST["idType"])? $_POST["idType"]: "";

if($name != "" && $price != "" && $idType != "")
{
  $insurance = new Insurance($name,$price,$idType);
  $insurance->addInBDD();
}
else {
  echo "Veuillez remplir tous les champs </br>";
}
?>
