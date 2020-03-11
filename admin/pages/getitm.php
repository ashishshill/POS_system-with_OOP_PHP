<?php include_once "../inc/header.php"; ?>
<?php
  $quantity = $_POST['quantity'];
  $id       = $_POST['id'];
  $productAdd = $ct->addToCart($quantity, $id);
 ?>
