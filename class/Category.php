<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/Format.php");
?>
<?php
  class Category {

    private $db;
    private $fm;

  function __construct(){
      $this->db = new Database();
      $this->fm = new Format();
    }

  public function catInsert($catName){
    $catName = $this->fm->validation($catName);

    $catname = mysqli_real_escape_string($this->db->link, $catName);


    if (empty($catName)) {
      $msg = "<span class='alert alert-warning'>Category must not be empty!</span>";
      return $msg;
    }
    $repquery = "SELECT * FROM tbl_category WHERE catName = '$catName' LIMIT 1";
    $repchk = $this->db->select($repquery);
    if ($repchk != false) {
      $msg = "<span class='alert alert-danger alert-dismissable'>Category name or ID already Exist!</span>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
      $catinsert = $this->db->insert($query);
      if ($catinsert) {
        $msg = "<span class='alert alert-success'>Category inserted successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Category didn't insert!!</span>";
        return $msg;
      }
    }
  }

  public function getAllcat(){
    $query = "SELECT * FROM tbl_category ORDER BY catId ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getCatById($id){
    $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function catUpdate($data, $id){
    $catName = $_POST['catName'];

    $catName = $this->fm->validation($catName);
    $catId   = $this->fm->validation($catId);

    $catname = mysqli_real_escape_string($this->db->link, $catName);

    if (empty($catName)) {
      $msg = "<span class='alert alert-warning'>Category must not be empty!</span>";
      return $msg;
    } else {
      $query = "UPDATE tbl_category
                SET
                catName = '$catName',
                WHERE catId ='$id'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<span class='alert alert-success'>Category updated successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Category didn't update!!</span>";
        return $msg;
      }
    }

  }

  public function delCatId($id){
    $query = "DELETE FROM tbl_category WHERE catId = '$id'";
    $delcat = $this->db->delete($query);
    if($delcat){
      $msg = "<span class='success'>Category deleted successfully!</span>";
      return $msg;
    } else {
      $msg = "<span class='success'>Category not deleted!</span>";
      return $msg;
    }
  }


  public function subInsert($data){
    $subName = $_POST['subName'];
    $catId   = $_POST['catId'];

    $subName = $this->fm->validation($subName);
    $catId   = $this->fm->validation($catId);
    $subId   = $this->fm->validation($subId);

    $subName = mysqli_real_escape_string($this->db->link, $subName);
    $catId   = mysqli_real_escape_string($this->db->link, $catId);


    if (empty($subName) || empty($catId) ) {
      $msg = "<span class='alert alert-warning alert-dismissable'>Field must not be empty!</span>";
      return $msg;
    }
    $repquery = "SELECT * FROM tbl_subcat WHERE subName = '$subName' LIMIT 1";
    $repchk = $this->db->select($repquery);
    if ($repchk != false) {
      $msg = "<span class='alert alert-danger'>Sub Category name or ID already Exist!</span>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_subcat(subName, catId) VALUES('$subName', '$catId')";
      $catinsert = $this->db->insert($query);
      if ($catinsert) {
        $msg = "<span class='alert alert-success'>Sub Category inserted successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Sub Category didn't insert!!</span>";
        return $msg;
      }
    }
  }


  public function getAllSub(){
    $query = "SELECT s.*,c.catName
              FROM tbl_subcat AS s, tbl_category AS c
              WHERE s.catId = c.catId
              ORDER BY subId DESC";
/*    $query = "SELECT tbl_subcat.*, tbl_category.catName
              From tbl_subcat
              INNER JOIN tbl_category
              ON tbl_subcat.catId = tbl_category.catId
              ORDER BY id DESC"; */
    $result = $this->db->select($query);
    return $result;
  }


  public function getSubById($id){
    $query = "SELECT * FROM tbl_subcat WHERE subId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }


  public function subUpdate($data, $id){
    $subName = $_POST['subName'];
    $catId   = $_POST['catId'];

    $subName = $this->fm->validation($subName);
    $catId   = $this->fm->validation($catId);

    $subName = mysqli_real_escape_string($this->db->link, $subName);
    $catId   = mysqli_real_escape_string($this->db->link, $catId);


    if (empty($subName) || empty($catId)) {
      $msg = "<span class='alert alert-warning alert-dismissable'>Field must not be empty!</span>";
      return $msg;
    } else {
      $query = "UPDATE tbl_subcat
                SET
                subName = '$subName',
                catId   = '$catId'
                WHERE subId ='$id'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<span class='alert alert-success'>Sub Category updated successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Sub Category didn't update!!</span>";
        return $msg;
      }
    }
  }

}

?>
