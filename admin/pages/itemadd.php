<?php
	include "../inc/header.php";
	include "../inc/nav.php";
 	include "../inc/sider.php";
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$insertPd = $pd->productInsert($_POST);
		// $insertHistory = $pd->insertHistory($_POST);
	}
?>
<script type="text/javascript">
	function empId() {
		var randomString = function(length) {
			
			var text = "";
			
			var possible = "0123456789";
			
			for(var i = 0; i < length; i++) {
				
				text += possible.charAt(Math.floor(Math.random() * possible.length));
				
			}
			
			return text;
		}
		
		// random string length
		var random = randomString(10);
		
		// insert random string to the field
		document.getElementById("code").value = random;
	};
	onload=empId;
</script>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Add New Item</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Insert New Item Information Here
				</div>
				<?php
					if (isset($insertPd)) {
						echo $insertPd;
					}
				?>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
							<form role="form" action="" method="post" >
								<div class="form-group">
									<label> Product</label>
									<input type="text" class="form-control" placeholder="Enter product"  oninput="CheckValue()" name="pdName" id="pro_name">
								</div>
								<div class="form-group">
									<label>Select Category</label>
									<select class="form-control" name="catId" id="pro_cat">
									
									<option value="0">Please select</option>
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
									<label>Select Sub Category</label>
									<select class="form-control" name="subId" id="pro_subCat">
									<option value="0">Please select</option>
										<?php
											$getSub = $cat->getAllSub();
											if ($getSub) {
												while ($result = $getSub->fetch_assoc()) {
												?>
												<option value="<?php echo $result['subId']; ?>"><?php echo $result['subName']; ?></option>
											<?php } } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Select Brand</label>
									<select class="form-control" name="brandId" id="pro_brand">
									<option value="0">Please select</option>
										<?php
											$getBrand = $br->getAllbrand();
											if ($getBrand) {
												while ($result = $getBrand->fetch_assoc()) {
												?>
												<option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
											<?php } } ?>
											
									</select>
								</div>
								<div class="form-group">
									<label>Select Supplier</label>
									<select class="form-control" name="suppId" id="supplier">
									<option value="0">Please select</option>
										<?php
											$getSupp = $sp->getAllsupp();
											if ($getSupp) {
												while ($result = $getSupp->fetch_assoc()) {
												?>
												<option value="<?php echo $result['suppId']; ?>"><?php echo $result['suppName']; ?></option>
											<?php } } ?>
											
									</select>
								</div>
								<div class="form-group">
									<label>Select Branch</label>
									<select class="form-control" name="branchId" id="branch">
									<option value="0">Please select</option>
										<?php
											$getBranch = $com->getAllbranch();
											if ($getBranch) {
												while ($result = $getBranch->fetch_assoc()) {
												?>
												<option value="<?php echo $result['branchId']; ?>"><?php echo $result['branchName']; ?></option>
											<?php } } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Amount</label>
									<input type="number"  min="0"  class="form-control" placeholder="Enter amount" name="amount" id="ammount">
								</div>
								<!-- <div class="form-group">
									<label>Total Price</label>
									<input type="number" class="form-control" placeholder="Enter total price" name="totalPrice" id="total_price">
								</div> -->
								<div class="form-group">
									<label> Selling Price per unit</label>
									<input type="number" min="0"  class="form-control" placeholder="Enter price per unit" name="ppu" id="price_unit">
								</div>
								<div class="form-group">
									<label> Buying Price per unit</label>
									<input type="number" min="0" class="form-control" placeholder="Enter price per unit" name="bpu" id="buy_price">
								</div>
								<!-- <div class="form-group">
									<label>Availability</label>
									<input type="number" class="form-control" placeholder="Enter available units" name="availability">
								</div> -->
								<div class="form-group">
									<label>Inventory ID</label>
									<input type="number" class="form-control" placeholder="Enter inventory ID" name="inventId" id="code" readonly>
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
		var name = document.getElementById('pro_name').value;
		
		if(!isNaN(name)){
			swal('Please enter only letter', '', 'warning');
			document.getElementById('pro_name').value='';
			return false;
		}
	}
	function CheckValue2(){
		var name = document.getElementById('pro_name').value;
		var ammont = document.getElementById('ammount').value;
		var totalPrice = document.getElementById('total_price').value;
		var price = document.getElementById('price_unit').value;
		var buyPrice = document.getElementById('buy_price').value;
		
		var Scategory = document.getElementById('pro_cat').value;
		var SsubCategory = document.getElementById('pro_subCat').value;
		var Sbrand = document.getElementById('pro_brand').value;
		var Ssupplier = document.getElementById('supplier').value;
		var Sbranch = document.getElementById('branch').value;
		
		
		if(name==""){
			swal('Please Input Product Name !', '', 'warning')
			return false;
		}
		if(ammont==""){
			swal('Please Input Product Ammount !', '', 'warning')
			return false;
		}
		if(totalPrice==""){
			swal('Please Input Total Price!', '', 'warning')
			return false;
		}
		if(price==""){
			swal('Please Input Price per unit !', '', 'warning')
			return false;
		}
		if(buyPrice==""){
			swal('Please Input Buying Price per unit !', '', 'warning')
			return false;
		}
		if(Scategory=="0"){
			swal('Please select Category', '', 'warning')
			return false;
		}
		if(SsubCategory=="0"){
			swal('Please select Sub Category', '', 'warning')
			return false;
		}
		if(Sbrand=="0"){
			swal('Please select Brand', '', 'warning')
			return false;
		}
		if(Ssupplier=="0"){
			swal('Please select Supplier Company', '', 'warning')
			return false;
		}
		if(Sbranch=="0"){
			swal('Please select Branch Type', '', 'warning')
			return false;
		}
	}
</script>

</body>

</html>
