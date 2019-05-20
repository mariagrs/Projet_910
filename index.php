<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>


<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>

	<div class="slideshow-container">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">

	      <div class="item active">
	      <img src="ressources/images/starwei.jpg" alt="starwei" width="100%" height="345">
	      <div class="carousel-caption">

	      </div>
	      </div>

	      <div class="item">
	      <img src="ressources/images/Slide2.jpg" alt="wei" width="100%" height="345">
	      <div class="carousel-caption">

	      </div>
	      </div>

	      <div class="item">
	      <img src="ressources/images/Slide3.jpg" alt="party" width="100%" height="345">
	      <div class="carousel-caption">

	      </div>
	      </div>



	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	    </div>



	</div>


	 <?php include("includes/footer.php");?>




</body>
</html>
