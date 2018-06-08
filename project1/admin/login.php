
<?php require_once('init.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>

                        <?php

                            //$object = new login();
                        ?>
                    </div>
                    <div class="panel-body">
            <?php
                     include 'functions.php';
                     $login = new login();
                     if($login->islogin() === true){
                        header('location:index.php');
                        exit();
                     }

                        if(isset($_POST['submit']) && $_POST['submit'] == 'Log In'){
                       
                        $user = escape($_POST['username']);
                        $pass  = escape($_POST['password']);
                        $hashpass = hash('sha256',$pass);
                        $errors = array();
                        if(isset($user,$pass)){
                            if(empty($email) && empty($pass)){
                                $errors[] = 'All field are required';
                            }
                            else
                            {
                                if(empty($user)){
                                    $errors[] = 'Email is required';

                                }
                                if(empty($pass)){
                                    $errors[] = 'password is required';

                                }
                                if(!empty($user) && !empty($pass)){
                                   
                                    if(!$login->logindata($user,$hashpass)){
                                        $errors[] = "Invalid username and/or password";
                                    }
                                }
                            }
                            if(!empty($errors)){
                                foreach($errors as $error){
                                    echo $error;
                                    echo "<br/>";
                                }
                            }
                            else
                            {
                                echo "<div class='alert alert-success'>";
                                echo 'Successfully Logged';
                                  $_SESSION['username'] = $user;   
                                header("Refresh:3; url=index.php");
                                exit();            
                                echo '</div>';
                            }

                        }
                    }
            ?>

                        <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Log In">
                                </div>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
