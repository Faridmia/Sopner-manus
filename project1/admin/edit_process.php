<?php

require_once('init.php');
require_once('functions.php');
	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";*/

	$database = new Database();
	$conn 		= $database->connection;
	$token = $database->token($database->generatetoken());
	if($_POST['token'] == $_SESSION['token']){
		  $page = $_POST['page'];
		  if($page == 'category'){

			  	$catid    = (int)$_POST['catid'];
			  	$catname  = $_POST['cat_name'];

			  	$data 	 = array('cat_name' => $catname);
			  	$query   = $database->updatedata('categories',$data,'cat_id', '=', $catid );

			  	if($query){
			  		echo "<div class='alert alert-success'>";
			  			echo "category updated";
			  		echo "<div>";
			  	}

			  	else
			  	{
			  		echo "<div class='alert alert-danger'>";
			  			echo "category is not updated".mysqli_error($conn);
			  		echo "<div>";
			  	}
		  }

		  elseif($page == 'subcategory'){
		  		
				$catid    = (int) $_POST['catid'];
				$subid    = (int) $_POST['subid'];
			  	$subname  = $_POST['sub_name'];

			  	$data 	 = array('cat_id' => $catid,'sub_name' => $subname);
			  	$query   = $database->updatedata('sub_categories',$data,'sub_id','=', $subid);

			  	if($query){
			  		echo "<div class='alert alert-success'>";
			  			echo "sub category updated";
			  		?>
			  			<script>
			  			setTimeout(function(){
			  				window.location = "all-sub-category.php";

			  			},3000);
			  				
			  			</script>
			  		<?php
			  		echo "<div>";
			  	}

			  	else
			  	{
			  		echo "<div class='alert alert-danger'>";
			  			echo "sub category is not updated".mysqli_error($conn);
			  		echo "<div>";
			  	}
		  }

		  elseif($page == 'brand'){
		  		
				$bid    = (int) $_POST['bid'];
			  	$bname  = $_POST['b_name'];

			  	$data 	 = array('b_name' => $bname);
			  	$query   = $database->updatedata('brand',$data,'b_id','=', $bid);

			  	if($query){
			  		echo "<div class='alert alert-success'>";
			  			echo "brand name updated";
			  		?>
			  			<script>
			  			setTimeout(function(){
			  				window.location = "all-brand.php";

			  			},3000);
			  				
			  			</script>
			  		<?php
			  		echo "<div>";
			  	}

			  	else
			  	{
			  		echo "<div class='alert alert-danger'>";
			  			echo "Brand name is not updated".mysqli_error($conn);
			  		echo "<div>";
			  	}
		  }

		  elseif($page == 'banner'){
		  		
				$banid             = (int) $_POST['banid'];
			  	$ban_title         = $_POST['ban_title'];
			  	$ban_sub_title     = $_POST['ban_sub_title'];
			  	$ban_description   = $_POST['ban_description'];
			  	$ban_button_url    = $_POST['ban_button_url'];
			  	

			  
				if(isset($_FILES['b_images']['name'])){
							$file_name   = $_FILES['b_images']['name'];
							$explode     = explode(".", $file_name);
							$extension   = end($explode);
							$tmp_name    = $_FILES['b_images']['tmp_name'];
							$size        = $_FILES['b_images']['size'];
							$type        = $_FILES['b_images']['type'];

				}
			
			  	$data 	 = array('ban_title' => $ban_title,'ban_sub_title' => $ban_sub_title,'ban_description' => $ban_description,'ban_button_url' => $ban_button_url);
			  	if(!empty(isset($_FILES['b_images']['name']) && !empty($_FILES['b_images']['name']) )) {
							//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
				    		$newFile 	 = random(10).'.'.$extension;
							$dataFile 	 = array('ban_images' => $newFile);
							$data 		 = array_merge($data, $dataFile);

				}
			  	
			  	
			  	$query   = $database->updatedata('banner',$data,'ban_id','=', $banid);

			  	if($query){
			  		echo "<div class='alert alert-success'>Banner Data update successfully.</div>";
							if(!empty(isset($_FILES['b_images']['name']) && !empty($_FILES['b_images']['name']))) {
								move_uploaded_file($tmp_name, '../images/banner/'.$newFile);
							}
			  		?>
			  			<script>
			  			setTimeout(function(){
			  				window.location = "all-banner.php";

			  			},3000);
			  				
			  			</script>
			  		<?php
			  		echo "<div>";
			  	}

			  	else
			  	{
			  		echo "<div class='alert alert-danger'>";
			  			echo "Banner data is not updated".mysqli_error($conn);
			  		echo "<div>";
			  	}
		  }

	}


?>