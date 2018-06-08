<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">

						<?php


						    $data             = array('ban_id','ban_title','ban_sub_title','ban_description','ban_button_url','ban_images');
						    $query            = $database->getData("banner",$data);
						    $numslider     = $database->numRows($query);
						    $row           = mysqli_fetch_array($query);
						   

						?>
						<ol class="carousel-indicators">
						<?php
							for($i = 0;$i < $numslider;$i++){
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
							while( $row = mysqli_fetch_array($query) ) { 
								$ban_id         	= (int) $row['ban_id'];
								$ban_title          = $row['ban_title'];
								$ban_sub_title      = $row['ban_sub_title'];
								$ban_description    = $row['ban_description'];
								$ban_button_url     = $row['ban_button_url'];
								$ban_images         = $row['ban_images'];
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
									<a href="<?php echo $ban_button_url; ?>"><button type="button" class="btn btn-default get">Get it now</button></a>
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