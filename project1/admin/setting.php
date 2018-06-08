<?php 
  require_once('includes/header.php'); 
?>

    <div id="wrapper">
        <?php require_once('includes/top-nav.php'); ?>
        <!-- Navigation -->
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Site Setting</h1>
                    <?php 
                              $database    = new Database();
                              $conn        = $database->connection;
                              $data        = array('phone','email','facebook','twitter','linkedin','google','logo','copyright');
                              $query       = $database->getData("setting",$data);
                              $numrows     = $database->numRows($query);
                              $row         = mysqli_fetch_array($query);
                              $phone       = $row['phone']; 
                              $email       = $row['email'];
                              $facebook    = $row['facebook'];
                              $twitter     = $row['twitter'];
                              $linkedin    = $row['linkedin'];
                              $google      = $row['google'];
                              $logo        = $row['logo'];
                              $copyright   = $row['copyright'];
                      ?>
        
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="update" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="Phone" class="col-sm-4 control-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="Phone" name='phone' value="<?php echo $phone;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">E-mail</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="email" name='email' value="<?php echo $email;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="facebook" class="col-sm-4 control-label">facebook</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="facebook" name='facebook' value="<?php echo $facebook;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="twitter" class="col-sm-4 control-label">twitter</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="twitter" name='twitter' value="<?php echo $twitter;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="linkedin" class="col-sm-4 control-label">linkedin</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="linkedin" name='linkedin' value="<?php echo $linkedin;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="fullname" class="col-sm-4 control-label">google</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="google" name='google' value="<?php echo $google;?>"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="logo" class="col-sm-4 control-label">logo</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" name='logo'/>

                            </div>

                          </div>
                          <div class="form-group">
                            <label for="copyright" class="col-sm-4 control-label">Copyright</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="copyright" name='copyright' value="<?php echo $copyright;?>"/>
                            </div>
                            <div class="form-group">
                                <div id="success"></div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="page" value="setting"/>
                                <?php echo $database->formtoken();?>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">update profile <span class="glyphicon glyphicon-ok-sign"></span></button>
                             </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Logo</h3>
                    <img src="images/logo/<?php echo $logo; ?>"" width='150px' height='150' class='img-responsive'>

                </div>             
            </div>          
        </div>
    </div>
    <!-- /#wrapper -->
    <?php
        require_once('includes/js.php');
        

    ?>


        <script type='text/javascript'>
            $('#update').submit(function(e){
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
                        $('#message').html('loading.....');
                    },
                    success : function(result){
                        $('#message').html(result);
                    }


                });
            });
        </script>
    <?php

        require_once('includes/footer.php');
    ?>