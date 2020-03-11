<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['dis']) || $_GET['dis'] == NULL) {
    echo "<script> window.location = 'sublist.php'; </script>";
  } else {
    $id = $_GET['dis'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateSub = $cm->disUpdate($_POST, $id);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Customer Discount</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Customer Discount Here
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
                                    $getSub = $cm->getDisById($id);
                                    if ($getSub){
                                      while($value = $getSub->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Number of purchases</label>
                                          <input type="number" class="form-control" value="<?php echo $value['hiker']; ?>" name="hiker" oninput="CheckValue()" id="hiker">
                                      </div>
                                      <div class="form-group">
                                          <label>Discount</label>
                                          <input type="number" class="form-control" value="<?php echo $value['discount']; ?>" name="discount" oninput="CheckValue()" id="discount">
                                      </div>
                                      <input type="submit" class="btn btn-primary" name="submit" value="Update" oninput="CheckValue()">
                                      <a href="dislist.php">
                                        <button type="button" class="btn btn-primary"> Back</button>
                                      </a>

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

<script>
	function CheckValue(sender){
		var hiker = document.getElementById('hiker').value;
		
		var discount = document.getElementById('discount').value;
		
	
		
		if(!isNaN(hiker)){
			swal('Please enter only number', '', 'warning');
			document.getElementById('hiker').value='';
			return false;
	}
		if(!isNaN(discount)){
			swal('Please enter only number', '', 'warning');
			document.getElementById('discount').value='';
			return false;
		}
		
	}
	function CheckValue2(){
		var hiker = document.getElementById('hiker').value;
		var discount = document.getElementById('discount').value;
		
		
		
		
		
		if(hiker==""){
			swal('Please Input Brand Name !', '', 'warning')
			return false;
		}
		if(discount==""){
			swal('Please Input Brand ID !', '', 'warning')
			return false;
		}
		
		
	}
</script>

</body>

</html>
