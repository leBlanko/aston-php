<?php
require("../include/menu.inc.php");
  require("../assets/helper.php"); ?>

    <div class="container">
      <form action="../controller/addInsuranceController.php" method="post">
      <div class="form-group">
        <label for="name">Nom de l'assurance:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="price">Prix à l'année:</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
      <div class="form-group">
        <label for="idType">Type d'assurance:</label>
        <?php echo InsuranceTypeSelect(); ?>
      </div>
      <button type="submit" class="btn btn-default">Ajouter</button>
    </form>
  </div>
