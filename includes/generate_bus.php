<?php

    require('db/BusTable.php');

    function generate_bus($bus_id)
    {
        $bm = new BusTableManager();

        $infos = $bm->getBusInfos($bus_id);

        $seats_per_row = $infos['nb_places_par_rangee'];
        $row_nb = $infos['nb_rangees'];

        $place_actuelle = 0;

          for($k = 0; $k < 2; $k++)
          {
              for($i = 0; $i < $seats_per_row / 2; $i++)
              {
				  
                  for($j = 0; $j < $row_nb; $j++)
                  {
					
                    $taken = false;
                    $place_actuelle++;

                    foreach($infos['places_prises'] as $place_prise)
                    {
                        if($place_prise == $place_actuelle)
                            $taken = true;
                    }
                    if($taken)
                      echo '<div class="seat taken" ><div class="seat-a"><div class="seat-b"> ' . $place_actuelle . ' </div></div></div>';
                    else
                      echo '<button onclick="bookSeat(' . $place_actuelle . ', ' . $bus_id. ', ' . $_SESSION['id'] . ')" class="seat" ><div class="seat-a"><div class="seat-b"> ' . $place_actuelle . '</div></div></button>';
			  
				  }

                  echo '<div class="clear"></div>';
              }

              echo '<br />';
              echo '<br />';
              echo '<br />';
          }





    }

?>


