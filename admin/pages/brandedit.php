<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['brd']) || $_GET['brd'] == NULL) {
    echo "<script> window.location = 'brandlist.php'; </script>";
  } else {
    $id = $_GET['brd'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateBrand = $br->brandUpdate($_POST, $id);
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
                    <h1 class="page-header">Edit Category Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Brand Information Here
                        </div>
                        <?php
                          if (isset($updateBrand)) {
                            echo $updateBrand;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getBrand = $br->getBrandById($id);
                                    if ($getBrand){
                                      while($value = $getBrand->fetch_assoc()){
                                  ?>
                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Brand</label>
                                          <input type="text" class="form-control" value="<?php echo $value['brandName']; ?>" name="brandName" oninput="CheckValue()" id="brand_name">
                                      </div>
                                      <div class="form-group">
                                          <label>Brand ID</label>
                                          <input type="text" class="form-control" value="<?php echo $value['brandId']; ?>" name="brandId" oninput="CheckValue()" id="brand_id" readonly>
                                      </div>
                                      <input type="submit" class="btn btn-primary" name="submit" value="Update" oninput="CheckValue2()">
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
<script>
	function CheckValue(sender){
		var brand_name = document.getElementById('brand_name').value;
		
		var brand_id = document.getElementById('brand_id').value;
		
	
		
		if(!isNaN(brand_name)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('brand_name').value='';
			return false;
		}
		if(!isNaN(brand_id)){
			swal('Please enter only number', '', 'warning');
			document.getElementById('brand_id').value='';
			return false;
		}
		
	}
	function CheckValue2(){
		var brand_name = document.getElementById('brand_name').value;
		var brand_id = document.getElementById('brand_id').value;
		
		
		
		
		
		if(name==""){
			swal('Please Input Product Name !', '', 'warning')
			return false;
		}
		if(ex_name==""){
			swal('Please Input Product Ammount !', '', 'warning')
			return false;
		}
		
		
	}
</script>	
</body>

</html>
