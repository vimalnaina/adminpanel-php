<?php include("header_admin.php"); ?>

<?php
	require("dbconn.php");
	$file=$_GET["file"];
	$msg=$_GET["msg"];
	$key="";
	
	$it_year="";
	$ret_file_date="";
	$cust_name="";
	$verif_type="";
	$receipt_date="";
	$remarks="";
	
	if(strcmp($msg,"Update IT Entry")==0){
		$key=$_GET['id'];
		$sql="SELECT * FROM entry_it WHERE entry_it_id=$key";
		if($result=mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result)>0){
				while($row= mysqli_fetch_array($result)){
					
					$fy_id=$row['fy_id'];
					$ret_file_date=$row['return_file'];
					$c_id=$row['cust_id'];
					$verif_type=$row['verif_type'];
					$receipt_date=$row['receipt_date'];
					$remarks=$row['remarks'];
					
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
								$it_year=$row2['year'];
							}
						}
					}
				}
			}
		}
	}
	
	if(isset($_POST['entry_it_submit'])){
		
		$it_year=$_POST['it_year'];
		$ret_file_date=$_POST['ret_file_date'];
		$cust_name=$_POST['cust_name'];
		$verif_type=$_POST['verif_type'];
		$receipt_date=$_POST['receipt_date'];
		$remarks=$_POST['remarks'];
		
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
		
		$sql2 = "SELECT fy_id FROM financial_year where year='$it_year'";
		if($result2=mysqli_query($conn,$sql2)){
			if(mysqli_num_rows($result2)>0){
				while($row= mysqli_fetch_array($result2)){
					$year_id=$row['fy_id'];
				}
			}
		}
		
		$sql3="INSERT INTO entry_it (cust_id, fy_id, return_file, verif_type, receipt_date, remarks) VALUES ('$cust_id', '$year_id', '$ret_file_date', '$verif_type', '$receipt_date', '$remarks')";
		
		if(strcmp($cust_id,"")==0){
			echo '<script type="text/javascript">
					alert("customer not found!");
				</script>';
		}else{
			$result3=mysqli_query($conn, $sql3);
			if($result3){
				echo '<script type="text/javascript">
						location.replace("entry_it.php");
					  </script>';
			}
		}
		mysqli_close($conn);
	}
	
	if(isset($_POST["entry_it_update"])){
		
		$it_year=$_POST['it_year'];
		$ret_file_date=$_POST['ret_file_date'];
		$cust_name=$_POST['cust_name'];
		$verif_type=$_POST['verif_type'];
		$receipt_date=$_POST['receipt_date'];
		$remarks=$_POST['remarks'];
		
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
		
		$sql2 = "SELECT fy_id FROM financial_year where year='$it_year'";
		if($result2=mysqli_query($conn,$sql2)){
			if(mysqli_num_rows($result2)>0){
				while($row= mysqli_fetch_array($result2)){
					$year_id=$row['fy_id'];
				}
			}
		}
					
		$sql3 = "UPDATE entry_it SET cust_id='$cust_id', fy_id='$year_id', return_file='$ret_file_date', verif_type='$verif_type', receipt_date='$receipt_date', remarks='$remarks' WHERE entry_it_id=$key";
					
		$result3=mysqli_query($conn, $sql3);
		if($result3){
			if(strcmp($file,"report_it")==0){
				echo '<script type="text/javascript">
						location.replace("report_it_entry.php");
					</script>';
			}
			else{
				echo '<script type="text/javascript">
					location.replace("entry_it.php");
				  </script>';
			}
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
                                                    <select name="it_year" id="select" class="form-control">
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
                                                    <label for="text-input" class=" form-control-label">Return File Date: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="ret_file_date" value="<?= $ret_file_date ?>" class="form-control"> 
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Verification Type: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="verif_type" id="select" class="form-control">
														<option value="E-Verify">E-Verify</option>
                                                        <option value="Manual">Manual</option>
                                                    </select>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Receipt Date: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="receipt_date" value="<?= $receipt_date ?>" class="form-control" >
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Remarks: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="remarks" rows="6" class="form-control"><?= $remarks ?></textarea>
                                                </div>
                                            </div>
											
											<div class="card-footer">
											
												<?php
													if(strcmp($msg,"Update IT Entry")==0){
														echo "<button type='submit' name='entry_it_submit' class='btn btn-primary btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='entry_it_update' class='btn btn-warning btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}else{
														echo "<button type='submit' name='entry_it_submit' class='btn btn-primary btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='entry_it_update' class='btn btn-warning btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}
												?>
												<button type="reset" class="btn btn-danger btn-sm">
													<i class="fa fa-ban"></i> Reset
												</button>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
<?php include("footer_admin.php"); ?>