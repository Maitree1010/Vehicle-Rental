<?php
	include 'dashbord/owners/o_header.php';
	// error_reporting(0);	

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
		$uploadDir = 'images/';
		$uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);
		$imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
	
		$check = getimagesize($_FILES['profile_picture']['tmp_name']);
		if ($check === false) {
			echo "File is not an image.";
		}
		 elseif ($_FILES['profile_picture']['size'] > 200000000) {
			echo "Sorry, your file is too large.";
		 }
		 elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
			echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
		} else {
			if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
				$profilePicPath = $uploadFile;
				$updateQuery = "UPDATE `owners` SET propic='$profilePicPath' WHERE owner_id='$oid'";
				mysqli_query($conn, $updateQuery);
			} else {
				echo "Error uploading file.";
			}
		}
	}
	if(isset($_POST['update'])){
		
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];

		$updateQuery = "UPDATE `owners` SET `name`='$name', `phone`='$phone',`email`='$email'  WHERE owner_id='$oid'";
		$result = mysqli_query($conn, $updateQuery);
		if($result){
			echo'<script>alert("Successfully Updated")</script>';
		}
	}

$query = "SELECT propic FROM `owners` WHERE owner_id='$oid'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);

$profilePicture = !empty($userData['propic']) ? $userData['propic'] : 'images/profile.jpg';


?>
<!------main-content-start----------->
<style>
	.main-content input{
		width:80% !important;
	}
	.main-content .modal-body .form-group{
		display: flex;
		/* flex-direction:column; */
		justify-content:space-between;
	}
	.main-content .profile-form .profile-picture-wrapper{
        position: relative;
    }
    .main-content .profile-form .camera{
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: black;
        background-color: white;
		padding: 4px;
        border-radius: 100%;
        }
		.main-content .addEmployeeModal,.modal-dialog{
			padding: 5px;
			margin:5px;
			/* align-items:center; */
		}
</style>
<!-- <meta http-equiv="refresh" content="6"/> -->

<div class="main-content">
					<center>
					<!----add-modal start--------->
					<div class=""  id="addEmployeeModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Profile</h5>
								</div>
								<div class="modal-body">
									<div class="form-group " style="justify-content:center; ">									
										<form action="#" method="POST" class="profile-form" enctype="multipart/form-data">
											<div class="profile-picture-wrapper" onclick="document.getElementById('profile_picture').click()">
												<img src="<?= $profilePicture; ?>" alt="Profile Picture" class="profile-picture" style="height:90px; width:90px; object-fit:cover; border-radius:50%;">
												<div class="camera-icon-container">
													<i class="fas fa-camera camera"></i>
												</div>
											</div>
											<input type="file" name="profile_picture" id="profile_picture" accept="images/*" style="display:none;" onchange="this.form.submit()">
										</form>																			
									</div>
									<form method="POST">	
									<div class="form-group">
										<label>Name</label>
										<input type="text" value="<?= $oname;?>" class="form-control" name="name" required>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="number" value="<?= $ophone;?>" class="form-control" name="phone" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" value="<?= $oemail;?>" class="form-control" name="email" required>
									</div>
								</div>
								<div class="modal-footer">
									<input type="reset" value="Cancel" class="btn btn-secondary" />
									<input type="submit" class="btn btn-success" onclick="relod()" name="update" />
								</div>
								</form>
							</div>
						</div>
					</div>
					<script>
						function relod()
						{
							window.location.reload();
						}
					</script>

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