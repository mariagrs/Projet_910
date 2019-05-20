<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
  <link rel="stylesheet" href="ressources/css/bus.css">
	<script type="text/javascript" src="js/bookSeat.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>


<?php

  require("includes/generate_bus.php");

	$db = new Database();

	$q = $db->query('SELECT id, nom FROM bus');

	
?>

	<br />

	<div class="col-sm-4">
	<div class="form-group">
	<form method="post">
  <label for="sel1">Selection du bus:</label>
  <select class="form-control" name="selected_bus">

		<?php
				
				while($bus = $q->fetch())
				{
					echo '<option value="' . $bus['id'] . '">' . $bus['nom'] . '</option>';
				}

		?>

  </select>
	<br />
	<input type="submit" class="btn" value="Valider">

</form>
</div>

</div>


<br />
<br />
<br />
<br />
<br />
<br />
<br />

<div class ="placementBus">

<?php

if(isset($_POST['selected_bus']))
{
		
		$selected_bus = $_POST['selected_bus'];

		generate_bus($selected_bus);
}

?>

</div>

<br />
<br />
<br />
<br />
<br />

</div>
<div id="footer">

<?php include("includes/footer.php");?>

</div>
</body>
</html>
