<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/Format.php");
?>

<?php

  class Customer{

    private $db;
    private $fm;

    public function __construct() {
      $this->db = new Database();
      $this->fm = new Format();
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
          $cquery = "SELECT * FROM tbl_customer WHERE customName = '$customName' AND customContact = '$customContact'";
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

    public function disInsert($data) {
      $hiker    = $_POST['hiker'];
      $discount = $_POST['discount'];

      $hiker    = $this->fm->validation($hiker);
      $discount = $this->fm->validation($discount);

      $hiker    = mysqli_real_escape_string($this->db->link, $hiker);
      $discount = mysqli_real_escape_string($this->db->link, $discount);

      $query = "INSERT INTO tbl_discount(hiker, discount) VALUES('$hiker', '$discount')";
      $inserted_row = $this->db->insert($query);
      if ($inserted_row) {
          $output =
              "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  Discount inserted successfully!!
              </div>";
          echo $output;
        } else {
          $output =
              "<div class='alert alert-danger alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  ERROR!!
              </div>";
          echo $output;
      }
    }

    public function getDisById($id){
      $query = "SELECT * FROM tbl_discount WHERE id = '$id'";
      $cusCheck = $this->db->select($query);
      return $cusCheck;
    }

    public function getAllDis(){
      $query = "SELECT * FROM tbl_discount ORDER BY hiker ASC";
      $cusCheck = $this->db->select($query);
      return $cusCheck;
    }

    public function getDiscount($cmId) {
      $query = "SELECT * FROM tbl_order WHERE cmId = '$cmId'";
      $disCheck = $this->db->select($query);
      $num = mysqli_num_rows($disCheck);
      $cherry = "SELECT * FROM tbl_discount WHERE discount <= '$num' ORDER BY hiker DESC LIMIT 1";
      $onTop = $this->db->select($cherry);
      return $onTop;
      // if ($onTop) {
      //   while ($ch = $onTop->fetch_assoc()) {
      //     $discount = $ch['discount'];
      //   }
      // } else {
      //   $discount = 0;
      // }
    }

  }

?>
