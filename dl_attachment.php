<?php
 
header("Content-Description: File Transfer"); 
header("Content-Type: application/octet-stream"); 
 
header("Location: ".$_GET['id']);

?>