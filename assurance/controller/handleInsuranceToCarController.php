<?php
require("../include/config.inc.php");

$idInsurance = isset($_POST["insuranceSelect"])? $_POST["insuranceSelect"] : "";
$idVoiture= isset($_POST["idVoiture"])? $_POST["idVoiture"] : "";
$idClient = isset($_POST["idClient"])? $_POST["idClient"] : "";
if($idInsurance != "" && $idVoiture != "" && $idClient != "")
{
  $db = connect();
  if($db)
  {
    $sql = 'UPDATE assurance_client SET idAssurance="'.$idInsurance.'" WHERE idVoiture='.$idVoiture.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      print "La voiture a été mis à jour en base de données. \n";
      header('Location: ../view/detailsClient.php?id='.$idClient);
    }
  }
}
else {
  echo "Probleme récupération parametres post";
}
?>
