<?php
  include "../inc/header.php";
  include "../inc/nav.php";
  include "../inc/sider.php";
?>
<?php

  if (!isset($_GET['vat']) || $_GET['vat'] == NULL) {
    echo "<script> window.location = 'sublist.php'; </script>";
  } else {
    $id = $_GET['vat'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateSub = $pay->vatUpdate($_POST, $id);
  }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category VAT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Category VAT Here
                        </div>
                        <?php
                          if (isset($updateSub)) {
                            echo $updateSub;
                          }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                    $getSub = $pay->getVATById($id);
                                    if ($getSub){
                                      while($value = $getSub->fetch_assoc()){
                                  ?>

                                    <form role="form" action="" method="post" >
                                      <div class="form-group">
                                          <label>Select Category</label>
                                            <?php
                                              $id = $value['catId'];
                                              $getCat = $cat->getCatById($id);
                                              if ($getCat) {
                                                while ($result = $getCat->fetch_assoc()) {
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo $result['catName']; ?>" name="catName" readonly>
                                            <?php } } ?>
                                      </div>
                                      <div class="form-group">
                                          <label>VAT</label>
                                          <input type="number" class="form-control" value="<?php echo $value['vat']; ?>" name="vat" oninput="CheckValue()" id="vat">
                                      </div>
                                      <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                      <a href="vatlist.php">
                                        <button type="button" class="btn btn-primary"> Back</button>
                                      </a>

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

 <script>
		function CheckValue(sender){
			var vat = document.getElementById('vat').value;
			
			
			
		
			
			if(!isNaN(vat)){
				swal('Please enter only letter', '', 'warning');
				document.getElementById('vat').value='';
				return false;
		}
	}
	function CheckValue2(){
		var vat = document.getElementById('vat').value;
		var pro_cat = document.getElementById('pro_cat').value;
		
		
		
		
		
		if(vat==""){
			swal('Please Input Vat !', '', 'warning')
			return false;
		}
		if(pro_cat==""){
			swal('Please Select Category !', '', 'warning')
			return false;
		}
		
		
	}	
</script>
</body>

</html>
