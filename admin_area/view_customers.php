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
               
                   <i class="fa fa-tags"></i>  Pelanggan
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Nama: </th>
                                <th> Foto: </th>
                                <th> Email: </th>
                                <th> Alamat: </th>
                                <th> Kota: </th>
                                <th> Kode Pos: </th>
                                <th> Kontak: </th>
                                <th> Hapus: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_c = "select * from customers";
                                
                                $run_c = mysqli_query($con,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['customer_id'];
                                    
                                    $c_name = $row_c['customer_name'];
                                    
                                    $c_img = $row_c['customer_image'];
                                    
                                    $c_email = $row_c['customer_email'];
                                    
                                    $c_country = $row_c['customer_country'];
                                    
                                    $c_city = $row_c['customer_city'];
                                    
                                    $c_address = $row_c['customer_address'];
                                    
                                    $c_contact = $row_c['customer_contact'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $c_name; ?> </td>
                                <td> <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $c_email; ?> </td>
                                <td> <?php echo $c_address ?> </td>
                                <td> <?php echo $c_country; ?></td>
                                <td> <?php echo $c_city; ?> </td>
                                <td> <?php echo '+'.$c_contact; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_customer=<?php echo $c_id; ?>" onclick = "if (! confirm('Ingin menghapus pelanggan?')) { return false; }">
                                     
                                        <i class="fa fa-trash-o"></i> Hapus
                                    
                                     </a> 
                                     
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>