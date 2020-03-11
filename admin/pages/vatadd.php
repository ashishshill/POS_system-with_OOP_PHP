<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertSub = $pay->vatInsert($_POST);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add VAT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert VAT for per category Here
                        </div>
                        <?php
                          if (isset($insertSub)) {
                            echo $insertSub;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" >
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" name="catId"  id="pro_cat">
                                              <option value="0">--Please select--</option>
                                              <?php
                                                $getCat = $cat->getAllcat();
                                                if ($getCat) {
                                                  while ($result = $getCat->fetch_assoc()) {
                                              ?>
                                              <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                                              <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input class="form-control" placeholder="Enter VAT" name="vat" oninput="CheckValue()" id="vat">
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
			var vat_ = document.getElementById('vat').value;
			
			if(isNaN(vat_)){
				swal('Please enter only Number', '', 'warning');
				document.getElementById('vat').value='';
				return false;
		}
	}
	function CheckValue2(){
		var vat_ = document.getElementById('vat').value;
		var pro_cat = document.getElementById('pro_cat').value;
		
		if(vat_==""){
			swal('Please Input Vat !', '', 'warning')
			return false;
		}
		if(pro_cat=="0"){
			swal('Please Select Category !', '', 'warning')
			return false;
		}
		
		
	}	
</script>
</body>

</html>
