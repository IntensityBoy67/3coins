<?php 

require 'required/insert_model.php';

$model_insert->update_stocks(17, $_POST['new_stocks'], $_POST['new_price'], $_POST['branch_id'], $_POST['prod_id']);
 
header("Location: controller.php?page=inventory&branch_id=".$_POST['branch_id']);

exit;

?>