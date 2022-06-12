<?php 

session_start();
include("../dataCenter/connection.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACES</title>
    <link rel="stylesheet" href="../ACES/assets/css/style.css">
    <link rel="stylesheet" href="../ACES/assets/css/event.css">

    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>
     
    <!-- starts here -->
    <section id="page-header">
    <h4 style ="color: white">You have submit your entry</h4>
    <h4 style ="color: white">Please wait for the annoucement!</h4>
    </section>


    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script>
    
    
    function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
    }
    </script>
    <script src = "assets/js/script.js"></script>
</body>

</html>