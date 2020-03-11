<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
 *
 */
class Product{
  private $db;
  private $fm;

public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

public function productInsert($data){
  $pdName       = $_POST['pdName'];
  $subId        = $_POST['subId'];
  $catId        = $_POST['catId'];
  $brandId      = $_POST['brandId'];
  $suppId       = $_POST['suppId'];
  $branchId     = $_POST['branchId'];
  $amount       = $_POST['amount'];
  // $totalPrice   = $_POST['totalPrice'];
  $ppu          = $_POST['ppu'];
  $bpu          = $_POST['bpu'];


  
  $inventId     = $_POST['inventId']; 
   
  $pdName       = $this->fm->validation($pdName);
  $subId        = $this->fm->validation($subId);
  $catId        = $this->fm->validation($catId);
  $brandId      = $this->fm->validation($brandId);
  $suppId       = $this->fm->validation($suppId);
  $branchId     = $this->fm->validation($branchId);
  $amount       = $this->fm->validation($amount);
  // $totalPrice   = $this->fm->validation($totalPrice);
  $ppu          = $this->fm->validation($ppu);
  $bpu          = $this->fm->validation($bpu);
  //$availability = $this->fm->validation($availability);
  //$inventId     = $this->fm->validation($inventId);

  $pdName       = mysqli_real_escape_string($this->db->link, $pdName);
  $subId        = mysqli_real_escape_string($this->db->link, $subId);
  $catId        = mysqli_real_escape_string($this->db->link, $catId);
  $brandId      = mysqli_real_escape_string($this->db->link, $brandId);
  $suppId       = mysqli_real_escape_string($this->db->link, $suppId);
  $branchId     = mysqli_real_escape_string($this->db->link, $branchId);
  $amount       = mysqli_real_escape_string($this->db->link, $amount);
  // $totalPrice   = mysqli_real_escape_string($this->db->link, $totalPrice);
  $ppu          = mysqli_real_escape_string($this->db->link, $ppu);
  $bpu          = mysqli_real_escape_string($this->db->link, $bpu);
  //$availability = mysqli_real_escape_string($this->db->link, $availability);
  $availability = $amount;
   $totalPrice = $bpu*$amount;
 // $inventId     = mysqli_real_escape_string($this->db->link, $inventId);

  if (empty($pdName) || empty($subId) || empty($catId) || empty($brandId) || empty($suppId) || empty($branchId) || empty($amount) || empty($totalPrice) || empty($ppu)|| empty($bpu) || empty($availability) || empty($inventId)) {
    $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
    return $msg;
  }

  $repquery = "SELECT * FROM tbl_inventory WHERE pdName = '$pdName' AND brandId = '$brandId' ";
  $repchk = $this->db->select($repquery);
  if ($repchk != false) {
    $msg = "<span class='alert alert-danger'>Product already exists in this branch!</span>";
    return $msg;
  }
  $repquery = "SELECT * FROM tbl_inventory WHERE inventId = $inventId";
  $repchk = $this->db->select($repquery);
  if ($repchk != false) {
    $msg = "<span class='alert alert-danger'>Item Identification already Exist!</span>";
    return $msg;
  } else {
    $query = "INSERT INTO tbl_inventory(pdName, subId, catId, brandId, suppId, branchId, amount, totalPrice, ppu, bpu, availability, inventId) VALUES('$pdName', '$subId', '$catId', '$brandId', '$suppId', '$branchId', '$amount', '$totalPrice', '$ppu', '$bpu', '$availability', '$inventId')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      $msg = "<span class='alert alert-success'>Inventory inserted successfully!</span>";
      $this->insertHistory($data,$inventId);
      return $msg;
    } else {
      $msg = "<span class='alert alert-danger'>Inventory didn't insert!!</span>";
      return $msg;
    }
  }
}

