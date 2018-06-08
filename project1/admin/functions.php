<?php

	$database = new Database();
	$conn = $database->connection;
	function escape($data){
		global $conn;
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		$data = filter_var($data,FILTER_SANITIZE_SPECIAL_CHARS);
		$data = mysqli_real_escape_string($conn,$data);
		return $data;
	}


	function random($length){
     $token = "";
     $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
     $codeAlphabet.= "0123456789";
     $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }

    return $token;
}


?>