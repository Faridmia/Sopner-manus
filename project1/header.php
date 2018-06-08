<?php
    ob_start();
    require_once('admin/init.php');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <style>
        .review{
                border: 1px solid #ddd;
                padding: 25px;
                margin-bottom: 25px;
                }
        .cart{
                margin:0px;
            }
        a.add-to-cart {
          color : #fff;
          background: #fe980f;
        }

        .products-details{
          padding:25px;
        } 

        .product-information span input {    
                width: 100%;
                font-size : 14px;
        }       

    </style>
</head><!--/head-->