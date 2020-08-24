<?php include_once("header_admin.php"); ?>

<?php
	require("dbconn.php");
	$sql = "SELECT * FROM entry_gst";
	if(isset($_POST['btn_sort'])){
		$month=$_POST['month'];
		$status=$_POST['status'];
		
		if($status!="" && $month!=""){
			if($status=="Pending"){
				$sql= "SELECT * FROM entry_gst WHERE month='$month' && entry_gst_3B='0000-00-00'";
			}
			else{
				$sql= "SELECT * FROM entry_gst WHERE month='$month' && entry_gst_3B <>'0000-00-00'";
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
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">GST3B Report</h3>
								
								<div>
                                    <div class="col col-md-9">
                                        <form method="post">
											<div class="row form-group">
                                                <div class="col col-md-2" >
                                                    <label for="select" class=" form-control-label">Sort By: </label>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="month" id="select" class="form-control">
														<option value="">--- Month ---</option>
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
												<div class="col-12 col-md-3">
                                                    <select name="status" id="select" class="form-control">
														<option value="">--- Done/Pending ---</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Done">Done</option>
                                                    </select>
                                                </div>
												<div class="col col-md-3">
													<button type="Submit" name="btn_sort" class="btn btn-primary btn-sm">
													Apply
													</button>
												</div>
                                            </div>
										</form>
                                    </div>
                                </div>
                                
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
												<th>File No</th>
												<th>Party Name</th>
												<th>Advocate</th>
												<th>Mode</th>
												<th>Month</th>
												<th>3B</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
											$i=1;
											$cust_name="";
											$file_no="";
											$advocate="";
											$mode="";
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																$cust_id=$row['cust_id'];
																$sql2="SELECT * FROM customer_ WHERE cust_id='$cust_id'";
																if($result2=mysqli_query($conn,$sql2)){
																	if(mysqli_num_rows($result2)>0){
																		while($row2= mysqli_fetch_array($result2)){
																			$cust_name=$row2['customer_name'];
																			$file_no=$row2['file_number'];
																			$advocate=$row2['adv_name'];
																			$mode=$row2['gst_mode'];
																		}
																	}
																}
																echo "<td>".$i++."</td>";
																echo "<td>".$file_no."</td>";
																echo "<td>".$cust_name."</td>";
																echo "<td>".$advocate."</td>";
																echo "<td>".$mode."</td>";
																echo "<td>".$row['month']."</td>";
																echo "<td>".$row['entry_gst_3B']."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='add_update_entry_gst.php?msg=Update GST Entry&file=report_gst3b&id=".$row['entry_gst_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
																		echo "<i class='zmdi zmdi-edit'></i>";
																		echo "</button></a>";
																	echo "</div>";
																echo "</td>";
															echo "</tr>";
													}
												}
											}
										?>
                                        </tbody>      
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        
<?php include("footer_admin.php"); ?>