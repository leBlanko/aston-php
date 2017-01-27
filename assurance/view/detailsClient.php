<?php require("../include/menu.inc.php");
require("../assets/helper.php"); ?>

<?php
$id = $_GET["id"];
$client = findClient($id);
$personnalInsurance = findPersonnalInsurance($id);

?>

<div class="left">
<div class="form_header">
  <h3>Informations client</h3>
</div>
<div class="container">
<ul>
  <div>
  <li>
    <label for="clientName">Nom</label>
    <input type="text" name="clientName" value="<?php echo $client->getName(); ?>"/>
  </li>
  <li>
    <label for="clientAge">Age</label>
    <input type="text" name="clientAge" value="<?php echo $client->getAge(); ?>"/>
  </li>
  </div>
  <div>
  <li>
    <label for="clientEmail">Email</label>
    <input type="text" name="clientEmail" value="<?php echo $client->getEmail(); ?>" />
  </li>
  <li>
    <label for="clientPhone">Numéro de téléphone</label>
    <input type="text" name="clientPhone" value="<?php echo $client->getPhone(); ?>"/>
  </li>
  </div>
</ul>
</div>

<div class="form_header">
  <h3>Adresse client</h3>
</div>
<div class="container">
<ul>
  <div>
  <li>
    <label for="clientAdress1">Adresse</label>
    <input type="text" name="clientAdress1" value="<?php echo $client->getAdress1(); ?>" />
  </li>
  <li>
    <label for="clientAdress2">Complément d'adresse</label>
    <input type="text" name="clientAdress2" value="<?php echo $client->getAdress2(); ?>" />
  </li>
  </div>
  <div>
  <li>
    <label for="clientCP">Code Postal</label>
    <input type="text" name="clientCP" value="<?php echo $client->getPostalCode(); ?>"/>
  </li>
  <li>
    <label for="clientCity">Ville</label>
    <input type="text" name="clientCity" value="<?php echo $client->getCity(); ?>"/>
  </li>

  </li>
</ul>
</div>


<div class="form_header">
  <h3>Assurances personnelles</h3>
</div>
<div class="container">
<ul>
  <div>
  <li>
    <label for="clientAdress1">Assurance vie</label>
    <input type="text" name="LifeInsurance" value="<?php echo $personnalInsurance ?>" style="width:500px;" />
  </li>
  </div>
  <div>
  </li>
</ul>
<a class="btn btn-primary" href="addPersonnalInsurance.php?idClient=<?php echo $client->GetId(); ?>">Ajouter assurance</a>
</div>
</div>

<div class="right">
<div class="form_header">
  <h3>Liste des véhicules</h3>
</div>
<div class="container">
  <table class="table">
   <thead> <!-- En-tête du tableau -->
       <tr>
           <th>Nom</th>
           <th>Marque</th>
           <th>Année</th>
           <th>Assurance</th>
       </tr>
   </thead>

   <tbody>
     <?php echo ClientCarSelect($client->getId()); ?>
  </tbody>
</table>

<a class="btn btn-primary" href="addCar.php?idClient=<?php echo $client->GetId(); ?>">Ajouter véhicule</a>
</div>


</div>
