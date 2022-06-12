  
  <?php 
  
  session_start();
  include("../dataCenter/connection.php");
  

  $ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

  $querySTATUS = "SELECT * FROM `transaction` WHERE `STATUS` = 'CANCELED';";
  $resultSTATUS = mysqli_query($conn, $querySTATUS);
  $rowSTATUS = $resultSTATUS->fetch_assoc();
  



  if(isset($_POST['APPROVECLICK'])){
    $TRANSID = $_POST['APPROVECLICK'];

    $CheckQTY = "SELECT PRODUCT_ID, QTY FROM `transaction` WHERE `TRANSACTION_CODE` = '$TRANSID'";
    $resultCheckQTY = mysqli_query($conn, $CheckQTY);
    $rowCheckQTY = $resultCheckQTY->fetch_assoc();

    $PRODUCTCODE = $CheckQTY['PRODUCT_ID'];
    $PRODUCTQTY = $CheckQTY['PRODUCT_QTY'];

    $qtyCheck = "SELECT product_id, qty FROM `aces_inventory` WHERE product_id = '$PRODUCTCODE'";
    $resultqtyCheck = mysqli_query($conn, $qtyCheck);
    $rowqtyCheck = $resultqtyCheck->fetch_assoc();

    

    $approveupdate = "UPDATE `transaction` SET `STATUS`='TO-PICK-UP' WHERE `TRANSACTION_CODE` = '$TRANSID'";
    if(mysqli_query($conn, $approveupdate) > 0){

      $ADMIN = $_SESSION['ADMIN_NUM'];
      $select = " SELECT * FROM admin_info WHERE ADMIN_NUMBER = '$ADMIN';";
  
      $result = mysqli_query($conn, $select);  

      if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $ADMIN_NUM = $row['ADMIN_NUMBER'];
      $LAST = $row['LAST_NAME'];
      $FIRST = $row['FIRST_NAME'];
      $STUDENT_NUM = $row['ADMIN_NUMBER'];
      $ROLE = $row['ROLE'];
      $ACTIVITY = "APPROVED ORDER#$$TRANSID";
      date_default_timezone_set("Asia/Manila");
      $DATE = date('Y-m-d');
      $TIME = date('h:i:s');

      $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
      if(mysqli_query($conn, $query)){

        header("Location: transactions.php");
        die;
        } 
      }
    }
  }
  
  ?>



    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../ACESAdmin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Font Awoseme-->
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
    
    <title>Admin Dashboard Panel</title> 

<nav>
    <?php include('../ACESAdmin/sidebar.php');?>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>

          <div class="dash-content">
        <div class="overview">
                <div class="title">
                <i class="fas fa-exchange"></i>
                <span class="text"> Orders & Transactions &nbsp; </span>
                    <a class="act_btn" href="transactions.php" style="text-decoration: none; cursor:pointer; width: 60px; color: #FFF; text-align: center; background-color: #249E98; border: black; border-radius: 5px;">ALL</a></span>
                    <a class="act_btn" href="transactions-PENDING.php" style="text-decoration: none; cursor:pointer; width: 90px; color: #FFF; text-align: center; background-color: #249E98; border: black; border-radius: 5px;">PENDING</a>&nbsp; </span>
                    <a class="act_btn" href="transactions-TO-PICK-UP.php" style="text-decoration: none; cursor:pointer; width: 120px; color: #FFF; text-align: center; background-color: #249E98; border: black; border-radius: 5px;">TO-PICK-UP</a>&nbsp; </span>
                    <a class="act_btn" href="transactions-RECEIVED.php" style="text-decoration: none; cursor:pointer; width: 90px; color: #FFF; text-align: center; background-color: #249E98; border: black; border-radius: 5px;">RECEIVED</a>&nbsp; </span>
                    <a class="act_btn" href="transactions-CANCELED.php" style="text-decoration: none; cursor:pointer; width: 100px; color: #FFF; text-align: center; background-color: #249E98; border: black; border-radius: 5px;">CANCELED</a></span>
                </div>

            </div>
            <div class="card"><form method="POST">
              <div class="card-body">
                <div class="table-responsive mt-2">
                <table id="myTable" class="table table-striped mb-0">
                  <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                    <th style="width:100px">ORDER#</th>
                    <th style="width:150px">STUDENT ID</th>
                    <th style=" width:150px;">NO. OF ITEMS</th>
                    <th style=" width:150px;">STATUS</th>
                    <th style="width:60px">VIEW</th>
                    <th style="width:60px">APPROVE</th>

                  </thead>
                  <tbody >
                   <?php if(!$rowSTATUS) {

                   } else {
                     do { ?> 
                      <tr style="border-bottom:1px solid gray; text-align: center;">
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['TRANSACTION_ID']; ?></td>
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['STUDENT_NUMBER']; ?></td>
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['QTY']; ?></td>
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['STATUS']; ?></td>
                        <td style="padding-top: 2.2%;"><a href = "transactions-view.php?id=<?php echo $rowSTATUS['TRANSACTION_ID']; ?>&pc=<?php echo $rowSTATUS['PRODUCT_ID'];?>" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: YELLOW; border: black; border-radius: 5px; ">View</a></td> 
                        <td><button type="submit" name="APPROVECLICK" value = "<?php echo $rowSTATUS['TRANSACTION_CODE']; ?>" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: White; background-color: green; border: black; border-radius: 5px;">Approve</button></td> 

                      </tr>
                      <?php } while($rowSTATUS = $resultSTATUS->fetch_assoc()); }?>
                  </tbody>
                </table>
                






              </div>
            </div>
          </form></div>



        </section>


        
         
              </script>
              <script src="../ACESAdmin/assets/js/script.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
              <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
              <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

              <script> 
                $(document).ready(function() {
                  $('#myTable').DataTable();
                });

              </script>

