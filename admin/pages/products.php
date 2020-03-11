<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add To Cart</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
              DataTable for Item Information
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>No.</th>
                              <th>Product</th>
                               <th>Brand</th>
                              <th>Branch</th>
                              <th>Quantity</th>
                              <th>Price per Unit</th>
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
                                  <a href="carts.php?ct=<?php echo $result['ineventId']; ?>">
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
