<?php
	$A_apr_vehicle='active';
	include 'dashbord/admin/a_header.php';	
?>
<!------main-content-start----------->

<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title bg-success">
								<div class="row ">
									<div class=" col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Total Approved Vehecle</h2>
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
										$vselect="Select * from vehicles where status='Approve' AND (address like '%$search%' OR category like '%$search%' OR type like '%$search%' OR transmition like '%$search%' OR model like '%$search%' OR modelname like '%$search%' OR price like '%$search%' OR color like '%$search%' )";

									}else{
										$vselect="Select * from vehicles where status='Approve'";
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
												Manage
											</a>
											
										</th>
									</tr>
									<?php
					}
				
?>


							</table>

							









						</div>
					</div>


					<!----add-modal start--------->
					<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add New Vehicle</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="emil" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-success">Add</button>
								</div>
							</div>
						</div>
					</div>

					<!----edit-modal end--------->





					<!----edit-modal start--------->
					<div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Employees</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="emil" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-success">Save</button>
								</div>
							</div>
						</div>
					</div>

					<!----edit-modal end--------->


					<!----delete-modal start--------->
					<div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Delete Employees</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to delete this Records</p>
									<p class="text-warning"><small>this action Cannot be Undone,</small></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-success">Delete</button>
								</div>
							</div>
						</div>
					</div>

					<!----edit-modal end--------->




				</div>
			</div>

			<!------main-content-end----------->



<?php include 'dashbord/admin/a_footer.php' ?>