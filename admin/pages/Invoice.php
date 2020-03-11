
<?php function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Dhaka');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
} ?>
<div class="container">
  <div class="card">
<div class="card-header">
<strong>Invoice</strong> <br/>
<strong><?php  echo getDatetimeNow();?></strong> 

</div>

<div class="row mb-4">


<div class="col-lg-12">

<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
          <?php
            $getSale = $com->getSaleById($sale);
            $cmId='';
            if ($getSale) {
              while ($get = $getSale->fetch_assoc()) {
                $st = $get['rem'];
          ?>
                        <div class="panel-heading">
                            Order Info
                        </div>
                        <div class="panel-heading">
              <?php
                $id = $get['customer'];
                $getCus = $cm->getCusById($id);
                if ($getCus) {
                  while($cus = $getCus->fetch_assoc()) {
                  	$cmId = $cus['cmId'];
              ?>
                            
                            <div class="col-sm-8">

							<strong>Customer: <?= $cus['customName']; ?></strong>
							</div>
              <div class="col-sm-4 right"><button name="printbtn"  class="fa-fa-details" onclick="window.print()">Print Now</button></div>

							<div class="">Phone: <?= $cus['customContact']; ?></div>
							</div>
                
							</div>
              <?php } } ?>
                        </div>
                       
          <?php } } ?>
                        <!-- /.panel-heading -->
                        <div class="col-sm-6">
                            <div >
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Sub Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                            <?php
                              $getAdmin = $or->getOrderBySale($sale);
                              if ($getAdmin) {
                                $t_price = 0;
                                $totalVat = 0;
                                $i = 0;
                                while ($result = $getAdmin->fetch_assoc()) {
                                  $i++;
                            ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                          <?php
                                            $id = $result['inventId'];
                                            $getPd = $pd->getPdById($id);
                                            $up = 0;
                                            $sp=0;
                                            if ($getPd){
                                              while($value = $getPd->fetch_assoc()){
                                              	$vatAmount = 0;
                                              	$catId = $value['catId'];
                                              	$getVat = $pay->getVATByCatId($catId);
                                              	if ($getVat) {
                                              		while($vat1 = $getVat->fetch_assoc()){
                                              			$vatAmount = $vat1['vat'];
                                              		}
                                              	}

                                          ?>
                                              <td><?= $value['pdName'] ?></td>
                                              <td><?= $value['ppu'] ?></td>
                                              <?php $up = $value['ppu'];
                                                      $sp = $value['ppu'];
                                               ?>

                                          <?php } } ?>
                                              <td><?= $result['quantity']; ?></td>
                                              <td><?= $result['quantity'] * $sp ; ?></td>
                                           <?php 
                                           		$t_price  +=  ($result['quantity'] * $sp);
                                           		$totalVat +=(($result['quantity'] * $sp)*$vatAmount)/100;
                                           ?> 
                                          </tr>
                          <?php }  ?>

                                  <tr>
  <tr><td></td></tr> <tr><td></td></tr>
<td class="left">
<strong>Sub Total</strong>
</td>
<td class="right"><?php echo $t_price; ?></td>
</tr>
<tr>
<td class="left">
  <?php
                          $dis = $cm->getDiscount($cmId);
                          $discount = 0;
                          if($dis != false) {
                            while($d = $dis->fetch_assoc()) {
                              $discount = $d['discount'];
                            }
                          } 


                          $down = ( $t_price / 100 ) * $discount;
      ?>
              <strong>Discount (<?php echo $discount;?> %)</strong>
              </td>
              <td class="right"><?php echo $down; ?></td>
              </tr>
              <tr>
              <td class="left">
               <strong>VAT </strong>
              </td>
              <td class="right"><?php echo $totalVat; ?></td>
              </tr>
              <tr>
              <td class="left">
              <strong>Total</strong>
              </td>
              <td class="right">
              <strong><?php 
                  $totalPrice = $t_price + $totalVat - $down;
                  echo $totalPrice;
               ?></strong>
              </td>
              <?php } ?>
              </tr>
              </tbody>
              </table> 
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                    <?php
            $getSale = $com->getSaleById($sale);
            if ($getSale) {
              while ($get = $getSale->fetch_assoc()) {
          ?>
                        <div class="panel-heading">
                            Payments of sale information
                        </div>
                      
                        <div class="panel-heading">
                            Total Cost: <?php echo $get['totalPrice']; ?>tk
                        </div>
              <?php if($get['rem'] > 0) { ?>
                        <div class="panel-heading">
                            Remaining: <?php echo $get['rem']; ?>tk
                        </div>
              <?php } else { ?>
                <div class="panel-heading">
                    Payment Cleared.
                </div>
              <?php } ?>
          <?php } } ?>
          <?php
            if (isset($payUp)) {
              echo $payUp;
            }
          ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Payment</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                            <?php
                              $getAdmin = $pay->payById($sale);
                              if ($getAdmin) {
                                $i = 0;
                                while ($result = $getAdmin->fetch_assoc()) {
                                  $i++;
                            ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                          <?php
                                            $id = $result['payment'];
                                            $getPd = $pay->getPayById($id);
                                            if ($getPd){
                                              while($value = $getPd->fetch_assoc()){
                                          ?>
                                              <td><?= $value['payment'] ?></td>
                                          <?php } } ?>
                                              <td><?= $result['amount'] ?></td>
                                              <td><?php echo $fm->formatDate($result['date']); ?></td>
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

