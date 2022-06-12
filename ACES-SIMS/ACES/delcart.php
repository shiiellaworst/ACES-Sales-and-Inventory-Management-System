<?php
session_start();
include("../dataCenter/connection.php");

if (isset($_GET['id'])) {
    $SESSION_['cart'] = $_GET['id'];
 
            header("Location: cart.php");

}

?>