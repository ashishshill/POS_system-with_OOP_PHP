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

      $result = $this->db->select($query)->fetch_assoc();
      if ($result) {

        $output = "
      <div class='panel-body'>
          <div class='table-responsive'>
         
              <table class='table table-hover' id='dataTables-example'>
                  <thead>
                      <tr>
                          <th>".$query."</th>
                          <th>Product</th>
                           <th>Brand</th>
                          <th>Branch</th>
                          <th>Quantity</th>
                          <th> Available Quantity</th>
                          <th>Price per Unit</th>
                          <th>ID</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr><td></td>
                            <td>".$result['pdName']."</td>
                            <td>".$result['brandName']."</td>
                            <td>".$result['branchName']."</td>
                            <td><input type='number' id='quantity' value='1'></td>
                            <td>".$result['availability']."</td>
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
      }

    }

    public function addToCart($quantity, $id) {
      $quantity = $this->fm->validation($quantity);

      $quantity = mysqli_real_escape_string($this->db->link, $quantity);
      $inventId = mysqli_real_escape_string($this->db->link, $id);

      $sId = session_id();

      $squery = "SELECT * FROM tbl_inventory WHERE inventId = '$inventId'";
      $result = $this->db->select($squery)->fetch_assoc();

      $pdName = $result['pdName'];
      $price = $result['ppu'];

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
                Item sent to cart successfully!
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

  public function getCartProduct() {
    $sId = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
    $result = $this->db->select($query);
    return $result;
  }

  public function updateCartQ($data) {
    $quantity = $_POST['quantity'];
    $id       = $_POST['inventId'];
    $sId = session_id();

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
    $delId   = mysqli_real_escape_string($this->db->link, $delId);
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

  public function saleInsert($sum, $cmId) {
    $query = "INSERT INTO tbl_sales(customer, totalPrice) VALUES('$cmId', '$sum')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      $chquery = "SELECT * FROM tbl_sales WHERE customer = '$cmId'";
      $srow = $this->db->select($chquery);
      if ($srow) {
        while ($result = $srow->fetch_assoc()) {
          $saleId = $result['id'];
          Session::set("sale", $saleId);
        }
      } else {
        $msg = "<span class='error'>Sale ID not updated!</span>";
        return $msg;
      }
    }
  }


  public function orderProduct($cmId) {
    $sId = session_id();
    $sale = Session::get("sale");
    $dquery = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
    $getPro = $this->db->select($dquery);
    if ($getPro) {
      while ($result = $getPro->fetch_assoc()) {
        $productId = $result['inventId'];
        $productName = $result['pdName'];
        $quantity = $result['quantity'];
        $price = $result['price'];

        $query = "INSERT INTO tbl_order(cmId, inventId, pdName, quantity, price, sId, sale) VALUES('$cmId', '$productId', '$productName', '$quantity', '$price', '$sId', '$sale')";
        $inserted_row = $this->db->insert($query);
        if ($inserted_row) {
          echo "<script>window.location = 'payment.php'</script>";
        } else {
          $msg = "<span class='error'>Product not deleted!</span>";
          return $msg;
        }
      }
    }
  }


  public function getAllPay() {
    $query = "SELECT * FROM tbl_payment";
    $payCheck = $this->db->select($query);
    return $payCheck;
  }

  public function payInsert($payment){
    $payment = $this->fm->validation($payment);

    $payment = mysqli_real_escape_string($this->db->link, $payment);

    if (empty($payment)) {
      $msg = "<span class='alert alert-warning'>Payment must not be empty!</span>";
      return $msg;
    }
    $repquery = "SELECT * FROM tbl_payment WHERE payment = '$payment'";
    $repchk = $this->db->select($repquery);
    if ($repchk != false) {
      $msg = "<span class='alert alert-danger alert-dismissable'>Category name or ID already Exist!</span>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_payment(payment) VALUES('$payment')";
      $payinsert = $this->db->insert($query);
      if ($payinsert) {
        $msg = "<span class='alert alert-success'>Category inserted successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Category didn't insert!!</span>";
        return $msg;
      }
    }
  }

  public function payById($sale) {
    $query = "SELECT * FROM tbl_purchase WHERE sale = '$sale'";
    $pay = $this->db->select($query);
    return $pay;
  }

  public function payPerView($payId) {
    $query = "SELECT * FROM tbl_payment WHERE id = '$payId'";
    $result = $this->db->select($query);
    return $result;
  }

  public function saleStatus($sale) {
    $query = "UPDATE tbl_sales
              SET
              status = '1'
              WHERE id = '$sale'";
    $sup = $this->db->update($query);
    if ($sup) {
      $iquery = "SELECT * FROM tbl_order WHERE sale = '$sale'";
      $selected_row = $this->db->select($iquery);
      if ($selected_row) {
        while ($value = $selected_row->fetch_assoc()) {
          $iId = $value['inventId'];
          $qty2 = $value['quantity'];
        }
      }
      $vquery = "SELECT * FROM tbl_inventory WHERE inventId = '$iId'";
      $ordered_row = $this->db->select($vquery);
      if ($ordered_row) {
        while ($order = $ordered_row->fetch_assoc()) {
          $qty1 = $order['availability'];
          $q = $qty1 - $qty2;
          $uquery = "UPDATE tbl_inventory
                     SET
                     availability = '$q'
                     WHERE inventId = '$iId'";
          $updated_row = $this->db->update($uquery);
          echo "<script>window.location = 'success.php?sale=".$sale."'</script>";
        }
      }
    }
  }

  public function cusInsert($data) {
    $customName    = $_POST['customName'];
    $customContact = $_POST['customContact'];

    $customName    = $this->fm->validation($customName);
    $customContact = $this->fm->validation($customContact);

    $customName    = mysqli_real_escape_string($this->db->link, $customName);
    $customContact = mysqli_real_escape_string($this->db->link, $customContact);

    $chkquery = "SELECT * FROM tbl_customer WHERE customContact = '$customContact'";
    $chk_row = $this->db->select($chkquery);
    if ($chk_row) {
      $chkresult = $chk_row->fetch_assoc();
      $cmId = $chkresult['cmId'];
      Session::set("cmId", $cmId);
      echo "<script>window.location = 'order.php'</script>";
    } else {
    $query = "INSERT INTO tbl_customer(customName, customContact) VALUES('$customName', '$customContact')";
    $inserted_row = $this->db->insert($query);
      if ($inserted_row) {
        $cquery = "SELECT * FROM tbl_customer ORDER BY cmId DESC LIMIT 1";
        $crow = $this->db->select($cquery);
        if ($crow) {
          $cresult = $crow->fetch_assoc();
          $cmId = $cresult['cmId'];
          Session::set("cmId", $cmId);
          echo "<script>window.location = 'order.php'</script>";
        } else {
          $output =
              "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  ERROR!!
              </div>";
          echo $output;
        }
      }
    }
  }

  public function getCus($number){
    $query = "SELECT * FROM tbl_customer WHERE customContact = '$number'";
    $cusCheck = $this->db->select($query);
    if ($cusCheck) {
      while ($result = $cusCheck->fetch_assoc()) {
      echo $result['customName'];
      }
    }
  }

  public function getCusById($cmId){
    $query = "SELECT * FROM tbl_customer WHERE cmId = '$cmId'";
    $cusCheck = $this->db->select($query);
    return $cusCheck;
  }

  public function payableAmount($cmId) {
    $query = "SELECT * FROM tbl_sales WHERE cmId = '$cmId' AND date = now()";
    $result = $this->db->select($query);
    return $result;
  }

  public function getOrderedProduct($cmId) {
    $query = "SELECT * FROM tbl_order WHERE cmId = '$cmId' ORDER BY date DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function checkOrder($cmId) {
    $query = "SELECT * FROM tbl_order WHERE cmId = '$cmId'";
    $result = $this->db->select($query);
    return $result;
  }


  public function getAllOrderProduct() {
    $query = "SELECT * FROM tbl_order ORDER BY date DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function productShift($id, $time, $price) {
    $id = mysqli_real_escape_string($this->db->link, $id);
    $time = mysqli_real_escape_string($this->db->link, $time);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $query = "UPDATE tbl_order
              SET
              status = '1'
              WHERE id = '$id' /*cmId = '$id' AND date = '$time' AND price = '$price'*/";
    $updated_row = $this->db->update($query);
    if ($updated_row) {
      $msg = "<span class='success'>Status Updated successfully!</span>";
      return $msg;
    } else {
      $msg = "<span class='error'>Status not updated!</span>";
      return $msg;
    }
  }

  public function delProductShift($id, $time, $price) {
    $id = mysqli_real_escape_string($this->db->link, $id);
    $time = mysqli_real_escape_string($this->db->link, $time);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $query = "DELETE FROM tbl_order WHERE id = '$id'";
    $this->db->delete($query);

  }

}

?>
