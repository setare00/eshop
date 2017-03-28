<?php

include ("includes/header.php");
?>
<div class="container-fluid text-center">
    <div id="shopping_cart">
                <span style="float: right;padding: 5px;line-height: 40px;">
                    <?php
                    if(isset($_SESSION['customer_email']))
                    {
                        echo "<b>user:</b> .$_SESSION[customer_email]";
                    }
                    else
                        echo "Welcome Guest!"
                    ?>

                    <b style="color:red"> Shopping Cart - </b>Total Items:<?php total_items();?>Total Price: <?php total_price() ?><a href="cart.php">Go to card</a>


    </div>
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <ul style="text-decoration: none" id="cats">
                <?php showCats(); ?>
            </ul>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Welcome</h1>
            <?php
            showProducts();
            getCatProducts();
            cart();
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