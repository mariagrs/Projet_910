<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<div id="wrapper">

<?php include("includes/social-media.php"); ?>
<?php include("includes/navigation.php"); ?>

<ul class="panel-box">
	<a href="modif_bus.php"><li>
		<i class="fas fa-bus-alt fa-4x"></i>
		<h3>Gestion des bus</h3>
	</li></a>
	
	
	<a href="ajout_bus.php"><li>
		<i class="fas fa-bus-alt fa-4x"></i>
		<h3>Ajout de bus</h3>
	</li></a>


	<a href="chambres.php"><li>
		<i class="fas fa-bed fa-4x"></i>
		<h3>Gestion des chambres</h3>
	</li></a>


	<a href="messagerie.php"><li>
		<i class="far fa-envelope fa-4x"></i>
		<h3>Discussion</h3>
	</li></a>
</ul>


<br />

<br />


</div>

<div id="footer">
<?php include("includes/footer.php");?>
</div>

</body>
</html>
