<?php
	$O_mng_vehicle='active';
	include 'dashbord/owners/o_header.php';	

	if(isset($_GET['vid'])){
		$vid=$_GET['vid'];
	

									$vselect="Select * from vehicles where vehicle_id=$vid && owner_id=$oid";
									$vqry=mysqli_query($conn,$vselect);					
									$vrow=mysqli_fetch_array($vqry);
									$data=mysqli_num_rows($vqry);
 
									if($vqry){
										
										if($data!=1){

											echo "<script>
											window.location='admin.php';
											</script>";
											
										}

										$vehicle_id=$vrow['vehicle_id'];
										$owner_id=$vrow['owner_id'];
										$address=$vrow['address'];
										$category=$vrow['category'];
										$vtype=$vrow['type'];
										$transmition=$vrow['transmition'];
										$model=$vrow['model'];
										$modelname=$vrow['modelname'];
										$price=$vrow['price'];
										$color=$vrow['color'];
										$regcrt=$vrow['regcrt'];
										$inscrt=$vrow['inscrt'];
										$vhimg=$vrow['vhimg']; 
										$status=$vrow['status']; 
									
									$oselect="select * from owners where owner_id=$owner_id";
									$oqry=mysqli_query($conn,$oselect);
									$orow=mysqli_fetch_array($oqry);
									$email=$orow['email'];
									$phone=$orow['phone'];
									$name=$orow['name'];
									$propic=$orow['propic'];

								}
								else{

								}
								// update vehicle
								if(isset($_POST['update'])){
			
									$category=$_POST['category'];
									$address=$_POST['address'];
									$vtype=$_POST['vtype'];
									$transmition=$_POST['transmition'];
									$modelyear=$_POST['modelyear'];
									$modelname=$_POST['modelname'];
									$price=$_POST['price'];
									$color=$_POST['color'];
									$old_vhimg=$_POST['vhimg'];
									$old_regcrt=$_POST['regcrt'];
									$old_inscrt=$_POST['inscrt'];
									$vhname=$_FILES['newvhimg']['name'];
									$regname=$_FILES['newregcrt']['name'];
									$insname=$_FILES['newinscrt']['name'];

										
									if($vhname=='')
									{
										$vhfolder=$old_vhimg;
									}
									else{
										$vhtmp_name=$_FILES['newvhimg']['tmp_name'];
										$vhfolder='images/vimg/'.$vhname;
										move_uploaded_file($vhtmp_name,$vhfolder);
									}
									if($regname=='')
									{
										$regfolder=$old_regcrt;
									}
									else{

										$regtmp_name=$_FILES['regcrt']['tmp_name'];
										$regfolder='images/vimg/'.$regname;
										move_uploaded_file($regtmp_name,$regfolder);
									}
									if($insname=='')
									{
										$insfolder=$old_inscrt;
									}
									else{
										$instmp_name=$_FILES['inscrt']['tmp_name'];
										$insfolder='images/vimg/'.$insname;
										move_uploaded_file($instmp_name,$insfolder);
									}
									
										$update="UPDATE `vehicles` SET `address`='$address',`category`='$category',`type`='$vtype',`transmition`='$transmition',`model`='$model',`modelname`='$modelname',`price`='$price',`color`='$color',`vhimg`='$vhfolder',`regcrt`='$regfolder',`inscrt`='$insfolder',`status`='' where vehicle_id=$vid;";
										$run = mysqli_query($conn, $update);
										if ($run) {
											echo "<script>alert('Your Vehicle Successfully Update');</script>";
									  
										} else {
											echo "<script>alert('Something went wrong');</script>";
										}
							  
							}
	}
	else{
		echo "<script>window.location='owners.php';</script>";
	}


	
						
										
?>
<!------main-content-start----------->
<style>
	th{
		border:3px solid black;
	}
