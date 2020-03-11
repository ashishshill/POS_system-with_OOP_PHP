<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['cat']) || $_GET['cat'] == NULL) {
    echo "<script> window.location = 'catlist.php'; </script>";
  } else {
    $id = $_GET['cat'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateCat = $cat->catUpdate($_POST, $id);
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
                            Update Category Information Here
                        </div>
                        <?php
                          if (isset($updateCat)) {
                            echo $updateCat;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getCat = $cat->getCatById($id);
                                    if ($getCat){
                                      while($value = $getCat->fetch_assoc()){
                                  ?>
                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Category</label>
                                          <input type="text" class="form-control" value="<?php echo $value['catName']; ?>" name="catName" oninput="CheckValue()" id="name">
                                      </div>
                                      <div class="form-group">
                                          <label>Category ID</label>
                                          <input type="text" class="form-control" value="<?php echo $value['catId']; ?>" name="catId" readonly>
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
		var name = document.getElementById('name').value;
		
		
		
	
		
		if(!isNaN(name)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('name').value='';
			return false;
	}
		
		
	}
	function CheckValue2(){
		var name = document.getElementById('name').value;
		
		
		
		
		
		
		if(name==""){
			swal('Please Input Category Name !', '', 'warning')
			return false;
		}
		
		
		
	}		
</script>
</body>

</html>
