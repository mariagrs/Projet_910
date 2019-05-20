<?php

    function generer_popups_modif_chambres($nb_chambres, $id_chambres, $noms_chambres, $nb_places_chambres, $types_chambres)
    {
        for($i = 0; $i < $nb_chambres; $i++)
        {
          echo '<div id="popup-modif-chambre-' . $id_chambres[$i] . '" class="modal fade" role="dialog">';
            echo '<div class="modal-dialog">';

              echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                  echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
                  echo '<h4 style="color:black;" class="modal-title">Modification de la chambre</h4>';
                echo '</div>';
                echo '<div class="modal-body">';
                  echo '<form class="form-horizontal" action="chambres.php" method="get">';
                  echo '<input type="hidden" name="chambre" value="' . $id_chambres[$i] . '">';
                    echo '<div class="form-group">';
                      echo '<label class="control-label col-sm-2" for="nom">Nom de la chambre:</label>';
                      echo '<div class="col-sm-10">';
                        echo '<input type="text" value="' . $noms_chambres[$i] . '" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de la chambre">';
                      echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group">';
                      echo '<label class="control-label col-sm-2" for="places">Nombre de places:</label>';
                      echo '<div class="col-sm-10">';
                        echo '<input type="text" value="' . $nb_places_chambres[$i] . '" class="form-control" id="places" name="nb_places" placeholder="Entrez le nombre de places">';
                      echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group">';
                      echo '<div class="col-sm-offset-2 col-sm-10">';
                        echo '<select class="form-control" name="type">';

                          if(strcmp(strtolower($types_chambres[$i]), "mineur") == 0)
                          {
                              echo '<option selected="selected" value="mineur">Mineur</option>';
                              echo '<option value="majeur">Majeur</option>';
                          }

                          else
                          {
                              echo '<option value="mineur">Mineur</option>';
                              echo '<option selected="selected" value="majeur">Majeur</option>';
                          }

                        echo '</select>';
                      echo '</div>';
                    echo '</div>';
                    echo '<div class="form-group">';
                      echo '<div class="col-sm-offset-2 col-sm-10">';
                        echo '<button type="submit" class="btn btn-primary">Appliquer les changements</button>';
                      echo '</div>';
                    echo '</div>';
                  echo '</form>';
                echo '</div>';
                echo '<div class="modal-footer">';
                  echo '<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>';
                echo '</div>';
              echo '</div>';

            echo '</div>';
          echo '</div>';
        }
    }


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
                      echo '<div class="media-right">';
                        echo ' <a href="?personne=' . $personne['user_id'] . '&chambre=' . $personne['chambre_id'] . '" style="height: 40px;" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>';
                      echo '</div>';
                    echo '</div></li>';
                }

                echo '</ul>';

                ?>
                  <div style="text-align: center">
                    <?php echo '<button data-toggle="collapse" data-target="#collapse-' . $id_chambres[$i] . '" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>'; ?>
                    </div>
                  <?php echo '<div id="collapse-' . $id_chambres[$i] . '" class="collapse col-md-4 col-md-offset-4">'; ?>

                    <br />
                    <br />
                    <br />
                    <br />
                    <form>
                      <div class="form-group chambreForm">
                        <label style="margin-bottom: 5px;">Nom :</label>
                          <input class="form-control" <?php echo 'id="nom-' . $id_chambres[$i] . '"' ?> name="nom">
                      </div>
                      <br />
                      <div class="form-group chambreForm">
                        <label style="margin-bottom: 5px;">Prénom :</label>
                          <input class="form-control" <?php echo 'id="prenom-' . $id_chambres[$i] . '"' ?> name="prenom">
                      </div>
                      <br />
                      <div class="form-group chambreForm">
                        <label style="margin-bottom: 5px;">Adresse e-mail :</label>
                          <input class="form-control" <?php echo 'id="email-' . $id_chambres[$i] . '"' ?> name="email">
                      </div>
                      <br />
                      <div class="form-group chambreForm col-md-offset-5">
                          <a onclick="submitFormData(<?php echo '\'nom-' . $id_chambres[$i] . '\'' ?>, <?php echo '\'prenom-' . $id_chambres[$i] . '\'' ?>, <?php echo '\'email-' . $id_chambres[$i] . '\'' ?>, <?php echo $id_chambres[$i] ?>)" class="btn btn-info">Ajouter</a>
                          <button onclick="submitFormData(<?php echo '"nom-' . $id_chambres[$i] . '"' ?>, <?php echo '"prenom-' . $id_chambres[$i] . '"' ?>, <?php echo '"email-' . $id_chambres[$i] . '"' ?>)" type="submit" class="btn btn-default">Ajouter</button>
                      </div>
                    </form>



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
