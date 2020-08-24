<?php include("header_admin.php"); ?>

<?php
	require("dbconn.php");
	$msg=$_GET["msg"];
	$key="";
	
	$itr_year="";
	$itr_call="";
	$cust_name="";
	$itr_wp="";
	$itr_sms="";
	$pending_details="";
	
	if(strcmp($msg,"Update ITR Pending Entry")==0){
		$key=$_GET['id'];
		$sql="SELECT * FROM entry_itr_pending WHERE entry_itr_id=$key";
		if($result=mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result)>0){
				while($row= mysqli_fetch_array($result)){
					
					$fy_id=$row['fy_id'];
					$itr_call=$row['itr_call'];
					$c_id=$row['cust_id'];
					$itr_wp=$row['itr_whatsapp'];
					$itr_sms=$row['itr_sms'];
					$pending_details=$row['pending_details'];
					
					$query="SELECT cust_name FROM customer_ WHERE cust_id=$c_id";
					if($result=mysqli_query($conn, $query)){
						if(mysqli_num_rows($result)>0){
							while($row= mysqli_fetch_array($result)){
								$cust_name=$row['cust_name'];
							}
						}
					}
					
					$query2="SELECT year FROM financial_year WHERE fy_id=$fy_id";
					if($result2=mysqli_query($conn, $query2)){
						if(mysqli_num_rows($result2)>0){
							while($row2= mysqli_fetch_array($result2)){
								$itr_year=$row2['year'];
							}
						}
					}
				}
			}
		}
	}
	
	if(isset($_POST['entry_itr_pending_submit'])){
		
		$itr_year=$_POST['itr_year'];
		$itr_call=$_POST['itr_call'];
		$cust_name=$_POST['cust_name'];
		$itr_wp=$_POST['itr_wp'];
		$itr_sms=$_POST['itr_sms'];
		$pending_details=$_POST['pending_details'];
		
		$year_id="";	
		$cust_id="";
		
		$sql1 = "SELECT cust_id FROM customer_ where cust_name='$cust_name'";
		if($result1=mysqli_query($conn,$sql1)){
			if(mysqli_num_rows($result1)>0){
				while($row= mysqli_fetch_array($result1)){
					$cust_id=$row['cust_id'];
				}
			}
		}
		
		$sql2 = "SELECT fy_id FROM financial_year where year='$itr_year'";
		if($result2=mysqli_query($conn,$sql2)){
			if(mysqli_num_rows($result2)>0){
				while($row= mysqli_fetch_array($result2)){
					$year_id=$row['fy_id'];
				}
			}
		}
		
		$sql3="INSERT INTO entry_itr_pending (cust_id, fy_id, itr_call, itr_whatsapp, itr_sms, pending_details) VALUES ('$cust_id', '$year_id', '$itr_call', '$itr_wp', '$itr_sms', '$pending_details')";
		
		if(strcmp($cust_id,"")==0){
			echo '<script type="text/javascript">
					alert("customer not found!");
				</script>';
		}else{
		$result3=mysqli_query($conn, $sql3);
			if($result3){
				echo '<script type="text/javascript">
						location.replace("entry_itr_pending.php");
					  </script>';
			}
		}
		mysqli_close($conn);
	}
	
	if(isset($_POST["entry_itr_pending_update"])){
		
		$itr_year=$_POST['itr_year'];
		$itr_call=$_POST['itr_call'];
		$cust_name=$_POST['cust_name'];
		$itr_wp=$_POST['itr_wp'];
		$itr_sms=$_POST['itr_sms'];
		$pending_details=$_POST['pending_details'];
		
		$year_id="";	
		$cust_id="";
		
		$sql1 = "SELECT cust_id FROM customer_ where cust_name='$cust_name'";
		if($result1=mysqli_query($conn,$sql1)){
			if(mysqli_num_rows($result1)>0){
				while($row= mysqli_fetch_array($result1)){
					$cust_id=$row['cust_id'];
				}
			}
		}
		
		$sql2 = "SELECT fy_id FROM financial_year where year='$itr_year'";
		if($result2=mysqli_query($conn,$sql2)){
			if(mysqli_num_rows($result2)>0){
				while($row= mysqli_fetch_array($result2)){
					$year_id=$row['fy_id'];
				}
			}
		}
					
		$sql3 = "UPDATE entry_itr_pending SET cust_id='$cust_id', fy_id='$year_id', itr_call='$itr_call', itr_whatsapp='$itr_wp', itr_sms='$itr_sms', pending_details='$pending_details' WHERE entry_itr_id=$key";
					
		$result3=mysqli_query($conn, $sql3);
		if($result3){
			echo '<script type="text/javascript">
					location.replace("entry_itr_pending.php");
				  </script>';
		}
		mysqli_close($conn);
	}
