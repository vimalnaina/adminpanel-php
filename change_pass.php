<?php include("header_admin.php"); ?>

<?php
	require("dbconn.php");
	if($_SESSION['user']!=null || $_SESSION['user']!=""){
		$username=$_SESSION['user'];
		
		if(isset($_POST['btn_submit'])){
			$new_pass=$_POST['new_pass'];
			$sql="UPDATE users SET password='$new_pass' WHERE name='$username'";
			if(mysqli_query($conn,$sql)){
				echo "<script type='text/javascript'>
						alert('Password Changed');
					  </script>";
					  
				echo '<script type="text/javascript">
						location.replace("index.php");
					  </script>';
			}
		}
	}
?>

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Change Password</h3>
                            <div class="col-lg-9">
                                <div class="card">
									<div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
											<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Enter New Password: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="new_pass" class="form-control" > 
                                                </div>
                                            </div>
											
											<div class="card-footer">
												<button type="submit" name="btn_submit" class="btn btn-success btn-sm">
													<i class="fa fa-circle"></i> Reset Password
												</button>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php include("footer_admin.php"); ?>