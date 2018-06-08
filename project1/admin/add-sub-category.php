<?php require_once('includes/header.php'); 


 ?>

    <div id="wrapper">
        <?php require_once('includes/top-nav.php'); ?>
        <!-- Navigation -->
        

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Sub Category</h1>
            <?php 
            
                        $database    = new Database();
                        $conn        = $database->connection;
            ?>
        
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="add">
                          <div class="form-group">
                                <label for="p_category" class="col-sm-4 control-label">Product Category</label>
                                <div class="col-sm-8">
                                <select name="cat_name"  class="form-control p_category">
                                <option value="">--select sub category--</option>
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
                         <div class="form-group">
                            <label for="sub_name" class="col-sm-4 control-label">Sub Category</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="sub_name" name='sub_name' value=""/>
                            </div>
                          </div>

                            <div class="form-group">
                                <div id="success"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="page" value="sub_category"/>
                                <?php echo $database->formtoken();?>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">Add Sub Category<span class="glyphicon glyphicon-ok-sign"></span></button>
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


        <script type='text/javascript'>
            $('#add').submit(function(e){
                e.preventDefault();
                 //alert(1);
                //var data = $('#update').serialize();
                var data = new FormData(this);

                //alert(1);
                $.ajax({
                    type: 'POST',
                    url: 'add.php',
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