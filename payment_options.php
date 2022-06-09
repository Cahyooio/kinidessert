<div class="box">   
   <?php     
    $session_email = $_SESSION['customer_email'];    
    $select_customer = "select * from customers where customer_email='$session_email'";    
    $run_customer = mysqli_query($con,$select_customer);    
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
    </div>           
           <div class="col-md-12">               
               <div class="card">                   
                   <div class="box-header">                  
                    <center>
                    <p class="lead">                   
                    <button class="myBtn_multi btn-block"> <h3> Lakukan pemesanan</h3> </button>                        
                    </p>             
                    <p class="lead">  
                        <button onClick="location.href='shop.php'" class="btn-block"> <h3> Kembali belanja</h3> </button>                            
                        </a>                        
                    </p>                        
                    </center>
                     <div class="modal modal_multi">
<div class="modal-content">
<span class="close close_multi">×</span>
    <h1 align="center"> Pilih Alamat </h1>
    <h5 align="center"> Untuk mengisi/mengubah alamat 2 silahkan ke ubah akun. </h5>    
<form action="order.php?c_id=<?php echo $customer_id ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >Alamat Lengkap</label>
      <input type="text" class="form-control" value="<?php echo $customer_address?>" readonly>
    </div>
    <div class="form-group col-md-6">
    <label >Alamat Lengkap 2</label>
      <input type="text" class="form-control" value="<?php echo $customer_address2?>" readonly>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label >Kota</label>
    <input type="text" class="form-control" value="<?php echo $customer_country?>" readonly>
  </div>
  <div class="form-group">
  <div class="form-group col-md-6">
  <label >Kota 2</label>
    <input type="text" class="form-control" value="<?php echo $customer_country2?>" readonly>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label >Address</label>
    <input type="text" class="form-control" value="<?php echo $customer_city?>" readonly>
  </div>
  <div class="form-group">
  <div class="form-group col-md-6">
  <label >Address 2</label>
    <input type="text" class="form-control" value="<?php echo $customer_city2?>" readonly>
  </div>
  </div>
  <button method="post" name="alamat1" class="btn btn-primary btn-sm">Alamat 1</button>
  <button method="post" name="alamat2" class="btn btn-primary btn-sm pull-right">Alamat 2</button>
  </div>
</div>
</div>
</form>
                   </div>                   
               </div>              
           </div>    
</div>
<script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  document.getElementById("myImg");
}
        var modalparent = document.getElementsByClassName("modal_multi"); 
        var modal_btn_multi = document.getElementsByClassName("myBtn_multi");
        var span_close_multi = document.getElementsByClassName("close_multi");
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
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("myBtn");
        var span = modal.getElementsByClassName("close_multi")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
</script>