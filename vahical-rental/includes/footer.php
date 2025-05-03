<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Drive<span> My</span> Dreams</a></h2>
              <p>Welcome to Drive My Dreams, a revolutionary vehicle rental platform that connects renters with vehicle owners in a seamless and secure way.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://www.facebook.com/"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://x.com/?lang=en"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="services.php" class="py-2 d-block">Services</a></li>
                <li><a href="vehicle.php" class="py-2 d-block">Vehicle</a></li>
                <li><a href="blog.php" class="py-2 d-block">Blog</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          
          <?php
    $query = "SELECT * FROM `contact` WHERE id=1";
    $result = mysqli_query($conn, $query);
    $contactdata = mysqli_fetch_assoc($result);
    $email=$contactdata['email'];
    $phone=$contactdata['phone'];
    $address=$contactdata['address'];
?>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?=$address;?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?=$phone;?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?=$email;?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Drive My Dreams <i class="icon-heart color-success" aria-hidden="true"></i> by <a href="#" target="_blank">Me😎</a> -->
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"</script>
  <script>

        let CurrentForm = 0;

        ShowForm(CurrentForm);



        function ShowForm(n) {

            let x = document.getElementsByClassName('Step');

            x[n].style.display = 'block';

            document.getElementById('btnPrevious').style.display = (n == 0) ? 'none' : 'inline';

            document.getElementById('btnNext').value = ((x.length - 1) == n) ? "Submit" : "Next";

            document.getElementById('tabNumber').innerHTML = n + 1 + "/" + x.length;

        }

        function ButtonClick(n) {

            $('#form1').validate();

            let x = document.getElementsByClassName('Step');

            if (n == 1 && !$('#form1').valid())

                return false;



            x[CurrentForm].style.display = 'none';

            CurrentForm = CurrentForm + n;



            if (x.length == CurrentForm) {

                // $('#Message').text(alert('The Form is successfully submitted.'));
                // location.reload();

                $('#form1').hide();

                return false;

            }



            ShowForm(CurrentForm);

        }

    </script>

    
  </body>
</html>