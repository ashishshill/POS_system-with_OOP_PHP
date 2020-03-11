<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
* Brand
*/
class Brand{

  private $db;
  private $fm;

  function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function brandInsert($data){
    $brandName = $_POST['brandName'];
    $brandId   = $_POST['brandId'];

    $brandName = $this->fm->validation($brandName);
    $brandId = $this->fm->validation($brandId);

    $brandName = mysqli_real_escape_string($this->db->link, $brandName);
    $brandId = mysqli_real_escape_string($this->db->link, $brandId);

    if (empty($brandName) || empty($brandId)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    }
    $repquery = "SELECT * FROM tbl_brand WHERE brandName = '$brandName' OR brandId = '$brandId' LIMIT 1";
    $repchk = $this->db->select($repquery);
    if ($repchk != false) {
      $msg = "<span class='alert alert-danger'>Brand name or ID already Exist!</span>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_brand(brandName, brandId) VALUES('$brandName', '$brandId')";
      $brandinsert = $this->db->insert($query);
      if ($brandinsert) {
        $msg = "<span class='alert alert-success'>Brand inserted successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Brand didn't insert!!</span>";
        return $msg;
      }
    }
  }

  public function getAllbrand(){
    $query  = "SELECT * FROM tbl_brand ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getBrandById($id){
    $query  = "SELECT * FROM tbl_brand WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function brandUpdate($data, $id){
    $brandName = $_POST['brandName'];
    $brandId   = $_POST['brandId'];

    $brandName = $this->fm->validation($brandName);
    $brandId   = $this->fm->validation($brandId);

    $brandName = mysqli_real_escape_string($this->db->link, $brandName);
    $brandId   = mysqli_real_escape_string($this->db->link, $brandId);

    if (empty($brandName) || empty($brandId)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    } else {
      $query = "UPDATE tbl_brand
                SET
                brandName = '$brandName',
                brandId   = '$brandId'
                WHERE id ='$id'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<span class='alert alert-success'>Brand updated successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Brand didn't update!!</span>";
        return $msg;
      }
    }

  }

  public function delBrandId($id){
    $query    = "DELETE FROM tbl_brand WHERE brandId = '$id'";
    $delbrand = $this->db->delete($query);
    if($delbrand){
      $msg = "<span class='success'>Category deleted successfully!</span>";
      return $msg;
    } else {
      $msg = "<span class='success'>Category not deleted!</span>";
      return $msg;
    }
  }

}

?>
