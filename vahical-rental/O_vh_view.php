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
											window.location='owners.php';
											</script>";
											
										}

										$vehicle_id=$vrow['vehicle_id'];
										$owner_id=$vrow['owner_id'];
										$address=$vrow['address'];
										$category=$vrow['category'];
										$type=$vrow['type'];
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
                                    echo "<script>window.location='owners.php';</script>";
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
										<h2 class="" style="text-align:center;">Vehicles Information</h2>
									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">	
								<thead>
									<th colspan="2"><h6 class="" style="text-align:center; color:green; padding:20px"><b>Vehicles Information</b></h6></th>
								</thead>

								<tbody>
									<tr>
										<th><b>Vehicle Images</b></th>
										<th><a href="<?= $vhimg;?>"><img src="<?= $vhimg; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Registration Certificate</b></th>
										<th><a href="<?= $regcrt;?>"><img src="<?= $regcrt; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Insurance Certificate</b></th>
										<th><a href="<?= $inscrt;?>"><img src="<?= $inscrt; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Vehicle Id</b></th>
										<th><?= $vehicle_id; ?></th>
									</tr>
									<tr>										
										<th><b>Owner Id</b></th>
										<th><?= $owner_id; ?></th>
									</tr>
									<tr>										
										<th><b>Address</b></th>
										<th><?= $address; ?></th>
									</tr>
									<tr>										
										<th><b>Category</b></th>
										<th><?= $category; ?></th>
									</tr>
									<tr>										
										<th><b>Type</b></th>
										<th><?= $type; ?></th>
									</tr>
									<tr>										
										<th><b>transmition</b></th>
										<th><?= $transmition; ?></th>
									</tr>
									<tr>										
										<th><b>Vehicle Model</b></th>
										<th><?= $model; ?></th>
									</tr>
									<tr>										
										<th><b>Model Name</b></th>
										<th><?= $modelname; ?></th>
									</tr>
									<tr>										
										<th><b>Price(Day)</b></th>
										<th><?= $price; ?></th>
									</tr>
									<tr>										
										<th><b>Color</b></th>
										<th><?= $color; ?></th>
									</tr>
									<tr>										
										<th><b>Status</b></th>
										<th><?= $status; ?></th>
									</tr>
									<tr>
										<th colspan="2">
											<center>
											<a href="O_vh_update.php?vid=<?= $vehicle_id;?>" class="btn btn-success">
													<i class="material-icons">🖋</i>
													<span>Edit</span>
												</a>
												<a href="A_total_vehicle.php" class="btn btn-warning mr-auto" >
													<i class="material-icons">🏕</i>
													<span>Back</span>
												</a>
												<?php
											?>
											</center>
										</th>
										
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
</div>

<!------main-content-end----------->



<?php include 'dashbord/Owners/O_footer.php' ?>