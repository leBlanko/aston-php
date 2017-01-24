<?php
DEFINE("COEFF_EXP", 0.4);
  $player1 = new Player("Tony");
  $player2 = new Player("Victor");
  $game = new Game($player1, $player2);
  $game->match();

  class Player
  {
    private $_strength;
    private $_experience;
    private $_name;
    private $_health;
    private $_opponent; //Reference a un deuxieme joueur
    private $_win;

    function __construct($name, $strength=5, $experience=1) {
      $this->_name = $name;
      $this->_strength = $strength;
      $this->_experience = $experience;
      $this->_health = 100; //par defaut
      $this->_win = false;
    }

    //SETTER ET GETTER
    function setName($name){$this->_name = $name;}
    function setStrength($strength){$this->_power = $power;}
    function setExperience($experience){$this->_experience = $experience;}
    function setOpponent($opponent){$this->_opponent = $opponent;}

    function getName(){return $this->_name;}
    function getStrength(){return $this->_strength;}
    function getExperience(){return $this->_experience;}
    function getHealth(){return $this->_health;}
    function getWin(){return $this->_win;}

    //METHODES
    function isDead()
    {
      return $this->_health <= 0;
    }
    function attack()
    {
      $random = rand(1, 10); //nombre random
      if($this->_opponent->incurAttack(($random * $this->_strength)/2.5))
      {
        $this->_win = true;
        $this->_experience += ($this->_opponent->getExperience() * COEFF_EXP);
      }
    }

    //Appelée lorsqu'un user subit un degat
    function incurAttack($nb)
    {
      print("Aie, le joueur ".$this->_name." a subit ".$nb." points de dégats </br>");
      $this->_health -= $nb;
      if($this->isDead())
      {
        print("Le joueur ".$this->_name." est mort </br>");
        return true;
      }
      print("Il reste ".$this->_health." points de vies au joueur ".$this->_name." </br>");
      return false;
    }
  }

  class Game
  {
    private $_player1;
    private $_player2;
    private $_currentPlayer;
    private $_tour;

    function __construct($player1, $player2)
    {
      $this->_player1 = $player1;
      $this->_player2 = $player2;
      $this->_currentPlayer = $player1;
      $this->_player1->setOpponent($player2);
      $this->_player2->setOpponent($player1);
      $this->_tour = 1;
    }

    function match()
    {
      while(!$this->_player1->getWin() || !$this->_player2->getWin())
      {
        print("********** </br> TOUR ".$this->_tour."</br>");
        //Au joueur 2 d'attaquer
        print("Le joueur ".$this->_currentPlayer->getName()." attaque ! </br>");
        $this->_currentPlayer->attack();
        $this->_tour++;
        if(strcmp($this->_currentPlayer->getName(), $this->_player1->getName()) == 0)
        {
          $this->_currentPlayer = $this->_player2;
        }
        else
        {
          $this->_currentPlayer = $this->_player1;
        }
      }
      if($this->_player1->getWin())
      {
        print("*** Félicitation au joueur ".$this->_player1->getName()." qui a gagné, son expérience est maintenant de ".$this->_player1->getExperience()." :) *** </br>");
      }
    }
  }




 ?>
