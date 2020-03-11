<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['brc']) || $_GET['brc'] == NULL) {
    echo "<script> window.location = 'branchlist.php'; </script>";
  } else {
    $id = $_GET['brc'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateBranch = $com->branchUpdate($_POST, $id);
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
                    <h1 class="page-header">Edit Branch Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Branch Information Here
                        </div>
                        <?php
                          if (isset($updateBranch)) {
                            echo $updateBranch;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getBranch = $com->getBranchById($id);
                                    if ($getBranch){
                                      while($result = $getBranch->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Branch Name</label>
                                          <input type="text" class="form-control" value="<?php echo $result['branchName']; ?>" name="branchName">
                                      </div>
                                      <div class="form-group">
                                          <label>Branch Address</label>
                                          <textarea class="form-control" name="branchAddress" rows="3"><?php echo $result['branchAddress']; ?></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label>Branch ID</label>
                                          <input type="number" class="form-control" value="<?php echo $result['branchId']; ?>" name="branchId">
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
