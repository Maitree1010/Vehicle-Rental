
<!----add-modal start--------->
<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Booking Information</h5>
									<button type="button" class="close" data-dismiss="modal"  aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
                                
<style>

            .user-fm .Step{
                display:none;
            }
            .user-fm #form1 {
                position: relative;
                border-radius: 20px px;
                box-shadow: 0px 1px 7px 0px;
                background:white;
                padding: 28px;
            }
            .user-fm .book-cnt{
                display: flex;
                justify-content: space-between;            
            }
            .user-fm .book-cnt .bi{
                width: 49%;
            }
            .user-fm label.error {
                color: red;        
            }
            .user-fm p input.error, textarea.error {
                border: 1px solid red;
            }
            .user-fm p input.valid, textarea.valid {
                border: 1px solid green;
            }
            .user-fm .form-group p,.user-fm .form-group .book-cnt .bi {
                position: relative;
                /* margin: 20px 0; */
            }

            .user-fm .form-group p .plac-hold{
                position: absolute;
                color:transparent;
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
            .user-fm .form-group .file-up{
                display: inline-flex;
                align-items:center;
                width: 100%;
                justify-content:space-between;
            }
            .user-fm .form-group .file-up .upload{
                display:flex;
                flex-direction:column;
                width:60% !important;
            }
            .user-fm .form-group .file-up .upload .btn{
                margin-top:5px;
                
            }
            .user-fm .form-group .file-up .img-cnt{
                /* background-color: rgba(216, 212, 212, 0.36) !important; */
                height: 7rem;
                width:7rem;
                border: 1px solid black;
                overflow: hidden;
                margin:5px 0;
                font-size: 13px;
                display: flex;
                align-items: center;
                justify-content: center;    
            }
            .user-fm .form-group .file-up .imghold{
                font-size: 15px;
                text-align:left;
                font-weight:700;
                padding:  0 .75rem;
                color:green;
            }
            .user-fm .form-group .file-up .img-cnt img{
                /* height: 100%; */
                width: 95%;
            }

            .user-fm .form-group p input:focus~.plac-hold,
            .user-fm .form-group p input:valid~.plac-hold {
                top: 0;
                font-size: 13px;
                background:white;
                color:black;
            }

        

</style>
<?php
if(isset($_POST['Next'])){


// echo "<script>alert('Something went wrong');</script>";

$vid=$_POST['vehicle_id'];
$oid=$_POST['owner_id'];
$v_price=$_POST['vprice'];
$uid=$_POST['uid'];
$picloc=$_POST['picloc'];
$rtnloc=$_POST['rtnloc'];
$picdat=$_POST['picdat'];
$rtndat=$_POST['rtndat'];
$pictim=$_POST['pictim'];
$rtntim=$_POST['rtntim'];

$drname=$_FILES['drivelc']['name'];
$drtmp_name=$_FILES['drivelc']['tmp_name'];
$drfolder='images/vimg/'.$drname;
move_uploaded_file($drtmp_name,$drfolder);

$adrname=$_FILES['adharcard']['name'];
$adrtmp_name=$_FILES['adharcard']['tmp_name'];
$adrfolder='images/vimg/'.$adrname;
move_uploaded_file($adrtmp_name,$adrfolder);

    $insert="INSERT INTO `bookings` ( `vehicle_id`, `owner_id`, `renter_id`,`pic_location`, `rtn_location`, `pic_date`, `rtn_date`, `pic_tim`, `rtn_tim`, `total_cost`, `drv_lic`, `adharcard`) VALUES ('$vid','$oid','$uid','$picloc','$rtnloc','$picdat','$rtndat','$pictim','$rtntim','$v_price','$drfolder','$adrfolder');";
    // $insert="INSERT INTO `bookings` (`id`, `vehicle_id`, `owner_id`, `renter_id`, `pic_location`, `rtn_location`, `pic_date`, `rtn_date`, `pic_tim`, `rtn_tim`, `total_cost`, `drv_lic`, `adharcard`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '');";
    $run = mysqli_query($conn, $insert);
    if ($run) {
        echo "<script>alert('Booking Successfully Created');</script>";

    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
    // header('location:index.php');



}
?>
<div class="user-fm">

<div id="Message" style="text-align: center; color: green"></div>

<form id="form1" method="POST" runat="server" enctype="multipart/form-data">
<div id="tabNumber" style="text-align: center; color: black; font-size: 18px;"></div>


    <div class="form-group Step">
        <h5 style="text-align: center">Booking Time</h5>                        
        <p class="book-cnt">
            <span class="bi">
                <input type="text" hidden id="vid" name="vehicle_id"   >
                <input type="text" hidden id="owner_id" name="owner_id"   >
                <input type="text" hidden id="vprice" name="vprice"   >
                <input type="text" name="uid" hidden value="<?= $uid;?>">
                <script> 
function go(){
    var vid=document.getElementById("vid");
    var owner_id=document.getElementById("owner_id");
    var vprice=document.getElementById("vprice");
    
if(vid!=sessionStorage.getItem('vid')){
    vid.value="";
    vid.value=sessionStorage.getItem('vid');
    // vprice.value="";
    vprice.value=sessionStorage.getItem('vprice');
    owner_id.value=sessionStorage.getItem('owner_id');
}else{
    vid.value="";
    vid.value=sessionStorage.getItem('vid');

}

}


                </script>
                
               
                
                <input placeholder="Pic-up Location" class="form-control book-info" required name="picloc" type="text" />
                <label class="plac-hold" for="">Pic-up Location</label>
            </span>
            <span class="bi">
                <input placeholder="Return Location" class="form-control book-info" required name="rtnloc" type="text" />
                <label class="plac-hold" for="">Return Location</label>
            </span>
        </p>
        <p class="book-cnt">
            <span class="bi">
                <input placeholder="Pic-up date" class="form-control book-info" id="date" required name="picdat" type="date" />
                <label class="plac-hold" for="">Pic-up date</label>
            </span>
            <span class="bi">
                <input placeholder="Return date" class="form-control book-info" id="dropdate" required name="rtndat" type="date" />
                <label class="plac-hold" for="">Return date</label>

            </span>
        </p>
        <p class="book-cnt">
            <span class="bi">
                <input placeholder="Pic-up Time" class="form-control book-info" required name="pictim" type="time" />
                <label class="plac-hold" for="">Pic-up time</label>

            </span>
            <span class="bi">
                <input placeholder="Return Time" class="form-control book-info myear" required name="rtntim" type="time" />
                <label class="plac-hold" for="">Return time</label>
            </span>
        </p>
    </div>

    <div class="form-group Step">
        <h5 style="text-align: center">Upload Documents</h5>
        <div class="file-up">
            <div class="img-cnt">
                <img src="images/drvlic.png" alt="" srcset="" class="img-box">
            </div>
            <div class="upload">
                <div class="imghold">Driving Licans</div>
                <input class="btn" required name="drivelc" type="file" />                
            </div>            
        </div>
        <div class="file-up">
            <div class="img-cnt">
                <img src="images/adhar.png" alt="" srcset="" class="img-box">
            </div>
            <div class="upload">
                <div class="imghold">Adharcard</div>
                <input class="btn" required name="adharcard" type="file" />                
            </div>            
        </div>
    </div>
    <input type="button" id="btnPrevious" value="Previous" class="btn btn-secondary" onclick="ButtonClick(-1)" name="Previous" />
    <input type="submit" id="btnNext" value="Next" class="btn btn-primary" onclick="ButtonClick(1)" name="Next" />

</form>
</div>
</div>
</div>
</div>

<script>
        // JavaScript to dynamically Print "From Date" To Maximum Date Enable to show Minimum date.

	var today = new Date().toISOString().split('T')[0];
	document.getElementById("date").setAttribute("min", today);
</script>
<script>
        // JavaScript to dynamically update "To Date" based on "From Date"
        const fromDateInput = document.getElementById('date');
        const toDateInput = document.getElementById('dropdate');

        fromDateInput.addEventListener('change', function() {
            const fromDate = this.value; // Get selected "From Date"
            toDateInput.min = fromDate; // Set "To Date" minimum value
        });
    </script>

					<!----edit-modal end--------->
                  <!--  <script src="css/form/script.js"></script> -->





    <!-- <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" /> -->

    




    



