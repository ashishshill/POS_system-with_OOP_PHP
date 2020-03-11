<?php
	include "../inc/header.php";
	include "dbCon.php";
	$conn=connect();
 ?>
 <header>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	<script type="text/javascript">
			google.charts.load('current',{'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart(){
				var data = google.visualization.arrayToDataTable([
				['Name','Number'],
				<?php
					
					$query="( SELECT i.pdName as name,  SUM(o.quantity) AS total_sale FROM tbl_inventory AS i, tbl_order AS o WHERE o.inventId = i.inventId GROUP BY o.inventId HAVING SUM(quantity) > 40 ORDER BY SUM(o.quantity) DESC) ";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_array($result))
					{
						echo "['".$row["name"]."',".$row["total_sale"]."],";
					}
				?>
				]);
				var options = {
					'legend':'right',
					'is3D':true,
					
				};
				var chart = new google.visualization.PieChart(document.getElementById('Highest_Selling_product'));
				chart.draw(data,options);
			}
			setInterval(drawChart, 5000);
	</script>
	<script type="text/javascript">
			google.charts.load('current',{'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart(){
				var data = google.visualization.arrayToDataTable([
				['Name','Number'],
				<?php
					
					$query="SELECT i.pdName as name, SUM(o.quantity) AS total_sale FROM tbl_inventory AS i, tbl_order AS o WHERE o.inventId = i.inventId GROUP BY o.inventId ORDER BY SUM(o.quantity) DESC LIMIT 5";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_array($result))
					{
						echo "['".$row["name"]."',".$row["total_sale"]."],";
					}
				?>
				]);
				var options = {
					'legend':'right',
					'is3D':true,
					
				};
				var chart = new google.visualization.PieChart(document.getElementById('selling_top'));
				chart.draw(data,options);
			}
			setInterval(drawChart, 5000);
	</script>
	<script type="text/javascript">
			google.charts.load('current',{'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart(){
				var data = google.visualization.arrayToDataTable([
				['Name','Number'],
				<?php
					
					$query="SELECT o.inventId, i.pdName, SUM(o.quantity) AS total_sale, EXTRACT(YEAR FROM o.date) AS year, EXTRACT(MONTH FROM o.date) AS month FROM tbl_order AS o, tbl_inventory AS i WHERE o.inventId = i.inventId GROUP BY o.inventId ORDER BY year, month ASC";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_array($result))
					{
						echo "['".$row["name"]."',".$row["total_sale"]."],";
					}
				?>
				]);
				var options = {
					'legend':'right',
					'is3D':true,
					
				};
				var chart = new google.visualization.PieChart(document.getElementById('selling_top'));
				chart.draw(data,options);
			}
			setInterval(drawChart, 5000);
	</script>
	
	<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
	  ['Product Name','Max Sale','Branch Name'],
				<?php
					$query4="SELECT s.inventId, s.pdName as PDNAME, s.branchId, s.branchName as branch_ame, MAX(s.total_sale) AS max_sale FROM (SELECT i.inventId, i.pdName, i.branchId, b.branchName, SUM(o.quantity) AS total_sale FROM tbl_branch AS b, tbl_inventory AS i, tbl_order AS o WHERE o.inventId = i.inventId AND i.branchId = b.branchId GROUP BY o.inventId) AS s GROUP BY s.branchId";
					$result4=mysqli_query($conn,$query4);
					while($row=mysqli_fetch_array($result4))
					{
						echo "['".$row["branch_ame"]."',".(int)$row["max_sale"].",'".(int)$row["branch_ame"]."'],";
					}
				?>
				]);

