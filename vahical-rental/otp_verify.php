
<?php
    session_start();
    $email=$_SESSION['email'];
    $role=$_SESSION['role'];
   
    if($email=="" || $role==""){
        header('location:login.php');
    }
    include 'includes/cn.php';
        // Registation Form
        if(isset($_POST["forgot"])){
           

            $otp=$_POST['otp'];
            $_SESSION['otp']=$otp;
            
                if($role=="Owner"){
                    $otpselect="SELECT * FROM owners where `email`='$email' AND `otp`='$otp' AND `is_expired`='0' ";
                    $orun = mysqli_query($conn, $otpselect);
                    $odata=mysqli_num_rows($orun);
                   
                        
                    

                    if($odata >= 1)
                    {
                        $is_expireup="UPDATE owners set `is_expired`='1' where `email`='$email' AND `otp`='$otp';";
                        $irun = mysqli_query($conn, $is_expireup);
                       

                        header('location:recoverps.php');
                    }
                    else{
                         echo "<script>alert('Invalid OTP');</script>";
                    }
                }

                if($role=="Admin"){
                    $otpselect="SELECT * FROM `admin` where `email`='$email' AND `otp`='$otp' AND `is_expired`='0' ";
                    $orun = mysqli_query($conn, $otpselect);
                    $odata=mysqli_num_rows($orun);
                   
                        
                    

                    if($odata >= 1)
                    {
                        $is_expireup="UPDATE `admin` set `is_expired`='1' where `email`='$email' AND `otp`='$otp';";
                        $irun = mysqli_query($conn, $is_expireup);
                       

                        header('location:recoverps.php');
                    }
                    else{
                         echo "<script>alert('Invalid OTP');</script>";
                    }
                }

                if($role=="User"){
                    $otpselect="SELECT * FROM renters where `email`='$email' AND `otp`='$otp' AND `is_expired`='0' ";
                    $orun = mysqli_query($conn, $otpselect);
                    $odata=mysqli_num_rows($orun);
                   
                        
                    

                    if($odata >= 1)
                    {
                        $is_expireup="UPDATE renters set `is_expired`='1' where `email`='$email' AND `otp`='$otp';";
                        $irun = mysqli_query($conn, $is_expireup);
                       

                        header('location:recoverps.php');
                    }
                    else{
                         echo "<script>alert('Invalid OTP');</script>";
                    }
                }


                // if($role=="Admin"){
                //     $update="update admin set `password`='$password' where `email`='$email' AND `phone`='$phone';";
                //     $run = mysqli_query($conn, $update);
                //     $data=mysqli_num_rows($run);

                //     if($data >= 1)
                //     {
                //         echo "<script>alert('👍 Successfully Update Your Password So Login Now');</script>";
                //         header('location:login.php');
                //     }
                //     else{
                //          echo "<script>alert('Email or Phone is not Exist');</script>";
                //     }
                // }

                // if($role=='User'){
                
                //     $update="update renters set `password` ='$password' where `email`='$email' AND `phone`='$phone';";
                //     $run = mysqli_query($conn, $update);
                //     $data=mysqli_num_rows($run);

                //     if($data >= 1)
                //     {
                //         echo "<script>alert('Successfully Update Your Password So Login Now');</script>";
                //         header('location:login.php');
                //     }
                //     else{
                //          echo "<script>alert('Email or Phone is not Exist');</script>";
                //     }         
                // }      
            

            
            
        }

        
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive My Dreams</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
    <link href="login/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .container{
                width:40%;
            
            }
            .form-box{
                width: 100%;
            }
        </style>
</head>


<body>

    <div class="container">
        
        <div class="form-box login">
            <form action="" method="post">
                <h1 class="mb-4">Forgot Password Validation</h1>
                <label>Enter Valid OTP *</label>
                <div class="input-box mb-4">
                    
                    <input type="number"  data-parsley-type="otp" data-parsley-trigg
                    er="keyup" class="form-control" class="m-3" placeholder="OTP" name="otp" required>
                    <i class="fa-solid fa-recycle"></i>
                </div>
                <div class="forgot-link">
                    <a href="index.php"><i class="fa-solid fa-house  m-1"></i>Back To Home Page</a>
                </div>
                <input type="submit" class="btn" value="Submit" name="forgot"/>
            </form>

        </div>
            </form>

        </div>        
    </div>
    
</body>

</html>