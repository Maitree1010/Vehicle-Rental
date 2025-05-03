<?php
	$A_unapr_vehicle='active';
	include 'dashbord/admin/a_header.php';	

	if(isset($_POST['Delete'])){
		$vehicle_id=$_POST['vehicle_id'];

		$delete="Delete from vehicles where vehicles.vehicle_id=$vehicle_id";
		$qry=mysqli_query($conn,$delete);
		$bdelete="Delete from bookings where vehicle_id=$vehicle_id";
		$bqry=mysqli_query($conn,$bdelete);
		if($qry){
			echo "<script>alert('Vehicle is SuccessFully Deleted')</script>";
		}
		else{
			echo "<script>alert('Something Wrong')</script>";
		}
	}
?>
<!------main-content-start----------->

<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title bg-danger">
								<div class="row ">
									<div class=" col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Total Unapproved Vehecle</h2>
									</div>
									<!-- <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xE147;</i>
											<span>Add New Employees</span>
										</a>
										<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
											<i class="material-icons">&#xE15C;</i>
											<span>Delete</span>
										</a>
									</div> -->
								</div>
							</div>

							<table class="table table-striped table-hover">
								<thead>
									<tr>
										
										<th>Photo</th>
										<th>Category</th>
										<th>Model</th>
										<th>Address</th>
										<th>Actions</th>
									</tr>
								</thead>

								<tbody>
									<tr>
									<?php
									if($search){
										$vselect="Select * from vehicles where status='Unapprove' AND (address like '%$search%' OR category like '%$search%' OR type like '%$search%' OR transmition like '%$search%' OR model like '%$search%' OR modelname like '%$search%' OR price like '%$search%' OR color like '%$search%' )";

									}else{
										$vselect="Select * from vehicles where status='Unapprove'";
									}
									$vqry=mysqli_query($conn,$vselect);					
									while ($vrow=mysqli_fetch_array($vqry)) 
									{
										$vehicle_id=$vrow['vehicle_id'];
										$owner_id=$vrow['owner_id'];
										$address=$vrow['address'];
										$category=$vrow['category'];
										$type=$vrow['type'];
										$transmition=$vrow['transmition'];
										$model=$vrow['model'];
										$modelname=$vrow['modelname'];
										$price=$vrow['price'];
										$vhimg=$vrow['vhimg']; 
						
										?>
										
										<th><img src="<?= $vhimg; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></th>
										<th><?= $category; ?></th>
										<th><?= $model; ?></th>
										<th><?= $address; ?></th>
										<th>
											<a href="A_mng_vehicle.php?vid=<?= $vehicle_id;?>" class="btn btn-success">
												<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
											</a>
											
											<a href="#deleteEmployeeModal" class="btn btn-danger" onclick="sessionStorage.setItem('vid','<?= $vehicle_id; ?>');  go();" data-toggle="modal">
												<i class="material-icons" data-toggle="tooltip"
													title="Delete">&#xE872;</i>
											</a>
																					
										</th>
									</tr>
									<?php
					}
				
?>


							</table>

							









						</div>
					</div>
					
					<!----delete-vehicle-modal start--------->
					<form method="post" class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<input type="text"  hidden id="vid" name="vehicle_id">

									<h5 class="modal-title">Delete Vehicles</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to delete this Vehicle</p>
									<p class="text-warning"><small>this action Cannot be Undone,</small></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary " data-dismiss="modal">Cancel</button>
									<input type="submit" class="btn btn-success" name="Delete" value="Delete">
								</div>
							</div>
						</div>
				</form>

					<!----delete-vehicle-modal end--------->

				</div>
			</div>

			<script>
				function go(){
    			var vid=document.getElementById("vid");
    
				if(vid!=sessionStorage.getItem('vid')){
    				vid.value="";
    				vid.value=sessionStorage.getItem('vid');
				}else{
    				vid.value="";
    				vid.value=sessionStorage.getItem('vid');

				}

			}
			</script>

			<!------main-content-end----------->



<?php include 'dashbord/admin/a_footer.php' ?>