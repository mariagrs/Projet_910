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

<div class="col-md-4 col-md-offset-4">
    <h1 class ="policeBus"><i class="fas fa-bus-alt"></i><b> Ajout d'un bus</b></h1>
	<br>
<form method="post" class="form-horizontal" >
  <div class="form-group ">
    <label class="control-label col-sm-5" >Nom du Bus:</label>
    <div class="col-sm-6">
      <input type="nomBus" name="nom" class="form-control" placeholder="Entrer le nom du bus">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" >Nombres de places par rangée:</label>
    <div class="col-sm-4"> 
      <input  class="form-control" name="nbrPlaceRangee" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-5" >Nombres de rangées:</label>
    <div class="col-sm-4"> 
      <input  class="form-control" name="nbrRangee"  >
    </div>
  </div>
  <div class="form-group"> 
  <label class="control-label col-sm-5" >Type du Bus:</label>
    &nbsp;
    <label class="radio-inline">
		<input type="radio" name="optradio" value ="Calme" >Calme
    </label>
    <label class="radio-inline">
		<input type="radio" name="optradio" value ="Bruyant">Bruyant
    </label>
   
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-6 col-sm-5">
      <button type="submit" class="btn btn-default">Créer</button>
    </div>
  </div>
</form>

 
<?php

require('includes/db/Database.php');
      $db = new Database () ;
    
   
      if (isset($_POST['optradio']) AND isset($_POST['nom']) AND isset($_POST['nbrRangee']) AND isset($_POST['nbrPlaceRangee']))
    {
    
	   
        try
        {
            $requete=$db->prepare("INSERT INTO bus(type, nb_places_par_rangee, nb_rangees, nom ) VALUES(:type,:nb_places_par_rangee,:nb_rangees,:nom)");
            
			$requete->execute(array(
              'type' => $_POST['optradio'],
              'nb_places_par_rangee' => $_POST['nbrPlaceRangee'],
              'nb_rangees' => $_POST['nbrRangee'],
              'nom' => $_POST['nom'] 
            ));
			
			
        }
        catch(EXCEPTION $e)
        { 
           
            die('Erreur : '.$e->getMessage());
        }

}

?>



</div>
</div>

<div id="footer">

<?php include("includes/footer.php");?>

</div>


</body>
</html>
