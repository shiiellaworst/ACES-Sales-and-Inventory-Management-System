<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

$query = "SELECT * FROM `audit_trail` ORDER BY 'DATE' DESC;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();
 
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
                <i class="fa-solid fa-sliders"></i>
                    <span class="text"> Audit Trail</span>
                </div>
            <div class="card">
              <div class="card-body">
                <div class="table-responsive mt-2">
                  <table id="myTable" class="table table-striped mb-0" >
                    <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                      <th style="width:100px">Admin ID</th>
                      <th style="width:150px">Name</th>
                      <th style="width:100px">Role</th>
                      <th style="width:300px">Activity</th>
                      <th style="width:100px">Time</th>
                      <th style="width:100px">Date</th>
                      </thead>
                    <tbody>

                      <?php if(!$row) { } else { do {?>
                      <tr style="border-bottom:1px solid gray;">
                        <td><?php echo $row['ADMIN_NUMBER'];?></td>
                        <td><?php echo $row['FIRST_NAME'];?></td>
                        <td><?php echo $row['ROLE'];?></td>
                        <td><?php echo $row['ACTIVITY'];?></td>
                        <td><?php echo $row['TIME'];?></td>
                        <td><?php echo $row['DATE'];?></td>
                        <!-- <a class="act_btn" style="text-decoration: none; cursor:pointer; width: 90px; color: black; background-color: yellow; border: black; border-radius: 5px;">VIEW</a> -->
                      </tr>
                      <?php }while($row = $result->fetch_assoc()); }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </section>

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




