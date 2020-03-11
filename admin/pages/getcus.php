<?php
  include_once "../../class/Customer.php";
  $cm = New Customer();
  $number = $_POST['number'];
  $cusCheck = $cm->getCus($number);
 ?>
