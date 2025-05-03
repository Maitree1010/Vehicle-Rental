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


                                    $bselect="Select * , DATEDIFF(rtn_date, pic_date) AS date from bookings where renter_id=$uid;";
									$bqry=mysqli_query($conn,$bselect);					
									 
									
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

                               			


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Personal Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dashbord/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet">


    <script>
       


    </script>
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

        </style>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Bookings</title>
    <style>
        th,td{
		border:0.1px solid gray;
	}
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .booking-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .booking-item {
            display: flex;
            align-items: center;
            
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }
        .booking-img {
            width: 80px;
            height: 60px;
            border-radius: 5px;
            object-fit: cover;
        }
        .booking-details {
            display: flex;
        }
        .price {
            color: red;
            font-weight: bold;
        }
    .status{
		padding: 4px 7px;
		text-align:center;
		color:white;
		border-radius:30px;	
		font-weight: 700;

	}
        table {
            width: 100%;
            
            margin-top: 20px;
        }
        th, td {
           
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <div class="booking-header">
            <span>Recent Bookings</span>
            <!-- <a href="my_booking.php?all=true">View All Bookings →</a> -->
        </div>
        <table>

            <thead>
                <tr>
                    <th>image </th>
                    <th>Vihicle Address</th>
                    <th>Name</th>
                    <th>FromDate</th>
                    <th>ToDate</th>
                    <th>Picup Location</th>
                    <th>Return Location</th>
                    <th>Days</th>
                    <th>Total</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
          
            <tbody>
            <?php  while($brow=mysqli_fetch_array($bqry)){
                     $bid=$brow['id'];
                     $vehicle_id=$brow['vehicle_id'];
                     $renter_id=$brow['renter_id'];
                     $pic_loc=$brow['pic_location'];
                     $rtn_loc=$brow['rtn_location'];
                     $pic_date=$brow['pic_date'];
                     $rtn_date=$brow['rtn_date'];
                     $pic_tim=$brow['pic_tim'];
                     $rtn_tim=$brow['rtn_tim'];
                    //  $total_cost=$brow['total_cost'];
                     

                     $date=$brow['date'];
                     $drv_lic=$brow['drv_lic']; 
                     $adharcard=$brow['adharcard']; 
                    $status=$brow['status'];

                        $vselect="select * from vehicles where vehicle_id=$vehicle_id";
                     $vqry=mysqli_query($conn,$vselect);
                     $vrow=mysqli_fetch_array($vqry);
                        $vhimg=$vrow['vhimg']; 
                        $vname=$vrow['modelname'];
                        $address=$vrow['address'] ;
                        $price=$vrow['price'];

                        $total_cost=$date*$price;

                        
                ?>
                <tr>
                    <td> <img src="<?= $vhimg;?>" alt="Toyota Camry SE 400" class="booking-img"></td>
                    <td><?=$address ?></td>
                    <td><?= $vname; ?></td>
                    <td><?= $pic_date; ?>⌚<?= $pic_tim;?></td>
                    <td><?= $rtn_date; ?>⌚<?= $rtn_tim;?></td>
                    <td><?=$pic_loc;  ?></td>
                    <td><?=$rtn_loc;  ?></td>
                    <td><?=$date;  ?></td>
                    <td><?=$total_cost;  ?></td>
                    
                   <?php if($status=="")
                    {
                        echo " <td><span class='status bg-warning'>In Progress</span></td>";
                    }
                    elseif($status=="Approve")
                    {
                        echo " <td><span class='status bg-success'>Success</span></td>";

                    }
                    elseif($status=="Unapprove")
                    {
                        echo " <td><span class='status bg-danger'>Rejected</span></td>";
                    }
                    else{

                    }
                    
                    ?>
                    

                    <?php } ?>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html> 