public function getAllPd(){
  $adminBranch = Session::get("adminBranch");
  if($adminBranch > 0){
    $query = "SELECT p.*,c.catName, s.subName, b.brandName, br.branchName, sp.suppName
              FROM tbl_inventory AS p, tbl_category AS c, tbl_subcat AS s, tbl_brand AS b, tbl_branch AS br, tbl_supplier AS sp
              WHERE p.catId = c.catId AND p.subId = s.subId AND p.brandId = b.brandId AND p.branchId = '$adminBranch' AND br.branchId = '$adminBranch' AND p.suppId = sp.suppId
              ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  } else {
    $query = "SELECT p.*,c.catName, s.subName, b.brandName, br.branchName, sp.suppName
              FROM tbl_inventory AS p, tbl_category AS c, tbl_subcat AS s, tbl_brand AS b, tbl_branch AS br, tbl_supplier AS sp
              WHERE p.catId = c.catId AND p.subId = s.subId AND p.brandId = b.brandId AND p.branchId = br.branchId AND p.suppId = sp.suppId
              ORDER BY id DESC";
    /*$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
              From tbl_product
              INNER JOIN tbl_category
              ON tbl_product.catId = tbl_category.catId
              INNER JOIN tbl_brand
              ON tbl_product.brandId = tbl_brand.brandId
              ORDER BY productId DESC"; */
    $result = $this->db->select($query);
    return $result;
  }
}

public function getPdById($id){
  $query = "SELECT * FROM tbl_inventory WHERE inventId = '$id'";
  $result = $this->db->select($query);
  return $result;
}

public function getPdByIde($id){
  $query = "SELECT * FROM tbl_inventory WHERE Id = '$id'";
  $result = $this->db->select($query);
  return $result;
}
public function productUpdate($data, $id){
  $pdName       = $_POST['pdName'];
  $subId        = $_POST['subId'];
  $catId        = $_POST['catId'];
  $brandId      = $_POST['brandId'];
  $suppId       = $_POST['suppId'];
  $branchId     = $_POST['branchId'];
  $newstock       = $_POST['newstock'];
  $totalPrice   = $_POST['totalPrice'];
  $ppu          = $_POST['ppu'];
  $bpu          = $_POST['bpu'];
  // $availability = $_POST['availability'];
//  $inventId     = $_POST['inventId']; echo $inventId;
  $inventId     = $_POST['inventId']; 
  $pamount       = $_POST['previousAmount'];

  $amount = $pamount + $newstock ;

  $pdName       = $this->fm->validation($pdName);
  $subId        = $this->fm->validation($subId);
  $catId        = $this->fm->validation($catId);
  $brandId      = $this->fm->validation($brandId);
  $suppId       = $this->fm->validation($suppId);
  $branchId     = $this->fm->validation($branchId);
  $amount       = $this->fm->validation($amount);
  $totalPrice   = $this->fm->validation($totalPrice);
  $ppu          = $this->fm->validation($ppu);
  // $availability = $this->fm->validation($availability);
  //$inventId     = $this->fm->validation($inventId);

  $pdName       = mysqli_real_escape_string($this->db->link, $pdName);
  $subId        = mysqli_real_escape_string($this->db->link, $subId);
  $catId        = mysqli_real_escape_string($this->db->link, $catId);
  $brandId      = mysqli_real_escape_string($this->db->link, $brandId);
  $suppId       = mysqli_real_escape_string($this->db->link, $suppId);
  $branchId     = mysqli_real_escape_string($this->db->link, $branchId);
  $amount       = mysqli_real_escape_string($this->db->link, $amount);
  $totalPrice   = mysqli_real_escape_string($this->db->link, $totalPrice);
  $ppu          = mysqli_real_escape_string($this->db->link, $ppu);
  $bpu          = mysqli_real_escape_string($this->db->link, $bpu);
  // $availability = mysqli_real_escape_string($this->db->link, $availability);
  //$inventId     = mysqli_real_escape_string($this->db->link, $inventId);

  if (empty($pdName) || empty($subId) || empty($catId) || empty($brandId) || empty($suppId) || empty($branchId) || empty($amount) || empty($totalPrice) || empty($ppu) || empty($bpu) || empty($id)) {
    $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
    return $msg;
  } else{
      $query = "UPDATE tbl_inventory
                SET
                pdName       = '$pdName',
                subId        = '$subId',
                catId        = '$catId',
                brandId      = '$brandId',
                suppId       = '$suppId',
                branchId     = '$branchId',
                amount       = '$amount',
                totalPrice   = '$totalPrice',
                ppu          = '$ppu',
                availability = '$amount'
                
                WHERE id = '$id'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<span class='alert alert-success'>Inventory updated successfully!</span>";
        $this->insertHistory($data,$inventId);
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Inventory didn't update!!</span>";
        return $msg;
      }
    }
  }

