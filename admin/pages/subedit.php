<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['sub']) || $_GET['sub'] == NULL) {
    echo "<script> window.location = 'sublist.php'; </script>";
  } else {
    $id = $_GET['sub'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateSub = $cat->subUpdate($_POST, $id);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Sub Category Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Sub Category Information Here
                        </div>
                        <?php
                          if (isset($updateSub)) {
                            echo $updateSub;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getSub = $cat->getSubById($id);
                                    if ($getSub){
                                      while($value = $getSub->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Sub Category</label>
                                          <input type="text" class="form-control" value="<?php echo $value['subName']; ?>" name="subName">
                                      </div>
                                      <div class="form-group">
                                          <label>Select Category</label>
                                          <select class="form-control" name="catId">
                                            <?php
                                              $getCat = $cat->getAllCat();
                                              if ($getCat) {
                                                while ($result = $getCat->fetch_assoc()) {
                                            ?>
                                            <option
                                            <?php
                                            if ($value['catId'] == $result['catId']) { ?>
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
