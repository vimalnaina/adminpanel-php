<?php include_once("header_admin.php");?>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
				$(function(){
					$('#div_gst_num').hide();
					$('#div_gst_category').hide();
					$('#div_gst_adv').hide();
					$('#div_gst_reg_date').hide();
					$('input:radio[name=gst]').click(function(){
						var gst_radio = $('input:radio[name=gst]:checked').val();
						if(gst_radio=="Yes"){
							$('#div_gst_num').show();
							$('#div_gst_category').show();
							$('#div_gst_adv').show();
							$('#div_gst_reg_date').show();
						}else{
							$('#div_gst_num').hide();
							$('#div_gst_category').hide();
							$('#div_gst_adv').hide();
							$('#div_gst_reg_date').hide();
						}
					});
				});
			</script>
			
			<?php
				require("dbconn.php");
				$file=$_GET["file"];
				$msg=$_GET["msg"];
				$key="";
				
				$file_no="";
				$cust_name="";
				$pan_no="";
				$cont_person_1="";
				$mob_no_1="";
				$cont_person_2="";
				$mob_no_2="";
				$address="";
				$city="";
				$email="";
				$it_adv="";
				$dsc_date="";
				$agri="";
				$gst_no="";
				$category="";
				$gst_adv="";
				$gst_reg_date="";
				$status="Active";
								
				if(strcmp($msg,"Deactivate Customer")==0){
					$key=$_GET['id'];
					$sql = "UPDATE customer_ SET status='Deactive' WHERE cust_id=$key";
					$result=mysqli_query($conn, $sql);
					if($result){
						echo '<script type="text/javascript">
								location.replace("customer.php");
							  </script>';
					}
					mysqli_close($conn);
				}
				
				if(strcmp($msg,"Activate Customer")==0){
					$key=$_GET['id'];
					$sql = "UPDATE customer_ SET status='Active' WHERE cust_id=$key";
					$result=mysqli_query($conn, $sql);
					if($result){
						echo '<script type="text/javascript">
								location.replace("customer.php");
							  </script>';
					}
					mysqli_close($conn);
				}
				
				if(strcmp($msg,"Update Customer")==0){
					$key=$_GET['id'];
					$sql="SELECT * FROM customer_ WHERE cust_id=$key";
					if($result=mysqli_query($conn, $sql)){
						if(mysqli_num_rows($result)>0){
							while($row= mysqli_fetch_array($result)){
								$file_no=$row['file_no'];
								$cust_name=$row['cust_name'];
								$pan_no=$row['pan_no'];
								$cont_person_1=$row['cont_person_1'];
								$mob_no_1=$row['mob_no_1'];
								$cont_person_2=$row['cont_person_2'];
								$mob_no_2=$row['mob_no_2'];
								$address=$row['address'];
								$city=$row['city'];
								$email=$row['email'];
								$it_adv=$row['it_adv'];
								$dsc_date=$row['dsc_date'];
								$agri=$row['agriculture'];
								$gst_no=$row['gst_no'];
								$category=$row['category'];
								$gst_adv=$row['gst_adv'];
								$gst_reg_date=$row['gst_reg_date'];
							}
						}
					}
				}
				
				if(isset($_POST["cust_submit"])){
					
					$file_no=$_POST["file_no"];
					$cust_name=$_POST["cust_name"];
					$pan_no=$_POST["pan_no"];
					$cont_person_1=$_POST["cont_person_1"];
					$mob_no_1=$_POST["mob_no_1"];
					$cont_person_2=$_POST["cont_person_2"];
					$mob_no_2=$_POST["mob_no_2"];
					$address=$_POST["address"];
					$city=$_POST["city"];
					$email=$_POST["email"];
					$it_adv=$_POST["it_adv"];
					$dsc_date=$_POST["dsc_date"];
					$agri=$_POST["agri"];
					$gst_no=$_POST["gst_no"];
					$category=$_POST["category"];
					$gst_adv=$_POST["gst_adv"];
					$gst_reg_date=$_POST["gst_reg_date"];
					$gst=$_POST["gst"];
					
					$sql="";
					$isUser=0;
					
					$sql2 = "SELECT pan_no FROM customer_ WHERE cust_name='$cust_name'";
					$check_pno="";
					if($result2=mysqli_query($conn, $sql2)){
						if(mysqli_num_rows($result2)>0){
							while($row2= mysqli_fetch_array($result2)){
								$check_pno=$row2['pan_no'];
							}
						}
					}
					if($check_pno==$pan_no){
						$isUser=1;
					}else{
						$isUser=0;
					}
					
					if(strcmp($gst,"Yes")==0){
						$sql = "INSERT INTO customer_(file_no, cust_name, pan_no, cont_person_1, mob_no_1, cont_person_2, mob_no_2, address, city, email, it_adv, dsc_date, agriculture, gst_no, category, gst_adv, gst_reg_date, status) VALUES ('$file_no', '$cust_name', '$pan_no', '$cont_person_1', '$mob_no_1', '$cont_person_2', '$mob_no_2', '$address', '$city', '$email', '$it_adv', '$dsc_date', '$agri', '$gst_no', '$category', '$gst_adv', '$gst_reg_date', '$status')";
					}
					else{
						$sql = "INSERT INTO customer_(file_no, cust_name, pan_no, cont_person_1, mob_no_1, cont_person_2, mob_no_2, address, city, email, it_adv, dsc_date, agriculture, status) VALUES ('$file_no', '$cust_name', '$pan_no', '$cont_person_1', '$mob_no_1', '$cont_person_2', '$mob_no_2', '$address', '$city', '$email', '$it_adv', '$dsc_date', '$agri', '$status')";
					}
					
					if($isUser==0){
						$result=mysqli_query($conn, $sql);
						if($result){
							echo '<script type="text/javascript">
									location.replace("customer.php");
								</script>';
						}
					}
					else{
						echo '<script type="text/javascript">
									alert("customer name already exists!");
								</script>';
					}
					mysqli_close($conn);
				}
				
				if(isset($_POST["cust_update"])){
					
					$file_no=$_POST["file_no"];
					$cust_name=$_POST["cust_name"];
					$pan_no=$_POST["pan_no"];
					$cont_person_1=$_POST["cont_person_1"];
					$mob_no_1=$_POST["mob_no_1"];
					$cont_person_2=$_POST["cont_person_2"];
					$mob_no_2=$_POST["mob_no_2"];
					$address=$_POST["address"];
					$city=$_POST["city"];
					$email=$_POST["email"];
					$it_adv=$_POST["it_adv"];
					$dsc_date=$_POST["dsc_date"];
					$agri=$_POST["agri"];
					$gst_no=$_POST["gst_no"];
					$category=$_POST["category"];
					$gst_adv=$_POST["gst_adv"];
					$gst_reg_date=$_POST["gst_reg_date"];
										
					$sql = "UPDATE customer_ SET file_no='$file_no', cust_name='$cust_name', pan_no='$pan_no', cont_person_1='$cont_person_1', mob_no_1='$mob_no_1', cont_person_2='$cont_person_2', mob_no_2='$mob_no_2', address='$address', city='$city', email='$email', it_adv='$it_adv', dsc_date='$dsc_date', agriculture='$agri', gst_no='$gst_no', category='$category', gst_adv='$gst_adv', gst_reg_date='$gst_reg_date' WHERE cust_id=$key";
					
					$result=mysqli_query($conn, $sql);
					if($result){
						if(strcmp($file,"report")==0){
							echo '<script type="text/javascript">
								location.replace("report_customer.php");
							  </script>';
						}
						else{
							echo '<script type="text/javascript">
								location.replace("customer.php");
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
                                                    <label for="text-input" class=" form-control-label">File No: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="file_no" value="<?= $file_no ?>" class="form-control" required>
                                                </div>
                                            </div>
											
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Customer Name: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="cust_name" value="<?= $cust_name ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">PAN No: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="pan_no" value="<?= $pan_no ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Contact Person 1: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="cont_person_1" value="<?= $cont_person_1 ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Mobile No 1: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="mob_no_1" value="<?= $mob_no_1 ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Contact Person 2: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="cont_person_2" value="<?= $cont_person_2 ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Mobile No 2: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="mob_no_2" value="<?= $mob_no_2 ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Address: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="address" rows="6" class="form-control" required><?= $address ?></textarea>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">City: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="city" value="<?= $city ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Email: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" name="email" value="<?= $email ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">IT Advocate: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="it_adv" id="select" class="form-control">
                                                        <option value="Self">Self</option>
														<?php
															require("dbconn.php");
															$query="SELECT name FROM itadvocate_ ORDER BY name";
															if($result=mysqli_query($conn, $query)){
																if(mysqli_num_rows($result)>0){
																	while($row= mysqli_fetch_array($result)){
																		echo "<option value='".$row['name']."'>";
																		echo $row['name'];
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
                                                    <label for="text-input" class=" form-control-label">DSC Date: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="dsc_date" value="<?= $dsc_date ?>" class="form-control" required> 
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Agriculture: </label>
                                                </div>
												<div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="agri_yes" class="form-check-label ">
                                                                <input type="radio" id="agri_yes" name="agri" value="Yes" class="form-check-input">Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="agri_no" class="form-check-label ">
                                                                <input type="radio" id="agri_no" name="agri" value="No" class="form-check-input" checked>No
                                                            </label>
                                                        </div>
													</div>
												</div>
											</div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">GST: </label>
                                                </div>
												<div class="col col-md-9">
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="gst_yes" class="form-check-label ">
                                                                <input type="radio" id="gst_yes" name="gst" value="Yes" class="form-check-input">Yes
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="gst_no" class="form-check-label ">
                                                                <input type="radio" id="gst_no" name="gst" value="No" class="form-check-input" checked>No
                                                            </label>
                                                        </div>
													</div>
												</div>
											</div>
											
											<div class="row form-group"  id="div_gst_num">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">GST Number: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="gst_no" value="<?= $gst_no ?>" class="form-control">
                                                </div>
                                            </div>
											
											<div class="row form-group" id="div_gst_category">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Category: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select" class="form-control">
                                                        <option value="Regular">Regular</option>
                                                        <option value="Composition">Composition</option>
                                                    </select>
                                                </div>
                                            </div>
											
											<div class="row form-group" id="div_gst_adv">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">GST Advocate: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="gst_adv" id="select" class="form-control">
                                                        <option value="Self">Self</option>
														<?php
															require("dbconn.php");
															$query="SELECT name FROM gstadvocate_ ORDER BY name";
															if($result=mysqli_query($conn, $query)){
																if(mysqli_num_rows($result)>0){
																	while($row= mysqli_fetch_array($result)){
																		echo "<option value='".$row['name']."'>";
																		echo $row['name'];
																		echo "</option>";
																	}
																}
															}
														?>
                                                    </select>
                                                </div>
                                            </div>
											
											<div class="row form-group" id="div_gst_reg_date">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">GST Reg Date: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" name="gst_reg_date" value="<?= $gst_reg_date ?>" class="form-control"> 
                                                </div>
                                            </div>
											
											<div class="card-footer">
											
												<?php
													if(strcmp($msg,"Update Customer")==0){
														echo "<button type='submit' name='cust_submit' class='btn btn-primary btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='cust_update' class='btn btn-warning btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}else{
														echo "<button type='submit' name='cust_submit' class='btn btn-primary btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='cust_update' class='btn btn-warning btn-sm' disabled>";
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