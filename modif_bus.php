<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
	<link rel="stylesheet" href="ressources/css/tableau.css">

</head>
<body>

<div id="wrapper">
<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>


<h1> Gestion des bus</h1>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Checher un bus .." title="Type in a name">

<div class="GestionBusDIV">

<table id="myTable">
  <tr class="header">
    <th style="width:25%;">Nom du bus</th>
    <th style="width:15%;">Nombre de place par rangée</th>
    <th style="width:15%;">Nombre de rangée</th>
    <th style="width:25%;">Type</th>
    <th style="width:20%;">Editer</th>
  </tr>
  
<?php 

	  require('includes/db/Database.php');
	  $db= new Database();
	  

	if(isset($_GET['supprimer'])){
        $id = $_GET['supprimer'];
 
        $delete_row = $db->prepare('DELETE FROM bus WHERE id=?');
        $delete_row->execute(array($id));
 
        echo '<meta http-equiv="refresh" content="0; URL=modif_bus.php">';
    }
	
	$q= $db->query('SELECT * FROM  bus ');
	
	$j = 0;
	
	$id_bus = array();
	$nom_bus = array();
	$types_bus = array();
	$nb_places_rangee_bus = array();					
	$nb_rangee_bus = array();					
 
 
	 
  while ($bus= $q->fetch()) {
    
	$id_bus[] = $bus['id'];
	$nom_bus[] = $bus['nom'];
	$types_bus[] = $bus['type'];
	$nb_places_rangee_bus[] = $bus['nb_places_par_rangee'];					
	$nb_rangee_bus[] =  $bus['nb_rangees'];		
	
?>


  <tr>
    <td><?php  echo $bus['nom']  ?></td>
    <td><?php  echo $bus['nb_places_par_rangee'] ?></td>
    <td><?php  echo $bus['nb_rangees']  ?></td>
    <td><?php  echo $bus['type'] ?></td>
    <td><?php echo '<a href="?supprimer=' . $bus['id'] . '" class="btn btn-danger">Supprimer</a> '; ?>
		<?php echo '<button data-toggle="modal" data-target="#popup-modif-bus-' . $bus['id'] . '" class="btn btn-primary">Modifier</button> ';?> </td>
  </tr>
 
 




<?php 



	$j++;
 }

	
 require('generer_popup_bus.php');
 
        // Génération des popups pour la modification des bus
 
        generer_popups_modif_bus($j,$id_bus, $nom_bus, $nb_places_rangee_bus ,$nb_rangee_bus, $types_bus );
 
 
        // Gestion des requetes
 
        if(isset($_GET['nom']))
        {
                $q = $db->prepare('UPDATE bus SET type=?, nb_places_par_rangee=?, nom=?, nb_rangees=? WHERE id=?');
                $q->execute(array($_GET['type'], $_GET['nb_places_rangee'], $_GET['nom'], $_GET['nb_rangee'], $_GET['bus']));
				
 
                echo '<meta http-equiv="refresh" content="0; URL=modif_bus.php">';
        }
 

?> 

</table>
</div>
</div>

<div id="footer">

<?php include("includes/footer.php");?>

</div>

<script>

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>