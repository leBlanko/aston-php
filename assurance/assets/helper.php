<?php
require("../model/client.php");
require("../model/assurance.php");
require("../model/car.php");

function findClient($id)
{
    $db = connect();
    if($db)
    {
      $sql = 'SELECT * FROM client WHERE id='.$id.'';
      $result = mysqli_query($db,$sql);
      if($result)
      {
        while ($row = mysqli_fetch_array($result)) {
          $client = new Client($row['name'],$row['age']);
          $client->setId($row['id']);
          if(strcmp($row['email'], '') != 0) { $client->setEmail($row['email']); }
          if(strcmp($row['phone'], '') != 0) { $client->setPhone($row['phone']); }
          if(strcmp($row['adress1'], '') != 0) { $client->setAdress1($row['adress1']); }
          if(strcmp($row['adress2'], '') != 0) { $client->setAdress2($row['adress2']); }
          if(strcmp($row['city'], '') != 0) { $client->setCity($row['city']); }
          if(strcmp($row['postalCode'], 0) != 0) { $client->setPostalCode($row['postalCode']); }
          return $client;
        }
      }
    }
}

function findInsurance($id)
{
    $db = connect();
    if($db)
    {
      $sql = 'SELECT id,name,price,idType FROM assurance WHERE id='.$id.'';
      $result = mysqli_query($db,$sql);
      if($result)
      {
        while ($row = mysqli_fetch_array($result)) {
          $insurance = new Insurance($row['name'],$row['price'],$row['idType']);
          $insurance->setId($row['id']);
          return $insurance;
        }
      }
    }
}

function findCar($id)
{
  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM voiture WHERE id='.$id.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        $car = new Car($row['name'],$row['brand'],$row['year'],$row['color'],$row['nbKm'],$row['idClient']);
        $car->setId($row['id']);
        return $car;
      }
    }
  }
}

function deleteCar($id)
{
  echo "ok";
  $db = connect();
  if($db)
  {
    $sql = 'DELETE FROM voiture WHERE id='.$id.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      print("Suppression de la voiture OK");
      header('Location: ../view/detailsClient.php?id='.$id);
    }
  }
}

function findTypeInsurance($id)
{
  $db = connect();
  if($db)
  {
    $sql = 'SELECT name FROM typeassurance WHERE id='.$id.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        return $row['name'];
      }
    }
  }
}

function InsuranceTypeSelect()
{
  $res = '';
  $res .= '<select class="form-control" id="idType" name="idType">';

  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM typeassurance';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        $res .= '<option value="'.$row["id"].'">';
        $res .= $row["name"];
        $res .= '</option>';
      }
    }
  }
  $res .= '</select>';
  return $res;
}

function InsuranceCarSelect()
{
  $res = '';
  $res .= '<select class="form-control" id="insuranceSelect" name="insuranceSelect">';

  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM assurance WHERE idType = 1 AND id != -1';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        $res .= '<option value="'.$row["id"].'">';
        $res .= $row["name"].' (Prix annuel: '.$row["price"].'€)';
        $res .= '</option>';
      }
    }
  }
  $res .= '</select>';
  return $res;
}

function InsurancePersonnalSelect()
{
  $res = '';
  $res .= '<select class="form-control" id="insuranceSelect" name="insuranceSelect">';

  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM assurance WHERE idType = 2 AND id != -1';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        $res .= '<option value="'.$row["id"].'">';
        $res .= $row["name"].' (Cotisation annuelle: '.$row["price"].'€)';
        $res .= '</option>';
      }
    }
  }
  $res .= '</select>';
  return $res;
}

function InsuranceMandatSelect()
{
  $res = '';
  $res .= '<select class="form-control" id="mandatSelect" name="mandatSelect">';
  $res .= '<option value="1">MANDAT DEFENSIF(+ 4,09%)</option>';
  $res .= '<option value="2">MANDAT EQUILIBRE(+ 6,03%)</option>';
  $res .= '<option value="3">MANDAT DYNAMIQUE(+ 7,14%)</option>';
  $res .= '<option value="4">MANDAT OFFENSIF(+ 5,38%)</option>';
  $res .= '</select>';
  return $res;
}

function ClientCarSelect($idClient)
{
  $res = '';
  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM voiture v JOIN assurance_client ac ON v.id = ac.idVoiture WHERE ac.idClient ='.$idClient.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result)) {
        $res .= '<tr>';
        $res .= '<td>'.$row["name"].'</td>';
        $res .= '<td>'.$row["brand"].'</td>';
        $res .= '<td>'.$row["year"].'</td>';
        if(strcmp($row["idAssurance"], -1) == 0)
        {
          //Pas d'assurance encore
          $res .= '<td><a class="btn-primary btn-sm" href="../view/handleInsuranceToCar.php?id='.$row['idVoiture'].'">Ajouter assurance</a>';
        }
        else {
          //Afficher l'assurance choisie
          $res .= '<td>'.findAssurance($row['idAssurance']);
          $res .= '<a class="btn-success btn-sm" href="../view/handleInsuranceToCar.php?id='.$row['idVoiture'].'">Modifier assurance</a>';
        }
        $res .= '</td>';
        $res .= '</tr>';
      }
    }
  }
  return $res;
}

function findAssurance($idAssurance)
{
  $res = '';
  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM assurance WHERE id ='.$idAssurance.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $res .= $row['name'].' (Prix année:'.$row['price'].'€ TTC) ';
      }
    }
  }
  return $res;
}

function findPersonnalInsurance($idClient)
{
  $res = '';
  $db = connect();
  if($db)
  {
    $sql = 'SELECT * FROM assurancevie_client WHERE idClient ='.$idClient.'';
    $result = mysqli_query($db,$sql);
    if($result)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $res .= findAssurance($row['idAssurance']).'(Mandat: '.findMandat($row['idMandat']).')';
      }
    }
  }
  return $res;
}

function findMandat($idMandat)
{
  switch($idMandat)
  {
    case 1:
      return "Défensif";
      break;
    case 2:
      return "Equilibré";
      break;
    case 3:
      return "Dynamique";
      break;
    case 4:
      return "Offensif";
      break;
  }
}



 ?>
