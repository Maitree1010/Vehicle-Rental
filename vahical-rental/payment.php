<?php
include("includes/cn.php");             
session_start();

if( ! $_GET['total_cost']){
    header("location:profile.php");
   
}

                                        if(! $_GET['bid']){
                                            header("location:profile.php");
                                        } 
                                        $bid=$_GET['bid'];
                                        $total_cost=$_GET['total_cost'];

                                        $s="SELECT * FROM bookings where id='$bid';";
                                        $q=mysqli_query($conn,$s);
                                        $f_r=mysqli_fetch_array($q);
                                        $u_id=$f_r['renter_id'];
                                        // echo $u_id;

                                        $ss="SELECT * FROM renters where renter_id='$u_id';";
                                        $qq=mysqli_query($conn,$ss);
                                        $f_u=mysqli_fetch_array($qq);
                                    
  echo "<script>alert('".$total_cost."');</script>";
extract($_POST);

 $apiKey = "rzp_test_Wi972bG7df7ltY";

?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>



<form action="status.php?bid=<?=$bid;?>" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $total_cost * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"//You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="<?php echo 'OID'.rand(10,100).'END';?>"//Replace with the order_id generated by you in the backend.
    data-buttontext="Drive My Dreams"
    data-name="Drive My Dreams"
    data-description="Import Export!"
    data-prefill.name="<?php  echo $f_u['name']; ?>"
    data-prefill.email="<?php  echo $f_u['email']; ?>"
    data-prefill.contact="<?php  echo $f_u['phone']; ?>"
    data-theme.color="#03a7f0"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">


</form>

<style type="text/css">
    .razorpay-payment-button{
        display: none;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('.razorpay-payment-button').click();
    });
</script>
