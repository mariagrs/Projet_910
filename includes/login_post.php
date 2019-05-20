<?php

  require('db/AccountManager.php');

  function login()
  {

      if(isset($_POST['pwd']) && isset($_POST['email']))
      {
          $am = new AccountManager();

          $data = $am->login($_POST['email'], $_POST['pwd']);


          if(!empty($data))
          {
              $_SESSION['name']     = $data['name'];
              $_SESSION['surname']  = $data['surname'];
              $_SESSION['email']    = $data['email'];
              $_SESSION['id']       = $data['id'];
              $_SESSION['type']     = $data['type'];

              return true;
          }

          else
          {
            echo '<p>Wrong email or password</p>';
            return false;
          }
      }
  }

?>
