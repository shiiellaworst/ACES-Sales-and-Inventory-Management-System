<?php
session_start();
include("../dataCenter/connection.php");

$id = $_SESSION['stud_id'];
$query = "SELECT * FROM `users` WHERE `STUDENT_NUMBER` = '$id';"; 
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();


if($_SESSION['stud_acro'] == "BSCS"){
    $course = "BS Computer Science";
} elseif($_SESSION['stud_acro'] == "BSIT"){
    $course = "BS Information Technology";
} elseif($_SESSION['stud_acro'] == "BSIS"){
    $course = "BS Information System";
} else {
    $course = "BS Entertainment and Multimedia Computing";
}



if($_SESSION['stud_bday'] = ""){
    $bday = "0000-00-00";
} else {
    $bday = $_SESSION['stud_bday'];
}
if (!$_SESSION['stud_add'] = ""){
    $add = "---";
}  else {
    $add = $_SESSION['stud_add'];
}
if(!$_SESSION['stud_email'] = ""){
    $email = "---";
} else {
    $add = $_SESSION['stud_email'];
}

if(!$_SESSION['stud_contact']= ""){
    $contact = "---";
} else {
    $contact = $_SESSION['stud_contact'];
}

//pending

$pending = "SELECT *, PRICE * QTY AS TOTAL FROM `transaction` WHERE STUDENT_NUMBER = '$id' and STATUS = 'PENDING';"; 
$result_pending = mysqli_query($conn, $pending);
$pending = $result_pending->fetch_assoc();

//PICK UP

$pickup = "SELECT *, PRICE * QTY AS TOTAL FROM `transaction` WHERE STUDENT_NUMBER = '$id' and STATUS = 'TO-PICK-UP';"; 
$result_pickup = mysqli_query($conn, $pickup);
$topickup = $result_pickup->fetch_assoc();

//receive

$receive = "SELECT *, PRICE * QTY AS TOTAL FROM `transaction` WHERE STUDENT_NUMBER = '$id' and STATUS = 'RECEIVED';"; 
$result_receive = mysqli_query($conn, $receive);
$rev = $result_receive->fetch_assoc();

//view

// if(isset($_POST['view'])){
// $VIEW = $_POST['view'];
// $viewimg = "SELECT IMG FROM `transaction` WHERE PRODUCT_ID = '$VIEW' GROUP BY IMG LIMIT 1"; 
// $result_viewimg = mysqli_query($conn, $viewimg);
// $img = $result_viewimg->fetch_assoc();


// }
// //cancel
// if(isset($_POST['cancel'])) {
//     $CANCEL_ID = $_POST['cancel'];
// $CANCEL = "UPDATE `transaction` SET STATUS = 'CANCEL' ;"; 

// if(mysqli_query($conn, $CANCEL)){
        
