<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['supp']) || $_GET['supp'] == NULL) {
    echo "<script> window.location = 'supplist.php'; </script>";
  } else {
    $id = $_GET['supp'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateSupp = $sp->suppUpdate($_POST, $id);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Supplier Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Supplier Information Here
                        </div>
                        <?php
                          if (isset($updateSupp)) {
                            echo $updateSupp;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getSupp = $sp->getSuppById($id);
                                    if ($getSupp){
                                      while($value = $getSupp->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                        <div class="form-group">
                                            <label> Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value['suppName']; ?>"  name="suppName" oninput="CheckValue()" id="sup_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Executive Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value['suppAss']; ?>"  name="suppAss" oninput="CheckValue()" id="ex_name">
                                        </div>
                                        <div class="form-group">
                                            <label> Contact</label>
                                            <input type="tel" class="form-control" value="<?php echo $value['suppContact']; ?>" name="suppContact" oninput="CheckValue()" id="contact">
                                        </div>
                                        <div class="form-group">
                                            <label> E-mail </label>
                                            <input type="email" class="form-control" value="<?php echo $value['suppMail']; ?>" name="suppMail" oninput="CheckValue()" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label> Address</label>
                                            <textarea class="form-control" name="suppAddress" oninput="CheckValue()" id="address" rows="3"><?php echo $value['suppAddress']; ?></textarea>
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
		var name = document.getElementById('sup_name').value;
		
		var ex_name = document.getElementById('ex_name').value;
		
		var contact = document.getElementById('contact').value;
		
		var email = document.getElementById('email').value;
		
		var address = document.getElementById('address').value;
		
		if(!isNaN(name)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('sup_name').value='';
			return false;
		}
		if(!isNaN(ex_name)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('ex_name').value='';
			return false;
		}
		if(!isNaN(contact)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('contact').value='';
			return false;
		}
		if(!isNaN(email)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('email').value='';
			return false;
		}
		if(!isNaN(address)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('address').value='';
			return false;
		}
	}
	function CheckValue2(){
		var name = document.getElementById('sup_name').value;
		var ex_name = document.getElementById('ex_name').value;
		var contact = document.getElementById('contact').value;
		var email = document.getElementById('email').value;
		var address = document.getElementById('address').value;
		
		
		
		
		if(name==""){
			swal('Please Input Product Name !', '', 'warning')
			return false;
		}
		if(ex_name==""){
			swal('Please Input Product Ammount !', '', 'warning')
			return false;
		}
		if(contact==""){
			swal('Please Input Total Price!', '', 'warning')
			return false;
		}
		if(email==""){
			swal('Please Input Price per unit !', '', 'warning')
			return false;
		}
		if(address==""){
			swal('Please Input Buying Price per unit !', '', 'warning')
			return false;
		}
		
	}
</script>	

</body>

</html>
