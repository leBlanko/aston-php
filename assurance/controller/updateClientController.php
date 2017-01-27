<?php
require("../model/client.php");

$id = isset($_POST["idClient"])? $_POST["idClient"] : "";
$name = isset($_POST["name"])? $_POST["name"] : "";
$age = isset($_POST["age"])? $_POST["age"]: "";
$email = isset($_POST["email"])? $_POST["email"]: "";
$phone = isset($_POST["phone"])? $_POST["phone"]: "";

if($name != "" && $age != "" && $id != "" && $email != "" && $phone != "")
{
  $client = new Client($name,$age);
  $client->setId($id);
  $client->setEmail($email);
  $client->setPhone($phone);
  $client->updateInBDD();
}
else {
  echo "Veuillez remplir tous les champs </br>";
}


 ?>
