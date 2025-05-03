<?php
     $index='active';
     include 'includes/header.php';

	 if(isset($_POST['seeall'])){
		$search=$_POST['search'];		
	 }
	 
	$owners="select * from owners";
	$oqry=mysqli_query($conn,$owners);
	$towners=0;
	while($orow=mysqli_fetch_array($oqry)){
		$towners=$towners+1;
	}
	$tovehicle=0;
	$allvselect="Select * from vehicles where status='Approve' ";
					$allvqry=mysqli_query($conn,$allvselect);	
					if (mysqli_num_rows($allvqry) > 0){
						
						while ($allvrow=mysqli_fetch_array($allvqry)) 
						{
							$tovehicle=$tovehicle+1;
						}
					}
?>
<style>
	.hero-wrap .easy{
		text-shadow: 10px 10px 10px black, 10px 10px 20px black, 20px 5px 20px black !important;

	}
</style>
    <!--Welcome section  -->
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/2.jfif');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Vehicles</h1>
	            <p class="easy" style="font-size: 18px;">Welcome to Drive My Dreams, a revolutionary vehicle rental platform that connects renters with vehicle owners in a seamless and secure way.</p>
	            <a href="images/vehicle.mp4" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span class="easy">Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- form -->
 <style>
	.result-box{
		position: absolute;
		/* top:-10px; */
		width: 59%;
		left:30px;
		z-index: 4;
		
	}
	.result-box ul li{
		cursor: pointer;
	}
 </style>
     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
					<div class="col-md-4 d-flex align-items-center">
						<form action="vehicle.php?search=<?=$search;?>" class="request-form ftco-animate bg-primary" method="post">
						<div class="form-group mr-2" >
							<input type="input" id="input-box" name="search" class="form-control search mb-4" placeholder="Search Vehicle">
							<input type="submit" value="Go" name="go" class="btn btn-secondary py-2 px-4">
							<!-- <a href="vehicle.php" class="btn btn-secondary py-2 px-4">Go</a> -->
						</div>
						</form>
						
							<!-- <div class="result-box bg-white">
								
							</div>
							<script src="js/search.js"></script> -->

							</div>
						

							
	  				
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Vehicles</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Vehicle</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="vehicle.php" class="btn btn-primary py-3 px-4">Reserve Your Perfect vehicle</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>

<!-- offer items-->
    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Categories offer</span>
            <h2 class="mb-2">Types Of Vehicles</h2>
          </div>
        </div>
    		<div class="row">
				
						
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
					<?php
						$vselect="Select distinct(category) from vehicles";
						$vqry=mysqli_query($conn,$vselect);

						$vsi="Select * from vehicles";
						$vsq=mysqli_query($conn,$vsi);
						
						if($vqry && $vsq){
							// echo"<script>alert('HHHHHHHaaaaaa')</script>";
							while ($vrow=mysqli_fetch_array($vqry)) 
							{
						
								$category=$vrow['category'];
	
							?>
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<!-- <div class="img rounded d-flex align-items-end" style="background-image: url('images/car-3.jpg');">
		    					</div> -->
		    					<div class="d-flex text m-auto">
		    						<h2 class="m-auto"><a href="#"><?= $category;?></a></h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat">This All types of <?= $category;?> are provide Click hear</span>
			    					</div>
		    						<p class="d-flex mb-0 d-block"><a href="vehicle.php?search=<?= $category;?>" class="btn btn-primary py-2 m-auto">See All</a></p>
		    					</div>
		    				</div>
    					</div>
						<?php	
							}
						}
						else{
							echo"<script>alert('Not Found')</script>";

						}	
					?>    					
    				</div>
    			</div>
    		</div>
    	</div>
	</section>

	<?php
			$query = "SELECT * FROM `about` WHERE id=1";
			$result = mysqli_query($conn, $query);
			$aboutdata = mysqli_fetch_assoc($result);
			$title=$aboutdata['title'];
			$description=$aboutdata['description'];
			
			$aboutimage = !empty($aboutdata['image']) ? $aboutdata['image'] : 'images/about.jpg';
    ?>
       <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
				  <?php
                if(isset($title) && isset($description)){
                  echo "
                    <h2 class='mb-4'>$title</h2>
                    $description
                  ";
                }
                else{
              ?>

	            <h2 class="mb-4">Drive My Dreams</h2>

	            <p>Welcome to <b>Drive My Dreams</b>, a revolutionary vehicle rental platform that connects renters with vehicle owners in a seamless and secure way. Whether you need a car for a weekend getaway, a bike for daily commuting, or a luxury vehicle for a special occasion, our platform makes renting easy, affordable, and hassle-free. </p>
	            <p>At the same time, we empower vehicle owners by providing them with an opportunity to earn by listing their vehicles for rent. Instead of letting your car sit idle, you can put it to good use and generate passive income with full control over availability and pricing.</p>

              <?php
                }
              ?>
	            <p><a href="vehicle.php" class="btn btn-primary py-3 px-4 ">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>
<!-- services -->
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          			<div class="col-md-7 text-center heading-section ftco-animate">
          				<span class="subheading">Services</span>
           				<h2 class="mb-3">Our Latest Services</h2>
          			</div>
        		</div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span><i class="fa-solid fa-gear"></i></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Vehicle Rental Service</h3>
                <p>We provide a wide range of vehicles for rent, including cars, bikes, vans, and luxury vehicles. Whether for a days, or weeks, our platform lets you book the perfect vehicle that suits your needs.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span><i class="fa-solid fa-crown"></i></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Vehicle Listing for Owners</h3>
                <p>If you own a vehicle and want to earn additional income, you can list your vehicle on Drive My Dreams. Set your availability, price, and ensure your vehicle is well-maintained to attract renters.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span><i class="fa-solid fa-indian-rupee-sign"></i></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Secure Payment and Booking System</h3>
                <p>Our platform ensures that all payments are secure through encrypted gateways, and booking processes are smooth and transparent.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span><i class="fa-solid fa-car-burst"></i></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Insurance Coverage</h3>
                <p>For added peace of mind, we offer insurance coverage for rented vehicles to protect both renters and owners during the rental period.</p>
              </div>
            </div>            
					</div>
        
				
									</div>
			</div>
			<div class="srvices-btn row justify-content-center mt-5">
            	<a href="services.php" class="btn btn-primary btn-lg">More services</a>
			</div>
		</section>
<!-- vendor -->
		<section class="ftco-section ftco-intro" style="background-image: url(images/vendor1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">If you want to rent out your vehicle, you can earn money by posting your vehicle on our website. So Don't Be Late.</h2>
            <a href="login.php" class="btn btn-primary btn-lg">Become A Owners</a>
          </div>
				</div>
			</div>
		</section>


   

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
		<div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
		<div class="row d-flex">
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
    </section>	

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?= $towners;?>">0</strong>
                <span>Total <br>Owners</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?= $tovehicle;?>">0</strong>
                <span>Total <br>Vehicles</span>
              </div>
            </div>
          </div>
          
           
          </div>
        </div>
    	</div>
    </section>	



    <?php include 'includes/footer.php' ?>
