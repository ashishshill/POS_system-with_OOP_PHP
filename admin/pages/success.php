<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

<?php
 if (!isset($_GET['sale']) || $_GET['sale'] == NULL) {
   echo "<script> window.location = 'index.php'; </script>";
  } else {
    $sale = $_GET['sale'];
     //$st   = $_GET['st'];
  }
?>

<div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Success!</h1>
        </div>
      </div>
        <!-- /.col-lg-12 -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Payment Successful. Go back to Cart for the next purchase, <a href="cartadd.php">click here..</a>
                </div>
				<h2></h2>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <?php include "Invoice.php";  ?>
        </div>
      </div>
</div>