var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { 
                         role: "annotation" },
                       ]);

      var options = {
       width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true
      };
      var chart = new google.visualization.BarChart(document.getElementById("Heighst"));
      chart.draw(view, options);
  }
  google.charts.setOnLoadCallback(drawChart);
  </script>
	<script type = "text/javascript">
			google.charts.load('current', {packages: ['corechart']});
			function drawChart() {
				// Define the chart to be drawn.
				var data = google.visualization.arrayToDataTable([
				['Branch Name','Total Invest','Total Sale','Profit or Loss'],
				<?php
					$query4="SELECT sale.sale_year AS year, invest.total_invest, sale.total_sale, (sale.total_sale - invest.total_invest) AS profit_or_loss FROM (SELECT SUM(bh.total_price) AS total_invest, EXTRACT(YEAR FROM bh.buying_date) AS buy_year FROM buy_history AS bh GROUP BY buy_year) AS invest, (SELECT SUM(s.totalPrice) AS total_sale, EXTRACT(YEAR FROM s.date) AS sale_year FROM tbl_sales AS s GROUP BY sale_year) AS sale WHERE buy_year = sale_year ORDER BY sale_year";
					$result4=mysqli_query($conn,$query4);
					if ($result4) {
					while($row=mysqli_fetch_array($result4))
					{
						echo "['".$row["year"]."',".$row["total_invest"].",".(int)$row["total_sale"].",".(int)$row["profit_or_loss"]."],";

					}
					}else{
						echo "not getting any data";
					}
				?>
				]);

				var options = {
					height:450,
					isStacked:true
				};

				// Instantiate and draw the chart.
				var chart = new google.visualization.ColumnChart(document.getElementById('Year_wise'));
				chart.draw(data, options);
			}
			google.charts.setOnLoadCallback(drawChart);
		</script>

		 </script>
	<script type = "text/javascript">
			google.charts.load('current', {packages: ['corechart']});
			function drawChart() {
				// Define the chart to be drawn.
				var data = google.visualization.arrayToDataTable([
				['Branch Name','Total Invest','Total Sale','Profit or Loss'],
				<?php
					$query4="SELECT sale.sale_year AS year, sale.branchId, sale.branchName, invest.total_invest, sale.total_sale, (sale.total_sale - invest.total_invest) AS profit_or_loss FROM (SELECT SUM(bh.total_price) AS total_invest, EXTRACT(YEAR FROM bh.buying_date) AS buy_year, b.branchId, b.branchName FROM buy_history AS bh, tbl_inventory AS i, tbl_branch AS b WHERE bh.inventory_id = i.inventId AND i.branchId = b.branchId GROUP BY buy_year, b.branchId) AS invest, (SELECT SUM(s.totalPrice) AS total_sale, EXTRACT(YEAR FROM s.date) AS sale_year, tb.branchId, tb.branchName FROM tbl_sales AS s, tbl_order AS o, tbl_inventory AS ti, tbl_branch AS tb WHERE s.id = o.sale AND o.inventId = ti.inventId AND ti.branchId = tb.branchId GROUP BY sale_year, tb.branchId) AS sale WHERE buy_year = sale_year AND invest.branchId = sale.branchId ORDER BY sale_year";
					$result4=mysqli_query($conn,$query4);
					if ($result4) {
					while($row=mysqli_fetch_array($result4))
					{
						echo "['".$row["branchName"]."',".$row["total_invest"].",".(int)$row["total_sale"].",".(int)$row["profit_or_loss"]."],";

					}
					}else{
						echo "not getting any data";
					}
				?>
				]);

				var options = {
					height:450,
					isStacked:true
				};

				// Instantiate and draw the chart.
				var chart = new google.visualization.ColumnChart(document.getElementById('BranchWise'));
				chart.draw(data, options);
			}
			google.charts.setOnLoadCallback(drawChart);
		</script>
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
                            Highest Selling product
                        </div>
                        <div class="panel-body" id="Highest_Selling_product">
						
						</div>
						</div>
                    </div>
					<div class="col-lg-6">
						<div class="panel panel-default">
						<div class="panel-heading">
                            Top selling product limit 5
                        </div>
                        <div class="panel-body" id="selling_top">
						
						</div>
						</div>
                    </div>
					<div class="col-lg-6">
						<div class="panel panel-default" >
						<div class="panel-heading">
                           		 Yearly Profit Or Loss
                        </div>
                        <div class="panel-body" id="Year_wise">
						
						</div>
						</div>
                    </div>
					<div class="col-lg-6">
						<div class="panel panel-default">
						<div class="panel-heading">
                            BranchWise yearly Profit or Loss
                        </div>
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
