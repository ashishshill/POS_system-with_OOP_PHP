<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>

<?php

  class Payment{

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
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

    public function paymentSystem($data) {
      $payment    = $_POST['payId'];
      $rent       = $_POST['remaining'];
      $amount     = $_POST['amount'];
      $totalPrice = Session::get("sum");
      $sale       = Session::get("sale");
      $cmId       = Session::get("cmId");

      $payment = $this->fm->validation($payment);
      $amount  = $this->fm->validation($amount);

      $payment = mysqli_real_escape_string($this->db->link, $payment);
      $amount  = mysqli_real_escape_string($this->db->link, $amount);

      if (empty($payment) || empty($amount) || empty($rent)) {
        $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
        return $msg;
      } elseif ($amount > $totalPrice) {
        $msg = "<span class='alert alert-warning'>Payment cannot be greater than total!</span>";
        return $msg;
      } elseif ($amount > $rent) {
        $msg = "<span class='alert alert-warning'>Payment cannot be greater than remaining!</span>";
        return $msg;
      }
      $query = "INSERT INTO tbl_purchase(payment, amount, totalPrice, sale, cmId) VALUES('$payment', '$amount', '$totalPrice', '$sale', '$cmId')";
      $payinsert = $this->db->insert($query);
      if ($payinsert) {

      } else {
        $msg = "<span class='alert alert-danger'>Payment isn't working!!</span>";
        return $msg;
      }
    }

    public function paymentSystemZ($data, $sale) {
      $payment    = $_POST['payId'];
      $amount     = $_POST['amount'];
      $totalPrice = $_POST['sum'];
      $cmId       = $_POST['cmId'];
      $remstorm   = $_POST['remstorm'];

      $payment = $this->fm->validation($payment);
      $amount  = $this->fm->validation($amount);

      $payment = mysqli_real_escape_string($this->db->link, $payment);
      $amount  = mysqli_real_escape_string($this->db->link, $amount);

      if (empty($payment) || empty($amount) || empty($totalPrice) || empty($cmId)) {
        $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
        return $msg;
      } else {
        $get = "SELECT * FROM tbl_purchase WHERE sale = '$sale' AND payment != 1";
        $getro = $this->db->select($get);
          $total = $amount;
        if($getro) {

          while ($value = $getro->fetch_assoc()) {
            $a = $value['amount'];
            $total = $total +  $a;
          }
        }
        $rem = $totalPrice - $total;

        if ($remstorm < $rem) {
          $msg = "<span class='alert alert-warning'>Payment cannot be greater than remaining amount!</span>";
          return $msg;
        } else {
          $query = "INSERT INTO tbl_purchase(payment, amount, totalPrice, sale, cmId) VALUES('$payment', '$amount', '$totalPrice', '$sale', '$cmId')";
          $payinsert = $this->db->insert($query);
          if ($payinsert) {
            echo $rem;
            $query = "UPDATE tbl_sales
                      SET
                      rem = '$rem'
                      WHERE id = '$sale'";
                      echo $query;
            $sup = $this->db->update($query);
            if ($sup) {
              $msg = "<span class='alert alert-danger'>Payment Done!!</span>";
              return $msg;
            } else {
              $msg = "<span class='alert alert-danger'>Payment isn't working!!</span>";
              return $msg;
            }
          } else {
            $msg = "<span class='alert alert-danger'>Payment isn't working!!</span>";
            return $msg;
          }
        }
      }
    }

    public function payById($sale) {
      $query = "SELECT * FROM tbl_purchase WHERE sale = '$sale'";
      $pay = $this->db->select($query);
      return $pay;
    }

    public function getPayById($id) {
      $query = "SELECT * FROM tbl_payment WHERE id = '$id'";
      $pay = $this->db->select($query);
      return $pay;
    }

    public function payPerView($payId) {
      $query = "SELECT * FROM tbl_payment WHERE id = '$payId'";
      $result = $this->db->select($query);
      return $result;
    }





  public function vatInsert($data){
    $catId = $_POST['catId'];
    $vat   = $_POST['vat'];

    $catId = $this->fm->validation($catId);
    $vat   = $this->fm->validation($vat);

    $catId = mysqli_real_escape_string($this->db->link, $catId);
    $vat   = mysqli_real_escape_string($this->db->link, $vat);


    if (empty($catId) || empty($vat)) {
      $msg = "<span class='alert alert-warning alert-dismissable'>Field must not be empty!</span>";
      return $msg;
    }
    $repquery = "SELECT * FROM tbl_vat WHERE catId = '$catId' LIMIT 1";
    $repchk = $this->db->select($repquery);
    if ($repchk != false) {
      $msg = "<span class='alert alert-danger'> Category VAT already Exist!</span>";
      return $msg;
    } else {
      $query = "INSERT INTO tbl_vat(catId, vat) VALUES('$catId', '$vat')";
      $catinsert = $this->db->insert($query);
      if ($catinsert) {
        $msg = "<span class='alert alert-success'> Category VAT inserted successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'> Category VAT didn't insert!!</span>";
        return $msg;
      }
    }
  }

  public function getAllVAT() {
    $query = "SELECT * FROM tbl_vat ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getVATById($id) {
    $query = "SELECT * FROM tbl_vat WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }
  public function getVATByCatId($id) {
    $query = "SELECT * FROM tbl_vat WHERE catId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function vatUpdate($data, $id){
    $vat   = $_POST['vat'];

    $vat   = $this->fm->validation($vat);

    $vat   = mysqli_real_escape_string($this->db->link, $vat);

    if (empty($vat)) {
      $msg = "<span class='alert alert-warning'>Category must not be empty!</span>";
      return $msg;
    } else {
      $query = "UPDATE tbl_vat
                SET
                vat   = '$vat'
                WHERE id ='$id'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<span class='alert alert-success'>Category VAT updated successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Category VAT didn't update!!</span>";
        return $msg;
      }
    }
  }

  public function getVATFromInvent($iId) {
    $query = "SELECT s.*,c.catId
              FROM tbl_vat AS s, tbl_inventory AS c
              WHERE s.catId = c.catId";
    $result = $this->db->select($query);
    return $result;
  }

}

?>
