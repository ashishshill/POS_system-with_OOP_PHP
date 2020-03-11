<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertBrand = $br->brandInsert($_POST);
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
                    <h1 class="page-header">Add New Brand</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert New Brand Information Here
                        </div>
                        <?php
                          if (isset($insertBrand)) {
                            echo $insertBrand;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input type="text" class="form-control" placeholder="Enter brand name" name="brandName" oninput="CheckValue()" id="brand_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Brand ID</label>
                                            <input type="text" class="form-control" placeholder="Enter brand ID" name="brandId" oninput="CheckValue()" id="brand_id">
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" oninput="CheckValue2()" value="Submit">
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
		
		
		
		
		
		if(brand_name==""){
			swal('Please Input Brand Name !', '', 'warning')
			return false;
		}
		if(brand_id==""){
			swal('Please Input Brand ID !', '', 'warning')
			return false;
		}
		
		
	}
</script>		

</body>

</html>
