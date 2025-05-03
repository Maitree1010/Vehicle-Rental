<?php 
    $car='active';  
  	include 'includes/header.php';	
	
	  $search=$_GET['search'];
					// echo $search;
					if($_SERVER['REQUEST_METHOD'] === 'POST'){
						$search=$_POST['search'];
					}
	
?>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-5 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
								class="ion-ios-arrow-forward"></i></a></span> <span>Vehicles<i
							class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-3 bread">Choose Your Vehicle</h1>
			</div>
			<div class="col-md-7 featured-top">
    				<div class="row no-gutters">
					<div class="col-md-6 d-flex ml-auto align-items-center">
						<form action="#" class="request-form ftco-animate text-black " style="border-radius:50px; background-color: rgba(7, 7, 7, 0.29);" method="post">
						<div class="form-group mr-2" >
							<input style="color:white !important; border:0.5px solid white !important;" type="input" id="input-box" name="search" value="<?=$search;?>" class="form-control search" placeholder="Search Vehicle" onchange="this.form.submit()">
						</div>
						</form>
						
							<!-- <div class="result-box bg-white">
								
							</div>
							<script src="js/search.js"></script> -->

							</div>
						

						
							
								
						
	  				
	  					
	  				</div>
				</div>
		</div>
	</div>
</section>

    			
  		


