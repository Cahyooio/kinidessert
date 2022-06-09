<?php                
               function update_cart(){
                   
                   global $con;
                   
                   if(isset($_GET['deletecart'])){
                        
                            $remove_id = $_GET['deletecart'];
                            
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                           
                           if($run_delete){

                               echo "<script>alert('Barang berhasil dihapus!')</script>";
                               
                               echo "<script>window.open('cart.php','_self')</script>";
                               
                           }
                           
                       }
                       
                   }
                   
               
              
              echo @$up_cart = update_cart();
              
              ?>