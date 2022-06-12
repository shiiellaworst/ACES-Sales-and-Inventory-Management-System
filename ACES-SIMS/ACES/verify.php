<?php

include("../dataCenter/connection.php");
require('session.php');

$error = $_SESSION['mail'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACES</title>
    <link rel="stylesheet" href="../ACES/assets/css/style.css">
    <link rel="stylesheet" href="../ACES/assets/css/login-reg.css">

    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    
</head>
 
<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>

    <section class="login">
        <div class="form-container">

                <form action="" method="post">
                <!-- <h3>Email Verification</h3> -->
                <?php
                    if(isset($error)){
                            echo '<h3 class="success-msg">'.$error.'</h3>';  
                    } else if (isset($_SESSION['mail'])) {
                        echo '<h3 class="success-msg">'.$error.'</h3>';  
                    }
                ?>
                <p>didn't receive?<a href="register.php"> Go Back MaMhie!</a> </p>
            </form>
     
        </div>
    </section>

    
    

    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script src = "assets/js/script.js"></script>
</body>

</html>