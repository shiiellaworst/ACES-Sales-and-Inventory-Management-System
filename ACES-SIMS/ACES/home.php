<?php
session_start();
include("../dataCenter/connection.php");

//1
$query = "SELECT * FROM `aces_inventory` WHERE `status` = 'NEW' limit 4;"; 
$result1 = mysqli_query($conn, $query);
$row1 = $result1->fetch_assoc();

//2
$getquery = "SELECT * FROM `aces_inventory` WHERE `product_name` = 'BLACK PANTHER' GROUP BY `acro`;"; 
$result2 = mysqli_query($conn, $getquery);
$row2 = $result2->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACES</title>
    <link rel="stylesheet" href="../ACES/assets/css/style.css">
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>

    <!-- home starts here -->
    <section id="hero">
        <h4>Computer Studies Department</h4>
        <h2>Welcome, UCCians</h2>
        <h1>All products</h1>
        <p>for BSCS, BSIT, BSIS & BSEMC</p>
        <button onclick="window.location.href='product.php'">Shop Now</button>
    </section>

    <!-- features starts here -->
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/products/4t.png" alt="">
            <h6>BSIS</h6>
        </div>
        <div class="fe-box">
            <img src="img/products/2t.png" alt="">
            <h6>BSEMC</h6>
        </div>
        <div class="fe-box">
            <img src="img/products/t1.png" alt="">
            <h6>BSCS</h6>
        </div>
        <div class="fe-box">
            <img src="img/products/3t.png" alt="">
            <h6>BSIT</h6>
        </div>
    </section>

    <!-- products starts here -->
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Our T-shirts & Lanyard Is Full of Happiness</p>
        <div class="pro-container">
            <?php do { ?>
                <form class="pro" action="">
                    <img src="img/products/<?php echo $row2['img'];?>"  alt="">
                    <div class="des">
                        <span type="text"name="p_title"><?php echo $row2['product_name'] ?></span>
                        <h5><?php echo $row2['acro'];?> -  ₱<?php echo $row2['price'];?>.00</h5>
                    </div>
                <a href="erawr.php?id=<?php echo $row2['product_id'];?>"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </form>        
            <?php } while($row2 = $result2->fetch_assoc());?>
                
            </div>
    </section>

    <!-- banner starts here -->
    <section id="banner" class="section-m1">
        <h4>Attach your logo</h4>
        <h2>Flex your <span>creativity</span> and send your entry!</h2>
        <button onclick="window.location.href='checkEvent.php'"class="normal">Submit Entry</button>
    </section>

    <!-- products starts here -->
    <section id="product1" class="section-p1">
            <h2>New Designs</h2>
            <p>Our T-shirts & Lanyard Is Full of Happiness</p>
            <div class="pro-container">
            <?php do { ?>
                <form class="pro" action="">
                    <img src="img/products/<?php echo $row1['img'];?>"  alt="">
                    <div class="des">
                        <span type="text"name="p_title"><?php echo $row1['product_name'] ?></span>
                        <h5><?php echo $row1['acro'];?> -  ₱<?php echo $row1['price'];?>.00</h5>
                    </div>
                <a href="erawr.php?id=<?php echo $row1['product_id'];?>"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </form>        
            <?php } while($row1 = $result1->fetch_assoc());?>
                
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

    <script src = "assets/js/script.js"></script>
</body>

</html>