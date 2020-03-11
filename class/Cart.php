<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>

<?php

  class Cart{

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }

  /*  public function findProduct($data){
      $search = $_POST['title'];

      $search = $this->fm->validation($search);

      $search = mysqli_real_escape_string($this->db->link, $search);

      $query = "SELECT p.*,c.catName, s.subName, b.brandName, br.branchName, sp.suppName
                FROM tbl_inventory AS p, tbl_category AS c, tbl_subcat AS s, tbl_brand AS b, tbl_branch AS br, tbl_supplier AS sp
                WHERE p.pdName LIKE '%$search%' AND p.catId = c.catId AND p.subId = s.subId AND p.brandId = b.brandId AND p.branchId = br.branchId AND p.suppId = sp.suppId
                ORDER BY id DESC";
      //"SELECT * FROM tbl_inventory WHERE pdName LIKE '%$search%'";
      $result = $this->db->select($query);
      if ($result) {
        $output = "
              <table class='table table-hover' id='dataTables-example'>
                    <thead>
                        <tr>
                            <th>Product</th>
                             <th>Brand</th>
                            <th>Branch</th>
                            <th>Quantity</th>
                            <th>Price per Unit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    ";
      while ($res = $result->fetch_assoc()) {
        $output .= "
                  <tbody>
                    <tr>
                        <td>".$res['pdName']."</td>
                        <td>".$res['brandName']."</td>
                        <td>".$res['branchName']."</td>
                        <td><input type='number' id='quantity' value='1'></td>
                        <td>".$res['ppu']."</td>
                        <td><input type='hidden' id='id' style='border: none;' value='".$res['inventId']."' readonly ></td>
                        <td>
                            <button type='button' id='cart' class='btn btn-success btn-sm'><i class='fa fa-shopping-cart'> Add Cart</i></button>
                        </td>
                    </tr>
                  </tbody>
          ";
        // $pdName = $res['pdName'];
        // $brandName = $res['brandName'];
        // $branchName = $res['branchName'];
        // $inventId = $res['inventId'];
        // $ppu = $res['ppu'];
      }
      $output .= "</table>";
      // echo $out;
      $output = $output;
       echo $output;
     } else {
        $output = "
          <div class='panel-body'>
                <h3>Item NOT FOUND!!</h3>
          </div>
          ";
        echo $output;
      }

    }*/

    public function findProduct($adminBranch, $data){

      $search = $_POST['title'];

      $search = $this->fm->validation($search);
     // $adminBranch = Session::get("adminBranch");
      
      $search = mysqli_real_escape_string($this->db->link, $search);
      $query ='';
      if($adminBranch>0){
      $query = "SELECT p.*,c.catName, s.subName, b.brandName, br.branchName, sp.suppName 
                FROM tbl_inventory AS p, tbl_category AS c, tbl_subcat AS s, tbl_brand AS b, tbl_branch AS br, tbl_supplier AS sp
                WHERE p.pdName LIKE '%$search%' AND p.catId = c.catId AND p.subId = s.subId AND p.brandId = b.brandId AND p.branchId = br.branchId AND p.suppId = sp.suppId AND p.branchId=$adminBranch
                ORDER BY id DESC";

      //"SELECT * FROM tbl_inventory WHERE pdName LIKE '%$search%'";
      }else{
        $query = "SELECT p.*,c.catName, s.subName, b.brandName, br.branchName, sp.suppName 
                FROM tbl_inventory AS p, tbl_category AS c, tbl_subcat AS s, tbl_brand AS b, tbl_branch AS br, tbl_supplier AS sp
                WHERE p.pdName LIKE '%$search%' AND p.catId = c.catId AND p.subId = s.subId AND p.brandId = b.brandId AND p.branchId = br.branchId AND p.suppId = sp.suppId
                ORDER BY id DESC";

      } 

      $rs = $this->db->select($query);
      if ($rs) {
        $result = $rs->fetch_assoc();;
        $output = "
      <div class='panel-body'>
          <div class='table-responsive'>
         
              <table class='table table-hover' id='dataTables-example'>
                  <thead>
                      <tr>
                          
                          <th>Product</th>
                           <th>Brand</th>
                          <th>Branch</th>
                          <th>Avaiblable Quantity</th>
                          <th>Quantity</th>
                          <th>Price per Unit</th>
                          <th>ID</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <td>".$result['pdName']."</td>
                            <td>".$result['brandName']."</td>
                            <td>".$result['branchName']."</td>
                            <td id='avl' value='".$result['availability']."'>".$result['availability']."</td>
                            <td><input type='text' id='quantity' oninput='checkValue()'></td>
                            <td>".$result['ppu']."</td>
                            <td><input type='number' id='id' style='border: none;' value='".$result['inventId']."' readonly ></td>
                            <td>
                                <button type='button' id='cart' class='btn btn-success btn-sm'><i class='fa fa-shopping-cart'> Add Cart</i></button>
                            </td>
                        </tr>
                  </tbody>
              </table>
          </div>
      </div>
      ";
   
      
      //echo $query;
      echo $output;
      }else{
        echo            " <div class='panel-body'>Not found<div>";
      }

    }

    public function addToCart($quantity, $id) {
      $quantity = $this->fm->validation($quantity);

      $quantity = mysqli_real_escape_string($this->db->link, $quantity);
      $inventId = mysqli_real_escape_string($this->db->link, $id);

      $sId = session_id();

      $squery = "SELECT * FROM tbl_inventory WHERE inventId = '$inventId'";
      $result = $this->db->select($squery)->fetch_assoc();

      $avail = $result['availability'];
      $pdName = $result['pdName'];
      $price = $result['ppu'];

      if ($quantity > $avail) {
        $error =
          "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              Insufficient Stock! Please change quantity!
          </div>";
        echo $error;        
      } else {

      $chquery = "SELECT * FROM tbl_cart WHERE inventId = '$inventId' AND sId = '$sId'";
      $getPro = $this->db->select($chquery);
      if ($getPro) {
//        echo "added";
        $added =
          "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              Item already added to cart. <a href='cartlist.php' class='alert-link'>Check Cart</a>.
          </div>";
        echo $added;
      } else {
      $query = "INSERT INTO tbl_cart(pdName, price, quantity, inventId, sId) VALUES('$pdName', '$price', '$quantity', '$inventId', '$sId')";
      $inserted_row = $this->db->insert($query);
      if ($inserted_row) {
//        echo "carted";
        $carted =
          "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Item sent to cart successfully! <a href='cartlist.php' class='alert-link'>Check Cart</a>.
          </div>";
        echo $carted;
      } else {
//        echo "error";
        $error =
          "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ERROR!!
          </div>";
        echo $error;
        }
      }
      }
    }

    public function getCartProduct() {
      $sId = session_id();
      $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
      $result = $this->db->select($query);
      return $result;
    }

    public function updateCartQ($data) {
      $quantity = $_POST['quantity'];
      $id       = $_POST['inventId'];
      $sId      = session_id();

      $id       = mysqli_real_escape_string($this->db->link, $id);
      $quantity = mysqli_real_escape_string($this->db->link, $quantity);

      $query = "UPDATE tbl_cart
                SET
                quantity = '$quantity'
                WHERE inventId = '$id' AND sId = '$sId'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
      } else {
        $msg = "<span class='error'>Quantity not updated!</span>";
        return $msg;
      }
    }

    public function delProductById($delId) {
      $sId = session_id();
      $delId = mysqli_real_escape_string($this->db->link, $delId);
      $query = "DELETE FROM tbl_cart WHERE inventId = '$delId' AND sId = '$sId'";
      $delData = $this->db->delete($query);
      if ($delData) {
      } else {
        $msg = "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  ERROR!!
             </div>";
        return $msg;
      }
    }

    public function checkCartTable() {
      $sId    = session_id();
      $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
      $result = $this->db->select($query);
      return $result;
    }

    public function delCustomerCart() {
      $sId = session_id();
      $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
      $this->db->delete($query);
    }

  }






?>
<script>

  function checkValue(){
  
  var d = document.getElementById('quantity').value;
  var a = document.getElementById('avl').value;

}


</script>