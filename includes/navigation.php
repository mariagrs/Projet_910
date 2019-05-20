<nav class="navbar navbar-default">

 <div class="container-fluid">
   <div class="navbar navbar-expand-sm bg-light navbar-light">
   <div class="col-sm-10">
     <ul class="nav navbar-nav navbar-left">
       <li><a href="index.php" ><img src="ressources/images/starweilogo.png" class= "logo-starwei"></a></li>
       <li><a href="panel_information.php" class= "lien-navbar ">informations</a></li>
       <li><a href="#"class= "lien-navbar">tarifs</a></li>
       <li><a href="faq.php" class="lien-navbar">f.a.q</a></li>
     </ul>
   </div>
   <div class="col-sm-2">
     <ul class="nav navbar-nav navbar-right ">

       <?php

         // If the user is connected

         if(isset($_SESSION['id']))
         {
             // A popover is created

             echo '<li>';

             //-- Placement

             echo '<a href="#" data-toggle="popover" data-placement="bottom"';

             //-- Title

             echo 'title="' . strtoupper($_SESSION['surname']) . ' ' . strtoupper($_SESSION['name']) . '"';

             //-- Content

             echo 'data-content="';

             echo '<a href=\'panel.php\'>Mon compte</a><br />';
             echo '<a href=\'session_destroy.php?comeback=index.php\'>Se deconnecter</a>';

             echo '">';

             //-- Image

             echo '<img src="ressources/images/login.png" class="connexion-logo">';

             echo '</a>';
             echo '</li>';
         }

         else // If the user is not connected
         {
           //We put up a link to the login page
           ?>
           <li><a href="/connexion"><img src="ressources/images/login.png" class="connexion-logo"></a></li>

        <?php
         }
         ?>

     </ul>
   </div>
   </div>

 </div>
</nav>
