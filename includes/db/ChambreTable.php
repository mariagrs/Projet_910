<?php

    require('Database.php');

    class ChambreTableManager
    {
        public $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function bookBed($chambre_id, $eleve_id)
        {
            $result = $this->db->prepare('INSERT INTO places_chambres(chambre_id, eleve_id) VALUES(:chambre_id, :eleve_id)');
            $result->execute(array(
              'chambre_id' => $chambre_id,
              'eleve_id' => $eleve_id
              ));
        }
    }

?>
