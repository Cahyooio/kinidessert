<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div class="panel-heading"><!--  panel-heading  Begin  -->
        
        <?php 
        
        $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email='$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_image = $row_customer['customer_image'];
        
        $customer_name = $row_customer['customer_name'];
        
        if(!isset($_SESSION['customer_email'])){
            
        }else{
            
            echo "
            
                <center>
                
                    <img src='customer_images/$customer_image' class='img-responsive' >
                
                </center>
                
                <br/>
                
                <h3 class='panel-title' align='center'>
                
                    Nama: $customer_name
                
                </h3>
            
            ";
            
        }
        
        ?>
        
    </div><!--  panel-heading Finish  -->
    
    <div class="panel-body"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
         
        <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">
                
                <a href="my_account.php?pay_offline">
                    
                    <i class="fa fa-bolt"></i> Cara Pembayaran
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_orders" onclick = "if (! alert('Jika belum melakukan pembayaran 1/24 jam,maka pemesanan akan dibatalkan.')) { return true; }">
                    
                    <i class="fa fa-list"></i> Pesanan Saya
                    
                </a>
                
            </li>           

            <li class="<?php if(isset($_GET['send_order'])){ echo "active"; } ?>">
                
                <a href="my_account.php?send_order">
                    
                    <i class="fa fa-truck"></i> Pengiriman barang
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-pencil"></i> Ubah Akun
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_pass">
                    
                    <i class="fa fa-user"></i> Ganti Kata Sandi
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-trash-o"></i> Hapus Akun
                    
                </a>
                
            </li>

            <li class="<?php if(isset($_GET['rating'])){ echo "active"; } ?>">
                
                <a href="my_account.php?rating">
                    
                    <i class="fa fa-trash-o"></i> rating Akun
                    
                </a>
                
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
        
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->