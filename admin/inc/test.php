<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <?php
              if ($aStatus <= 1) {
            ?>
            <li>
                <a href="#"><i class="fa fa-group fa-fw"></i> Administration<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="adminadd.php">Add Admin</a>
                    </li>
                    <li>
                        <a href="adminlist.php">Admin List</a>
                    </li>
              </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="flot.php">Flot Charts</a>
                    </li>
                    <li>
                        <a href="morris.php">Morris.js Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="tables.php"><i class="fa fa-table fa-fw"></i> Tables</a>
            </li>
            <li>
                <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
          <?php } ?>
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
                <a href="#"><i class="fa fa-dollar fa-fw"></i> Payments<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="payadd.php">Add Payment</a>
                    </li>
                    <li>
                        <a href="paylist.php">Payment List</a>
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
                            <a href="complist.php">Completed Purchace</a>
                        </li>
                        <li>
                            <a href="duelist.php">Payment Due</a>
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
                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="panels-wells.php">Panels and Wells</a>
                    </li>
                    <li>
                        <a href="buttons.php">Buttons</a>
                    </li>
                    <li>
                        <a href="notifications.php">Notifications</a>
                    </li>
                    <li>
                        <a href="typography.php">Typography</a>
                    </li>
                    <li>
                        <a href="icons.php"> Icons</a>
                    </li>
                    <li>
                        <a href="grid.php">Grid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="blank.php">Blank Page</a>
                    </li>
                    <li>
                        <a href="login.php">Login Page</a>
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
