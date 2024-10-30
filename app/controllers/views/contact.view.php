<?php
require_once __DIR__ . '/inicio.part.php';
?>

<body id="page-top">

	<!-- Navigation Bar -->
	<?php
	require_once __DIR__ . '/navegacion.part.php';
	?>
	<!-- End of Navigation Bar -->

	<!-- Principal Content Start -->
	<div id="contact">
		<div class="container">
			<div class="col-xs-12 col-sm-8 col-sm-push-2">
				<h1>CONTACT US</h1>
				<hr>
				<p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
				<form clas="form-horizontal" action="/contact/enviar" method="post"
					enctype="multipart/form-data">

					<div class="form-group">
						<div class="col-xs-6">
							<label class="label-control">Nom</label>
							<input class="form-control" type="text" name="nombre" >
						</div>
						<div class="col-xs-6">
							<label class="label-control">Cognoms</label>
							<input class="form-control" type="text" name="apellidos" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label class="label-control">Email</label>
							<input class="form-control" type="text" name="email" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label class="label-control">Subject</label>
							<input class="form-control" type="text" name="asunto" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label class="label-control">Message</label>
							<textarea class="form-control" name="mensaje"></textarea>
							<button class="pull-right btn btn-lg sr-button">SEND</button>
						</div>
					</div>
				</form>
				<hr class="divider">
				<div class="address">
					<h3>GET IN TOUCH</h3>
					<hr>
					<p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
					<div class="ending text-center">
						<ul class="list-inline social-buttons">
							<li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
							</li>
						</ul>
						<ul class="list-inline contact">
							<li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
							<li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
						</ul>
						<p>Photography Fanatic Template &copy; 2017</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Principal Content Start -->
	<?php
	require_once __DIR__ . '/fin.part.php';
	?>
</body>

</html>