<?php   include "../inc/header.php";

$query="SELECT * from tbl_sales WHERE DATE(`date`) = '2018-8-23'";
$query="SELECT * from tbl_sales WHERE MONTH(DATE(`date`)) = '8'";
$query="SELECT * FROM `tbl_sales` WHERE MONTHNAME(DATE(`date`))='January'";

$q
 ?>
