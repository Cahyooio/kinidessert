<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Tentang Kami</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="https://instagram.com/kinidessert" class="fa fa-instagram"> Kini Dessert</a></li>
                    
                </ul><!-- ul Finish -->
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Bantuan</h4>
                
                <ul><!-- ul Begin -->
                <li><a href="my_account.php?pay_offline">Cara Pembayaran</a></li>

                <li><a href="https://wa.me/6287787011457">Komplain dan Pertanyaan</a></li>
                    
                
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
            <h4>Bagian Pengguna</h4>
                
                <ul><!-- ul Begin -->
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='../checkout.php'>Masuk</a>";
                               
                           }else{
                               
                              echo"<a href='my_account.php?my_orders'>Akun Saya</a>"; 
                               
                           }
                           
                           ?>
                    
                    <li><a href="../customer_register.php">Buat Akun</a></li>
                   
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Metode Pembayaran</h4>
                
                <p class="text-muted">
                <img src="images/bri.png"img style="width: 64px;">                
                </p>                
                <hr>                
                <h4>Metode Pengiriman</h4>                
                <p class="social">
                <img src="images/sicepat.png"img style="width: 120px;">
                </p>
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-left">&copy; 2021 Bayu Collection.</p>
            
        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-right"><img src="images/logowhite.png" width="auto" height="30px" alt="QQ Logo" class="hidden-xs"></a></p>
            
        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->