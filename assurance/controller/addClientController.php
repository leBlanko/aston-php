<?php
require("../model/client.php");

$name = isset($_POST["name"])? $_POST["name"] : "";
$age = isset($_POST["age"])? $_POST["age"]: "";
$email = isset($_POST["email"])? $_POST["email"]: "";
$phone = isset($_POST["phone"])? $_POST["phone"]: "";

if($name != "" && $age != "" && $email != "" && $phone != "")
{
  $client = new Client($name,$age);
  $client->setEmail($email);
  $client->setPhone($phone);
  $client->addInBDD();
}
else {
  echo "Veuillez remplir tous les champs </br>";
}
?>
