<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>
<body>

<div id="wrapper">

<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>



<h2>Cherchez votre question : </h2>
</br>
  <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search..">
  <br>
 
    <thead>
      <tr>
        <th><i class ="questionCSS"></i></th>
      </tr>
    </thead>
	<div class ="spaceTable">
    <tbody id="accordion">
      <?php
      require('includes/db/Database.php');
      $db = new Database () ;
      $q = $db -> query ('SELECT * from faq');
     
      while ($faq = $q ->fetch()){
		
		

      ?>

    

		
		<button class="collapsible" id="accordion"><b><?php echo ' '.$faq['question'].' ' ?></b></button>
		<div class="content">
		<br>
		<p><i><?php echo ' '.$faq['reponse'].' ' ?></i></p>
		</div>
     
	
	<?php 
      

      }
	  
     ?>
	  </tbody>

 


</div>
</div>


<div id="footer">

<?php include("includes/footer.php");?>

</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}


function myFunction() {
    var input, filter, ul, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("accordion");
	
    for (i = 0; i < coll.length; i++) {
        a = coll[i].getElementsByTagName("b")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            coll[i].style.display = "";
        } else {
            coll[i].style.display = "none";
        }
    }
}

</script> 


		
</body>
</html>