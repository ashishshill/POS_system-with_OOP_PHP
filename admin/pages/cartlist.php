<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

<?php
  if (isset($_GET['delPro'])) {
    $delId = $_GET['delPro'];
    $delPro = $ct->delProductById($delId);
  }
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productCtUp = $ct->updateCartQ($_POST);
  }
  ?>


      <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Cart Item List</h1>
              </div>
              <!-- /.col-lg-12 -->
            <?php
              if (isset($delPro)) {
                echo $delPro;
              }
            ?>
          </div>
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
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    $qty=0;
                                    $sum=0;
                                    $getPd = $ct->getCartProduct();
                                    if ($getPd) {
                                      $i = 0;
                                      while ($result = $getPd->fetch_assoc()) {
                                        $i++;
                                  ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['pdName']; ?></td>
                                            <td>
                                              <form action="" method="post">
                                                <input type="hidden" name="inventId" value="<?php echo $result['inventId']; ?>"/>
                              									<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
                              									<input type="submit" name="submit" value="Update"/>
                              								</form>
                                            </td>
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
                                                echo $total ; ?>
                                            </td>
                                            <td><?php echo $result['price']; ?></td>
                                            <td><?= $v; ?>%</td>
                                            <input type="hidden" name="id" value="<?php echo $result['inventId']; ?>" style="border: none;" id="id" readonly>
                                            <td>
                                              <a href="?delPro=<?php echo $result['inventId']; ?>">
                                                <button type="button" id="cart_del" class="btn btn-danger btn-sm"><i class="fa fa-times"> Remove</i></button>
                                              </a>
                                            </td>
                                        </tr>
                                        <?php
                                          $qty = $qty + $result['quantity'];
                                          $sum = $sum + $total;

                                          Session::set("sum", $sum);
                                          Session::set("qty", $qty);
                                        ?>
                                  <?php } } ?>
                                  </tbody>
                              </table>
                              <table style="float:right; text-align:left;" width="40%">
                                <?php
                                $getData = $ct->checkCartTable();
                                if ($getData) {
                                ?>
                                <tr>
                                  <th>Sub Total : </th>
                                  <td><?php echo $sum; ?>tk</td>
                                </tr>
                             <?php
                               } else {
                                //header("Location: index.php");
                                echo "Cart Empty! ";
                               }
                             ?>
                              </table>
                          </div>
                          <!-- /.table-responsive -->
                          <br>
                          <div style="float:left;">
                            <a href="customer.php">
                              <button type="button" class="btn btn-primary btn-lg">Proceed</button>
                            </a>
                            <a href="cartadd.php">
                              <button type="button" class="btn btn-primary btn-lg">Back</button>
                            </a>
                          </div>
                      </div>
                      <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
    </script>

</body>

</html>