//     header("Location: profile.php");
//     die;
//     }
// }




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACES</title>
    <link rel="stylesheet" href="../ACES/assets/css/style.css">
    <link rel="stylesheet" href="../ACES/assets/css/userprofile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>

    <style>
    @media (max-width:799px) {
        .col1, .col2 {
        width: 100%;
        }
        .tab-profile{
        overflow-x: auto;
        }
    }
    
    </style>
        <section id="user-details" class="section-p1">
            <div class="row">
                <div class="col1">
                    <div class="details">
                        <!-- <span><li><a style="color: #112D4E;" href="editProfile.php"><i class="fa-solid fa-pen-to-square"> Edit Profile</i></a></li></span> -->
                        <h3><?php echo $_SESSION['stud_id'];?></h3>
                        <h2><?php echo $row['FIRST_NAME'];?> <?php echo $row['LAST_NAME'];?></h2>
                        <h3><?php echo $course?></h3>
                    <div>
                            <li>
                                <i class="fa-solid fa-cake"></i>
                                <p><?php echo $row['BIRTHDAY'];?></p>
                            </li>
                            <li>
                                <i class="fa-solid fa-map-location-dot"></i>
                                <p><?php echo $row['ADDRESS'];?></p>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <p><?php echo $row['EMAIL'];?></p>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <p><?php echo $row['CONTACT'];?></p>
                            </li>

                            <li><a style="color:red;" href="logout.php"><i class="fa-solid fa-right-from-bracket"> Logout</i></a></li>
                    </div>
                    </div>
                </div>

                <div class="col2" >
                    <div class="tab-user">
                        <ul>
                            <li id="tab-li" class="active" onclick="tabs(0)">Pending</li>
                            <li id="tab-li" onclick="tabs(1)">To Pick-Up</li>
                            <li id="tab-li" onclick="tabs(2)">Received</li>
                        </ul>
                    </div>
                    <div class="tab-profile">

                    <div class="in-profile">
                    <div align="left">
                                        <ul class="d-flex" style="list-style: none;">
                                            <li class="item_name font-weight-bold " style=" margin-left: 2px; flex-basis: 40%;">Product Name</li>
                                            <li class="number_input font-weight-bold" style="flex-basis: 18%;" >Quantity</li>
                                            <li class="number_input font-weight-bold" style="flex-basis: 15%;" >Size</li>
                                            <li class="item_price font-weight-bold pl-2" style="flex-basis: 15%;">Price</li>
                                            <li class="item_bill font-weight-bold" style="flex-basis: 15%;">Total</li>
                                            
                                        </ul>
                                    </div>

                                    <div id="shopping_cart_wrapper" align="left"> <form method="POST">
                                        <?php if(!$pending) { ?> <li align="center" style="list-style: none;">NO PENDING ITEMS</li>
                                            <?php } else { do { ?>
                                        <ul class="" style="list-style: none;" id="shopping_cart">
                                            <li class="item_name font-weight-bold  d-flex" style="border-top: 1px solid #e3eaef!important; padding: 10px;">
                                                <h5 class="item_name m-0" style="font-size: 1rem; margin-left: 2px; flex-basis: 40%;"><?php echo $pending['PRODUCT_NAME'];?></h5>                            
                                                <div class="item_price text-center " style="flex-basis: 9%;"><?php echo $pending['QTY'];?></div>
                                                <div class="item_price text-center " style="flex-basis: 17%;"><?php echo $pending['SIZE'];?></div>
                                                <div class="item_price text-center " style="flex-basis: 17%;"><?php echo $pending['PRICE'];?></div>
                                                <div class="item_bill text-center " data-id="102" style="flex-basis: 14%;"><?php echo $pending['TOTAL'];?></div>
                                                
                                            </li>
                                        </ul>
                                        <?php } while ($pending = $result_pending->fetch_assoc());  }?>
                                    </form> </div>
                                </div>
                                

                    <div class="in-profile">
                    <div align="left">
                                        <ul class="d-flex" style="list-style: none;">
                                            <li class="item_name font-weight-bold " style=" margin-left: 2px; flex-basis: 40%;">Product Name</li>
                                            <li class="number_input font-weight-bold" style="flex-basis: 18%;" >Quantity</li>
                                            <li class="number_input font-weight-bold" style="flex-basis: 15%;" >Size</li>
                                            <li class="item_price font-weight-bold pl-2" style="flex-basis: 15%;">Price</li>
                                            <li class="item_bill font-weight-bold" style="flex-basis: 15%;">Total</li>
                                            <!-- <li class="remove_button font-weight-bold" style="flex-basis: 10%;">View</li> -->
                                        </ul>
                                    </div>

                                    <div id="shopping_cart_wrapper" align="left"> <form method="POST">
                                        <?php if(!$topickup) { ?> <li align="center" style="list-style: none;">NO ITEMS TO PICK UP</li>
                                            <?php } else { do { ?>
                                        <ul class="" style="list-style: none;" id="shopping_cart">
                                            <li class="item_name font-weight-bold  d-flex" style="border-top: 1px solid #e3eaef!important; padding: 10px;">
                                                <h5 class="item_name m-0" style="font-size: 1rem; margin-left: 2px; flex-basis: 40%;"><?php echo $topickup['PRODUCT_NAME'];?></h5>                            
                                                <div class="item_price text-center " style="flex-basis: 9%;"><?php echo $topickup['QTY'];?></div>
                                                <div class="item_price text-center " style="flex-basis: 17%;"><?php echo $topickup['SIZE'];?></div>
                                                <div class="item_price text-center " style="flex-basis: 17%;"><?php echo $topickup['PRICE'];?></div>
                                                <div class="item_bill text-center " data-id="102" style="flex-basis: 14%;"><?php echo $topickup['TOTAL'];?></div>
                                                <!-- <button type="button" data-toggle="modal" data-target="#viewModalCenter"  class="btn remove_cart" data-id="102" title="View" name = "view" value="<?php echo $topickup['PRODUCT_ID'];?>" style="flex-basis: 10%;"><i class="fas fa-shirt "></i></button> -->
                                                
                                            </li>
                                        </ul>
                                        <?php } while ($topickup = $result_pickup->fetch_assoc());  }?>

                               <!-- Button view modal

                                <div class="modal fade" id="viewModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div align="center" class="modal-body">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="img/products/<?php echo $img['IMG'];?>" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"> <form method="POST">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                        <button type="submit" id ="purchase" name="view" value="" class="btn btn-primary">YES</button>
                                    </div></form>
                                    </div>
                                </div>
                                </div> -->
                                    </form> </div>

                                    
                    </div>

                    <div class="in-profile">
                    <div align="left">
                                        <ul class="d-flex" style="list-style: none;">
                                            <li class="item_name font-weight-bold " style=" margin-left: 2px; flex-basis: 40%;">Product Name</li>
                                            <li class="number_input font-weight-bold" style="flex-basis: 18%;" >Quantity</li>
                                            <li class="number_input font-weight-bold" style="flex-basis: 15%;" >Size</li>
                                            <li class="item_price font-weight-bold pl-2" style="flex-basis: 15%;">Price</li>
                                            <li class="item_bill font-weight-bold" style="flex-basis: 15%;">Total</li>
                                            <li class="remove_button font-weight-bold" style="flex-basis: 10%;">Receipt</li>
                                        </ul>
                                    </div>

                                    <div id="shopping_cart_wrapper" align="left"> <form method="POST">
                                        <?php if(!$rev) { ?> <li align="center" style="list-style: none;">NO RECEIVED YET</li>
                                            <?php } else { do { ?>
                                        <ul class="" style="list-style: none;" id="shopping_cart">
                                            <li class="item_name font-weight-bold  d-flex" style="border-top: 1px solid #e3eaef!important; padding: 10px;">
                                                <h5 class="item_name m-0" style="font-size: 1rem; margin-left: 2px; flex-basis: 40%;"><?php echo $rev['PRODUCT_NAME'];?></h5>                            
                                                <div class="item_price text-center " style="flex-basis: 9%;"><?php echo $rev['QTY'];?></div>
                                                <div class="item_price text-center " style="flex-basis: 17%;"><?php echo $rev['SIZE'];?></div>
                                                <div class="item_price text-center " style="flex-basis: 17%;"><?php echo $rev['PRICE'];?></div>
                                                <div class="item_bill text-center " data-id="102" style="flex-basis: 14%;"><?php echo $rev['TOTAL'];?></div>
                                                <button class="btn remove_cart" data-id="102" title="Receipt" style="flex-basis: 10%;"><i class="fa-solid fa-receipt"></i></button>
                                                
                                            </li>
                                        </ul>
                                        <?php } while ($rev = $result_receive->fetch_assoc());}?>
                                    </form> </div>
                                </div>
                    </div>
                
                    </div>
                </div>
                
            </section>
                    
                

            </div>
        </section>

    
    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script>
        const tabBtn = document.getElementById('.tab-user ul .tab-li');

        if (tabBtn) {
            tabBtn.addEventListener('click', () => {
            tabBtn.classList.add('active').siblings().removeClass('active');
        });
    }

        const tab = document.querySelectorAll('.in-profile');

        function tabs(panelIndex) {
            tab.forEach(function(node) {
                node.style.display = 'none';
            });
            tab[panelIndex].style.display = 'block';
        }
        tabs(0);
    </script>


<script src = "assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>