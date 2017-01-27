<?php

class Car
{
    private $_id;
    private $_name;
    private $_brand;
    private $_year;
    private $_color;
    private $_nbKms;
    private $_idClient;

    function __construct($name, $brand, $year, $color, $nbKms, $idClient = -1)
    {
      $this->_name = $name;
      $this->_brand = $brand;
      $this->_year = $year;
      $this->_color = $color;
      $this->_nbKms = $nbKms;
      $this->_idClient = $idClient;
    }

    function getId(){return $this->_id;}
    function getName(){return $this->_name;}
    function getBrand(){return $this->_brand;}
    function getYear(){return $this->_year;}
    function getColor(){return $this->_color;}
    function getKms(){return $this->_nbKms;}
    function getIdClient(){ return $this->_idClient;}

    function setId($id){$this->_id = $id;}
    function setName($name){$this->_name = $name;}
    function setBrand($brand){$this->_brand = $brand;}
    function setYear($year){$this->_year = $year;}
    function setColor($color){$this->_color = $color;}
    function setKms($kms){$this->_nbKms = $kms;}
    function setIdClient($idClient){$this->_idClient = $idClient;}

    function addInBDD()
    {
      $db = connect();
			if($db)
      {
				$sql = 'INSERT INTO voiture(name,brand,year,color,nbKm,idClient) VALUES("'.$this->_name.'",  "'.$this->_brand.'",  "'.$this->_year.'",  "'.$this->_color.'",  "'.$this->_nbKms.'",  "'.$this->_idClient.'")';
				$result = mysqli_query($db,$sql);
				if($result)
				{
          print "La voiture a été ajouté en base de données.\n";
          //Ajout base intermediaire
          $sql2 = 'INSERT INTO assurance_client(idClient,idAssurance,idVoiture) VALUES('.$this->_idClient.',  -1, '.mysqli_insert_id($db).')';
          $result2 = mysqli_query($db,$sql2);
          if($result2)
          {
            print "La voiture a été ajouté en base de données table intermediaire.\n";
            header('Location: ../view/detailsClient.php?id='.$this->_idClient);
          }
        }
      }
    }

    function updateInBDD()
    {
      $db = connect();
      if($db)
      {
        $sql = 'UPDATE voiture SET name="'.$this->_name.'", brand="'.$this->_brand.'", year="'.$this->_year.'", color="'.$this->_year.'", color="'.$this->_color.'", nbKm="'.$this->_nbKms.'" WHERE id='.$this->_id.'';
        $result = mysqli_query($db,$sql);
        if($result)
        {
          print "La voiture a été mis à jour en base de données. \n";
          header('Location: ../view/detailsClient.php?id='.$this->_idClient);
        }
      }
    }

}


 ?>
