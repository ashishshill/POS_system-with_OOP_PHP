<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $insertCat = $cm->disInsert($_POST);
  }
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Discount</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert Discount Here
                        </div>
                        <div class="panel-body">
                          <?php
                            if (isset($insertCat)) {
                              echo $insertCat;
                            }
                          ?>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Number of purchase</label>
                                            <input  class="form-control" placeholder="Enter Number" name="hiker" oninput="CheckValue()" id="hiker">
                                        </div>
                                        <div class="form-group">
                                            <label>Discount</label>
                                            <input  class="form-control" placeholder="Enter Discount" name="discount" oninput="CheckValue()" id="discount">
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" onclick="return CheckValue2()">
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
      <!-- /#wrapper -->

<script>
	function CheckValue(sender){
		var hiker_ = document.getElementById('hiker').value;
		
		var discount_ = document.getElementById('discount').value;
	
		if(isNaN(hiker_)){
			swal('Please enter only number', '', 'warning');
			document.getElementById('hiker').value='';
			return false;
	
		if(isNaN(discount_)){
			swal('Please enter only number', '', 'warning');
			document.getElementById('discount').value='';
			return false;	
	}
function CheckValue2(){
		var hiker_ = document.getElementById('hiker').value;
		var discount_ = document.getElementById('discount').value;

		if(hiker_==""){
			swal('Please Input Brand Name !', '', 'warning')
			return false;
		}
		if(discount_==""){
			swal('Please Input Brand ID !', '', 'warning')
			return false;
		}
	}
</script>


</body>

</html>
