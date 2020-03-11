<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertSupp = $sp->suppInsert($_POST);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Supplier</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Insert New Supplier Information Here
                        </div>
                        <?php
                          if (isset($insertSupp)) {
                            echo $insertSupp;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Supplier</label>
                                          <input  class="form-control" placeholder="Enter supplier name" name="suppName" oninput="CheckValue()" id="sup_name">
                                      </div>
                                        <div class="form-group">
                                            <label>Executive Name</label>
                                            <input  class="form-control" placeholder="Enter executive name" name="suppAss" oninput="CheckValue()" id="ex_name">
                                        </div>
                                        <div class="form-group">
                                            <label> Contact</label>
                                            <input  class="form-control" placeholder="Enter contact number" name="suppContact" oninput="CheckValue()" id="contact">
                                        </div>
                                        <div class="form-group">
                                            <label> E-mail </label>
                                            <input  class="form-control" placeholder="Enter E-mail address" name="suppMail" oninput="CheckValue()" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label> Address</label>
                                            <textarea class="form-control" name="suppAddress" oninput="CheckValue()" id="address" rows="3"></textarea>
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

		var name_ = document.getElementById('sup_name').value;
		
		var ex_name_ = document.getElementById('ex_name').value;
		
		var contact = document.getElementById('contact').value;
		
		var email = document.getElementById('email').value;
		
		var address = document.getElementById('address').value;
		
		if(!isNaN(name_)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('sup_name').value='';
			return false;
		}
		if(isNaN(ex_name)){
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
			swal('Please Input Executive Name !', '', 'warning')
			return false;
		}
		if(contact==""){
			swal('Please Input Contact !', '', 'warning')
			return false;
		}
		if(email==""){
			swal('Please Input E-mail !', '', 'warning')
			return false;
		}
		if(address==""){
			swal('Please Input Address !', '', 'warning')
			return false;
		}
		
	}
</script>

</body>

</html>
