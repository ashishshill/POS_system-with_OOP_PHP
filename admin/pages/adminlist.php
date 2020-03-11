<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($aStatus > 1) {
    echo "<script>window.location='index.php'</script>";
  }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Accessed Personnel List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable for Accessed Personnel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>E-mail</th>
                                            <th>Password</th>
                                            <th>ID</th>
                                            <th>Position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $getAdmin = $com->getAllAdmin();
                                        if ($getAdmin) {
                                          $i = 0;
                                          while ($result = $getAdmin->fetch_assoc()) {
                                            $i++;
                                      ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                              <td><?php echo $result['adminUser']; ?></td>
                                              <td><?php echo $result['adminMail']; ?></td>
                                              <td><?php echo $result['empId']; ?></td>
                                              <td>
                                                <?php
                                                  if ($result['status'] == 3) {
                                                    echo "General";
                                                  } elseif ($result['status'] == 2) {
                                                    echo "Management";
                                                  } elseif ($result['status'] == 1) {
                                                    echo "Admin";
                                                  } elseif ($result['status'] == 0) {
                                                    echo "Owner";
                                                  }
                                                ?>
                                              </td>
                                              <td>
                                                <a href="adminedit.php?admin=<?php echo $result['adminId']; ?>">
                                                  <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench"> Edit</i></button>
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
