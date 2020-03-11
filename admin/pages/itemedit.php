<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
if (!isset($_GET['itm']) || $_GET['itm'] == NULL) {
  echo "<script> window.location = 'itemlist.php'; </script>";
} else {
  $id = $_GET['itm'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $updatePd = $pd->productUpdate($_POST, $id);
}
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Item</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Item Information Here
                        </div>
                        <?php
                          if (isset($updatePd)) {
                            echo $updatePd;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php

                                    $getPd = $pd->getPdByIde($id);
                                    // if ($getPd){}else{echo 'no data found!';}
                                    if ($getPd){
                                      while($value = $getPd->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                        <div class="form-group">
                                            <label> Product</label>
                                            <input type="text" class="form-control" value="<?php echo $value['pdName']; ?>" name="pdName">
                                        </div>
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" name="catId">
                                              <?php
                                                $getCat = $cat->getAllcat();
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
                                        <div class="form-group">
                                            <label>Select Sub Category</label>
                                            <select class="form-control" name="subId">
                                              <?php
                                                $getSub = $cat->getAllSub();
                                                if ($getSub) {
                                                  while ($result = $getSub->fetch_assoc()) {
                                              ?>
                                              <option
                                              <?php
                                              if ($value['subId'] == $result['subId']) { ?>
                                                 selected = "selected"
                                               <?php } ?>
                                              value="<?php echo $result['subId']; ?>">
                                              <?php echo $result['subName']; ?></option>
                                            <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Brand</label>
                                            <select class="form-control" name="brandId">
                                              <?php
                                                $getBrand = $br->getAllbrand();
                                                if ($getBrand) {
                                                  while ($result = $getBrand->fetch_assoc()) {
                                              ?>
                                              <option
                                              <option
                                              <?php
                                              if ($value['brandId'] == $result['brandId']) { ?>
                                                 selected = "selected"
                                               <?php } ?>
                                              value="<?php echo $result['brandId']; ?>">
                                              <?php echo $result['brandName']; ?></option>
                                              <?php } } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Supplier</label>
                                            <select class="form-control" name="suppId">
                                              <?php
                                                $getSupp = $sp->getAllsupp();
                                                if ($getSupp) {
                                                  while ($result = $getSupp->fetch_assoc()) {
                                              ?>
                                              <option
                                              <?php
                                              if ($value['suppId'] == $result['suppId']) { ?>
                                                 selected = "selected"
                                               <?php } ?>
                                              value="<?php echo $result['suppId']; ?>">
                                              <?php echo $result['suppName']; ?></option>
                                              <?php } } ?>

                                            </select>
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
                                              value="<?php echo $result['branchId']; ?>">
                                              <?php echo $result['branchName']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Amount</label>
                                            <input type="number" class="form-control" value="<?php echo $value['amount']; ?>" name="amount" disabled>
                                            <input type="hidden" value="<?php echo $value['amount']; ?>" name="previousAmount">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Add stock</label>
                                            <input type="number" min="0" class="form-control" name="newstock">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Price</label>
                                            <input type="number" min="0"  class="form-control" value="<?php echo $value['totalPrice']; ?>" name="totalPrice">
                                        </div>
                                        <div class="form-group">
                                            <label>Price per unit</label>
                                            <input type="number"  min="0" class="form-control" value="<?php echo $value['ppu']; ?>" name="ppu">
                                        </div>
                                        <div class="form-group">
                                            <label>Buing Price per unit</label>
                                            <input type="number" min="0"  class="form-control" value="<?php echo $value['bpu']; ?>" name="bpu">
                                        </div>
                                        
                                        <input type="hidden" value="<?php echo $value['inventId']; ?>" name="inventId">
                                        

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
