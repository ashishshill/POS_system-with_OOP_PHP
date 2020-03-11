<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertEmp = $com->empInsert($_POST);
  }
?>
<?php
  if ($aStatus > 1) {
    echo "<script>window.location='index.php'</script>";
  }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert New Employee Information Here
                        </div>
                        <?php
                          if (isset($insertEmp)) {
                            echo $insertEmp;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" >
                                        <div class="form-group">
                                            <label> Name</label>
                                            <input type="text" class="form-control" placeholder="Enter employee name" name="empName">
                                        </div>
                                        <div class="form-group">
                                            <label> Contact</label>
                                            <input type="tel" class="form-control" placeholder="Enter contact number" name="empContact">
                                        </div>
                                        <div class="form-group">
                                            <label> E-mail </label>
                                            <input type="email" class="form-control" placeholder="Enter E-mail address" name="empMail">
                                        </div>
                                        <div class="form-group">
                                            <label> Address</label>
                                            <textarea class="form-control" name="empAddress" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label> NID Information</label>
                                            <input type="number" class="form-control" placeholder="Enter NID code" name="empNID">
                                        </div>

                                        <div class="form-group">
                                            <label>Select Branch</label>
                                            <select class="form-control" name="branchId">
                                              <?php
                                                $getBranch = $com->getAllbranch();
                                                if ($getBranch) {
                                                  while ($result = $getBranch->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $result['branchId']; ?>"><?php echo $result['branchName']; ?></option>
                                              <?php } } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Employee ID</label>
                                            <input type="number" class="form-control" placeholder="Enter employee ID" name="empId">
                                        </div>
                                        <div class="form-group">
                                            <label>Select Status</label>
                                            <select class="form-control" name="status">
                                              <?php
                                                $getStatus = $com->getAllStatus();
                                                if ($getStatus) {
                                                  while ($value = $getStatus->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $value['statId']; ?>"><?php echo $value['status']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>

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
