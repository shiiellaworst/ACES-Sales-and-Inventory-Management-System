<?php session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

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
        $EMAIL = $row['EMAIL'];
        $PASS = $row['PWDISPLAY'];

	  }

	  if(isset($_POST['submit'])){
		$admin = $_POST['submit'];

		$PNAME = $_POST['email'];
		$pass = $_POST['pass'];
		$pass2 = md5($pass);

		$queryupdate = "UPDATE `admin_info` SET `EMAIL`='$PNAME',`PASSWORD`='$pass2', `PWDISPLAY`='$pass' WHERE `ADMIN_NUMBER` = '$admin'";
		if(mysqli_query($conn, $queryupdate)){
			header("Location: profile.php");
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
                    <i class="fas fa-user"></i>
                        <span class="text"> Profile</span>
                    </div>

			<div class="card center m-5">
				<div class="card-header" style="background-color: #249E98;">
					<div class="heading-elements">
					</div>
				</div>
				<div class="card-content collpase show">
					<div class="card-body">

						<form class="form" method="POST">
							<div class="form-body">
								<h4 class="form-sectio  n"><i class="ft-eye"></i> About User#<?php echo $ADMIN_NUM; ?></h4>
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput1" class="">Student Number</label>
											<input type="text" id="userinput1" class="form-control" name="name" value="<?php echo $ADMIN_NUM; ?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput2" class="">Role</label>
											<input type="text" id="userinput2" class="form-control" name="" value="<?php echo $ROLE; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3" class="">First Name</label>
											<input type="text" id="userinput3" class="form-control" value="<?php echo $FIRST; ?>" name="username" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4" class="">Last Name</label>
											<input type="text" id="userinput4" class="form-control" value="<?php echo $LAST; ?>" name="nickname" readonly>
										</div>
									</div>
								</div>

								<h4 class="form-section"><i class="ft-mail"></i>Account</h4>

								<div class="form-group">
									<label for="userinput5" class="">Email</label>
									<input class="form-control" name = "email" type="email" value="<?php echo $EMAIL; ?>" id="userinput5">
								</div>

								<div class="form-group">
									<label for="userinput6" class="">Password</label>
									<input class="form-control" name="pass" type="password" value="<?php echo $PASS; ?>" id="userinput6">
								</div>


							</div>

							<div class="form-actions right">
								<button type="button" class="btn btn-outline-warning mr-1">
									<i class="ft-x"></i> Cancel
								</button>
								<button name= "submit" type="submit" value= "<?php echo $ADMIN_NUM; ?>" class="btn btn-outline-primary">
									<i class="ft-check"></i> Save
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>
                    
            </div>
        </div>
          </section>

         
              </script>
              <script src="../ACESAdmin/assets/js/script.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    
