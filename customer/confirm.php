<?php 
session_start();
if(!isset($_SESSION['customer_email'])){    
    echo "<script>window.open('../checkout.php','_self')</script>";    
}else{
include("includes/db.php");
include("functions/functions.php");    
if(isset($_GET['order_id'])){    
    $order_id = $_GET['order_id'];    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Kini Dessert </title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body> 
<div id="navbar" class="navbar navbar-default">       
       <div class="container">           
           <div class="navbar-header">               
               <a href="../index.php" class="navbar-brand home">                   
                   <img src="images/logo.png" width=auto height="50px" alt="Bayu Logo" class="hidden-xs">
                   <img src="images/logo.png" width=auto height="50px" alt="Bayu Logo Mobile" class="visible-xs">                   
               </a>               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">                   
                   <span class="sr-only">Toggle Navigation</span>                   
                   <i class="fa fa-align-justify"></i>                   
               </button>              
           </div>           
           <div class="navbar-collapse collapse" id="navigation">               
               <div class="padding-nav">                   
                   <ul class="nav navbar-nav left">                       
                       <li class="">
                           <a href="../index.php">Halaman Awal</a>
                       </li>
                       <li class="">
                           <a href="../shop.php">Produk</a>
                       </li>
                       <li class="">
                           <a href="../cart.php">Keranjang</a>
                       </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">                           
                           <?php                            
                           if(!isset($_SESSION['customer_email'])){                               
                               echo"";                               
                           }else{                               
                              echo"<a href='my_account.php'>Akun Saya</a>";                                
                           }                           
                           ?>                           
                       </li>
                        <li class="">                           
                           <?php                            
                           if(!isset($_SESSION['customer_email'])){                               
                               echo"<a href='../checkout.php'>Masuk</a>";                               
                           }else{                               
                              echo"<a href='logout.php'>Keluar</a>";                                
                           }                           
                           ?>                           
                       </li> 
                       <li class="<?php if($active=='Register') echo"active"; ?>">                           
                           <?php                            
                           if(!isset($_SESSION['customer_email'])){                               
                               echo"<a href='../customer_register.php'>Buat Akun</a>";                               
                           }else{                               
                              echo"";                                
                           }                           
                           ?>   
                       </li>            
                   </ul>                   
               </div>               
               <a href="../cart.php" class="btn navbar-btn btn-primary right">                   
                   <i class="fa fa-shopping-cart"></i>                   
                   <span><?php items(); ?> Barang dikeranjang anda</span>                   
               </a>               
               <div class="navbar-collapse collapse right">                  
                           </span>                           
                       </div>            
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
    $get_orders = "select * from customer_orders where order_id='$order_id'";
    $run_orders = mysqli_query($con,$get_orders);
    while($row_order=mysqli_fetch_array($run_orders)){
        $order_id = $row_order['order_id'];              
        $c_id = $row_order['customer_id'];        
        $invoice_no = $row_order['invoice_no'];        
        $product_id = $row_order['product_id'];
        $order_date = $row_order['order_date'];        
        $order_amount = $row_order['due_amount'];        
        $qty = $row_order['qty'];        
        $size = $row_order['size'];        
        $order_status = $row_order['order_status'];        
        $get_products = "select * from products where product_id='$product_id'";        
        $run_products = mysqli_query($con,$get_products);        
        $row_products = mysqli_fetch_array($run_products);        
        $product_title = $row_products['product_title'];        
        $get_customer = "select * from customers where customer_id='$c_id'";        
        $run_customer = mysqli_query($con,$get_customer);        
        $row_customer = mysqli_fetch_array($run_customer);        
        $customer_email = $row_customer['customer_email'];
        $customer_address = $row_customer['customer_address'];
    }
    ?>               
           </div>
           <div class="col-md-9">
               <div class="box">
                   <h1 align="center"> Siliahkan Konfirmasi Pembayaran Anda</h1>                   
                   <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                         <label> ID Pesanan: </label>                          
                          <input type="text" class="form-control" name="invoice_no" value='<?php echo $invoice_no ?>' readonly>                           
                       </div>                       
                       <div class="form-group">                           
                        <label> Harga: </label>                          
                        <input type="text" class="form-control" name="amount_sent" value='Rp<?php echo number_format($order_amount,0,',','.')?>' readonly>
                        </div>                       
                        <div class="form-group">                           
                        <label> Metode Pembayaran: </label>                          
                        <input type="text" class="form-control" name="payment_mode" value='BRI' readonly>
                        </div>       
                       <div class="form-group">                           
                         <label> Pilih Metode Pengiriman:</label>                          
                          <select name="product_sent" class="form-control" required>
                              <option value="" disabled selected> Pilih Metode Pengiriman </option>
                              <option> Sicepat </option>
                              <option> COD (max. 10km) </option>
                                                          
                          </select>
                       </div>
                       <div class="form-group">
                           <label> Nama Rekening: </label>                             
                           <input type="text" class="form-control" name="name_tf" required placeholder="Nama pembayar">                              
                          </div>
                       <div class="form-group">
                         <label> Bukti Pembayaran: </label>                          
                         <input type="file" class="form-control form-height-custom" name="payment_tf" required>       
                        </div>
                       <div class="form-group">
                         <label> Tanggal Pembayaran: </label>                          
                          <input type="date" class="form-control" name="date" required>
                          <input type="hidden" class="form-control" name="cus_id" required value="<?php echo $c_id?>">
                          <input type="hidden" class="form-control" name="ord_id" required value="<?php echo $order_id ?> ">
                          <input type="hidden" class="form-control" name="prod_id" required value="<?php echo $product_id?> ">                           
                       </div>
                       <div class="text-center">
                           <button class="btn btn-info btn-lg" name="confirm_payment">
                               <i class="fa fa-user-md"></i> Konfirmasi Pembayaran                               
                           </button>                           
                       </div>
                   </form>
                   <?php                    
                    if(isset($_POST['confirm_payment'])){                        
                        $update_id = $_GET['update_id'];
                        $cus_id = $_POST['cus_id'];
                        $ord_id = $_POST['ord_id'];
                        $prod_id = $_POST['prod_id'];                        
                        $invoice_no = $_POST['invoice_no'];                        
                        $amount = $_POST['amount_sent'];                        
                        $payment_mode = $_POST['payment_mode'];
                        $product_sent = $_POST['product_sent'];
                        $name_tf = $_POST['name_tf'];                        
                        $payment_date = $_POST['date'];
                        $payment_tf = $_FILES['payment_tf']['name'];
                        $image_tmp = $_FILES['payment_tf']['tmp_name'];
                        move_uploaded_file($image_tmp,"customer_images/$payment_tf");                        
                        $complete = "Complete";                        
                        $insert_payment = "insert into payments (invoice_no,customer_id,order_id,pro_id,amount,payment_mode,product_sent,name_tf,payment_date,payment_tf) values ('$invoice_no','$cus_id','$ord_id','$prod_id','$amount','$payment_mode','$product_sent','$name_tf','$payment_date','$payment_tf')";
                        $run_payment = mysqli_query($con,$insert_payment);                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);                        
                        if($run_pending_order){                            
                            echo "<script>alert('Terimakasih atas pembelanjaan anda,orderan anda akan selesai dalam waktu 24jam.')</script>";                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";                            
                        }                        
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