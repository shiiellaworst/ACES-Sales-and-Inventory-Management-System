<?php 

session_start();
include("../dataCenter/connection.php");

$id = $_SESSION['stud_id'];
$all = "SELECT * FROM `users` WHERE `STUDENT_NUMBER` = '$id'";
$result = mysqli_query($conn, $all);
$row = $result->fetch_assoc();

if(isset($_POST['submit']))
{
    $student_id = $_SESSION['stud_id'];
    $Fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $add = $_POST['add'];
    $num = $_POST['num'];
    $em = $_POST['em'];
    $bday = $_POST['bd'];
    $password = $_POST['pword'];



    //save to database
	$query = "UPDATE `users` SET `FIRST_NAME`='$Fname',`LAST_NAME`='$lname',`ADDRESS`='$add',`BIRTHDAY`='$bday',`CONTACT`='$num',`EMAIL`='$em',`PASSWORD`='$pword' WHERE `STUDENT_NUMBER` = '$student_id'" ;
    
    if(mysqli_query($conn, $query)){

        header("Location: userprofile.php");
        
            die; 
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
    <link rel="stylesheet" href="../ACES/assets/css/event.css">

    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>

    <section id="event" class="section-p1">
        <div class="row">
        <form action="" method="POST" >
            <div class="column">
            <label for="">Email</label>
                <input class="event-int" type="email" id="fname" name="em" value="<?php echo $row['EMAIL'];?>" readonly>
                <label for="">Contact #</label>
                <input class="event-int" type="number" id="fname" name="num" >
                <label for="" value="<?php echo $row['ADDRESS'];?>">Address</label>
                <textarea id="subject" name="add" placeholder="Enter your address..." style="height:170px" ></textarea>
                <input class="event-int" type="submit" style="background-color: #3F72AF;" name="submit" value="Submit">
            </div>
            <div class="column">
                <label for="studnum">Student Number</label>
                <input readonly type="text" name="username" class="event-int" id="cb" value="<?php echo $row['STUDENT_NUMBER'];?>">
                <label for="">Password </label>
                <input class="event-int" type="password" id="fname" name="pword" value="<?php echo $row['PASSWORD'];?>"/>
                <label for="">First Name </label>
                <input class="event-int" type="text" id="fname" name="fname" value="<?php echo $row['FIRST_NAME'];?>">
                <label for="">Last Name </label>
                <input class="event-int" type="text" id="fname" name="lname" value="<?php echo $row['LAST_NAME'];?>">
                
            </div>
          </div>
          </form>
    </section>

    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script src = "assets/js/script.js"></script>
</body>

</html>