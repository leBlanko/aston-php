<?php
require("../include/config.inc.php");

class Client
{
    private $_id;
    private $_name;
    private $_age;
    private $_email;
    private $_phone;
    private $_adress1;
    private $_adress2;
    private $_city;
    private $_postalCode;
    private $_listCar;

    function __construct($name, $age, $cars = array())
    {
      $this->_name = $name;
      $this->_age = $age;
      $this->_listCar = $cars;

      $this->_email = "N/D";
      $this->_phone = "N/D";
      $this->_adress1 = "N/D";
      $this->_adress2 = "N/D";
      $this->_city = "N/D";
      $this->_postalCode = "N/D";

    }

    function getId(){return $this->_id;}
    function getName(){return $this->_name;}
    function getAge(){return $this->_age;}
    function getEmail(){return $this->_email;}
    function getPhone(){return $this->_phone;}
    function getAdress1(){return $this->_adress1;}
    function getAdress2(){return $this->_adress2;}
    function getCity(){return $this->_city;}
    function getPostalCode(){return $this->_postalCode;}

    function setId($id){$this->_id = $id;}
    function setName($name){$this->_name = $name;}
    function setAge($age){$this->_age = $age;}
    function setEmail($email){$this->_email = $email;}
    function setPhone($phone){$this->_phone = $phone;}
    function setAdress1($adress1){$this->_adress1 = $adress1;}
    function setAdress2($adress2){$this->_adress2 = $adress2;}
    function setCity($city){$this->_city = $city;}
    function setPostalCode($postalCode){$this->_postalCode = $postalCode;}

    function addInBDD()
    {
      $db = connect();
			if($db)
      {
				$sql = 'INSERT INTO client(name,age,email,phone) VALUES("'.$this->_name.'",  "'.$this->_age.'","'.$this->_email.'",  "'.$this->_phone.'")';
				$result = mysqli_query($db,$sql);
				if($result)
				{
          print "Le client a été ajouté en base de données.\n";
          header('Location: ../view/');
        }
      }
    }

    function updateInBDD()
    {
      $db = connect();
      if($db)
      {
        $sql = 'UPDATE client SET name="'.$this->_name.'", age="'.$this->_age.'", email="'.$this->_email.'", phone="'.$this->_phone.'" WHERE id='.$this->_id.'';
        $result = mysqli_query($db,$sql);
        if($result)
        {
          print "Le client a été mis à jour en base de données. \n";
          header('Location: ../view/');
        }
      }
    }

}


 ?>
