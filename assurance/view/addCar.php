<?php require("../include/menu.inc.php");
require("../assets/helper.php"); ?>

<?php
$id = $_GET["idClient"];
?>

<div class="container">
  <form action="../controller/addCarController.php" method="post">
  <div class="form-group">
    <label for="name">Nom de la voiture:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="brand">Marque:</label>
    <input type="text" class="form-control" id="brand" name="brand">
  </div>
  <div class="form-group">
    <label for="year">Année:</label>
    <input type="text" class="form-control" id="year" name="year">
  </div>
  <div class="form-group">
    <label for="color">Couleur:</label>
    <input type="text" class="form-control" id="color" name="color">
  </div>
  <div class="form-group">
    <label for="nbKms">Nombre de kms:</label>
    <input type="text" class="form-control" id="nbKms" name="nbKms">
  </div>
  <input type="hidden" name="idClient" id="idClient" value="<?php echo $id; ?>">
  <button type="submit" class="btn btn-default">Ajouter</button>
</form>
</div>
