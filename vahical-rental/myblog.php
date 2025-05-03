<?php
// error_reporting(0);
session_start();
include 'includes/cn.php';

$uid=$_SESSION['uid'];
$uselect="Select * from renters where renter_id='$uid' ";
$uqry=mysqli_query($conn,$uselect);
$urow=mysqli_fetch_array($uqry);
$uemail=$urow['email'];
$upass=$urow['password'];

$phone=$urow['phone']; 
$name=$urow['name']; 

                                    $bselect="Select * from bookings where id=$uid;";
									$bqry=mysqli_query($conn,$bselect);					
									$brow=mysqli_fetch_array($bqry); 
									
										// $bid=$brow['id'];
										// $vehicle_id=$brow['vehicle_id'];
										// $renter_id=$brow['renter_id'];
										// $pic_loc=$brow['pic_location'];
										// $rtn_loc=$brow['rtn_location'];
										// $pic_date=$brow['pic_date'];
										// $rtn_date=$brow['rtn_date'];
										// $pic_tim=$brow['pic_tim'];
										// $rtn_tim=$brow['rtn_tim'];
										// $total_cost=$brow['total_cost'];
										// $drv_lic=$brow['drv_lic']; 
										// $adharcard=$brow['adharcard']; 
                              			// $status=$brow['status'];

                               			// $vselect="select * from vehicles where vehicle_id=$vehicle_id";
									    // $vqry=mysqli_query($conn,$vselect);
									    // $vrow=mysqli_fetch_array($vqry);
                               			// $vhimg=$vrow['vhimg']; 

                    if(isset($_POST['blog'])){
                        $name=$_POST['name'];
                        $title=$_POST['title'];
                       
                        $desc=$_POST['desc'];
						$date=DATE('d-M-Y');

						$image=$_FILES['image']['name'];
						$btmp_name=$_FILES['image']['tmp_name'];
						$bfolder='images/vimg/'.$image;
						move_uploaded_file($btmp_name,$bfolder);

                        $edit="INSERT INTO blog (user_id,date,image,title,description) values ('$uid','$date','$bfolder','$title','$desc')";
                        $qry=mysqli_query($conn,$edit);
                        if($qry)
                        {
                                echo'<script>alert("SucceessFully Posted Your Blog 😎")</script> ';
                        }
                        else
                        {
                                echo'<script>alert("Not Posted")</script> ';
                        }
                    }           			

                    if(isset($_GET['blog_id'])){
                       
                        $blog_id=$_GET['blog_id'];
                        $delete="DELETE from blog where id='$blog_id' ";
                        $qry=mysqli_query($conn,$delete);
                       
                        if($qry){
                            echo "<script>alert('Blog is SuccessFully Deleted')</script>";
                        }
                        else{
                            echo "<script>alert('Something Wrong')</script>";
                        }
                    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dashbord/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet"><link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <!-- <link rel="stylesheet" href="css/flaticon.css"> -->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- <link rel="stylesheet" href="scss/style.css"> -->
    <link rel="stylesheet" href="css/form/style.css">
    <link rel="stylesheet" href="fonts/meterial.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    
    <style>
        /* General Reset */
.form-container {
    max-width: 1000px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 1px 1px 30px 0.5px  rgb(198, 196, 196);
    width: 80%;
    font-family:'Poppins';
}
input[type="file"]{
/* display:none; */
margin-left:33px;
}
th,td{
	padding: 5px !important;
}
table,td,th{
	border:none !important;
	vertical-align:none !important;
}
label{
	position: relative;
	left:-405px;
	bottom:-4px;
	
}


        </style>
</head>

<body style="background-color:#fff;">
    <div class="form-container">

        <h2>Post a Blog</h2>
     
    
        <div class="row">
					<div class="col-md-12">
						<div class="table-wrapper bg-light">

							

							<table class="table table-hover">	
								

								<tbody>
                                    <form method="POST" runat="server" enctype="multipart/form-data">
									
									<tr>										
										<th><b>Name</b></th>
										<th><input type="text" name="name" class="form-control" value="<?= $name;?>" required placeholder="Your Email"></th>
									</tr>
									<tr>										
										<th><b>Image</b></th>
										<td><input type="file" class="btn btn-light" id="file" name="image" class="form-control" required >
											<label for="file" class="btn btn-dark text-bold p-2"><i class="fa-solid fa-camera mr-2"></i>Upload Image</label>
									</td>
									</tr>
									<tr>										
										<th><b>Title</b></th>
										<th><input type="text" name="title" class="form-control" required placeholder="Blog Title"></th>
									</tr>
									<tr>										
										<th><b>Description</b></th>
										<th><textarea name="desc" cols="30" rows="7" class="form-control" placeholder="Description"></textarea>
										</th>
									</tr>
									<tr>
									<th colspan="2">
											<center>
											<input type="submit" name="blog" value="Post Blog😎" class="btn btn-primary py-3 px-3" ></th>
									</tr>
                                </form>
								</tbody>
							</table>
						</div>
					</div>
				</div>
					
				</div>
				<section class="ftco-section">
      <div class="container">
        <div class="row d-flex justify-content-center">
		<table class="table table-striped table-hover">
								<thead>
									<tr>
										<!-- <th><span class="custom-checkbox"> -->
												<!-- <input type="checkbox" id="selectAll">
												<label for="selectAll"></label></th> -->
										<th><b>Photo</b></th>
										<th><b>Date</b></th>
										<th><b>title</b></th>
										<th><b>Comment</b></th>
										<th><b>Description</b></th>
										<th><b>Action</b></th>
									</tr>
								</thead>

								<tbody>
									<tr>
          <?php 

                $sblog="Select * from blog where user_id=$uid";
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
		  
		  								<td><img src="<?= $image; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></td>
										<td><?= $date; ?></td>
										<td><?= $title; ?></td>
										<td><?= $comment; ?></td>
										<td><?= $description; ?></td>
										<td><a href="myblog.php?blog_id=<?= $bid;?>" onclick="return confirm('Are you sure you wnat to delete This Blog?')" class="delete">
												<i class="material-icons text-danger" data-toggle="tooltip"
													title="Delete">&#xE872;</i>
											</a>
                                        </td>
				</tr>

          

          <?php
          
            }
          }
          else{
            echo "
                <h3 class='heading mt-2'><a href='#'>No Any Records</a></h3>

            ";
          }
          ?>
                 
          
    </section>
</body>

</html>
