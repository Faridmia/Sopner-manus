<?php
	require_once('admin/init.php');

	$ex_p_id   = $_POST['ex_p_id'];
	$new_p_qnt  = $_POST['new_p_qnt'];
	$page   = $_POST['page'];

	$cart = $_SESSION['cart'];
	$cart[$ex_p_id] = $new_p_qnt;
	$_SESSION['cart'] = $cart;
	echo '<pre>';
	print_r($cart);




?>
<script>
	window.location = <?php echo "'$page'".';';?>
</script>