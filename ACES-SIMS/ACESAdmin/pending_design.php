<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

$query = "SELECT * FROM `pending_info`;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();


if(isset($_POST['del'])){
  $query = "DELETE FROM `pending_info`;";
  if(mysqli_query($conn, $query)){

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
   $ACTIVITY = "DELETE ALL DATA IN PENDING DESIGN";
   date_default_timezone_set("Asia/Manila");
   $DATE = date('Y-m-d');
   $TIME = date('h:i:s');

   $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
   if(mysqli_query($conn, $query)){

    header("Location: pending_design.php");
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
        <form action="" method="post">
                <div class="title">

                <i class="fa-solid fa-shirt"></i>
                    <span class="text"> Pending Designs &nbsp; </span>
                    <a class="act_btn" id="delstaff" data-toggle="modal" data-target="#staffdel" style="text-decoration: none; cursor:pointer; width: 90px; color: black; text-align: center; background-color: red; border: black; border-radius: 5px;">Clear All</a>

                  </div>
                  </form>
                <div class="card">
              <div class="card-body">
                <div class="table-responsive mt-2">
                  <table id="myTable" class="table table-striped mb-0" >
                    <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                      <th style="width:100px">Entry #</th>
                      <th style="width:250px">Design Name</th>
                      <th style="width:150px">Design By</th>
                      <th style="width:150px">Course</th>
                      <th>View</th>
                      <th>Delete</th>
                      </thead>
                    <tbody>
                      <?php if(!$row) { ?>

                          <?php } else { do { ?>
                      <tr style="border-bottom:1px solid gray;">
                        <td><?php echo $row['PENDING_NUMBER'];?></td>
                        <td><?php echo $row['ITEM_NAME'];?></td>
                        <td><?php echo $row['NAME'];?></td>
                        <td><?php echo $row['COURSE'];?></td>
                        <td><a class="act_btn" style="text-decoration: none; cursor:pointer; width: 90px; color: black; background-color: yellow; border: black; border-radius: 5px;">VIEW</a></td>
                        <td><a class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: red; border: black; border-radius: 5px;"> DELETE</a></td>    
                      </tr>
                      <?php } while($row = $result->fetch_assoc()); }?>
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

<!-- Delete Modal -->
<div class="modal fade" id="staffdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action="">
        <div class="form-group">
            <label for="sd" class="col-form-label">Are you sure you want to CLEAR ALL?</label>
            
          </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="del" type="submit" class="btn btn-primary">Delete Staff</button>

        </form>
      </div>
    </div>
  </div>
</div>

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

