<?php 
session_start();
include("../dataCenter/connection.php");


if (isset($_GET['token'])) {
    $verify_token = $_GET['token'];

    $verify = mysqli_query($conn, "SELECT VERIFY_TOKEN, VERIFY_STATUS FROM users WHERE VERIFY_TOKEN = '$verify_token' LIMIT 1");

    $row = mysqli_fetch_array($verify);
    if ($row['VERIFY_STATUS'] == "1"){

        $_SESSION['TOKEN'] = $row['VERIFY_TOKEN'];
        header("Location: forgot.php?token=$verify_token");
        exit(0);


    } else {
        $_SESSION['mail'] = "Sorry email doesn't exist!";
        header("Location: login.php");
        exit(0);
    }

} 




?>