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
						echo '<br />';
						echo '<button data-toggle="modal" data-target="#popup-personnes-chambre-' . $chambre['id'] . '" class="btn btn-primary">Afficher</button>';
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

		require('includes/generer_popups_chambres_utilisateur.php');

		// Génération des popups pour gérer les personnes des chambres

		generer_popups_personnes_chambres($db, $j, $id_chambres, $noms_chambres);


?>



</div>
<div id="footer">

<?php include("includes/footer.php");?>

</div>

<script type="text/javascript">

let derniereListeDeLits = document.querySelectorAll(".bed-box");

console.log(derniereListeDeLits);

derniereListeDeLits[derniereListeDeLits.length - 1].style.marginBottom = "100px";

function inscrireEleveChambre(id_chambre) {

    $.post("ajouterEleveChambre_utilisateur.php", { id_chambre: id_chambre },
    function(data) {

			document.location.reload(true);
 });
}

</script>

</body>
</html>
