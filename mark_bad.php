<?php 

require 'required/connect.inc.php';


mysqli_query($con, "UPDATE restocks_history SET flag = 0 WHERE  restocks_prod_id = ". $_GET['restocks_prod_id']);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>