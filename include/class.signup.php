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
//function to call service ==
function CallAPI($method, $url, $data = false) {
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
//===========================================================
//=how to call service -------------
CallAPI("GET", OPERATIONS_SERVICES_BASE_URL . "drivers/{$driver_id}");
