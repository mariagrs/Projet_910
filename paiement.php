<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/head-tag-contents.php");?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="ressources/css/paiement.css">
</head>
<body>


<div id="wrapper">

<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>

<h1 class="centrerTexte">Paiement du week-end</h1>
<div class="col-sm-8 centrerPaiement">
<div class="aa">

</div>
		<div class="col-25 ">
				<div class="container-paiement">
				  <h4 style="color: black">Panier <span class="price"><i class="fa fa-shopping-cart"></i> <b>1</b></span></h4>
				  <p><a href="#">Week end d'intégration </a> <span class="price">100</span></p>
				  <hr>
				  <p>Total <span class="price"><b>100 euros </b></span></p>
				</div>
		</div>
		
		<br />


<div class="row_paiement">
  <div class="col-75 ">
    <div class="container-paiement">
      
      
        

          <div class="col-50 ">
					<h3 style="color: black">Paiement</h3>
					
					<label for="fname">Cartes acceptées :</label>
					<div class="icon-container">
					    <i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
					</div>
					
					<label>Nom</label>
					<input type="text" name="cardname" placeholder="Entrer votre nom">
					<label>Numéro de votre carte</label>
					<input type="text" name="cardnumber" placeholder="Entrer le numéro inscrit sur votre carte">
					<div class="test">
					<label>Mois d'expiration</label>
					<select class="form-control" name="type1"> 
					<option value="Janvier">Janvier</option>
					<option value="Février">Février</option>
					<option value="Mars">Mars</option>
					<option value="Avril">Avril</option>
					<option value="Mai">Mai</option>
					<option value="Juin">Juin</option>
					<option value="Juillet">Juillet</option>
					<option value="Août">Août</option>
					<option value="Septembre">Septembre</option>
					<option value="Octobre">Octobre</option>
					<option value="Novembre">Novembre</option>
					<option value="Décembre">Décembre</option>
					</select>
					</div>
					<label>Année d'expiration</label>
					<input type="text" name="expyear" placeholder="Entrer l'année d'expiration de votre carte">
					<label >Cryptogramme visuel</label>
					<input type="text" name="CV" placeholder="Entrer le cryptogramme visuel de votre carte">
					  
					
          </div>
          
    </div>
					<label>
					<div class="classButton">
					<input type="checkbox" name="sameadr"> j'ai lu et j'accepte les conditions d'utilisation
					</div>
					</label>
					<button class="btn btn-success" onclick="openForm()">Confirmer le paiement</button>
					
					
					
					
					<div class="form-popup" id="myForm">
					  <form class="form-container11">
						<div class="ch">
						<p>Votre paiement a bien été effectué ... Nous vous remercions pour votre achat et vous souhaitons un bon week-end d'intégration  </p>
						</div>
					  </form>
					</div>

    </div>
</div>

</div>

</div>



<div id="footer">

<?php include("includes/footer.php");?>

</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>
