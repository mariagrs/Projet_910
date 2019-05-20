<?php

session_start();

require('includes/utility.php');

if($_SESSION)
{
		if($_SESSION['type'] == 1)
		{
				include('panel_admin.php');
		}

		else {
			include('panel_utilisateur.php');
		}
}

?>
