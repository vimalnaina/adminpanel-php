<?php
	require("dbconn.php");
	if(isset($_GET["id"])){
		$key = $_GET["id"];
		
		$sql = "DELETE FROM entry_gst WHERE entry_gst_id=$key";
		if(mysqli_query($conn, $sql)){
			header("Location: entry_gst.php");
		}
	}
?>