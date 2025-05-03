<?php 
// session_start();
include 'includes/header.php'; 
 include 'includes/cn.php';

if (!isset($_SESSION['uid'])) {
    header("location:login.php");
    exit;
}

$userEmail =$uemail ;

// Handle profile picture upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $uploadDir = 'images/';
    $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['profile_picture']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
    }
     elseif ($_FILES['profile_picture']['size'] > 200000000) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
     }
     elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        echo "<script>alert('Sorry, only JPG, JPEG, and PNG files are allowed.')</script>";
    } else {
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
            $profilePicPath = $uploadFile;
            $updateQuery = "UPDATE renters SET propic='$profilePicPath' WHERE renter_id='$uid'";
            mysqli_query($conn, $updateQuery);
        } else {
            echo "<script>alert('Error uploading file.')</script>";
        }
    }
}

$query = "SELECT propic FROM renters WHERE renter_id='$uid'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);

$profilePicture = !empty($userData['propic']) ? $userData['propic'] : 'images/profile.jpg';
// ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


        

    <div class="profile-header">
        <div class="profilehe-cnt">
            <img src="<?= $profilePicture ?>" alt="Background" class="background-image">
        </div>

        <div class="profile-details">
            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <div class="profile-picture-wrapper" onclick="document.getElementById('profile_picture').click()">
                    <img src="<?= $profilePicture ?>" alt="Profile Picture" class="profile-picture">
                    <div class="camera-icon-container">
                        <i class="fas fa-camera camera"></i>
                    </div>
                </div>
                <input type="file" name="profile_picture" id="profile_picture" accept="images/*" style="display:none;" onchange="this.form.submit()">
            </form>

            <div class="profile-info">
                <h1><?= $userEmail ?></h1>
            </div>
        </div>
    </div>

    <div class="services-section">
        <a href="info.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="images/pinfo.png"></div>
                <h3>INFORMATION</h3>
            </div>
        </a>
        <a  href="mybooking.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="images/myboook.png"></div>
                <h3>MY BOOKING</h3>
            </div>
        </a>
        <a  href="mypayment.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="images/picon.png"></div>
                <h3>PAYMENTS</h3>
            </div>
        </a>
        <a  href="myblog.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="images/blog1.png"></div>
                <h3>MY BLOGS</h3>
            </div>
        </a>
        
    </div>

    <iframe src="info.php" name="main" id="main"></iframe>

    <?php include 'includes/footer.php' ; ?>


</body>

</html>