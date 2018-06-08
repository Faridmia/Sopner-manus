<?php
	require_once('init.php');
	require_once('functions.php');

	$database = new Database();

	$p_id = (int) $_POST['p_id'];
    $sub_id = isset($_POST['sub_id']) ? (int) $_POST['sub_id'] : '';

	$data        = array('sub_id','sub_name');
    $query       = $database->getData("sub_categories",$data,"cat_id", "=", "$p_id");
    echo "<div class='form-group'>";
    echo "<label for='p_name' class='col-sm-4 control-label'>Product Sub category</label>";
    echo "<div class='col-sm-8'>";
    echo "<select name='p_sub_category' class='form-control'>";

    while ($row = mysqli_fetch_array($query)) {
    	$db_sub_id    = (int) $row['sub_id'];
    	$sub_name  = $row['sub_name'];
        if($sub_id == $db_sub_id){
            $sel = 'selected = "selected" ';
        }
        else
        {
            $sel = '';
        }
    	echo "<option $sel value='$db_sub_id'>$sub_name</option>";
    	
    }

    echo "</select>";
    echo "</div>";
    echo "</div>";


?>