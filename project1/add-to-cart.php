<?php require_once('header.php'); ?>

<body>
	<header id="header"><!--header-->
		<?php 
		require_once('header-top.php');
		require_once('header-middle.php');
		require_once('header-bottom.php'); 

		?>		
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						<?php
							$cart = $_SESSION['cart'];
							// echo "<pre>";
							// print_r($_SESSION['cart']);
							// echo "</pre>";
							foreach($cart as $p_id => $p_qnt){
								$data        	= array('p_images','p_web_id','p_price','p_name','p_qnt');
                        		$query       	= $database->getData("products",$data,'p_id','=',$p_id);
                        		$row         	= mysqli_fetch_array($query);
                        		$p_name      	= $row['p_name'];
                        		$p_images      	= $row['p_images'];
                        		$p_price      	= $row['p_price'];
                        		$p_web_id      	= $row['p_web_id'];
                        		$p_db_qnt       = $row['p_qnt'];

                        ?>

                        	<tr>
								<td class="cart_product">
									<a href=""><img src="images/products/<?php echo $p_images;?>" alt="" width="200px" img-responsive></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $p_name.$p_id;?></a></h4>
									<p>Web ID: <?php echo $p_web_id;?></p>
								</td>
								<td class="cart_price">
									<p>$<?php echo $p_price;?></p>
								</td>
								<td class="cart_quantity">
									
									<div class="cart_quantity_button">
										<select name="change_p_qnt" class="change_p_qnt">
											<?php 
											for($i = 1;$i <= $p_db_qnt;$i++){
												if($i == $p_qnt){
													$sel = 'selected = "selected"';
												}
												else
												{
													$sel = '';
												}
												echo "<option $sel value='$i'>$i</option>";
										}
										?>
										</select>
										<input type="hidden" id="ex_p_id" value="<?php echo $p_id;?>">
									</div>
								</td>
							</tr>
                        <?php
								
							}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<div id="message"></div><!-- ajax ar message show korar jonno -->
				<h3>Total price</h3>
			</div>
			<div class="row">
				<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="total_area">
						<?php 
							
							$total_price = array();
							foreach($_SESSION['cart'] as $p_id => $p_qnt){
								
								 $data          = array('p_price');
                        		 $query         = $database->getData("products",$data,'p_id','=',$p_id);
                        		 $row           = mysqli_fetch_array($query);
                        		 $p_price       = $row['p_price'];
                        		 $total_price[] = $p_qnt * $p_price;
                        		 
							}
						    $total_price         = array_sum($total_price); 
						    $tax                 = $total_price*.1;
						    $cost                = 10;
						    $final_price         = $total_price-($tax+$cost); 

						?>
						<ul>
							<li>Cart Sub Total <span>$<?php echo $total_price;?></span></li>
							<li>Eco Tax <span>10%</span></li>
							<li>Shipping Cost <span>10</span></li>
							<li>Total <span>$<?php echo $final_price;?></span></li>
						</ul>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php require_once('footer.php'); ?>
	<?php require_once('js.php'); ?>

	<script>
		$(".change_p_qnt").on('change',function(e){
				e.preventDefault();
                var new_p_qnt = $(this).val();
                var ex_p_id   = $(this).next('#ex_p_id').val();
                //alert(1);
                $.ajax({
                    type: 'POST',
                    url: 'update-cart.php',
                    dataType: 'html',
                    data: {
                        new_p_qnt : new_p_qnt,
                        ex_p_id   :  ex_p_id,
                        page      : 'add-to-cart.php',
                    },
                    success : function(result){
                        $("#message").html(result);
                    }
                });

            });
	</script>   
</body>
</html>