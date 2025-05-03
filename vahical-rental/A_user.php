<?php
	$A_user='active';
	include 'dashbord/admin/a_header.php';	
?>

<style>
	th{
		border:0.5px solid black;
	}
</style>				

<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title bg-primary">
								<div class="row">
									<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Renter Details</h2>
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
										<!-- <th><span class="custom-checkbox"> -->
												<!-- <input type="checkbox" id="selectAll">
												<label for="selectAll"></label></th> -->
                                        <th><b>Renter ID</b></th>
                                        <th><b>Profile Pic</b></th>
										<th><b>Name</b></th>
										<th><b>Email</b></th>
										<th><b>Phone</b></th>
									</tr>
								</thead>

								<tbody>
									<tr>
									<?php
									if($search){
										$srenter="Select * from renters where (name like '%$search%' OR email like '%$search%')";

									}else{
										$srenter="Select * from renters";
									}
									
									$sqry=mysqli_query($conn,$srenter);					
									while ($urow=mysqli_fetch_array($sqry)) 
									{
										$pic=$urow['propic'];
                                        $rid=$urow['renter_id'];
                                        $name=$urow['name'];
                                        $email=$urow['email'];
                                        $phone=$urow['phone'];
                                        
									
                                        
						
										?>
										<!-- <th><span class="custom-checkbox"> -->
												<!-- <input type="checkbox" id="checkbox1" name="option[]" value="1"> -->
												<!-- <label for="checkbox1"></label></th> -->
                                        <th><?= $rid; ?></th>
                                        <th><img src="<?= $pic; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></th>
										<th><?= $name; ?></th>
										<th><?= $email; ?></th>
										<th><?= $phone; ?></th>
                                        
										
									</tr>
									<?php
					}
				
?>
								</tbody>


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
