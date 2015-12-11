<?php
Class DatabaseService {
	function connect() {
		$con = mysqli_connect('localhost','root','','iddo');
		if(!$con) {
			die ("Cannot connect to the database");
		}
		else {
			$this->con = $con;
		}
		if(mysqli_error($con)) {
			echo "Cannot find the database ".$this->database;
		}
	}
	function close() {
		mysqli_close($this->con);
	}

}
?>
