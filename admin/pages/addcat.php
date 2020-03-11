<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $catName   = $_POST['catName'];
    $insertCat = $cat->catInsert($catName);
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
                    <h1 class="page-header">Add Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert Category Here
                        </div>
                        <?php
                          if (isset($insertCat)) {
                            echo $insertCat;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input  class="form-control" placeholder="Enter Category" name="catName" oninput="CheckValue()" id="cat_name">
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" oninput="CheckValue2()">
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

<script>
	function CheckValue(sender){
		var cat_name = document.getElementById('cat_name').value;
		
		
		
	
		
		if(!isNaN(cat_name)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('cat_name').value='';
			return false;
	}
		
		
	}
	function CheckValue2(){
		var cat_name = document.getElementById('cat_name').value;
		
		
		
		
		
		
		if(cat_name==""){
			swal('Please Input Category Name !', '', 'warning')
			return false;
		}
		
		
		
	}
</script>	
</body>

</html>
