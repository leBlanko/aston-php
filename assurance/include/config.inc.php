<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'assurance');

function connect(){
  return mysqli_connect(HOST, USER, PASSWORD, DB); //bool
}

?>
