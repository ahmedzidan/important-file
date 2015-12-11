<?php
require_once('class.database.php');
Class SignupService {
	
	function insert($fname , $lname , $email , $pass) {
	    $DatabaseService = new DatabaseService;
		$DatabaseService->connect();
		$con = $DatabaseService->con;
		$con->query("insert into users (f-name,l-name,email,password) values ('$fname','$lname','$email','$pass')");
        echo json_encode(array("OK"=>"signup sucess"));
		exit;
	}

}

if($_REQUEST['method'] == "insert" AND $_REQUEST['Fname'] AND $_REQUEST['Lname'] AND $_REQUEST['Email'] AND $_REQUEST['Pass']) {
	$UsernameService = new UsernameService;
	$UsernameService->insert($_REQUEST['Fname'] , $_REQUEST['Lname'] , $_REQUEST['Email'] , $_REQUEST['Pass']);
	
	
}
