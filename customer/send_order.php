<center>
    <h1> Pengiriman Barang </h1>
    <p class="text-muted">
        Jika ada yang ingin ditanyakan,Silahkan hubungi 087787011457. Layanan pelanggan kami. <strong>24/7</strong>        
    </p>    
</center>
<hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> No: </th>
                <th> ID Pesanan: </th>
                <th> Nama Barang: </th>
                <th> Kurir Pengiriman: </th>
                <th> No Resi: </th>
                <th> Tanggal Dikirim: </th>
                <th> Konfirmasi barang: </th>
               </tr>
        </thead>
        <tbody>
        <?php          
          $i=0;      
            $get_orders = "select * from send_orders";          
            $run_orders = mysqli_query($con,$get_orders);
            $customer_id = $row_customer['customer_id'];                        
            $get_orders = "select * from send_orders where customer_id='$customer_id'";            
            $run_orders = mysqli_query($con,$get_orders);
          while($row_order=mysqli_fetch_array($run_orders)){                             
            $run_customer = mysqli_query($con,$get_customer);            
            $row_customer = mysqli_fetch_array($run_customer);
            $order_id = $row_order['order_id'];              
            $no_invoice = $row_order['no_invoice'];              
            $product_name = $row_order['product_name'];
            $send_eks = $row_order['send_eks'];
            $no_resi = $row_order['no_resi'];
            $date = $row_order['date'];                
            $status = $row_order['status'];  
            $get_payments = "select * from payments where customer_id='$customer_id'";
            $run_payments = mysqli_query($con,$get_payments);
            $row_payments = mysqli_fetch_array($run_payments);
            $product_sent = $row_payments['product_sent'];            
            $i++;      
      ?>            
            <tr>                
                <th> <?php echo $i; ?> </th>                
                <td> <?php echo $no_invoice ?> </td>
                <td> <?php echo $product_name?> </td>
                <td> <?php echo $send_eks?> </td>
                <td> <?php echo $no_resi?> </td>
                <td> <?php echo $date?> </td>
                <form action="" method="post">
                <td> <input type="hidden" class="form-control" name="order_id" value='<?php echo $order_id?>'  >
                <?php                
                if($status=='pending'){
                echo ' <button class="btn btn-info btn-sm" method="post" name="update">
                        <i class="fa fa-user-md"></i> Barang Sampai                               
                           </button>';
                }elseif($status=='cod'){
                echo 'Kami akan segera menghubungi anda dengan Whatsapp';
                }else{
                echo 'Barang telah diterima';
                    }
                ?>                     
                </td>
          </form>                
                <?php                    
                   if(isset($_POST['update'])){
                    $order_id = $_POST['order_id'];                        
                    $complete = "Complete";                    
                    $update_status = "update send_orders set status='$complete' where order_id='$order_id '";                    
                    $run_status = mysqli_query($con,$update_status);                    
                    if($run_status){                        
                        echo "<script>alert('Terimakasih telah berbelanja di Kini Dessert.')</script>";                        
                        echo "<script>window.open('my_account.php?send_order','_self')</script>";                        
                    }else{
                        echo "<script>alert('Error')</script>";
                    }                    
                }
                ?>  
            </tr>            
            <?php } ?>            
        </tbody>        
    </table>    
</div>
