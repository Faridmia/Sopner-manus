<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
	<?php
					$data   = array('ban_id', 'ban_title', 'ban_sub_title', 'ban_description', 'ban_button_url', 'ban_images');
	$query          	   = $database->getData("banner", $data);
    $numSlider        	   = $database->numRows($query);
?>
						<ol class="carousel-indicators">
							<?php for ($i=0; $i < $numSlider ; $i++) { 
								if( $i == 0 ) {
									$active = "class='active'";
								} else {
									$active = '';
								}
								echo "<li data-target='#slider-carousel' data-slide-to='$i' $active></li>";
							}
							?>					
						</ol>
						<div class="carousel-inner">
						<?php 
							$count = 0;
							while( $fetch = mysqli_fetch_array($query)) { 
								$ban_id         	= (int) $fetch['ban_id'];
								$ban_title          = $fetch['ban_title'];
								$ban_sub_title      = $fetch['ban_sub_title'];
								$ban_description    = $fetch['ban_description'];
								$ban_button_url     = $fetch['ban_button_url'];
								$ban_images         = $fetch['ban_images'];
								if( $count == 0 ) {
									$active = 'active';
								} else {
									$active = '';
								}
							?>
							<div class="item <?php echo $active; ?>">
								<div class="col-sm-6">
									<!-- <h1><span>E</span>-SHOPPER </h1> -->
									<h1><?php echo $ban_title;?> </h1>
									<h2><?php echo $ban_sub_title;?> </h2>
									<p><?php echo $ban_description;?> </p>
									<a href="<?php echo $ban_button_url; ?>" target=_blank><button type="button" class="btn btn-default get">Get it now</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/banner/<?php echo $ban_images;?>" class="girl img-responsive" alt="" />
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
							</div>
						<?php 
						$count++;
						} ?>
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>						
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->