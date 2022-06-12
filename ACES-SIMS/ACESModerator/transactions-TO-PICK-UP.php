  
  <?php 
  
  session_start();
  include("../dataCenter/connection.php");
  

  $querySTATUS = "SELECT * FROM `transaction` WHERE `STATUS` = 'TO-PICK-UP';";
  $resultSTATUS = mysqli_query($conn, $querySTATUS);
  $rowSTATUS = $resultSTATUS->fetch_assoc();
  

  if(isset($_POST['CANCELCLICK'])){
    $TRANSID = $_POST['CANCELCLICK'];

    $cancelupdate = "UPDATE `transaction` SET `STATUS`='CANCELED' WHERE `TRANSACTION_CODE` = '$TRANSID'";

        if(mysqli_query($conn, $cancelupdate) > 0){

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
          $ACTIVITY = "CANCELED ORDER#$$TRANSID";
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

  if(isset($_POST['RECEIVECLICK'])){
    $TRANSID = $_POST['transaction_code'];
    $ADMIN = $_SESSION['admin_name'];
    $cash = $_POST['date'];

    $ADMIN = $_SESSION['ADMIN_NUM'];
    $select = " SELECT * FROM admin_info WHERE ADMIN_NUMBER = '$ADMIN';";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($result);

    $role = $role['ROLE'];

    $approveupdate = "UPDATE `transaction` SET `STATUS`='RECEIVED', `STAFF` = '$ADMIN', `ROLE` = '$role', `CASH` = '$cash' WHERE `TRANSACTION_CODE` = '$TRANSID'";
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
      $ACTIVITY = "DISTRIBUTE ORDER#$$TRANSID";
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
    <link rel="stylesheet" href="../Admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Font Awoseme-->
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
    
    <title>Admin Dashboard Panel</title> 

<nav>
<?php include('../ACESModerator/sidebar.php');?>
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
                    <th style="width:60px">RECEIVED</th>
                    <th style="width:60px">CANCEL</th>

                  </thead>
                  <tbody >
                   <?php if(!$rowSTATUS) {

                   } else {
                     do { ?> 
                      <tr style="border-bottom:1px solid gray; text-align: center;">
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['TRANSACTION_CODE']; ?></td>
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['STUDENT_NUMBER']; ?></td>
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['QTY']; ?></td>
                        <td style="padding-top: 2.2%;"><?php echo $rowSTATUS['STATUS']; ?></td>
                        <td style="padding-top: 2.2%;"><a href = "transactions-view.php?id=<?php echo $rowSTATUS['TRANSACTION_ID']; ?>&pc=<?php echo $rowSTATUS['PRODUCT_ID']; ?>" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: YELLOW; border: black; border-radius: 5px; ">View</a></td> 
                        <td><button type="button" id="delstaff" data-toggle="modal" data-target="#staffdel"  class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: White; background-color: green; border: black; border-radius: 5px;">Received</button></td> 
                        <td><button type="submit" name="CANCELCLICK" value = "<?php echo $rowSTATUS['TRANSACTION_CODE']; ?>" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: white; background-color: Red; border: black; border-radius: 5px;">Cancel</button></td> 

                      </tr>
                      <?php } while($rowSTATUS = $resultSTATUS->fetch_assoc()); }?>
                  </tbody>
                </table>
                

<!-- app Modal -->
<div class="modal fade" id="staffdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

        <div class="form-group">
            <label for="sd" class="col-form-label center">PROCESS ORDER</label>
            
            <input style="text-align: center; background: none; border:0;" type="text" class="form-control" name="transaction_code" id="stud" >
            <input style="text-align: center; background: none; border:0;" type="number" class="form-control" name="date" id="" placeholder="Enter cash">

          </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="RECEIVECLICK" type="submit" class="btn btn-primary">RECEIVED</button>

      </div>
    </div>
  </div>
</div>




              </div>
            </div>
          </form></div>



        </section>


        
         
              </script>
              <script src="../Admin/assets/js/script.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
              <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
              <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

              <script> 
                $(document).ready(function() {
                  $('#myTable').DataTable();
                });

              </script>

<script>
    $(document).on('click', '#delstaff', function(){

        $('#staffdel').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();

        $('#stud').val(data[0]);

        });
</script>