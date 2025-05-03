        <?php
        include 'includes/cn.php';

        if(isset($_POST["submit"])){
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            $role=$_POST['role'];
            
            if($role=="Owner"){
                $insert="INSERT INTO `owners` (`name`, `phone`,`email`, `password`) VALUES ( '$username',$phone, '$email', $password);";
                $run = mysqli_query($conn, $insert);
                if ($run) {
                    echo "<script>alert('Successfully Submitted Owner Data');</script>";
              
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
                echo "<script>window.open('index.php', 'second');</script>";
            }
            else{
                
                    $insert="INSERT INTO `renters` (`name`, `phone`,`email`, `password`) VALUES ( '$username',$phone, '$email', $password);";
                    $run = mysqli_query($conn, $insert);
                    if ($run) {
                        echo "<script>alert('Successfully Submitted User Data');</script>";
                  
                    } else {
                        echo "<script>alert('Something went wrong');</script>";
                    }
                    echo "<script>window.open('index.php', 'second');</script>";                
            }
        }
    ?>
        <style>
            .user-fm .Step {
                display: none;
            }

            .user-fm #form1 {
                position: relative;
                border-radius: 20px px;
                box-shadow: 0px 1px 7px 0px;
                background: white;
                padding: 28px;
            }

            .user-fm .book-cnt {
                display: flex;
                justify-content: space-between;
            }

            .user-fm .book-cnt .bi {
                width: 49%;
            }

            .user-fm label.error {
                color: red;
            }

            .user-fm p input.error,
            textarea.error {
                border: 1px solid red;
            }

            .user-fm p input.valid,
            textarea.valid {
                border: 1px solid green;
            }

            .user-fm .form-group p,
            .user-fm .form-group .book-cnt .bi {
                position: relative;
                /* margin: 20px 0; */
            }

            .user-fm .form-group p .plac-hold {
                position: absolute;
                color: transparent;
                top: 50%;
                left: 15px;
                transform: translateY(-50%);
                font-size: 16px;
                /* color:grey; */
                padding: 0 5px;
                pointer-events: none;
                transition: .5s;

            }

            .user-fm .form-group p input {
                height: 50px;
                font-size: 16px;
                color: black;
                padding: 0 15px;
                background: transparent !important;
                border: 1.2px solid black;
                outline: none;
                border-radius: 5px;
            }

            .user-fm .form-group .file-up {
                display: inline-flex;
                align-items: center;
                width: 100%;
                justify-content: space-between;
            }

            .user-fm .form-group .file-up .upload {
                display: flex;
                flex-direction: column;
                width: 60% !important;
            }

            .user-fm .form-group .file-up .upload .btn {
                margin-top: 5px;

            }

            .user-fm .form-group .file-up .img-cnt {
                background-color: rgba(216, 212, 212, 0.36) !important;
                height: 7rem;
                width: 7rem;
                border: 1px solid black;
                overflow: hidden;
                margin: 5px 0;
                font-size: 13px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .user-fm .form-group p input:focus~.plac-hold,
            .user-fm .form-group p input:valid~.plac-hold {
                top: 0;
                font-size: 13px;
                background: white;
                color: black;
            }
        </style>
        <div class="user-fm">

            <div id="Message" style="text-align: center; color: green"></div>

            <form id="form1" method="POST" runat="server">

                <!-- <div id="tabNumber" style="text-align: center; color: black; font-size: 18px;"></div> -->

                <div class="form-group Step">

                    <p>
                        <input placeholder="Email" class="form-control" required email="true" name="email"
                            type="text" />
                        <label class="plac-hold" for="">Email</label>
                    </p>
                    <p>
                        <input placeholder="Phone" class="form-control" required number="ture" name="phone"
                            type="text" />
                        <label class="plac-hold" for="">Phone</label>
                    </p>
                    <p>
                        <input placeholder="Username" class="form-control" required name="username" type="text" />
                        <label class="plac-hold" for="">Username</label>
                    </p>
                    <p>
                        <input placeholder="Password" class="form-control" required name="password" type="password" />
                        <label class="plac-hold" for="">Password</label>
                    </p>
                    <p>
                        <input placeholder="Comfirm Password" class="form-control" required name="cpassword"
                            type="password" />
                        <label class="plac-hold" for="">Comfirm Password</label>
                    </p>
                    <p>
                        <select class="form-control" name="role" required>
                            <option hidden value="">Select Role</option>
                            <option value="User">User</option>
                            <option value="Owner">Owner</option>
                        </select>
                    </p>
                </div>