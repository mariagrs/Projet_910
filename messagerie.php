<?php include("includes/config.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<div id ="wrapper">



<?php include("includes/social-media.php");?>
<?php include("includes/navigation.php");?>


  <?php
	if (isset($_SESSION['id'])){
    	require('includes/db/AccountManager.php');
    	$am = new AccountManager();
      $db = new Database();
      $q = $db->prepare('SELECT * FROM users WHERE id!=?');
      $q->execute([$_SESSION['id']]);
     
      echo '<div class="messages-box">';
      echo '<div class="messages ">';
	 
          if(isset($_POST['message']) AND !empty($_POST['message']))
          {
			  
			  $am->WriteMessage($_POST['message'], $_SESSION['id']);
			  
          }
		  
          $am->printMessages($_SESSION['id']);
        
		  
		  $url = $_SERVER['PHP_SELF'] ;
  ?>

  <br>

	
	<div class="form-group messages-form">
		<form action=<?=$url?> method="post"> 
		<div>
		<div class="pull-left paperclip">
			<input type="file" id="file_upload_id" class ="align-messages-form" name="avatar" accept="image/png, image/jpeg" style="display:none" /> 
			<a href="#"><i class="fas fa-paperclip" onclick="_upload()"></i></a>
			&nbsp;
		</div>
		<div>
			<div class="input-group ">
		  <input type= "text" class="form-control align-messages-form" id="message-input" name="message" placeholder="Type message.." />
		
		  <span class="input-group-btn">
			<button type="submit" class="btn align-messages-form " id="message-submit"><i class="far fa-paper-plane"></i></button>
		  </span>
		  
		</div>
		</div>
		</div>
		
		</form>
	</div>
	
	
	

<?php
          
        echo '</div>';
        echo '</div>';
	
      
?>


</div>


	<?php
  }
	else {
		header('location: login.php');
	}
	?>
	
<div cle>

<div id="footer">

<?php include("includes/footer.php");?>
</div>

<script>
function _upload(){
    document.getElementById('file_upload_id').click();
}
</script>


</body>
</html>