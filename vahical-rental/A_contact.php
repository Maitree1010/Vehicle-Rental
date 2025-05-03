<?php
	$A_contact='active';
	include 'dashbord/admin/a_header.php';
	// error_reporting(0);	

	
	if(isset($_POST['upadte'])){
		
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		
		$updateQuery = "UPDATE `contact` SET `email`='$email',`phone`='$phone', `address`='$address' WHERE id=1";
		$result = mysqli_query($conn, $updateQuery);
		if($result){
			echo'<script>alert("Successfully Updated")</script>';
		}
	}

$query = "SELECT * FROM `contact` WHERE id=1";
$result = mysqli_query($conn, $query);
$contactdata = mysqli_fetch_assoc($result);
$email=$contactdata['email'];
$phone=$contactdata['phone'];
$address=$contactdata['address'];



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
									<h5 class="modal-title">Edit Contact Page </h5>
								</div>
                                
								<div class="modal-body d-flex" style="justify-content:center;">
									
									<form method="POST">	
									<div class="form-group">
										<label>Phone *</label>
										<input type="text" value="<?= $phone;?>" class="form-control" name="phone" required>
									</div>
                                    <div class="form-group">
										<label>Email *</label>
										<input type="text" value="<?= $email;?>" class="form-control" name="email" required>
									</div>
									<div class="form-group">
										<label class="mr-2">Address</label>
										<textarea class="form-control" rows="5" cols="40" name="address" required> <?= $address;?> </textarea>
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