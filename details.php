<?php include ("includes/header.php");
?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <ul style="text-decoration: none" id="cats">
                <?php showCats(); ?>
            </ul>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Welcome</h1>
            <?php
            getCatProducts();
            if(isset($_GET['pro_id'])){
                $product_id=$_GET['pro_id'];
                $get_products = "SELECT * FROM product where product_ID='$product_id'";
                $run_products=mysqli_query($con,$get_products);
                while($row_product=mysqli_fetch_array($run_products))
                {
                    $pro_id=$row_product['product_ID'];
                    $pro_title=$row_product['product_title'];
                    $pro_price=$row_product['product_price'];
                    $pro_image=$row_product['product_image'];
                    $pro_desc=$row_product['product_desc'];


                    echo"
                <divs id='single_product'>
                <h3>$pro_title</h3>
                <img src='admin/product_images/$pro_image' width='400' height='300'/>
                <p ><h2>$pro_price</h2></p>
                <p style='float:right'><h3>$pro_desc</h3></p>
                <a href='index.php' style='float: left;'>Go Back</a>
                <a href='index.php?pro_id=$pro_id'><button style='float: right'>Add to Cart</button></a>
                </divs>
                ";

                }
            }

            ?>
            <div class="col-sm-2 sidenav"></div>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>
    </div>
</div>


        <div id="content_area">
            <div id="shopping_cart">
                <span style="float: right;padding: 5px;line-height: 40px;">
                      Welcome Guest!<b style="color:red"> Shopping Cart - </b>Total Items:Total Price<a href="cart.php">Go to card</a>

                </span>
            </div>

        </div>

    <div id="footer">
        <h2 style="text-align: center;padding-top: 30px;">&copy;2016 by www.onlineshop.com</h2>
    </div>


</body>