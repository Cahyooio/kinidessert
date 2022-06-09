<?php 
session_start();
if(!isset($_SESSION['customer_email'])){    
    echo "<script>window.open('../checkout.php','_self')</script>";    
}else{
include("includes/db.php");
include("functions/functions.php");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kini Dessert</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body> 
   <div id="navbar" class="navbar navbar-default">       
       <div class="container">           
           <div class="navbar-header">
               
               <a href="../index.php" class="navbar-brand home">                   
                   <img src="images/logo.png" width="auto" height="50px" alt="Bayu Logo" class="hidden-xs">
                   <img src="images/logo.png" width="auto" height="50px" alt="Bayu Logo Mobile" class="visible-xs">                   
               </a>               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">                   
                   <span class="sr-only">Toggle Navigation</span>                   
                   <i class="fa fa-align-justify"></i>                   
               </button>               
           </div>           
           <div class="navbar-collapse collapse" id="navigation">               
               <div class="padding-nav">                   
                   <ul class="nav navbar-nav left">                       
                       <li>
                           <a href="../index.php">Halaman Awal</a>
                       </li>
                       <li>
                           <a href="../shop.php">Produk</a>
                       </li>
                       <li>
                           <a href="../cart.php">Keranjang</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">Akun Saya</a>
                       </li>                      
                      <li>                           
                           <?php                            
                           if(!isset($_SESSION['customer_email'])){                               
                               echo"<a href='checkout.php'>Masuk</a>";                               
                           }else{                               
                              echo"<a href='../logout.php'>Keluar</a>";                                
                           }                           
                           ?>                           
                       </li>                       
                   </ul>                   
               </div>               
               <a href="../cart.php" class="btn navbar-btn btn-primary right">                   
                   <i class="fa fa-shopping-cart"></i>                   
                   <span><?php items(); ?> Pesanan anda</span>                   
               </a>               
               </form>                   
               </div>               
           </div>           
       </div>       
   </div>   
   <div id="content">
       <div class="container">
           <div class="col-md-12">               
               <ul class="breadcrumb">                   
                   <li>
                       Akun Saya
                   </li>
               </ul>               
           </div>           
           <div class="col-md-3">   
   <?php     
    include("includes/sidebar.php");    
    ?>               
           </div>           
           <div class="col-md-9">               
               <div class="box">                   
                   <?php                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }                   
                   ?>                   
                   <?php                   
                   if (isset($_GET['pay_offline'])){
                       include("pay_offline.php");
                   }                   
                   ?>
                   <?php                   
                   if (isset($_GET['send_order'])){
                       include("send_order.php");
                   }                   
                   ?>                   
                   <?php                   
                   if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }                   
                   ?>                   
                   <?php                   
                   if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }                   
                   ?>                   
                   <?php                   
                   if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }                   
                   ?>  
                   <?php                   
                   if (isset($_GET['rating'])){
                       include("rating.php");
                   }                   
                   ?>                 
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
<?php } ?>