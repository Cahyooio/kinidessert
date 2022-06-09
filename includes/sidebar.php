<?php 

$aMan = array();
$aCat = array();
$aPcat = array();

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

    foreach($_REQUEST['cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aCat[(int)$sVal] = (int)$sVal;

        }

    }

}

?>

<div class="panel panel-danger sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">
            Kategori

            <div class="pull-right">
            
                <a href="JavaScript:Void(0);" style="color:black;">
                
                <font color="white"> <span class="nav-toggle hide-show ">
                    
                        Hide
                    
                    </span></font>
                
                </a>
            
            </div>

        </h3>
    </div>

    <div class="panel-collapse collapse-data">
    
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-cat" data-action="filter" placeholder="Filter kategori">

                    <a class="input-group-addon">
                    
                        <i class="fa fa-search"></i>
                        
                    </a>

            </div>
            </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-cat">
                
                <?php 
                               
                $get_cat = "select * from categories";
                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat=mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    $cat_image = $row_cat['cat_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";
                                
                                if(isset($aCat[$cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>

                                <span>
                                $cat_image
                                $cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                ?>
                
            </ul>
        </div>

    </div>
    
</div>

