<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Database.php");
include_once ($filepath."/../helpers/Format.php");
?>
<?php
/**
* Company
*/
class Company {

  private $db;
  private $fm;

  function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }


  public function empInsert($data) {
    $empName    = $_POST['empName'];
    $empContact = $_POST['empContact'];
    $empMail    = $_POST['empMail'];
    $empAddress = $_POST['empAddress'];
    $empNID     = $_POST['empNID'];
    $branchId   = $_POST['branchId'];
    $empId      = $_POST['empId'];
    $status     = $_POST['status'];

    $empName    = $this->fm->validation($empName);
    $empContact = $this->fm->validation($empContact);
    $empMail    = $this->fm->validation($empMail);
    $empAddress = $this->fm->validation($empAddress);
    $empNID     = $this->fm->validation($empNID);
    $branchId   = $this->fm->validation($branchId);
    $empId      = $this->fm->validation($empId);
    $status     = $this->fm->validation($status);

    $empName    = mysqli_real_escape_string($this->db->link, $empName);
    $empContact = mysqli_real_escape_string($this->db->link, $empContact);
    $empMail    = mysqli_real_escape_string($this->db->link, $empMail);
    $empAddress = mysqli_real_escape_string($this->db->link, $empAddress);
    $empNID     = mysqli_real_escape_string($this->db->link, $empNID);
    $branchId   = mysqli_real_escape_string($this->db->link, $branchId);
    $empId      = mysqli_real_escape_string($this->db->link, $empId);
    $status     = mysqli_real_escape_string($this->db->link, $status);

    if (empty($empName) || empty($empContact) || empty($empMail) || empty($empAddress) || empty($empNID) || empty($branchId) || empty($empId) || empty($status)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;

        $repquery = "SELECT * FROM tbl_employee WHERE branchId = '$branchId' ";
        $repchk = $this->db->select($repquery);
        if ($repchk != false) {
          $msg = "<span class='alert alert-danger'>You already have a manager for the branch!</span>";
          return $msg;
        }
    } else {
      $repquery = "SELECT * FROM tbl_employee WHERE empName = '$empName' OR empNID = '$empNID' OR empId = '$empId'";
      $repchk = $this->db->select($repquery);
      if ($repchk != false) {
        $msg = "<span class='alert alert-danger'>Employee Name or Identification already Exist!</span>";
        return $msg;
      } else {
        $query = "INSERT INTO tbl_employee(empName, empContact, empMail, empAddress, empNID, branchId, empId, position) VALUES('$empName', '$empContact', '$empMail', '$empAddress', '$empNID', '$branchId', '$empId', '$status')";
        $empinsert = $this->db->insert($query);
        if ($empinsert) {
          $msg = "<span class='alert alert-success'>Employee Information inserted successfully!</span>";
          return $msg;
        } else {
          $msg = "<span class='alert alert-danger'>Employee Information didn't insert!!</span>";
          return $msg;
        }
      }
    }
  }

  public function empUpdate($data, $id) {
    $empName    = $_POST['empName'];
    $empContact = $_POST['empContact'];
    $empMail    = $_POST['empMail'];
    $empAddress = $_POST['empAddress'];
    $empNID     = $_POST['empNID'];
    $branchId   = $_POST['branchId'];
    $empId      = $_POST['empId'];
    $status     = $_POST['status'];

    $empName    = $this->fm->validation($empName);
    $empContact = $this->fm->validation($empContact);
    $empMail    = $this->fm->validation($empMail);
    $empAddress = $this->fm->validation($empAddress);
    $empNID     = $this->fm->validation($empNID);
    $branchId   = $this->fm->validation($branchId);
    $empId      = $this->fm->validation($empId);
    $status     = $this->fm->validation($status);

    $empName    = mysqli_real_escape_string($this->db->link, $empName);
    $empContact = mysqli_real_escape_string($this->db->link, $empContact);
    $empMail    = mysqli_real_escape_string($this->db->link, $empMail);
    $empAddress = mysqli_real_escape_string($this->db->link, $empAddress);
    $empNID     = mysqli_real_escape_string($this->db->link, $empNID);
    $branchId   = mysqli_real_escape_string($this->db->link, $branchId);
    $empId      = mysqli_real_escape_string($this->db->link, $empId);
    $status     = mysqli_real_escape_string($this->db->link, $status);

    if (empty($empName) || empty($empContact) || empty($empMail) || empty($empAddress) || empty($empNID) || empty($branchId) || empty($empId) || empty($status)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    } else {
        $query = "UPDATE tbl_employee
                  SET
                  empName    = '$empName',
                  empContact = '$empContact',
                  empMail    = '$empMail',
                  empAddress = '$empAddress',
                  empNID     = '$empNID',
                  branchId   = '$branchId',
                  empId      = '$empId',
                  position   = '$status'
                  WHERE id = '$id'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
          $msg = "<span class='alert alert-success'>Employee Information updated successfully!</span>";
          return $msg;
        } else {
          $msg = "<span class='alert alert-danger'>Employee Information didn't update!!</span>";
          return $msg;
        }
      }
    }

    public function getAllemp() {
      $query = "SELECT e.*,b.branchName,s.status
                FROM tbl_employee AS e, tbl_branch AS b, tbl_stat AS s
                WHERE e.branchId = b.branchId AND e.position = s.statId
                ORDER BY id DESC";
      $result = $this->db->select($query);
      return $result;
    }

    public function getEmpById($id) {
      $query = "SELECT * FROM tbl_employee WHERE id = '$id'";
      $result = $this->db->select($query);
      return $result;
    }


    public function branchInsert($data){
      $branchName    = $_POST['branchName'];
      $branchAddress = $_POST['branchAddress'];
      $branchId      = $_POST['branchId'];

      $branchName    = $this->fm->validation($branchName);
      $branchAddress = $this->fm->validation($branchAddress);
      $branchId      = $this->fm->validation($branchId);

      $branchName    = mysqli_real_escape_string($this->db->link, $branchName);
      $branchAddress = mysqli_real_escape_string($this->db->link, $branchAddress);
      $branchId      = mysqli_real_escape_string($this->db->link, $branchId);

      if (empty($branchName) || empty($branchAddress) || empty($branchId)) {
        $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
        return $msg;
      }
      $repquery = "SELECT * FROM tbl_branch WHERE branchName = '$branchName' OR branchId = '$branchId' LIMIT 1";
      $repchk   = $this->db->select($repquery);
      if ($repchk != false) {
        $msg = "<span class='alert alert-danger'>Branch Name or ID already Exist!</span>";
        return $msg;
      } else {
        $query = "INSERT INTO tbl_branch(branchName, branchAddress, branchId) VALUES('$branchName', '$branchAddress', '$branchId')";
        $branchinsert = $this->db->insert($query);
        if ($branchinsert) {
          $msg = "<span class='alert alert-success'>Branch inserted successfully!</span>";
          return $msg;
        } else {
          $msg = "<span class='alert alert-danger'>Branch didn't insert!!</span>";
          return $msg;
        }
      }
    }

  public function getAllbranch() {
      $query = "SELECT * FROM tbl_branch ORDER BY id DESC";
      $result = $this->db->select($query);
      return $result;
  }

  public function getBranchById($id) {
    $query = "SELECT * FROM tbl_branch WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function branchUpdate($data, $id) {
    $branchName    = $_POST['branchName'];
    $branchAddress = $_POST['branchAddress'];
    $branchId      = $_POST['branchId'];

    $branchName    = $this->fm->validation($branchName);
    $branchAddress = $this->fm->validation($branchAddress);
    $branchId      = $this->fm->validation($branchId);

    $branchName    = mysqli_real_escape_string($this->db->link, $branchName);
    $branchAddress = mysqli_real_escape_string($this->db->link, $branchAddress);
    $branchId      = mysqli_real_escape_string($this->db->link, $branchId);

    if (empty($branchName) || empty($branchAddress) || empty($branchId)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    } else {
      $query = "UPDATE tbl_branch
                SET
                branchName    = '$branchName',
                branchAddress = '$branchAddress',
                branchId      ='$branchId'
                WHERE id ='$id'";
      $updated_row = $this->db->update($query);
      if ($updated_row) {
        $msg = "<span class='alert alert-success'>Branch Information updated successfully!</span>";
        return $msg;
      } else {
        $msg = "<span class='alert alert-danger'>Branch Information didn't update!!</span>";
        return $msg;
      }
    }
  }


  public function getAllStatus() {
    $query = "SELECT * FROM tbl_stat";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }


  public function getAllSale() {
    $query = "SELECT * FROM tbl_sales";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getSaleByComp() {
    $query = "SELECT * FROM tbl_sales WHERE rem <= 0";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getSaleByDue() {
    $query = "SELECT * FROM tbl_sales WHERE rem > 0";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getBuyHistory() {
    $query = "SELECT * FROM buy_history";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }
  public function getSalesCount() {
    $query = "SELECT COUNT(*) as count FROM tbl_sales";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }
  public function getSalesCountToday() {
    $tdate = date('Y-m-d');
    $query = "SELECT COUNT(*) as count FROM tbl_sales where date LIKE '$tdate%'";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }
  public function getOrderCount() {
    $query = "SELECT COUNT(*) as count FROM tbl_order";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getProductCount() {
    $query = "SELECT COUNT(*) as count FROM tbl_inventory WHERE amount < 10";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }


  public function getSaleByDueBranch() {
    $query = "SELECT `b`.`branchName`, b.branchId , b.branchAddress , s.rem , s.date  , s.totalPrice, c.customName , c.customContact
FROM tbl_sales as s, tbl_order as o, tbl_inventory as p , tbl_branch as b , tbl_customer AS c 
WHERE  s.id = o.sale 
AND o.inventId = p.inventId 
AND p.branchId = b.branchId
AND s.customer = c.cmId
AND rem > 0  ";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getSaleById($sale) {
    $query = "SELECT * FROM tbl_sales WHERE id = '$sale'";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }
  public function getSaleByDate($date1, $date2) {
    $query = "SELECT * FROM tbl_sales WHERE `date` BETWEEN CAST('$date1' AS DATE) AND CAST('$date2' AS DATE) ORDER BY `date` DESC";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getSalePerDay($date) {
    $query = "SELECT * FROM tbl_sales WHERE `date` like '$date%'";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function findProduct($dName){
    $dName = $this->fm->validation($dName);

    $dName = mysqli_real_escape_string($this->db->link, $dName);

    // $query = "SELECT p.*,c.*
    //           FROM tbl_sales AS p, tbl_customer AS c
    //           WHERE p.customer = c.cmId AND DATE(p.`date`) = '$dName' AND p.status = 1
    //           ORDER BY TIME(p.`date`) ASC";
    $query = "SELECT * from tbl_sales WHERE DATE(`date`) = '$dName'";
    $result = $this->db->select($query);
    if ($result) {
      $i = 0;
      $output = "
      <div class='panel-body'>
          <div class='table-responsive'>
              <table class='table table-hover' id='dataTables-example'>
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>Total Price</th>ss
                          <th>Customer</th>
                          <th>Phone Number</th>
                          <th>Time</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  ";
    while ($res = $result->fetch_assoc()) {
      $i++;
      $output .= "
                <tbody>
                  <tr>
                      <td>".$i."</td>
                      <td>".$res['totalPrice']."</td>
                      <td>".$res['customName']."</td>
                      <td>".$res['customContact']."</td>
                      <td>".TIME($res['date'])."</td>
                      <td><input type='hidden' id='sale_id' style='border: none;' value='".$res['id']."' readonly ></td>
                      <td>
                          <button type='button' id='sale_storm' class='btn btn-success btn-sm'><i class='fa fa-shopping-cart'> Add Cart</i></button>
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
    $output .= "
                  </table>
                </div>
              </div>
              ";
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

  }


  public function adminAdd($data) {
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    $empMail   = $_POST['empMail'];
    $empId     = $_POST['empId'];
    $status    = $_POST['status'];

    $adminUser = $this->fm->validation($adminUser);
    $adminPass = $this->fm->validation($adminPass);
    $empMail   = $this->fm->validation($empMail);
    $empId     = $this->fm->validation($empId);
    $status    = $this->fm->validation($status);

    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
    $empMail   = mysqli_real_escape_string($this->db->link, $empMail);
    $empId     = mysqli_real_escape_string($this->db->link, $empId);
    $status    = mysqli_real_escape_string($this->db->link, $status);

    if (empty($adminUser) || empty($adminPass) || empty($empMail) || empty($empId) || empty($status)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    } else {
      $repquery = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' OR adminMail = '$empMail'";
      $repchk = $this->db->select($repquery);
      if ($repchk != false) {
        $msg = "<span class='alert alert-danger'>Admin Name or Identification already Exist!</span>";
        return $msg;
      } else {
        $query = "INSERT INTO tbl_admin(adminUser, adminPass, adminMail, empId, status) VALUES('$adminUser', '$adminPass', '$empMail', '$empId', '$status')";
        $empinsert = $this->db->insert($query);
        if ($empinsert) {
          $msg = "<span class='alert alert-success'>Admin Information inserted successfully!</span>";
          return $msg;
        } else {
          $msg = "<span class='alert alert-danger'>Admin Information didn't insert!!</span>";
          return $msg;
        }
      }
    }
  }


  public function getAllAdmin() {
    $query = "SELECT * FROM tbl_admin";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function getAdminById($id) {
    $query = "SELECT * FROM tbl_admin WHERE adminId = '$id'";
    $getQuery = $this->db->select($query);
    return $getQuery;
  }

  public function adminUpdate($data, $id) {
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    $empMail   = $_POST['empMail'];
    $empId     = $_POST['empId'];
    $status    = $_POST['status'];

    $adminUser = $this->fm->validation($adminUser);
    $adminPass = $this->fm->validation($adminPass);
    $empMail   = $this->fm->validation($empMail);
    $empId     = $this->fm->validation($empId);
    $status    = $this->fm->validation($status);

    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
    $empMail   = mysqli_real_escape_string($this->db->link, $empMail);
    $empId     = mysqli_real_escape_string($this->db->link, $empId);
    $status    = mysqli_real_escape_string($this->db->link, $status);

    if (empty($adminUser) || empty($adminPass) || empty($empMail) || empty($empId) || empty($status)) {
      $msg = "<span class='alert alert-warning'>Field must not be empty!</span>";
      return $msg;
    } else {
        $query = "UPDATE tbl_admin
                  SET
                  adminUser = '$adminUser',
                  adminPass = '$adminPass',
                  adminMail = '$empMail',
                  empId     = '$empId',
                  position  = '$status'
                  WHERE adminId = '$id'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
          $msg = "<span class='alert alert-success'>Employee Information updated successfully!</span>";
          return $msg;
        } else {
          $msg = "<span class='alert alert-danger'>Employee Information didn't update!!</span>";
          return $msg;
        }
      }
    }

    public function checkBranchSession() {
      //$adminBranch = 0;
      $st = Session::get("adminStatus");
      if ($st > 1) {
        $emp = Session::get("employee");
        $query = "SELECT * FROM tbl_employee WHERE empId = '$emp'";
        $row = $this->db->select($query);
        if ($row != false) {
          $result = $row->fetch_assoc();
          $adminBranch = $result['branchId'];
          Session::set("adminBranch", $adminBranch);
        } else {
          $adminBranch = 0;
          Session::set("adminBranch", $adminBranch);
        }
      }
    }

}
