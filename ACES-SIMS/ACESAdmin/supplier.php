<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

$query = "SELECT *, row_number() over ( order by `supplier_id`) `row_num` FROM `supplier_info`;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();


if(isset($_POST['addsup'])){
  $supid = rand(100000,999999);
  $sn = $_POST['sn'];
  $ads = $_POST['ads'];
  $cons = $_POST['cons'];
  $query2 = "INSERT INTO `supplier_info`(`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES ('$supid','$sn','$ads','$cons')";
  if(mysqli_query($conn, $query2)){
      
    header("Location: supplier.php");
    die;
    } 
}


if(isset($_POST['del'])){
  $delc = $_POST['lname'];
  $del = "DELETE FROM `supplier_info` WHERE `supplier_id` = '$delc';";
  if(mysqli_query($conn, $del)){
      
      header("Location: supplier.php");
      die;
      } 
}

if(isset($_POST['update'])){
  $upc = $_POST['sup_id'];
  $upn = $_POST['sup_name'];
  $upad = $_POST['add'];
  $upcon = $_POST['con'];

  $up = "UPDATE `supplier_info` SET `supplier_name`='$upn',`supplier_address`='$upad',`supplier_contact`='$upcon' WHERE `supplier_id` = '$upc'";
  if(mysqli_query($conn, $up)){
      
      header("Location: supplier.php");
      die;
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
</head>
<body>
    
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
                <i class="fa-solid fa-building"></i>
                <span class="text"> Supplier&nbsp; </span>
                <button type="button" class="addMe" data-toggle="modal" data-target="#SupplierModal"
                style="text-decoration: none; border: none;"><i class="fa-solid fa-plus" style="background-color: #D1EEF1; color: black;"></i>
                </div>
            </div>
              
            <div class="card">
              <div class="card-body">
                <div class="table-responsive mt-2">
                  <table id="myTable" class="table table-striped mb-0" >
                    <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                      <th style="width:50px">#</th>
                      <th style="width:300px">Supplier Name</th>
                      <th style="width:250px">Address</th>
                      <th style="width:150px">Contact</th>
                      <th>Edit</th>
                      <th>Delete</th>

                      </thead>
                    <tbody>
                      <?php do { ?>
                      <tr style="border-bottom:1px solid gray;">
                        <td><?php echo $row['supplier_id'];?></td>
                        <td><?php echo $row['supplier_name'];?></td>
                        <td><?php echo $row['supplier_address'];?></td>
                        <td><?php echo $row['supplier_contact'];?></td>
                        <td><a id="upSup" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: YELLOW; border: black; border-radius: 5px;">EDIT</a></td> 
                        <td><a class="act_btn" id="delstaff" data-toggle="modal" data-target="#staffdel"  style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: red; border: black; border-radius: 5px;"> DELETE</a></td>    
                        
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
      });
    </script>

<!-- Modal -->
<div class="modal fade" id="SupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
        <div class="form-group">
            <label for="sd" class="col-form-label">Supplier Name:</label>
            <input type="text" class="form-control" name="sn" id="stud_num" value="">
          </div>
        <div class="form-group">
            <label for="lname" class="col-form-label">Address:</label>
            <textarea type="text" class="form-control" name="ads" id="lname" value=""></textarea>
          </div>
        <div class="form-group">
          <label for="fname" class="col-form-label">Contact:</label>
          <input type="text" class="form-control" name="cons" id="fname" value="">
        </div>    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbit" name="addsup" class="btn btn-primary">Add Supplier</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">  
        <input type="hidden" class="form-control" name="sup_id" id="sup_id" value="">

        <div class="form-group">

            <label for="sd" class="col-form-label">Supplier Name:</label>
            <input type="text" class="form-control" name="sup_name" id="sup_name" value="">
          </div>
        <div class="form-group">
            <label for="lname" class="col-form-label">Address:</label>
            <textarea type="text" class="form-control" name="add" id="add" value=""></textarea>
          </div>
        <div class="form-group">
          <label for="fname" class="col-form-label">Contact:</label>
          <input type="text" class="form-control" name="con" id="con" value="">
        </div>    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
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
            <label for="sd" class="col-form-label">Are you sure you want to delete?</label>
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
$('#SupplierModal').on('shown.bs.modal');


  $(document).on('click', '#upSup', function(){

        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();
        $('#sup_id').val(data[0]);
        $('#sup_name').val(data[1]);
        $('#add').val(data[2]);
        $('#con').val(data[3]);


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


