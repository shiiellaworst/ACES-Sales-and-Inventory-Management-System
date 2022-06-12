<?php

include("../dataCenter/connection.php");
require('session.php');


if(isset($_POST['submit'])){

   $user_type = mysqli_real_escape_string($conn, $_POST['studnum']);
   $pass = $_POST['password'];
   $pass = md5($pass);

   $select = " SELECT * FROM admin_info WHERE ADMIN_NUMBER = '$user_type' && PASSWORD = '$pass' ";
   $select_student = " SELECT * FROM users WHERE STUDENT_NUMBER = '$user_type' && PASSWORD = '$pass' ";

   $result = mysqli_query($conn, $select);
   $result_student = mysqli_query($conn, $select_student);


   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $ROLE = $row['ROLE'];

      if($ROLE == "ADMIN"){
      
    $ROLE = "ADMIN";
      $ADMIN_NUM = $row['ADMIN_NUMBER'];
      $LAST = $row['LAST_NAME'];
      $FIRST = $row['FIRST_NAME'];
      $STUDENT_NUM = $row['ADMIN_NUMBER'];
      $ACTIVITY = "LOGGED IN";
      date_default_timezone_set("Asia/Manila");
      $DATE = date('Y-m-d');
      $TIME = date('h:i:s');
      $_SESSION['admin_name'] = $row['FIRST_NAME'];
      $_SESSION['ADMIN_NUM'] = $row['ADMIN_NUMBER'];
      $_SESSION['role'] = $row['ROLE'];


      $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
      if(mysqli_query($conn, $query)){

        header("location: ../ACESAdmin/index.php");
            die;
      } 
    } else if ($ROLE == "MODERATOR"){
        
        $ROLE = "MODERATOR";
        $ADMIN_NUM = $row['ADMIN_NUMBER'];
        $LAST = $row['LAST_NAME'];
        $FIRST = $row['FIRST_NAME'];
        $STUDENT_NUM = $row['ADMIN_NUMBER'];
        $ACTIVITY = "LOGGED IN";
        date_default_timezone_set("Asia/Manila");
        $DATE = date('Y-m-d');
        $TIME = date('h:i:s');
        $_SESSION['admin_name'] = $row['FIRST_NAME'];
        $_SESSION['ADMIN_NUM'] = $row['ADMIN_NUMBER'];
  
  
        $query = "INSERT INTO `audit_trail`(`ADMIN_NUMBER`, `STUDENT_NUMBER`, `LAST_NAME`, `FIRST_NAME`, `ROLE`, `ACTIVITY`, `DATE`, `TIME`) VALUES ('$ADMIN_NUM','$STUDENT_NUM','$LAST','$FIRST','$ROLE','$ACTIVITY','$DATE','$TIME')";
        if(mysqli_query($conn, $query)){
  
          header("location: ../ACESModerator/index.php");
              die;
        } 
    } else {
        $error[] = 'incorrect email or password!';
    }






     
   } elseif(mysqli_num_rows($result_student) > 0){
        $row = mysqli_fetch_array($result_student);
        $_SESSION['stud_fname'] = $row['FIRST_NAME'];
        $_SESSION['stud_mname'] = $row['MIDDLE_NAME'];
        $_SESSION['stud_lname'] = $row['LAST_NAME'];
        $_SESSION['stud_acro'] = $row['acro'];
        $_SESSION['stud_bday'] = $row['BIRTHDAY'];
        $_SESSION['stud_add'] = $row['ADDRESS'];
        $_SESSION['stud_contact'] = $row['CONTACT'];
        $_SESSION['stud_email'] = $row['EMAIL'];
        $_SESSION['stud_id'] = $row['STUDENT_NUMBER'];



        header("location: home.php");

   } else{
      $error[] = 'incorrect email or password!';
   }

};
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
                <h3>login now</h3>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    } else if (isset($_SESSION['mail'])){
                        echo '<span class="success-msg">'.$_SESSION['mail'];'</span>';
                    }
                ?>
                <input type="number"  name="studnum" required placeholder="Student Number">
                <input type="password" name="password" required placeholder="Password">
                <p style="text-align: center; margin-top: 0.1rem;"><a href="verify-email.php">Forgot passsword?</a></p>
                <input type="submit" name="submit" value="login now" class="form-btn">
                <p>don't have an account? <a href="register.php">register now</a></p>
            </form>
     
        </div>
    </section>

    
    

    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script src = "assets/js/script.js"></script>
</body>

</html>