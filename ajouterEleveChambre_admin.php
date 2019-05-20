<?php


    require('includes/db/Database.php');

    $db = new Database();

    $eleveExistanceRequete = $db->prepare('SELECT * FROM users WHERE name=? AND surname=? AND email=?');
    $eleveExistanceRequete->execute(array($_POST['prenom'], $_POST['nom'], $_POST['email']));
    $id = 0;

    if($eleve = $eleveExistanceRequete->fetch())
    {
        $id = $eleve['id'];
    }

    else
    {
        $creationEleveRequete = $db->prepare('INSERT INTO users(name, surname, email, password) VALUES(?,?,?,?)');
        $creationEleveRequete->execute(array($_POST['prenom'], $_POST['nom'], $_POST['email'], '123'));

        $eleveExistanceRequete = $db->prepare('SELECT * FROM users WHERE name=? AND surname=? AND email=?');
        $eleveExistanceRequete->execute(array($_POST['prenom'], $_POST['nom'], $_POST['email']));
        $id = $eleveExistanceRequete->fetch()['id'];
    }

    $ajoutEleveChambreRequete = $db->prepare('INSERT INTO places_chambres(chambre_id, eleve_id) VALUES(?,?)');
    $ajoutEleveChambreRequete->execute(array($_POST['id_chambre'], $id));

    echo json_encode(array("nom" => $_POST['nom'], "prenom" => $_POST['prenom'],
    "email" => $_POST['email'], "id_chambre" => $_POST['id_chambre'], "id_eleve" => $id));

?>
