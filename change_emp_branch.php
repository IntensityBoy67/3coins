<?php 

require 'required/insert_model.php';

$model_insert->update_branch($_POST['emp_id'], $_POST['branch_id']);

header("Location: controller.php?page=list_users");

?>