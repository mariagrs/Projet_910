<?php

    require('Database.php');

    class BusTableManager
    {
        public $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function bookSeat($bus_id, $eleve_id, $place)
        {
			echo $bus_id . ' ' . $eleve_id . ' ' . $place ;
            $result = $this->db->prepare('INSERT INTO places(bus_id, eleve_id, place) VALUES(:bus_id, :eleve_id, :place)');
            $result->execute(array(
              'bus_id' => $bus_id,
              'eleve_id' => $eleve_id,
              'place' => $place
              ));
        }

        public function getBusInfos($bus_id)
        {
            $q = $this->db->prepare('SELECT * from bus WHERE id=?');
            $q->execute([$bus_id]);
			

            if($result = $q->fetch())
            {
				
                $q = $this->db->prepare('SELECT * from places WHERE bus_id=?');
                $q->execute([$bus_id]);

                $result['places_prises'] = array();

                while ($data = $q->fetch())
                {
                    $result['places_prises'][] = $data['place'];
                }

                return $result;
            }

            return [];
        }
    }

?>
