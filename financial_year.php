<?php include("header_admin.php"); ?>

<?php
	require("dbconn.php");
	
	$msg="";
	
	if(isset($_GET['msg'])){
		$msg=$_GET['msg'];
		$key=$_GET['id'];
	}
	
	$add_year="";
	
	if(strcmp($msg,"upd_fy")==0){
		$key=$_GET['id'];
		$sql="SELECT * FROM financial_year WHERE fy_id=$key";
		if($result=mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result)>0){
				while($row= mysqli_fetch_array($result)){
					$add_year=$row['year'];
				}
			}
		}
	}
	
	if(isset($_POST['fy_submit'])){
		
		$add_year=$_POST['add_year'];
		$def=$_POST['def'];
		$def_val=0;
		
		if(strcmp($def,"Yes")==0){
			$def_val=1;
			
			$sql1 = "UPDATE financial_year SET def='0' WHERE def='1' ";
			$result1=mysqli_query($conn, $sql1);
			
		}
		
		$sql2="INSERT INTO financial_year (year, def) VALUES ('$add_year', '$def_val')";
		$result2=mysqli_query($conn, $sql2);
		if($result2){
			echo '<script type="text/javascript">
					location.replace("financial_year.php");
				  </script>';
		}
		mysqli_close($conn);
	}
	
	if(isset($_POST['fy_update'])){
		
		$add_year=$_POST['add_year'];
		$def=$_POST['def'];
		$def_val=0;
		
		if(strcmp($def,"Yes")==0){
			$def_val=1;
			
			$sql1 = "UPDATE financial_year SET def='0' WHERE def='1' ";
			$result1=mysqli_query($conn, $sql1);
			
		}
		
		$sql2 = "UPDATE financial_year SET year='$add_year', def=$def_val WHERE fy_id=$key ";
		$result2=mysqli_query($conn, $sql2);
		if($result2){
			echo '<script type="text/javascript">
					location.replace("financial_year.php");
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
                            <h3 class="title-5 m-b-35">Add Financial Year</h3>
                            <div class="col-lg-9">
							
                                <div class="card">
									<div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Enter year: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="add_year" value="<?= $add_year ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Default: </label>
                                                </div>
												<div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="def_yes" class="form-check-label ">
                                                                <input type="radio" id="def_yes" name="def" value="Yes" class="form-check-input">Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="def_no" class="form-check-label ">
                                                                <input type="radio" id="def_no" name="def" value="No" class="form-check-input" checked>No
                                                            </label>
                                                        </div>
													</div>
												</div>
											</div>
											
											<div class="card-footer">
											
												<?php
													if(strcmp($msg,"upd_fy")==0){
														echo "<button type='submit' name='fy_submit' class='btn btn-primary btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='fy_update' class='btn btn-warning btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}else{
														echo "<button type='submit' name='fy_submit' class='btn btn-primary btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='fy_update' class='btn btn-warning btn-sm' disabled>";
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
							
								<h3 class="title-5 m-b-35">Financial Year</h3>
                               
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Sr.No</th>
												<th>Year</th>
                                                <th>Default</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										
											require("dbconn.php");
											$sql = "SELECT * FROM financial_year";
											$i=1;
											$def_yr="No";
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																if($row['def']==1){
																	$def_yr="Yes";
																}
																echo "<td>".$i++."</td>";
																echo "<td>".$row['year']."</td>";
																echo "<td>".$def_yr."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='financial_year.php?msg=upd_fy&id=".$row['fy_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
																		echo "<i class='zmdi zmdi-edit'></i>";
																		echo "</button></a>";
																	echo "</div>";
																echo "</td>";
															echo "</tr>";
															$def_yr="No";
													}
												}
											}
											
										?>
                                        </tbody>
                                    </table>
                                </div>
						</div>
                        
<?php include("footer_admin.php"); ?>