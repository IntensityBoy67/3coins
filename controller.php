  
  <?php 
  
   session_start();

  require 'required/header.php'; ?>

  <?php require 'required/connect.inc.php'; ?>

   <header class="header dark-bg">

    <?php require 'required/nav_head.php'; ?>

    <?php require 'required/side_bar.php'; ?>

    <?php require 'required/nav_right.php'; ?>
    

   </header>    

 
     <?php 

     require 'required/model.php'; 
   
     require 'required/reports_model.php'; 



      ?>	

 
    <?php require $_GET['page'].'.php'; ?>
  
 

<?php require 'required/footer.php'; ?>