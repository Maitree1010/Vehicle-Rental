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

                                    $bselect="Select * from bookings where id=$uid;";
									$bqry=mysqli_query($conn,$bselect);					
									$brow=mysqli_fetch_array($bqry); 
									
										// $bid=$brow['id'];
										// $vehicle_id=$brow['vehicle_id'];
										// $renter_id=$brow['renter_id'];
										// $pic_loc=$brow['pic_location'];
										// $rtn_loc=$brow['rtn_location'];
										// $pic_date=$brow['pic_date'];
										// $rtn_date=$brow['rtn_date'];
										// $pic_tim=$brow['pic_tim'];
										// $rtn_tim=$brow['rtn_tim'];
										// $total_cost=$brow['total_cost'];
										// $drv_lic=$brow['drv_lic']; 
										// $adharcard=$brow['adharcard']; 
                              			// $status=$brow['status'];

                               			// $vselect="select * from vehicles where vehicle_id=$vehicle_id";
									    // $vqry=mysqli_query($conn,$vselect);
									    // $vrow=mysqli_fetch_array($vqry);
                               			// $vhimg=$vrow['vhimg']; 

                               			


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


    <script>
        function enableEditing() {
    const inputs = document.querySelectorAll('.form-group input, .form-group select');
    inputs.forEach(input => {
        if (input.id !== 'email') { // Skip enabling email input
            input.removeAttribute('disabled');
        }
    });
    document.getElementById('save-btn').style.display = 'block';
    document.getElementById('edit-btn').style.display = 'none';
}

    </script>
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
									
									<tr>										
										<th><b>Name</b></th>
										<td><?= $name;?></td>
									</tr>
									<tr>										
										<th><b>Phone No</b></th>
										<td><?= $phone;?></td>
									</tr>
									<tr>										
										<th><b>Email</b></th>
										<td><?= $uemail; ?></td>

									</tr>
									<tr>										
										<th><b>Password</b></th>
										<td><?= $upass; ?></td>
									</tr>
									<tr>
									
										<th colspan="2">
											<center>
                                            <a href="edit-info.php" value="" class="btn btn-primary py-3 px-3">🖋 Edit</a></th>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
					
				</div>
</body>

</html>
