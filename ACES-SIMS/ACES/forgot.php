<?php

include("../dataCenter/connection.php");
require('session.php');

$token = $_GET['token'];

if(isset($_POST['submit'])){

   $pass = $_POST['password'];
   $cpass = $_POST['c-password'];

   if($pass==$cpass){

    $pass = md5($pass);

        $up_q = mysqli_query($conn, "UPDATE `users` SET `PASSWORD`='$pass' WHERE  `VERIFY_TOKEN` = '$token' LIMIT 1");

        header("Location: login.php");
        exit(0);

    } else {
        $error[] = 'PASSWORD MISMATCH!';
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
<style> 
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message li {
  list-style: none;
  padding: 2px 20px;
  padding-top: 2px;
  font-size: 16px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  left: -20px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  left: -20px;
  content: "✖";
}
</style>
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
                    } 
                ?>
                <input type="password" name="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="Password">
                <input type="password" name="c-password" required placeholder="Confirm Password">

                <div id="message" style="text-align: left;">
                  <h3>Password must contain the following:</h3>
                  <li id="letter" class="invalid">Password must have a <b>lowercase</b> letter</li>
                  <li id="capital" class="invalid">Password must have a <b>uppercase</b> letter</li>
                  <li id="number" class="invalid">Password must have a <b>number</b></li>
                  <li id="length" class="invalid">Password be atleast <b>8 characters</b></li>
                </div>

                <input type="submit" name="submit" value="Change Password" class="form-btn">
            </form>
     
        </div>
    </section>

    
    

    <!-- footer starts here -->
    <?php include('footer.php'); ?>


    <script>
      var myInput = document.getElementById("psw");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");

      // When the user clicks on the password field, show the message box
      myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password field, hide the message box
      myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
      }

      // When the user starts to type something inside the password field
      myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }
        
        // Validate length
        if(myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }
      </script>
    <script src = "assets/js/script.js"></script>
</body>

</html>