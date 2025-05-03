<?php
	// error_reporting(0);	

	if($_GET['bookid']){
        $bid=$_GET['bookid'];
        
    }
    else{
        header("location:profile.php");
        exit;
    }
	
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

$bselect="Select * , DATEDIFF(rtn_date, pic_date) AS date from bookings where renter_id=$uid AND id=$bid AND status='Approve';";
$bqry=mysqli_query($conn,$bselect);		

// $bid=$brow['id'];
$brow=mysqli_fetch_array($bqry);
                     $vehicle_id=$brow['vehicle_id'];
                     $renter_id=$brow['renter_id'];
                     $pic_loc=$brow['pic_location'];
                     $rtn_loc=$brow['rtn_location'];
                     $pic_date=$brow['pic_date'];
                     $rtn_date=$brow['rtn_date'];
                     $pic_tim=$brow['pic_tim'];
                     $rtn_tim=$brow['rtn_tim'];
                     

                     $date=$brow['date'];
                     $drv_lic=$brow['drv_lic']; 
                     $adharcard=$brow['adharcard']; 
                    $status=$brow['status'];
                    $payment=$brow['payment'];

                    $vselect="select * from vehicles where vehicle_id=$vehicle_id";
                    $vqry=mysqli_query($conn,$vselect);
                    $vrow=mysqli_fetch_array($vqry);
                       $vhimg=$vrow['vhimg']; 
                       $vname=$vrow['modelname'];
                       $address=$vrow['address'] ;
                       $price=$vrow['price'];

                       $total_cost=$date*$price;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Drive My Dreams</title>
    <link rel="icon" type="images/x-icon" href="images/3.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="css/form/style.css">
    <link rel="stylesheet" href="fonts/meterial.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
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
		padding: 2px;
        border-radius: 100%;
        }
		.main-content .addEmployeeModal,.modal-dialog{
			padding: 0px;
			margin:5px;
			/* align-items:center; */
		}
</style>
<!-- <meta http-equiv="refresh" content="6"/> -->

<div class="main-content">
					<center>
					<!----add-modal start--------->
					<div class="" style="width:700px"  id="">
						<div role="document">
							<div class="modal-content">
								<div class="modal-header">
                                <img src="images/3.png" alt="no" height="40px" style="border-radius:40%">
									<h5 class="modal-title"><b>Booking Receipt</h5>
								</div>
								<div class="modal-body">
									
									<form method="POST">	
									
									<div class="form-group">
										<label style="color:black;">User Name:</label>
										<input type="text" readonly class="" value="<?=$name;?>" name="current" >
									</div>
									<div class="form-group">
										<label style="color:black;">Vehicle Name:</label>
										<input type="text" readonly value="<?=$vname;?>" >
									</div>
									<div class="form-group">
										<label style="color:black;">Vehicle Id:</label>
										<input type="text" readonly value="<?=$vehicle_id;?>" >
									</div>
                                    <div class="form-group">
										<label style="color:black;">Booking Id:</label>
										<input type="text" readonly value="<?=$bid;?>" >
									</div>
                                    <div class="form-group">
                                        <div class="divp">
                                            <label style="color:black;">From Date:</label>
                                            <input type="text" readonly value="<?=$pic_date;?>" >
                                        </div>
                                        <div class="divp">
                                            <label style="color:black;">To Date:</label>
                                            <input type="text" readonly  value="<?=$rtn_loc;?>" >
                                        </div>
									</div>
                                    <div class="form-group">
                                        <div class="divp">
										    <label style="color:black;">Picup Location:</label>
										    <input type="text" readonly value="<?=$pic_loc;?>" >
                                        </div>
                                        <div class="divp">
                                            <label style="color:black;">Return Location:</label>
                                            <input type="text" readonly value="<?=$rtn_loc;?>" >
                                        </div>    
                                    </div>
                                    <div class="form-group">
                                        <div class="divp">
                                            <label style="color:black;">Total Days:</label>
                                            <input type="text" readonly  value="<?=$date;?> Day" >
                                        </div>
                                        <div class="divp">
                                            <label style="color:black;">Total Amount:</label>
                                            <input type="text" readonly   value="&#8377; <?=$total_cost;?>" >
                                        </div>
                                    </div>
								</div>
								<div class="modal-footer">
									<a type="Print" value="Cancel" class="btn text-white  btn-dark" onclick="print();">Print</a>
									<a href="profile.php" class="btn btn-success" name="update">Back</a>
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


