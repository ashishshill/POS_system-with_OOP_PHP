<?php   include_once 'C:/xampp/htdocs/pos/lib/Session.php';
  Session::init();
  Session::checkAdminSession();
  include_once 'C:/xampp/htdocs/pos/lib/Database.php';
  include_once 'C:/xampp/htdocs/pos/helpers/Format.php';
 ?>
<?php echo $adminBranch; ?>
