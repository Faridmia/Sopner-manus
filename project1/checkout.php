<?php  require_once('header.php'); ?>
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
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<ul class="nav">
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
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
									<a href=""><img src="images/products/<?php echo $p_images;?>" alt="" width="150px" img-responsive></a>
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
			<section id="do_action">
				<div class="container">
					<div class="heading">
						<div id="message"></div><!-- ajax ar message show korar jonno -->
						<h3>Total price</h3>
					</div>
					<div class="row">
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
			<div class="payment-options">
				<h3>Payment Method</h3>
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Company Name">
									<input type="text" placeholder="Email*">
									<input type="text" placeholder="Title">
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="password" placeholder="Confirm password">
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									<input type="text" placeholder="Fax">
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			
			
	</section> <!--/#cart_items-->

	

	<?php 
		require_once('footer.php');
		require_once('js.php');
	?>
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
                         page      : 'checkout.php',
                    },
                    success : function(result){
                        $("#message").html(result);
                    }
                });

            });
	</script>   
</body>
</html>