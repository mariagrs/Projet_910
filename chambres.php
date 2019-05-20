<?php

session_start();

require('includes/utility.php');

if($_SESSION)
{
		if($_SESSION['type'] == 1)
		{
				include('chambres_gestion_admin.php');
		}

		else {
			include('chambres_utilisateur.php');
		}
}

?>
