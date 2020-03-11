<?php include "../inc/header.php"; ?>
<?php
	
 $search = $_POST['title'];

     // $search = $this->fm->validation($search);
      $adminBranch = Session::get("adminBranch");
      
      

  $productFind = $ct->findProduct($adminBranch,$_POST);
 ?>
