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
               
                   <i class="fa fa-pencil"></i>  Laporan Penjualan
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->

    </div>
    
    <form method="post"class="form-inline">

  <label >Tanggal Awal</label>

  <input type="date" class="form-control " name="tgl_awal" required>

  <label  >Tanggal Akhir</label>

  <input type="date" class="form-control" name="tgl_akhir" required >

  <button type="submit" name="submit" class="btn btn-primary btn-sm mb-2">Tampilkan Data</button>

</form><br>
            
            <div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> No: </th>
                <th> ID Pesanan: </th>
                <th> Nama Barang: </th>
                <th> Jumlah: </th>
                <th> Size: </th>
                <th> Tanggal Penjualan: </th>
                <th> Pendapatan:</th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
     
            
        

<?php 
          
            $i=1;

            $total = 0;

            if(isset($_POST['submit'])){

            $tgl_awal = $_POST['tgl_awal'];

            $tgl_akhir= $_POST['tgl_akhir'];
      
            $get_orders = "select * from send_orders where date between '$tgl_awal' AND '$tgl_akhir' ORDER BY date";
          
            $run_orders = mysqli_query($con,$get_orders);

            }else{
                
                $get_orders = "select * from send_orders order by date ";
          
                $run_orders = mysqli_query($con,$get_orders);

            }
            

            while($row_order=mysqli_fetch_array($run_orders)){

            $no_invoice = $row_order['no_invoice'];
              
            $product_name = $row_order['product_name'];

            $qty = $row_order['qty'];

            $size = $row_order['size'];

            $date = $row_order['date'];

            $order_amount = $row_order['order_amount'];

            $status = $row_order['status'];

            $total += $order_amount 

            
      
      ?>


<tr><!--  tr Begin  -->
                <?php 

                echo '' ?>
                <th> <?php echo $i++; ?> </th>              
                <td> <?php echo $no_invoice ?> </td>
                <td> <?php echo $product_name ?> </td>
                <td> <?php echo $qty ?> </td>
                <td> <?php echo $size ?> </td>
                <td> <?php echo $date ?> </td>
                <td>Rp<?php echo number_format($order_amount,0,',','.') ?> </td>                
                </tr>
                </tr>
                
                
                <?php  } } ?>
            
            
                
                <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                   <th colspan="5"></th>
                                       <th colspan="1">Total</th>
                                       <th colspan="5">Rp<?php echo number_format($total,0,',','.'); ?></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
 </tr><!--  tr Finish  -->
 

            
           

       
            