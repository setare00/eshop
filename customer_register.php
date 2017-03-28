<?php
include ("includes/header.php");
?>


<div class="main_wrapper">

      </div>

  <!--  <div class="menubar">
    <ul id="menu">
        <li><a href="index.php">Home</a> </li>
        <li><a href="#">My account</a> </li>
        <li><a href="#">sign up</a> </li>
        <li><a href="#">Shopping cart</a> </li>
        <li><a href="#">contact us</a> </li>


    </ul>
    </ div>-->

    <div id ="content_wrapper">

            <div id=sidebar_title>Categories</div>

                <ul id="cats">
                  <?php showCats(); ?>
                </ul>


        <div id="content_area">
            <div id="shopping_cart">
                <span style="float: right;padding: 5px;line-height: 40px;">
                      Welcome Guest!<b style="color:red"> Shopping Cart - </b>Total Items:<?php total_items();?>Total Price: <?php total_price() ?><a href="cart.php">Go to card</a>
                </span>
            </div>
<form action="customer_register.php" method="post" >
    <table align="center" width="750">
    <tr align="center">
        <td  colspan="6"><h2>Create an Acount</h2></td>
    </tr>

        <tr>
            <td align="right">Customer Name</td>
            <td><input type="text" name="c_name" required></td>
        </tr>

        <tr>
            <td align="right">Email</td>
            <td><input type="text" name="c_email" required></td>
        </tr>

        <tr>
            <td align="right">Password</td>
            <td><input type="password" name="c_pass" required></td>
        </tr>

        <tr>
            <td align="right">Country</td>
            <td> <select name="c_country">
                    <option>Canada</option>
                    <option>US</option>
                    <option>UK</option>
                    <option>Japan</option>
            </td>
        </tr>

        <tr>
            <td align="right">City</td>
            <td><input type="text" name="c_city" required></td>
        </tr>

        <tr>
            <td align="right">Contact Number</td>
            <td><input type="text" name="c_contact"></td>
        </tr>

        <tr>
            <td align="right">Addrss</td>
            <td><input type="text" name="c_address" required> </td>
        </tr>

                <tr align="center">
            <td colspan="6"><input type="submit" name="register" value="Create Acount"> </td>
                </tr>
    </table>
</form>

        </div>
    </div>


    <div id="footer">
        <h2 style="text-align: center;padding-top: 30px;">&copy;2016 by www.onlineshop.com</h2>
    </div>


</body>

<?php

if (isset($_POST['register']))
{
    $ip=getIp();
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];

   echo $customer_insert="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_add)
VALUES ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address')";
    $customer_insert_run=mysqli_query($con,$customer_insert);
    /*if($customer_insert_run){
        echo "<script>alert('Regiatration Successful!')</script>";
    }*/

$select_cart="select * from cart where ip_add='$ip'";
$run_cart=mysqli_query($con,$select_cart);
$check_cart=mysqli_num_rows($run_cart);
    if($check_cart==0){
        $_SESSION['customer_email']=$c_email;
        echo"<script>alert('Acount hase been created successfully,Thanks')</script>";
        echo"<script>window.open('customer/my_acount.php','_self')</script>";
    }
    else{
        echo"<script>alert('Acount hase been created successfully,Thanks')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
    }

}

?>