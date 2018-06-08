<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->

							<?php

								$data   = array('cat_id', 'cat_name');
							    $query  = $database->getData("categories", $data);
   							    
							    $count = 0;
   							    while($row = mysqli_fetch_array($query)){
   							    	$cat_id = $row['cat_id'];
   							    	$cat_name = $row['cat_name'];
   							    

							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo 'cat'.$count;?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?php echo $cat_name; ?>
										</a>
									</h4>
								</div>
								<div id="<?php echo 'cat'.$count;?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<?php 
												$data1   = array('sub_id', 'sub_name');
							                    $query1  = $database->getData("sub_categories", $data1,'cat_id','=',$cat_id);
   							    
							                   $count = 0;
   							                while($row1 = mysqli_fetch_array($query1)){
			   							    	$sub_id = $row1['sub_id'];
			   							    	$sub_name = $row1['sub_name'];
			   							    	echo "<li><a href='#'>$sub_name</a></li>";

			   							    }
											?>
											
										</ul>
									</div>
								</div>
							</div>

	<?php $count++; } ?>
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php 
											$data2   = array('b_id', 'b_name');
							                $query2  = $database->getData("brand", $data2);
   							    
							                $count = 0;
   							                while($row2 = mysqli_fetch_array($query2)){
			   							    	$b_id = $row2['b_id'];
			   							    	$b_name = $row2['b_name'];
			   							    	echo "<li><a href='#'>$b_name</a></li>";

			   							    }
			   							    echo "<li><a href='#'>$b_name</a></li>";
									?>
									
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>