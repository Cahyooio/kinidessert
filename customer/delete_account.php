<center>
    <h1> Apa Anda ingin menghapus akun anda? </h1>    
    <form action="" method="post">
       <input type="submit" name="Yes" value="Ya,Ingin menghapus" class="btn btn-danger">         
       <input type="submit" name="No" value="Tidak,Tidak ingin menghapus" class="btn btn-info">         
    </form>
</center>
<?php 
$c_email = $_SESSION['customer_email'];
if(isset($_POST['Yes'])){    
    $delete_customer = "delete from customers where customer_email='$c_email'";    
    $run_delete_customer = mysqli_query($con,$delete_customer);    
    if($run_delete_customer){        
        session_destroy();        
        echo "<script>alert('Akun anda berhasil dihapus.Selamat Tinggal')</script>";        
        echo "<script>window.open('../index.php','_self')</script>";        
    }    
}
if(isset($_POST['No'])){    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";    
}
?>