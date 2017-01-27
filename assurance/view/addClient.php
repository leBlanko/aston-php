<?php
  require("../include/menu.inc.php"); ?>

    <div class="container">
      <form action="../controller/addClientController.php" method="post">
      <div class="form-group">
        <label for="name">Nom du client:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="age" name="age">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <button type="submit" class="btn btn-default">Ajouter</button>
    </form>
  </div>
