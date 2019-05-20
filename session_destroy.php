<?php
  session_start();
  session_unset();
  session_destroy();

  if(isset($_GET['comeback'])){
    header('location: ' . $_GET['comeback']);
  }

?>
