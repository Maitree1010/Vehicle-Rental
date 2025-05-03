</div>
</div>
<!----footer-design------------->

<footer class="footer">
    <div class="container-fluid">
        <div class="footer-in">
            <p class="mb-0">Drive My Dreams Like Your Friend</p>
        </div>
    </div>
</footer>




</div>

</div>



<!-------complete html----------->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="dashbord/js/jquery-3.3.1.slim.min.js"></script>
<script src="dashbord/js/popper.min.js"></script>
<script src="dashbord/js/bootstrap.min.js"></script>
<script src="dashbord/js/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".xp-menubar").on('click', function () {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function () {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
</script>
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

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

            $('#Message').text(alert('The Form is successfully submitted.'));
            location.reload();

            $('#form1').hide();

            return false;

        }



        ShowForm(CurrentForm);

    }

</script>

</body>

</html>