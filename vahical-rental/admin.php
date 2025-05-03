<?php
	$admin='active';
	include 'dashbord/admin/a_header.php';	
?>
<!------main-content-start----------->

<div class="adpenle">
	<div class="row flex-wrap js-evenly">
		<div class="box">
			<a href="A_total_vehicle.php" class="title">New vehicle</a>
			<div class="row at-center">
				<i class="fa-solid fa-layer-group text-white mb-3"></i>
				<p class="items mb-3"><?=$update;?></p>
			</div>
		</div>
		<div class="box">
			<a href="A_tlt_booking.php" class="title">New Booking</a>
			<div class="row at-center">
				<i class="fa-solid fa-bag-shopping text-white mb-3"></i>
				<p class="items mb-3"><?=$booking;?></p>
			</div>
		</div>
		<div class="box">
			<a href="" class="title">Total Users</a>
			<div class="row at-center">
				<i class="fa-regular fa-user text-white mb-3"></i>
				<p class="items mb-3"><?=$trenters;?></p>
			</div>
		</div>
		<div class="box">
			<a href="#" class="title">Total Owners</a>
			<div class="row at-center">
				<i class="fa-regular fa-user text-white mb-3"></i>
				<p class="items mb-3"><?=$towners;?></p>
			</div>
		</div>
	</div>
</div>

<!------main-content-end----------->

<?php include 'dashbord/admin/a_footer.php' ?>