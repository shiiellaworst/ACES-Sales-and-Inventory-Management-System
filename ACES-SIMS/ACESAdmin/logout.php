<?php

include("../dataCenter/connection.php");

session_start();

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
   $ACTIVITY = "LOGGED OUT";
   date_default_timezone_set("Asia/Manila");
   $DATE = date('Y-m-d');
   $TIME = date('h:i:s');

   $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
   if(mysqli_query($conn, $query)){

    session_unset();
    session_destroy();

    header('location: /ACES/login.php');
         die;
   } 
}


?>