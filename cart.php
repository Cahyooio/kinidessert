<?php 
    $active='Cart';
    include("includes/header.php");
?>   
   <div id="content">
       <div class="container">
           <div class="col-md-12">               
               <ul class="breadcrumb">                  
                   <li>
                       Keranjang
                   </li>
               </ul>               
           </div>           
           <div id="cart" class="col-md-9">               
               <div class="box">                   
                   <form action="cart.php" method="post" enctype="multipart/form-data">                       
                       <h1>Keranjang Belanja</h1>                       
                       <?php                        
                       $ip_add = getRealIpUser();                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";                       
                       $run_cart = mysqli_query($con,$select_cart);                       
                       $count = mysqli_num_rows($run_cart);                       
                       ?>                       
                       <p class="text-muted">Kamu mempunyai <?php echo $count; ?> barang di keranjangmu</p>                       
                       <div class="table-responsive">                           
                           <table class="table">                               
                               <thead>                                   
                                   <tr>                                       
                                        <th>Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga Barang</th>
                                        <th>Ukuran</th>
                                        <th colspan="1">Hapus</th>
                                        <th colspan="2">Harga Total</th>                                       
                                   </tr>                                   
                               </thead>                               
                               <tbody>                                  
                                  <?php 
                                   $ongkir = 0;                                   
                                   $total = 0;                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){                                       
                                     $pro_id = $row_cart['p_id'];                                       
                                     $pro_size = $row_cart['size'];                                       
                                     $pro_qty = $row_cart['qty'];
                                     $pro_sale = $row_cart['p_price'];                                   
                                       $get_products = "select * from products where product_id='$pro_id'";                                       
                                       $run_products = mysqli_query($con,$get_products);                                       
                                       while($row_products = mysqli_fetch_array($run_products)){                                           
                                           $product_title = $row_products['product_title'];                                           
                                           $product_img1 = $row_products['product_img1'];                                           
                                           $only_price = $row_products['product_price'];                                           
                                           $sub_total = $pro_sale*$pro_qty;
                                           $_SESSION['pro_qty'] = $pro_qty;                                           
                                           $total += $sub_total;                                           
                                   ?>                                   
                                   <tr>                                       
                                       <td>                                           
                                           <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3a">
                                        </td>                                       
                                       <td>                                           
                                           <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>                                           
                                       </td>                                       
                                       <td>                                          
                                           <input type="text" name="quantity" data-product_id="<?php echo $pro_id; ?>" value="<?php echo $_SESSION['pro_qty']; ?>" class="quantity form-control">                                           
                                       </td>                                       
                                       <td>                                           
                                           <?php echo number_format($pro_sale,0,',','.'); ?>                                           
                                       </td>                                       
                                       <td>                                           
                                           <?php echo $pro_size; ?>                                           
                                       </td>                                       
                                       <td>                                           
                                       <center><a href="index.php?deletecart=<?php echo $pro_id; ?>" onclick = "if (! confirm('Ingin menghapus barang dari keranjang?')) { return false; }">
                                      <i class="fa fa-trash-o"></i>                                   
                                       </a></center>   
                                       </td>                                       
                                       <td>                                           
                                           Rp<?php echo number_format($sub_total,0,',','.'); ?>                                           
                                       </td>                                       
                                   </tr>                                   
                                   <?php } } ?>                                   
                               </tbody>                               
                               <tfoot>                                   
                                   <tr>                                       
                                       <th colspan="6">Total</th>
                                       <th colspan="2">Rp<?php echo number_format($total,0,',','.'); ?></th>                                       
                                   </tr>                                   
                               </tfoot>                               
                           </table>
                         </div>            
                       <div class="box-footer">                           
                           <div class="pull-left">                               
                               <a href="index.php" class="btn btn-default">                                   
                                   <i class="fa fa-chevron-left"></i> Lanjut Belanja                                   
                               </a>                               
                           </div>                           
                           <div class="pull-right">                             
                            <?php if($total == 0){                                       
                                      echo "
                                      <p class='btn btn-success' disabled>
                                       Pesan Barang <i class='fa fa-chevron-right'></i> </p>";
                                   }else{                                   
                                    echo "
                                    <a href='checkout.php' class='btn btn-success'>
                                    Pesan Barang <i class='fa fa-chevron-right'></i> </a>";
                                   }
                                   ?>     
                           </div>                           
                       </div>                       
                   </form>                   
               </div>
               <div id="row same-heigh-row">
                   <div class="col-md-3 col-sm-6">                       
                   </div>                   
                   <?php                    
                   $get_products = "select * from products order by rand() LIMIT 0,3";                   
                   $run_products = mysqli_query($con,$get_products);                   
                   while($row_products=mysqli_fetch_array($run_products)){                       
                    $pro_id = $row_products['product_id'];        
                    $pro_title = $row_products['product_title'];                    
                    $pro_price = $row_products['product_price'];            
                    $pro_sale_price = $row_products['product_sale'];                    
                    $pro_img1 = $row_products['product_img1'];                    
                    $pro_label = $row_products['product_label'];
                    $pro_price = number_format($pro_price,0,',','.');                    
                    $pro_sale_price = number_format($pro_sale_price,0,',','.');                 
                     if($pro_label == "sale"){            
                        $product_price = " <del> Rp $pro_price </del> ";            
                        $product_sale_price = "/ Rp $pro_sale_price ";            
                    }else{            
                        $product_price = "  Rp $pro_price  ";            
                        $product_sale_price = "";            
                    }
                    if($total > 1){
                        $ongkir = 10000;
                    }else{                        
                        $ongkir = 0;
                    }            
                    if($pro_label == ""){            
                    }else{            
                        $product_label = "                        
                            <a href='#' class='label $pro_label'>                            
                                <div class='theLabel'> $pro_label </div>
                                <div class='labelBackground'>  </div>                            
                            </a>                        
                        ";            
                    }                   
                 }                   
                   ?>                   
               </div>               
           </div>           
           <div class="col-md-3">               
               <div id="order-summary" class="card box">                   
                   <div class="box-header">                       
                       <h3>Ringkasan Pemesanan</h3>                       
                   </div>                   
                   <p class="card-text">                       
                   Pengiriman dan biaya tambahan dihitung berdasarkan nilai yang telah Anda masukkan                       
                   </p>                   
                   <div class="table-responsive">                       
                       <table class="table">                           
                           <tbody>                               
                               <tr>                                   
                                   <td> Total Harga Seluruh Barang </td>
                                   <th> Rp<?php echo number_format($total,0,',','.'); ?> </th>                                   
                               </tr>                               
                               <tr>                                   
                                   <td> Ongkos Kirim </td>
                                   <th> Rp<?php echo number_format($ongkir,0,',','.'); ?> </th>                                   
                               </tr>                               
                               <tr class="total">                                   
                                   <td> Total </td>
                                   <th> Rp<?php echo number_format($total+=$ongkir,0,',','.'); ?> </th>                                   
                               </tr>                               
                           </tbody>                           
                       </table>                       
                   </div>                   
               </div>              
           </div>           
       </div>
    </div>   
   
   <?php     
    include("includes/footer.php");    
    ?>    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script>    
       $(document).ready(function(data){
           $(document).on('keyup','.quantity',function(){
                var id = $(this).data("product_id");
                var quantity = $(this).val();
                if(quantity !=''){
                    $.ajax({
                        url: "change.php",
                        method: "POST",
                        data:{id:id, quantity:quantity},
                        success:function(){
                            $("body").load("cart_body.php");
                        }
                    });
                }
           });
       });    
    </script>   
</body>
</html>