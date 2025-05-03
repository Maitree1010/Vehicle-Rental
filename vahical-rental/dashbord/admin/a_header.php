<?php 
    // error_reporting(0);
    session_start();
    include 'includes/cn.php';
	if(! isset($_SESSION['aid'])){
		header("location:login.php");
	}
	else{
    $aid=$_SESSION['aid'];
    $aselect="Select * from admin where admin_id='$aid' ";
    $aqry=mysqli_query($conn,$aselect);
    $arow=mysqli_fetch_array($aqry);
    $apass=$arow['password'];
	$aemail=$arow['email'];
    $aname=$arow['name'];
    $aphone=$arow['phone'];
    $profilePicture = !empty($arow['propic']) ? $arow['propic'] : 'images/profile.jpg';   
	

	$vehicle="select * from vehicles where status='' ";
	$vhqry=mysqli_query($conn,$vehicle);
	$update=0;
	while($vhrow=mysqli_fetch_array($vhqry)){
		$update=$update+1;
	}
	$bupdate="select * from bookings where status='' ";
	$bqry=mysqli_query($conn,$bupdate);
	$booking=0;
	while($brow=mysqli_fetch_array($bqry)){
		$booking=$booking+1;
	}
	
	$renters="select * from renters";
	$rqry=mysqli_query($conn,$renters);
	$trenters=0;
	while($rrow=mysqli_fetch_array($rqry)){
		$trenters=$trenters+1;
	}
	
	$owners="select * from owners";
	$oqry=mysqli_query($conn,$owners);
	$towners=0;
	while($orow=mysqli_fetch_array($oqry)){
		$towners=$towners+1;
	}
	
	}

	if(isset($_POST['go'])){
		$search=$_POST['search'];
	}
	
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Admin Dashboard</title>
    <link rel="icon" type="images/x-icon" href="images/3.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="dashbord/css/bootstrap.min.css">
	<!----css3---->

	<link rel="stylesheet" href="dashbord/css/custom.css">
	<!-- <link rel="stylesheet" href="dashbord/form/style.css"> -->

	<link rel="stylesheet" href="dashbord/admin/style.css">


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
				<li class="<?php if(isset($admin)){ echo $admin; } else{ echo '';}  ?>">
					<a href="admin.php" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">border_color</i>Vehicle
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu1">
						<li class=" <?php if(isset($A_total_vehicle)){echo $A_total_vehicle ;}else{echo " " ;} ?> "><a href="A_total_vehicle.php">Total Vehicles</a></li>
						<li class="<?php if(isset($A_apr_vehicle)){echo $A_apr_vehicle ;}else{echo " " ;} ?>"><a href="A_apr_vehicle.php">Aproval Vehicles</a></li>
						<li class="<?php if(isset($A_unapr_vehicle)){echo $A_unapr_vehicle ;}else{echo " " ;} ?>"><a href="A_unapr_vehicle.php">Unproval vehicles</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">apps</i>Bookings
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu2">
						<li class=" <?php if(isset($A_tlt_booking)){echo $A_tlt_booking ;}else{echo " " ;} ?>" ><a href="A_tlt_booking.php">Total Booking</a></li>
						<li class=" <?php if(isset($A_apr_booking)){echo $A_apr_booking;}else{echo " " ;} ?> "><a href="A_apr_booking.php">Aproval Booking</a></li>
						<li class=" <?php if(isset($A_unapr_booking)){echo $A_unapr_booking;}else{echo " " ;} ?> "><a href="A_unapr_booking.php">Unaproval Booking</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">equalizer</i>History
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu3">
						<li class=" <?php if(isset($A_user)){echo $A_user ;}else{echo " " ;} ?>"><a href="A_user.php">Users</a></li>
						<li class=" <?php if(isset($A_owner)){echo $A_owner ;}else{echo " " ;} ?>"><a href="A_owner.php">Owners</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">content_copy</i>Pages
					</a>
					<ul class="collapse list-unstyled menu" id="homeSubmenu4">
						<li class=" <?php if(isset($A_about)){echo $A_about ;}else{echo " " ;} ?>"><a href="A_about.php">About Us</a></li>
						<li class=" <?php if(isset($A_contact)){echo $A_contact ;}else{echo " " ;} ?>"><a href="A_contact.php">Contact</a></li>
					</ul>
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
								<form method="POST">
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
											<li style="text-align:center;">New Vehicle</li>
												<?php
												$vehicle="select * from vehicles where status='' ";
												$vhqry=mysqli_query($conn,$vehicle);
												if (mysqli_num_rows($vhqry) > 0)
												{
													while($vhrow=mysqli_fetch_array($vhqry)){
														$vhimg=$vhrow['vhimg'];
														$vid=$vhrow['vehicle_id'];
														$modelname=$vhrow['modelname'];
													
												?>
												<li class="p-1 updateli" style="display:flex; align-items:center;">
														<a href="A_mng_vehicle.php?vid=<?=$vid;?>">
															<img src="<?= $vhimg;?>" style="width:40px; height:40px; object-fit:cover; border-radius:50%;" />
															<?= $modelname;?>
														</a>
												</li>
												<?php
													}
												}else{
													echo "
														<li><P class='px-3'>No Updates 👀</p></li>
													";
												}
												?>
											</ul>
										</li>

										<li class="nav-item">
											<a class="nav-link" href="#">
												<span class="material-icons">question_answer</span>
											</a>
										</li>

										<li class="dropdown nav-item">
											<a class="nav-link" href="#" data-toggle="dropdown">
												<img src="<?= $profilePicture;?>" style="width:40px; height:40px; object-fit:cover; border-radius:50%;" />
												<span class="xp-user-live"></span>
											</a>
											<ul class="dropdown-menu small-menu">
												<li><a href="A_profile.php">
														<span class="material-icons">person_outline</span>
														Profile
													</a></li>
												<li><a href="A_settings.php">
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
							<li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
							<li class="breadcrumb-item active" aria-curent="page">
							<?php
									if(isset($admin)){ echo 'Dashbord'; } else{ echo '';}
									 if(isset($A_total_vehicle)){echo "Vehicle &nbsp; / &nbsp; Total Vehicle" ;}else{echo " " ;}
									 if(isset($A_apr_vehicle)){echo "Vehicle &nbsp; / &nbsp; Approved Vehicle" ;}else{echo " " ;}
									 if(isset($A_unapr_vehicle)){echo "Vehicle &nbsp; / &nbsp; Unapproved Vehicle" ;}else{echo " " ;}
									 if(isset($A_mng_vehicle)){echo "Vehicle &nbsp; / &nbsp; Manage Vehicle" ;}else{echo " " ;}
									 if(isset($A_tlt_booking)){echo "Booking &nbsp; / &nbsp; Total Booking" ;}else{echo " " ;}
									 if(isset($A_apr_booking)){echo "Booking &nbsp; / &nbsp; Approved Booking" ;}else{echo " " ;}
									 if(isset($A_unapr_booking)){echo "Booking &nbsp; / &nbsp; Unapproved Booking" ;}else{echo " " ;}
									 if(isset($A_detail_booking)){echo "&nbsp;Booking Details" ;}else{echo " " ;}
									 if(isset($A_user)){echo "&nbsp; User Details" ;}else{echo " " ;}
									 if(isset($A_owner)){echo "&nbsp; Owner Details" ;}else{echo " " ;}
									 if(isset($A_about)){echo "&nbsp;About Page" ;}else{echo " " ;}
									 if(isset($A_contact)){echo "&nbsp;Contact Page" ;}else{echo " " ;}
								?>
								</li>
					 </ol>
					</div>


				</div>
			</div>
			<!------top-navbar-end----------->

			<!--  -->