<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>About Us</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	
    <!-- My own style -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<style>
		body{
			padding: 2rem 0rem;
		}
		.avatar {
			border: 0.3rem solid rgba(#fff, 0.3);
			margin-top: -6rem;
			margin-bottom: 1rem;
			max-width: 9rem;
		}
	</style>
</head>

<body>

<!-- Content -->
<div class="container mx-auto">
	<div class="text-center my-5">
		<p class="h1 text-dark font-weight-bold">TIM</p>
	</div>

	<div class="row justify-content-between">
		<div class="col-sm-8 col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="<?= base_url('assets/images/google.jpeg') ?>">
				<div class="card-body text-center">
					<img class="avatar rounded-circle" src="<?= base_url('assets/images/hary.jpg') ?>">
					<h4 class="card-title">Hary Suryanto</h4>
					<h6 class="card-subtitle mb-2 text-muted">3411171145</h6>
					<p class="card-text">
						Lahir di Cimahi, pada 11 Oktober 1999. Hobinya nonton video di YouTube tentang teknologi. Bercita-cita memiliki usaha kuliner yang besar. 
					</p>
					
					<p class="font-italic font-weight-bold">"Coba aja dulu, biar ga penasaran."</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-8 col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="<?= base_url('assets/images/facebook.jpg') ?>">
				<div class="card-body text-center">
					<img class="avatar rounded-circle" src="<?= base_url('assets/images/agri.jpg') ?>">
					<h4 class="card-title">Agri Yodi Prayoga</h4>
					<h6 class="card-subtitle mb-2 text-muted">3411171169</h6>
					<p class="card-text">
						Lahir di Bandung, pada 7 Maret 1999. Hobinya olahraga & main game. Bercita-cita menjadi pengusaha kaya raya. 
					</p>
					
					<p class="font-italic font-weight-bold">"Be humble & stay healthy."</p>
				</div>
			</div>
		</div>
		
		<div class="col-sm-8 col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="<?= base_url('assets/images/netflix.jpeg') ?>">
				<div class="card-body text-center">
					<img class="avatar rounded-circle" src="<?= base_url('assets/images/hovi.jpg') ?>">
					<h4 class="card-title">Hovi Sohibul Wafa</h4>
					<h6 class="card-subtitle mb-2 text-muted">3411171171</h6>
					<p class="card-text">
						Lahir di Bandung, pada 29 Januari 1998. Hobinya main game & baca komik. Bercita-cita berangkat haji dengan keluarga. 
					</p>
					
					<p class="font-italic font-weight-bold">"Dibawah kekuatan absolute, konspirasi hanyalah sampah."</p>
				</div>
			</div>
		</div>
	</div>

	<div class="text-center mt-5">
		<p class="h5 text-muted font-italic">"Kerja sama yang baik akan menghasilkan karya yang baik."</p>
	</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Menu Toggle Script -->
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>

<!-- Tooltip -->
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

</body>

</html>