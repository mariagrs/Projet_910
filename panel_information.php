
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="ressources/css/info.css">

	<?php include("includes/head-tag-contents.php");?>

</head>
<body>
<?php include("includes/config.php");?>


<?php include("includes/social-media.php"); ?>
<?php include("includes/navigation.php"); ?>
<script>
var vid = document.getElementById("bgvid");
var pauseButton = document.querySelector("#polina button");

if (window.matchMedia('(prefers-reduced-motion)').matches) {
    vid.removeAttribute("autoplay");
    vid.pause();
    pauseButton.innerHTML = "Paused";
}

function vidFade() {
  vid.classList.add("stopfade");
}

vid.addEventListener('ended', function()
{
// only functional if "loop" is removed 
vid.pause();
// to capture IE10
vidFade();
}); 


pauseButton.addEventListener("click", function() {
  vid.classList.toggle("stopfade");
  if (vid.paused) {
    vid.play();
    pauseButton.innerHTML = "Pause";
  } else {
    vid.pause();
    pauseButton.innerHTML = "Paused";
  }
})



</script>

<div id="polina">
<h1>WEI EFREI</h1>
<p>

<p>
	<FONT size="5">Que serait le groupe Efrei sans ses associations événementielles ? Sans doute une école très différente ! Ces associations jouent en effet un rôle important dans la vie des étudiants, en facilitant la création de liens, toutes promos confondues. Avec les passages obligés (le week-end d’intégration, le Gala) comme dans la vie plus quotidienne grâce au Bureau des Etudiants, elles participent à la qualité de l’ambiance quotidienne et à la constitution progressive d’un réseau solide, inscrit dans la durée.Les membres de l’association ont pour mission d’accueillir les nouveaux venus. Et tant qu’à faire, ils le font bien ! Pour faciliter l’intégration de chacun, ils proposent de nombreux événements lors du mois d’arrivée des élèves : petit déjeuner, rallye culturel, journée Sidaction, barbecue, soirées, des activités sportives et la découverte des associations étudiantes.Le programme aux petits oignons concocté par l’équipe a un point d’orgue, le fameux WEI (week-end d’intégration). Le principe ? Tout le monde part en week-end vers une destination mystère. Une seule certitude : le programme sera fait de soirées, de jeux et de nombreuses surprises.</FONT><BR>
</p>
<button>OK</button>
</div>

<div id="video-fond" style="max-height: 800px; height: 800px;"><video playsinline="" autoplay="" loop="" muted=""> <source src="wei.mp4"></video></div>


<br />

<br />

<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
  <source src="wei.mp4" type="video/webm">
<source src="wei.mp4" type="video/mp4">

</video>


</div>

<div id="footer">
<?php include("includes/footer.php");?>
</div>

</body>
</html>

