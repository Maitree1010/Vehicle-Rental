    
    <?php 
      $blog='active';
      include 'includes/header.php' ;

      if(!isset($_GET['blogid'])){
        echo "<script>alert('No Blogs');
        window.location='blog.php';
        </script>";
      }

      
      $bid=$_GET['blogid'];

      $sblog="Select * from blog where id=$bid";
      $bqry=mysqli_query($conn,$sblog);


      if(isset($_POST['comment'])){

            if($uid==''){
              echo "<script>alert('First Login Now');
              window.location='login.php';
              </script>";
            }
            else{
            $name=$_POST['name'];
            $msg=$_POST['msg'];
            $date=DATE('d-M-Y');


            $comment="INSERT INTO `comment` (user_id,blog_id,date,name,image,description) values('$uid','$bid','$date','$name','$profilePicture','$msg')";
            $cqry=mysqli_query($conn,$comment);
            if($cqry)
            {
              echo "<script>alert('Your Comment Posted');
              </script>";
            }
            else
            {
              echo "<script>alert('Nott Posted');
              </script>";
            }
          }
          


      }
    ?>
  
	 
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.php">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Read our blog</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        <?php 
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
          <div class="col-md-2"></div>
          <div class="col-md-8 js-center ftco-animate">
            <p>
              <img src="<?= $image;?>" alt="" style="width:90%" class=" img-fluid">
            </p>
            <div class="text px-md-5 pt-4">
              <center>
              	<div class="meta mb-3">
                  <div><a href="#"><span class="icon-calendar mr-2"></span><?= $date;?></a>
                  <a href="#" class="meta-chat"><span class="icon-chat"></span> <?=$comment;?></a></div>
                </div>
                <h3 class="heading mt-2"><a href="#"><?= $title;?></a></h3>
                <p><?= $description;?></p>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>

        <?php
          
        }
      }
      else{
        echo "
            <h3 class='heading mt-2'><a href='#'>No Any Records</a></h3>

        ";
      }?>
            <!-- <p>
              <img src="images/image_8.jpg" alt="" class="img-fluid">
            </p>
          
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3>George Washington</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div> -->

            <?php
            $com=0;
            $scomment="SELECT * FROM comment where blog_id=$bid";
            $cqry=mysqli_query($conn,$scomment);
            while($crow=mysqli_fetch_array($cqry)){
              $com=$com+1;
            }

            ?>
            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?=$com; ?> Comments</h3>
              <ul class="comment-list">
            <?php
           
           $scomment="SELECT * FROM comment where blog_id=$bid";
           $cqry=mysqli_query($conn,$scomment);
                  if (mysqli_num_rows($cqry) > 0){
                    while($crow=mysqli_fetch_array($cqry)){
                      $name=$crow['name'];
                      $image=$crow['image'];
                      $date=$crow['date'];
                      $description=$crow['description'];

                      
                     


                  ?>
             
                
                 
                  <li class="comment">
                  <div class="vcard bio">
                  <img src="<?=$image;?>" style="height:50px; width:50px; object-fit:cover;" alt="Image placeholder">

                  </div>
                  <div class="comment-body">
                    <h3><?= $name;?></h3>
                    <div class="meta"><?= $date;?></div>
                    <p><?= $description;?></p>
                  </div>
                </li>


                
      <?php            
                }
      }
      else{
        echo "
            <h3 class='heading mt-2'><a href='#'>No Any Comments</a></h3>

        ";
      }?>
             
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5" style="width:70%;"> 
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  
                  <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea name="msg" id="message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="comment" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> 
          <!-- <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div> -->
            <!-- <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Ferrari <span>(12)</span></a></li>
                <li><a href="#">Cheverolet <span>(22)</span></a></li>
                <li><a href="#">Ford <span>(37)</span></a></li>
                <li><a href="#">Subaru <span>(42)</span></a></li>
                <li><a href="#">Toyota <span>(14)</span></a></li>
                <li><a href="#">Mistsubishi <span>(140)</span></a></li>
              </div>
            </div> -->

            <!-- <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/me2.jfif);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>Oct. 29, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>Oct. 29, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>Oct. 29, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
            </div> -->

            <!-- <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div> -->

        </div>
      </div>
    </section> <!-- .section -->

    <?php include 'includes/footer.php' ?>
