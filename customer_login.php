<?php
include ("includes/header.php");
?>


<div>

    <form method="post">
        <div class="form-group">
<label class="control-label col-md-4" for="UserName">Email:</label>
    <div class="col-md-4">
      <input type="text" class="form-control" name="email" placeholder="Enter Email " >
    </div>
    </div>


 <div class="form-group">
    <label class="control-label col-md-4" for="Password">Password:</label>
    <div class="col-md-4">
      <input type="password" class="form-control" name="pass" placeholder="Enter your Password">
    </div>
  </div>

<div class="row">        
      <div class="col-md-4"></div>
      <div class="col-md-4">
  <a href=""chekout.php"?forgot_pass">Forget Password!</a>

</div>
</div>
<div class="row">  
  <div class="col-md-4"></div> 
   <div class="col-md-4">
   <a href=""customer_register.php""> singUp</a>

   </div>
  </div>
  
  
  <div class="form-group"> 
    <div class="col-md-4"></div>
    <div class ="col-md-4">
      <button type="submit" class="btn btn-default" name="login" value="Login">Submit</button>
    </div>
  </div>

    </form>
    <?php
    if(isset($_POST['login'])){
        $customer_email=$_POST['email'];
        $customer_pass=$_POST['pass'];

        $select_c="select * from customers where customer_email='$customer_email' and customer_pass='$customer_pass'";
        $run_c=mysqli_query($con,$select_c);
        $row_c=mysqli_num_rows($run_c);
        if($row_c==0){
            echo "<script>alert('UserName or Password Not Match!Try Again')</script>";
            exit();
        }
        else{
            $ip=getIp();
            $select_cart="select * from cart where ip_add='$ip'";
            $run_cart=mysqli_query($con,$select_cart);
            $check_cart=mysqli_num_rows($run_cart);
                if($row_c>0 and $check_cart==0){
                    $_SESSION['customer_email']= $customer_email;
                    echo"<script>alert('Logged in successfully')</script>";
                    echo"<script>window.open('checkout.php','_self')</script>";
                    echo $_SESSION['customer_email'];
                }

            }
        }

    ?>

</div>
</body>
</html>