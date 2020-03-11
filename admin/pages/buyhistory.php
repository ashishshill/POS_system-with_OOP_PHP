<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Payment Due List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable for sale with due payment information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Buying Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $getBuyHistory = $com->getBuyHistory();
                                        if ($getBuyHistory) {
                                          $i = 0;
                                          while ($result = $getBuyHistory->fetch_assoc()) {
                                            $i++;
                                      ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                            <?php
                                              $id = $result['inventory_id'];
                                              $getPd = $pd->getPdById($id);
                                              if ($getPd) {
                                                while($cus = $getPd->fetch_assoc()) {
                                            ?>
                                              <td><?= $cus['pdName']; ?></td>
                                            <?php } }else{
                                              echo "<td></td>";
                                            } ?>
                                              <td><?= $result['amount']; ?></td>
                                              <td><?= $result['total_price']; ?>tk</td>
                                              <td><?php echo $fm->formatDate($result['buying_date']); ?></td>
                                              <td>
                                                <a href="#">
                                                  <button type="button" class="btn btn-primary btn-sm"> See Detailts</button>
                                                </a>
                                              </td>
                                          </tr>
                                    <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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
