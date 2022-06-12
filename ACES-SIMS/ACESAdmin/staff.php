<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

$query = "SELECT * FROM `admin_info`;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

if(isset($_POST['del'])){

  $delc = $_POST['lname'];
  $query = "SELECT * FROM `admin_info` WHERE `ADMIN_NUMBER` = '$delc'";
  $result2 = mysqli_query($conn, $query);
  $row2 = $result2->fetch_assoc();
  $N=$row2['FIRST_NAME'];

  $del = "DELETE FROM `admin_info` WHERE `ADMIN_NUMBER` = '$delc';";
  if(mysqli_query($conn, $del)){

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
        $ACTIVITY = "REMOVE STAFF $N;";
        date_default_timezone_set("Asia/Manila");
        $DATE = date('Y-m-d');
        $TIME = date('h:i:s');

        $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
        if(mysqli_query($conn, $query)){

          header("Location: staff.php");
          die;
          } 
        } 
      }
      
}

if(isset($_POST['up'])){
  $upc = $_POST['studnum'];
  $ns = $_POST['lname'];
  $role = $_POST['selc'];

  if($role == "Moderator"){
    $role = "MODERATOR";
  } else {
    $role = "ADMIN";
  }
  $up = "UPDATE `admin_info` SET `ROLE` = '$role' WHERE `STUDENT_NUMBER` = '$upc';";
  if(mysqli_query($conn, $up)){

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
        $ACTIVITY = "SET $ns TO $ROLE";
        date_default_timezone_set("Asia/Manila");
        $DATE = date('Y-m-d');
        $TIME = date('h:i:s');

        $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
        if(mysqli_query($conn, $query)){

          header("Location: staff.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>

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
                <i class="fas fa-clipboard-user"></i>
                <span class="text"> Staffs&nbsp; </span>
                <button type="button" class="addMe"  onclick="window.location.href='addstaff.php'"
                style="text-decoration: none; border: none;"><i class="fa-solid fa-plus" style="background-color: #D1EEF1; color: black;"></i>
									</button>
                    
                </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="table-responsive mt-2">
                  <table id="myTable" class="table table-striped mb-0" >
                    <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                      <th style="width:150px">Admin ID</th>
                      <th style="width:150px">Student ID</th>
                      <th style="width:200px">Name</th>
                      <th style="width:150px">Course</th>
                      <th style="width:150px">Role</th>
                      <th>View</th>
                      <th>Delete</th>
                      </thead>
                    <tbody>
                      <?php do { ?>
                      <tr style="border-bottom:1px solid gray;">
                        <td><?php echo $row['ADMIN_NUMBER'];?></td>
                        <td><?php echo $row['STUDENT_NUMBER'];?></td>
                        <td><?php echo $row['LAST_NAME'];?>, <?php echo $row['FIRST_NAME'];?></td>
                        <td><?php echo $row['COURSE'];?></td>
                        <td><?php echo $row['ROLE'];?></td>
                        <td><a class="act_btn" id="addstaff" data-toggle="modal" data-target="#staffModal" style="text-decoration: none; cursor:pointer; width: 90px; color: black; background-color: yellow; border: black; border-radius: 5px;">VIEW</a></td>
                        <td><a class="act_btn" id="delstaff" data-toggle="modal" data-target="#staffdel" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: red; border: black; border-radius: 5px;"> DELETE</a></td>    
                      </tr>
                      <?php } while($row = $result->fetch_assoc());?>
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
              } );
        </script>

<!-- Modal -->
<div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
        <div class="form-group">
            <label for="sd" class="col-form-label">Admin Number:</label>
            <input type="text" class="form-control" name="studnum" id="ad_num" value="" readonly>
          </div>
        <div class="form-group">
            <label for="sd" class="col-form-label">Student Number:</label>
            <input type="text" class="form-control" name="studnum" id="stud_num" value="" readonly>
          </div>
        <div class="form-group">
            <label for="lname" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="lname" id="lname" value="" readonly>
          </div>
        <div class="form-group">
          <label for="course" class="col-form-label">Course:</label>
          <input type="text" class="form-control" name="course" id="course" value="" readonly>
        </div>               
          <label for="" class="col-form-label">Role:</label>
          <select name="selc" class="custom-select" >
            <option id="mod" selected>Select Role</option>
            <option id="mod" value="Admin">ADMIN</option>
            <option id="mod" value="Moderator">MODERATOR</option>
          </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="up" class="btn btn-primary">Update Staff</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="staffdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action="">
        <div class="form-group">
            <label for="sd" class="col-form-label center">Are you sure you want to delete?</label>
            <label for="sd" class="col-form-label center">NAME: </label>
            <input style="text-align: center; background: none; border:0;" type="text" class="form-control" name="lname" id="stud" value="" readonly>
          </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="del" type="submit" class="btn btn-primary">Delete Staff</button>

        </form>
      </div>
    </div>
  </div>
</div>

<script>


  $(document).on('click', '#addstaff', function(){

        $('#staffModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();

        $('#ad_num').val(data[0]);
        $('#stud_num').val(data[1]);
        $('#lname').val(data[2]);
        $('#course').val(data[3]);
        $('#mod').val(data[4]);

    });

</script>

<script>
    $(document).on('click', '#delstaff', function(){

        $('#staffdel').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();

        $('#stud').val(data[1]);

        });
</script>


