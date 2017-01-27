<?php include("../include/menu.inc.php");
require("../assets/helper.php");

$id = $_GET["id"];
$client = findClient($id);

?>

    <div class="container">
      <form action="../controller/updateClientController.php" method="post">
      <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $client->getName(); ?>">
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="age" name="age" value="<?php echo $client->getAge(); ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $client->getEmail(); ?>">
      </div>
      <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $client->getPhone(); ?>">
      </div>
      <input type="hidden" name="idClient" id="idClient" value="<?php echo $client->getId(); ?>">
      <button type="submit" class="btn btn-default">Mettre à jour</button>
    </form>
  </div>
