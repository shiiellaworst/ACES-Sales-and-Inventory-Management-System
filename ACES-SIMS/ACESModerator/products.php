<?php 
session_start();
include("../dataCenter/connection.php");

$query = "SELECT *, row_number() over ( order by `product_id`) `row_num`, COUNT(`qty`) AS `qty` FROM `aces_inventory` GROUP BY `product_id`;";
if ($result = mysqli_query($conn, $query)) {
  $row = $result->fetch_assoc();
  $rowcount=mysqli_num_rows($result);

}


if(isset($_POST['clickView'])){
  $id = $_POST['viewProducts'];
  echo $id;
  $query3 = "SELECT * FROM `aces_inventory` WHERE `product_id` = '$id' LIMIT 1;";
  $result3 = mysqli_query($conn, $query3);
  $display = $result3->fetch_assoc();

  do {
  $img = $display['product_name'];
  $name = $display['product_name'];

  } while (  $display = $result3->fetch_assoc());

  }

$query2 = "SELECT * FROM `supplier_info`;";
$result2 = mysqli_query($conn, $query2);
$supplier = $result2->fetch_assoc();

if (isset($_POST['addproduct'])) {
      $des = $_POST['des'];
      $course = $_POST['course'];
      $size = $_POST['size'];
      $supplier = $_POST['supplier'];
      $qty = $_POST['qty'];
      $pcr = $_POST['prc'];
      $designer = $_POST['designer'];
      $category = $_POST['category'];
      $prod_name = $_POST['pname'];
      $filename = $_FILES["uploadfile"]["name"];
      $tempname = $_FILES["uploadfile"]["tmp_name"];	
      $folder = "img/products/".$filename;
  
      //save to database
      $prod_id = rand(222222, 999999);
      date_default_timezone_set("Asia/Manila");
      $status = "NEW"; $date = date('Y-m-d'); $time =  date('h:i:s');
        

                for($i=0; $i < $qty; $i++){
                  $query = "INSERT INTO `aces_inventory`(`product_id`, `product_name`, `product_details`, `product_designer`, `category`, `acro`, `price`, `size`, `img`, `qty`, `date_added`, `time_added`) VALUES ('$prod_id','$prod_name','$des','$designer','$category','$course','$pcr','$size','$filename',1,'$date','$time')";

                        if(mysqli_query($conn, $query)){
                            if (move_uploaded_file($tempname, $folder)) {
                            }
                            header("Location: products.php");
                            } else {
                              mysqli_query($conn,$query) or die ('Error in updating product in Database '.$query);
                                die; echo "(mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT))";
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
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../Admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--Font Awoseme-->
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"></script>
    
    <title>Admin Dashboard Panel</title> 


<!-- <style> 
#myTable tr td:nth-child(1), #myTable th:nth-child(1) {
    display: none;
}
</style> -->
<nav>
<?php include('../ACESModerator/sidebar.php');?>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">
        <div class="overview">
                <div class="title">
                <i class="fab fa-product-hunt"></i>
                    <span class="text"> Products&nbsp; </span>
                    <button type="button" class="addMe" data-toggle="modal" data-target="#ProductModal"
                style="text-decoration: none; border: none;"><i class="fa-solid fa-plus" style="background-color: #D1EEF1; color: black;"></i>
									</button>
                </div>

            <div class="card" id="viewProductDisplay"><form method="POST" method="POST">
              <div class="card-body">
                <div class="table-responsive mt-2">
                  <table id="myTable" class="table table-striped mb-0" >
                    <thead style="background-color: #249E98; color: #FFF; height: 50px; text-align: middle;">
                      <th style="width:150px">Product Code</th>
                      <th style="width:200px">Name</th>
                      <th style="width:150px">Course</th>
                      <th style="width:150px">Date Added</th>
                      <th style="width:70px">View</th>
                      <th style="width:70px">Edit</th>
                      <th style="width:70px">Add</th>
                      </thead>
                    <tbody>
                      <?php do { ?>
                      <tr style="border-bottom:1px solid gray;">
                        <td><?php echo $row['product_id'];?></td>
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['acro'];?></td>
                        <td><?php echo $row['date_added'];?></td>
                        <td id="viewProducts"><a href="product.php?id=<?php echo $row['product_id'];?>" name="clickView" class="act_btn" style="text-decoration: none; cursor:pointer; width: 90px; color: black; background-color: yellow; border: black; border-radius: 5px;">VIEW</a></td>
                        <td><a href="product-.php?id=<?php echo $row['product_id'];?>" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: YELLOW; border: black; border-radius: 5px;">EDIT</a></td>
                        <td><a href="addproduct.php?id=<?php echo $row['product_id'];?>" class="act_btn" style="text-decoration: none; cursor:pointer; width: 100px; color: black; background-color: YELLOW; border: black; border-radius: 5px;">ADD</a></td>  
                      </tr>
                      <?php } while($row = $result->fetch_assoc());?>
                    </tbody>
                  </table>
                </div>
              </div>
            </form></div>




          </section>


    <script src="../Admin/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    
    <script> 
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>


<!-- Modal -->
<div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" class="form-control" name="prodnum" id="prod_num" value="">
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="uploadfile" onchange="preview()" value="" id="fileUpload" accept="img/png, img/jpeg">
              <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
            </div>
        </div>
        <div class="form-group">
        <img id="frame" name="frame" src="img/products/<?php $filename?>" style="width: 100%;"> 
          </div>
        <div class="form-group">

        <label for="lname" class="col-form-label">Product Name:</label>
        <input type="text" class="form-control" name="pname" id="pname" value="">

        <label for="lname" class="col-form-label">Designer:</label>
        <input type="text" class="form-control" name="designer" id="designer" value="">
 
          <label for="fname" class="col-form-label">Description:</label>
          <textarea type="text" class="form-control" name="des" id="des" value=""> </textarea>

        <label for="" class="col-form-label">Course:</label>
          <select name="course" class="custom-select" aria-label="Default select">
            <option value="BSCS">BS in Computer Science</option>
            <option value="BSIT">BS in Information Technology</option>
            <option value="BSIS">BS in Information System</option>
            <option value="BSEMC">BS in Entertainment and Multimedia Computing</option>
          </select>

          <label for="" class="col-form-label">Size:</label>
          <select name="size" class="custom-select" aria-label="Default select">
            <option value="S">Small</option>
            <option value="M">Medium</option>
            <option value="L">Large</option>
          </select>  

          <label for="" class="col-form-label">Category:</label>
          <select name="category" class="custom-select" aria-label="Default select">
            <option value="T-shirt">T-shirt</option>
            <option value="Lanyard">Lanyard</option>
          </select>  

          <label for="" class="col-form-label">Supplier:</label>
          <select name="supplier" class="custom-select" aria-label="Default select">
          <?php do { ?>
            <option value="<?php echo $supplier['supplier_name'];?>"><?php echo $supplier['supplier_name'];?></option>
            <?php }while($supplier = $result2->fetch_assoc()); ?>
          </select>


            <label for="lname" class="col-form-label">Quantity:</label>
            <input type="number" min = "1" class="form-control" name="qty" id="qty" value="">

            <label for="lname" class="col-form-label">Price:</label>
            <input type="numer" min = "1"class="form-control" name="prc" id="prc" value="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</div>





<script>
$('#ProductModal').on('shown.bs.modal');

function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
    }



  //   $(document).on('click', '#viewProducts', function(){
  //     let btn = document.querySelector("#viewProducts");
  //     let div = document.querySelector("#viewDisplay");
  //     let div1 = document.querySelector("#viewProductDisplay");
  //     let btn1 = document.querySelector("#backProduct");


  //     if (div.style.display === "none") {
  //       div.style.display = "block";
  //       div1.style.display = "none";

  //     } 


  //     btn1.addEventListener("click", () => {
  //     if (div1.style.display === "none") {
  //       div1.style.display = "block";
  //       div.style.display = "none";

  //     } 
  //   });

  // });
    
</script>




