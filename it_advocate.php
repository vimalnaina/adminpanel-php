<?php include("header_admin.php"); ?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">IT Advocate</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
									<a href="add_update_it_adv.php?msg=New IT Advocate">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add it advocate
										</button>
									</a>
                                    </div>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
												<th>Sr.No</th>
                                                <th>Name</th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Contact Person 1</th>
												<th>Mobile Number 1</th>
												<th>Contact Person 2</th>
												<th>Mobile Number 2</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										
											require("dbconn.php");
											$sql = "SELECT * FROM itadvocate_";
											$i=1;
											if($result=mysqli_query($conn,$sql)){
												if(mysqli_num_rows($result)>0){
													while($row= mysqli_fetch_array($result)){
															echo "<tr class='tr-shadow'>";
																echo "<td>".$i++."</td>";
																echo "<td>".$row['name']."</td>";
																echo "<td>".$row['comp_name']."</td>";
																echo "<td>".$row['email']."</td>";
																echo "<td>".$row['cont_person_1']."</td>";
																echo "<td>".$row['mob_no_1']."</td>";
																echo "<td>".$row['cont_person_2']."</td>";
																echo "<td>".$row['mob_no_2']."</td>";
																echo "<td>";
																	echo "<div class='table-data-feature'>";
																		echo "<a href='add_update_it_adv.php?msg=Update IT Advocate&id=".$row['it_adv_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>";
																		echo "<i class='zmdi zmdi-edit'></i>";
																		echo "</button></a>";
																		echo "<a href='it_adv_delete.php?id=".$row['it_adv_id']."'><button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>";
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