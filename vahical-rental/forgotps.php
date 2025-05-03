
<?php
    session_start();
    include 'includes/cn.php';
        // Registation Form
        if(isset($_POST["forgot"])){
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $role=$_POST['role'];

            
                if($role=="Owner"){
                    $select_query="select * from owners where `email`='$email' AND `phone`='$phone';";
                    $run = mysqli_query($conn, $select_query);
                    $data=mysqli_num_rows($run);

                    if($data >= 1)
                    {
                        $data = mysqli_fetch_array($run);
                                $oemail = $data['email'];
                                $_SESSION['role']=$role;
                                $_SESSION['email'] = $oemail;
                                $otp = rand(10000, 99999);   //Generate OTP
                                include_once("SMTP/class.phpmailer.php");
                                include_once("SMTP/class.smtp.php");
                                $message = '<div>
                                <p><b>Hello!</b></p>
                                <p>You are recieving this email because your Password is forgot so, recieved a OTP request for your account.</p>
                                <br>
                                <p>Your OTP is: <b>'.$otp.'</b></p>
                                <br>
                                <p>If you did not request OTP, no further action is required.</p>
                                </div>';
                            $email = $email; 
                            $mail = new PHPMailer;
                            $mail->IsSMTP();
                            $mail->SMTPAuth = true;                 
                            $mail->SMTPSecure = "tls";      
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587; 
                            $mail->Username = "drivemydream1023@gmail.com"; // Enter your username
                            $mail->Password = "piro suaj nztx vwzy"; // Enter Password
                            $mail->FromName = "Drive My Dreams";
                            $mail->AddAddress($email);
                            $mail->Subject = "OTP";
                            $mail->isHTML( TRUE );
                            $mail->Body =$message;
                                if($mail->send())
                                {
                                    $insert_query = mysqli_query($conn,"update owners set otp='$otp', is_expired='0' where `email`='$email' AND `phone`='$phone'; ");
                                    header('location:otp_verify.php');
                                }
                                else
                                {
                                    $msg = "Email not delivered";
                                }
                    }
                    else
                    {
                        $msg = "Invalid Email";
                    }
                }
                if($role=="Admin"){
                    $select_query="select * from admin where `email`='$email' AND `phone`='$phone';";
                    $run = mysqli_query($conn, $select_query);
                    $data=mysqli_num_rows($run);

                    if($data >= 1)
                    {
                        $data = mysqli_fetch_array($run);
                                $oemail = $data['email'];
                                $_SESSION['role']=$role;
                                $_SESSION['email'] = $oemail;
                                $otp = rand(10000, 99999);   //Generate OTP
                                include_once("SMTP/class.phpmailer.php");
                                include_once("SMTP/class.smtp.php");
                                $message = '<div>
                                <p><b>Hello!</b></p>
                                <p>You are recieving this email because your Password is forgot so, recieved a OTP request for your account.</p>
                                <br>
                                <p>Your OTP is: <b>'.$otp.'</b></p>
                                <br>
                                <p>If you did not request OTP, no further action is required.</p>
                                </div>';
                            $email = $email; 
                            $mail = new PHPMailer;
                            $mail->IsSMTP();
                            $mail->SMTPAuth = true;                 
                            $mail->SMTPSecure = "tls";      
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587; 
                            $mail->Username = "drivemydream1023@gmail.com"; // Enter your username
                            $mail->Password = "piro suaj nztx vwzy"; // Enter Password
                            $mail->FromName = "Drive My Dreams";
                            $mail->AddAddress($email);
                            $mail->Subject = "OTP";
                            $mail->isHTML( TRUE );
                            $mail->Body =$message;
                                if($mail->send())
                                {
                                    $insert_query = mysqli_query($conn,"update owners set otp='$otp', is_expired='0' where `email`='$email' AND `phone`='$phone'; ");
                                    header('location:otp_verify.php');
                                }
                                else
                                {
                                    $msg = "Email not delivered";
                                }
                    }
                    else
                    {
                        $msg = "Invalid Email";
                    }
                }
                if($role=="User"){
                    $select_query="select * from renters where `email`='$email' AND `phone`='$phone';";
                    $run = mysqli_query($conn, $select_query);
                    $data=mysqli_num_rows($run);

                    if($data >= 1)
                    {
                        $data = mysqli_fetch_array($run);
                                $oemail = $data['email'];
                                $_SESSION['role']=$role;
                                $_SESSION['email'] = $oemail;
                                $otp = rand(10000, 99999);   //Generate OTP
                                include_once("SMTP/class.phpmailer.php");
                                include_once("SMTP/class.smtp.php");
                                $message = '<div>
                                <p><b>Hello!</b></p>
                                <p>You are recieving this email because your Password is forgot so, recieved a OTP request for your account.</p>
                                <br>
                                <p>Your OTP is: <b>'.$otp.'</b></p>
                                <br>
                                <p>If you did not request OTP, no further action is required.</p>
                                </div>';
                            $email = $email; 
                            $mail = new PHPMailer;
                            $mail->IsSMTP();
                            $mail->SMTPAuth = true;                 
                            $mail->SMTPSecure = "tls";      
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 587; 
                            $mail->Username = "drivemydream1023@gmail.com"; // Enter your username
                            $mail->Password = "piro suaj nztx vwzy"; // Enter Password
                            $mail->FromName = "Drive My Dreams";
                            $mail->AddAddress($email);
                            $mail->Subject = "OTP";
                            $mail->isHTML( TRUE );
                            $mail->Body =$message;
                                if($mail->send())
                                {
                                    $insert_query = mysqli_query($conn,"update renters set otp='$otp', is_expired='0' where `email`='$email' AND `phone`='$phone'; ");
                                    header('location:otp_verify.php');
                                }
                                else
                                {
                                    $msg = "Email not delivered";
                                }
                    }
                    else
                    {
                        $msg = "Invalid Email";
                    }
                }
        }
        
                                            


        //         if($role=="Admin"){
        //             $update="select * from admin where `email`='$email' AND `phone`='$phone';";
        //             $run = mysqli_query($conn, $update);
        //             $data=mysqli_num_rows($run);

        //             if($data >= 1)
        //             {
        //                 echo "<script>alert('👍 Successfully Update Your Password So Login Now');</script>";
        //                 header('location:login.php');
        //             }
        //             else{
        //                  echo "<script>alert('Email or Phone is not Exist');</script>";
        //             }
        //         }

        //         if($role=='User'){
                
        //             $update="select * from renters where `email`='$email' AND `phone`='$phone';";
        //             $run = mysqli_query($conn, $update);
        //             $data=mysqli_num_rows($run);

        //             if($data >= 1)
        //             {
        //                 echo "<script>alert('Successfully Update Your Password So Login Now');</script>";
        //                 header('location:login.php');
        //             }
        //             else{
        //                  echo "<script>alert('Email or Phone is not Exist');</script>";
        //             }         
        //         }      
        //     }

            
            
        // }

        
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
                <h1 class="mb-2">Forgot Password</h1>
                <div class="input-box">
                    <input type="text" placeholder="Email ID" name="email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Phone" name="phone" required>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box">
                    <select class="form-control" name="role" required>
                        <option hidden value="">Select Role</option>
                        <option value="User">User</option>
                        <option value="Owner">Owner</option>
                        <option value="Admin">Admin</option>
                        <i class="fa-solid fa-caret-down"></i>
                    </select>
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