<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

<style>
  
  @media print {
  .btn, .noprint {
    display: none;
  }
}
</style>

<?php
  if (!isset($_GET['sale']) || $_GET['sale'] == NULL) {
    echo "<script> window.location = 'index.php'; </script>";
  // } elseif (!isset($_GET['st']) || $_GET['st'] == NULL) {
  //     echo "<script> window.location = 'index.php'; </script>";
  } else {
    $sale = $_GET['sale'];
    // $st   = $_GET['st'];
  }
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payUp = $pay->paymentSystemZ($_POST, $sale);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="page-header">Payment List</h1>
                </div>
                <div class="col-md-2"><button class="btn btn-primary btn-block" style="margin-top: 35px;" onclick="printPage()">Print PDF</button></div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
          <?php
            $getSale = $com->getSaleById($sale);
            if ($getSale) {
              while ($get = $getSale->fetch_assoc()) {
          ?>
                        <div class="panel-heading">
                            DataTable for payments of sale information
                        </div>
                        <div class="panel-heading">
              <?php
                $id = $get['customer'];
                $getCus = $cm->getCusById($id);
                if ($getCus) {
                  while($cus = $getCus->fetch_assoc()) {
                    $st = $get['rem'];
              ?>
                            Customer: <?= $cus['customName']; ?>
              <?php } } ?>
                        </div>
                        <div class="panel-heading">
                            Date: <?php echo $fm->formatDate($get['date']); ?>
                        </div>
                        <div class="panel-heading">
                            Total Cost: <?php echo $get['totalPrice']; ?>tk
                        </div>
              <?php if($get['rem'] > 0) { ?>
                        <div class="panel-heading">
                            Remaining: <?php echo $get['rem']; ?>tk
                        </div>
              <?php } else { ?>
                <div class="panel-heading">
                    Payment Cleared.
                </div>
              <?php } ?>
          <?php } } ?>
          <?php
            if (isset($payUp)) {
              echo $payUp;
            }
          ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Payment</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                            <?php
                              $getAdmin = $pay->payById($sale);
                              if ($getAdmin) {
                                $i = 0;
                                while ($result = $getAdmin->fetch_assoc()) {
                                  $i++;
                            ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                          <?php
                                            $id = $result['payment'];
                                            $getPd = $pay->getPayById($id);
                                            if ($getPd){
                                              while($value = $getPd->fetch_assoc()){
                                          ?>
                                              <td><?= $value['payment'] ?></td>
                                          <?php } } ?>
                                              <td><?= $result['amount'] ?></td>
                                              <td><?php echo $fm->formatDate($result['date']); ?></td>
                                          </tr>
                          <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
              <?php
                $getSale = $com->getSaleById($sale);
                if ($getSale) {
                  while ($get = $getSale->fetch_assoc()) {
                  if ($get['rem'] > 0 ) {
                ?>

                        <div class="panel-body noprint">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Select Payment Type</label>
                                          <select class="form-control" name="payId">
                                            <option value="">--Please Select--</option>
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
                                          <input type="number" class="form-control" placeholder="Enter amount" name="amount">
                                      </div>

                                      <input type="hidden" class="form-control" value="<?php echo $get['totalPrice']; ?>" name="sum">
                                      <input type="hidden" class="form-control" value="<?php echo $get['customer']; ?>" name="cmId">
                                      <input type="hidden" class="form-control" value="<?php echo $sale; ?>" name="sale">
                                      <input type="hidden" class="form-control" value="<?php echo $get['rem']; ?>" name="remstorm">
                                      <input type="submit" class="btn btn-primary" name="submit" value="Pay">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                <?php } ?>
              <?php } } ?>
                      </div>
                      <!-- /.panel -->
                  <?php
                    $getSale = $com->getSaleById($sale);
                    if ($getSale) {
                      while ($get = $getSale->fetch_assoc()) {
                      $st = $get['rem'];
                      if ($st == 0) {
                  ?>
                    <a href="complist.php" class="btn btn-primary btn-sm">
                       Back
                    </a>
                  <?php } else { ?>
                    <a href="duelist.php" class="btn btn-primary btn-sm">
                       Back
                    </a>
                  <?php
                      }
                    }
                  }
                ?>

                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
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

      <!-- DataTables JavaScript -->
      <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
      <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="../dist/js/sb-admin-2.js"></script>

      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
      <script>
      $(document).ready(function() {
          $('#dataTables-example').DataTable({
              responsive: true
          });
      });
      function printPage() {
        window.print();
      }
      </script>

  </body>

  </html>
