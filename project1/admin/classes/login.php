<?php
	class login{

		private $connection;
		public $username;
		public $password;

		public function __construct(){
			$db = new database();
			$this->connection = $db->connection;
			/*$this->username = $username;
			$this->password = $password;*/

		}
		public function logindata($username,$password){

			$select = mysqli_query($this->connection,"SELECT * FROM admin WHERE username='$username' AND password = '$password'");
			$rows = mysqli_num_rows($select);
			if($rows === 1){
				return true;
			}

			else
			{
				return false;
			}

		}

		public function islogin(){
			if(!isset($_SESSION['username']) && isset($_SESSION['username']) == ''){
				return false;
			}
			else
			{
				return true;
			}
		}

		public function logout(){
			if(isset($_SESSION['username']) && $_SESSION['username'] !== ''){
				unset($_SESSION['username']);
				header('location:login.php');
				exit();
			}
			
		}
		
	}

?>