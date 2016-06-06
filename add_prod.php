<?php 

require 'required/insert_model.php';

$model_insert->insert_product($_POST['prod_type'], $_POST['prod_name'], $_POST['prod_price'], $_POST['stock_units'], $_POST['supplier'], $_POST['init_stocks']);

header("Location: controller.php?page=inventory");

?>