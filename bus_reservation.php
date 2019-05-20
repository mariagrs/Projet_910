<?php

session_start();

require('includes/utility.php');

if($_SESSION)
{
		if($_SESSION['type'] == 1)
		{
				include('ajout_bus.php');
		}

		else {
			include('bus_reservation_utilisateur.php');
		}
}

?>
