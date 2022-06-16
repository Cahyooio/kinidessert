<?php
    $active='Home';
    include("includes/header.php");
?>   
<style>
.checked {
  color: orange;
}
</style>
   <div class="container" id="slider">       
       <div class="col-md-12">           
           <div class="carousel slide" id="myCarousel" data-ride="carousel">               
               <ol class="carousel-indicators">                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                                   
               </ol>               
               <div class="carousel-inner">                  
                  <?php 
                    if(isset($_GET['deletecart'])){                                            
                    include("deletecart.php");
                    }                   
                   $get_slides = "select * from slider LIMIT 0,1";                   
                   $run_slides = mysqli_query($con,$get_slides);                   
                   while($row_slides=mysqli_fetch_array($run_slides)){                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];                       
                       echo "                       
                       <div class='item active'>                       
                           <a href='$slide_url'>
                                <img src='admin_area/slides_images/$slide_image'>
                           </a>                       
                       </div>                       
                       ";                       
                   }                   
                   $get_slides = "select * from slider LIMIT 1,3";                   
                   $run_slides = mysqli_query($con,$get_slides);                   
                   while($row_slides=mysqli_fetch_array($run_slides)){                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];                       
                       echo "                       
                       <div class='item'>                       
                           <a href='$slide_url'>
                                <img src='admin_area/slides_images/$slide_image'>
                           </a>                       
                       </div>                       
                       ";                       
                   }                   
                   ?>                   
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
   <div id="hot">       
       <div class="box">           
           <div class="container">               
               <div class="col-md-12">                   
                   <h2><b>
                       Produk Terbaru 
                       </b></h2>                   
               </div>               
           </div>           
       </div>       
   </div>   
   <div id="content" class="container">       
       <div class="row">          
          <?php            
           getPro();           
           ?>           
       </div>       
   </div>
   <!--rekomendasi --->
   <div id="hot">       
       <div class="box">           
           <div class="container">               
               <div class="col-md-12">                   
                   <h2><b>
                       Produk Rekomendasi
                       </b></h2>                   
               </div>               
           </div>           
       </div>       
   </div>   
   <div id="content" class="container">       
       <div class="row">          
          <?php            
           getRecom();           
           ?>          
       </div>       
   </div>   
   <?php     
    include("includes/footer.php");    
    ?>    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>   
</body>
</html>