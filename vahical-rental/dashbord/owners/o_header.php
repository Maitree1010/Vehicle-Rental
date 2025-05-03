<?php
// error_reporting(0);
session_start();
include 'includes/cn.php';

if(isset($_POST['go'])){
	$search=$_POST['search'];
}

if(!isset($_SESSION['oid'])){
	header("location:login.php");
}else{


	$oid=$_SESSION['oid'];
   $oselect="Select * from owners where owner_id='$oid'";
   $oqry=mysqli_query($conn,$oselect);
   $orow=mysqli_fetch_array($oqry);

   $oemail=$orow['email'];
   $opass=$orow['password'];
   $oname=$orow['name'];
   $ophone=$orow['phone'];
   $profilePicture = !empty($orow['propic']) ? $orow['propic'] : 'images/profile.jpg';   
 

   $book="select * from bookings where status='' &&  owner_id='$oid'";
	$bhqry=mysqli_query($conn,$book);
	$update=0;
	while($bhrow=mysqli_fetch_array($bhqry)){
		$update=$update+1;
	}
	$svehicle="select * from vehicles where owner_id='$oid' ";
	$vqry=mysqli_query($conn,$svehicle);
	$vehicles=0;
	while($vrow=mysqli_fetch_array($vqry)){
		$vehicles=$vehicles+1;
	}
	
   

}

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Owner Dashboard</title>
    <link rel="icon" type="images/x-icon" href="images/3.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="dashbord/css/bootstrap.min.css">
	<!----css3---->

	<link rel="stylesheet" href="dashbord/css/custom.css">
	<link rel="stylesheet" href="dashbord/owners/form/style.css">

	<link rel="stylesheet" href="dashbord/owners/style.css">


	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!--google material icon-->

	<link href="dashbord/icon/meterial.css" rel="stylesheet">

	<style>
	.updateli:hover{
		background-color:#DBE5FD;
	}
</style>
</head>

