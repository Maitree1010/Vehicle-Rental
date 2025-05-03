<?php
// error_reporting(0);
session_start();
include 'includes/cn.php';


$uid=$_SESSION['uid'];

$uselect="Select * from renters where renter_id='$uid' ";
$uqry=mysqli_query($conn,$uselect);
$urow=mysqli_fetch_array($uqry);
$uemail=$urow['email'];
$upass=$urow['password'];
$phone=$urow['phone']; 
$name=$urow['name']; 

                                    
									
										

                    if(isset($_POST['edit'])){
                        $name=$_POST['name'];
                        $phone=$_POST['phone'];
                        $email=$_POST['email'];
                        $pass=$_POST['pass'];

                        $edit="UPDATE renters SET `name`='$name',`phone`='$phone',`email`='$email',`password`='$pass' where renter_id=$uid;";
                        $qry=mysqli_query($conn,$edit);
                        if($qry)
                        {
                                echo'<script>alert("SucceessFully Updated 😎")</script> ';
                        }
                        else
                        {
                                echo'<script>alert("Not Upadated")</script> ';
                        }
                    }           			


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Personal Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dashbord/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet">


    <style>
        /* General Reset */
.form-container {
    max-width: 1000px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 1px 1px 30px 0.5px  rgb(198, 196, 196);
    width: 80%;
    font-family:'Poppins';
}

        </style>
</head>

<body style="background-color:#fff;">
    <div class="form-container">

        <h2>Personal Details</h2>
     
    
        <div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							

							<table class="table table-striped table-hover">	
								

								<tbody>
                                    <form method="POST">
									
									<tr>										
										<th><b>Name</b></th>
										<th><input type="text" name="name" class="form-control" value="<?= $name;?>" required placeholder="Your Email"></th>
									</tr>
									<tr>										
										<th><b>Phone No</b></th>
										<th><input type="text" name="phone" class="form-control" value="<?= $phone;?>" required placeholder="Your Email"></th>
									</tr>
									<tr>										
										<th><b>Email</b></th>
										<th><input type="email" name="email" class="form-control" value="<?= $uemail; ?>" required placeholder="Your Email"></th>
									</tr>
									<tr>										
										<th><b>Password</b></th>
										<th><input type="text" name="pass" class="form-control" value="<?= $upass; ?>" required placeholder="Your Email"></th>
									</tr>
									<tr>
									<th colspan="2">
											<center>
											<input type="submit" name="edit" value="Save 🔐" class="btn btn-primary py-3 px-3" ></th>
									</tr>
                                </form>
								</tbody>
							</table>
						</div>
					</div>
				</div>
					
				</div>
</body>

</html>
