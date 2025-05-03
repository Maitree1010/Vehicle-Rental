<?php
	$A_detail_booking='active';
	include 'dashbord/admin/a_header.php';	
	
    if(isset($_GET['book_id'])){

        $bid=$_GET['book_id'];

                 $bselect="Select *,DATEDIFF(rtn_date, pic_date) AS days from bookings where id=$bid;";
                 $bqry=mysqli_query($conn,$bselect);					
                 $brow=mysqli_fetch_array($bqry); 
                 
                     // $bid=$brow['id'];
                     $vehicle_id=$brow['vehicle_id'];
                     $renter_id=$brow['renter_id'];
                     $owner_id=$brow['owner_id'];
                     $pic_loc=$brow['pic_location'];
                     $rtn_loc=$brow['rtn_location'];
                     $pic_date=$brow['pic_date'];
                     $rtn_date=$brow['rtn_date'];
                     $pic_tim=$brow['pic_tim'];
                     $rtn_tim=$brow['rtn_tim'];
                     $total_cost=$brow['total_cost'];
                     $drv_lic=$brow['drv_lic']; 
                     $adharcard=$brow['adharcard']; 
                     $days=$brow['days']; 
					$status=$brow['status'];

                        $vselect="select * from vehicles where vehicle_id=$vehicle_id";
                        $vqry=mysqli_query($conn,$vselect);
                        $vrow=mysqli_fetch_array($vqry);
                        $vhimg=$vrow['vhimg']; 
                        $price=$vrow['price']; 

						$total_cost=$days*$price;

                        $rselect="select * from renters where renter_id=$renter_id";
                        $rqry=mysqli_query($conn,$rselect);
                        $rrow=mysqli_fetch_array($rqry);
                        $rpropic=$rrow['propic']; 
                        $remail=$rrow['email']; 
                        $rphone=$rrow['phone']; 
                        $rname=$rrow['name']; 

                        $oselect="select * from owners where owner_id=$owner_id";
                        $oqry=mysqli_query($conn,$oselect);
                        $orow=mysqli_fetch_array($oqry);
                        $opropic=$orow['propic']; 
                        $oemail=$orow['email']; 
                        $ophone=$orow['phone']; 
                        $oname=$orow['name']; 

        }
		else{
			echo "<script>window.location='admin.php'</script>";
		}
                 
                     
?>
<style>
	th{
		border:3px solid black;
	}
