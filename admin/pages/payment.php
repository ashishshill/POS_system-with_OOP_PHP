<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

<?php
  if (isset($_GET['orderId'])) {
      //$cmId = Session::get("cmId");
      $cmId = $_GET['orderId'];
      $sum = Session::get('sum');
      $insertSales = $or->saleInsert($sum, $cmId);
      $insertOrder = $or->orderProduct($cmId);
      $delData = $ct->delCustomerCart();
  }
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $payUp = $pay->paymentSystem($_POST, $amount);
    // $rent = $_POST['remaining'];
    // if ( $rent = 0) {
    //   $payUp = $pay->paymentSystem($_POST, $amount );
    // } elseif ($rent > 0 && $rent >= $amount) {
    //   $payUp = $pay->paymentSystem($_POST, $amount);
    // } else {
    //   echo "DAMNIT";
    // }
  }
?>

<script src="../vendor/jquery/jquery.min.js"></script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Payment Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert Customer Payment Here
                        </div>
                        <?php
                          if (isset($insertSales)) {
                            echo $insertSales;
                          }

                          if (isset($payUp)) {
                            echo $payUp;
                          }

                          if (isset($recover)) {
                            echo $recover;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Select Payment Type</label>
                                          <select class="form-control" name="payId" id="payment_type">
										  <option value="0">--Please select--</option>
                                            <?php
                                              $getPay = $pay->getAllPay();
                                              if ($getPay) {
                                                while ($result = $getPay->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['payment']; ?></option>
                                          <?php } } ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label> Amount</label>
                                          <input type="number" class="form-control" placeholder="Enter amount" name="amount" oninput="CheckValue()" id="amount1">
                                      </div>

                                      <?php
                                          $sum = Session::get("sum");
                                      ?>
                                      <?php
                                      $total = 0;
                                      $sale = Session::get('sale');
                                      $payBack = $pay->payById($sale);
                                      if($payBack) {
                                      while ($value = $payBack->fetch_assoc()) {
                                      ?>

                                      <?php
                                      $payId = $value['payment'];
                                      $payRo = $pay->payPerView($payId);
                                      $row_count = $payRo->num_rows;
                                      if ($row_count > 0) {
                                      while ($ro = $payRo->fetch_assoc()) {
                                      ?>
                                      <?php
                                        $amount = $value['amount'];
                                      ?>
                                      <?php } } ?>
                                      <?php
                                      $total = $total + $amount;
                                      ?>
                                      <?php } } ?>

                                      <input type="hidden" name="remaining" value="<?php
                                        $remaining = $sum - $total;
                                        echo $remaining;
                                      ?>"
                                      style="border: none;" id="id" readonly>

                                      <input type="submit" class="btn btn-primary" name="submit" value="Pay" oninput="CheckValue2()">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          Payment and Due Information
                      </div>
                      <div class="panel-body">

                      <form role="form" method="post">
                        <div class="form-group">
                            <label>Sub Total : </label>
                            <input type="text" name="id" value="<?php
                                // $sum = Session::get("sum");
                                echo $sum;
                              ?>tk"
                               style="border: none;" id="id" readonly>
                        </div>
                        <?php
                          $total = 0;
                          $sale = Session::get('sale');
                          $payBack = $pay->payById($sale);
                          if($payBack) {
                            while ($value = $payBack->fetch_assoc()) {
                        ?>

                        <?php
                          $payId = $value['payment'];
                          $payRo = $pay->payPerView($payId);
                          $row_count = $payRo->num_rows;
                          if ($row_count > 0) {
                            while ($ro = $payRo->fetch_assoc()) {
                        ?>
                        <div class="form-group">
                            <label>
                              <?php echo $ro['payment']; ?>
                            </label>
                            <input type="text" name="amountp" value="<?php
                              $amount = $value['amount'];
                              echo $amount;
                            ?>tk"
                            style="border: none;" id="id" readonly>
                        </div>
                        <?php } } ?>
                        <?php
                          // $total = $total + $amount;
                        ?>
                      <?php } } ?>

                        <div class="form-group">
                            <label>Total Paid : </label>
                            <input type="text" name="amountpaid" value="<?php
                               echo $total;
                            ?>"
                            style="border: none;" id="id" readonly>
                        </div>
                        <div class="form-group">
                            <label>Remaining : </label>
                            <input type="text" name="remaining" value="<?php
                              // $remaining = $sum - $total;
                              echo $remaining;
                            ?>tk"
                            style="border: none;" id="id" readonly>
                        </div>
                      </form>
                    </div>
                  <?php
                    if ($remaining == 0) {
                      $sale = Session::get('sale');
                     

                      
                      //echo $sale;
                      $recover = $or->saleStatus($sale);
                      echo "<script>window.location = 'success.php?'".$sale."</script>";
                       //header('location: success.php?sale='.$sale);
                    }
                  ?>
                </div>
              </div>
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="../vendor/metisMenu/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="../dist/js/sb-admin-2.js"></script>
  <script>
		function CheckValue(sender){
			var amount = document.getElementById('amount').value;
			
			
			
		
			
			if(!isNaN(amount)){
				swal('Please enter only Number', '', 'warning');
				document.getElementById('amount').value='';
				return false;
		}
	}
	function CheckValue2(){
		var amount = document.getElementById('amount').value;
		var payment_type = document.getElementById('payment_type').value;
		
		
		
		
		
		if(amount==""){
			swal('Please Input Amount !', '', 'warning')
			return false;
		}
		if(payment_type=="0"){
			swal('Please Select Payment Type !', '', 'warning')
			return false;
		}
		
		
	}	
	</script>

</body>

</html>
