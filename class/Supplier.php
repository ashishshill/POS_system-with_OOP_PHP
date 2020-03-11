<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
* Supplier
*/
class Supplier {

  private $db;
  private $fm;

  function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function suppInsert($data) {
    $suppName    = $_POST['suppName'];
    $suppAss     = $_POST['suppAss'];
    $suppContact = $_POST['suppContact'];
    $suppMail    = $_POST['suppMail'];
    $suppAddress = $_POST['suppAddress'];

    $suppName    = $this->fm->validation($suppName);
    $suppAss     = $this->fm->validation($suppAss);
    $suppContact = $this->fm->validation($suppContact);
    $suppMail    = $this->fm->validation($suppMail);
    $suppAddress = $this->fm->validation($suppAddress);

    $suppName    = mysqli_real_escape_string($this->db->link, $suppName);
    $suppAss     = mysqli_real_escape_string($this->db->link, $suppAss);
    $suppContact = mysqli_real_escape_string($this->db->link, $suppContact);
    $suppMail    = mysqli_real_escape_string($this->db->link, $suppMail);
    $suppAddress = mysqli_real_escape_string($this->db->link, $suppAddress);

    if (empty($suppName) || empty($suppAss) || empty($suppContact) || empty($suppMail) || empty($suppAddress)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    }
    $repquery = "SELECT * FROM tbl_supplier WHERE suppName = '$suppName'";
    $repchk = $this->db->select($repquery);
    if ($repchk != false) {
      $msg = "<span class='alert alert-danger'>Supplier Name already Exist!</span>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_supplier(suppName, suppAss, suppContact, suppMail, suppAddress) VALUES('$suppName', '$suppAss', '$suppContact', '$suppMail', '$suppAddress')";
      $empinsert = $this->db->insert($query);
      if ($empinsert) {
        $msg = "<span class='alert alert-success'>Supplier Information inserted successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Supplier Information didn't insert!!</span>";
        return $msg;
      }
    }
  }

  public function suppUpdate($data, $id) {
    $suppName    = $_POST['suppName'];
    $suppAss     = $_POST['suppAss'];
    $suppContact = $_POST['suppContact'];
    $suppMail    = $_POST['suppMail'];
    $suppAddress = $_POST['suppAddress'];

    $suppName    = $this->fm->validation($suppName);
    $suppAss     = $this->fm->validation($suppAss);
    $suppContact = $this->fm->validation($suppContact);
    $suppMail    = $this->fm->validation($suppMail);
    $suppAddress = $this->fm->validation($suppAddress);

    $suppName    = mysqli_real_escape_string($this->db->link, $suppName);
    $suppAss     = mysqli_real_escape_string($this->db->link, $suppAss);
    $suppContact = mysqli_real_escape_string($this->db->link, $suppContact);
    $suppMail    = mysqli_real_escape_string($this->db->link, $suppMail);
    $suppAddress = mysqli_real_escape_string($this->db->link, $suppAddress);

    if (empty($suppName) || empty($suppAss) || empty($suppContact) || empty($suppMail) || empty($suppAddress)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    } else {
        $query = "UPDATE tbl_supplier
                  SET
                  suppName    = '$suppName',
                  suppAss     = '$suppAss',
                  suppContact = '$suppContact',
                  suppMail    = '$suppMail',
                  suppAddress = '$suppAddress'
                  WHERE suppId = '$id'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
          $msg = "<span class='alert alert-success'>Supplier Information updated successfully!</span>";
          return $msg;
        } else {
          $msg = "<span class='alert alert-danger'>Supplier Information didn't update!!</span>";
          return $msg;
        }
    }
  }

  public function getDueByBranch() {
    $query = "SELECT `b`.`branchName`, b.branchId , b.branchAddress , s.rem , s.date  , s.totalPrice, c.customName , c.customContact
FROM tbl_sales as s, tbl_order as o, tbl_inventory as p , tbl_branch as b , tbl_customer AS c 
WHERE  s.id = o.sale 
AND o.inventId = p.inventId 
AND p.branchId = b.branchId
AND s.customer = c.cmId
AND rem > 0  
ORDER BY `b`.`branchName`  DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getAllsupp() {
    $query = "SELECT * FROM tbl_supplier ORDER BY suppId DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getSuppById($id) {
    $query = "SELECT * FROM tbl_supplier WHERE suppId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

}
