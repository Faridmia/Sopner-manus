<?php
	require_once('init.php');
	require_once('functions.php');
	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";*/

	$database = new Database();
	$token = $database->token($database->generatetoken());
	if($_POST['token'] == $_SESSION['token']){
		$page = $_POST['page'];
		if($page == 'profile'){
			$fullname  		= escape($_POST['full_name']);
			$username  		= escape($_POST['uname']);
			$email     		= escape($_POST['email']);
			$password  		= escape($_POST['password']);
			$errors = array();
			if(isset($fullname,$email)){
				if(empty($fullname) && empty($email)){
					
						$errors[] = 'fullname are required'."<br/>";
						$errors[] = 'email are required'."<br/>";
				}
				else
				{
					if(empty($fullname)){
						$errors[] = 'First name field are required';
					}
					if(empty($email)){
						$errors[] = 'email field are required';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{
						$hashPassword	= hash('sha256', $password);
						//$file_name = escape($_FILES['upload']['name']);
					    if(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])){
							$file_name = $_FILES['upload']['name'];
							$explode = explode(".", $file_name);
							$extension = end($explode);
							$tmp_name = $_FILES['upload']['tmp_name'];
							$size = $_FILES['upload']['size'];
							$type = $_FILES['upload']['type'];

						}
						$database 	= new Database();
						$conn 		= $database->connection;
						$data 		= array('full_name' => $fullname, 'email' => $email);

						if(!empty($password)){
					            $datapass = array('password' => $hashPassword);
					            $data     = array_merge($data,$datapass);
					    }

				    	if(!empty(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name']) )) {
							//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
				    		$newFile 	 = random(10).'.'.$extension;
							$dataFile 	 = array('profileimg' => $newFile);
							$data 		 = array_merge($data, $dataFile);

						}

						$query = $database->updatedata('admin',$data,'a_id', '=', 1);
						if($query){
							echo "<div class='alert alert-success'>Update successfully.</div>";
						if(!empty(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name']))){
							move_uploaded_file($tmp_name, 'images/'.$newFile);
						}
				}
				else
				{
					echo "<div class='alert alert-danger'>data not update</div>";
					echo mysqli_error($conn);
				}

		}
	}
	

			
		

	}//end profile page validation
	// start setting page validation
		elseif($page == 'setting'){
                        $phone       = escape($_POST['phone']); 
                        $email       = escape($_POST['email']);
                        $facebook    = escape($_POST['facebook']);
                        $twitter     = escape($_POST['twitter']);
                        $linkedin    = escape($_POST['linkedin']);
                        $google      = escape($_POST['google']);
                        $logo        =       $_FILES['logo'];
                        $copyright   = escape($_POST['copyright']);


            $errors = array();
			if(isset($phone,$email,$facebook,$twitter,$linkedin,$google,$copyright)){
				if(empty($phone) && empty($email) && empty($facebook) && empty($twitter) && empty($linkedin) && empty($google) && empty($copyright)){
					
						$errors[] = 'All field are required';
				}
				else
				{
					if(empty($phone)){
						$errors[] = 'phone field are required';
					}
					if(empty($email)){
						$errors[] = 'email field are required';
					}
					if(empty($facebook)){
						$errors[] = 'facebook field are required';
					}
					if(empty($twitter)){
						$errors[] = 'twitter field are required';
					}
					if(empty($linkedin)){
						$errors[] = 'linkedin field are required';
					}
					if(empty($google)){
						$errors[] = 'google field are required';
					}
					if(empty($copyright)){
						$errors[] = 'copyright field are required';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}

				else
				{
					if(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])){
						$file_name   = $_FILES['logo']['name'];
						$explode     = explode(".", $file_name);
						$extension   = end($explode);
						$tmp_name    = $_FILES['logo']['tmp_name'];
						$size        = $_FILES['logo']['size'];
						$type        = $_FILES['logo']['type'];

					}

					$database 	= new Database();
					$conn 		= $database->connection;
					$data 		= array('phone' => $phone, 'email' => $email,'facebook' => $facebook,'twitter' => $twitter,'google' => $google,'copyright' => $copyright,'linkedin' => $linkedin);

			    	if(!empty(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))) {
						//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
			    		$newFile 	 = random(10).'.'.$extension;
						$dataFile 	 = array('logo' => $newFile);
						$data 		 = array_merge($data, $dataFile);
					}

						$query = $database->updatedata('setting',$data,'s_id', '=', 1);
						if($query){
							echo "<div class='alert alert-success'>Update successfully.</div>";
							if(!empty(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))) {
								move_uploaded_file($tmp_name, 'images/logo/'.$newFile);
							}
						}
				else
				{
					echo "<div class='alert alert-danger'>data not update</div>";
					echo mysqli_error($conn);
				}
		
			
			}
		


		}
	}//end of file setting page
	//start product page

	elseif($page == 'product'){

		
                        $p_name         = escape($_POST['p_name']); 
                        $p_description  = escape($_POST['p_description']);
                        $p_web_id       = escape($_POST['p_web_id']);
                        $p_price        = escape($_POST['p_price']);
                        $p_qnt          = escape($_POST['p_qnt']);
                        $p_availability = escape($_POST['p_availability']);
                        //$p_images       = $_FILES['p_images']['name'];
                        $p_condition    = escape($_POST['p_condition']);
                        $p_brand        = escape($_POST['p_brand']);
                        $p_category     = escape($_POST['p_category']);
                        $p_sub_category = escape($_POST['p_sub_category']);
                        

                        if(isset($_FILES['p_images']['name'])){
							$file_name   = $_FILES['p_images']['name'];
							$explode     = explode(".", $file_name);
							$extension   = end($explode);
							$tmp_name    = $_FILES['p_images']['tmp_name'];
							$size        = $_FILES['p_images']['size'];
							$type        = $_FILES['p_images']['type'];

						}


            $errors = array();
			if(isset($p_name,$p_description,$p_web_id,$p_price,$p_qnt,$p_availability,$p_condition,$p_brand,$p_category,$file_name)){
				if(empty($p_name) && empty($p_description) && empty($p_web_id) && empty($p_price) && empty($p_qnt) && empty($p_availability) && empty($p_condition) && empty($p_brand) && empty($p_category) && empty($file_name)){
						$errors[] = 'All field are required';
				}
					
					
			
				else
				{
					
					if(empty($p_name)){
						$errors[] = 'product name  are required<br/>';
					}
					if(empty($p_description)){
						$errors[] = 'product description  are required<br/>';
					}
					if(empty($p_web_id)){
						$errors[] = 'product web id are required<br/>';
					}
					if(empty($p_price)){
						$errors[] = 'product price are required<br/>';
					}
					if(empty($p_qnt)){
						$errors[] = 'product quantity are required<br/>';
					}
					if(empty($p_availability)){
						$errors[] = 'product availability are required<br/>';
					}
					if(empty($p_condition)){
						$errors[] = 'product condition are required<br/>';
					}
					if(empty($p_brand)){
						$errors[] = 'product brand are required<br/>';
					}
					if(empty($p_category)){
						$errors[] = 'product category field are required<br/>';
					}
					if(empty($file_name)){
						$errors[] = 'image field are required<br/>';
					}
					
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}

				else
				{
					$p_sub_category = escape($_POST['p_sub_category']);
					if(isset($_FILES['p_images']['name']) && !empty($_FILES['p_images']['name'])){
						$file_name   = $_FILES['p_images']['name'];
						$explode     = explode(".", $file_name);
						$extension   = end($explode);
						$tmp_name    = $_FILES['p_images']['tmp_name'];
						$size        = $_FILES['p_images']['size'];
						$type        = $_FILES['p_images']['type'];

					}
					
					if(!empty(isset($_FILES['p_images']['name']) && !empty($_FILES['p_images']['name']))) {
						//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
			    		$newFile 	 = random(10).'.'.$extension;
						
					}

					$database 	= new Database();
					$conn 		= $database->connection;
					//$data = array("full_name" => $fullname,"email" => $email);
					$added = time();
					$data 		= array('p_name' => $p_name, 'p_description' => $p_description,'p_web_id' => $p_web_id,'p_price' => $p_price,'p_qnt' => $p_qnt,'p_availability' => $p_availability,'p_condition' => $p_condition,'b_id' => $p_brand,'cat_id' => $p_category,'sub_id' => $p_sub_category, 'p_images' => $newFile,'added' => $added,'is_active' => 1);

						$query = $database->insertdata('products',$data);
						if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['p_images']['name']) && !empty($_FILES['p_images']['name']))) {
								move_uploaded_file($tmp_name, '../images/products/'.$newFile);
							}
						}
				else
				{
					echo "<div class='alert alert-danger'>data not added</div>";
					echo mysqli_error($conn);
				}
		
			
			}
		


		}
	}	//end of file product page.............

	//start banner page

		elseif($page == 'banner'){

		
                        $ban_title            = escape($_POST['ban_title']); 
                        $ban_description      = escape($_POST['ban_description']);
                        $ban_sub_title        = escape($_POST['ban_sub_title']);
                        $ban_button_url       = escape($_POST['ban_button_url']);
                    
                        if(isset($_FILES['b_images']['name'])){
							$file_name   = $_FILES['b_images']['name'];
							$explode     = explode(".", $file_name);
							$extension   = end($explode);
							$tmp_name    = $_FILES['b_images']['tmp_name'];
							$size        = $_FILES['b_images']['size'];
							$type        = $_FILES['b_images']['type'];

						}


            $errors = array();
			if(isset($ban_title,$ban_description,$ban_sub_title,$ban_button_url,$file_name)){
				if(empty($ban_title) && empty($ban_description) && empty($ban_sub_title) && empty($ban_button_url) && empty($file_name)){

					
						$errors[] = "<div class='alert alert-danger'>All field are required</div>";
				}
			
				else
				{
					
					if(empty($ban_title)){
						$errors[] = 'Banner Title  are required<br/>';
					}
					if(empty($ban_description)){
						$errors[] = 'Banner description  are required<br/>';
					}
					if(empty($ban_sub_title)){
						$errors[] = 'Banner Sub Title are required<br/>';
					}
					if(empty($ban_button_url)){
						$errors[] = 'Banner Button field are required<br/>';
					}
					if(empty($file_name)){
						$errors[] = 'image field are required<br/>';
					}
					
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}

				else
				{
					
					if(isset($_FILES['b_images']['name']) && !empty($_FILES['b_images']['name'])){
						$file_name   = $_FILES['b_images']['name'];
						$explode     = explode(".", $file_name);
						$extension   = end($explode);
						$tmp_name    = $_FILES['b_images']['tmp_name'];
						$size        = $_FILES['b_images']['size'];
						$type        = $_FILES['b_images']['type'];

					}
					
					if(!empty(isset($_FILES['b_images']['name']) && !empty($_FILES['b_images']['name']))) {
						//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
			    		$newFile 	 = random(10).'.'.$extension;
						
					}

					$database 	= new Database();
					$conn 		= $database->connection;
					//$data = array("full_name" => $fullname,"email" => $email);
					$added = time();
					$data 		= array('ban_title' => $ban_title, 'ban_description' => $ban_description,'ban_sub_title' => $ban_sub_title,'ban_button_url' => $ban_button_url, 'ban_images' => $newFile);

						$query = $database->insertdata('banner',$data);
						if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['b_images']['name']) && !empty($_FILES['b_images']['name']))) {
								move_uploaded_file($tmp_name, '../images/banner/'.$newFile);
							}
						}
				else
				{
					echo "<div class='alert alert-danger'>data not added</div>";
					echo mysqli_error($conn);
				}
		
			
			}
		


		}
	}

	//end of file banner page
}

	else
	{
		echo "oop! you are wrong";
	}
	


?>