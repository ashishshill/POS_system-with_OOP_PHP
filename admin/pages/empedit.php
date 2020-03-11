<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['emp']) || $_GET['emp'] == NULL) {
    echo "<script> window.location = 'emplist.php'; </script>";
  } else {
    $id = $_GET['emp'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateEmp = $com->empUpdate($_POST, $id);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Employee Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Employee Information Here
                        </div>
                        <?php
                          if (isset($updateEmp)) {
                            echo $updateEmp;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getEmp = $com->getEmpById($id);
                                    if ($getEmp){
                                      while($value = $getEmp->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                        <div class="form-group">
                                            <label> Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value['empName']; ?>"  name="empName">
                                        </div>
                                        <div class="form-group">
                                            <label> Contact</label>
                                            <input type="tel" class="form-control" value="<?php echo $value['empContact']; ?>" name="empContact">
                                        </div>
                                        <div class="form-group">
                                            <label> E-mail </label>
                                            <input type="email" class="form-control" value="<?php echo $value['empMail']; ?>" name="empMail">
                                        </div>
                                        <div class="form-group">
                                            <label> Address</label>
                                            <textarea class="form-control" name="empAddress" rows="3"><?php echo $value['empAddress']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label> NID Information</label>
                                            <input type="number" class="form-control" value="<?php echo $value['empNID']; ?>" name="empNID">
                                        </div>

                                        <div class="form-group">
                                            <label>Select Branch</label>
                                            <select class="form-control" name="branchId">
                                              <?php
                                                $getBranch = $com->getAllbranch();
                                                if ($getBranch) {
                                                  while ($result = $getBranch->fetch_assoc()) {
                                              ?>
                                              <option
                                              <?php
                                              if ($value['branchId'] == $result['branchId']) { ?>
                                                 selected = "selected"
                                            <?php } ?>
                                               value="<?php echo $result['branchId']; ?>"
                                               ><?php echo $result['branchName']; ?></option>
                                              <?php } } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Employee ID</label>
                                            <input type="number" class="form-control" value="<?php echo $value['empId']; ?>" name="empId">
                                        </div>
                                        <div class="form-group">
                                            <label>Position</label>
                                            <select class="form-control" name="status">
                                              <?php
                                                $getCat = $cat->getAllStatus();
                                                if ($getCat) {
                                                  while ($result = $getCat->fetch_assoc()) {
                                              ?>
                                              <option
                                              <?php
                                              if ($value['position'] == $result['statId']) { ?>
                                                 selected = "selected"
                                            <?php } ?>
                                               value="<?php echo $result['catId']; ?>"
                                               ><?php echo $result['catName']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>

                                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                      </form>
                                    <?php } } ?>
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
