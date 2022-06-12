<?php
session_start();
include("../dataCenter/connection.php");

$stud_id = $_SESSION['stud_id'];

if(isset($stud_id)){
    header("location: cart.php");
} else {
    header("location: login.php");
}

?>