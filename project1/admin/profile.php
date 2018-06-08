
<?php require_once('includes/header.php'); 


 ?>

    <div id="wrapper">
        <?php require_once('includes/top-nav.php'); ?>
        <!-- Navigation -->
        

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Profile</h1>
                <?php 
            
                        $database    = new Database();
                        $conn        = $database->connection;
                        $data        = array('full_name','email','username','profileimg');
                        $query       = $database->getData("admin",$data);
                        $numrows     = $database->numRows($query);
                        $row         = mysqli_fetch_array($query);
                        $fullname    = $row['full_name']; 
                        $email       = $row['email'];
                        $username    = $row['username'];
                        $profileimg  = $row['profileimg'];



                       
            
            
                ?>
        
                </div>               
            </div>          
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="form-horizontal" action="#" method="POST" id="update" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="fullname" class="col-sm-4 control-label">Full Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="fullname" name='full_name' value="<?php echo $fullname;?>"/>
                            <span class="error_form" id="fullname_error_message"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="username" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="username" name='uname' value="<?php echo $username;?>" readonly>
                              <span class="error_form" id="username_error_message"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">E-mail Address </label>
                            <div class="col-sm-8">
                              <input type="email" name='email' value="<?php echo $email;?>" class="form-control" id="email"/>
                              <span class="error_form" id="email_error_message"></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">Change Password </label>
                            <div class="col-sm-8">
                              <input type="password" name='password' class="form-control" id="password">
                              <span class="error_form" id="password_error_message"></span>
                            </div>
                          </div>
                           <div class="form-group">
                                <label for="image" class="col-sm-4 control-label">profile image</label>
                                <div class="col-sm-8">
                                    <input type="file" id="image" name="upload">
                                </div>
                                
                          </div>
                          <div class="form-group">
                              <label for="image" class="col-sm-4 control-label"></label>
                              <div class="col-sm-8">
                                  <div class="form-group">
                                     <div id="success"></div>
                                 </div>  
                                </div>
                                
                          </div>
                          
                            
                          
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">

                                <?php echo $database->formtoken();?>
                                <input type="hidden" name="page" value="profile"/>
                                    <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">update profile <span class="glyphicon glyphicon-ok-sign"></span></button>
                             </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Profile Image</h3>
                    <img src="images/<?php echo $profileimg; ?>"" width='150px' height='150' class='img-responsive'>

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