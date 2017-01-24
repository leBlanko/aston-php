<?php
require("../model/book.php");

$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
{
  $filePath = $uploaddir.$_FILES['userfile']['name'];
  $currentOpen = fopen($filePath,"a+");

  rewind($currentOpen);
	while(!feof($currentOpen))
	{
		//Lecture ligne courante
		$buffer = fgets($currentOpen);
		$vals = explode(";",$buffer);
    $name = $vals[0];
		$author = $vals[1];
    $book = new Book($name,$author);
    $book->addInBDD();
	}
  fclose($currentOpen);
  header('Location: ../view/index.php');
}
else
{
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}

echo '</pre>';

?>
