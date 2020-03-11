<?php include_once "../inc/header.php"; ?>
<?php
  $quantity = $_POST['quantity'];
  $id       = $_POST['id'];
  $productCtUp = $ct->updateCartQ($quantity, $id);
 ?>
