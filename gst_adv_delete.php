<?php
	require("dbconn.php");
	if(isset($_GET["id"])){
		$key = $_GET["id"];
		
		$sql = "DELETE FROM gstadvocate_ WHERE gst_adv_id=$key";
		if(mysqli_query($conn, $sql)){
			header("Location: gst_advocate.php");
		}
	}
?>