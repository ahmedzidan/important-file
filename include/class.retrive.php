<?php
		require_once('include/class.database.php');
         $DatabaseService = new DatabaseService;
		$DatabaseService->connect();
		$con = $DatabaseService->con;
		$result=$con->query("SELECT * FROM ourserv ");
		while($row=mysqli_fetch_array($result))
		{
		$title=$row['title'];
		$des=$row['description'];
        } 
		
?>