<?php require("../assets/helper.php");
require("../include/menu.inc.php");?>

<div class="container">
  <form action="../controller/addPersonalInsuranceController.php" method="post">
  <div class="form-group">
    <input type="hidden" name="idClient" value="<?php echo $_GET["idClient"] ?>"/>
    <div class="row">
      <div class="col-sm-4">
        <label for="insuranceSelect">Ajouter Assurance:</label>
        <?php echo InsurancePersonnalSelect(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <label for="mandatSelect">Type de mandat:</label>
        <?php echo InsuranceMandatSelect(); ?>
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
