<?php 
    error_reporting(0);
    session_start();
    include 'includes/cn.php';
    $uid=$_SESSION['uid'];
    $uselect="Select * from renters where renter_id='$uid' ";
    $uqry=mysqli_query($conn,$uselect);
    $urow=mysqli_fetch_array($uqry);
    $uemail=$urow['email'];
    $upass=$urow['password'];
    $profilePicture = !empty($urow['propic']) ? $urow['propic'] : 'images/profile.jpg';

    $bupdate="select * from bookings where status!='' && renter_id='$uid' ;";
	$bqry=mysqli_query($conn,$bupdate);
	$booking=0;
	while($brow=mysqli_fetch_array($bqry)){
		$booking=$booking+1;
	}
    
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

<body>

    <!-- start nav -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <div class="dlg">
                <img src="images/3.png" alt="no" height="60px" style="border-radius:40%">
                <a class="navbar-brand" href="index.php">&nbsp;DRIVE<span> MY</span> DREAMS</a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item <?php if(isset($index)){echo $index ;} else {echo '';} ?>"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item <?php if(isset($about)){echo $about ;} else {echo '';} ?>"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item <?php if(isset($services)){echo $services ;} else {echo '';} ?>"><a href="services.php" class="nav-link">Services</a></li>
                    <!-- <li class="nav-item <?php if(isset($pricing)){echo $pricing ;} else {echo '';} ?>"><a href="pricing.php" class="nav-link">Pricing</a></li> -->
                    <li class="nav-item <?php if(isset($car)){echo $car ;} else {echo '';} ?>"><a href="vehicle.php" class="nav-link">Vehicles</a></li>
                    <li class="nav-item <?php if(isset($blog)){echo $blog ;} else {echo '';} ?>"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item <?php if(isset($contact)){echo $contact ;} else {echo '';} ?>"><a href="contact.php" class="nav-link">Contact</a></li>
                    
                    <?php if(!isset($uid)){ ?>
                        <li class="nav-item <?php if(isset($owners)){echo $owners ;} else {echo '';} ?>"><a href="login.php" class="nav-link" >Login</a></li>
                   <?php } 
                    else{
                    ?>
                        <div class="">
                            <style>
                                .xp-profilebar .navbar-nav>li.show .dropdown-menu {
                                    transform: translate3d(0, 0, 0);
                                    opacity: 1;
                                    display: block;
                                    visibility: visible;
                                }

                                .xp-profilebar .navbar-nav>li.show .dropdown-menu {
                                    transform: translate3d(0, 0, 0);
                                    opacity: 1;
                                    display: block;
                                    visibility: visible;
                                }

                                .xp-profilebar .navbar-nav .dropdown-menu {
                                    position: static;
                                    float: none;
                                }

                                .xp-profilebar .dropdown-menu.show {
                                    display: block;
                                }

                                .xp-profilebar .small-menu {
                                    min-width: 8rem !important;
                                }

                                .xp-profilebar .dropdown-menu {
                                    border: 0;
                                    box-shadow: 0 2px 5px 0 rgba(0 0 0 / 26%);
                                    transform: translate3d(0, -20px, 0);
                                    visibility: hidden;
                                    position: absolute !important;
                                    transition: all 150ms linear;
                                    display: block;
                                    min-width: 15rem;
                                    right: 0;
                                    left: auto;
                                    opacity: 0;

                                }

                                .xp-profilebar .navbar-nav li a {
                                    position: relative;
                                    display: block;
                                    padding: 4px 10px !important;
                                }

                                .xp-profilebar .dropdown-menu li>a {
                                    font-size: 13px;
                                    padding: 10px 20px;
                                    margin: 0 5px;
                                    border-radius: 2px;
                                    font-weight: 400;
                                    transition: all 150ms linear;
                                }

                                .xp-profilebar a,
                                a:hover,
                                a:focus {
                                    color: #333;
                                    text-decoration: none;
                                    transition: all 0.3s;
                                }

                                .xp-profilebar .nav-item .nav-link {
                                    display: flex;
                                }

                                .xp-profilebar .nav-item .nav-link .material-icons {
                                    position: relative;
                                    top: 10px;
                                    font-size: 19px;

                                }

                                .xp-profilebar .navbar .navbar-nav .notification {
                                    position: absolute;
                                    /* top: 2px; */
                                    right: 3px;
                                    margin-bottom: 8px;
                                    display: block;
                                    font-size: 9px;
                                    border: 0;
                                    background-color:rgb(43, 189, 205) !important;
                                    min-width: 15px;
                                    text-align: center;
                                    padding: 1px 5px;
                                    height: 15px;
                                    border-radius: 2px;
                                    line-height: 14px;
                                }

                                .xp-profilebar .navbar-nav li a {
                                    position: relative;
                                    display: block;
                                    padding: 4px 10px !important;
                                }

                                .xp-profilebar .dropdown-menu li>a {
                                    font-size: 13px;
                                    padding: 10px 20px;
                                    margin: 0 5px;
                                    border-radius: 2px;
                                    font-weight: 400;
                                    transition: all 150ms linear;
                                }

                                .xp-profilebar a,
                                .xp-profilebar a:hover,
                                .xp-profilebar a:focus {
                                    color: #333;
                                    text-decoration: none;
                                    transition: all 0.3s;
                                }

                                .xp-profilebar a {
                                    color: #333;
                                    font-weight: 400;
                                    align-items: center;
                                    display: flex !important;
                                }
                            </style>
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">
                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <span class="material-icons">notifications</span>
                                                <span class="notification"><?= $booking;?></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li style="text-align:center;">Booking Status</li>
                                                <?php
                                            $book="select * from bookings where status!='' &&  renter_id='$uid' ";
												$bqry=mysqli_query($conn,$book);
												if (mysqli_num_rows($bqry) > 0)
												{
													while($brow=mysqli_fetch_array($bqry))
													{
															$vid=$brow['vehicle_id'];
															$book_id=$brow['id'];
															$pic_loc=$brow['pic_location'];
															$status=$brow['status'];

														$vehicle="select * from vehicles where vehicle_id='$vid' ";
														$vhqry=mysqli_query($conn,$vehicle);
														

												
														$vhrow=mysqli_fetch_array($vhqry);
													
														$vhimg=$vhrow['vhimg'];
														$vid=$vhrow['vehicle_id'];
														$modelname=$vhrow['modelname'];

                                                        if($status=='Approve'){
                                                            ?>
                                                            <li class="p-1 updateli" style="display:flex; align-items:center;">
															<a href="mybooking.php" target="main">
																<img src="<?= $vhimg;?>" style="width:40px; height:40px; object-fit:cover; border-radius:50%;" class="mr-2" />
																Success
															</a>
														</li>
                                                        <?php
                                                        }else{
                                                            ?>
                                                            <li class="p-1 updateli" style="display:flex; align-items:center;">
															<a href="mybooking.php" target="main">
																<img src="<?= $vhimg;?>" style="width:40px; height:40px; object-fit:cover; border-radius:50%;" class="mr-2" />
																Reject
															</a>
														</li>
                                                            <?php
                                                        }
													
													?>
														
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
                                                <img src="<?= $profilePicture; ?>" style="width:40px; height:40px; object-fit:cover; border-radius:50%;" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="profile.php"><span class="icon-person mr-2" style="font-size:25px;"></span>
                                                        <!-- <span class="material-icons mr-2">person_outline</span> -->
                                                        Profile
                                                    </a></li>
                                                <!-- <li><a href="#">
                                                            <span class="material-icons mr-2">question_answer</span>
                                                            Messages
                                                        </a></li> -->

                                                <!-- <li><a href="#">
                                                            <span class="material-icons">settings</span>
                                                            Settings
                                                        </a></li> -->

                                                <li><a href="logout.php">
                                                        <span class="material-icons mr-2">logout</span>
                                                        Logout
                                                    </a></li>

                                            </ul>
                                        </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>
                <?php } ?>
            </div>
            </ul>

        </div>
    
    </nav>
    <!-- END nav -->