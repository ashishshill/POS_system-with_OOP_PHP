<?php
	include 'template/header.php';
	include 'template/navbar.php';


?>

  <body id="page-top">



   <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Student Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Student Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Start TAB-->
			<div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Student Options</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab"><span><i class="ti-home"></i></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8" role="tab"><span><i class="ti-user"></i></span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages8" role="tab"><span><i class="ti-list"></i></span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home8" role="tabpanel">
                                        <div class="p-20">
                                            <h5>Best Clean Tab ever</h5>
                                            <h6>you can use it with the small code</h6>
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile8" role="tabpanel">
									 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Basic Elements</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Text</label>
                                                    <input type="text" class="form-control" value="Some text value...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input id="example-email" class="form-control" type="email" placeholder="Email" name="example-email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" type="password" value="password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Text area</label>
                                                    <textarea class="form-control" rows="3" placeholder="Text input"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Readonly</label>
                                                    <input class="form-control" type="text" value="Readonly value" readonly="">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Disabled</label>
                                                    <input class="form-control" type="text" value="Disabled value" disabled="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Static control</label>
                                                    <p class="form-control-static">email@example.com</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Helping text</label>
                                                    <input class="form-control" type="text" placeholder="Helping text">
                                                    <span class="help-block">
														<small>A block of help text that breaks onto a new line and may extend beyond one line.</small>
													</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Input Select</label>
                                                    <select class="form-control">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Multiple Select</label>
                                                    <select multiple class="form-control">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                   </div>
									
                                    <div class="tab-pane p-20" id="messages8" role="tabpanel">3</div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- End TAB-->
            
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-body"> This is some text within a card block. </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
			
            <!-- End Container fluid  -->
			 <div class="container-fluid">
	                       <div class="panel panel-default">
	                           <div class="card">
	                               Something
	                           </div>
	                           <div class="card-body">
	                               This layout uses tabs to demonstrate what you could do with it. It probably makes more sense to use individual pages/templates in a production app.
	                               <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
								   
	                           </div>
	                       </div>
	                   </div>
					   
			 <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dropzone</h4>
                                <h6 class="card-subtitle">For multiple file upload put class <code>.dropzone</code> to form.</h6>
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
  
  
  


    <script src="js/lib/dropzone/dropzone.js"></script>
            
<?php 


include 'template/footer.php';

?>

