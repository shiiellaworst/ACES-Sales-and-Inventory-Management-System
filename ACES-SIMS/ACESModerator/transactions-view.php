  
  <?php 
  
  session_start();
  include("../dataCenter/connection.php");
  
  $TRANSACTION_ID = $_GET['id'];
  $PRODUCT_ID = $_GET['pc'];
  $query = "SELECT * FROM `transaction` WHERE TRANSACTION_ID = '$TRANSACTION_ID' AND PRODUCT_ID = '$PRODUCT_ID';";
  $result = mysqli_query($conn, $query);
  $row = $result->fetch_assoc();

  // , SUM(TOTAL) AS SUBTOTAL 

  $sub = "SELECT SUM(TOTAL) AS SUBTOTAL FROM `transaction` WHERE TRANSACTION_ID = ' $TRANSACTION_ID' AND PRODUCT_ID = '$PRODUCT_ID';";
  $resultsub = mysqli_query($conn, $sub);
  $forSub = $resultsub->fetch_assoc();
  $SUBTOTAL = $forSub['SUBTOTAL'];
  
  date_default_timezone_set("Asia/Manila");
  $DATE = date('Y-m-d');
  $TIME = date('h:i:s');

  $user = $row['STUDENT_NUMBER'];

  $Userquery = "SELECT * FROM `users` WHERE STUDENT_NUMBER = ' $user';";
  $resultUser = mysqli_query($conn, $Userquery);
  $user = $resultUser->fetch_assoc();
  
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

        <div class="dash-content" style="padding-top: -2px;">
        <div class="overview">
                <div class="title">
                <i class="fas fa-exchange"></i>
                    <span class="text"> Orders & Transactions</span>
                </div>

            </div>
            <div class="container-fluid">            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                  ACES SALES AND INVENTORY MANAGEMENT SYSTEM
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Date Ordered: <?php echo $row['DATE'];?>                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"> <?php do { ?>
                  <h6 class="font-weight-bold">
                  Customer: <?php echo $user['LAST_NAME']; ?>, <?php echo $user['FIRST_NAME']; ?>                  </h6>
                  <h6>
                    Address: <?php echo $user['ADDRESS']; ?>                  </h6>
                  <h6>
                    Phone: <?php echo $user['CONTACT']; ?>                  </h6>
                  <?php } while($user = $resultUser->fetch_assoc());?>
                  </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction #<?php echo $TRANSACTION_ID;?>                  </h6>
                  <h6 class="font-weight-bold">
                                      </h6>
                  <h6>
                    Date of Pick-Up: <?php echo $row['DATEOF'];?>                  </h6>
                    <h6>
                    Given By: <?php echo $_SESSION['admin_name'];?>                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody> <?php do { ?>
    <tr><td><?php echo $row['PRODUCT_NAME']; ?></td><td><?php echo $row['QTY']; ?></td><td><?php echo $row['PRICE']; ?></td><td><?php echo $row['TOTAL']; ?></td></tr><?php } while($row = $result->fetch_assoc());?></tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    <!-- Cash Amount: ₱ 745.00                  </h4> -->
                  <table width="100%">
                    <tbody><tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="text-right">₱<?php echo $SUBTOTAL; ?>.00</td>
                    </tr>
                    <!-- <tr>
                      <td class="font-weight-bold">Reservation Fee</td>
                      <td class="text-right">₱ 397.82</td>
                    </tr> -->
                    <!-- <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">₱ 3,713.00</td>
                    </tr> -->
                  </tbody></table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>



        </div>
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
