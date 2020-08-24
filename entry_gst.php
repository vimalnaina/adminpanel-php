<?php include("header_admin.php"); ?>

<?php
	require("dbconn.php");
	$sql = "SELECT * FROM entry_gst";
	if(isset($_POST['btn_sort_gst3b'])){
		$month=$_POST['month'];
		$status=$_POST['status'];
		
		if($status!="" && $month!=""){
			if($status=="Pending"){
				$sql= "SELECT * FROM entry_gst WHERE month='$month' && gst3b='0000-00-00'";
			}
			else{
				$sql= "SELECT * FROM entry_gst WHERE month='$month' && gst3b <>'0000-00-00'";
			}
			
		}
	}
	
	if(isset($_POST['btn_sort_gstr1'])){
		$month=$_POST['month'];
		$status=$_POST['status'];
		
		if($status!="" && $month!=""){
			if($status=="Pending"){
				$sql= "SELECT * FROM entry_gst WHERE month='$month' && 	gstr1='0000-00-00'";
			}
			else{
				$sql= "SELECT * FROM entry_gst WHERE month='$month' && 	gstr1 <>'0000-00-00'";
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
                                <h3 class="title-5 m-b-35">GST Entry</h3>
                                <div class="table-data__tool">
									<div class="table-data__tool-left">
									<form method="post">
										<div class="rs-select2--light rs-select2--sm">
											<p>GST3B: </p>
										</div>
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="month">
                                                <option value="" selected="selected">Month</option>
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
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="status">
                                                <option value="" selected="selected">Status</option>
                                                <option value="Filed">Filed</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn au-btn-filter au-btn--blue" name="btn_sort_gst3b">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
									</form>
									<br>
									<form method="post">
										<div class="rs-select2--light rs-select2--sm">
											<p>GSTR1: </p>
										</div>
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="month">
                                                <option value="" selected="selected">Month</option>
                                                <option value="July">July</option>
												<option value="November">November</option>
												<option value="March">March</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="status">
                                                <option value="" selected="selected">Status</option>
                                                <option value="Filed">Filed</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn au-btn-filter au-btn--blue" name="btn_sort_gstr1">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
									</form>
                                    </div>
                                    
                                    <div class="table-data__tool-right">
									<a href="add_update_entry_gst.php?msg=New GST Entry">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add GST Entry
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
                                                <th>Customer Name</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>GST3B</th>
												<th>GSTR1</th>
												<th>CMP8</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											
											$i=1;
											$cust_name="";
											$file_no="";
											$year_name="";
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																$cust_id=$row['cust_id'];
																$year_id=$row['fy_id'];
																$sql2="SELECT cust_name, file_no FROM customer_ WHERE cust_id='$cust_id'";
																if($result2=mysqli_query($conn,$sql2)){
																	if(mysqli_num_rows($result2)>0){
																		while($row2= mysqli_fetch_array($result2)){
																			$cust_name=$row2['cust_name'];
																			$file_no=$row2['file_no'];
																		}
																	}
																}
																$sql3="SELECT year FROM financial_year WHERE fy_id='$year_id'";
																if($result3=mysqli_query($conn,$sql3)){
																	if(mysqli_num_rows($result3)>0){
																		while($row3= mysqli_fetch_array($result3)){
																			$year_name=$row3['year'];
																		}
																	}
																}
																echo "<td>".$i++."</td>";
																echo "<td>".$file_no."</td>";
																echo "<td>".$cust_name."</td>";
																echo "<td>".$year_name."</td>";
																echo "<td>".$row['month']."</td>";
																echo "<td>".$row['gst3b']."</td>";
																echo "<td>".$row['gstr1']."</td>";
																echo "<td>".$row['cmp8']."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='add_update_entry_gst.php?msg=Update GST Entry&id=".$row['entry_gst_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
																		echo "<i class='zmdi zmdi-edit'></i>";
																		echo "</button></a>";
																		echo "<a href='delete_entry_gst.php?id=".$row['entry_gst_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>";
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