<?php
    include 'includes/cn.php';
   $O_add_vehicle='active';
   include 'dashbord/owners/o_header.php';
   
   
        // Registation Form
        if(isset($_POST["Next"])){

            
            $category=$_POST['category'];
            $address=$_POST['address'];
            $vtype=$_POST['vtype'];
            $transmition=$_POST['transmition'];
            $modelyear=$_POST['modelyear'];
            $modelname=$_POST['modelname'];
            $price=$_POST['price'];
            $color=$_POST['color'];

            $vhname=$_FILES['vhimg']['name'];
            $vhtmp_name=$_FILES['vhimg']['tmp_name'];
            $vhfolder='images/vimg/'.$vhname;
            move_uploaded_file($vhtmp_name,$vhfolder);
            
            $regname=$_FILES['regcrt']['name'];
            $regtmp_name=$_FILES['regcrt']['tmp_name'];
            $regfolder='images/vimg/'.$regname;
            move_uploaded_file($regtmp_name,$regfolder);
            
            $insname=$_FILES['inscrt']['name'];
            $instmp_name=$_FILES['inscrt']['tmp_name'];
            $insfolder='images/vimg/'.$insname;
            move_uploaded_file($instmp_name,$insfolder);

                $insert="INSERT INTO `vehicles` (`owner_id`,`address`,`category`,`type`,`transmition`,`model`,`modelname`,`price`,`color`,`vhimg`,`regcrt`,`inscrt`) VALUES ('$oid','$address','$category','$vtype','$transmition','$modelyear','$modelname','$price','$color','$vhfolder','$regfolder','$insfolder');";
                $run = mysqli_query($conn, $insert);
                if ($run) {
                    echo "<script>alert('Your Vehicle Successfully Added');</script>";
              
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
                
      }
            

 ?>


<!------main-content-start----------->

<!-- add-vehicle -->
<center>
<h6 class="bg-warning text-dark "><b>Your Vehicle In This Must Be Available GPS Tracking For Security</b></h5>
   </center>
<div class="form-body container" tabindex="-1" id="addEmployeeModal" role="dialog">
   <div class="f-cnt">
      <header>Add Vehicle</header>
      <div class="progress-bars">
         <div class="step">
            <p>Post-Vehicle</p>
            <div class="bullet">
               <span>1</span>
            </div>
            <div class="check fas fa-check"></div>
         </div>
         <div class="step">
            <p>Submit</p>
            <div class="bullet">
               <span>2</span>
            </div>
            <div class="check fas fa-check"></div>
         </div>


      </div>
      <div class="form-outer">
         <?php include 'ownerpst.php'?>
      </div>
   </div>
</div>
<script src="form/script.js"></script>
</div>

<?php include 'dashbord/owners/o_footer.php' ?>