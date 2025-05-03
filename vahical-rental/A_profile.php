<?php
	include 'dashbord/admin/a_header.php';
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
		//  elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
		// 	echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
		else {
			if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
				$profilePicPath = $uploadFile;
				$updateQuery = "UPDATE `admin` SET propic='$profilePicPath' WHERE admin_id='$aid'";
				mysqli_query($conn, $updateQuery);
			} else {
				echo "Error uploading file.";
			}
		}
	}
	if(isset($_POST['upadte'])){
		
		$aname=$_POST['name'];
		$aphone=$_POST['phone'];
		$aemail=$_POST['email'];

		$updateQuery = "UPDATE `admin` SET `name`='$aname', `phone`='$aphone',`email`='$aemail'  WHERE admin_id='$aid'";
		$result = mysqli_query($conn, $updateQuery);
		if($result){
			echo'<script>alert("Successfully Updated")</script>';
		}
	}

$query = "SELECT propic FROM `admin` WHERE admin_id='$aid'";
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
										<input type="text" value="<?= $aname;?>" class="form-control" name="name" required>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="emil" value="<?= $aphone;?>" class="form-control" name="phone" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" value="<?= $aemail;?>" class="form-control" name="email" required>
									</div>
								</div>
								<div class="modal-footer">
									<input type="reset" class="btn btn-secondary" name="upadte"/>
									<input type="submit" onclick="relod()" class="btn btn-success" name="upadte"/>
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


				</div>
			</div>

			<!------main-content-end----------->



<?php include 'dashbord/admin/a_footer.php' ?>