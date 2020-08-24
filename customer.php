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
                                <h3 class="title-5 m-b-35">All Customer</h3>
								
                                <div class="table-data__tool">
									
									<div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
										<form method="post">
                                            <select class="js-select2" name="category">
                                                <option value="" selected="selected">All Category</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Composition">Composition</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
										<button class="au-btn au-btn-filter au-btn--blue" name="btn_sort">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
										</form>
                                    </div>
                                    
                                    <div class="table-data__tool-right">
									<a href="add_update_customer.php?msg=New Customer">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add customer
										</button>
									</a>
                                    </div>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Sr.No</th>
												<th>File No</th>
                                                <th>Name</th>
												<th>Pan No</th>
												<th>Contact Person 1</th>
                                                <th>Mobile Number 1</th>
												<th>Contact Person 2</th>
                                                <th>Mobile Number 2</th>
                                                <th>Address</th>
                                                <th>City</th>
												<th>Email</th>
												<th>IT Advocate</th>
												<th>DSC Date</th>
												<th>Agriculture</th>
                                                <th>GST No</th>
                                                <th>Category</th>
                                                <th>GST Advocate</th>
												<th>GST Reg Date</th>
												<th>Status</th>
												<th></th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
											$i=1;
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																echo "<td>". $i++ ."</td>";
																echo "<td>".$row['file_no']."</td>";
																echo "<td>".$row['cust_name']."</td>";
																echo "<td>".$row['pan_no']."</td>";
																echo "<td>".$row['cont_person_1']."</td>";
																echo "<td>".$row['mob_no_1']."</td>";
																echo "<td>".$row['cont_person_2']."</td>";
																echo "<td>".$row['mob_no_2']."</td>";
																echo "<td><textarea cols='50' rows='2' disabled>".$row['address']."</textarea></td>";
																echo "<td>".$row['city']."</td>";
																echo "<td>".$row['email']."</td>";
																echo "<td>".$row['it_adv']."</td>";
																echo "<td>".$row['dsc_date']."</td>";
																echo "<td>".$row['agriculture']."</td>";
																echo "<td>".$row['gst_no']."</td>";
																echo "<td>".$row['category']."</td>";
																echo "<td>".$row['gst_adv']."</td>";
																echo "<td>".$row['gst_reg_date']."</td>";
																echo "<td>".$row['status']."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																	
																	if(strcmp($row['status'],"Active")==0){
																		echo "<a href='add_update_customer.php?msg=Deactivate Customer&id=".$row['cust_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Deactivate'>";
																		echo "<i class='fas fa-ban'></i>";
																		echo "</button></a>";
																	}
																	else{
																		echo "<a href='add_update_customer.php?msg=Activate Customer&id=".$row['cust_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Activate'>";
																		echo "<i class='fas fa-check-circle'></i>";
																		echo "</button></a>";
																	}
																	
																		echo "<a href='add_update_customer.php?msg=Update Customer&id=".$row['cust_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
																		echo "<i class='zmdi zmdi-edit'></i>";
																		echo "</button></a>";
																		
																		echo "<a href='cust_delete.php?id=".$row['cust_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>";
																		echo "<i class='zmdi zmdi-delete'></i>";
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