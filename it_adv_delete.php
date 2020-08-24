<?php
	require("dbconn.php");
	if(isset($_GET["id"])){
		$key = $_GET["id"];
		
		$sql = "DELETE FROM itadvocate_ WHERE it_adv_id=$key";
		if(mysqli_query($conn, $sql)){
			header("Location: it_advocate.php");
		}
	}
?>