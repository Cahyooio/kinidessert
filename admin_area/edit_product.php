<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $p_title = $row_edit['product_title'];
        
        $cat = $row_edit['cat_id'];

        $cat2 = $row_edit['cat2_id'];
        
        $p_image1 = $row_edit['product_img1'];
        
        $p_image2 = $row_edit['product_img2'];
        
        $p_image3 = $row_edit['product_img3'];
        
        $p_price = $row_edit['product_price'];
        
        $p_sale = $row_edit['product_sale'];
        
        $p_desc = $row_edit['product_desc'];
        
        $p_label = $row_edit['product_label'];

        $get_size = "select * from size_product where product_id='$edit_id'";

        $run_size = mysqli_query($con,$get_size);

        $row_size = mysqli_fetch_array($run_size);

        $size1 = $row_size['size1'];

        $size2 = $row_size['size2'];

        $size3 = $row_size['size3'];

        $size4 = $row_size['size4'];

        $size5 = $row_size['size5'];
        
    }              
        $get_cat = "select * from categories where cat_id='$cat'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
         
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Ubah Produk 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Nama Produk </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group form-row"><!-- form-group Begin -->
                       
                       <label class="col-md-3 control-label" > Size M </label> 
                       
                       <div class="col-md-1"><!-- col-md-6 Begin -->
                           
                           <input name="size1" type="text" class="form-control" value="<?php echo $size1; ?>" required>
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->
                    
                    <div class="form-group form-row"><!-- form-group Begin -->
                        
                       <label class="col-md-3 control-label"> Size L </label> 
                       
                       <div class="col-md-1"><!-- col-md-6 Begin -->
                           
                           <input name="size2" type="text" class="form-control" value="<?php echo $size2; ?>" required>
                           
                       </div><!-- col-md-6 Finish -->
                        
                    </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Kategori 1</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat" class="form-control"><!-- form-control Begin -->

                              <option disabled value="Select Category">Pilih Kategori</option>
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Kategori 2</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="cat2" class="form-control"><!-- form-control Begin -->

                              <option disabled value="Select Category">Pilih Kategori</option>
                              
                              <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                              
                              <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Foto Produk 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Foto Produk 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Foto Produk 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Harga Produk </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Produk Promo </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_sale" type="text" class="form-control" required value="<?php echo $p_sale; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->                   
                                      
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Deskripsi Produk </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control">
                              
                              <?php echo $p_desc; ?>
                              
                          </textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Produk Label </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_label" type="text" class="form-control" required value="<?php echo $p_label; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Ubah Produk" type="submit" class="btn btn-primary form-control">
                          
                          </div><!-- col-md-6 Finish -->
                       
                       </div><!-- form-group Finish -->
                       
                   </form><!-- form-horizontal Finish -->
                   
               </div><!-- panel-body Finish -->
                
            </div><!-- canel panel-default Finish -->
            
        </div><!-- col-lg-12 Finish -->
        
    </div><!-- row Finish -->
       
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
    </body>
    </html>
    
    
    <?php 
    
    if(isset($_POST['update'])){
        
        $product_title = $_POST['product_title'];

        $size1 = $_POST['size1'];
        $size2 = $_POST['size2'];
        $size3 = $_POST['size3'];
        $size4 = $_POST['size4'];
        $size5 = $_POST['size5'];

        $cat = $_POST['cat'];
        $cat2 = $_POST['cat2'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_desc = $_POST['product_desc'];
        $product_label = $_POST['product_label'];
    
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
    
                // work for upload / update image
            
                $product_img1 = $_FILES['product_img1']['name'];
                $product_img2 = $_FILES['product_img2']['name'];
                $product_img3 = $_FILES['product_img3']['name'];
                
                $temp_name1 = $_FILES['product_img1']['tmp_name'];
                $temp_name2 = $_FILES['product_img2']['tmp_name'];
                $temp_name3 = $_FILES['product_img3']['tmp_name'];
                
                move_uploaded_file($temp_name1,"product_images/$product_img1");
                move_uploaded_file($temp_name2,"product_images/$product_img2");
                move_uploaded_file($temp_name3,"product_images/$product_img3");

            $update_size = "update size_product set size1='$size1',size2='$size2',size3='$size3',size4='$size4',size5='$size5' where product_id='$p_id'";
            
            $run_product_size = mysqli_query($con,$update_size);

            $update_product = "update products set cat_id='$cat',cat_id='$cat2',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc',product_sale='$product_sale',product_label='$product_label' where product_id='$p_id'";
            
            $run_product = mysqli_query($con,$update_product);
            
            if($run_product){
                
            echo "<script>alert('OKE')</script>"; 
                
            echo "<script>window.open('index.php?view_products','_self')</script>"; 
                
            }
            
        }else{
    
            // work when no update image
            
            $update_product = "update products set cat_id='$cat',cat2_id='$cat2',date=NOW(),product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_sale='$product_sale',product_label='$product_label' where product_id='$p_id'";
            
            $run_product = mysqli_query($con,$update_product);

            $update_size = "update size_product set size1='$size1',size2='$size2',size3='$size3',size4='$size4',size5='$size5' where product_id='$p_id'";
            
            $run_product_size = mysqli_query($con,$update_size);
            
            if($run_product){
                
            echo "<script>alert('Barang telah diubah')</script>"; 
                
            echo "<script>window.open('index.php?view_products','_self')</script>"; 
                
            }
        }
        
    }
    
    ?>
    
    
    <?php } ?>