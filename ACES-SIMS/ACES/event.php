<?php 

session_start();
include("../dataCenter/connection.php");

$stud_id = $_SESSION['stud_id'];

error_reporting(0);
function random_num($length)
{
    $text = "";
    if($length <5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) { 
        
        $text .= rand(0,9);
    }

    return $text;
}

if(isset($_POST['submit']))
{
    $student_id = $_SESSION['stud_id'];
    $desname = $_POST['design_name'];
    $lname = $_SESSION['stud_lname'];
    $acro = $_SESSION['stud_acro'];
    $desname = $_POST['design_name'];
    $des = $_POST['des'];
    $filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "img/products/".$filename;

    //save to database
    $user_id = random_num(10);
	$query = "INSERT INTO `pending_info`(`PENDING_NUMBER`, `ITEM_NAME`, `NAME`, `COURSE`, `DESCRIPTION`, `filename`, `STUDENT_NUMBER`) VALUES ('$user_id','$desname','$lname','$acro','$des','$filename','$student_id');";
    
    if(mysqli_query($conn, $query)){
        if (move_uploaded_file($tempname, $folder)) {
		    }
        header("Location: event-.php");
        } else {
            die; echo "(mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT))";
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
     
    <!-- starts here -->
    <section id="page-header">
        <h2>#attachnow</h2>
        <p>To win your design</p>
    </section>

    <section id="event" class="section-p1">
        <h2>Attach your Design</h2>
        <p>Make you own special for your course</p>
        <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="column">
            <img id="frame" src="img/products/<?php $filename?>" style="width: 100%;"> 
            <input class="attachbtn" type="file" name="uploadfile" onchange="preview()" value="" id="fileUpload" accept="img/png, img/jpeg">

            </div>
            <div class="column">
                <label for="studnum">Student Number</label>
                <input readonly type="text" name="username" class="event-int" id="cb" value="<?php echo $stud_id;?>">
                <label for="design">Design Title</label>
                <input class="event-int" type="text" id="lname" name="design_name" placeholder="Design Name">
                <label for="description">Description</label>
                <textarea id="subject" name="des" placeholder="Write something.." style="height:170px"></textarea>
                <input class="event-int" type="submit" style="background-color: #3F72AF;" name="submit" value="Submit">
            </div>
          </div>
          </form>
    </section>

    <!-- footer starts here -->
    <?php include('footer.php'); ?>

    <script>
    
    
    function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
    }
    </script>
    <script src = "assets/js/script.js"></script>
</body>

</html>