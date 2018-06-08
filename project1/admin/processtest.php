<?php
require_once('init.php');
			require_once('functions.php');

if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
			
			$database = new Database();
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";

			$fullname  		= escape($_POST['full_name']);
			$username  		= escape($_POST['uname']);
			$email     		= escape($_POST['email']);
			$password  		= escape($_POST['password']);

			$hashPassword	= hash('sha256', $password);


			 if(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])){
					$file_name = $_FILES['upload']['name'];
					$explode = explode(".", $file_name);
					$extension = end($explode);
					$tmp_name = $_FILES['upload']['tmp_name'];
					$size = $_FILES['upload']['size'];
					$type = $_FILES['upload']['type'];

				}


			$errors = array();
			if(isset($fullname,$username,$email,$password,$file_name)){
				if(empty($fullname) && empty($username) && empty($email) && empty($password) && empty($file_name)){
					$errors[] = 'All field are required';
				}
				else
				{
					if(empty($fullname)){
						$errors[] = 'First name field are required';
					}
					if(empty($username)){
						$errors[] = 'username field are required';
					}
					if(empty($email)){
						$errors[] = 'email field are required';
					}
					if(empty($password)){
						$errors[] = 'password field are required';
					}

					if(empty($file_name)){
						$errors[] = 'image field are required';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}

				else{
					echo "welcome";

				}
		}

}


	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";

	
	$token = $database->token($database->generatetoken());
	if($_POST['token'] == $_SESSION['token']){
		  $page = $_POST['page'];
		if($page == 'profile'){
			
			

			
				else
				{
					

		//$file_name = escape($_FILES['upload']['name']);
			   

		

				$database 	= new Database();
				$conn 		= $database->connection;
				//$data = array("full_name" => $fullname,"email" => $email);
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

				}
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
		

		}//end profile page validation
			// start setting page validation
		

	
	}

	else
	{
		echo "oop! you are wrong";
	}*/
	


?>