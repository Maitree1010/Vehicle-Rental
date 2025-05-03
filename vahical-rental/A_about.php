<?php
	$A_about='active';
	include 'dashbord/admin/a_header.php';
	// error_reporting(0);	

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['about_image'])) {
		$uploadDir = 'images/';
		$uploadFile = $uploadDir . basename($_FILES['about_image']['name']);
		$imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
	
		$check = getimagesize($_FILES['about_image']['tmp_name']);
		if ($check === false) {
			echo "File is not an image.";
		}
		 elseif ($_FILES['about_image']['size'] > 200000000) {
			echo "Sorry, your file is too large.";
		 }
		 elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
			echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
		} else {
			if (move_uploaded_file($_FILES['about_image']['tmp_name'], $uploadFile)) {
				$aboutPicPath = $uploadFile;
				$updateQuery = "UPDATE `about` SET image='$aboutPicPath' WHERE id=1";
				mysqli_query($conn, $updateQuery);
			} else {
				echo "Error uploading file.";
			}
		}
	}
	if(isset($_POST['upadte'])){
		
		$title=$_POST['title'];
		$description=$_POST['description'];
		
		$updateQuery = "UPDATE `about` SET `title`='$title', `description`='$description' WHERE id=1";
		$result = mysqli_query($conn, $updateQuery);
		if($result){
			echo'<script>alert("Successfully Updated")</script>';
		}
	}

$query = "SELECT * FROM `about` WHERE id=1";
$result = mysqli_query($conn, $query);
$aboutdata = mysqli_fetch_assoc($result);
$title=$aboutdata['title'];
$description=$aboutdata['description'];

$aboutimage = !empty($aboutdata['image']) ? $aboutdata['image'] : 'images/about.jpg';


?>
<!------main-content-start----------->
<style>
    .modal-dialog{
        max-width: 700px !important;
    }
	.main-content input{
		width:85% !important;
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
        background-color:black;
		padding: 10px;
        border-radius: 100%;
        color:white;
        cursor: pointer;
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
					<div class="">
						<div class="modal-dialog"  role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit About Page </h5>
								</div>
                                <div class="form-group">									
										<form action="#" method="POST" class="profile-form" enctype="multipart/form-data">
											<div class="profile-picture-wrapper" onclick="document.getElementById('about_image').click()">
												<img src="<?= $aboutimage; ?>" alt="Profile Picture" class="profile-picture" style="height:300px; width:100%; object-fit:contain;">
												<div class="camera-icon-container">
													<i class="fas fa-camera camera " for="about_image"></i>
												</div>
											</div>
											<input type="file" name="about_image" id="about_image" accept="images/*" style="display:none;" onchange="this.form.submit()">
										</form>																			
									</div>
								<div class="modal-body d-flex" style="justify-content:center;">
									
									<form method="POST">	
									<div class="form-group">
										<label>Title</label>
										<input type="text" value="<?= $title;?>" class="form-control" name="title" required>
									</div>
									<div class="form-group">
										<label class="mr-2">Description</label>
										<textarea class="form-control" rows="10" cols="60" name="description" required> <?= $description;?> </textarea>
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

					<!----edit-modal end--------->





					

					




				</div>
			</div>

			<!------main-content-end----------->



<?php include 'dashbord/admin/a_footer.php' ?>