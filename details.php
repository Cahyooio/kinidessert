<?php 
session_start();
$active='Shop';
include("includes/db.php");
include("functions/functions.php");
$pro_title = "";
?>
<?php 
if(isset($_GET['pro_id'])){    
    $product_id = $_GET['pro_id'];    
    $get_product = "select * from products where product_id='$product_id'";    
    $run_product = mysqli_query($con,$get_product);    
    $row_products = mysqli_fetch_array($run_product);
    $get_size = "select * from size_product where product_id='$product_id'";    
    $run_size = mysqli_query($con,$get_size);    
    $row_size = mysqli_fetch_array($run_size);
    $size1 = $row_size['size1'];
    $size2 = $row_size['size2'];
    $size3 = $row_size['size3'];
    $size4 = $row_size['size4'];
    $size5 = $row_size['size5'];    
    $pro_title = $row_products['product_title'];    
    $pro_price = $row_products['product_price'];
    $pro_sale_price = $row_products['product_sale'];    
    $pro_desc = $row_products['product_desc'];    
    $pro_img1 = $row_products['product_img1'];    
    $pro_img2 = $row_products['product_img2'];    
    $pro_img3 = $row_products['product_img3'];        
    $pro_label = $row_products['product_label'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kini Dessert</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <style>
.checked {
  color: orange;
}
</style>
</head>
<body>  
   <div id="navbar" class="navbar navbar-default">       
       <div class="container">           
           <div class="navbar-header">               
               <a href="index.php" class="navbar-brand home">                   
                   <img src="images/logo.png" width="116.77px" height="50px" alt="Bayu Logo" class="hidden-xs">
                   <img src="images/logo.png" width="116.77px" height="50px" alt="Bayu Logo Mobile" class="visible-xs">                   
               </a>               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">                   
                   <span class="sr-only">Toggle Navigation</span>                   
                   <i class="fa fa-align-justify"></i>                   
               </button>              
           </div>           
           <div class="navbar-collapse collapse" id="navigation">               
               <div class="padding-nav">                   
                   <ul class="nav navbar-nav left">                       
                   <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="index.php">Beranda</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="shop.php">Produk</a>
                       </li>
                       <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Keranjang</a>
                        </li>
                       <li class="<?php if($active=='Account') echo"active"; ?>">                           
                           <?php                            
                           if(!isset($_SESSION['customer_email'])){                               
                               echo"";                               
                           }else{                               
                              echo"<a href='customer/my_account.php'>Akun Saya</a>";                                
                           }                           
                           ?>                           
                       </li>
                       <li class="<?php if($active=='Login') echo"active"; ?>">                           
                           <?php                            
                           if(!isset($_SESSION['customer_email'])){                               
                               echo"<a href='checkout.php'>Masuk</a>";                               
                           }else{                               
                              echo"<a href='logout.php'>Keluar</a>";                                
                           }                           
                           ?>                           
                       </li>                          
                   </ul>                   
               </div>               
               <a href="cart.php" class="btn navbar-btn btn-primary right">                   
                   <i class="fa fa-shopping-cart"></i>                   
                   <span><?php items(); ?> Pesanan anda</span>                   
               </a>               
               <div class="navbar-collapse collapse right">                   
                           </span>                           
                       </div>                       
                   </form>                   
               </div>               
           </div>           
       </div>       
   </div>   
   <div id="content">
       <div class="container">        
           <div class="col-md-12">
               <div id="productMain" class="row">
                   <div class="col-sm-6">
                       <div id="mainImage">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                               <ol class="carousel-indicators">
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol>                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a>                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Next</span>
                               </a>                               
                           </div>
                       </div>                
                   </div>                   
                   <div class="col-sm-6">
                       <div class="box">
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>                           
                           <?php add_cart(); ?>                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">                             
                               <div class="form-group">
                                   <label class="col-md-5 control-label">Ukuran Produk</label>                                   
                                   <div class="col-md-7">                                       
                                       <select id="p_size" onchange="changeFunc()" name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Harus memilih 1 ukuran box!')"><!-- form-control Begin -->
                                           <option disabled selected>Pilih Ukuran</option>                                          
                                           <option value="M">M</option>
                                           <option value="L">L</option>                                                                                    
                                        </select>                                    
                                      <p class="col-md-1 control-label" ><strong> Stok:</strong>
                                                <p class="col-md-2 control-label" id="hasil"> </p></p>                                       
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label for="" class="col-md-5 control-label">Jumlah Produk</label>                                   
                                   <div class="col-md-7">
                                          <select id="p_stok" onchange="changeStok()" name="product_qty" id="" class="form-control">
                                          <option disabled selected>Pilih Jumlah</option> 
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select>                                   
                                    </div>                                   
                               </div>
                                <script>
                                            var size1 = <?php echo $size1; ?>;
                                            var size2 = <?php echo $size2; ?>; 
                                            var size3 = <?php echo $size3; ?>; 
                                            var size4 = <?php echo $size4; ?>;
                                            var size5 = <?php echo $size5; ?>;
                                        function changeFunc() { 
                                            var p_size = document.getElementById("p_size");
                                            var selectedValue = p_size.options[p_size.selectedIndex].value;
                                            var course = document.getElementById("p_size").value;                                                                                        
                                            if(selectedValue=="M"){     
                                                document.getElementById("hasil").innerHTML=size1;                                    
                                                document.getElementById("stok_size").innerHTML=size1;                                                                                            
                                            }else if(selectedValue=="L"){
                                                document.getElementById("hasil").innerHTML=size2;
                                                document.getElementById("stok_size").innerHTML=size2;
                                            }else{
                                            }                                                                                        
                                        }                                        
                                         function changeStok(){                                            
                                            var ket_stok = document.getElementById("hasil").innerHTML;
                                            var p_stok = document.getElementById("p_stok");
                                            var selectedStok = p_stok.options[p_stok.selectedIndex].value;
                                            if(selectedStok > ket_stok ){
                                            alert("Kurangi jumlah produk karena melibihi stok barang");
                                            }
                                        }
                                </script>   
                               <?php 
                               $pro_price = number_format($pro_price,0,',','.');
                               $pro_sale_price = number_format($pro_sale_price,0,',','.');
                                    if($pro_label == "sale"){
                                        echo "
                                            <p class='price'>
                                            Harga: <del> Rp $pro_price</del><br/>
                                            SALE: Rp    $pro_sale_price
                                            </p>
                                        ";
                                    }else{
                                        echo "
                                            <p class='price'>
                                            Harga: Rp $pro_price
                                            </p>
                                        ";
                                    }                               
                               ?>                               
                               <p class="text-center buttons"><button class="btn btn-info i fa fa-shopping-cart"> Tambah Ke Keranjang</button></p>  
                               <p class="text-center buttons"><a href="./lihat_rating_produk/rating.php?product_id=<?php echo $product_id; ?>" target='_blank' class="btn btn-info i fa fa-shopping-cart"> Lihat Review</a></p>                              
                           </form>                           
                       </div>                       
                       <div class="row" id="thumbs">                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a>
                           </div>                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a>
                           </div>                           
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb">
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a>
                           </div>                           
                       </div>                       
                   </div>              
               </div>               
               <div class="box" id="details">                       
                       <h3>Deskripsi Produk</h3>                   
                   <p>                       
                       <?php echo $pro_desc; ?>                       
                   </p>                   
                    <hr>                   
               </div>               
               <div id="row same-heigh-row">
                   <div class="col-md-3 col-sm-6">
                       <div class="box same-height headline">
                           <h3 class="text-center">Produk Rekomendasi</h3>
                       </div>
                   </div>                   
                   <?php   
                    $get_products = "select * from products 
                    INNER JOIN customer_orders ON products.product_id = customer_orders.product_id order by qty DESC LIMIT 0,3";
                    
                    $run_products = mysqli_query($db,$get_products);
                    
                    while($row_products=mysqli_fetch_array($run_products)){
                        
                        $pro_id = $row_products['product_id'];
                        
                        $pro_title = $row_products['product_title'];
                        
                        $pro_price = $row_products['product_price'];
                
                        $pro_sale_price = $row_products['product_sale'];
                        
                        $pro_img1 = $row_products['product_img1'];
                        
                        $pro_label = $row_products['product_label'];
                
                        $pro_price = number_format($pro_price,0,',','.')."";
                
                        $pro_sale_price = number_format($pro_sale_price,0,',','.');
                
                        $pro_sold = $row_products['qty'];
                        
                        if($pro_label == "sale"){
                
                            $product_price = " <del> Rp $pro_price </del> ";
                
                            $product_sale_price = "/ Rp $pro_sale_price ";
                
                        }else{
                
                            $product_price = "  Rp  $pro_price";
                
                            $product_sale_price = "";
                
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
                        
                        $get_review = "select avg (user_rating) as rating from review_table where product_id= '$pro_id'";
                        $select_review = mysqli_query($con,$get_review);
                        $review = mysqli_fetch_array($select_review);
                        // var_dump ($review);

                        echo "
                        
                        <div class='col-md-3 col-sm-6 center-responsive'> 
                        
                            <div class='product'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3>
                            
                                        <a href='details.php?pro_id=$pro_id'>
                
                                            $pro_title
                
                                        </a>
                                    
                                    </h3>
                                    
                                    <p class='price'>
                                    
                                    $product_price &nbsp;$product_sale_price
                                    
                                    </p>
                                    
                                    <p class='button'>
                                    
                                        <a class='btn btn-success' href='details.php?pro_id=$pro_id'>
                                            Details
                                        </a>
                                    
                                    </p>
                                
                                    <p class='sold'><b>
                        
                                        Terjual $pro_sold Produk <br> 
                                        
                                        <span class='fa fa-star ". ((intval($review['rating']) >=1) ? 'checked' : ' ')."'></span>
                                        <span class='fa fa-star ". ((intval($review['rating']) >=2) ? 'checked' : ' ')."'></span>
                                        <span class='fa fa-star ". ((intval($review['rating']) >=3) ? 'checked' : ' ')."'></span>
                                        <span class='fa fa-star ". ((intval($review['rating']) >=4) ? 'checked' : ' ')."'></span>
                                        <span class='fa fa-star ". ((intval($review['rating']) >=5) ? 'checked' : ' ')."'></span>
                
                                   </b> </p>
                                </div>
                
                          
                            
                            </div>
                        
                        </div>
                        
                        ";
                        
                    }                  
                   ?>                   
               </div>   
           </div>  
       </div>
   </div>   
   <?php     
    include("includes/footer.php");    
    ?>    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>   
</body>
</html>
