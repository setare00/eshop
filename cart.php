<?php
include ("includes/header.php")
?>

    <div id ="content_wrapper">
        <div id="sidebar">
            <div id=sidebar_title>Categories</div>

                <ul id="cats">
                  <?php showCats(); ?>
                </ul>

</div>
        <div id="content_area">
            <div id="shopping_cart">
                <span style="float: right;padding: 5px;line-height: 40px;">
                      Welcome Guest!<b style="color:red"> Shopping Cart - </b>Total Items:<?php total_items();?>Total Price: <?php total_price() ?><a href="cart.php">Go to card</a>

                </span>
            </div>

            <div id="products_box">
            <form action="" method="post"  enctype="multipart/form-data">

                <table align="center" width="700" bgcolor="#f5f5dc">
                    <tr align="center">
                        <td colspan="5"><h2>YOUR CART </h2></td>
                    </tr>
                    <tr align="center">
                        <th>Remove </th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>

                    <?php
                    $total=0;
                    global $con;
                    $ip=getIp();
                    $get_price_item = "select * from cart where ip_add='$ip'";
                    $get_price_run = mysqli_query($con, $get_price_item);
                    while($p_price=$count_price=mysqli_fetch_array($get_price_run)){
                        $pro_id=$p_price['p_id'];
                        $pro_price="select * from product where product_ID='$pro_id'";
                        $run_pro_price=mysqli_query($con,$pro_price);
                        while($pro_price2=mysqli_fetch_array($run_pro_price))
                        {
                            $product_price=array($pro_price2['product_price']);
                            $values=array_sum($product_price);
                            $total+=$values;
                            $pro_title=$pro_price2['product_title'];
                            $pro_image=$pro_price2['product_image'];
                            $pro_price=$pro_price2['product_price'];

                    ?>
                    <tr align="center">
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"/></td>
                        <td><?php echo $pro_title; ?><br>
                        <img src="admin/product_images/<?php echo $pro_image; ?>" width="60" height="50"></td>
                        <td><input type="text" size="6" name="qty" /></td>

                        <?php
                        if (isset($_POST['update_cart']))
                        {
                            global $con;
                            $ip=getIp();
                           // $qty=$_POST['qty'];
                            foreach($_POST['qty'] as $qty_arr) {
                                $update_qty = "update cart set qty='$qty_arr' where ip_add='$ip' and p_id='$qty_arr'";
                                $update_run_qty = mysqli_query($con, $update_qty);
                               // $_SESSION['qty'] = $qty;
                                //$total=total*qty;

                               // echo $qty;
                            }
                        }
                        ?>

                    <td><?php echo $pro_price ?></td>
                    </tr>

                       <?php }} ?>
                    <tr align="right">
                        <td colspan="3"><b>Sub Total</b></td>
                        <td colspan="3"><?php echo $total ?></td>
                    </tr >
                    <tr align="center">
                    <td colspan="2"><input type="submit" name="update_cart" value="update cart"/> </td>
                    <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                    <td><a href="checkout.php">checkOut </a></td>
                    </tr>
                </table>


                <?php
function remove_cart()
{
    global $con;
    $ip = getIp();
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['remove'] as $remove_id) {
            $delete_pro = "delete from cart where ip_add='$ip' and p_id='$remove_id'";
            $delete_pro_run = mysqli_query($con, $delete_pro);
            if ($delete_pro_run) {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
    if (isset($_POST['continue']))
        echo "<script>window.open('products.php','_self')</script>";
    echo @$up_cart = cart_update();
}
                echo @$del_cart=remove_cart();
                ?>
            </form>

          </div>
        </div>

    <div id="footer">
        <h2 style="text-align: center;padding-top: 30px;">&copy;2016 by www.onlineshop.com</h2>
    </div>

</div>
</body>
</html>