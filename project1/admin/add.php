<?php
	require_once('init.php');
	require_once('functions.php');
	$database = new Database();
	$conn        = $database->connection;
	$token = $database->token($database->generatetoken());
	if($token){
		$page           = escape($_POST['page']);
		if($page == 'category'){
			$cat_name  		= escape($_POST['cat_name']);
			$errors = array();
			if(isset($cat_name)){
				if(empty($cat_name)){
					
						$errors[] = "<div class='alert alert-danger'>Category field are required</div>";
				}
				if(!empty($errors)){
					foreach($errors as $error){
					 echo $error."<br/>";
					}
				}
				else
				{
					$data     = array('cat_name' => $cat_name);
					$query    = $database->insertdata("categories",$data);

					if($query){
							echo "<div class='alert alert-success'>Category Added successfully.</div>";
									
				    }
					else
					{
						echo "<div class='alert alert-danger'>Category is not Added</div>";
						echo mysqli_error($conn);
					}

				}
			}
			


		}

		elseif($page == 'sub_category'){

			$cat_name = escape($_POST['cat_name']);
			$sub_name = escape($_POST['sub_name']);

			////////////////validate start
			$errors = array();
			if(isset($cat_name)){
				if(empty($cat_name) && empty($sub_name)){
					
						$errors[] = "<div class='alert alert-danger'>All field are required.</div>";
				}
				else{
					if(empty($cat_name)){
						$errors[] = "<div class='alert alert-danger'>Category field are required</div>";

					}
					if(empty($sub_name)){
						$errors[] = "<div class='alert alert-success'>Sub category field are required</div>";

					}

				}
				if(!empty($errors)){
					foreach($errors as $error){
					 echo $error."<br/>";
					}
				}
				else
				{
					$data     = array('sub_name' => $sub_name,'cat_id' => $cat_name);
					$query    = $database->insertdata("sub_categories",$data);

					if($query){
							echo "<div class='alert alert-success'>Sub Category Added successfully.</div>";
									
				    }
					else
					{
						echo "<div class='alert alert-danger'>Sub Category is not Added</div>";
						echo mysqli_error($conn);
					}

				}
			}	
			/// valdate end
			


		}
		elseif($page == 'brand'){
			$b_name   = escape($_POST['b_name']);


			//start brand validate

			$errors = array();
			if(isset($b_name)){
				if(empty($b_name)){
					
						$errors[] = "<div class='alert alert-danger'>.brand field are required.</div>";
				}
				if(!empty($errors)){
					foreach($errors as $error){
					 echo $error."<br/>";
					}
				}
				else
				{
					$data     = array('b_name' => $b_name);
					$query    = $database->insertdata("brand",$data);

					if($query){
							echo "<div class='alert alert-success'>Brand Added successfully.</div>";
							?>
					  			<script>
					  			setTimeout(function(){
					  				window.location = "all-brand.php";

					  			},3000);
					  				
					  			</script>
					  		<?php
									
				    }
					else
					{
						echo "<div class='alert alert-danger'>Brand is not Added</div>";
						echo mysqli_error($conn);
					}


				}
			}
			//end brand validate
			


		}

	}
?>