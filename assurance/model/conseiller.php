<?php
namespace assurance\model;

use Romenys\Framework\Components\Model;

class Conseiller extends Model
{
    private $_id;
    private $_name;

    function __construct($name)
    {
      $this->_name = $name;
    }
    function getId(){return $this->_id;}
    function getName(){return $this->_name;}

    function setId($id){$this->_id = $id;}
    function setName($name){$this->_name = $name;}

    function addClient()
    {

    }

    function updateClient()
    {

    }


}

 ?>
