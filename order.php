<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<?php 
if(isset($_GET['c_id'])){    
    $customer_id = $_GET['c_id'];    
}
$ip_add = getRealIpUser();
$ongkir = 10000;
$tujuan = "";
$status = "pending";
$sisa=0;
$invoice_no = mt_rand();
$select_cart = "select * from cart where ip_add='$ip_add'";
$run_cart = mysqli_query($con,$select_cart);
while($row_cart = mysqli_fetch_array($run_cart)){    
    $pro_id = $row_cart['p_id'];    
    $pro_qty = $row_cart['qty'];    
    $pro_size = $row_cart['size'];    
    $get_products = "select * from products where product_id='$pro_id'";    
    $run_products = mysqli_query($con,$get_products);    
    while($row_products = mysqli_fetch_array($run_products)){        
        $sub_total = $row_products['product_price']*$pro_qty;
        $sub_total = $sub_total + $ongkir;
        if(isset($_POST['alamat1'])){
            $tujuan = "alamat1";
        }if(isset($_POST['alamat2'])){
            $tujuan = "alamat2";
        }
        $get_size = "select * from size_product where product_id='$pro_id'";    
        $run_size = mysqli_query($con,$get_size);        
        $row_size = mysqli_fetch_array($run_size);
        $size1 = $row_size['size1'];
        $size2 = $row_size['size2'];
        $size3 = $row_size['size3'];
        $size4 = $row_size['size4'];
        $size5 = $row_size['size5'];
        if($pro_size == "39"){
            $sisa = $size1 - $pro_qty;
            $update_size = "update size_product set size1='$sisa' where product_id='$pro_id'";            
            $run_product_size = mysqli_query($con,$update_size);
        }if($pro_size == "40"){
            $sisa = $size2 - $pro_qty;
            $update_size = "update size_product set size2='$sisa' where product_id='$pro_id'";            
            $run_product_size = mysqli_query($con,$update_size);
        } if($pro_size == "41"){
            $sisa = $size3 - $pro_qty;
            $update_size = "update size_product set size3='$sisa' where product_id='$pro_id'";            
            $run_product_size = mysqli_query($con,$update_size);
        }if($pro_size == "42"){
            $sisa = $size4 - $pro_qty;
            $update_size = "update size_product set size4='$sisa' where product_id='$pro_id'";            
            $run_product_size = mysqli_query($con,$update_size);
        }if($pro_size == "43"){
            $sisa = $size5 - $pro_qty;
            $update_size = "update size_product set size5='$sisa' where product_id='$pro_id'";            
            $run_product_size = mysqli_query($con,$update_size);
        }               
        $insert_customer_order = "insert into customer_orders (customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status,review_status,tujuan) values ('$customer_id','$pro_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status','pending','$tujuan')";
        $run_customer_order = mysqli_query($con,$insert_customer_order);        
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
        $run_pending_order = mysqli_query($con,$insert_pending_order);        
        $delete_cart = "delete from cart where ip_add='$ip_add'";        
        $run_delete = mysqli_query($con,$delete_cart);        
        echo "<script>alert('Pesanan anda telah masuk, Terima kasih')</script>";        
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";        
         }    
    }  
?>