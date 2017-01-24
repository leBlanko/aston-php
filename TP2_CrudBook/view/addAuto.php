<?php include("../include/menu.inc.php");
require("../assets/helper.php"); ?>

<div class="container">
  <form action='../controller/addAutoController.php' method='POST' enctype='multipart/form-data'>
      <input type='file' name='userfile'><br>
      <input type='submit' name='upload_btn' value='upload'>
  </form>
</div>
