<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
  <link rel="stylesheet" href="ressources/css/chambre.css">
  <script type="text/javascript" src="js/bookBed.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">

<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>

<br />

<body>

<h2>Choix de chambre</h2>

<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('mineur')"> Mineur</button>
  <button class="btn" onclick="filterSelection('majeur')"> Majeur</button>
  
</div>


  
<ul class="bed-box">
    

<?php
require('includes/db/Database.php');

$db = new Database();

if(isset($_GET['voir']))
			{
					$id = $_GET['voir'];
                  
					$delete_row = $db->prepare('SELECT  FROM chambre WHERE id=?');
					$delete_row->execute(array($id));

					echo '<meta http-equiv="refresh" content="0; URL=reservation_chambre.php">';
			}

			$q = $db->query('SELECT * from chambre');

			$j = 0;

			while($chambre = $q->fetch())
			{

					echo '<li class="filterDiv ' . strtolower($chambre['type']) . '">';
						echo '<i class="fas fa-bed fa-4x"></i>';
						echo '<h3>' . $chambre['nom'] . '</h3>';
						echo '<p class="type-chambre">Type : ' . $chambre['type'] . '</p>';
						echo '<p>Nombre de places : ' . $chambre['nb_place'] . '</p>';
						echo '<br />';
						echo '<button data-toggle="modal" data-target="#myModal-' . ($j + 1) . '" class="btn btn-primary">choisir</button> ';
						echo '<a href="?voir=' . $chambre['id'] . '" class="btn btn-danger">voir</a>';
					echo '</li>';

					$j++;
							if($j % 5 == 0)
								echo '</ul><br/><ul class="bed-box">';
			}

	?>

</ul>

<?php

		for($i = 0; $i < $j; $i++)
		{
			echo '<div id="myModal-' . ($i + 1) . '" class="modal fade" role="dialog">';
				echo '<div class="modal-dialog">';

					echo '<div class="modal-content">';
						echo '<div class="modal-header">';
							echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
							echo '<h4 class="modal-title">Modal Header</h4>';
						echo '</div>';
						echo '<div class="modal-body">';
							echo '<form class="form-horizontal" action="reservation_chambre.php" method="get">';
							echo '<input type="hidden" name="chambre" value="' . ($i + 1) . '">';
								echo '<div class="form-group">';									
								echo '</div>';
								
								echo '<div class="form-group">';
									echo '<div class="col-sm-offset-2 col-sm-10">';
										echo '<select class="form-control" name="type">';
											echo '<option value="mineur">Mineur</option>';
											echo '<option value="majeur">Majeur</option>';
										echo '</select>';
									echo '</div>';
								echo '</div>';
								echo '<div class="form-group">';
									echo '<div class="col-sm-offset-2 col-sm-10">';
										echo '<button type="submit" class="btn btn-default">choisir la chambre</button>';
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


?>
	<?php

if(isset($_GET['nom']))
{
       $q = $db->prepare('UPDATE chambres SET type=?, nb_places=?, nom=? WHERE id=?');
       $q->execute(array($_GET['type'], $_GET['nb_places'], $_GET['nom'], $_GET['chambre']));

       echo '<meta http-equiv="refresh" content="0; URL=chambres.php">';
}




?>


<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
</html>
