<?php 

include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

        


?>

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Pesanan Pelanggan
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Nama: </th>
                                <th> ID Pesanan: </th>
                                <th> Foto: </th>
                                <th> Nama Produk: </th>
                                <th> Jumlah Produk: </th>
                                <th> Ukuran Produk: </th>
                                <th> Tanggal Pesanan: </th>
                                <th> Alamat Pengiriman: </th>
                                <th> Jumlah Harga: </th>
                                <th> Status: </th>
                                <th> Hapus: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                        <?php 
          
          $i=0;
      
          $get_orders = "select * from customer_orders";
          
          $run_orders = mysqli_query($con,$get_orders);

          while($row_order=mysqli_fetch_array($run_orders)){
              
              $order_id = $row_order['order_id'];
              
              $c_id = $row_order['customer_id'];
              
              $invoice_no = $row_order['invoice_no'];
              
              $product_id = $row_order['product_id'];
              
              $qty = $row_order['qty'];
              
              $size = $row_order['size'];
              
              $order_status = $row_order['order_status'];

              $tujuan = $row_order['tujuan'];
              
              $get_products = "select * from products where product_id='$product_id'";
              
              $run_products = mysqli_query($con,$get_products);
              
              $row_products = mysqli_fetch_array($run_products);
              
              $product_title = $row_products['product_title'];

              $product_img1 = $row_products['product_img1'];
              
              $get_customer = "select * from customers where customer_id='$c_id'";
              
              $run_customer = mysqli_query($con,$get_customer);
              
              $row_customer = mysqli_fetch_array($run_customer);
              
              $customer_email = $row_customer['customer_email'];
 
              if($tujuan == "alamat1"){

                $customer_address = $row_customer['customer_address'];

              }if($tujuan == "alamat2"){

                $customer_address = $row_customer['customer_address2'];

              }              
                    
              $get_c_order = "select * from customer_orders where order_id='$order_id'";
              
              $run_c_order = mysqli_query($con,$get_c_order);
              
              $row_c_order = mysqli_fetch_array($run_c_order);
              
              $order_date = $row_c_order['order_date'];
              
              $order_amount = $row_c_order['due_amount'];
             
              
              $i++;
      
      ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $customer_email; ?> </td>
                                <td> <?php echo $invoice_no; ?></td>
                                <td> <img src="product_images/<?php echo $product_img1; ?>" width="60" height="60"></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $customer_address; ?> </td>
                                <td> Rp<?php echo number_format($order_amount,0,',','.') ?> </td>
                                <td>
                                    
                                    <?php 
                                    
                                        if($order_status=='pending'){
                                            
                                            echo $order_status='Belum Bayar';
                                            
                                        }else{
                                            
                                            echo $order_status='Terbayar';
                                            
                                        }
                                    
                                   $product_name = $product_title;
                                   ?>
                                    
                                </td>
                                <td> 
                                     
                                     <a href="index.php?delete_order=<?php echo $order_id; ?>" onclick = "if (! confirm('Ingin menghapus pesanan?')) { return false; }">
                                     
                                        <i class="fa fa-trash-o"></i> Hapus
                                    
                                     </a> 
                                     
                                </td>
                                
                                    </div>

                                </div>

                                </div></td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script>
        // Get the modal

        var modalparent = document.getElementsByClassName("modal_multi");

        // Get the button that opens the modal

        var modal_btn_multi = document.getElementsByClassName("myBtn_multi");

        // Get the <span> element that closes the modal
        var span_close_multi = document.getElementsByClassName("close_multi");

        // When the user clicks the button, open the modal
        function setDataIndex() {

            for (i = 0; i < modal_btn_multi.length; i++)
            {
                modal_btn_multi[i].setAttribute('data-index', i);
                modalparent[i].setAttribute('data-index', i);
                span_close_multi[i].setAttribute('data-index', i);
            }
        }



        for (i = 0; i < modal_btn_multi.length; i++)
        {
            modal_btn_multi[i].onclick = function() {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span_close_multi[i].onclick = function() {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "none";
            };

        }

        window.onload = function() {

            setDataIndex();
        };

        window.onclick = function(event) {
            if (event.target === modalparent[event.target.getAttribute('data-index')]) {
                modalparent[event.target.getAttribute('data-index')].style.display = "none";
            }

            // OLD CODE
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };

//XXXXXXXXXXXXXXXXXXXXXXX    Modified old code    XXXXXXXXXXXXXXXXXXXXXXXXXX

// Get the modal

        var modal = document.getElementById('myModal');

// Get the button that opens the modal
        var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
        var span = modal.getElementsByClassName("close_multi")[0]; // Modified by dsones uk

// When the user clicks on the button, open the modal

        btn.onclick = function() {

            modal.style.display = "block";
        }

// When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }



    </script>

<?php } ?>