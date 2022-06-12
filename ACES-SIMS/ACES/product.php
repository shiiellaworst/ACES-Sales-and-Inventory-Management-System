<?php
session_start();
include("../dataCenter/connection.php");

$query = "SELECT * FROM `aces_inventory` GROUP BY `product_id`"; 
$result = mysqli_query($conn, $query);

$row = $result->fetch_assoc();




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACES</title>
    <link rel="stylesheet" href="../ACES/assets/css/style.css">
    <link rel="stylesheet" href="../ACES/assets/css/sproduct.css">

    <script src="https://kit.fontawesome.com/f874a2fa2f.js" crossorigin="anonymous"></script>
    
</head>
<style>

div.search__container{
    padding-top: 5%;
}

td{
    padding: 5px 10px;
    text-align: center;
    font-size: 9pt;
    height: 50px;
}

input.search__input{
    width: 100%;
    padding: 12px 24px;
    font-size: 14px;
    line-height: 18px;
    color: #575756;
    background-color: transparent;
    background-position: 95% center;
    border-radius: 50px;
    border: 1px solid #575756;
    transition: all 250ms ease-in-out;
    backface-visibility: hidden;
    transform-style: preserve-3d;
}

input.search__input::placeholder{
    color: rgba(87, 87, 86, 0.8);
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

input.search__input:hover,
input.search__input:focus{
    padding: 12px 0;
    outline: 0;
    border: 1px solid transparent;
    border-bottom: 1px solid #575756;
    border-radius: 0;
    background-position: 100% center;
}


.btn {
    list-style: none;
    display: inline;
  border: none;

  margin-top: 40px;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  border-radius: 50px;
    border: 1px solid #575756;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

</style>
<body>

    <!-- header starts here -->
    <?php include('header-nav.php'); ?>
     
    <!-- shop starts here -->
    <section id="page-header">
        <h2>#buymycoursedesign</h2>
        <p>Our T-shirts & Lanyard Is Full of Happiness</p>
    </section>
    

    <!-- products starts here -->
    <section id="product1" class="section-p1">

            <div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
                <div class="search__container col-md-9">
                    
                        <ul id="myBtnContainer" style="padding-top: 20px;">
                            <li class="btn" id="all">All</li>
                            <li class="btn" id="BSCS">BSCS</li>
                            <li class="btn" id="BSIT">BSIT</li>
                            <li class="btn" id="BSIS">BSIS</li>
                            <li class="btn" id="BSEMC">BSEMC</li>


                        </ul>
                </div>    
            </div>

        <div class="pro-container">
                <!-- "window.location.href='sproduct.php' -->
                <?php do { ?>
                <form data-search="<?php echo $row['product_name'] ?>" class="pro all <?php echo $row['acro'];?> " action="">
                        <img src="img/products/<?php echo $row['img']; ?>" alt="">
                        <div class="des">
                            <span id="p_title" type="text"name="p_title"><?php echo $row['product_name'] ?></span>
                            <h5 id="p_course" class="category-name"><?php echo $row['acro'];?> </h5> <h5> ₱<?php echo $row['price'];?>.00</h5>
                        </div>
                    <a href="erawr.php?id=<?php echo $row['product_id'];?>"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </form>  
                <?php } while($row = $result->fetch_assoc());?>  


        </div>
    </section>
    

    <!-- news starts here -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up to buy</h4>
            <p>Make new design <span>special for your course!</span></p>
        </div>


    </section>
    
    <!-- footer starts here -->
    <?php include('footer.php'); ?>
    <script>

        const categoryTitle = document.querySelectorAll('.btn');
        const allCategoryPosts = document.querySelectorAll('.all');

        for(let i = 0; i < categoryTitle.length; i++){
            categoryTitle[i].addEventListener('click', filterPosts.bind(this, categoryTitle[i]));
        }

        function filterPosts(item){
            changeActivePosition(item);
            for(let i = 0; i < allCategoryPosts.length; i++){
                if(allCategoryPosts[i].classList.contains(item.attributes.id.value)){
                    allCategoryPosts[i].style.display = "block";
                } else {
                    allCategoryPosts[i].style.display = "none";
                }
            }
        }

        function changeActivePosition(activeItem){
            for(let i = 0; i < categoryTitle.length; i++){
                categoryTitle[i].classList.remove('active');
            }
            activeItem.classList.add('active');
        };

// searchbox

        


    </script>
    <script src = "assets/js/script.js"></script>

</body>


</html>