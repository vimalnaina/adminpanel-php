<?php include("header_admin.php"); ?>
			<?php
				require("dbconn.php");
				$msg=$_GET["msg"];
				$key=$_GET["id"];
				
				$name="";
				$comp_name="";
				$email="";
				$cont_person_1="";
				$mob_no_1="";
				$cont_person_2="";
				$mob_no_2="";
				
				if(strcmp($msg,"Update GST Advocate")==0){
					$sql="SELECT * FROM gstadvocate_ WHERE gst_adv_id=$key";
					if($result=mysqli_query($conn, $sql)){
						if(mysqli_num_rows($result)>0){
							while($row= mysqli_fetch_array($result)){
								$name=$row['name'];
								$comp_name=$row['comp_name'];
								$email=$row['email'];
								$cont_person_1=$row['cont_person_1'];
								$mob_no_1=$row['mob_no_1'];
								$cont_person_2=$row['cont_person_2'];
								$mob_no_2=$row['mob_no_2'];
							}
						}
					}
				}
				
				if(isset($_POST["gst_adv_submit"])){
					
					$name=$_POST['name'];
					$comp_name=$_POST['comp_name'];
					$email=$_POST['email'];
					$cont_person_1=$_POST['cont_person_1'];
					$mob_no_1=$_POST['mob_no_1'];
					$cont_person_2=$_POST['cont_person_2'];
					$mob_no_2=$_POST['mob_no_2'];
					
					
					
					$sql = "INSERT INTO gstadvocate_(name, comp_name, email, cont_person_1, mob_no_1, cont_person_2, mob_no_2) VALUES ('$name', '$comp_name', '$email', '$cont_person_1', '$mob_no_1', '$cont_person_2', '$mob_no_2')"; 
					
					if(mysqli_query($conn, $sql)){
						echo '<script type="text/javascript">
								location.replace("gst_advocate.php");
							</script>';
					}
		
					mysqli_close($conn);
				}
				
				if(isset($_POST["gst_adv_update"])){
					
					$name=$_POST['name'];
					$comp_name=$_POST['comp_name'];
					$email=$_POST['email'];
					$cont_person_1=$_POST['cont_person_1'];
					$mob_no_1=$_POST['mob_no_1'];
					$cont_person_2=$_POST['cont_person_2'];
					$mob_no_2=$_POST['mob_no_2'];
					
					$sql = "UPDATE gstadvocate_ SET name='$name', comp_name='$comp_name', email='$email', cont_person_1='$cont_person_1', mob_no_1='$mob_no_1', cont_person_2='$cont_person_2', mob_no_2='$mob_no_2' WHERE gst_adv_id=$key";
					
					if(mysqli_query($conn, $sql)){
						echo '<script type="text/javascript">
								location.replace("gst_advocate.php");
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
                                                    <label for="text-input" class=" form-control-label">Name: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="name" value="<?= $name ?>" class="form-control" required>
                                                </div>
                                            </div>
											
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Company Name: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="comp_name" value="<?= $comp_name ?>" class="form-control" required>
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
											
											<div class="card-footer">
												<?php
													if(strcmp($msg,"Update GST Advocate")==0){
														echo "<button type='submit' name='gst_adv_submit' class='btn btn-primary btn-sm' disabled>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='gst_adv_update' class='btn btn-warning btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Update</button>";
													}else{
														echo "<button type='submit' name='gst_adv_submit' class='btn btn-primary btn-sm'>";
														echo "<i class='fa fa-dot-circle-o'></i> Submit</button>";
														echo "<button type='submit'  name='gst_adv_update' class='btn btn-warning btn-sm' disabled>";
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