<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<?php

					
					if($search){
				
					
					$vselect="Select * From vehicles where `status`='Approve' AND (address like '%$search%' OR category like '%$search%' OR type like '%$search%' OR transmition like '%$search%' OR model like '%$search%' OR modelname like '%$search%' OR price like '%$search%' OR color like '%$search%' )";
					

					$vqry=mysqli_query($conn,$vselect);	
					if (mysqli_num_rows($vqry) > 0){

						while ($vrow=mysqli_fetch_array($vqry)) 
						{
							$vehicle_id=$vrow['vehicle_id'];
							$owner_id=$vrow['owner_id'];
							$category=$vrow['category'];
							$type=$vrow['type'];
							$transmition=$vrow['transmition'];
							$model=$vrow['model'];
							$modelname=$vrow['modelname'];
							$price=$vrow['price'];
							$vhimg=$vrow['vhimg']; 
							$address=$vrow['address']; 
						// $_SESSION['vid']=$vehicle_id;
						?>
			<div class="col-md-4">
				<div class="car-wrap rounded ftco-animate">
					<div class="img rounded d-flex align-items-end" style="background-image: url(<?= $vhimg ?>);">
					</div>
					<div class="text">
						<h2 class="mb-0 d-flex"><a href="vehicle-single.php">
								<?= $modelname ?>
							</a> <span class="price cat ml-auto">
								<?= $address;?>
							</span></h2>
						<div class="d-flex mb-3">
							<span class="cat vehicle_id" hidden>
								<?= $vehicle_id; ?>
							</span>
							<span class="cat user_id" hidden>
								<?= $uid; ?>
							</span>
							<span class="cat owner_id" hidden>
								<?= $owner_id; ?>
							</span>
							<span class="cat vprice" hidden>
								<?= $price; ?>
							</span>
							<span class="cat">
								<?= $category ?>
							</span>
							<p class="price ml-auto">
							&#8377; <?= $price ?><span>/day</span>
							</p>
						</div>
						<?php if(!isset($_SESSION['uid'])){?>
						<p class="d-flex mb-0 d-block"><a href="login.php" class="btn btn-primary "
								style="width:100%">Login For Book</a></p>
						<?php } else {
								?>
						<p class="d-flex mb-0 d-block"><a href="#addEmployeeModal"
								onclick="sessionStorage.setItem('vid','<?= $vehicle_id; ?>');  sessionStorage.setItem('owner_id','<?= $owner_id; ?>');  sessionStorage.setItem('vprice','<?= $price; ?>');   go();"
								class="btn btn-primary py-2 mr-1 booknow" name="Next" data-toggle="modal">Book now</a>
							<a href="vehicle-single.php?vehicle_id=<?= $vehicle_id; ?>"
								class="btn btn-secondary py-2 ml-1">Details</a>
						</p>

						<?php } ?>
					</div>
				</div>

			</div>
			<?php
						}
					}
				}
					 ?>

		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 heading-section text-center ftco-animate mb-5">
					<span class="subheading">Categoris offer</span>
					<h2 class="mb-2">Ower Vehicles</h2>
				</div>
			</div>
			<div class="row">
				<?php

					$allvselect="Select * from vehicles where status='Approve' ";
					$allvqry=mysqli_query($conn,$allvselect);	
					if (mysqli_num_rows($allvqry) > 0){

						while ($allvrow=mysqli_fetch_array($allvqry)) 
						{
							$vehicle_id=$allvrow['vehicle_id'];
							$owner_id=$allvrow['owner_id'];
							$category=$allvrow['category'];
							$type=$allvrow['type'];
							$transmition=$allvrow['transmition'];
							$model=$allvrow['model'];
							$modelname=$allvrow['modelname'];
							$price=$allvrow['price'];
							$vhimg=$allvrow['vhimg']; 
							$address=$allvrow['address']; 
						// $_SESSION['vid']=$vehicle_id;
						?>
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
						<div class="img rounded d-flex align-items-end" style="background-image: url(<?= $vhimg ?>);">
						</div>
						<div class="text">
							<h2 class="mb-0 d-flex"><a href="vehicle-single.php">
									<?= $modelname ?>
								</a> <span class="price cat ml-auto">
									<?= $address;?>
								</span></h2>
							<div class="d-flex mb-3">
								<span class="cat vehicle_id" hidden>
									<?= $vehicle_id; ?>
								</span>
								<span class="cat user_id" hidden>
									<?= $uid; ?>
								</span>
								<span class="cat owner_id" hidden>
									<?= $owner_id; ?>
								</span>
								<span class="cat vprice" hidden>
									<?= $price; ?>
								</span>
								<span class="cat">
									<?= $category ?>
								</span>
								<p class="price ml-auto">
								&#8377; <?= $price ?><span>/day</span>
								</p>
							</div>
							<?php if(!isset($_SESSION['uid'])){?>
							<p class="d-flex mb-0 d-block"><a href="login.php" class="btn btn-primary "
									style="width:100%">Login For Book</a></p>
							<?php } else {
								?>
							<p class="d-flex mb-0 d-block"><a href="#addEmployeeModal"
									onclick="sessionStorage.setItem('vid','<?= $vehicle_id; ?>');  sessionStorage.setItem('owner_id','<?= $owner_id; ?>');  sessionStorage.setItem('vprice','<?= $price; ?>');   go();"
									class="btn btn-primary py-2 mr-1 booknow" name="Next" data-toggle="modal">Book
									now</a> <a href="vehicle-single.php?vehicle_id=<?= $vehicle_id; ?>"
									class="btn btn-secondary py-2 ml-1">Details</a></p>

							<?php } ?>
						</div>
					</div>

				</div>
				<?php
						}
					}
					else{
						echo "
							<h3 class='heading mt-2'><a href='#'>No Any Records</a></h3>
		
							";
						}
					
								
				
					include 'booking.php';	

					?>




				<!-- <div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-11.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="vehicle-single.php">Range Rover</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
							<?php if(!isset($_SESSION['uemail'])){?>
								<p class="d-flex mb-0 d-block"><a href="login.php" class="btn btn-primary "  style="width:100%"  >Login For Book</a></p>
							<?php } else {
								?>
								<p class="d-flex mb-0 d-block"><a href="#addEmployeeModal" class="btn btn-primary py-2 mr-1" data-toggle="modal">Book now</a> <a href="vehicle-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
							<?php } ?>
							</div>
    				</div>
    			</div> -->

				<!-- booking start -->

			</div>

			<!-- about us -->
			<!-- <div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div> -->

</section>


<?php include 'includes/footer.php' ?>
