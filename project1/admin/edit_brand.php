<?php 
    require_once('includes/header.php'); 


 ?>

    <div id="wrapper">
        <?php 
            require_once('includes/top-nav.php'); 
        ?>
        <!-- Navigation -->
        

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Brand</h1>
            <?php 
            
                        $database    = new Database();
                        $conn        = $database->connection;
                        
                        $bid       = (int)$_GET['bid'];
                        $data        = array('b_id','b_name');
                        $query       = $database->getData("brand",$data,'b_id','=',$bid);
                        $fetch       = mysqli_fetch_array($query);
                        $bidDb     = $fetch['b_id'];
                        $bnameDb   = $fetch['b_name'];
            ?>
        
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="add">
                          <div class="form-group">
                            <label for="cat_name" class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="cat_name" name='b_name' value="<?php echo $bnameDb;?> "/>
                            </div>
                          </div>
                            <div class="form-group">
                                <div id="success"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="page" value="brand"/>
                                <input type="hidden" name="bid" value="<?php echo $bidDb;?>"/>
                                <?php echo $database->formtoken();?>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">Edit Brand<span class="glyphicon glyphicon-ok-sign"></span></button>
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
                    url: 'edit_process.php',
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