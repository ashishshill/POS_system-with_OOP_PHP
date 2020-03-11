<?php
	include "../inc/header.php";
?>
<header>
	<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
	<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
	<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
	<script>
		jQuery(function ($) {
			$("#excel").click(function () {
				// parse the HTML table element having an id=exportTable
				console.log('hhhhh')
				var dataSource = shield.DataSource.create({
					data: "#exportTable",
					schema: {
						type: "table",
						fields: {
							No: { type: String },
							Product: { type: String },
							Category: { type: String },
							Sub_Category: { type: String },
							Brand: { type: String },
							Supplier: { type: String },
							Branch: { type: String },
							Amount: { type: String },
							Total_Price: { type: String },
							Price_per_Unit: { type: String },
							ID: { type: String }
						}
					}
				});
				// when parsing is done, export the data to Excel
				dataSource.read().then(function (data) {
					new shield.exp.OOXMLWorkbook({
						author: "PrepBootstrap",
						worksheets: [
						{
							name: "PrepBootstrap Table",
							rows: [
							{
								cells: [
								{
									style: {
										bold: true
									},
									type: String,
									value: "No"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Product"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Category"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Sub Category"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Brand"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Supplier"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Branch"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Amount"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Total Price"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "Price Per Unit"
								},
								{
									style: {
										bold: true
									},
									type: String,
									value: "ID"
								}
								]
							}
							].concat($.map(data, function(item) {
								return {
									cells: [
									{ type: String, value: item.No },
									{ type: String, value: item.Product },
									{ type: String, value: item.Category },
									{ type: String, value: item.Sub_Category },
									{ type: String, value: item.Brand },
									{ type: String, value: item.Supplier },
									{ type: String, value: item.Branch },
									{ type: String, value: item.Amount },
									{ type: String, value: item.Total_Price },
									{ type: String, value: item.Price_per_Unit },
									{ type: String, value: item.ID }
									]
								};
							}))
						}
						]
						}).saveAs({
						fileName: "ItemList"
					});
				});
			});
		});
		
		jQuery(function ($) {
			$("#pdf").click(function () {
				d = Date.now();
				d = new Date(d);
				d = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear();
				
				// parse the HTML table element having an id=exportTable
				var dataSource = shield.DataSource.create({
					data: "#exportTable",
					schema: {
						type: "table",
						fields: {
							No: { type: String },
							Product: { type: String },
							Category: { type: String },
							Sub_Category: { type: String },
							Brand: { type: String },
							Supplier: { type: String },
							Branch: { type: String },
							Amount: { type: String },
							Total_Price: { type: String },
							Price_per_Unit: { type: String },
							ID: { type: String }
						}
					}
				});
				
				// when parsing is done, export the data to PDF
				dataSource.read().then(function (data) {
					var pdf = new shield.exp.PDFDocument({
						author: "PrepBootstrap",
						created: new Date()
					});
					
					pdf.addPage("a4", "portrait");
					
					pdf.table(
					50,
					50,
					data,
					[
					{ field: "No", title: "No", width: 25 },
					{ field: "Product", title: "Product", width: 55 },
					{ field: "Category", title: "Category", width: 55 },
					{ field: "Sub_Category", title: "Sub_Category", width: 55 },
					{ field: "Brand", title: "Brand", width: 50 },
					{ field: "Supplier", title: "Supplier", width: 55 },
					{ field: "Branch", title: "Branch", width: 50 },
					{ field: "Amount", title: "Amount", width: 40 },
					{ field: "Total_Price", title: "Total_Price", width: 50 },
					{ field: "Price_per_Unit", title: "Price_per_Unit", width: 60 },
					{ field: "ID", title: "ID", width: 50 }
					],
					{
						margins: {
							top: 50,
							left: 50
						}
					}
					);
					pdf.saveAs({
						fileName: d+'_'+'Item_List'
					});
				});
			});
		});
		
	</script>
</header>

<?php
	
	
	include "../inc/nav.php";
	include "../inc/sider.php";
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Item List</h1>
		</div>
		
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					DataTable for Item Information
					<button style="float:right" id="pdf"  class="btn btn-mg btn-info "><i class="fa fa fa-file-pdf-o"></i>&nbsp; PDF</button>
					<button style="float:right" id="excel"  class="btn btn-mg btn-primary "><i class="fa fa fa-file-excel-o"></i>&nbsp; Excel</button>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					
					<div class="table-responsive">
						<table class="table table-hover" id="exportTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Product</th>
									<th>Category</th>
									<th>Sub_Category</th>
									<th>Brand</th>
									<th>Supplier</th>
									<th>Branch</th>
									<th>Amount</th>
									<th>Total_Price</th>
									<th>Price_per_Unit</th>
									<th>Availability</th>
									<th>ID</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$getPd = $pd->getAllPd();
									if ($getPd) {
										$i = 0;
										while ($result = $getPd->fetch_assoc()) {
											$i++;
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $result['pdName']; ?></td>
											<td><?php echo $result['catName']; ?></td>
											<td><?php echo $result['subName']; ?></td>
											<td><?php echo $result['brandName']; ?></td>
											<td><?php echo $result['suppName']; ?></td>
											<td><?php echo $result['branchName']; ?></td>
											<td><?php echo $result['amount']; ?></td>
										<td><?php echo $result['totalPrice']; ?></td>
										<td><?php echo $result['ppu']; ?></td>
										<td><?php echo $result['availability']; ?></td>
										<td><?php echo $result['inventId']; ?></td>
										<td>
										<a href="itemedit.php?itm=<?php echo $result['id']; ?>">
										<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-wrench"> Edit</i></button>
										</a>
										</td>
										</tr>
										<?php } } ?>
										</tbody>
										</table>
										</div>
										<!-- /.table-responsive -->
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
										
										<!-- DataTables JavaScript -->
										<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
										<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
										<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
										
										<!-- Custom Theme JavaScript -->
										<script src="../dist/js/sb-admin-2.js"></script>
										
										<!-- Page-Level Demo Scripts - Tables - Use for reference -->
										<script>
										$(document).ready(function() {
										$('#dataTables-example').DataTable({
										responsive: true
										});
										});
										</script>
										
										</body>
										
										</html>
																				