<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable for Sale Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-heading">
                          <form class="" action="" method="post">
                            Sale Date: <input type="date" name="date" id="date_text" value="">
                            <!-- To Date: <input type="date" name="toDate" id="date_text" value=""> -->
                            <input type="submit" name="submit" id="date_text" value="See Date Wise Sales">
                            <!-- <input type="text" name="search_text" id="search_text" placeholder="Search Products" class="form-control">
                            <input type="submit" name="" value=""> -->
                          </form>
                        </div>
                        <div id="sale">

                        </div>
                      </div>
                      <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <?php if(isset($_POST['submit'])) {
                  $date = $_POST['date'];

                ?>
              <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sale List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable for sale with complete information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Sales ID</th>
                                            <th>Customer</th>
                                            <th>Total Price</th>
                                            <th>Profit Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $pfof_btwn_dates = 0;
                                        $getAdmin = $com->getSalePerDay($date);
                                        if ($getAdmin) {
                                          $i = 0;
                                          while ($result = $getAdmin->fetch_assoc()) {
                                            $i++;
                                      ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                              <td><?php echo $result['id']; ?></td>
                                              <?php
                                                  $id = $result['customer'];
                                                  $getCus = $cm->getCusById($id);
                                                  if ($getCus) {
                                                    while($cus = $getCus->fetch_assoc()) {
                                                ?>
                                                  <td><?= $cus['customName']; ?></td>
                                              <?php } } ?>
                                              <td><?php echo $result['totalPrice']; ?></td>
                                            
                                              <td>
                                             <?php 
                                               $t_prof = 0;
                                               $getOr = $or->getOrderBySale($result['id']);
                                                    if ($getOr) {
                                                      
                          
                                                      while ($rst = $getOr->fetch_assoc()) {
                                                        
                                                        $id = $rst['inventId'];
                                                        $getPd = $pd->getPdById($id);
                                                        $up = 0;
                                                        $sp=0;
                                                        if ($getPd){
                                                          while($value = $getPd->fetch_assoc()){
                                                      
                                                           $up = $value['ppu'];
                                                          $sp = $value['ppu'] - $value['bpu'];
                                                           

                                                        } }
                                                                    
                                                        $t_prof  +=  ($rst['quantity'] * $sp);
                                                               
                                                } }
                                                $pfof_btwn_dates += $t_prof;
                                                  echo $t_prof;
                                                 ?>
                                              </td>
                                              <td>
                                                <a href="seeorder.php?sale=<?php echo $result['id']; ?>&st=<?= $result['rem']; ?>">
                                                  <button type="button" class="btn btn-primary btn-sm"> See Order</button>
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
              <div class="row info">
                <strong>Total Profit between dates is:    </strong>
                <?php echo $pfof_btwn_dates; ?>
              </div>

            <?php } ?>
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
