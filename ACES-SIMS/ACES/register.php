
<?php
session_start();

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
    <h2>Welcome, UCCians $sid</h2>
    <h2>You have already register!</h2>
    <a href='http://localhost/ACES/process_reg.php?token=$verify_token'>CLICK HERE TO PROCEED LOGIN!</a>
    </form>
    <section>";

    $mail->Body = $email_template;

    $mail->send();
}


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $sid = $_POST['studnum'];
    $course = $_POST['course'];
    $password = $_POST['pword'];
    $cpassword = $_POST['c-pword'];


		if(!empty($sid) && !empty($password))
		{
      //email exist or not
      $email = $_POST['email'];

      $check_email = "SELECT `EMAIL` FROM `users` WHERE `EMAIL` = '$email' LIMIT 1";
      $check_email_Res = mysqli_query($conn, $check_email);

            if($password==$cpassword){
                
              $un_query = "SELECT * FROM `student_info` WHERE `STUDENT_NUMBER` = '$sid'";
              $result = mysqli_query($conn, $un_query);
              $row = $result->fetch_assoc();

                if (mysqli_num_rows($result) == 0){
                  $name_error = "Sorry... student number is doesn't exist"; 	
                }
                else {

                  if(mysqli_num_rows($check_email_Res) > 0) {
                    $name_error = "Email already exist";
        
                  } else {
                  
                  $fname = $row['FIRST_NAME'];
                  $mname = $row['MIDDLE_NAME'];
                  $lname = $row['LAST_NAME'];
                  $verify_token = md5(rand());
                  $password = md5($password);
                  
                    $sn_query = "SELECT * FROM `users` WHERE `STUDENT_NUMBER` = '$sid'";
                    $result_sn = mysqli_query($conn, $sn_query);

                    if (mysqli_num_rows($result_sn) > 0) {
                    $name_error = "Sorry... student number is already registered"; 	

                    } else {

                      sendemail_verify("$sid", "$email", "$verify_token");

                      if($course = "BS Computer Science"){
                        $acro = "BSCS";
                      }
                      else if($course = "BS Information Technology"){
                        $acro = "BSIT";
                      }
                      else if($course = "BS Information System"){
                        $acro = "BSIS";
                      } else {
                        $acro = "BSEMC";
                      }

                        //save to database
                      $query = "insert into `users` (`STUDENT_NUMBER`,`FIRST_NAME`,`MIDDLE_NAME`,`LAST_NAME`,`COURSE`,`ROLE`,`PASSWORD`, `EMAIL`, `VERIFY_TOKEN`) values ('$sid','$fname','$mname','$lname','$acro','User','$password','$email','$verify_token')";
                        if(mysqli_query($conn, $query)){

                          $_SESSION['mail'] = "Please check your mail to verify your email address";

                          header("Location: verify.php");
                              die;
                        } else {
                          $name_error = "REGISTRATION FAILED";
                        }          
                    }
              }
            } 
          } else {
        $name_error = "PASSWORD MISMATCH!";
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

    <section class="register">
        <div class="form-container">

            <form action="" method="post">
               <h3>register now</h3>
               <?php
                    if(isset($name_error)){
                            echo '<span class="error-msg">'.$name_error.'</span>';
                    };
                ?>
               <input type="number" name="studnum" required placeholder="Enter your Student Number">
               <label for="course">Course</label>
                <select id="" name="course" required>
                  <option value="BSCS">BS Computer Science</option>
                  <option value="BSIT">BS Information Technology</option>
                  <option value="BSIS">BS Information System</option>
                  <option value="BSEMC">BS Entertainment and Multimedia Computing </option>
                </select>
               <input type="email" name="email" required placeholder="Enter your Email">
               <input type="password" name="pword" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="Enter your Password">
               <input type="password" name="c-pword" required placeholder="Confirm your Password">

               <div id="message" style="text-align: left;">
                  <h3>Password must contain the following:</h3>
                  <li id="letter" class="invalid">Password must have a <b>lowercase</b> letter</li>
                  <li id="capital" class="invalid">Password must have a <b>uppercase</b> letter</li>
                  <li id="number" class="invalid">Password must have a <b>number</b></li>
                  <li id="length" class="invalid">Password be atleast <b>8 characters</b></li>
                </div>

               <input type="submit" name="submit" value="register now" class="form-btn">
               <p>already have an account? <a href="login.php">login now</a></p>

               
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