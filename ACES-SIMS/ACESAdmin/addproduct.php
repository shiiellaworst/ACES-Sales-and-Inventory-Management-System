<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

if (isset($_GET['id'])) {
    $prod = $_GET['id'];

    $query = "SELECT * FROM `aces_inventory` WHERE product_id = '$prod' LIMIT 1 ;";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
}

$query2 = "SELECT * FROM `supplier_info`;";
$result2 = mysqli_query($conn, $query2);
$supplier = $result2->fetch_assoc();

if(isset($_POST['addStock'])){

    $ADDQTY =  $_POST['qty'];
    $ADDSUP =  $_POST['supplier'];

    
    $selQ = "SELECT * FROM `aces_inventory` WHERE `product_id` = '$prod' LIMIT 1;";
    $resultselQ = mysqli_query($conn, $selQ);
    $rowselQ = $resultselQ->fetch_assoc();

    $PRODUCTID = $rowselQ['product_id'];
    $Pname = $rowselQ['product_name'];
    $PDES = $rowselQ['product_details'];
    $PRODESIGN = $rowselQ['product_designer'];
    $PCATEGORY = $rowselQ['category'];
    $PCOURSE = $rowselQ['acro'];
    $PRICE = $rowselQ['price'];
    $PSIZE = $rowselQ['size'];
    $PIMG = $rowselQ['img'];


    date_default_timezone_set("Asia/Manila");
    $status = "NEW"; $date = date('Y-m-d'); $time =  date('h:i:s');
    for($i=0; $i < $ADDQTY; $i++){
      $query = "INSERT INTO `aces_inventory`(`product_id`, `product_name`, `product_details`, `product_designer`, `category`, `acro`, `price`, `size`, `img`, `qty`, `date_added`, `time_added`, `supplier`) VALUES ( '$PRODUCTID', '$Pname','$PDES','$PRODESIGN','$PCATEGORY','$PCOURSE','$PRICE','$PSIZE','$PIMG',1,'$date','$time', '$ADDSUP');";

            if(mysqli_query($conn, $query)){
                header("Location: products.php");
                } else {
                  mysqli_query($conn,$query) or die ('Error in updating product in Database '.$query);
                    die; echo "(mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT))";
                }
        
        }
    
} 

?>
  

  
  <!----======== CSS ======== -->
    <link rel="stylesheet" href="../ACESAdmin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Font Awoseme-->
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
    
    <title>Admin Dashboard Panel</title> 
    
<nav>
    <?php include('../ACESAdmin/sidebar.php');?>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>

<div class="dash-content">
            <div class="overview">
                    <div class="title">
                    <i class="fas fa-user"></i>
                        <span class="text"> Product#<?php echo $prod;?></span>
                    </div>

     <form class="form" method="POST">


                <center><div id="viewDisplay" class="card " style="width: 50%;">
                <?php do { ?>
                <div class="media">
                    <img class="mr-3" src="../ACES/img/products/<?php echo $row['img'];?>" width="40%"alt="">
                    <div class=" p-2 media-body">

                        <h5 class="mt-0"><?php echo $row['product_name'];?></h5>
                        <?php echo $row['product_details'];?>

                    </div>
                </div>
                            

            <div class="form-group row m-1 pt-2">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Designer</label>
                <div class="col-sm-9">
                <input type="email" class="form-control" id="colFormLabel" value="<?php echo $row['product_designer'];?>" readonly>
                </div>
            </div>

            <div class="form-group row m-1 pt-2">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Course</label>
                <div class="col-sm-9">
                <input type="email" class="form-control" id="colFormLabel" value="<?php echo $row['acro'];?>" readonly>
                </div>
            </div>

            <div class="form-group row m-1 pt-2">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                <input type="email" class="form-control" id="colFormLabel" value="<?php echo $row['price'];?>" readonly>
                </div>
            </div>

            <div class="form-group row m-1 pt-2">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Supplier</label>
                <div class="col-sm-9">
                <select  name="supplier" type="text" class="form-control" id="colFormLabel" value=""> 
                            
                            <?php do { ?>
                            <option value="<?php echo $supplier['supplier_name'];?>"><?php echo $supplier['supplier_name'];?></option>
                            <?php }while($supplier = $result2->fetch_assoc()); ?>
                        
                            </select>    
                </div>
            </div>

            <div class="form-group row m-1 pt-2">
                <label for="colFormLabel" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" name="qty" class="form-control" id="colFormLabel" value="" >  
                </div>
            </div>

    

            <div class="card-body">
                <button type="submit" name="addStock" class="card-header btn btn-block" style="text-decoration: none; font-weight: bold;" ><i class="fa-solid fa-pen-to-square"  ></i> ADD</button>
                <a href="products.php" class="card-header btn btn-block" style="text-decoration: none; font-weight: bold;"><i class="fa-solid fa-arrow-left"></i> BACK</a>
            </div>

            <?php }while($row = $result->fetch_assoc()); ?>
            </div></center>
        </form>

	</div>
</div>

                    
          </section>

         
              </script>
              <script src="../ACESAdmin/assets/js/script.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    

