<?php

    function generer_popups_modif_bus($nbr_bus,  $id_bus, $nom_bus, $nb_places_rangee_bus, $nb_rangee_bus, $type_bus)
    {
        for($i = 0; $i < $nbr_bus; $i++)
        {
          echo '<div id="popup-modif-bus-' . $id_bus[$i] . '" class="modal fade" role="dialog">';
            echo '<div class="modal-dialog" style= "width :98% ; height : 92%; padding : 0;">';

              echo '<div class="modal-content" style= "height : 99%; overflow : auto;" >';
                echo '<div class="modal-header">';
                  echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                  echo '<h4 style="color:black; text-align :center;" class="modal-title">Modification du bus</h4>';
                echo '</div>';
                echo '<div class="modal-body">';
                  echo '<form action="modif_bus.php" method="get">';
                  echo '<input type="hidden" name="bus" value="' .  $id_bus[$i] . '">';
                    
					echo '<div class="form-group">';
						echo '<label for="nom">Nom du bus:</label>';
                        echo '<input type="text" value="' .$nom_bus[$i]. '" class="form-control" id="nom" name="nom" >';
                    echo '</div>';
					
                    echo '<div class="form-group">';
                      echo '<label for="places" >Nombre de places dans une rangée:</label>'; 
                      echo '<input type="text" value="' . $nb_places_rangee_bus[$i] . '" class="form-control" id="places" name="nb_places_rangee" >';
                    echo '</div>';
					
					echo '<div class="form-group">';
                      echo '<label for="placesr">Nombre de rangée:</label>';
                      echo '<input type="text" value="' . $nb_rangee_bus[$i] . '" class="form-control" id="places" name="nb_rangee" >';
                    echo '</div>';
					
                    echo '<div class="form-group">';
					  echo '<label for="placesr">Type: </label>';
                        echo '<select class="form-control" name="type">';

                          if(strcmp(strtolower($type_bus[$i]), "calme") == 0)
                          {
                              echo '<option selected="selected" value="calme">Calme</option>';
                              echo '<option value="Bruyant">Bruyant</option>';
                          }

                          else
                          {
                              echo '<option value="calme">Calme</option>';
                              echo '<option selected="selected" value="Bruyant">Bruyant</option>';
                          }

                        echo '</select>';
                      echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group">';
                      echo '<div class="col-sm-offset-5 col-sm-5">';
                        echo '<button type="submit" class="btn btn-primary">Appliquer les changements</button>';
                      echo '</div>';
                    echo '</div>';
                  echo '</form>';
                echo '</div>';
               
              echo '</div>';

            echo '</div>';
          echo '</div>';
        }
    }

  
?>