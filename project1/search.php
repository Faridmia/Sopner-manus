<?php

    ob_start();
    require_once('admin/config.php');
    $database    = new Database();
    $conn        = $database->connection;

 $s = $_GET['s'];

 $data   = array('p_name', 'p_description');
 $query  = mysqli_query($conn,"SELECT * FROM products WHERE p_name LIKE '%pa%'");
   
   while($row = mysqli_fetch_array($query)){
	$p_name = $row['p_name'];
	
	echo $p_name;
	echo "<br/>";

	}

?>