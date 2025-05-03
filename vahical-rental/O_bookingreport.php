<?php
 include 'includes/cn.php';
 $O_bookingreport='active';
 include 'dashbord/owners/o_header.php';
?>

    


    <!-- vendor css -->
    <link rel="stylesheet" href="css/style.css">

    <script language="javascript" type="text/javascript">
        var popUpWin = 0;
        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }

    </script>



   
<div class="main-content">
<!-- <div class="row"> -->
<!-- <div class="col-md-12"> -->
   
        <div class="main-content">
            <!-- [ breadcrumb ] start -->
            <!-- <div class="page-header"> -->
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="mb-3">Between Dates Booking Report</h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">

                <!-- [ form-element ] start -->
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <h5><b>Booking Report</h5>
                            <hr>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-2">From Date</div>
                                        <div class="col-4 mb-3"><input type="date" name="fromdate" class="form-control"
                                                required></div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-2">To Date</div>
                                        <div class="col-4 mb-3"><input type="date" name="todate" class="form-control"
                                                required></div>
                                    </div>

                                    <div class="row" style="margin-top:1%;">
                                        <div class="col-6" align="center"><button type="submit" name="submit"
                                                class="btn btn-primary">Submit</button></div>
                                    </div>

                                </form>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <?php if (isset($_POST['submit'])) { 
                                        $fdate=$_POST['fromdate'];
                                        $tdate=$_POST['todate'];
                                        ?>

                                        <br>
                                        <h4 align="center" style="color:#2c3e50">Booking Report Form
                                            <?= $fdate;?> To
                                            <?= $tdate;?>
                                        </h4>
                                        <hr />
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th><b>Booking id</b></th>
                                                        <th><b>Vehicle Image</b></th>
                                                        <th><b>Picup Location</b></th>
                                                        <th><b>Return Location</b></th>
                                                        <th><b>Picup Date</b></th>
                                                        <th><b>Return Date</b></th>
                                                        <th><b>Actions</b></th>

                                                        </tr>
                                                    </thead>
                                                    <?php
                                    $sql="SELECT * from `bookings`  where `pic_date` between '$fdate' and '$tdate' and `owner_id`='$oid'";
                                    $result=$conn-> query($sql);
                                        // $cnt=1;
                                        if ($result-> num_rows > 0){
                                        while ($row=$result-> fetch_assoc()) {
                                            $vid=$row["vehicle_id"];
                                            $vselect="select * from vehicles where vehicle_id=$vid";
                                            $vqry=mysqli_query($conn,$vselect);
                                            $vrow=mysqli_fetch_array($vqry);
                                            $vhimg=$vrow['vhimg'];
                                ?>
                                                    <?php
                                       
                                    ?>
                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                <?=$row["id"]?>
                                                            </td>
                                                            <th><img src="<?= $vhimg; ?>" alt="" srcset="" style="height:80px; width:90px; object-fit:cover;"></th>

                                                            <td>
                                                                <?=$row["pic_location"]?>
                                                            </td>
                                                            <td>
                                                                <?=$row["rtn_location"]?>
                                                            </td>
                                                            <td>
                                                                <?=$row["pic_date"]?>
                                                            </td>
                                                            <td>
                                                                <?=$row["rtn_date"]?>
                                                            </td>

                                                            <td><a href="O_mng_booking.php?book_id=<?= $row['id']?>"
                                                                    title="View Details">
                                                                    <button type="button" class="btn btn-primary">&nbsp;View &nbsp;
                                                                        </button>
                                                                </a>
                                                                
                                                                                                                                                                                </td>

                                                            <?php } ?>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="7">
                                                                <center>
                                                                    <button class="btn btn-dark" onclick="window.print()">Print🎞</button>
                                                            </th>
                                                        </tr>
                                                        <?php  } } else{ ?>
                                                            
                                                    </tbody>
                                                    <?php }?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
               
               </div> <!-- [ form-element ] end -->
           
        </div>
</div>

    <!-- Required Js -->
    <script src="js/vendor-all.min.js"></script>
    <script src="js/plugins/bootstrap.min.js"></script>
    <script src="js/pcoded.min.js"></script>

<?php include 'dashbord/owners/o_footer.php' ?>