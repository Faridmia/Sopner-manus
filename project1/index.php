<?php  require_once('header.php'); ?>
<body>
	<header id="header"><!--header-->
		<?php  
			require_once('header-top.php');
		    require_once('header-middle.php'); 
		    require_once('header-bottom.php'); 
		?>
	</header><!--/header-->

	<?php  
			require_once('slider1.php');
	    
	?>
	<section>
		<div class="container">
			<div class="row">
				<?php  
			
					require_once('sidebar.php');
				?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>

						<?php

							 	$data        = array('p_images','p_name','p_price','p_id');
							    $query       = $database->getData("products",$data);
							    $row         = mysqli_fetch_array($query);
							    while($row = mysqli_fetch_array($query)){

							    	$p_id     = (int) $row['p_id'];
							    	$p_name   = $row['p_name'];
							    	$p_price  = $row['p_price'];
							    	$p_images = $row['p_images'];    

						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/products/<?php echo $p_images;?>" alt="" />
											<h2><?php echo $p_price;?></h2>
											<p><?php echo $p_name;?></p>
											<!-- <a href="add-to-cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
											<a href="details.php?p_id=<?php echo $p_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $p_price;?></h2>
												<p><?php echo $p_name;?></p>
												<!-- <a href="add-to-cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
												<a href="details.php?p_id=<?php echo $p_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Details</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php } ?>
						
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	
	
	<?php 
		require_once('footer.php');
		require_once('js.php');
	?>

	
	
	
	

  
    
</body>
</html>