<?php

	//require_once 'config.php';

	class database{

		public $connection;

		public function __construct(){
			$this->connection();
		}
		public function connection(){
			$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if(!$this->connection){
				echo "database is not connected".mysql_error($this->connection);
			}
			
			
		}
		// .......................data retrive korar jonno..........

		public function getData($table,$whichcolumn = array(),$columnname = null,$compare = null,$columnvalue = null){
			if(is_array($whichcolumn)){
				$whichcolumn = implode(",",$whichcolumn);
			}
			
			if(empty($columnname) && empty($columnvalue)){
				$query = "SELECT $whichcolumn FROM $table";
			}
			elseif (!empty($columnname) && !empty($columnvalue)) {
				$sql ="SELECT $whichcolumn FROM $table WHERE $columnname $compare $columnvalue";
				$query = $sql;
				
			}

			$query = mysqli_query($this->connection,$query);
			
			if($query)
				return $query;
			
			else
			
				return false;
			
		}
		// ........................data update korar jonno...........
		public function updatedata( $table, $whichColumn = array(), $columnName = null, $compare = null , $columnValue = null ) {

		$finalData = array();
		foreach ($whichColumn as $name => $value) {
			$finalData[] = "$name = '$value' ";
		}

		$finalData = implode(',', $finalData);
		
		$sql = "UPDATE $table SET $finalData WHERE $columnName $compare $columnValue ";

		$query = mysqli_query($this->connection, $sql);

		if($query)
			return $query;
		else 	
			return false;

	}

	/*................................data delete korar query..............*/
		public function deletedata( $table,$columnName , $columnValue) {

		
		$sql = "DELETE FROM $table  WHERE $columnName = $columnValue";

		$query = mysqli_query($this->connection, $sql);

		if($query)
			return $query;
		else 	
			return false;

	}
		//.....................data insert korar jonno...........
		public function insertdata( $table, $whichColumn = array()) {

		$columnname = array();
		$columnvalue = array();
		foreach ($whichColumn as $name => $value) {
			$columnvalue[] = "'$value'";
			$columnname[] = $name;
		}

		$columnname = implode(',', $columnname);
		$columnvalue = implode(',', $columnvalue);
		
		$sql = "INSERT INTO $table($columnname)VALUES($columnvalue)";

		$query = mysqli_query($this->connection, $sql);

		if($query)
			return $query;
		else 	
			return false;

	}

	/*............................join query function.............*/

	public function joinquery($table1,$table2,$table3,$whichcolumn = array(),$join,$subid,$sub_catid,$mainid){

		$finaldata = array();
		foreach($whichcolumn as $name => $value){
			$finaldata[]= "$value";
		}

		$columnname = implode(",", $finaldata);
	
		$sql = "SELECT $columnname FROM $table1 $join $table2 ON $table1.$subid = $table2.$subid $join $table3 ON $table1.$sub_catid = $table3.$sub_catid ORDER BY $table1.$mainid DESC";


		$query = mysqli_query($this->connection, $sql);

		if($query)
			return $query;
		else 	
			return false;



	}

		public function numRows($query){
			return mysqli_num_rows($query);
		}

		public function generatetoken(){
			$value = uniqid();
		}

		public function formtoken(){
			$value = self::generatetoken();
			
			$_SESSION['token'] = $value;


			return "<input type='hidden' name='token' value='$value'/>";
			unset($_SESSION['token']);
		}
		public function token($token){
			return $_POST['token'] == $_SESSION['token'] ? true : false;

		}


		
	}


?>