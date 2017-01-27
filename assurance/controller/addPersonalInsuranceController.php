<?php
require("../include/config.inc.php");

$idClient = isset($_POST["idClient"])? $_POST["idClient"]: "";
$insuranceSelect = isset($_POST["insuranceSelect"])? $_POST["insuranceSelect"]: "";
$mandatSelect = isset($_POST["mandatSelect"])? $_POST["mandatSelect"]: "";

if($idClient != "" && $insuranceSelect != "" && $mandatSelect != "")
{
  $db = connect();
  if($db)
  {
    $sql = 'INSERT INTO assurancevie_client(idClient,idMandat,idAssurance) VALUES("'.$idClient.'",  "'.$mandatSelect.'",  "'.$insuranceSelect.'")';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      print "L'assurance a été ajouté en base de données.\n";
      header('Location: ../view/detailsClient.php?id='.$idClient);
    }
  }
  }
else {
  print("Champs posts manquant");
}

 ?>
