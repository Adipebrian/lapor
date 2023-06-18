<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIPPOLSUB</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/home.css">
</head>

<body style="overflow-x: hidden;">
	<section class="c-blue poppins p-2">
		<nav class="container navbar navbar-expand-lg" id="navbar">
			<div class="container-fluid">
				<a class="navbar-brand text-white" href="<?= base_url() ?>/"><b>SIPPOLSUB</b></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarScroll">
					<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
						<li class="nav-item">
							<a class="nav-link text-white" href="#about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="#report">Report</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="#contact">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="<?= base_url() ?>/home/cek">Cek Pengaduan</a>
						</li>
					</ul>
					<?php if (!logged_in()) : ?>
						<a href="<?= base_url() ?>/login" class="btn btn-c">Login</a>
					<?php else : ?>
						<div class="dropdown">
							<a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="<?= base_url() ?>/assets/img/user/<?= user()->image ?>" class="rounded-circle" height="30" loading="lazy" />
							</a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
								<li>
									<a class="dropdown-item" href="<?= base_url() ?>/user/index">My profile</a>
								</li>
								<li>
									<a class="dropdown-item" href="<?= base_url() ?>/logout">Logout</a>
								</li>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</nav>
		<div class="container pt-2 text-white" style="padding-bottom: 15%;">
			<form action="<?= base_url() ?>/home/show" method="post">
			<?= csrf_field() ?>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <label for="noref">Nomor Referensi</label>
						  <input type="text" id="noref" name="noref" class="form-control" placeholder="Nomor Referensi" required value="<?= $noref ?>">
						</div>
					</div>
				</div>
				<button type="submit" class="btn bg-success mt-3">Search</button>
			</form>
		</div>
	</section>
	<footer class="c-dark">
		<p>Copyright &copy; <?= gettime()->getYear() ?> All Rights Reserved.</p>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script>

		const flashDataWarning = $('.flash-data-warning').data('flashdata');
		const flashDataSuccess = $('.flash-data-success').data('flashdata');
		var Toast = Swal.mixin({
			toast: false,
			position: 'center',
			showConfirmButton: true,
			timer: 6000
		});
		if (flashDataWarning) {
			Toast.fire({
				icon: 'warning',
				title: flashDataWarning,
				footer: '<a href="<?= base_url() ?>/login">Login?</a>'
			})
		}
		if (flashDataSuccess) {
			Toast.fire({
				icon: 'success',
				title: flashDataSuccess,
			})
		}
	</script>
</body>

</html>