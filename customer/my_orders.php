
<center>    
    <h1> Pesanan Saya </h1>  
    <p class="text-muted">
    Jika ada yang ingin ditanyakan,Silahkan hubungi 087787011457. Layanan pelanggan kami <strong>24/7.</strong>   
    </p>    
</center>
<hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> No: </th>
                <th> Nama: </th>
                <th> Harga: </th>
                <th> ID Pesanan: </th>
                <th> Jumlah: </th>
                <th> Size: </th>
                <th> Tanggal Pesan:</th>
                <th> Status: </th>
                <th> Pembayaran: </th>
                <th>Review Produk:</th>
            </tr>            
        </thead>        
        <tbody>           
           <?php             
            $customer_session = $_SESSION['customer_email'];            
            $get_customer = "select * from customers where customer_email='$customer_session'";            
            $run_customer = mysqli_query($con,$get_customer);            
            $row_customer = mysqli_fetch_array($run_customer);            
            $customer_id = $row_customer['customer_id'];            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";            
            $run_orders = mysqli_query($con,$get_orders);            
            $i = 0;            
            while($row_orders = mysqli_fetch_array($run_orders)){                
                $order_id = $row_orders['order_id'];                
                $due_amount = $row_orders['due_amount'];                
                $invoice_no = $row_orders['invoice_no'];
                $product_id = $row_orders['product_id'];                
                $qty = $row_orders['qty'];                
                $size = $row_orders['size'];                
                $order_date = substr($row_orders['order_date'],0,11);                
                $order_status = $row_orders['order_status'];
                $review_status = $row_orders['review_status']; 
                $get_products = "select * from products where product_id='$product_id'";              
                $run_products = mysqli_query($con,$get_products);                
                $row_products = mysqli_fetch_array($run_products);                
                $product_title = $row_products['product_title'];  
                             
                $i++;                
                if($order_status=='pending'){                    
                    $order_status = 'Belum Bayar';                    
                }else{                    
                    $order_status = 'Terbayar';                    
                }            
            ?>            
            <tr>                
                <th> <?php echo $i; ?> </th>
                <th> <?php echo $product_title; ?></th>
                <td> Rp<?php echo number_format($due_amount,0,',','.'); ?> </td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>                
                <td>
                <?php if($order_status=='Belum Bayar'){
                   echo  "<a href='confirm.php?order_id=$order_id' target='_blank' class='btn btn-info btn-sm'> Konfirmasi Pembayaran </a>";
                }else{
                    echo 'Sudah melakukan pembayaran';
                }
                ?>                     
                </td>    
                <td> <?php if($review_status=='pending' && $order_status =='Terbayar'){
                   echo  "<a href='../rating/rating.php?order_id=$order_id&&product_id=$product_id' target='_blank' class='btn btn-info btn-sm'> Masukkan Review </a>";
                }elseif ($review_status=='complete' && $order_status =='Terbayar'){
                    echo 'Terimakasih Telah Memberikan Review';
                }else{
                    echo 'Silahkan Melakukan Pembayaran';
                }
                ?></td>            
            </tr>            
            <?php } ?>            
        </tbody>        
    </table>    
</div>
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>