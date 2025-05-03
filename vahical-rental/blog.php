  <?php 
      $blog='active';
      include 'includes/header.php' ;

     
      
  ?>
  
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Our Blog</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <?php 

                $sblog="Select * from blog";
                $bqry=mysqli_query($conn,$sblog);
                if (mysqli_num_rows($bqry) > 0){
                  while($brow=mysqli_fetch_array($bqry)){
                    $bid=$brow['id'];
                    $user_id=$brow['user_id'];
                    $date=$brow['date'];
                    $image=$brow['image'];
                    $title=$brow['title'];
                    $description=$brow['description'];

                    $comment=0;
                    $scomment="SELECT * FROM comment where blog_id=$bid";
                    $cqry=mysqli_query($conn,$scomment);
                    if(mysqli_num_rows($cqry)>0){
                      while($crow=mysqli_fetch_array($cqry))
                      {
                        $comment=$comment+1;
                      }
                    }

          ?>


          <div class="col-md-12 text-center d-flex ftco-animate">
          	<div class="blog-entry justify-content-end mb-md-5">
              <a href="blog-single.php?blogid=<?=$bid;?>" class="block-20 img" style="background-image: url('<?=$image;?>');">
              </a>
              <div class="text px-md-5 pt-4">
              	<div class="meta mb-3">
                  <div><a href="#"><span class="icon-calendar"></span> <?= $date;?></a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span><?= $comment;?></a></div>
                </div>
                <h3 class="heading mt-2"><a href="#"><?= $title;?></a></h3>
                <p><?= $description;?></p>
                <p><a href="blog-single.php?blogid=<?=$bid;?>" class="btn btn-primary">Continue <span class="icon-long-arrow-right"></span></a></p>
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
          ?>
                 
                  
        </div>
        
      </div>
    </section>

    <?php include 'includes/footer.php' ?>
