
<?php
session_start();
include("../dataCenter/connection.php");

$query = "SELECT * FROM `student_info` LIMIT 3;";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

$query1 = "SELECT * FROM `aces_inventory` LIMIT 7;";
$result1 = mysqli_query($conn, $query1);
$row1 = $result1->fetch_assoc();

$query2 = "SELECT COUNT(*) FROM `student_info`;";
$result2 = mysqli_query($conn, $query2);
$row2 = $result2->fetch_assoc();

$query3 = "SELECT COUNT(*) FROM `users`;";
$result3 = mysqli_query($conn, $query3);
$row3 = $result3->fetch_assoc();

$query4 = "SELECT COUNT(*) FROM `aces_inventory`;";
$result4 = mysqli_query($conn, $query4);
$row4 = $result4->fetch_assoc();

$query5 = "SELECT COUNT(*) FROM `pending_info`;";
$result5 = mysqli_query($conn, $query5);
$row5 = $result5->fetch_assoc();

$query6 = "SELECT COUNT(*) FROM `admin_info`;";
$result6 = mysqli_query($conn, $query6);
$row6 = $result6->fetch_assoc();

$query7 = "SELECT * FROM `audit_trail` ORDER BY `DATE` DESC LIMIT 3 ;";
$result7 = mysqli_query($conn, $query7);
$row7 = $result7->fetch_assoc();
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
    
    <title>
    Admin Dashboard Panel</title> 

    <nav>
    <?php include('../ACESModerator/sidebar.php');?>
    </nav>


    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

        </div>
    <div class="dash-content">
    <div class="container">

        <div class="overview">
        <div class="row">
                
		<div class="col-md-8 col-sm-12">
            <div class="title">
                <i class="uil uil-estate "></i>
                    <span class="text"> Dashboard</span>
            </div>

			<div class="card-content">

                <div class="boxes">
                    <div class="box box1">
                        <i class="fas fa-users"></i>
                        <span class="text">Students</span>
                        <span class="number"><?php echo $row2['COUNT(*)']; ?></span>
                    </div>
                    <div class="box box1">
                        <i class="fas fa-user"></i>
                        <span class="text">Users</span>
                        <span class="number"><?php echo $row3['COUNT(*)']; ?></span>
                    </div>
                    <div class="box box1">
                        <i class="fas fa-clipboard-user"></i>
                        <span class="text">Staffs</span>
                        <span class="number"><?php echo $row6['COUNT(*)']; ?></span>
                    </div>
                    <div class="box box1">
                        <i class="fas fa-business-time"></i>
                        <span class="text">Inventory</span>
                        <span class="number"><?php echo $row4['COUNT(*)']; ?></span>
                    </div>
                    <div class="box box1">
                        <i class="fas fa-repeat"></i>
                        <span class="text">Pending</span>
                        <span class="number"><?php echo $row5['COUNT(*)']; ?></span>
                    </div>
                    <div class="box box1">
                        <i class="fa-solid fa-building"></i>
                        <span class="text">Transactions</span>
                        <span class="number">20,120</span>
                    </div>
                </div>

                <div class="card-body">
                <h4 class="card-title">Recent Activity</h4>
                    <div class="table-responsive mt-2">
                            <table class="table table-striped mb-0" >
                                <thead style="background-color: #249E98; color: #FFF; height: 50px; vertical-align: middle;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php do { ?>
                                        <tr>
                                            <td><?php echo $row7['FIRST_NAME']; ?></td>
                                            <td><?php echo $row7['ACTIVITY']; ?></td>
                                            <td><?php echo $row7['DATE']; ?></td>

                                        </tr>
                                        <?php } while($row7 = $result7->fetch_assoc());?>
                                </tbody>
                            </table>
                    </div>
                </div>
			</div>

		</div>

		<div class="col-md-4 col-sm-10">
            <br><br><br>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Recent Products</h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						</ul>
					</div>
				</div>
                
				<div class="card-content">
					<div class="card-body">
                        <div class="table-responsive mt-2">
                                <table class="table table-striped mb-0">
                                    <thead style="background-color: #249E98; color: #FFF; height: 50px; vertical-align: middle;">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php do { ?>
                                        <tr>
                                            <td><?php echo $row1['product_name'];?></td>
                                            <td><?php echo $row1['size'];?></td>
                                        </tr>
                                        <?php } while($row1 = $result1->fetch_assoc());?>
                                    </tbody>
                                </table>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
        </div>


    

    </section>

    <script src="../Admin/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

