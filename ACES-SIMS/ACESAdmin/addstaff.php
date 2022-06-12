<?php
session_start();
include('../dataCenter/connection.php');

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

$query = "SELECT * FROM `student_info`;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
                <i class="fas fa-clipboard-user"></i>
                <span class="text"> Add Staffs</span>
  
                </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="table-responsive mt-2">
                  <table id="myTable" class="table table-striped mb-0" >
                    <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                      <th >Student #</th>
                      <th >Lastname</th>
                      <th >Firstname</th>
                      <th >Course</th>
                      <th>Year</th>
                      <th>Section</th>
                      <th>Email</th>
                      <th></th>
                      </thead>
                    <tbody>
                      <?php do { ?>
                      <tr style="border-bottom:1px solid gray;">
                        <td><?php echo $row['STUDENT_NUMBER'];?></td>
                        <td><?php echo $row['LAST_NAME'];?></td>
                        <td><?php echo $row['FIRST_NAME'];?></td>
                        <td><?php echo $row['COURSE'];?></td>
                        <td><?php echo $row['YEAR'];?></td>
                        <td><?php echo $row['SECTION'];?></td>
                        <td>EMAIL@gmail.com</td>
                        <td><a class="act_btn"  style="align-items: center; text-decoration: none; cursor:pointer; width: 90px; color: black; background-color: yellow; border: black; border-radius: 5px;">ADD STAFF</a></td>
                      </tr>
                      <?php } while($row = $result->fetch_assoc());?>
                    </tbody>
                  </table>
                </div>
                <!-- data-toggle="modal" data-target="#staffModal" -->
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
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="#">
        <div class="form-group">
            <label for="sd" class="col-form-label">Student Number:</label>
            <input type="text" class="form-control" name="stud_num" id="stud_num" value="" >
          </div>
        <div class="form-group">
            <label for="lname" class="col-form-label">Lastname:</label>
            <input type="text" class="form-control" name="lname" id="lname" value="" >
          </div>
        <div class="form-group">
          <label for="fname" class="col-form-label">Firstname:</label>
          <input type="text" class="form-control" name="fname" id="fname" value="" >
        </div>
        <div class="form-group">
          <label for="course" class="col-form-label">Course:</label>
          <input type="text" class="form-control" name="course" id="course" value="" >
        </div>        
        <div class="form-group">
          <label for="course" class="col-form-label">Year:</label>
          <input type="text" class="form-control" name="year" id="year" value="" >
        </div>        
        <div class="form-group">
          <label for="course" class="col-form-label">Section:</label>
          <input type="text" class="form-control" name="section" id="section" value="" >
        </div>
        <div class="form-group">
          <label for="email" class="col-form-label">Email:</label>
          <input type="text" class="form-control" name="email" id="email" value="" >
        </div>
        <div class="form-group">
          <label for="pword" class="col-form-label">Temporary Password:</label>
          <input type="text" class="form-control" name="password" id="password" value="" required>
        </div>
          <label for="" class="col-form-label">Role:</label>
          <select class="custom-select" name="role" aria-label="Default select">
            <option>ADMIN</option>
            <option>MODERATOR</option>
          </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Add Staff</button>
        
    
<?php
if (isset($_POST['submit'])) {
     if (isset($_POST['stud_num']) && isset($_POST['fname']) &&
         isset($_POST['lname']) && isset($_POST['course']) &&
         isset($_POST['year']) && isset($_POST['section']) &&
         isset($_POST['email']) && isset($_POST['password']) &&
         isset($_POST['role'])) {
        
        $student_number = $_POST['stud_num'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $section = $_POST['section'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        
        include('../ACESAdmin/dataCenter/connection.php');

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT student_number FROM admin_info WHERE student_number = ? LIMIT 1";
            $Insert = "INSERT INTO admin_info(admin_number, student_number, first_name, last_name, course, year, section, email, password, role) values(?, ?, ?, ?, ?, ?, ?,?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $stud_num);
            $stmt->execute();
            $stmt->bind_result($resultStud_num);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("issssissss" , $student_number, $student_number, $first_name, $last_name, $course, $year, $section, $email, $password, $role);
                if ($stmt->execute()) {
                    echo "<script>
                    if(confirm('Saved!')){document.location.href='addstaff.php'}
                    else{document.location.href='dashboard.php'}; 
                    </script>";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "<script>
                if(confirm('Someone already registers using this student number.')){document.location.href='addstaff.php'}; 
                </script>";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
     die();
    }
}

?>

        </form>
      </div>
    </div>
  </div>
</div>

<script>
// $('#staffModal').on('shown.bs.modal');

$(document).on("click",".act_btn",function () {


        $('#staffModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
        return $(this).text();
        }).get();


        $('#stud_num').val(data[0]);
        $('#lname').val(data[1]);
        $('#fname').val(data[2]);
        $('#course').val(data[3]);
        $('#year').val(data[4]);
        $('#section').val(data[5]);
        $('#email').val(data[6]);

    });

</script>
</body>
</html>


