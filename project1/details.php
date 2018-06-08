<?php require_once('header.php'); ?>
<body>
	<header id="header"><!--header-->
		<?php 
		require_once('header-top.php');
		require_once('header-middle.php');
		require_once('header-bottom.php'); 
		$p_id = (int) $_GET['p_id'];
		$query =  mysqli_query($conn, "SELECT products.*, brand.* FROM products LEFT JOIN brand ON brand.b_id = products.p_id WHERE products.p_id = $p_id ");
		// $data           = array('p_images', 'p_name', 'p_price', 'p_id', 'p_description', 'p_web_id', 'p_qnt', 'p_availability', 'p_condition', 'b_id');

		// $query          = $database->getData("products", $data, 'p_id', '=', $p_id);
		$fetch 			= mysqli_fetch_array($query);
		$p_id 			= (int) $fetch['p_id'];
		$p_images 		= $fetch['p_images'];
		$p_des 			= $fetch['p_description'];
		$p_name 		= $fetch['p_name'];
		$p_price 		= $fetch['p_price'];
		$p_web_id 		= $fetch['p_web_id'];
		$p_qnt 			= $fetch['p_qnt'];
		$p_avail 		= $fetch['p_availability'];
		$b_name 		= $fetch['b_name'];
		if( $p_avail == 1 ) {
			$p_availability = '<div class="label label-danger">Out of Stock</div>';
		} elseif( $p_avail == 2 ) {
			$p_availability = '<div class="label label-success">In Stock</div>';
		}

		$p_condition 	= $fetch['p_condition'];
		if( $p_condition == 1 ) {
			$p_condition = '<div class="label label-warning">Used</div>';
		} elseif( $p_condition == 2 ) {
			$p_condition = '<div class="label label-success">New</div>';


		}
		
		
		//echo $sql;
		

		
		?>		
	</header><!--/header-->
	<section>
		<div class="container">
			<div class="row">
				<?php require_once('sidebar.php'); ?>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/products/<?php echo $p_images; ?>" alt="" />
							</div>

						</div>
						<div class="col-sm-7">							
							<div class="product-information"><!--/product-information-->
								<?php if($p_avail == 2) { ?> 
									<!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
									<h2><?php echo $p_name; ?></h2>
									<p>Web ID: <?php echo $p_web_id; ?></p>
									<!-- <p><img src="images/product-details/rating.png" alt="" /></p> -->
									<p>
									<?php
									
										$total_rating   = mysqli_query($conn,"SELECT rating,p_id FROM reviews WHERE p_id=$p_id");
				                        $array = array();
				                        $count =array();
				                    	while($row = mysqlI_fetch_array($total_rating)){
				                        	$result  = $row['rating'];
				                        	$p_id    = $row['p_id'];
				                        	$array[] = $result;
				                        	$count[] = count($result);
				                        }
				                        	$array_sum  = array_sum($array);
				                        		 		
				                        	 $count     = array_sum($count);
				                        		 		
				                        	$ranking    = round($array_sum/$count);
														// $result =  $row['COUNT(rating)'];
														//  //  $division = 5;
											 // $result1 = $division/$result;
											for ($i=1; $i <= $ranking; $i++) { 
												echo '<i class="fa fa-star" aria-hidden="true"></i>';
														 
											}
										?>
									</p>
									<span>
										<span>US <?php echo $p_price; ?></span>
										<form action="#" method="post" id="addtocart">
											<p>Quantity:</p>
											<select name="p_qnt" id="" required>
												<option value="">--Select--</option>
												<?php
												for ($i=1; $i <= $p_qnt;$i++) { 
													echo "<option value='$i'>$i</option>";
												}
												?>
											</select>	
											<br/><br/>
											<div id="message"></div>
											<input type="hidden" name="p_id" value="<?php echo $p_id;?>">
											<input type="submit" name="submit" value="Add To Cart" class="add-to-cart">
											<!-- <button type="button" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												<a href="add-to-cart.php" class="add-to-cart">Add to cart</a>
											</button> -->
										</form>
									</span>
									<p><b>Availability:</b> <?php echo $p_availability; ?></p>
									<p><b>Condition:</b> <?php echo $p_condition; ?></p>
									<p><b>Brand:</b> <?php echo $b_name; ?></p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								<?php } else { ?>
									<div class="label label-danger">Out Of Stock!</div>
								<?php } ?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Product Details</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >	
								<div class="col-sm-12">
									<p><?php echo nl2br($p_des); ?></p>
								</div>
							</div>

							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<?php
									$data           = array('rating', 'p_id', 'r_name', 'email', 'message', 'added', );
									$query          = $database->getData("reviews", $data, 'p_id', '=', $p_id);
									while ( $fetch      = mysqli_fetch_array($query)) {
										
										$rating 		= $fetch['rating'];
										$name 			= $fetch['r_name'];
										$email 			= $fetch['email'];
										$message 		= $fetch['message'];
										$added 			= $fetch['added'];
										
										
										?>

										<div class="review">
											<ul>
												<li><i class="fa fa-user"></i> <?php echo $name; ?></li>
												<li><i class="fa fa-clock-o"></i> <?php echo $added;?></li>
												<li class="pull-right">											
													<?php 
													for ($i=1; $i <= $rating; $i++) { 
														echo '<i class="fa fa-star" aria-hidden="true"></i>';
													}
													?>
												</li>
											</ul>
											<p>Good Product. Thanks.</p>										
										</div>	
										<?php
									}
									?>								
									
									<p><b>Write Your Review</b></p>									
									<form action="#" method="post" id="do_review">
										<span>
											<input type="text" name="name" placeholder="Your Name"/>
											<input type="email" name="email" placeholder="Email Address"/>
										</span>
										<textarea name="message" ></textarea>
										<b>Rating: </b>
										<select name="rating" id="">
											<option value="">--Select--</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<br/>
										<br/>
										<input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
										<input type="submit" name="submit" value="Submit Review" class="btn btn-default">	
										<br/><br/>									
										<div id="message"></div>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->					
				</div>
			</div>
		</div>
	</section>
	
	<?php require_once('footer.php'); ?>
	<?php require_once('js.php'); ?>

	<script type='text/javascript'>
            $('#addtocart').submit(function(e){
                e.preventDefault();
                 //alert(1);
                //var data = $('#update').serialize();
                var data = new FormData(this);

                //alert(1);
                $.ajax({
                    type: 'POST',
                    url: 'add-to-cart-process.php',
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
</body>
</html>