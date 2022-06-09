<?php 

session_start();

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
   
  
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->   
       <div class="container"><!-- container Begin -->     
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home fixed-top" ><!-- navbar-brand home Begin -->
                   
                   <img src="images/logo.png" width=auto height="50px" alt="Bayu Logo" class="hidden-xs">
                   <img src="images/logo.png" width=auto height="50px" alt="Bayu Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button> 
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Beranda</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a  href="shop.php">Produk</a>
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Keranjang</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php'>Akun Saya</a>"; 
                               
                           }
                           
                           ?>
                           
                       </li>
                        <li class="<?php if($active=='Login') echo"active"; ?>">
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php'>Masuk</a>";
                               
                           }else{
                               
                              echo"<a href='logout.php'>Keluar</a>"; 
                               
                           }
                           
                           ?>
                           
                       </li> 
                       
                               
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <div href="cart.php" class="btn navbar-btn btn-primary right" ><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Pesanan anda</span>
                   
                        </div><!-- btn navbar-btn btn-primary Finish -->    
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
       
   </div><!-- navbar navbar-default Finish -->