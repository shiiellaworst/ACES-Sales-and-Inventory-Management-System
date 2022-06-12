<?php
session_start();
include("../dataCenter/connection.php");

$get = $_SESSION['id'];
//1
$query = "SELECT *, COUNT(*) FROM `aces_inventory` WHERE `product_id` = '$get';"; 
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

if($row['acro'] == "BSCS"){
    $course_name = "Bachelor of Science in Computer Science";
} else if ($row['acro'] == "BSIT") {
    $course_name = "Bachelor of Science in Information Technology";
} else if ($row['acro'] == "BSIS") {
    $course_name = "Bachelor of Science in Information System";
} else {
    $course_name = "Bachelor of Science in Entertainment and Multimedia Computing";
}
//2
$pt = $row['product_name'];
$getquery = "SELECT * FROM `aces_inventory` WHERE `product_name` = 'BLACK PANTHER' GROUP BY `acro`;"; 
$result2 = mysqli_query($conn, $getquery);
$row2 = $result2->fetch_assoc();

//for counting size

    //Small
    $qsmall = "SELECT COUNT(*) FROM `aces_inventory` WHERE  `product_id` = '$get' && `size` = 'S';";
    $sResult = mysqli_query($conn, $qsmall);
    $sRow = $sResult->fetch_assoc();
    $sOutput = $sRow['COUNT(*)'];

    //Medium
    $qM = "SELECT COUNT(*) FROM `aces_inventory` WHERE  `product_id` = '$get' && `size` = 'M';";
    $mResult = mysqli_query($conn, $qM);
    $mRow = $mResult->fetch_assoc();
    $mOutput = $mRow['COUNT(*)'];

    //Large
    $qL = "SELECT COUNT(*) FROM `aces_inventory` WHERE  `product_id` = '$get' && `size` = 'L';";
    $lResult = mysqli_query($conn, $qL);
    $lRow = $lResult->fetch_assoc();
    $lOutput = $lRow['COUNT(*)'];


    //all stocks
    $output = $row['COUNT(*)'];

    //insert
    if(isset($_POST['set'])){

        $size = $_POST['sel'];

        $qs = "SELECT COUNT(*) FROM `aces_inventory` WHERE  `product_id` = '$get' && `size` = '$size';";
        $qsResult = mysqli_query($conn, $qs);
        $qsRow = $qsResult->fetch_assoc();
        $qs1 = $qsRow['COUNT(*)'];

            $transaction = rand();
            $snum = $_SESSION['stud_id'];
            $PROD_ID = $row['product_id'];
            $acro = $row['acro'];
            $pname = $row['product_name'];
            $img = $row['img'];
            $price = $row['price'];


                //save to database
			$query = "INSERT INTO `cart_info` (`cart_num`, `STUDENT_NUMBER`, `PRODUCT_ID`, `product_name`, `acro`, `size`, `img`, `price`) VALUES ('$transaction','$snum','$PROD_ID','$pname','$acro','$size','$img','$price');";
			if(mysqli_query($conn, $query)){
                header("Location: cart.php");
            die;
            } 
        }
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACES</title>
    <link rel="stylesheet" href="../ACES/assets/css/style.css">
    <link rel="stylesheet" href="../ACES/assets/css/sproduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
</head>
<style> 
.btn {
  border: none;
  outline: none;
  margin-top: 10px;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
    border: 1px solid #575756;
    color: black;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>
<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>

    <!-- view sproduct starts here -->
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
        <form method="POST">
        <img src="img/products/<?php echo $row['img'];?>" width="100%" id="MainImg" alt="">
        </div>
        <div class="single-pro-details">
            
            <h2><?php echo $row['product_name'];?></h2>
            <h6>Designed by <?php echo $row['product_designer'];?></h6>
            <h4><?php if(isset($course_name)){
                echo $course_name;
                }?></h4>
            <h4>₱<?php echo $row['price'];?>.00</h4>
            <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="sel" required >
                <?php if($sOutput > 0){
                    echo '<option name="s" value="S">Small</option>';
                } else {
                    echo '<option name="s" value="S" disabled>Small</option>';
                }
                if($mOutput > 0){
                echo '<option name="s" value="M">Medium</option>';}
                else {
                    echo '<option name="s" value="M" disabled>Medium</option>';
                }
                if ($lOutput > 0) {
                    echo '<option name="s" value="L">Large</option>';
                } else {
                    echo '<option name="s" value="L" disabled>Large</option>';
                }
                ?>
            </select>
            <!-- <?php if (isset($output)) {
                echo "Stock(s):  " .$output;    
            } else {
                    echo "Out of stock!"; 
                    }?> <br> <?php echo "S: " .$sOutput;   
                            echo " M: " .$mOutput; 
                            echo " L: " .$lOutput; 
                ?>
                <br><br>
                 <?php
                    if(isset($name_error)){
                            echo '<span class="error-msg">'.$name_error.'</span><br><br>';
                    };
                ?> -->
            <!-- <input name="qty" type="number" value="1" min="1" max="3"> --> 
            <button type= "submit" name="set" class="normal">Add To Cart</button>
            <br>
            <br>
            <h4>Product Details</h4>
            <span><?php echo $row['product_details'];?></span>

            </form>
        </div>
    </section>

        <!-- products starts here -->
        <section id="product1" class="section-p1">
            <h2>OTHER COURSES</h2>
            <p>Whats your course?</p>
            <div class="pro-container">
            <?php do { ?>
                <form class="pro" action="">
                    <img src="img/products/<?php echo $row2['img']; ?>" alt="">
                    <div class="des">
                        <span type="text"name="p_title"><?php echo $row2['product_name'] ?></span>
                        <h5><?php echo $row2['acro'];?> -  ₱<?php echo $row2['price'];?>.00</h5>
                    </div>
                <a href="erawr.php?id=<?php echo $row2['product_id'];?>"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </form>        
            <?php } while($row2 = $result2->fetch_assoc());?>
            </div>
        </section>

    <!-- news starts here -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up to buy</h4>
            <p>Make new design <span>special for your course!</span></p>
        </div>

    </section>
    
    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script>
    </script>

<script src = "assets/js/script.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>