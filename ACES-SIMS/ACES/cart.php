<?php 

include("../dataCenter/connection.php");
require('session.php');


$student_id = $_SESSION['stud_id'];
$query = "SELECT *, COUNT(*) FROM `cart_info` WHERE `STUDENT_NUMBER` = '$student_id' GROUP BY `product_id`;";
$result = mysqli_query($conn, $query);

$row = $result->fetch_assoc();

$query2 = "SELECT *, COUNT(*) FROM `cart_info` WHERE `STUDENT_NUMBER` = '$student_id';";
$result2 = mysqli_query($conn, $query2);

$row2 = $result2->fetch_assoc();

if(isset($_POST['purchase'])){

    //save to database
    $transaction = rand(11111111,999999999);
    $PRODUCT_ID = $row2['PRODUCT_ID'];
    $STD_NUMBER = $row2['STUDENT_NUMBER'];


    date_default_timezone_set("Asia/Manila");
    $DATE = date('Y-m-d');
    $TIME = date('h:i:s');


    $PID = $_POST['product_id'];
    $PNAME = $_POST['product_name'];
    $IMG = $_POST['img'];
    $SIZE = $_POST['size'];
    $COURSE = $_POST['course'];
    $PRICE = $_POST['price'];
    $QTY = $_POST['qty'];

    
    foreach( $PID as $key => $n ) {
        $transactionCODE[$key] = rand(11111111,99999999);
        $SUB[$key] = $QTY[$key] * $PRICE[$key];
        $query = "INSERT INTO `transaction`(`TRANSACTION_CODE`,`TRANSACTION_ID`, `PRODUCT_ID`, `PRODUCT_NAME`, `IMG`, `SIZE`, `PRICE`, `QTY`, `TOTAL`, `DATE`, `TIME`, `STUDENT_NUMBER`,  `STATUS`) VALUES ('$transactionCODE[$key]', '$transaction', '".$n."', '".$PNAME[$key]."', '".$IMG[$key]."', '".$SIZE[$key]."', '".$PRICE[$key]."',  '".$QTY[$key]."','".$SUB[$key]."','$DATE','$TIME','$STD_NUMBER','PENDING');";
         if(mysqli_query($conn, $query)){

            $delq = "DELETE FROM `cart_info` WHERE STUDENT_NUMBER = '$STD_NUMBER';";
            mysqli_query($conn, $delq);

            header("Location: cart.php");

        }
        else {
            die ('Error in updating product in Database '.$query);
        }
    }


}

