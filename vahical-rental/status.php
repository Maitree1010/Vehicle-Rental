<?php
// Approve vehicle status
    include 'includes/cn.php';
    if(isset($_GET['Avid'])){
        $Avid=$_GET['Avid'];
        

        $update="UPDATE vehicles set status='Approve' where vehicle_id=$Avid";
        $qry=mysqli_query($conn,$update);
        if($qry){
            echo "<script>alert('Vihicle Id :".$Avid." Approved');
            window.location='A_mng_vehicle.php?vid=".$Avid."';</script>";
            
           
        }
        else{
            echo "<script>alert('Something went wrong');</script>";
        }

       

    }
    
// Unpprove vehicle status

    if(isset($_GET['Uvid'])){
        $Uvid=$_GET['Uvid'];
        // echo $Uvid;

        $update="UPDATE vehicles set status='Unapprove' where vehicle_id=$Uvid";
        $qry=mysqli_query($conn,$update);
        if($qry){
            echo "<script>alert('Vihicle Id :$Uvid Unpproved');
            window.location='A_mng_vehicle.php?vid=".$Uvid."';</script>";
        }
        else{
            echo "<script>alert('Something went wrong');</script>";
        }
    }


// Approve Booking
    
    if(isset($_GET['Abook_id'])){
        
        $Abook_id=$_GET['Abook_id'];
        
        $update="UPDATE bookings set status='Approve' where id=$Abook_id";
        $qry=mysqli_query($conn,$update);
        if($qry){
            echo "<script>alert('Booking Id :$Abook_id Approved');
            window.location='O_mng_booking.php?book_id=".$Abook_id."';
            </script>";
        }
        else{
            echo "<script>alert('Something went wrong');</script>";
        }
    } 

    // Unapprove Booking
    
    if(isset($_GET['Ubook_id'])){
        
        $Ubook_id=$_GET['Ubook_id'];
        
        $update="UPDATE bookings set status='Unapprove' where id=$Ubook_id";
        $qry=mysqli_query($conn,$update);
        if($qry){
            echo "<script>alert('Booking Id :$Ubook_id Unpproved');
            window.location='O_mng_booking.php?book_id=".$Ubook_id."';
            </script>";
        }
        else{
            echo "<script>alert('Something went wrong');</script>";
        }
    } 


    if(isset($_GET['bid'])){
        
        $bid=$_GET['bid'];
        
        $update="UPDATE bookings set payment='success' where id=$bid";
        $qry=mysqli_query($conn,$update);
        if($qry){
            echo "<script>alert('Payment :$bid Success');
            window.location='profile.php';
            </script>";
        }
        else{
            echo "<script>alert('Something went wrong');</script>";
        }
    } 


?>

