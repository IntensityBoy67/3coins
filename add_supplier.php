<?php 

require 'required/insert_model.php';

$model_insert->add_supplier($_POST['supplier_name'], $_POST['location'], $_POST['cont_number']);

header("Location: controller.php?page=list_supplier");

?>