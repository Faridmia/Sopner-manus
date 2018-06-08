<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a new Product</h1>
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="add" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="p_name" class="col-sm-4 control-label">Product Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_name" name='p_name' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_description" class="col-sm-4 control-label">Product description</label>
                            <div class="col-sm-8">
                              <textarea cols="42" rows="7" name="p_description"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_images" class="col-sm-4 control-label">product image</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="p_images" name='p_images' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_web_id" class="col-sm-4 control-label">Product web id</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_web_id" name='p_web_id' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_price" class="col-sm-4 control-label">Product Price</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_price" name='p_price' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_qnt" class="col-sm-4 control-label">Product Quantity</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="p_qnt" name='p_qnt' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="p_availability" class="col-sm-4 control-label">Product Availability</label>
                            <div class="col-sm-8">
                              <select name="p_availability" id="p_availability" class="form-control">
                                <option value="">--select--</option>
                                <option value="1">In Stock</option>
                                <option value="2">Out of Stock</option>
                              </select>

                            </div>

                          </div>
                          <div class="form-group">
                            <label for="p_condition" class="col-sm-4 control-label">Product Condition</label>
                            <div class="col-sm-8">
                                <select name="p_condition" id="p_condition" class="form-control">
                                <option value="">--select--</option>
                                <option value="1">New</option>
                                <option value="2">Used</option>
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
                                        $b_id    = (int) $row['b_id'];
                                        $b_name  = $row['b_name'];
                                        echo "<option value='$b_id'>$b_name</option>";
                                    }

                                ?>
                                </select>
                            </div> 
                          </div>
                          <div class="form-group">
                                <label for="p_category" class="col-sm-4 control-label">Product Category</label>
                                <div class="col-sm-8">
                                <select name="p_category"  class="form-control p_category">
                                <option value="">--select category--</option>
                                <?php
                                    $database    = new Database();
                                    $data        = array('cat_id','cat_name');
                                    $query       = $database->getData("categories",$data);

                                    while($row = mysqli_fetch_array($query)){
                                        $cat_id    = (int) $row['cat_id'];
                                        $cat_name  = $row['cat_name'];
                                        echo "<option value='$cat_id'>$cat_name</option>";
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
                                <input type="hidden" name="page" value="product"/>
                                <?php echo $database->formtoken();?>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">Add Product<span class="glyphicon glyphicon-ok-sign"></span></button><br/><br/>
                             </div>
                        </div>
                    </form>

                
                </div>             
            </div>          
        </div>
    </div>
    <!-- /#wrapper -->
    <?php
        require_once('includes/js.php');
    ?>
        <script type="text/javascript">
            
            $(".p_category").on('change',function(e){

                var pCatId = $('.p_category').val();

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

            $('#add').submit(function(e){
                e.preventDefault();
                 //alert(1);
                //var data = $('#update').serialize();
                var data = new FormData(this);

                //alert(1);
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
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