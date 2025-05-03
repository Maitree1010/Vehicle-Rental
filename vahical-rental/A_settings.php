<?php
	// error_reporting(0);	

	include 'dashbord/admin/a_header.php';

	
	
	if(isset($_POST['update'])){
		
		
		$current=$_POST['current'];
		$new=$_POST['new'];
		$confirm=$_POST['confirm'];

		if($new == $confirm){

			$ops="select * from admin where email='$aemail' && phone='$aphone' && password='$current' ";
			$opqry=mysqli_query($conn,$ops);
			if(mysqli_num_rows($opqry) > 0){
				$updateQuery = "UPDATE `admin` SET `password`='$new' WHERE admin_id='$aid'";
				$result = mysqli_query($conn, $updateQuery);
				if($result){
					echo'<script>alert("Successfully Updated")</script>';
				}
			}
			else{
				echo'<script>alert("Current Password is Wrong")</script>';

			}
		}
		else{
			echo'<script>alert("Confirm Password Must Be Same of New passwor")</script>';

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
									<h5 class="modal-title">Set New Password</h5>
								</div>
								<div class="modal-body">
									
									<form method="POST">	
									
									<div class="form-group">
										<label>Current</label>
										<input type="text"  required class="form-control" placeholder="Current Password" name="current" >
									</div>
									<div class="form-group">
										<label>New</label>
										<input type="text" required class="form-control" name="new"  placeholder="New Password" >
									</div>
									<div class="form-group">
										<label>Confirm</label>
										<input type="text" required class="form-control" name="confirm"  placeholder="Confirm Password" >
									</div>
								</div>
								<div class="modal-footer">
									<input type="reset" value="Cancel" class="btn btn-secondary" />
									<input type="submit" class="btn btn-success" name="update" />
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