public function pdDel($id){
  $query = "DELETE FROM tbl_product WHERE productId = '$id'";
  $delPd = $this->db->delete($query);
  if ($delPd) {
    $msg = "<span class='success'>Product deleted successfully!</span>";
    return $msg;
  } else {
    $msg = "<span class='success'>Product deleted!</span>";
    return $msg;
  }
}

public function getFeaturedProduct(){
  $query = "SELECT * FROM tbl_inventory WHERE type='1' ORDER BY productId DESC LIMIT 4 ";
  $result = $this->db->select($query);
  return $result;
}

public function getNewProduct(){
  $query = "SELECT * FROM tbl_inventory ORDER BY productId DESC LIMIT 4 ";
  $result = $this->db->select($query);
  return $result;
}

public function getSingleProduct($id){
//$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
  $query = "SELECT pr.*,ca.catName, br.brandName
            FROM tbl_inventory AS pr, tbl_category AS ca, tbl_brand AS br
            WHERE pr.catId = ca.catId AND pr.brandId = br.brandId AND pr.productId = '$id'";
  $result = $this->db->select($query);
  //$result = mysqli_fetch_assoc();
  return $result;
}

public function latestFromAdidas() {
  $query = "SELECT * FROM tbl_inventory WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
  $result = $this->db->select($query);
  return $result;
}

public function latestFromMicrosoft() {
  $query = "SELECT * FROM tbl_inventory WHERE brandId = '7' ORDER BY productId DESC LIMIT 1";
  $result = $this->db->select($query);
  return $result;
}

public function latestFromNike() {
  $query = "SELECT * FROM tbl_inventory WHERE brandId = '5' ORDER BY productId DESC LIMIT 1";
  $result = $this->db->select($query);
  return $result;
}

public function latestFromPuma() {
  $query = "SELECT * FROM tbl_inventory WHERE brandId = '6' ORDER BY productId DESC LIMIT 1";
  $result = $this->db->select($query);
  return $result;
}

public function getPdByCat($id) {
  $query = "SELECT * FROM tbl_inventory WHERE catId = '$id' ORDER BY productId DESC";
  $result = $this->db->select($query);
  return $result;
}

public function insertHistory($data,$inventId){
    
    
    if (isset($_POST['amount'])){ 
      $amount       = $_POST['amount'];
    }

    $bpu          = $_POST['bpu'];

    
  if (isset($_POST['totalPrice'])){ 
    $totalPrice   = $_POST['totalPrice'];

    $totalPrice   = mysqli_real_escape_string($this->db->link, $totalPrice);
    $totalPrice   = $this->fm->validation($totalPrice);
  }else{
    $totalPrice = $bpu*$amount;
  }
 
    

  
    
    
    $inventId     = $this->fm->validation($inventId);

    
    

    if ((isset($_POST['newstock']) && $_POST['newstock'] != "") || isset($_POST['amount'])) {

      if (isset($_POST['newstock'])){
      $amount       = $_POST['newstock'];
       $bpu          = $_POST['bpu'];

       $totalPrice = $bpu*$amount;

      }

    $amount       = $this->fm->validation($amount);

    $amount       = mysqli_real_escape_string($this->db->link, $amount);

      $query = "INSERT INTO buy_history (inventory_id, amount, total_price) VALUES('$inventId', '$amount', '$totalPrice')";
    $inserted_row = $this->db->insert($query);
    }

     
    

}

}
?>
