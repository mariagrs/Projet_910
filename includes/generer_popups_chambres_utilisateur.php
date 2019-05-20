<?php


    function generer_popups_personnes_chambres($db, $nb_chambres, $id_chambres, $noms_chambres)
    {

        for($i = 0; $i < $nb_chambres; $i++)
        {
          echo '<div id="popup-personnes-chambre-' . $id_chambres[$i] . '" class="modal fade" role="dialog">';
            echo '<div class="modal-dialog" style="width: 98%; height: 92%; padding: 0;">';

              echo '<div class="modal-content" style="height: 99%; overflow: auto;">';
                echo '<div class="modal-header">';
                  echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                  echo '<h4 style="color:black;" class="modal-title">' . $noms_chambres[$i] . '</h4>';
                echo '</div>';
                echo '<div class="modal-body">';

                $q = $db->prepare('SELECT u.id as user_id, name, surname, email, c.id as chambre_id FROM users u INNER JOIN places_chambres p INNER JOIN chambres c ON p.chambre_id = c.id AND p.eleve_id = u.id WHERE c.id = ?');
                $q->execute(array($id_chambres[$i]));

                echo '<ul id="list-eleves-chambre-' . $id_chambres[$i] . '" class="list-group">';

                while($personne = $q->fetch())
                {
                    echo '<li class="list-group-item"><div class="media">';
                      echo '<div class="media-body">';
                        echo '<h4 style="color: black" class="media-heading">' . $personne['surname'] . ' ' . $personne['name'] . '</h4>';
                        echo '<p><i>' . $personne['email'] . '</i></p>';
                      echo '</div>';
                    echo '</div></li>';
                }

                echo '</ul>';

                ?>
                  <div style="text-align: center">
                    <?php

                        echo '<button onclick="inscrireEleveChambre(' . $id_chambres[$i] . ')" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> S\'enregistrer dans la chambre </button>';

                    ?>
                    </div>

                <br />
                <?php

                echo '</div>';
                
              echo '</div>';

            echo '</div>';
          echo '</div>';
        }
    }

?>
