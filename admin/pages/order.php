<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

      <div id="page-wrapper">
            <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Cart Item List</h1>
              </div>
            </div>
              <!-- /.col-lg-12 -->
          <div class="row">
              <div class="col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          DataTable for Cart Item Information
                      </div>
                      <div class="del"></div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <div class="table-responsive">
                              <table class="table table-hover" id="dataTables-example">
                                  <thead>
                                      <tr>
                                          <th>No.</th>
                                          <th>Product</th>
                                          <th>Amount</th>
                                          <th>Total Price</th>
                                          <th>Price per Unit</th>
                                          <th>VAT</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $getPd = $ct->getCartProduct();
                                      if ($getPd) {
                                        $i = 0;
                                        while ($result = $getPd->fetch_assoc()) {
                                          $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['pdName']; ?></td>
                                            <td><?php echo $result['quantity']; ?></td>
                                            <td>
                                              <?php
                                              $total = $result['quantity'] * $result['price'];
                                              $iId = $result['inventId'];
                                              $golden = $pay->getVATFromInvent($iId);
                                              if($golden != false) {
                                                while($gold = $golden->fetch_assoc()) {
                                                  $v = $gold['vat'];
                                                }
                                              }
                                              $vat = ( $total / 100 ) * $v;
                                              $total = round($total + $vat);
                                               echo $total; ?>
                                            </td>
                                            <td><?php echo $result['price']; ?></td>
                                            <td><?= $v; ?>%</td>
                                            <input type="hidden" name="id" value="<?php echo $result['inventId']; ?>" style="border: none;" id="id" readonly>
                                        </tr>
                                  <?php } } ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.table-responsive -->
                          <br>
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
                            Customer Information
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-6">
                                <form role="form">
                                    <?php
                                      $cmId = Session::get("cmId");
                                      $getCus = $cm->getCusById($cmId);
                                      if ($getCus) {
                                        while ($value = $getCus->fetch_assoc()) {
                                    ?>
                                      <div class="form-group">
                                          <label>Customer Name:</label>
                                          <input type="text" name="id" value="<?php echo $value['customName']; ?>" style="border: none;" id="id" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label>Phone Number:</label>
                                          <input type="text" name="id" value="<?php echo $value['customContact']; ?>" style="border: none;" id="id" readonly>
                                      </div>
                                    <?php } } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                  <table style="float:right; text-align:left;" width="40%">
                    <?php
                    $getData = $ct->checkCartTable();
                    if ($getData) {
                    ?>
                    <tr>
                      <th>Sub Total : </th>
                      <td>
                        <?php
                          $dis = $cm->getDiscount($cmId);
                          if($dis != false) {
                            while($d = $dis->fetch_assoc()) {
                              $discount = $d['discount'];
                            }
                          } else {
                            $discount = 0;
                          }

                          $sum = Session::get("sum");

                          $down = ( $sum / 100 ) * $discount;
                          $sum = round($sum - $down);
                          echo $sum;
                          Session::set('sum', $sum);
                        ?>tk
                      </td>
                      <th>Discount : </th>
                      <td><?php echo $discount; ?>%</td>
                    </tr>
                 <?php
                   }
                 ?>
                  </table>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div style="float:left;">
                  <a href="payment.php?orderId=<?= $cmId; ?>">
                    <button type="button" class="btn btn-primary btn-lg">Proceed</button>
                  </a>
                  <a href="cartadd.php">
                    <button type="button" class="btn btn-primary btn-lg">Back</button>
                  </a>
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
    </script>

</body>

</html>
