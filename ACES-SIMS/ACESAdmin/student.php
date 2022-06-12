<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

if (isset($_GET['id'])) {
    $studnum = $_GET['id'];

    $query = "SELECT * FROM `users` WHERE STUDENT_NUMBER = '$studnum';";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
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
                    <i class="fas fa-user"></i>
                        <span class="text"> Users</span>
                    </div>

						<form class="form">
    
                                    <?php do { ?>
							<center><div id="viewDisplay" class="card " style="width: 40%;">
											<h5 class="card-header"><?php echo $row['FIRST_NAME']?>'s Details</h5>
												<div class="card-body">
													<h5 class="card-title"><?php echo $row['STUDENT_NUMBER']?></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">NAME  </span>
                                                        </div>
                                                        <input type="text" class="form-control" aria-label="Default" value="<?php echo $row['LAST_NAME']?>, <?php echo $row['FIRST_NAME']?> <?php echo $row['MIDDLE_NAME']?>" aria-describedby="inputGroup-sizing-default" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">COURSE    </span>
                                                        </div>
                                                        <input type="text" class="form-control" aria-label="Default" value="<?php echo $row['COURSE']?>" aria-describedby="inputGroup-sizing-default" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">ADDRESS    </span>
                                                        </div>
                                                        <textarea type ="text" class="form-control" aria-label="Default" value="" aria-describedby="inputGroup-sizing-default" readonly><?php echo $row['ADDRESS']?></textarea>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">EMAIL    </span>
                                                        </div>
                                                        <input type="text" class="form-control" aria-label="Default" value="<?php echo $row['EMAIL']?>" aria-describedby="inputGroup-sizing-default" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-default">CONTACT    </span>
                                                        </div>
                                                        <input type="text" class="form-control" aria-label="Default" value="<?php echo $row['CONTACT']?>" aria-describedby="inputGroup-sizing-default" readonly>
                                                    </div>
													

												</div>

												<div class="card-body">
                                                <a href="students.php" class="btn btn-block" style="text-decoration: none; font-weight: bold; "><i class="fa-solid fa-arrow-left"></i> BACK</a>
												</div>
									</div>
												</center>
                            <?php }while($row = $result->fetch_assoc()); ?>

						</form>

					</div>
					</div>

                    
          </section>

         
              </script>
              <script src="../ACESAdmin/assets/js/script.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    

