<?php
	require_once('init.php');
	require_once('functions.php');

	$database = new Database();
	$conn        = $database->connection;
	$token = $database->token($database->generatetoken());
	if($token){
		$page           = escape($_POST['page']);
		$pid            = (int) escape($_POST['pid']); 
		$p_name         = escape($_POST['p_name']); 
        $p_description  = escape($_POST['p_description']);
        $p_web_id       = escape($_POST['p_web_id']);
        $p_price        = escape($_POST['p_price']);
        if(isset($_FILES['p_images']['name']) && !empty($_FILES['p_images']['name'])){
				$file_name   = $_FILES['p_images']['name'];
				$explode     = explode(".", $file_name);
				$extension   = end($explode);
				$tmp_name    = $_FILES['p_images']['tmp_name'];
				$size        = $_FILES['p_images']['size'];
				$type        = $_FILES['p_images']['type'];

		}
        $p_qnt          = escape($_POST['p_qnt']);
        $p_availability = escape($_POST['p_availability']);
        //$p_images       = $_FILES['p_images']['name'];
        $p_condition    = escape($_POST['p_condition']);
        $p_brand        = escape($_POST['p_brand']);
        $p_category     = escape($_POST['p_category']);
        $p_sub_category = escape($_POST['p_sub_category']);

        $data 		= array('p_name' => $p_name,'p_description' => $p_description,'p_web_id' => $p_web_id,'p_price' => $p_price,'p_qnt' => $p_qnt,'p_availability' => $p_availability,'p_condition' => $p_condition,'b_id' => $p_brand,'cat_id' => $p_category,'sub_id' => $p_sub_category);

	        if(!empty(isset($_FILES['p_images']['name']) && !empty($_FILES['p_images']['name']))) {
				//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
				$newFile 	 = random(10).'.'.$extension;
				$dataFile 	 = array('p_images' => $newFile);
				$data 		 = array_merge($data, $dataFile);
			}
        $query = $database->updatedata('products',$data,'p_id', '=', $pid);
				if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['p_images']['name']) && !empty($_FILES['p_images']['name']))) {
								move_uploaded_file($tmp_name, '../images/products/'.$newFile);
							}
						}
				else
				{
					echo "<div class='alert alert-danger'>data not updated</div>";
					echo mysqli_error($conn);
				}
		
			
			
	}


?>