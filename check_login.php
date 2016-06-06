<?php 


  require 'required/connect.inc.php';



$res= mysqli_query($con, "SELECT * FROM login 

	WHERE username = '". $_POST['uname']."' AND password = SHA1('".$_POST['password']."') ") 

	or die(mysqli_error($con));

$result_query= mysqli_fetch_assoc($res);

if(mysqli_num_rows($res) == 1){

	session_start();

$_SESSION['uname']= $_POST['uname'];
$_SESSION['employee_id']= $result_query['employee_id'];
$_SESSION['type']= $result_query['login_type'];
$_SESSION['username']= $result_query['username'];
$_SESSION['branch_id']= $result_query['branch_id'];

header("Location: controller.php?page=inventory&branch_id=".$result_query['branch_id']);

 
}



?>