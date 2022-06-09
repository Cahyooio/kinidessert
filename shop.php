<?php 
    $active='Shop';
    include("includes/header.php");
?>   
   <div id="content">
       <div class="container">
           <div class="col-md-12">               
               <ul class="breadcrumb">                   
                   <li>
                       Produk
                   </li>
               </ul>               
           </div>           
           <div class="col-md-3">   
   <?php     
    include("includes/sidebar.php");    
    ?>                
           </div>           
           <div class="col-md-9">
                <div class='box'>
                    <h1>Kini Dessert Katalog</h1>
                    <p>
                       <h5> Pilih rasa favorite mu dan nikmati bersama orang spesial.</h5>
                    </p>
                </div>               
               <div id="products" class="row">
                    <?php getProducts(); ?>               
               </div>               
               <center>
                   <ul class="pagination">
                        <?php getPaginator(); ?>
                   </ul>
               </center>               
           </div>
           <div id="wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;"></div>           
       </div>
   </div>   
   <?php     
    include("includes/footer.php");    
    ?>    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script>    
        $(document).ready(function(){
            $('.nav-toggle').click(function(){                
                $('.panel-collapse,.collapse-data').slideToggle(700,function(){
                    if($(this).css('display')=='none'){
                        $(".hide-show").html('Show');
                    }else{
                        $(".hide-show").html('Hide');
                    }
                });
            });
            $(function(){
                $.fn.extend({
                    filterTable: function(){
                        return this.each(function(){
                            $(this).on('keyup', function(){
                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');
                                if(search == ''){
                                    rows.show();
                                }else{
                                    rows.each(function(){
                                        var $this = $(this);
                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                    });
                                }
                            });
                        });
                    }
                });
                $('[data-action="filter"][id="dev-table-filter"]').filterTable();
            });
        });    
    </script>
    <script>    
        $(document).ready(function(){
            function getProducts(){
                var sPath = '';
                var aInputs = $('li').find('.get_manufacturer');
                var aKeys = Array();
                var aValues = Array();
                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });
                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'man[]=' + aKeys[i]+'&';
                    }
                }
                var aInputs = Array();
                var aInputs = $('li').find('.get_cat');
                var aKeys = Array();
                var aValues = Array();
                iKey = 0;
                $.each(aInputs, function(key, oInput){
                    if(oInput.checked){
                        aKeys[iKey] = oInput.value
                    };
                    iKey++;
                });
                if(aKeys.length>0){
                    var sPath = '';
                    for(var i = 0; i < aKeys.length; i++){
                        sPath = sPath + 'cat[]=' + aKeys[i]+'&';
                    }
                }
                $('#wait').html('<img src="images/load.gif"');
                $.ajax({
                    url:"load.php",
                    method:"POST",
                    data: sPath+'sAction=getProducts',
                    success:function(data){
                        $('#products').html('');
                        $('#products').html(data);
                        $('#wait').empty();
                    }
                });
                $.ajax({
                    url:"load.php",
                    method:"POST",
                    data: sPath+'sAction=getPaginator',
                    success:function(data){
                        $('.pagination').html('');
                        $('.pagination').html(data);
                    }
                });
            }
            $('.get_manufacturer').click(function(){
                getProducts();
            });
            $('.get_cat').click(function(){
                getProducts();
            });
        });    
    </script>   
</body>
</html>