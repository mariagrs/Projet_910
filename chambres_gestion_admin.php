<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<div id="wrapper">
<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>




<ul class="bed-box">


	<?php

			require('includes/db/Database.php');

			$db = new Database();


			if(isset($_GET['supprimer']))
			{
					$id = $_GET['supprimer'];

					$delete_row = $db->prepare('DELETE FROM chambres WHERE id=?');
					$delete_row->execute(array($id));

					$delete_row = $db->prepare('DELETE FROM places_chambres WHERE chambre_id=?');
					$delete_row->execute(array($id));

					echo '<meta http-equiv="refresh" content="0; URL=chambres.php">';
			}



			$q = $db->query('SELECT * from chambres');

			$j = 0;

						$id_chambres = array();
						$noms_chambres = array();
						$types_chambres = array();
						$nb_places_chambres = array();

			while($chambre = $q->fetch())
			{

					$id_chambres[] = $chambre['id'];
					$noms_chambres[] = $chambre['nom'];
					$types_chambres[] = $chambre['type'];
					$nb_places_chambres[] = $chambre['nb_place'];

					$nb_places_dispo_q = $db->prepare('SELECT COUNT(*) AS nb FROM places_chambres p INNER JOIN chambres c ON p.chambre_id = c.id WHERE c.id = ?');
					$nb_places_dispo_q->execute(array($chambre['id']));

					$nb_places_dispo = $chambre['nb_place'] - ($chambre['nb_place'] - ($nb_places_dispo_q->fetch()['nb'] - '0'));

					echo '<li>';
						echo '<i class="fas fa-bed fa-4x"></i>';
						echo '<h4 style="margin-top: 20px;">' . $chambre['nom'] . ' : ' . $chambre['type'] . 's <span class="badge">' . $nb_places_dispo . ' / ' .  $chambre['nb_place'] . '</span></h4>';
						//echo '<h4><i> ' . $chambre['type'] . 's</i></h4>';
						echo '<br />';
						echo '<button data-toggle="modal" data-target="#popup-modif-chambre-' . $chambre['id'] . '" class="btn btn-primary">Modifier</button> ';
						echo '<a href="?supprimer=' . $chambre['id'] . '" class="btn btn-danger">Supprimer</a> ';
						echo '<button data-toggle="modal" data-target="#popup-personnes-chambre-' . $chambre['id'] . '" class="btn btn-warning">+</button>';
					echo '</li>';

					$j++;
							if($j % 5 == 0)
								echo '</ul><ul class="bed-box">';
			}

	?>

</ul>

<div id="results">
</div>

<?php

		require('includes/generer_popups_chambres.php');

		// Génération des popups pour la modification des chambres

		generer_popups_modif_chambres($j, $id_chambres, $noms_chambres, $nb_places_chambres, $types_chambres);

		// Génération des popups pour gérer les personnes des chambres

		generer_popups_personnes_chambres($db, $j, $id_chambres, $noms_chambres);

		// Gestion des requetes

		if(isset($_GET['nom']))
		{
				$q = $db->prepare('UPDATE chambres SET type=?, nb_place=?, nom=? WHERE id=?');
				$q->execute(array($_GET['type'], $_GET['nb_places'], $_GET['nom'], $_GET['chambre']));

				echo '<meta http-equiv="refresh" content="0; URL=chambres.php">';
		}

		if(isset($_GET['personne']))
		{
			$delete_person = $db->prepare('DELETE FROM places_chambres WHERE chambre_id=? AND eleve_id=?');
			$delete_person->execute(array($_GET['chambre'], $_GET['personne']));

			echo '<meta http-equiv="refresh" content="0; URL=chambres.php">';
		}


?>



</div>
<div id="footer">

<?php include("includes/footer.php");?>

</div>

<script type="text/javascript">

let derniereListeDeLits = document.querySelectorAll(".bed-box");

console.log(derniereListeDeLits);

derniereListeDeLits[derniereListeDeLits.length - 1].style.marginBottom = "100px";

function submitFormData(id_nom, id_prenom, id_email, id_chambre) {

		var nom = document.getElementById(id_nom).value;
		var prenom = document.getElementById(id_prenom).value;
		var email = document.getElementById(id_email).value;

    $.post("ajouterEleveChambre_admin.php", { nom: nom, prenom: prenom, email: email, id_chambre : id_chambre },
    function(data) {

			var donnees = $.parseJSON(data);

			$("#list-eleves-chambre-" + id_chambre).append("<li id=\"list-eleves-chambre-" + donnees['id_chambre'] + "\" class=\"list-group-item\"><div class=\"media\">"
				+ "<div class=\"media-body\">" + "<h4 style=\"color: black\" class=\"media-heading\">" + donnees['nom'] + " " + donnees['prenom'] + "</h4>"
					+ "<p><i>" + donnees['email'] + "</i></p>"
				+ "</div>"
				+ "<div class=\"media-right\">"
					+ " <a href=\"?personne=" + donnees['id_eleve'] + "&chambre=" + id_chambre + "\" style=\"height: 40px;\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-remove\"></span></a>"
				+ "</div>"
			+ "</div></li>");
 });
}

</script>

</body>
</html>