?>

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            <h3 class="title-5 m-b-35"><?= $msg ?></h3>
                            <div class="col-lg-9">
                                <div class="card">
									<div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Year: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="itr_year" id="select" class="form-control">
														<?php
															require("dbconn.php");
															$query1="SELECT year FROM financial_year WHERE def=0 ORDER BY year";
															$query2="SELECT year FROM financial_year WHERE def=1 ";
															$fy="";
															if($result2=mysqli_query($conn, $query2)){
																if(mysqli_num_rows($result2)>0){
																	while($row2= mysqli_fetch_array($result2)){
																		$fy=$row2['year'];
																	}
																}
															}
															
															if($fy!=null || $fy!=""){
																echo "<option value='".$fy."'>";
																echo $fy;
																echo "</option>";
															}
															else{
																echo "<option value=''> Select Year </option>";
															}
															
															if($result1=mysqli_query($conn, $query1)){
																if(mysqli_num_rows($result1)>0){
																	while($row1= mysqli_fetch_array($result1)){
																		echo "<option value='".$row1['year']."'>";
																		echo $row1['year'];
																		echo "</option>";
																	}
																}
															}
														?>
                                                    </select>
                                                </div>
                                            </div>
											
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Customer Name: </label>
                                                </div>
												<div class="col-12 col-md-9">
													<input list="cust_name" name="cust_name" value="<?= $cust_name ?>" class="form-control">
													<datalist id="cust_name">
														<?php
															require("dbconn.php");
															$query="SELECT cust_name FROM customer_ ORDER BY cust_name";
															
															if($result=mysqli_query($conn, $query)){
																if(mysqli_num_rows($result)>0){
																	while($row= mysqli_fetch_array($result)){
																		echo "<option value='".$row['cust_name']."'>";
																	}
																}
															}
														?>
													</datalist>
												</div>
											</div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Call: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="itr_call" value="<?= $itr_call ?>" class="form-control" > 
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Whatsapp: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="itr_wp" value="<?= $itr_wp ?>" class="form-control">
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">SMS: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="itr_sms" value="<?= $itr_sms ?>" class="form-control">
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Pending Details: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="pending_details" rows="6" class="form-control"><?= $pending_details ?></textarea>
                                                </div>
                                            </div>
											
											<div class="card-footer">
											
												<?php
													if(strcmp($msg,"Update ITR Pending Entry")==0){
														echo "<button type='submit' name='entry_itr_pending_submit' class='btn btn-primary btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='entry_itr_pending_update' class='btn btn-warning btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}else{
														echo "<button type='submit' name='entry_itr_pending_submit' class='btn btn-primary btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='entry_itr_pending_update' class='btn btn-warning btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}
												?>
												
												<button type="reset" class="btn btn-danger btn-sm">
													<i class="fa fa-ban"></i> Reset
												</button>
												
												<button type="submit" class="btn btn-success btn-sm">
													<i class="fa fa-dot-circle-o"></i> SMS Now
												</button>
												
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<?php include("footer_admin.php"); ?>