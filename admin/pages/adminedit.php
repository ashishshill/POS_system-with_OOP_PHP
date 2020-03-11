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
<?php
if (!isset($_GET['admin']) || $_GET['admin'] == NULL) {
  echo "<script> window.location = 'sublist.php'; </script>";
} else {
  $id = $_GET['admin'];
}
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateAdmin = $com->adminUpdate($_POST, $id);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Admin Information Here
                        </div>
                        <?php
                          if (isset($updateAdmin)) {
                            echo $updateAdmin;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" >
                                      <?php
                                        $getAdmin = $com->getAdminById($id);
                                        if ($getAdmin) {
                                          $i = 0;
                                          while ($result = $getAdmin->fetch_assoc()) {
                                            $i++;
                                      ?>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $result['adminUser']; ?>" name="adminUser">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="<?php echo $result['adminPass']; ?>" name="adminPass">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $result['adminMail']; ?>" name="empMail">
                                        </div>
                                    <div class="form-group">
                                            <label>Employee ID</label>
                                            <input type="number" class="form-control" placeholder="<?php echo $result['empId']; ?>" name="empId">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                              <?php
                                              if ($result['status'] == 0) { ?>
                                                <option value="0" selected>Admin</option>
                                                <option value="1">Management</option>
                                                <option value="2">General</option>
                                              <?php } elseif ($result['status'] == 1) { ?>
                                                <option value="0">Admin</option>
                                                <option value="1" selected>Management</option>
                                                <option value="2">General</option>
                                              <?php } elseif ($result['status'] == 2) { ?>
                                                <option value="0">Admin</option>
                                                <option value="1">Management</option>
                                                <option value="2" selected>General</option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <?php } } ?>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
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

</body>

</html>
