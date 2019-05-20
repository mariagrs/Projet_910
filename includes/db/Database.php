<?php

class Database
{
    public $pdo;

    public function __construct()
    {
      try
      {
      	 $this->pdo = new PDO('mysql:host=localhost;dbname=wei;charset=utf8', 'root', '');
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (Exception $e)
      {
          die('Erreur : ' . $e->getMessage());
      }
    }

    public function query($q)
    {
        return $this->pdo->query($q);
    }


    public function prepare($q)
    {
        return $this->pdo->prepare($q);
    }
}

?>
