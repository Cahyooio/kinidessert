<?php 
    $active='Register';
    include("includes/header.php");
?>   
   <div id="content">
       <div class="container">
           <div class="col-md-12">               
               <ul class="breadcrumb">                   
                   <li>
                      Buat Akun
                   </li>
               </ul>               
           </div>           
           <div class="col-md-12">               
               <div class="box">                   
                   <div class="box-header">                       
                                            
                       <form action="customer_register.php" method="post" enctype="multipart/form-data">                           
                           <div class="form-group">                               
                               <label>Nama:</label>                               
                               <input type="text" class="form-control" name="c_name" required>                               
                           </div>                           
                           <div class="form-group">                               
                               <label>Email:</label>                               
                               <input type="text" class="form-control" name="c_email" placeholder="contoh@gmail.com" required>                               
                           </div>                           
                           <div class="form-group">                               
                               <label>Kata Sandi:</label>                               
                               <input type="password" class="form-control" name="c_pass" minlength="6" placeholder="Minimal 6 Karakter" required>
                             </div>                           
                           <div class="form-group">                               
                               <label>Nomer Handphone:</label>                               
                               <input type="text" class="form-control" placeholder="6287718xxxxx" name="c_contact" required>                               
                           </div>                           
                           <div class="form-group">                               
                               <label>Foto Profil:</label>                               
                               <input type="file" class="form-control form-height-custom" name="c_image" required>                               
                           </div>
                           <h3><strong>  Alamat (Hanya Melayani Pembelian Wilayah Jabodetabek) </strong></h3>
                                                  
                           <div class="form-group">                               
                               <label>Alamat lengkap:</label>                               
                               <input type="text" class="form-control" name="c_address" required>                               
                           </div>                           
                           <div class="form-group">                           
                         <label> Kota:</label>                          
                          <select name="c_country" class="form-control" required>
                              <option value="" disabled selected> Pilih Kota </option>
                              <option> Jakarta </option>
                              <option> Bogor </option>
                              <option> Depok </option>
                              <option> Tanggerang </option>
                              <option> Bekasi </option>
                                                          
                          </select>
                       </div>            
                           <div class="form-group">                               
                               <label>Kode Pos:</label>                               
                               <input type="text" class="form-control" name="c_city" required>                               
                           </div>                           
                           <div class="text-center">                               
                               <button type="submit" name="register" class="btn btn-info">                               
                               <i class="fa fa-user-md"></i> Buat Akun                               
                               </button>     
                               <center>
                                    <a href="checkout.php">         
                                        <h5> Sudah memiliki akun? Klik disini! </h5>         
                                    </a>       
                                </center>                       
                           </div>                           
                       </form>                       
                   </div>                   
               </div>               
           </div>           
       </div>
   </div>   
   <?php     
    include("includes/footer.php");    
    ?>    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>   
</body>
</html>
<?php 
if(isset($_POST['register'])){    
    $c_name = $_POST['c_name'];    
    $c_email = $_POST['c_email'];    
    $c_pass = $_POST['c_pass'];    
    $c_country = $_POST['c_country'];    
    $c_country2 = $_POST['c_country2'];    
    $c_city = $_POST['c_city'];
    $c_city2 = $_POST['c_city2'];    
    $c_contact = $_POST['c_contact'];    
    $c_address = $_POST['c_address'];
    $c_address2 = $_POST['c_address2'];    
    $c_image = $_FILES['c_image']['name'];    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];    
    $c_ip = getRealIpUser();    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_country2,customer_city,customer_city2,customer_contact,customer_address,customer_address2,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_country2','$c_city','$c_city2','$c_contact','$c_address','$c_address2','$c_image','$c_ip')";    
    $run_customer = mysqli_query($con,$insert_customer);    
    $sel_cart = "select * from cart where ip_add='$c_ip'";    
    $run_cart = mysqli_query($con,$sel_cart);    
    $check_cart = mysqli_num_rows($run_cart);    
    if($check_cart>0){        
        $_SESSION['customer_email']=$c_email;        
        echo "<script>alert('Akun anda telah Terbuat')</script>";        
        echo "<script>window.open('checkout.php','_self')</script>";        
    }else{        
        $_SESSION['customer_email']=$c_email;        
        echo "<script>alert('Akun anda telah Terbuat')</script>";        
        echo "<script>window.open('index.php','_self')</script>";        
    }    
}
?>