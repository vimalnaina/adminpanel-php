<?php
	require("dbconn.php");
	if(isset($_GET["id"])){
		$key = $_GET["id"];
		
		$sql = "DELETE FROM customer_ WHERE cust_id=$key";
		if(mysqli_query($conn, $sql)){
			header("Location: customer.php");
		}
	}
?>