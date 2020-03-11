<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category VAT List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable for Category VAT
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Category Name</th>
                                            <th>VAT</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                      $getVAT = $pay->getAllVAT();
                                      if ($getVAT) {
                                        $i = 0;
                                        while ($result = $getVAT->fetch_assoc()) {
                                          $i++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                        <?php
                                          $id = $result['catId'];
                                          $getCat = $cat->getCatById($id);
                                          if ($getCat) {
                                            while ($value = $getCat->fetch_assoc()) {
                                        ?>
                                            <td><?php echo $value['catName']; ?></td>
                                        <?php } } ?>
                                            <td><?= $result['vat']; ?>%</td>
                                            <td>
                                              <a href="vatedit.php?vat=<?php echo $result['id']; ?>">
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench"> Edit</i></button>
                                              </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                  <?php } } ?>
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
