<?php
session_start();
    include 'includes/cn.php';
        // Registation Form
        if(isset($_POST["register"])){
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $usname=$_POST['usname'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            $role=$_POST['role'];

         

            if($password != $cpassword){
                echo "<script>alert('Password Or Confirm Password Must Be Same');</script>";
            }
            elseif(!preg_match("/^[a-zA-Z]*$/",$usname)){
                echo "<script>alert('User Name Contain Only Alphabet');</script>";
            }
            elseif(!preg_match("/^\d{10}$/",$phone)){
                echo "<script>alert('Invalid Phone Number ✖');</script>";
            }
            else{
                    if($role=="Owner"){

                            $select="select * from owners where `email`='$email' AND `phone`='$phone';";
                            $chk = mysqli_query($conn, $select);
                            $data=mysqli_num_rows($chk);
                            if($data >= 1)
                            {
                                echo "<script>alert('Email Is Allready Exist 👀');</script>";
                            }
                            else{                
                                $insert="INSERT INTO `owners` (`name`, `phone`,`email`, `password`) VALUES ( '$usname','$phone', '$email', '$password');";
                                $run = mysqli_query($conn, $insert);

                                echo "<script>alert('Successfully Submitted Owner Data ✔');</script>";
                                echo "<script>window.open('index.php', 'second');</script>";
                            }                      
                    }
                    else{

                        $select="select * from renters where `email`='$email' AND `phone`='$phone';";
                        $chk = mysqli_query($conn, $select);
                        $data=mysqli_num_rows($chk);
                        if($data >= 1)
                        {
                            echo "<script>alert('Email Is Allready Exist 👀');</script>";
                        }
                        else{                
                            $insert="INSERT INTO `renters` (`name`, `phone`,`email`, `password`) VALUES ( '$usname','$phone', '$email', '$password');";
                            $run = mysqli_query($conn, $insert);
                            
                            echo "<script>alert('Successfully Submitted User Data ✔');</script>";
                            echo "<script>window.open('index.php', 'second');</script>";
                        }                
                    }
            }
    
            }
            
            
        // Login Form

        if(isset($_POST['login'])){

            $email=$_POST['email'];
            $password=$_POST['password'];
            $role=$_POST['role'];

            if($role=="Owner"){
                    $select="Select * from owners where email='$email' && password='$password' ";
                    $qry=mysqli_query($conn,$select);
                    $data=mysqli_num_rows($qry);
                    $fetch=mysqli_fetch_array($qry);

                    if($data >= 1)
                    {
                       
                        $_SESSION['oid']=$fetch['owner_id'];    
                        header('location:owners.php');
                    }
                    else
                    {
                        echo'<script>alert("Email or Password is incorrect")</script> ';
                    }
            }
            if($role=="Admin"){
                $select="Select * from admin where email='$email' && password='$password' ";
                $qry=mysqli_query($conn,$select);
                $data=mysqli_num_rows($qry);
                $fetch=mysqli_fetch_array($qry);

                if($data >= 1)
                {
                                        
                    $_SESSION['aid']=$fetch['admin_id'];    
                    header('location:admin.php');
                }
                else
                {
                    echo'<script>alert("Email or Password is incorrect")</script> ';
                }
            }
            if($role=="User"){
                
                $select="Select * from renters where email='$email' && password='$password' ";
                $qry=mysqli_query($conn,$select);
                $data=mysqli_num_rows($qry);
                $fetch=mysqli_fetch_array($qry);

                if($data >= 1)
                {
                   
                    $_SESSION['uid']=$fetch['renter_id'];    
                    header('location:profile.php');
                }
                else
                {
                    echo'<script>alert("Email or Password is incorrect")</script> ';
                }              
            }
        }
    ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive My Dreams</title>
    <link rel="icon" type="images/x-icon" href="images/3.png">

    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
    <link href="login/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>

    <div class="container">
        <div class="form-box login">
            <form action="" method="post">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Email ID" name="email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-box">
                    <select class="form-control" name="role" required>
                        <option hidden value="">Select Role</option>
                        <option value="User">User</option>
                        <option value="Owner">Owner</option>
                        <option value="Admin">Admin</option>
                    </select>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="forgot-link">
                    <a href="forgotps.php">Forgot password?🙄</a>
                </div>
                <input type="submit" class="btn" value="Login" name="login"/>
                <!--<p>or Login with Social Platforms</p>
                    <div class="social-icons">
                    <a href="#"><i class="bx bxl-google"></i></a>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-github"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                </div> -->
            </form>

        </div>

        <div class="form-box register">
            <form action="" method="post">
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="usname" value="<?=$usname?>"  required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Phone" id="phone" name="phone" value="<?= $phone?>" required>
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" name="email" value="<?=$email?>"  required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" value="<?=$password?>"  required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confirm Password" name="cpassword" required>
                    <i class="fa-solid fa-check-double"></i>
                </div>
                <div class="input-box">
                    <select class="form-control" name="role" required>
                        <option hidden value="">Select Role</option>
                        <option value="User">User</option>
                        <option value="Owner">Owner</option>
                    </select>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <input type="submit" class="btn" value="Register" name="register"/>
                <!-- <p>or Register with Social Platforms</p>
                <div class="social-icons">
                    <a href="#"><i class="bx bxl-google"></i></a>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-github"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                </div> -->
            </form>

        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an Account?</p>
                <button class="btn register-btn">Register</button><br><br><br><br>
                <a href="index.php" class="backhome"><i class="fa-solid fa-house  mr-1"></i>Back To Home Page</a>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an Account?</p>
                <button class="btn login-btn">Login</button><br><br><br><br>
                <a href="index.php" class="backhome"><i class="fa-solid fa-house  mr-1"></i>Back To Home Page</a>

            </div>
        </div>
    </div>
    <script src="login/script.js"></script>
</body>

</html>