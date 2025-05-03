    
  <?php 
      $about='active';
      include 'includes/header.php';
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
	  
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/my.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">About Us</h1>
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
	            <p><a href="vehicle.php" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

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


    
    <section class="ftco-counter ftco-section img" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?=$towners;?>">0</strong>
                <span>Total <br>Owners</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="<?=$tovehicle;?>">0</strong>
                <span>Total <br>Vehicles</span>
              </div>
            </div>
          </div>
        
        </div>
    	</div>
    </section>	

    <?php include 'includes/footer.php' ?>