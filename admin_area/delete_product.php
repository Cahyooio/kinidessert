<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_product'])){
        
        $delete_id = $_GET['delete_product'];
        
        $delete_pro = "delete from products where product_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        $delete_size = "delete from size_product where product_id='$delete_id'";
        
        $run_delete_size = mysqli_query($con,$delete_size);        
        
        if($run_delete){
            
            echo "<script>alert('Produk berhasil dihapus!')</script>";
            
            echo "<script>window.open('index.php?view_products','_self')</script>";
            
        }
        
    }

?>

<?php } ?>