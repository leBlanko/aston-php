<?php
require("../include/menu.inc.php");
  require("../assets/helper.php");
  $idCar = $_GET["id"];
  $car = findCar($idCar);
  $client = findClient($car->getIdClient());

  ?>

      <div class="left">
      <div class="form_header">
        <h3>Informations voiture</h3>
      </div>
      <div class="container">
      <ul>
        <div>
        <li>
          <label for="clientName">Nom</label>
          <input type="text" name="name" value="<?php echo $car->getName(); ?>"/>
        </li>
        <li>
          <label for="clientAge">Marque</label>
          <input type="text" name="brand" value="<?php echo $car->getBrand(); ?>"/>
        </li>
        </div>
        <div>
        <li>
          <label for="clientEmail">Année</label>
          <input type="text" name="year" value="<?php echo $car->getYear(); ?>" />
        </li>
        <li>
          <label for="clientPhone">Couleur</label>
          <input type="text" name="color" value="<?php echo $car->getColor(); ?>"/>
        </li>
        </div>
        <div>
        <li>
          <label for="clientEmail">Nombre km</label>
          <input type="text" name="kms" value="<?php echo $car->getKms(); ?>" />
        </li>
        <li>
          <label for="clientPhone">Client:</label>
          <input type="text" name="clientName" value="<?php echo $client->getName() ?>"/>
        </li>
        </div>
      </ul>
      </div>


      <form action="../controller/handleInsuranceToCarController.php" method="post">
      <div class="form-group">
        <input type="hidden" name="idClient" value="<?php echo $client->getId() ?>"/>
        <input type="hidden" name="idVoiture" value="<?php echo $idCar ?>"/>
        <div class="row">
          <div class="col-sm-4">
            <label for="insuranceSelect">Ajouter Assurance:</label>
            <?php echo InsuranceCarSelect(); ?>
          </div>
        </div>
        <div class="row" style="margin-top:5px;">
          <div class="col-sm-6">
            <div class="row col-sm-6"><button type="submit" class="btn btn-primary">Ajouter</button></div>
          </div>
        </div>
        </div>
    </form>
  </div>
