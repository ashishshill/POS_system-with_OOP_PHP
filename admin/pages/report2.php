<?php
	include "../inc/header.php";
	include "dbCon.php";
	$conn=connect();
 ?>
 <header>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		
		 
 </header>
 <?php
  include "../inc/nav.php";
  include "../inc/sider.php";
 
?>

        <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
						<div class="panel panel-default">
						<div class="panel-heading">
                            Selling Every Month For Each Product
                        </div>
                        <table class="table table-bordered table-inverse">
										<tr>
											<th>Inventory ID</th>
											<th>Product Name</th>
											<th>Total Sale</th>
											<th>Year</th>
											<th>Month</th>		
										</tr>
										<?php 
										
										
										
										//echo $uname ;exit;
										
										$sql= "SELECT o.inventId AS ID, i.pdName AS pdName, SUM(o.quantity) AS total_sale, EXTRACT(YEAR FROM o.date) AS year, EXTRACT(MONTH FROM o.date) AS month FROM tbl_order AS o, tbl_inventory AS i WHERE o.inventId = i.inventId GROUP BY o.inventId ORDER BY year, month ASC";
											//echo $sql;exit;
											$resultData=$conn->query($sql);
											//echo $resultData;exit;
											$bookinfo=mysqli_fetch_assoc($resultData);
											foreach ($resultData as $row){
												
											?>
										
										<tr>
											<td><?=$row['ID']?></td>
											<td><?=$row['pdName']?></td>
											<td><?=$row['total_sale']?></td>
											<td><?=$row['year']?></td>
											<td><?=$row['month']?></td>		
										</tr>
										
											<?php } ?>
									</table>
                        <div class="panel-body" id="Highest_Selling_product">
						
						</div>
						</div>
                    </div>
					<div class="col-lg-6">
						<div class="panel panel-default">
						<div class="panel-heading">
                            Top Selling Each Product in Every Month
                        </div>
                        <table class="table table-bordered table-inverse">
										<tr>
											<th>Inventory ID</th>
											<th>Product Name</th>
											<th>Highest Sale</th>
											<th>Year</th>
											<th>Month</th>		
										</tr>
										<?php 
										
										
										
										//echo $uname ;exit;
										
										$sql= "SELECT t2.inventId as Id, t2.pdName as Pdname, t1.maximum_sale as maximum_sale, t1.year as tyear, t1.month as tmonth FROM (SELECT MAX(tb.total_sale) AS maximum_sale, tb.year, tb.month FROM (SELECT o.inventId, i.pdName, SUM(o.quantity) AS total_sale, EXTRACT(YEAR FROM o.date) AS year, EXTRACT(MONTH FROM o.date) AS month FROM tbl_order AS o, tbl_inventory AS i WHERE o.inventId = i.inventId GROUP BY o.inventId, year, month) AS tb GROUP BY tb.year, tb.month) AS t1, (SELECT o.inventId, i.pdName, SUM(o.quantity) AS total_sale, EXTRACT(YEAR FROM o.date) AS year, EXTRACT(MONTH FROM o.date) AS month FROM tbl_order AS o, tbl_inventory AS i WHERE o.inventId = i.inventId GROUP BY o.inventId, month, year) AS t2 WHERE t1.maximum_sale = t2.total_sale AND t2.month = t1.month AND t2.year = t2.year ORDER BY t1.year, t1.month ASC";
											//echo $sql;exit;
											$resultData=$conn->query($sql);
											//echo $resultData;exit;
											$bookinfo=mysqli_fetch_assoc($resultData);
											foreach ($resultData as $row){
												
											?>
										
										<tr>
											<td><?=$row['Id']?></td>
											<td><?=$row['Pdname']?></td>
											<td><?=$row['maximum_sale']?></td>
											<td><?=$row['tyear']?></td>
											<td><?=$row['tmonth']?></td>		
										</tr>
										
											<?php } ?>

									</table>
                        <div class="panel-body" id="selling_top">
						
						</div>
						</div>
                    </div>
					<div class="col-lg-8">
						<div class="panel panel-default" >
						<div class="panel-heading">
                           		 Highest Selling Product of Each Branch
                        </div>
                        <table class="table table-bordered table-inverse">
										<tr>
											<th>Inventory ID</th>
											<th>Product Name</th>
											<th>Branch Name</th>
											<th>Max Sale</th>
										</tr>
										<?php 
										
										
										
										//echo $uname ;exit;
										
										$sql= "SELECT s.inventId as Id, s.pdName as tpdname, s.branchId, s.branchName as branch, MAX(s.total_sale) AS max_sale FROM (SELECT i.inventId, i.pdName, i.branchId, b.branchName, SUM(o.quantity) AS total_sale FROM tbl_branch AS b, tbl_inventory AS i, tbl_order AS o WHERE o.inventId = i.inventId AND i.branchId = b.branchId GROUP BY o.inventId) AS s GROUP BY s.branchId";
											//echo $sql;exit;
											$resultData=$conn->query($sql);
											//echo $resultData;exit;
											$bookinfo=mysqli_fetch_assoc($resultData);
											foreach ($resultData as $row){
												
											?>
										
										<tr>
											<td><?=$row['Id']?></td>
											<td><?=$row['tpdname']?></td>
											<td><?=$row['branch']?></td>
											<td><?=$row['max_sale']?></td>		
										</tr>
										
											<?php } ?>

									</table>
                        <div class="panel-body" id="Year_wise">
						
						</div>
						</div>
                    </div>
					<div class="col-lg-12">
						<div class="panel panel-default">
						<div class="panel-heading">
                            Monthly Sale For Each Branch
                        </div>
                         <table class="table table-bordered table-inverse">
										<tr>
											<th>Inventory ID</th>
											<th>Branch Name</th>
											<th>Total Sale</th>
											<th>Year</th>
											<th>Month</th>
										</tr>
										<?php 
										
										
										
										//echo $uname ;exit;
										
										$sql= "SELECT b.branchId as Id, b.branchName as branch, SUM(o.quantity) AS total_sale, EXTRACT(YEAR FROM o.date) AS year, EXTRACT(MONTH FROM o.date) AS month FROM tbl_branch AS b, tbl_order AS o, tbl_inventory AS i WHERE o.inventId = i.inventId AND i.branchId = b.branchId GROUP BY b.branchId, year, month";
											//echo $sql;exit;
											$resultData=$conn->query($sql);
											//echo $resultData;exit;
											$bookinfo=mysqli_fetch_assoc($resultData);
											foreach ($resultData as $row){
												
											?>
										
										<tr>
											<td><?=$row['Id']?></td>
											<td><?=$row['branch']?></td>
											<td><?=$row['total_sale']?></td>
											<td><?=$row['year']?></td>		
											<td><?=$row['month']?></td>		
										</tr>
										
											<?php } ?>

									</table>
                        <div class="panel-body" id="BranchWise">
						
						</div>
						</div>
                    </div>
					
					<div class="col-lg-12">
						<div class="panel panel-default">
						<div class="panel-heading">
                            Low Stock Products
                        </div>
                         <table class="table table-bordered table-inverse">
										<tr>
											<th>Product Name</th>
											<th>Branch Name</th>
											<th>Available Amount</th>
										</tr>
										<?php 
										
										
										
										//echo $uname ;exit;
										
										$sql= "SELECT p.pdName as pname, b.branchName as bname, p.availability as avail FROM tbl_inventory AS p , tbl_branch AS b WHERE p.branchId = b.branchId and p.availability < 30";
											//echo $sql;exit;
											$resultData=$conn->query($sql);
											//echo $resultData;exit;
											$bookinfo=mysqli_fetch_assoc($resultData);
											foreach ($resultData as $row){
												
											?>
										
										<tr>
											<td><?=$row['pname']?></td>
											<td><?=$row['bname']?></td>
											<td><?=$row['avail']?></td>
											<?php } ?>

									</table>
                        <div class="panel-body" id="BranchWise">
						
						</div>
						</div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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

</body>

</html>
