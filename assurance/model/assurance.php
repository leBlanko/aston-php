<?php
class Insurance
{
    private $_id;
    private $_name;
    private $_price;
    private $_idType;

    function __construct($name,$price,$idType)
    {
      $this->_name = $name;
      $this->_price = $price;
      $this->_idType = $idType;
    }

    function getId(){return $this->_id;}
    function getName(){return $this->_name;}
    function getPrice(){return $this->_price;}

    function setId($id){$this->_id = $id;}
    function setName($name){$this->_name = $name;}
    function setPrice($price){$this->_price = $price;}


    function addInBDD()
    {
      $db = connect();
      if($db)
      {
        $sql = 'INSERT INTO assurance(name,price,idType) VALUES("'.$this->_name.'",  "'.$this->_price.'",  "'.$this->_idType.'")';
        $result = mysqli_query($db,$sql);
        if($result)
        {
          print "L'assurane a été ajouté en base de données.\n";
          header('Location: ../view/showInsurances.php');
        }
      }
    }

    function updateInBDD()
    {
      $db = connect();
      if($db)
      {
        $sql = 'UPDATE assurance SET name="'.$this->_name.'", price="'.$this->_price.'", idType="'.$this->_idType.'" WHERE id='.$this->_id.'';
        $result = mysqli_query($db,$sql);
        if($result)
        {
          print "L'assurance a été mis à jour en base de données. \n";
          header('Location: ../view/showInsurances.php');
        }
      }
    }


}

 ?>
