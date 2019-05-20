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

<div class="container">

  <br />
  <br >

	<?php

			require("includes/login_post.php");
			require('includes/utility.php');

			if(!empty($_POST))
			{
				if(login()){
					echo '<meta http-equiv="refresh" content="0; URL=http://localhost/index.php">';
				}
			}

			else
			{
				$variables = ['src' => 'login.php'];
				includeFile("includes/login_form.php", $variables);
			}


		?>


</div>

</div>

<div id="footer">

<?php include("includes/footer.php");?>
</div>



</body>
</html>
