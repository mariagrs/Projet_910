<?php

    session_start();

    require('includes/db/Database.php');

    $db = new Database();

    $estDejaDansChambre = $db->prepare('SELECT * FROM places_chambres WHERE eleve_id=?');
    $estDejaDansChambre->execute(array($_SESSION['id']));

    $nbPlacesPrises = $db->prepare('SELECT COUNT(*) as n FROM places_chambres WHERE chambre_id=?');
    $nbPlacesPrises->execute(array($_POST['id_chambre']));

    $nbPlacesTotal = $db->prepare('SELECT nb_place as n FROM chambres WHERE id=?');
    $nbPlacesTotal->execute(array($_POST['id_chambre']));

    $placesRestantes = ($nbPlacesTotal->fetch()['n'] - '0') - ($nbPlacesPrises->fetch()['n'] - '0');

    if($placesRestantes > 0)
    {
      if($estDejaDansChambre->fetch())
      {
          $supprimerEleveDeLaChambre = $db->prepare('DELETE FROM places_chambres WHERE eleve_id=?');
          $supprimerEleveDeLaChambre->execute(array($_SESSION['id']));
      }

      $ajout = $db->prepare('INSERT INTO places_chambres(eleve_id, chambre_id) VALUES(?,?)');
      $ajout->execute(array($_SESSION['id'], $_POST['id_chambre']));
    }


?>
