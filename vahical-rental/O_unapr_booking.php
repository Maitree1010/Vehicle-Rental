<?php
	$O_unapr_booking='active';
	include 'dashbord/owners/o_header.php';	
	
?>
<!------main-content-start----------->



<style>
	th{
		border:0.5px solid black;
	}
</style>				

<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title bg-danger">
								<div class="row">
									<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Unpprove Bookings</h2>
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
										<th><b>Vehicle</b></th>
										<th><b>Picup Location</b></th>
										<th><b>Return Location</b></th>
										<th><b>Picup Date</b></th>
										<th><b>Return Date</b></th>
										<th><b>Actions</b></th>
									</tr>
								</thead>

								<tbody>
									<tr>
									<?php
									
									if($search){
										// echo $search;
										$bselect="Select * from bookings where owner_id=$oid AND status='Unapprove' AND (pic_location like '%$search%' OR rtn_location like '%$search%' OR pic_date like '%$search%' OR rtn_date like '%$search%' OR total_cost like '%$search%') ;";
									}
									else{
										$bselect="Select * from bookings where owner_id=$oid && status='Unapprove'";
									}
									$bqry=mysqli_query($conn,$bselect);					
									while ($brow=mysqli_fetch_array($bqry)) 
									{
										$bid=$brow['id'];
										$vehicle_id=$brow['vehicle_id'];
										$renter_id=$brow['renter_id'];
										$pic_loc=$brow['pic_location'];
										$rtn_loc=$brow['rtn_location'];
										$pic_date=$brow['pic_date'];
										$rtn_date=$brow['rtn_date'];
										$pic_tim=$brow['pic_tim'];
										$rtn_tim=$brow['rtn_tim'];
										$total_cost=$brow['total_cost'];
										$drv_lic=$brow['drv_lic']; 
										$adharcard=$brow['adharcard']; 

                                        $vselect="select * from vehicles where vehicle_id=$vehicle_id";
									    $vqry=mysqli_query($conn,$vselect);
									    $vrow=mysqli_fetch_array($vqry);
                                        $vhimg=$vrow['vhimg']; 
									
                                        
						
										?>
										<!-- <th><span class="custom-checkbox"> -->
												<!-- <input type="checkbox" id="checkbox1" name="option[]" value="1"> -->
												<!-- <label for="checkbox1"></label></th> -->
										<th><img src="<?= $vhimg; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></th>
										<th><?= $pic_loc; $vehicle_id; ?></th>
										<th><?= $rtn_loc; ?></th>
										<th><?= $pic_date; ?></th>
										<th><?= $rtn_date; ?></th>
										<th>
											<a href="O_mng_booking.php?book_id=<?= $bid;?>" class="btn btn-danger">
												Manage
											</a>
											
										</th>
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



<?php include 'dashbord/owners/o_footer.php' ?>