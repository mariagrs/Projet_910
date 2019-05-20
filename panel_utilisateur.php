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
	<a href="bus_reservation.php"><li>
		<i class="fas fa-bus-alt fa-4x"></i>
		<h3>Réservation de place</h3>
	</li></a>


	<a href="chambres.php"><li>
		<i class="fas fa-bed fa-4x"></i>
		<h3>Réservation des chambres</h3>
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
