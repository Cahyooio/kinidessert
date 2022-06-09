<div class="box">
  <div class="card">
      <center>
                  
          <p class="lead"> Sudah memiliki akun ? </p>          
          <p class="text-muted"> Silahkan login untuk berbelanja di Kini Dessert </p>          
      </center>
  </div>
  <form method="post" action="checkout.php">
      <div class="form-group">
          <label> Email </label>          
          <input name="c_email" type="text" class="form-control" required>          
      </div>      
       <div class="form-group">          
          <label> Kata Sandi </label>          
          <input name="c_pass" type="password" class="form-control" id="myInput" required>     
          <input type="checkbox" onclick="myFunction()"> Lihat Kata Sandi   
      </div>      
      <div class="text-center">          
          <button name="login" value="Login" class="btn btn-info">              
              <i class="fa fa-sign-in"></i> Masuk              
          </button>          
      </div>
  </form>
  <center>
     <a href="customer_register.php">         
         <h5> Belum memiliki akun? Klik disini! </h5>         
     </a>       
  </center>
</div>
<?php 
if(isset($_POST['login'])){    
    $customer_email = $_POST['c_email'];    
    $customer_pass = $_POST['c_pass'];    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";    
    $run_customer = mysqli_query($con,$select_customer);    
    $get_ip = getRealIpUser();    
    $check_customer = mysqli_num_rows($run_customer);    
    $select_cart = "select * from cart where ip_add='$get_ip'";    
    $run_cart = mysqli_query($con,$select_cart);    
    $check_cart = mysqli_num_rows($run_cart);    
    if($check_customer==0){        
        echo "<script>alert('Email atau Kata Sandi Salah')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
        exit();        
    }    
    if($check_customer==1 AND $check_cart>0){        
        $_SESSION['customer_email']=$customer_email;        
       echo "<script>alert('Kamu sudah Masuk')</script>";         
       echo "<script>window.open('cart.php','_self')</script>";        
    }else{        
        $_SESSION['customer_email']=$customer_email;        
       echo "<script>alert('Kamu sudah Masuk')</script>";         
       echo "<script>window.open('index.php','_self')</script>";        
    }    
}

?>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>