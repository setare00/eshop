<?php
session_start();
include ("function/functions.php");
?>

                <?php
                if(!isset($_SESSION['customer_email'])){
                    include("customer_login.php");
                }
                else{
                    include ("payment.php");
                }
                ?>



    <div id="footer">
        <h2 style="text-align: center;padding-top: 30px;">&copy;2016 by www.onlineshop.com</h2>
    </div>


</body>
</html>