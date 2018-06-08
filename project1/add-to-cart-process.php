<?php
	require_once('admin/init.php');
	$p_id   = (int)$_POST['p_id'];
	$p_qnt  = (int)$_POST['p_qnt'];
	

	
	//$_SESSION['p_qnt']   = array();
	//session_destroy();

	if(empty($_SESSION['no_p_id'])){
		$_SESSION['no_p_id'] = array($p_id);
		$_SESSION['no_p_qnt'] = array($p_qnt);

	}
	else
	{
		array_push($_SESSION['no_p_id'], $p_id);
		array_push($_SESSION['no_p_qnt'], $p_qnt);

	}
	array_unique($_SESSION['no_p_id']);
	array_unique($_SESSION['no_p_qnt']);
	$arraycomb = array_combine($_SESSION['no_p_id'],$_SESSION['no_p_qnt']);

	// echo "<pre>";
	// print_r($arraycomb);
	// echo "</pre>";
	$_SESSION['cart'] = $arraycomb;



?>
<script>
	window.location = 'add-to-cart.php';
</script>