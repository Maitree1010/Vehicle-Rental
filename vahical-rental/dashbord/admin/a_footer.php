
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
</body>

</html>