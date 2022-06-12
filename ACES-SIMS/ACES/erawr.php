<?php
session_start();
include("../dataCenter/connection.php");

$stud_id = $_SESSION['stud_id'];
if(isset($stud_id)){
if (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];

    header("location: product-.php");
}
} else {
    header("location: login.php");
}

?>