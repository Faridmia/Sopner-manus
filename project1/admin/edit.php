<?php 
    require_once('includes/header.php');  
?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php 
            require_once('includes/top-nav.php');
            require_once('functions.php');
          ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product</h1>
    <?php
        $database    = new Database();
        $conn        = $database->connection;
        $pid         = (int) $_GET['pid'];
        $data        = array('p_id','p_name','p_description','p_price','p_availability','p_qnt','p_web_id','p_images','cat_id','sub_id','b_id','p_condition');
        $query       = $database->getData("products",$data,"p_id",'=',"$pid");
        $numrows     = $database->numRows($query);
        if($numrows > 0){
            
            $row            = mysqli_fetch_array($query);
            $b_id           = escape($row['b_id']);
            $p_id           = escape($row['p_id']);  
            $p_name         = escape($row['p_name']);
            $p_images       = escape($row['p_images']); 
            $p_description  = escape($row['p_description']);
            $p_web_id       = escape($row['p_web_id']);
            $p_price        = escape($row['p_price']);
            $p_qnt          = escape($row['p_qnt']);
            $p_availability = escape($row['p_availability']);
            //$p_images       = $_FILES['p_images']['name'];
            $p_condition    = escape($row['p_condition']);
            
            $cat_id         = escape($row['cat_id']);
            $sub_id         = escape($row['sub_id']);
            
    ?>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="update" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="p_name" class="col-sm-4 control-label">Product Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_name" name='p_name' value="<?php echo $p_name;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_description" class="col-sm-4 control-label">Product description</label>
                            <div class="col-sm-8">
                              <textarea cols="42" rows="7" name="p_description" ><?php echo $p_description;?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_images" class="col-sm-4 control-label">Change Product Image</label>
                            <div class="col-sm-8">
                                <img src="<?php echo "../images/products/$p_images";?>" alt="" class='img-responsive' width="100px"><br/>
                              <input type="file" class="form-control" id="p_images" name='p_images' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_web_id" class="col-sm-4 control-label">Product web id</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_web_id" name='p_web_id' value="<?php echo $p_web_id;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_price" class="col-sm-4 control-label">Product Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_price" name='p_price' value="<?php echo $p_price;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_qnt" class="col-sm-4 control-label">Product Quantity</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_qnt" name='p_qnt' value="<?php echo $p_qnt;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_availability" class="col-sm-4 control-label">Product Availability</label>
                            <div class="col-sm-8">
                              <select name="p_availability" id="p_availability" class="form-control">
                                <option value="">--select--</option>
                                <option value="1" <?php if($p_availability == 1) echo 'selected = "selected"' ?>>In Stock</option>
                                <option value="2" <?php if($p_availability == 2) echo 'selected = "selected"' ?>>Out of Stock</option>
                              </select>

                            </div>

                          </div>
                          <div class="form-group">
                            <label for="p_condition" class="col-sm-4 control-label">Product Condition</label>
                            <div class="col-sm-8">
                                <select name="p_condition" id="p_condition" class="form-control">
                                <option value="">--select--</option>
                                <option value="1" <?php if($p_condition == 1) echo 'selected = "selected"' ?>>New</option>
                                <option value="2" <?php if($p_condition == 2) echo 'selected = "selected"' ?>>Used</option>
                              </select>
                            </div>
                         </div>
                            <div class="form-group">
                                <label for="p_brand" class="col-sm-4 control-label">Product Brand</label>
                                <div class="col-sm-8">
                                <select name="p_brand" id="p_brand" class="form-control">
                                <option value="">--select brand--</option>
                                <?php
                                    $database    = new Database();
                                    $conn        = $database->connection;
                                    $data        = array('b_id','b_name');
                                    $query       = $database->getData("brand",$data);

                                    while($row = mysqli_fetch_array($query)){
                                        $b_db_id    = (int) $row['b_id'];
                                        $b_name  = $row['b_name'];
                                        if($b_id == $b_db_id){
                                            $sel = 'selected = "selected" ';
                                        }
                                        else
                                        {
                                            $sel = '';
                                        }
                                        echo "<option  $sel value='$b_db_id'>$b_name</option>";
                                    }

                                ?>
                                </select>
                            </div> 
                          </div>
                          <div class="form-group">
                                <label for="p_category" class="col-sm-4 control-label">Product Category</label>
                                <div class="col-sm-8">
                                <select name="p_category" class="form-control p_category">
                                <option value="">--select category--</option>
                                <?php
                                    $database    = new Database();
                                    $conn        = $database->connection;
                                    $data        = array('cat_id','cat_name');
                                    $query       = $database->getData("categories",$data);

                                    while($row = mysqli_fetch_array($query)){
                                        $cat_db_id    = (int) $row['cat_id'];
                                        $cat_name     = $row['cat_name'];
                                        if($cat_id == $cat_db_id){
                                            $sel1 = 'selected = "selected"';
                                        }
                                        else
                                        {
                                            $sel1 = '';
                                        }

                                        echo "<option $sel1 value='$cat_db_id'>$cat_name</option>";
                                    }

                                ?>
                                </select>
                            </div> 
                         </div>
                            <div class="p_sub_category"></div>
                            <div class="form-group">
                                <div id="success"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                
                                <?php echo $database->formtoken();?>
                                <input type="hidden" name="pid" value="<?php echo $pid;?>"/>
                                <input type="hidden" name="page" value="product"/>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">Edit Product<span class="glyphicon glyphicon-ok-sign"></span></button><br/><br/>
                             </div>
                        </div>
                    </form>

                
                </div>             
            </div>          
        


    <?php

        }
        else
        {
            echo "<div class='alert alert-danger'>No! Product found it</div>";
        }

    ?>
                </div>               
            </div>          
            
        </div>
    </div>
    <!-- /#wrapper -->
    <?php
        require_once('includes/js.php');
    ?>
        <script type="text/javascript">
            var exCatId = $('.p_category').val();
            var subid = <?php echo $sub_id.';';?>
            $.ajax({
                    type: 'POST',
                    url: 'get-sub-category.php',
                    dataType: 'html',
                    data: {
                        p_id : exCatId,
                        sub_id : subid, 
                    },

                    beforesend : function(){
                        $('.p_sub_category').html('loading.....');
                    },
                    success : function(result){
                        $('.p_sub_category').html(result);
                    }
                });
            
            $('#p_category').on('change',function(e){

                var pCatId = $('#p_category').val();

                //alert(1);
                $.ajax({
                    type: 'POST',
                    url: 'get-sub-category.php',
                    dataType: 'html',
                    data: {
                        p_id : pCatId, 
                    },

                    beforesend : function(){
                        $('.p_sub_category').html('loading.....');
                    },
                    success : function(result){
                        $('.p_sub_category').html(result);
                    }
                });

            });

            $('#update').submit(function(e){
                e.preventDefault();
                 //alert(1);
                //var data = $('#update').serialize();
                var data = new FormData(this);

                //alert(1);
                $.ajax({
                    type: 'POST',
                    url: 'update.php',
                    data: data,
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }


                });
            });
                


                  

            
        </script>
    <?php

        require_once('includes/footer.php');
    ?>