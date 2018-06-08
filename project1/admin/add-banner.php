<?php require_once('includes/header.php');  ?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once('includes/top-nav.php');


            
                                    $database    = new Database();
                                    $conn        = $database->connection;
           
         ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add A New Banner</h1>
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="add" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="banner_title" class="col-sm-4 control-label">Banner Title</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="banner_title" name='ban_title' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="banner_sub_title" class="col-sm-4 control-label">Banner Sub Title</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="banner_sub_title" name='ban_sub_title' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="ban_description" class="col-sm-4 control-label">Banner description</label>
                            <div class="col-sm-8">
                              <textarea cols="42" rows="7" name="ban_description"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="b_images" class="col-sm-4 control-label">Banner image</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" id="b_images" name='b_images' value=""/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="ban_button_url" class="col-sm-4 control-label">Banner Button Url</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="ban_button_url" name='ban_button_url' value=""/>
                            </div>
                          </div>
                          
                            <div class="form-group">
                                <div id="success"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="page" value="banner"/>
                                <?php echo $database->formtoken();?>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">Add Banner<span class="glyphicon glyphicon-ok-sign"></span></button><br/><br/>
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