<?php include("header_admin.php"); ?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">IT Entry</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
									<a href="add_update_entry_it.php?msg=New IT Entry">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add IT Entry
										</button>
									</a>
                                    </div>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Sr.No</th>
												<th>Year</th>
                                                <th>Customer Name</th>
                                                <th>Return File</th>
                                                <th>Verification Type</th>
                                                <th>Receipt Date</th>
												<th>Remarks</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										
											require("dbconn.php");
											$sql = "SELECT * FROM entry_it";
											$i=1;
											$cust_name="";
											$year_name="";
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																$cust_id=$row['cust_id'];
																$year_id=$row['fy_id'];
																$sql2="SELECT cust_name FROM customer_ WHERE cust_id='$cust_id'";
																if($result2=mysqli_query($conn,$sql2)){
																	if(mysqli_num_rows($result2)>0){
																		while($row2= mysqli_fetch_array($result2)){
																			$cust_name=$row2['cust_name'];
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
																echo "<td>".$year_name."</td>";
																echo "<td>".$cust_name."</td>";
																echo "<td>".$row['return_file']."</td>";
																echo "<td>".$row['verif_type']."</td>";
																echo "<td>".$row['receipt_date']."</td>";
																echo "<td>".$row['remarks']."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='add_update_entry_it.php?msg=Update IT Entry&id=".$row['entry_it_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
																		echo "<i class='zmdi zmdi-edit'></i>";
																		echo "</button></a>";
																		echo "<a href='delete_entry_it.php?id=".$row['entry_it_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>";
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