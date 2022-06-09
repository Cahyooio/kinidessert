<?php 

    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  Pembayaran Pelanggan
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Nama Barang: </th>
                                <th> ID Pesanan: </th>                                
                                <th> Nama Pengirim: </th>
                                <th> Jumlah Dibayar: </th>
                                <th> Metode Pembayaran: </th>
                                <th> Metode Pengiriman: </th>
                                <th> Tanggal Pembayaran: </th>
                                <th> Bukti Pembayaran: </th>
                                <th> Aksi: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;

                                $a=6287787011457;
                                $get_payments = "select * from payments";
                                
                                $run_payments = mysqli_query($con,$get_payments);
          
                                while($row_payments=mysqli_fetch_array($run_payments)){

                                    $product_id = $row_payments['pro_id'];
                                    
                                    $payment_id = $row_payments['payment_id'];

                                    $customer_id = $row_payments['customer_id'];

                                    $order_id = $row_payments['order_id'];
                                    
                                    $invoice_no = $row_payments['invoice_no'];
                                    
                                    $amount = $row_payments['amount'];
                                    
                                    $payment_mode = $row_payments['payment_mode'];  
                                    
                                    $product_sent = $row_payments['product_sent']; 
                                    
                                    $name_tf = $row_payments['name_tf'];
                                    
                                    $payment_date = $row_payments['payment_date'];

                                    $payment_tf = $row_payments['payment_tf'];

                                    $get_products = "select * from products where product_id='$product_id'";
              
                                    $run_products = mysqli_query($con,$get_products);
                                    
                                    $row_products = mysqli_fetch_array($run_products);
                                    
                                    $product_title = $row_products['product_title'];

                                    $product_name = $product_title;

                                    $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
                                    $run_orders = mysqli_query($con,$get_orders);

                                    $get_c_order = "select * from customer_orders where order_id='$order_id'";
        
                                    $run_c_order = mysqli_query($con,$get_c_order);
                                    
                                    $row_c_order = mysqli_fetch_array($run_c_order);

                                    $order_date = $row_c_order['order_date'];
        
                                    $order_amount = $row_c_order['due_amount'];

                                    $qty = $row_c_order['qty'];

                                    $size = $row_c_order['size'];

                                    $get_contact = "select * from customers where customer_id='$customer_id'";

                                    $run_contact = mysqli_query($con,$get_contact);

                                    $row_contact = mysqli_fetch_array($run_contact);

                                    $customer_contact = $row_contact['customer_contact'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $product_name; ?> </td>
                                <td> <?php echo $invoice_no; ?> </td>
                                <td> <?php echo $name_tf; ?> </td>
                                <td> <?php echo $amount; ?></td>
                                <td> <?php echo $payment_mode; ?> </td>
                                <td> <?php echo $product_sent; ?> </td>                                
                                <td> <?php echo $payment_date; ?></td>
                                
                                <td>
                                <?php echo "<div class='container1'>
                                <img src='../customer/customer_images/$payment_tf' style='width:100%;max-width:100px';' onclick='onClick(this)' class='modal-hover-opacity'>
                                </div>";?>
                                

                                <div id="modal01" class="modal" onclick="this.style.display='none'">
                                <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <div class="modal-content">
                                    <img id="img01" style="max-width:100%">
                                </div>
                                </div></td>
                               
                                <td> <!-- Trigger/Open The Modal -->
                                <?php if ($product_sent == "Sicepat"){ echo
                                '<button class="myBtn_multi">Kirim</button>';echo" |";}else{ echo
                                '<button class="myBtn_multi">Kirim </button>'; echo" |";echo "<a href='https://wa.me/$customer_contact'> Chat Pelanggan </a>"; echo" |";}?>
                                
                                
                                                              
                                <a href="index.php?delete_payment=<?php echo $payment_id; ?>" onclick = "if (! confirm('Ingin menghapus pembayaran?')) { return false; }">
                                     
                                     <i class="fa fa-trash-o"></i> 
                                 
                                </td>
                                <!-- The Modal -->
                                <div class="modal modal_multi">

                                <div class="modal-content"><!-- box Begin -->
                                <span class="close close_multi">×</span>
                                
                                    <h1 align="center"> Kirim Resi ke Pelanggan </h1>
                                    
                                    <form action="index.php?view_payments" method="post" enctype="multipart/form-data"><!-- form Begin -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label> ID Pesanan: </label>
                                            
                                            
                                            <input type="text" class="form-control" name="no_invoice" value='<?php echo $invoice_no ?>' readonly >
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label> Nama Barang: </label>
                                            
                                            <input type="text" class="form-control" name="product_name" value='<?php echo $product_name?>' readonly>
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label> Kurir Pengiriman: </label>
                                             
                                            <input type="text" class="form-control" name="send_eks" value="Sicepat" readonly >
                                            
                                                
                                            </select><!-- form-control Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label> Nomor Resi Pengiriman: </label>
                                            
                                            <input type="text" class="form-control" name="no_resi" required>
                                            
                                        </div><!-- form-group Finish -->                                        
                                                                                
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label> Tanggal Pengiriman: </label>
                                            
                                            <input type="date" class="form-control" name="date" required>
                                            
                                        </div><!-- form-group Finish -->

                                        <input type="hidden" class="form-control" name="customer_id" value='<?php echo $customer_id?>'  >

                                        <input type="hidden" class="form-control" name="qty" value='<?php echo $qty?>'  >

                                        <input type="hidden" class="form-control" name="size" value='<?php echo $size?>'  >
                                        
                                        <input type="hidden" class="form-control" name="order_amount" value='<?php echo $order_amount?>'  >

                                        <input type="hidden" class="form-control" name="order_id" value='<?php echo $order_id?>'  >

                                        <div class="text-center"><!-- text-center Begin -->
                                            
                                            <button class="btn btn-primary btn-lg" name="send_order"><!-- tn btn-primary btn-lg Begin -->
                                                
                                                <i class="fa fa-car"></i> Kirim Ke Pelanggan
                                                
                                            </button>
                                            <button class="btn btn-primary btn-lg" name="send_cod"><!-- tn btn-primary btn-lg Begin -->
                                                
                                                <i class="fa fa-motorcycle"></i> COD
                                                
                                            </button><!-- tn btn-primary btn-lg Finish -->
                                            
                                        </div><!-- text-center Finish -->
                                        
                                    </form><!-- form Finish --></p>

                     <?php 

                       
                   
                       if(isset($_POST['send_order'])){

                        $status = "pending";

                       $no_invoice = $_POST['no_invoice'];

                       $order_id = $_POST['order_id'];
                       
                       $product_name = $_POST['product_name'];
                       
                       $send_eks = $_POST['send_eks'];
                       
                       $no_resi = $_POST['no_resi'];
                      
                       $date = $_POST['date'];

                       $customer_id =$_POST['customer_id'];

                       $qty = $_POST['qty'];

                       $size = $_POST['size'];

                       $order_amount = $_POST['order_amount'];
                       
                       $insert_resi = "insert into send_orders (no_invoice,order_id,product_name,send_eks,no_resi,date,customer_id,qty,size,order_amount,status) values ('$no_invoice','$order_id','$product_name','$send_eks','$no_resi','$date','$customer_id','$qty','$size','$order_amount','$status')";
                       
                       $run_resi = mysqli_query($con,$insert_resi);
                                              
                       if($run_resi){
                           
                           echo "<script>alert('Resi telah terkirim ke pelanggan!')</script>";
                           
                           echo "<script>window.open('index.php?view_payments','_self')</script>";
                           
                       }else{
                        echo "<script>alert('Resi sudah terkirim sebelumnya')</script>";
                           
                        echo "<script>window.open('index.php?view_payments','_self')</script>";
                       }
                       
                   }

                   if(isset($_POST['send_cod'])){

                    $status = "cod";

                   $no_invoice = $_POST['no_invoice'];

                   $order_id = $_POST['order_id'];
                   
                   $product_name = $_POST['product_name'];
                   
                   $send_eks = $_POST['send_eks'];
                   
                   $no_resi = $_POST['no_resi'];
                  
                   $date = $_POST['date'];

                   $customer_id =$_POST['customer_id'];

                   $qty = $_POST['qty'];

                   $size = $_POST['size'];

                   $order_amount = $_POST['order_amount'];
                   
                   $insert_resi = "insert into send_orders (no_invoice,order_id,product_name,send_eks,no_resi,date,customer_id,qty,size,order_amount,status) values ('$no_invoice','$order_id','$product_name','$send_eks','$no_resi','$date','$customer_id','$qty','$size','$order_amount','$status')";
                   
                   $run_resi = mysqli_query($con,$insert_resi);
                                          
                   if($run_resi){
                       
                       echo "<script>alert('Resi telah terkirim ke pelanggan!')</script>";
                       
                       echo "<script>window.open('index.php?view_payments','_self')</script>";
                       
                   }else{
                    echo "<script>alert('Resi sudah terkirim sebelumnya')</script>";
                       
                    echo "<script>window.open('index.php?view_payments','_self')</script>";
                   }
                   
               }
                  
                  ?>
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
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  document.getElementById("myImg");
}

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