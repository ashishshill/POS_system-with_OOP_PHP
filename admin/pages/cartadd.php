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
              <div class="input-group col-lg-6">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search Products" class="form-control">
              <!--  <input type="button" id="button" name="button" value="OK"> -->
              </div>
          </div>
          <!-- /.panel-heading -->
          <?php
            // if (isset($productFind)) {
            //   echo $productFind;
            // }
          ?>
<!--          <div class='added alert alert-warning alert-dismissable' hidden>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              Item already added to cart. <a href='cartlist.php' class='alert-link'>Check Cart</a>.
          </div>
          <div class='carted alert alert-success alert-dismissable' hidden>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Item sent to cart successfully!
            </div>
            <div class='error alert alert-danger alert-dismissable' hidden>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                ERROR!!
            </div> -->
            <div id="exp"></div>
            <div class='panel-body'>
                <div class='table-responsive'>
                    <div id="result">
                    </div>
                </div>
            </div>
