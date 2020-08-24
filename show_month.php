<?php
	require("dbconn.php");
	
	$month = $_GET["month"];
	$category = $_GET["category"];
	$cust_id=0;
	$sql="";
	$query="";
	if(strcmp($category,"GST3B")==0)
		$sql="SELECT cust_id FROM entry_gst WHERE month='$month' && gst3b='0000-00-00'";
	if(strcmp($category,"GSTR1")==0)
		$sql="SELECT cust_id FROM entry_gst WHERE month='$month' && gstr1='0000-00-00'";
	if(strcmp($category,"CMP8")==0)
		$sql="SELECT cust_id FROM entry_gst WHERE month='$month' && cmp8='0000-00-00'";
	
	if($result=mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result)>0){
			while($row= mysqli_fetch_array($result)){
				$cust_id=$row['cust_id'];
				
			}
		}
	}
	$query="SELECT cust_name FROM customer_ WHERE cust_id != '$cust_id' ORDER BY cust_name";
	echo '<div class="row form-group">';
		echo '<div class="col col-md-3">';
			echo '<label for="text-input" class=" form-control-label">Customer Name: </label>';
		echo '</div>';
		echo '<div class="col-12 col-md-9">';
			echo '<input list="cust_name" name="cust_name" class="form-control">';
			echo '<datalist id="cust_name">';
				if($result1=mysqli_query($conn, $query)){
																if(mysqli_num_rows($result1)>0){
																	while($row1= mysqli_fetch_array($result1)){
																		echo "<option value='".$row1['cust_name']."'>";
																	}
																}
															}
			echo '</datalist>';
		echo '</div>';
	echo '</div>';
?>