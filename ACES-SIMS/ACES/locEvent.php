<?php
session_start();
include("../dataCenter/connection.php");

$user_id = $_SESSION['stud_id'];

$query = "SELECT * FROM `pending_info` WHERE `STUDENT_NUMBER` = '$user_id';"; 
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();

if($user_id == $row['STUDENT_NUMBER']){

    header("location: event-.php");
}
else {
  header("location: event.php");

}


?>