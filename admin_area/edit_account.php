<?php 
$customer_session = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$customer_session'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_country = $row_customer['customer_country'];
$customer_country2 = $row_customer['customer_country2'];
$customer_city = $row_customer['customer_city'];
$customer_city2 = $row_customer['customer_city2'];
$customer_contact = $row_customer['customer_contact'];
$customer_address = $row_customer['customer_address'];
$customer_address2 = $row_customer['customer_address2'];
$customer_image = $row_customer['customer_image'];
?>
<h1 align="center"> Ubah Akun Anda </h1>
<form action="" method="post" enctype="multipart/form-data">    
    <div class="form-group">
        <label> Nama: </label>        
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>        
    </div>
    <div class="form-group">
        <label> Email: </label>        
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>        
    </div>
    <div class="form-group">        
        <label> Nomor Handphone: </label>        
        <input type="text" placeholder="6287718xxxxx" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>        
    </div>
    <div class="form-group">
        <label> Foto: </label>        
        <input type="file" name="c_image" class="form-control form-height-custom" >        
        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Costumer Image" style='width:100%;max-width:100px'>       
    </div>    
    <h3><strong>  Alamat Pertama </strong></h3>
    <br>       
    <div class="form-group">
        <label> Alamat lengkap: </label>        
        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>        
    </div>
    <div class="form-group pull-center">        
        <label> Kota: </label>  <select name="c_country" class="form-control" required>
                              <option value="" disabled selected><?php echo $customer_country; ?></option>
                              <option> Jakarta </option>
                              <option> Bogor </option>
                              <option> Depok </option>
                              <option> Tanggerang </option>
                              <option> Bekasi </option>
                                                          
                          </select>      
        
               
    </div>
    <div class="form-group pull-center">        
        <label> Kode Pos: </label>        
        <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>        
    </div>
    <div class="form-group">  
                               <label><h3><strong>Alamat Kedua</strong></h3></label>                                
                               <label>(Isi jika diperlukan)</label>                               
    </div>
    <div class="form-group">
        <label> Alamat lengkap 2: </label>        
        <input type="text" name="c_address2" class="form-control" value="<?php echo $customer_address2; ?>" >        
    </div>
    <div class="form-group pull-center">        
        <label> Kota 2: </label>  <select name="c_country2" class="form-control" required>
                              <option value="" disabled selected><?php echo $customer_country2; ?></option>
                              <option> Jakarta </option>
                              <option> Bogor </option>
                              <option> Depok </option>
                              <option> Tanggerang </option>
                              <option> Bekasi </option>
                                                          
                          </select>      
        
               
    </div>
    <div class="form-group">        
        <label> Kode Pos 2: </label>        
        <input type="text" name="c_city2" class="form-control" value="<?php echo $customer_city2; ?>" >        
    </div>
    <div class="text-center">        
        <button name="update" class="btn btn-info">            
            <i class="fa fa-user-md"></i> Ubah Sekarang            
        </button>
    </div>
</form>
<?php 
if(isset($_POST['update'])){    
    $update_id = $customer_id;    
    $c_name = $_POST['c_name'];    
    $c_email = $_POST['c_email'];    
    $c_country = $_POST['c_country'];
    $c_country2 = $_POST['c_country2'];    
    $c_city = $_POST['c_city'];
    $c_city2 = $_POST['c_city2'];    
    $c_address = $_POST['c_address'];
    $c_address2 = $_POST['c_address2'];    
    $c_contact = $_POST['c_contact'];    
    $c_image = $_FILES['c_image']['name'];    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");    
    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_country2='$c_country2',customer_city='$c_city',customer_city2='$c_city2',customer_address='$c_address',customer_address2='$c_address2',customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id' "; 
    $run_customer = mysqli_query($con,$update_customer);    
    if($run_customer){        
        echo "<script>alert('Akun anda telah diedit, untuk menyelesaikan proses silahkan login ulang')</script>";        
        echo "<script>window.open('logout.php','_self')</script>";        
    }    
}
?>