<?php
	$owners='active';
	include 'dashbord/owners/o_header.php';	
?>
<!------main-content-start----------->

<div class="adpenle">
	<div class="row js-evenly">
		<div class="box">
			<a href="O_tlt_booking.php" class="title">New Booking</a>
			<div class="row at-center">
				<i class="fa-solid fa-layer-group text-white"></i>
				<p class="items text-white"><?=$update;?></p>
			</div>
		</div>
		<div class="box">
			<a href="O_mng_vehicle.php" class="title">Total Vehicle</a>
			<div class="row at-center">
				<i class="fa-regular fa-user text-white"></i>
				<p class="items text-white"><?=$vehicles;?></p>
			</div>
			
		</div>
		
	</div>
</div>
<!------main-content-end----------->
<?php include 'dashbord/owners/o_footer.php' ?>