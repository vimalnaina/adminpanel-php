<?php include_once("header_admin.php"); ?>

<?php
	require("dbconn.php");
	$sql = "SELECT * FROM entry_it";
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
                                <h3 class="title-5 m-b-35">IT Report</h3>
								
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
												<th>File No</th>
												<th>Party Name</th>
												<th>Advocate</th>
												<th>Return File</th>
												<th>Verification Type</th>
												<th>E-Verify Recipt</th>
												<th>Contact No</th>
												<th>Remarks</th>
                                            </tr>
                                        </thead>
										<tbody>
										<?php
											$i=1;
											$cust_name="";
											$file_no="";
											$advocate="";
											$cont="";
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
																			$cont=$row2['mob_num_1'];
																		}
																	}
																}
																echo "<td>".$i++."</td>";
																echo "<td>".$file_no."</td>";
																echo "<td>".$cust_name."</td>";
																echo "<td>".$advocate."</td>";
																echo "<td>".$row['return_file']."</td>";
																echo "<td>".$row['verf_type']."</td>";
																echo "<td>".$row['eveif_recipt']."</td>";
																echo "<td>".$cont."</td>";
																echo "<td><textarea cols='50' rows='2' disabled>".$row['remarks']."</textarea></td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='add_update_entry_it.php?msg=Update IT Entry&file=report_it&id=".$row['entry_it_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
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