</style>
<div class="main-content">
				<!-- Vehicle Information -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title">
								<div class="row">
									<div class="col-sm-12 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="" style="text-align:center;">Booking Details</h2>
									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">	
								<thead>
									<th colspan="2"><h6 class="" style="text-align:center; color:green; padding:20px"><b>Bookings Information</b></h6></th>
								</thead>

								<tbody>
									<tr>
										<th><b>Book Vehicle</b></th>
										<th><a href="<?= $vhimg;?>"><img src="<?= $vhimg; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Driving Certificate</b></th>
										<th><a href="<?= $drv_lic;?>"><img src="<?= $drv_lic; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Adharcard Certificate</b></th>
										<th><a href="<?= $adharcard;?>"><img src="<?= $adharcard; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>
									</tr>
									<tr>										
										<th><b>Vehicle Id</b></th>
										<th><?= $vehicle_id; ?></th>
									</tr>
									<tr>										
										<th><b>Picup Location</b></th>
										<th><?= $pic_loc; ?></th>
									</tr>
									<tr>										
										<th><b>Return Location</b></th>
										<th><?= $rtn_loc; ?></th>
									</tr>
									<tr>										
										<th><b>Picup Date/Time</b></th>
										<th><?= $pic_date; ?>⌚<?= $pic_tim; ?></th>
									</tr>
									<tr>										
										<th><b>Return Date/Time</b></th>
										<th><?= $rtn_date; ?>⌚<?= $rtn_tim; ?></th>
									</tr>
									<tr>										
										<th><b>Days</b></th>
										<th><?= $days;?></th>
									</tr>
									<tr>										
										<th><b>Total Cost</b></th>
										<th><?= $total_cost;?></th>
									</tr>
									<tr>										
										<th><b>Payment</b></th>
										<th><?= $payment;?></th>
									</tr>
									<tr>										
										<th><b>Status</b></th>
										<th><?= $status; ?></th>
									</tr>
									<tr>
										<th colspan="2">
											<center>
											</center>
										</th>
										
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Renter Information -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title">
								<div class="row">
									<div class="col-sm-12 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="" style="text-align:center;">Renter Details</h2>
									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">	
								<thead>
									<th colspan="2"><h6 class="" style="text-align:center; color:green; padding:20px"><b>Renter Information</b></h6></th>
								</thead>
								<form action="#" method="POST" class="bg-light p-5 contact-form">
								<tbody>
									<tr>
										<th><b>Renter Photo</b></th>
										<th><a href="<?= $rpropic;?>"><img src="<?= $rpropic; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>

									</tr>
									<tr>										
										<th><b>Name</b></th>
										<th><input type="text" value="<?= $rname;?>" class="form-control" placeholder="Your Name" name="name" readonly required></th>
									</tr>
									<tr>										
										<th><b>Phone No</b></th>
										<th><input type="text" value="<?= $rphone;?>" class="form-control" placeholder="Your Name" name="phone" readonly required></th>
									</tr>
									<tr>										
										<th><b>Email</b></th>
										<th><input type="text" name="g" class="form-control" value="<?= $remail; ?>" readonly placeholder="Your Email"></th>

									</tr>
									<tr>										
										<th><b>Subject</b></th>
										<th><input type="text" name="subject" class="form-control" required  placeholder="Subject"></th>
									</tr>
									<tr>										
										<th><b>Message</b></th>
										<th><textarea name="msg" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea></th>
									</tr>
									<tr>
									
										<th colspan="2">
											<center>
											<input type="submit" name="btn" value="Send Message" class="btn btn-primary py-3 px-3"></th>
									</tr>
								</form>
								<?php include 'includes/mail/index.php';?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
                <!-- Owner Information -->
                <div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class="table-title">
								<div class="row">
									<div class="col-sm-12 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="" style="text-align:center;">Vehicle Owner</h2>
									</div>
								</div>
							</div>

							<table class="table table-striped table-hover">	
								<thead>
									<th colspan="2"><h6 class="" style="text-align:center; color:green; padding:20px"><b>Owner Information</b></h6></th>
								</thead>
								<form action="#" method="POST" class="bg-light p-5 contact-form">
								<tbody>
									<tr>
										<th><b>Owner Photo</b></th>
										<th><a href="<?= $opropic;?>"><img src="<?= $opropic; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></a></th>

									</tr>
									<tr>										
										<th><b>Name</b></th>
										<th><input type="text" value="<?= $oname;?>" class="form-control" placeholder="Your Name" name="name" readonly required></th>
										
									</tr>
									<tr>										
										<th><b>Phone No</b></th>
										<th><input type="text" value="<?= $ophone;?>" class="form-control" placeholder="Your Name" name="name" readonly required></th>
										
									</tr>
									<tr>										
										<th><b>Email</b></th>
										<th><input type="text" name="g" class="form-control" value="<?= $oemail; ?>" readonly placeholder="Your Email"></th>
									</tr>
									<tr>										
										<th><b>Subject</b></th>
										<th><input type="text" name="subject" class="form-control" required  placeholder="Subject"></th>
									</tr>
									<tr>										
										<th><b>Message</b></th>
										<th><textarea name="msg" id="" cols="30" rows="5" class="form-control" placeholder="Message"></textarea></th>
										
									</tr>
									<tr>
									
										<th colspan="2">
											<center>
											<input type="submit" name="btn" value="Send Message" class="btn btn-primary py-3 px-3"></th>
									</tr>
								</form>
								<?php include 'includes/mail/index.php';?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
</div>
       

<?php include 'dashbord/admin/a_footer.php' ?>