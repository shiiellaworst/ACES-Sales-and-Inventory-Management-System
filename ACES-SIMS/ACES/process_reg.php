<?php 
session_start();
include("../dataCenter/connection.php");


if (isset($_GET['token'])) {
    $verify_token = $_GET['token'];

    $verify = mysqli_query($conn, "SELECT VERIFY_TOKEN, VERIFY_STATUS FROM users WHERE VERIFY_TOKEN = '$verify_token' LIMIT 1");

    if (mysqli_num_rows($verify) > 0) {
        
        $row = mysqli_fetch_array($verify);
        if ($row['VERIFY_STATUS'] == "0"){

            $selected_token = $row['VERIFY_TOKEN'];
            $update_q = mysqli_query($conn, "UPDATE users SET VERIFY_STATUS ='1' WHERE VERIFY_TOKEN='$selected_token' LIMIT 1");

            $_SESSION['mail'] = "Email verification success!";
            header("Location: login.php");
            exit(0);


        } else {
            echo 'FAILED!';
        }
    }



} else {
    header("location: verify.php");
}




?>