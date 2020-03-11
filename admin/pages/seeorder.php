<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

<style>
  
  @media print {
  .btn {
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


        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="page-header">Order List</h1>
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
                $st = $get['rem'];
          ?>
                        <div class="panel-heading">
                            DataTable for products in sale information
                        </div>
                        <div class="panel-heading">
              <?php
                $id = $get['customer'];
                $getCus = $cm->getCusById($id);
                if ($getCus) {
                  while($cus = $getCus->fetch_assoc()) {
              ?>
                            Customer: <?= $cus['customName']; ?>
              <?php } } ?>
                        </div>
                        <div class="panel-heading">
                            Date: <?php echo $fm->formatDate($get['date']); ?>
                        </div>
          <?php } } ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Sub Price</th>
                                            <th>Item Profit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                            <?php
                              $getAdmin = $or->getOrderBySale($sale);
                              if ($getAdmin) {
                                $t_prof = 0;
                                $i = 0;
                                while ($result = $getAdmin->fetch_assoc()) {
                                  $i++;
                            ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                          <?php
                                            $id = $result['inventId'];
                                            $getPd = $pd->getPdById($id);
                                            $up = 0;
                                            $sp=0;
                                            if ($getPd){
                                              while($value = $getPd->fetch_assoc()){
                                          ?>
                                              <td><?= $value['pdName'] ?></td>
                                              <td><?= $value['ppu'] ?></td>
                                              <?php $up = $value['ppu'];
                                                      $sp = $value['ppu'] - $value['bpu'];
                                               ?>

                                          <?php } } ?>
                                              <td><?= $result['quantity']; ?></td>
                                              <td><?= $result['quantity'] * $up ; ?></td>
                                              <td><?= $result['quantity'] * $sp ; ?></td>
                                              <?php $t_prof  +=  ($result['quantity'] * $sp);?>
                                          </tr>
                          <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-heading">
                            Total Sales Profit: <?php echo $t_prof; ?>
                        </div>
                      </div>
                      <!-- /.panel -->
                      <a
                        href="
                    <?php if ($st == 0) {
                      echo 'complist.php';
                    } elseif ($st > 0) {
                        echo 'duelist.php';
                      }  ?>" class="btn btn-primary btn-sm">
                     Back
                      </a>
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
