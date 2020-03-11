<?php include_once "../inc/header.php"; ?>
<?php
  $dName = $_POST['date_name'];
  $saleByDate = $com->findSaleByDate($dName);
 ?>