</style>
<div class="main-content">
				<!-- Vehicle Information -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title">
								<div class="row">
									<div class="col-sm-12 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="" style="text-align:center;">Manage Vehicles</h2>
									</div>
								</div>
							</div>
                        <form method="post" enctype="multipart/form-data">
							<table class="table table-striped table-hover">	
								<thead>
									<th colspan="2"><h6 class="" style="text-align:center; color:green; padding:20px"><b>Vehicles Information</b></h6></th>
								</thead>
								
								<tbody>
									<tr>
										<th><b>Vehicle Images</b></th>
										<th>
											<input class="btn" name="newvhimg" type="file" />
											<input class="btn" value="<?= $vhimg;?>" name="vhimg" type="hidden" />
											<a href="<?= $vhimg;?>">
											<img src="<?= $vhimg;?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;">
										</a>
										</th>
									</tr>
									<tr>										
										<th><b>Registration Certificate</b></th>
										<th>
										<input class="btn" name="newregcrt" type="file" />
										<input class="btn" value="<?= $regcrt; ?>" name="regcrt" type="hidden" />
										<a href="<?= $regcrt;?>"><img src="<?= $regcrt; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Insurance Certificate</b></th>
										<th>
											<input class="btn" name="newinscrt" type="file" />                
											<input class="btn" value="<?= $inscrt; ?>" name="inscrt" type="hidden" />                
											<a href="<?= $inscrt;?>"><img src="<?= $inscrt; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Address</b></th>
										<th>
                                            <input placeholder="Address" class="form-control book-info" value="<?= $address; ?>" required name="address" type="text" />
                                        </th>
									</tr>
									<tr>										
										<th><b>Category</b></th>
										<th><select class="form-control book-info " name="category" required>
                                                <option value="<?= $category; ?>"><?= $category; ?></option>
                                                <option value="Car (4 Wheelers , Jeep)">Car (4 Wheelers,Jeep)</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Bykes">Bykes</option>
                                                <option value="Cycle">Cycle</option>
                                                <option value="Truk">Truk</option>
                                                </select>
                                        </th>
									</tr>
									<tr>										
										<th><b>Type</b></th>
										<th>
                                            <select class="form-control book-info" name="vtype" required>
                                                <option value="<?= $vtype; ?>"><?= $vtype; ?></option>
                                                <option value="Petrol">Petrol</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Electric">Electric</option>
                                                <option value="CNG">CNG</option>
                                                <option value="Other">Other</option>
                                            </select>    
                                        </th>
									</tr>
									<tr>										
										<th><b>transmition</b></th>
										<th>
                                            <select class="form-control book-info" name="transmition" required>
                                                <option value="<?= $transmition; ?>"><?= $transmition; ?></option>
                                                <option value="Manual">Manual</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </th>
									</tr>
									<tr>										
										<th><b>Vehicle Model</b></th>
										<th>
                                            <input placeholder="Model Year" class="form-control book-info" required name="modelyear" value="<?= $model; ?>" type="number" />
                                        </th>
									</tr>
									<tr>										
										<th><b>Model Name</b></th>
										<th>
                                            <input placeholder="Model Name" class="form-control book-info" value="<?= $modelname; ?>" required name="modelname" type="text" />
                                        </th>
									</tr>
									<tr>										
										<th><b>Price(Day)</b></th>
                                        <th> 
                                            <input placeholder="Set Price (Per Day)" class="form-control book-info" value="<?= $price; ?>" required name="price" type="text" />
                                        </th>
									</tr>
									<tr>										
										<th><b>Color</b></th>
										<th>
                                            <input placeholder="Colour" class="form-control book-info" value="<?= $color; ?>" required name="color" type="text" />
                                        </th>
									</tr>
									<tr>
										<th colspan="2">
											<center>
												<a href="O_mng_vehicle.php" class="btn btn-warning mr-3" >
													<!-- <i class="material-icons">🏕</i> -->
													<span>Back</span>
												</a>
												<input type="reset" value="Cancel" class="btn btn-dark mr-2">
												<input type="submit" name="update" value="Submit" class="btn btn-success ml-2" >
											</center>
										</th>
										
										
									</tr>
								</tbody>
							</table>
                        </from>
						</div>
					</div>
				</div>
				
				
</div>

<!------main-content-end----------->



<?php include 'dashbord/owners/o_footer.php' ?>