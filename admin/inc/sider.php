<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-database fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <?php
                    $st = Session::get("adminStatus");
                    if ($st <= 2) {
                  ?>
                    <li>
                        <a href="itemadd.php">Add Item</a>
                    </li>
                  <?php } ?>
                    <li>
                        <a href="itemlist.php">Item List</a>
                    </li>
              </ul>
            </li>
            <?php
              if ($aStatus <= 1) {
            ?>
            <li>
                <a href="#"><i class="fa fa-group fa-fw"></i> Administration<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="adminadd.php">Add Access</a>
                    </li>
                    <li>
                        <a href="adminlist.php">Accessed Personnel List</a>
                    </li>
              </ul>
            </li>
            <?php } ?>
            <?php
              if ($aStatus <= 1) {
            ?>
			<li>
                <a href="#"><i class="fa fa-area-chart"></i> Reports <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="report.php">Graphical Reports</a>
                    </li>
                    <li>
                        <a href="report2.php">Numerical Reports</a>
                    </li>
              </ul>
			<li>
                <a href="#"><i class="fa fa-barcode"></i> Generate Barcode<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="barcode/">Generate Barcode</a>
                    </li>
              </ul>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-dollar fa-fw"></i> Payment Types<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="payadd.php">Add Payment Type</a>
                    </li>
                    <li>
                        <a href="paylist.php">Payment Type List</a>
                    </li>
              </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-dollar fa-fw"></i> VAT<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="vatadd.php">Add VAT</a>
                    </li>
                    <li>
                        <a href="vatlist.php">VAT List</a>
                    </li>
              </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-dollar fa-fw"></i> Discount<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="disadd.php">Add Discount</a>
                    </li>
                    <li>
                        <a href="dislist.php">Discount List</a>
                    </li>
              </ul>
            </li>
             <?php } ?>
             <?php if ($aStatus != 2) {
          ?>
            <li>
                <a href="carts.php"><i class="fa fa-shopping-cart fa-fw"></i> Add To Cart<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="cartadd.php">Add Cart</a>
                    </li>
                    <li>
                        <a href="cartlist.php">Cart List</a>
                    </li>
              </ul>
            </li>
            <?php } ?>

            <li>
                <a href="company.php"><i class="fa fa-institution fa-fw"></i> Company Information</a>
                <ul class="nav nav-second-level">
                    <?php
                    if ($aStatus <= 1) {
                  ?>
                  <li>
                      <a href="#"><i class="fa fa-home fa-fw"></i> Branches<span class="fa arrow"></span></a>
                      <ul class="nav nav-third-level">
                          <li>
                              <a href="addbranch.php">Add Branch</a>
                          </li>
                          <li>
                              <a href="branchlist.php">Branch List</a>
                          </li>
                    </ul>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-briefcase fa-fw"></i> Employees<span class="fa arrow"></span></a>
                      <ul class="nav nav-third-level">
                          <li>
                              <a href="addemp.php">Add Employee</a>
                          </li>
                          <li>
                              <a href="emplist.php">Employee List</a>
                          </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-file-o fa-fw"></i> Sales<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="salelist.php">Sale list</a>
                        </li>

                        <li>
                            <a href="saleperday.php">Sale by Date</a>
                        </li>
                        <li>
                            <a href="buyhistory.php">Inventory Buy History</a>
                        </li>
                        <li>
                            <a href="complist.php">Completed Purchace</a>
                        </li>
                        <li>
                            <a href="duelist.php">Payment Due</a>
                        </li>
                        <li>
                            <a href="duebybranch.php">Due By Branch</a>
                        </li>
                  </ul>
              </li>
              <?php } ?>
            </ul>
          </li>
        <?php
            if ($aStatus <= 1) {
          ?>
            <li>
                <a href="#"><i class="fa fa-truck fa-fw"></i> Suppliers<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="supplieradd.php">Add Supplier</a>
                    </li>
                    <li>
                        <a href="supplierlist.php">Supplier List</a>
                    </li>
              </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-list-ul fa-fw"></i> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addcat.php">Add Category</a>
                    </li>
                    <li>
                        <a href="catlist.php">Category List</a>
                    </li>
                    <li>
                        <a href="addsub.php">Add Sub Category</a>
                    </li>
                    <li>
                        <a href="sublist.php">Sub Category List</a>
                    </li>
              </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-behance fa-fw"></i> Brands<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="addbrand.php">Add Brand</a>
                    </li>
                    <li>
                        <a href="brandlist.php">Brand List</a>
                    </li>
              </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="blank.php">Blank Page</a>
                    </li>	
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
