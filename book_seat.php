<?php

	session_start();
    
	require('includes/db/BusTable.php');
	
	$db = new Database();
	
	$result = $db->prepare("SELECT * FROM places WHERE eleve_id = ?");
    $result->execute(array($_SESSION['id']));
		  
	if($result->fetch()){
		
		$supp = $db->prepare("DELETE FROM places WHERE eleve_id = ?");
		$supp->execute(array($_SESSION['id']));
	}
	if(isset($_GET['seat']))
	{
		$bm = new BusTableManager();
		$bm->bookSeat( $_GET['bus_id'], $_GET['eleve_id'], $_GET['seat']);
	}
	

 ?>
