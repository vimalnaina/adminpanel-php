<?php include_once("header_admin.php"); ?>

<?php
	require("dbconn.php");
	$sql = "SELECT * FROM customer_";
	if(isset($_POST['btn_sort'])){
		$category=$_POST['category'];
		if($category!="")
			$sql= "SELECT * FROM customer_ WHERE category='$category'";
	}
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Customer Report</h3>
								
								<div>
                                    <div class="col col-md-4">
                                        <form method="post">
											<div class="row form-group">
                                                <div class="col col-md-3" >
                                                    <label for="select" class=" form-control-label">Sort By: </label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <select name="category" id="select" class="form-control">
														<option value="">None</option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Composition">Composition</option>
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
                                                <th>File No</th>
												<th>Party Name</th>
                                                <th>Advocate</th>
												<th>Contact No</th>
												<th>Digi. Sign</th>
												<th>GST No</th>
                                                <th>Agree</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
										
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																echo "<td>".$row['file_number']."</td>";
																echo "<td>".$row['customer_name']."</td>";
																echo "<td>".$row['adv_name']."</td>";
																echo "<td>".$row['mob_num_1']."</td>";
																echo "<td>".$row['dsc_date']."</td>";
																echo "<td>".$row['gst_number']."</td>";
																echo "<td>".$row['agree']."</td>";
																echo "<td>".$row['status']."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='add_update_customer.php?msg=Update Customer&file=report&id=".$row['cust_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
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