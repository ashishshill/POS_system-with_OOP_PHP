<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Session.php");
  Session::checkAdminLogin();
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/Format.php");
?>

<?php
/**
 * Administration class
 */
class Adminlogin {
  private $db;
  private $fm;

  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function adminLogin($adminUser, $adminPass){
    $adminUser = $this->fm->validation($adminUser);
    $adminPass = $this->fm->validation($adminPass);

    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

    if (empty($adminUser) || empty($adminPass)) {
      $loginmsg = "Username or Password must not be empty!";
      return $loginmsg;
    } else {
/*      $query = "SELECT p.*,c.branchId
                FROM tbl_admin AS p, tbl_employee AS c
                WHERE p.adminUser = '$adminUser' AND p.adminPass = '$adminPass' AND p.empId = c.empId
                ORDER BY id DESC";
                */
      $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
      $result = $this->db->select($query);
      if ($result != false) {
        $value = $result->fetch_assoc();
        Session::set("adminLogin", true);
        Session::set("adminId", $value['adminId']);
        Session::set("adminName", $value['adminUser']);
        Session::set("adminStatus", $value['status']);
        Session::set("employee", $value['empId']);
        header("Location:index.php");
      } else {
        $loginmsg = "Username or Passoword not found";
        return $loginmsg;
      }
    }
  }

}

?>