if(isset($_POST['del'])){
    $delc = $_POST['del'];
    $del = "DELETE FROM `cart_info` WHERE `cart_num` = '$delc';";
    if(mysqli_query($conn, $del)){
        
        header("Location: cart.php");
        die;
        }  else {
            echo "not clicked";
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
    <link rel="stylesheet" href="../ACES/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>

    
</head>

<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>
    
    <!-- cart starts here -->
    <!-- <section id="cart" class="section-p1">
        <form> -->


<style> 
.cart-header {
    font-weight: bold;
    font-size: 1.25em;
    color: #333;
}

.cart-column {
    display: flex;
    align-items: center;
    border-bottom: 1px solid black;
    margin-right: 1.5em;
    padding-bottom: 10px;
    margin-top: 10px;
}

.cart-row {
    display: flex;
}

.cart-item {
    width: 45%;
}

.cart-price {
    width: 20%;
    font-size: 1.2em;
    color: #333;
}

.cart-size {
    width: 20%;
    font-size: 1.2em;
    color: #333;
}

.cart-subtotal {
    width: 20%;
    font-size: 1.2em;
    color: #333;
}

.cart-quantity {
    width: 35%;
}

.cart-item-title {
    color: #333;
    margin-left: .5em;
    font-size: 1.2em;
}

.cart-item-image {
    width: 75px;
    height: auto;
    border-radius: 10px;
}

.btn-danger {
    color: white;
    background-color: #EB5757;
    border: none;
    border-radius: .3em;
    font-weight: bold;
}

.btn-danger:hover {
    background-color: #CC4C4C;
}

.cart-quantity-input {
    height: 34px;
    width: 50px;
    border-radius: 5px;
    border: 1px solid #56CCF2;
    background-color: #eee;
    color: #333;
    padding: 0;
    text-align: center;
    font-size: 1.2em;
    margin-right: 25px;
}

.cart-row:last-child {
    border-bottom: 1px solid black;
}

.cart-row:last-child .cart-column {
    border: none;
}

.cart-total {
    text-align: end;
    margin-top: 10px;
    margin-right: 10px;
}

.cart-total-title {
    font-weight: bold;
    font-size: 1.5em;
    color: black;
    margin-right: 20px;
}

.cart-total-price {
    color: #333;
    font-size: 1.1em;
}

.btn-purchase {
    display: block;
    margin: 40px auto 80px auto;
    font-size: 1.75em;
} 

@media (max-width:799px) {
    .whole  {
        margin: 25px 150px;
    }
}

@media (max-width:477px) {
    .whole  {
        margin: 25px;

    }

    .btn-purchase {
    font-size: 1rem;
    } 

    .cart-item-title {
        display: none;
    }
    .cart-quantity-input {
    height: 25px;
    width: 31px;
    font-size: 1em;
    margin-right: 11px;
    }
    .btn-danger {
    height: 30px;
    width: 100px;
}

    .cart-item-image {
    width: 31px;
    }

    .cart-header {
   display: none;
    
    }

    .cart-column {
        border-bottom: none;
    }

    .container .content-section{
        overflow: scroll;
    } 


}
</style>
                
                <section id="form-repeater">
                    <div class="row">
                        <div class="col-12">
                            <div class="card whole">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="car">
                                                <div data-repeater-item="">

                                                <section class="container content-section" style="overflow: scroll;">
                                                <form method="POST">
                                                    <h2 class="section-header">CART</h2>
                                                    <div class="cart-row">
                                                        <span class="cart-item cart-header cart-column">ITEM</span>
                                                        <span class="cart-price cart-header cart-column">PRICE</span>
                                                        <span class="cart-price cart-header cart-column">SIZE</span>
                                                        <span class="cart-price cart-header cart-column">SUBTOTAL</span>
                                                        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                                                    </div>
                                                    
                                                    <?php if(!$row) { } else {
                                                     do {
                                                     ?>
                                                    <div class="cart-items" style="display: flex;">
                                                    <div class="cart-item cart-column ">
                                                    
                                                        <input type="hidden" name="product_id[]" value="<?php echo $row['PRODUCT_ID']; ?>">
                                                        <input type="hidden" name="img[]" value="<?php echo $row['img']; ?>">
                                                        <input type="hidden" name="course[]" value="<?php echo $row['acro']; ?>">
                                                            <img  class="cart-item-image" src="img/products/<?php echo $row['img']; ?>" width="50" height="100">
                                                            <span class="cart-item-title"><?php echo $row['product_name']; ?><input type="hidden" name="product_name[]" value="<?php echo $row['product_name']; ?>"></span>
                                                        </div>
                                                        <span class="cart-price cart-column"><input class="cart-price-to" type="hidden" name="price[]" value="<?php echo $row['price']; ?>"><?php echo $row['price']; ?></span>
                                                        <span class="cart-size cart-column"><?php echo $row['size']; ?><input type="hidden" name="size[]" value="<?php echo $row['size']; ?>"></span>
                                                        <span  class="cart-subtotal cart-column"><input class="cart-sub-total" name="subtotal[]" type="hidden" value=""></span>
                                                        
                                                        <div class="cart-quantity cart-column">
                                                            <input name="qty[]" onchange="updateCartTotal()" min="1" class="cart-quantity-input" type="number" value="1">
                                                            <button name="del" class="btn btn-danger" type="submit"
                                                             value ="<?php echo $row['cart_num']; 
                                                            ?>" >REMOVE</button>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php  } while ( $row = $result->fetch_assoc()); }?> 
                                                    <div class="cart-total">
                                                        <strong class="cart-total-title">Total</strong>
                                                        <span name="gtotal" id="cart-total-price"></span>
                                                    </div>
                                                    <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-purchase" type="button">PURCHASE</button>


                                                    <!-- Button PURCHASE modal -->

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ARE YOU SURE YOU WANT TO PROCEED CHECK OUT?
                                    </div>
                                    <div class="modal-footer"> <form method="POST">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                        <button type="submit" id ="purchase" name="purchase" value="" class="btn btn-primary">YES</button>
                                    </div></form>
                                    </div>
                                </div>
                                </div>

                                                    </form>
                                                </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</section>

<script>    
$('#exampleModalCenter').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
    </script>

    <!-- footer starts here -->
    <?php include('footer.php'); ?>


    <script src = "assets/js/script.js"></script>
    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    

    


<script> 

        var gt = 0;
        var iprice = document.getElementsByClassName('cart-price-to');
        var iquantity = document.getElementsByClassName('cart-quantity-input');
        var itotal = document.getElementsByClassName('cart-subtotal');
        var gtotal = document.getElementById('cart-total-price');


        function updateCartTotal() {

                for (i=0; i< iprice.length; i++) {

                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                itotal[i].value=(iprice[i].value)*(iquantity[i].value);

                    gt += itotal[i].value;
            }

                gtotal.innerText = gt;
            
                var sum = 0;
                $('.cart-subtotal').each(function() {
                sum += +$(this).text()||0;
                });
                $("#cart-total-price").text(sum);

      
        }
  

        updateCartTotal()



</script>


</body>

</html>