<body>



	<div class="wrapper">

		<div class="body-overlay"></div>

		<!-------sidebar--design------------>

		<div id="sidebar">
			<div class="sidebar-header">
				<h3><img src="images/3.png" class="img-fluid" /><span>Drive My Dreams</span></h3>
			</div>
			<ul class="list-unstyled component m-0">
				<li class="<?php if(isset($owners)){ echo $owners; } else{ echo '';}  ?>">
					<a href="owners.php" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">border_color</i>Vehicle
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu1">
						<li class=" <?php if(isset($O_add_vehicle)){echo $O_add_vehicle ;}else{echo " " ;} ?> "><a href="O_add_vehicle.php" >Add vehicle</a></li>
						<li class="<?php if(isset($O_mng_vehicle)){echo $O_mng_vehicle ;}else{echo " " ;} ?>"><a href="O_mng_vehicle.php">Manage Vehicle</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">apps</i>Bookings
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu2">
						<li class="<?php if(isset($O_tlt_booking)){echo $O_tlt_booking ;}else{echo " " ;} ?>"><a href="O_tlt_booking.php">Total Booking</a></li>
						<li class="<?php if(isset($O_apr_booking)){echo $O_apr_booking ;}else{echo " " ;} ?>"><a href="O_apr_booking.php">Approved Booking</a></li>
						<li class="<?php if(isset($O_unapr_booking)){echo $O_unapr_booking ;}else{echo " " ;} ?>"><a href="O_unapr_booking.php">Unapproved Booking</a></li>

					</ul>
				</li>

				
				<li class="">
					<a href="O_bookingreport.php" class=""><i class="material-icons">date_range</i>Booking Report </a>
				</li>
				

			</ul>
		</div>

		<!-------sidebar--design- close----------->



		<!-------page-content start----------->

		<div id="content">

			<!------top-navbar-start----------->

			<div class="top-navbar">
				<div class="xd-topbar">
					<div class="row">
						<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
							<div class="xp-menubar">
								<span class="material-icons text-white">signal_cellular_alt</span>
							</div>
						</div>

						<div class="col-md-5 col-lg-3 order-3 order-md-2">
							<div class="xp-searchbar">
								<form method="Post">
									<div class="input-group">
										<input type="search" name="search" class="form-control" placeholder="Search">
										<div class="input-group-append">
											<button class="btn" name="go" type="submit" id="button-addon2">Go
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>


						<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
							<div class="xp-profilebar text-right">
								<nav class="navbar p-0">
									<ul class="nav navbar-nav flex-row ml-auto">
										<li class="dropdown nav-item active">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<span class="material-icons">notifications</span>
												<span class="notification"><?= $update;?></span>
											</a>
											<ul class="dropdown-menu">
											<li style="text-align:center;">New Booking</li>
												<?php

												$book="select * from bookings where status='' &&  owner_id='$oid' ";
												$bqry=mysqli_query($conn,$book);
												if (mysqli_num_rows($bqry) > 0)
												{
													while($brow=mysqli_fetch_array($bqry))
													{
															$vid=$brow['vehicle_id'];
															$book_id=$brow['id'];
															$pic_loc=$brow['pic_location'];

														$vehicle="select * from vehicles where vehicle_id='$vid' ";
														$vhqry=mysqli_query($conn,$vehicle);
														

												
														$vhrow=mysqli_fetch_array($vhqry);
													
														$vhimg=$vhrow['vhimg'];
														$vid=$vhrow['vehicle_id'];
														$modelname=$vhrow['modelname'];
													
													?>
														<li class="p-1 updateli" style="display:flex; align-items:center;">
															<a href="O_mng_booking.php?book_id=<?=$book_id;?>">
																<img src="<?= $vhimg;?>" style="width:40px; height:40px; object-fit:cover; border-radius:50%;" />
																<?= $pic_loc;?>
															</a>
														</li>
													<?php
													}
												}
												else{
													?> 
														<li><P class="px-3">No Updates 👀</p></li>
													<?php
													}
													?>
											</ul>
										</li>

										

										<li class="dropdown nav-item">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<img src=" <?= $profilePicture; ?>" style="width:40px; border-radius:50%;" />
												<span class="xp-user-live"></span>
											</a>
											<ul class="dropdown-menu small-menu">
												<li><a href="O_profile.php">
														<span class="material-icons">person_outline</span>
														Profile
													</a></li>
												<li><a href="O_settings.php">
														<span class="material-icons">settings</span>
														Settings
													</a></li>
												<li><a href="logout.php">
														<span class="material-icons">logout</span>
														Logout
													</a></li>
											</ul>
										</li>


									</ul>
								</nav>
							</div>
						</div>

					</div>

					<div class="xp-breadcrumbbar text-center">
						<h4 class="page-title">Dashboard</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Owner</a></li>
							<li class="breadcrumb-item active" aria-curent="page">
								<?php
									 if(isset($owners)){ echo 'Dashbord'; } else{ echo '';}
									 if(isset($O_add_vehicle)){echo "Vehicle &nbsp; / &nbsp; Add Vehicle" ;}else{echo " " ;}
									 if(isset($O_mng_vehicle)){echo "Vehicle &nbsp; / &nbsp; Manage Vehicle" ;}else{echo " " ;}
									 if(isset($O_mng_booking)){echo "Booking &nbsp; / &nbsp; Manage Booking" ;}else{echo " " ;}
									 if(isset($O_tlt_booking)){echo "Booking &nbsp; / &nbsp; Total Booking" ;}else{echo " " ;}
									 if(isset($O_apr_booking)){echo "Booking &nbsp; / &nbsp; Approved Booking" ;}else{echo " " ;}
									 if(isset($O_unapr_booking)){echo "Booking &nbsp; / &nbsp; Unapproved Booking" ;}else{echo " " ;}
									 if(isset($O_bookingreport)){echo "&nbsp;Booking Report" ;}else{echo " " ;}
								?>
							</li>
						</ol>
					</div>


				</div>
			</div>
			<!------top-navbar-end----------->