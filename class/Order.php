<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>

<?php

  class Order{

    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Format();
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

    public function getOrderBySale($sale) {
      $query = "SELECT * FROM tbl_order WHERE sale = '$sale'";
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

    public function saleStatus($sale) {
      $get = "SELECT * FROM tbl_purchase WHERE sale = '$sale' AND payment != 1";
      $getro = $this->db->select($get);
      if($getro) {
        $total = 0;
        while ($value = $getro->fetch_assoc()) {
          $amount = $value['amount'];
          $total = $total + $amount;
        }
      }
      $sum = Session::get('sum');
      $rem = $sum - $total;
      $query = "UPDATE tbl_sales
                SET
                rem = '$rem',
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
            //echo "<script>window.location = 'success.php'</script>";
            echo "<script>window.location = 'success.php?sale=".$sale."'</script>";
          }
        }
      }
    }


    public function payableAmount($cmId) {
      $query = "SELECT * FROM tbl_sales WHERE cmId = '$cmId' AND date = now()";
      $result = $this->db->select($query);
      return $result;
    }

  }
