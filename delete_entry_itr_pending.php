<?php
	require("dbconn.php");
	if(isset($_GET["id"])){
		$key = $_GET["id"];
		
		$sql = "DELETE FROM entry_itr_pending WHERE entry_itr_id=$key";
		if(mysqli_query($conn, $sql)){
			header("Location: entry_itr_pending.php");
		}
	}
?>