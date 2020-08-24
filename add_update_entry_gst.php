<?php include("header_admin.php"); ?>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
				$(function(){
					$('#div_cmp8').hide();
					$('#div_gstr1').hide();
					$('#div_gst3b').hide();
					$('input:radio[name=category]').click(function(){
						var gst_radio = $('input:radio[name=category]:checked').val();
						if(gst_radio=="Regular"){
							$('#div_cmp8').hide();
							$('#div_gstr1').show();
							$('#div_gst3b').show();
						}else{
							$('#div_cmp8').show();
							$('#div_gstr1').hide();
							$('#div_gst3b').hide();
						}
					});
				});
			</script>

<?php
	require("dbconn.php");
	$file=$_GET["file"];
	$msg=$_GET["msg"];
	$key="";
	
	$gst_year="";
	$gst_month="";
	$cust_name="";
	$gst3b="";
	$gstr1="";
	$cmp8="";
	
	if(strcmp($msg,"Update GST Entry")==0){
		$key=$_GET['id'];
		$sql="SELECT * FROM entry_gst WHERE entry_gst_id=$key";
		if($result=mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result)>0){
				while($row= mysqli_fetch_array($result)){
					
					$fy_id=$row['fy_id'];
					$gst_month=$row['month'];
					$c_id=$row['cust_id'];
					$gst3b=$row['gst3b'];
					$gstr1=$row['gstr1'];
					$cmp8=$row['cmp8'];
					
					$query1="SELECT cust_name FROM customer_ WHERE cust_id=$c_id";
					if($result1=mysqli_query($conn, $query1)){
						if(mysqli_num_rows($result1)>0){
							while($row1= mysqli_fetch_array($result1)){
								$cust_name=$row1['cust_name'];
							}
						}
					}
					
					$query2="SELECT year FROM financial_year WHERE fy_id=$fy_id";
					if($result2=mysqli_query($conn, $query2)){
						if(mysqli_num_rows($result2)>0){
							while($row2= mysqli_fetch_array($result2)){
								$gst_year=$row2['year'];
							}
						}
					}
					
				}
			}
		}
	}
	
	if(isset($_POST['entry_gst_submit'])){
		
		$gst_year=$_POST['gst_year'];
		$gst_month=$_POST['gst_month'];
		$cust_name=$_POST['cust_name'];
		$gst3b=$_POST['gst3b'];
		$gstr1=$_POST['gstr1'];
		$cmp8=$_POST['cmp8'];
		
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
		
		$sql2 = "SELECT fy_id FROM financial_year where year='$gst_year'";
		if($result2=mysqli_query($conn,$sql2)){
			if(mysqli_num_rows($result2)>0){
				while($row= mysqli_fetch_array($result2)){
					$year_id=$row['fy_id'];
				}
			}
		}
		
		$sql3="INSERT INTO entry_gst (cust_id, fy_id, month, gst3b, gstr1, cmp8) VALUES ('$cust_id', '$year_id', '$gst_month', '$gst3b', '$gstr1', '$cmp8')";
		
		if(strcmp($cust_id,"")==0){
			echo '<script type="text/javascript">
					alert("customer not found!");
				</script>';
		}else{
			$result3=mysqli_query($conn, $sql3);
			if($result3){
				echo '<script type="text/javascript">
						location.replace("entry_gst.php");
					  </script>';
			}
		}
		
		mysqli_close($conn);
	}
	
	if(isset($_POST["entry_gst_update"])){
		
		$gst_year=$_POST['gst_year'];
		$gst_month=$_POST['gst_month'];
		$cust_name=$_POST['cust_name'];
		$gst3b=$_POST['gst3b'];
		$gstr1=$_POST['gstr1'];
		$cmp8=$_POST['cmp8'];
		
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
		
		$sql2 = "SELECT fy_id FROM financial_year where year='$gst_year'";
		if($result2=mysqli_query($conn,$sql2)){
			if(mysqli_num_rows($result2)>0){
				while($row= mysqli_fetch_array($result2)){
					$year_id=$row['fy_id'];
				}
			}
		}
					
		$sql3 = "UPDATE entry_gst SET cust_id='$cust_id', fy_id='$year_id', month='$gst_month', entry_gst_3B='$gst3b', gstr1='$gstr1', cmp8='$cmp8' WHERE entry_gst_id=$key";
					
		$result3=mysqli_query($conn, $sql3);
		if($result3){
			if(strcmp($file,"report_gstr1")==0){
				echo '<script type="text/javascript">
						location.replace("report_gstr1_entry.php");
					</script>';
			}
			else if(strcmp($file,"report_gst3b")==0){
				echo '<script type="text/javascript">
						location.replace("report_gst3b_entry.php");
					</script>';
			}
			else{
				echo '<script type="text/javascript">
						location.replace("entry_gst.php");
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
                                                    <select name="gst_year" id="select" class="form-control">
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
                                                    <label for="text-input" class=" form-control-label">Month: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="gst_month" id="select" class="form-control">
														<option value="April">April</option>
                                                        <option value="May">May</option>
														<option value="June">June</option>
														<option value="July">July</option>
														<option value="August">August</option>
														<option value="September">September</option>
														<option value="October">October</option>
														<option value="November">November</option>
														<option value="December">December</option>
														<option value="January">January</option>
														<option value="February">February</option>
														<option value="March">March</option>
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
                                                    <label class=" form-control-label">Category: </label>
                                                </div>
												<div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="cat_yes" class="form-check-label ">
                                                                <input type="radio" id="cat_yes" name="category" value="Regular" class="form-check-input">Regular
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="cat_no" class="form-check-label ">
                                                                <input type="radio" id="cat_no" name="category" value="Composition" class="form-check-input">Composition
                                                            </label>
                                                        </div>
													</div>
												</div>
											</div>
											
											<div class="row form-group" id="div_gst3b">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">GST3B: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="gst3b" class="form-control" value="<?= $gst3b ?>"> 
                                                </div>
                                            </div>
											
											<div class="row form-group" id="div_gstr1">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">GSTR1: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="gstr1" class="form-control" value="<?= $gstr1 ?>"> 
                                                </div>
                                            </div>
											
											<div class="row form-group" id="div_cmp8">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">CMP8: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="cmp8" class="form-control" value="<?= $cmp8 ?>"> 
                                                </div>
                                            </div>
											
											<div class="card-footer">
											
												<?php
													if(strcmp($msg,"Update GST Entry")==0){
														echo "<button type='submit' name='entry_gst_submit' class='btn btn-primary btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='entry_gst_update' class='btn btn-warning btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}else{
														echo "<button type='submit' name='entry_gst_submit' class='btn btn-primary btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='entry_gst_update' class='btn btn-warning btn-sm' disabled>";
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