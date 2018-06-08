<?php
require_once('admin/init.php');
$database       = new Database();
$conn           = $database->connection;

$name 			= $_POST['name'];
$email 			= $_POST['email'];
$rating 		= $_POST['rating'];
$message 		= $_POST['message'];
$p_id 			= $_POST['p_id'];

$added 			= date("Y-m-d h:i:s");
$data			= array('rating' => $rating, 'p_id' => $p_id, 'r_name' => $name, 'email' => $email, 'message' => $message, 'added' => $added );		
$query 			= $database->insertdata('reviews', $data);
if($query) {
	echo "<div class='alert alert-success'>Review has been submitted</div>";
	?>
	<script>
		setTimeout(function() {
			var id =  <?php echo $p_id .';'; ?>
			window.location = 'details.php?p_id='+id;
		}, 3000 );
	</script>
	<?php
} else {
	echo "<div class='alert alert-danger'>Something is wrong.</div>";
}