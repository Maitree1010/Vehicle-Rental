<?php 
    $car='active';  
	include 'includes/header.php';
	
	if(isset($_GET['vehicle_id'])){
		// echo "<script>alert('Maitree')</script>";
		$vid=$_GET['vehicle_id'];
		$select="select * from vehicles where vehicle_id=$vid";
		$run=mysqli_query($conn,$select);
		$data=mysqli_fetch_array($run);
		$address=$data['address'];
		$category=$data['category'];
		$type=$data['type']; 
		$transmition=$data['transmition'];
		$model=$data['model'];
		$modelname=$data['modelname'];
		$price=$data['price'];
		$color=$data['color'];
		$vhimg=$data['vhimg'];
		
	}
?>



    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Vehicle details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Vehicles Details</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url(<?= $vhimg; ?>);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?= $category; ?></span>
      					<h2><?= $modelname; ?></h2>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center" style="background-color:<?= $color ;?>"><span>🎨</span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Color
		                	<span><?= $color;?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span><?= $transmition;?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span>&#8377;</span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Price(Day)
		                	<span>&#8377;<?= $price;?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span>🔧</span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Modal Year
		                	<span><?=$model;?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel
		                	<span><?= $type ;?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Address</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Blog</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row" style="justify-content: center !important;">
						      		<p style="width:70%; text-align:center; ">Allow Customers to munually input a pickup or drop-of address for booking a vehicle, or select it from a list of location at address from <b><?= $address;?></b></p>
								
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
							<div class="row" style="justify-content: center !important;">
								
								<p style="width:70%; text-align:center; "><b>GPS</b> Traking By Owners 🤴<p>
								<p style="width:70%; text-align:center; ">The vehicle can be drive by people who are up 18 license and no one can mess with <b>GPS</b><p>
						    </div>
							</div>

						     <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<!-- <div class="col-md-7">
							   			<h3 class="head">23 Reviews</h3>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
							   		</div> -->
									   <?php
				
				$sblog="SELECT * FROM blog Limit 3 ";
				$bqry=mysqli_query($conn,$sblog);
				if(mysqli_num_rows($bqry)>0){
					while($brow=mysqli_fetch_array($bqry))
					{
					$bid=$brow['id'];
                    $user_id=$brow['user_id'];
                    $date=$brow['date'];
                    $image=$brow['image'];
                    $title=$brow['title'];
                    $description=$brow['description'];
					
						$comment=0;
						$scomment="SELECT * FROM comment where blog_id=$bid ";
						$cqry=mysqli_query($conn,$scomment);
						if(mysqli_num_rows($cqry)>0){
							while($crow=mysqli_fetch_array($cqry))
							{
								$comment=$comment+1;
							}
						}

					?>
				
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="blog-single.php" class="block-20" style="background-image: url('<?= $image;?>');">
							</a>
							<div class="text pt-4">
								<div class="meta mb-3">
									<div><a href="#"><?= $date;?></a></div>
									<!-- <div><a href="#">Admin</a></div> -->
									<div><a href="#" class="meta-chat"><span class="icon-chat"></span><?=$comment;?></a></div>
								</div>
								<h3 class="heading mt-2"><a href="#"><?= $description;?></a></h3>
								<p><a  href="blog-single.php?blogid=<?=$bid;?>" class="btn btn-primary">Read more</a></p>
							</div>
						</div>
					</div>
				

				<?php	
				}
			}
			else
			{
				echo "
					<h3 class='heading mt-2'><a href='#'>No Any Records</a></h3>
				";
			}

			?>	
			    
           
							   	</div>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Choose Vehicles</span>
            <h2 class="mb-2">Related Vehicles</h2>
          </div>
        </div>
        <div class="row">
		<?php

$allvselect="Select * from vehicles where status='Approve'  Limit 3 ";
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

        	
    		
    			<a href="vehicle.php" class="btn btn-dark">See ALL</a>

			
    			
        </div>
    	</div>
    </section>
    

	<?php include 'includes/footer.php' ?>
