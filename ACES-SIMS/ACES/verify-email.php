<?php

include("../dataCenter/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendemail_verify($sid, $email, $verify_token)
{
  $mail = new PHPMailer(true);

  $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aces.sims.cod@gmail.com';                     //SMTP username
    $mail->Password   = 'ACESCOD12345';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('aces.sims.cod@gmail.com', 'Assiociation of Computer E-Students');
    $mail->addAddress($email);                            //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification From ACES!';
  
    $email_template = "
    <section id='hero'>
    <form method = 'GET'>
    <h4>Computer Studies Department</h4>
    <h2>Hello, UCCians $sid</h2>
    <h2>Changing password is granted!</h2>
    <a href='http://localhost/ACES/process_forgot.php?token=$verify_token'>CLICK HERE TO CHANGE PASSWORD!</a>
    </form>
    <section>";

    $mail->Body = $email_template;

    $mail->send();
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
        //email exist or not
        $check_email = "SELECT `STUDENT_NUMBER`, `EMAIL` ,`VERIFY_TOKEN`, `VERIFY_STATUS` FROM `users` WHERE `EMAIL` = '$email' LIMIT 1";
        $check_email_Res = mysqli_query($conn, $check_email);

        if(mysqli_num_rows($check_email_Res) > 0) {

            $row = mysqli_fetch_array($check_email_Res);
            if ($row['VERIFY_STATUS'] == "1"){

                $sid = $row['STUDENT_NUMBER'];
                $verify_token = $row['VERIFY_TOKEN'];

                sendemail_verify("$sid", "$email", "$verify_token");
                $_SESSION['mail'] = "Please check your mail to and click the link";

            } else {
                $_SESSION['mail'] = "Email doesn't exist!";
            }
        }

    }
}
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
                <h3>Forgot Password?</h3>
                <?php
                    if (isset($_SESSION['mail'])){
                        echo '<span class="success-msg">'.$_SESSION['mail'];'</span>';
                    }
                ?>
               <input type="email" name="email" required placeholder="Enter your Email">
                <input type="submit" name="submit" value="Verify" class="form-btn">
            </form>
     
        </div>
    </section>

    
    

    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script src = "assets/js/script.js"></script>
</body>

</html>