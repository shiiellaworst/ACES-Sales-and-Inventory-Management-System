<?php
session_start();
include("../dataCenter/connection.php");

$ROLECHECK = $_SESSION['role'];
if($ROLECHECK == "MODERATOR"){
    include('../Moderator/index.php');
}

if (isset($_GET['id'])) {
    $prod = $_GET['id'];

    $query = "SELECT * FROM `aces_inventory` WHERE product_id = '$prod' LIMIT 1;";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
}

$query2 = "SELECT * FROM `supplier_info`;";
$result2 = mysqli_query($conn, $query2);
$supplier = $result2->fetch_assoc();

if(isset($_POST['up'])){

    $PNAME = $_POST['title'];
    $PDES = $_POST['des'];
    $PDESIGNER = $_POST['designer'];
    $PPRICE = $_POST['price'];
    $PCATEGORY= $_POST['category'];
    $PSUPPLIER = $_POST['supplier'];
    $PSTATUS = $_POST['status'];

    $queryupdate = "UPDATE `aces_inventory` SET `product_name`='$PNAME',`product_details`='$PDES',`product_designer`='$PDESIGNER',`category`='$PCATEGORY',`price`='$PPRICE',`status`='$PSTATUS',`supplier`='$PSUPPLIER' WHERE `product_id` = '$prod'";
    if(mysqli_query($conn, $queryupdate)){
        header("Location: product.php?id=$prod");
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

                                <label for="colFormLabel" class=" col-form-label">Course</label>
                                <div class="">
                                <input name="title" type="text" class="form-control" id="colFormLabel" value="<?php echo $row['product_name'];?>" >

                                <label for="colFormLabel" class=" col-form-label">Description</label>
                                <textarea name="des" type="text" class="form-control" id="colFormLabel" style="height: 110px;" > <?php echo $row['product_details'];?> </textarea>

                                </div>
                            </div>

                            

                        </div>
                                                
                        <form>
                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Designer</label>
                                <div class="col-sm-9">
                                <input name ="designer" type="text" class="form-control" id="colFormLabel" value="<?php echo $row['product_designer'];?>" >
                                </div>
                            </div>

                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Course</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="colFormLabel" value="<?php echo $row['acro'];?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                <select name="category" type="text" class="form-control" id="colFormLabel"> 

                                <option value="T-shirt">T-shirt</option>
                                <option value="Lanyard">Lanyard</option>
                            
                                </select>
                                </div>
                            </div>

                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                <input name="price" type="text" class="form-control" id="colFormLabel" value="<?php echo $row['price'];?>" >
                                </div>
                            </div>

                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Supplier</label>
                                <div class="col-sm-9">
                                <select  name="supplier" type="text" class="form-control" id="colFormLabel" value="<?php echo $row['price'];?>"> 
                            
                                <?php do { ?>
                                <option value="<?php echo $supplier['supplier_name'];?>"><?php echo $supplier['supplier_name'];?></option>
                                <?php }while($supplier = $result2->fetch_assoc()); ?>
                            
                                </select>
                                </div>
                            </div>

                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                <select name="status" type="text" class="form-control" id="colFormLabel" value="<?php echo $row['price'];?>"> 

                                <option value="OLD">Old</option>
                                <option value="NEW">New</option>
                            
                                </select>
                                </div>
                            </div>

                            <div class="form-group row m-1 pt-2">
                                <label for="colFormLabel" class="col-sm-3 col-form-label">Date Added</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="colFormLabel" value="<?php echo $row['date_added'];?>" readonly>
                                </div>
                            </div>
                        
							<div class="card-body">
                                <button type="submit" name="up" class="card-header btn btn-block" style="text-decoration: none; font-weight: bold;" ><i class="fa-solid fa-pen-to-square"></i> UPDATE</button>
                                <a href="products.php" class="card-header btn btn-block" style="text-decoration: none; font-weight: bold;"><i class="fa-solid fa-arrow-left"></i> BACK</a>
							</div>
                        <?php }while($row = $result->fetch_assoc()); ?>
                        </form>
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
    

