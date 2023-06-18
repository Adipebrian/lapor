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
				<a class="navbar-brand text-white" href="#"><b>SIPPOLSUB</b></a>
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
			<div class="row">
				<div class="col-md-6 d-flex flex-column justify-content-center ">
					<h6 style="margin-bottom: -5px;">POLITEKNIK NEGERI SUBANG</h6>
					<h1 style="font-size: 50px;"><b>SISTEM PENGADUAN</b></h1>
					<h5>Selamat Datang di website pengaduan Politeknik Negeri Subang</h5>
					<div class="row mt-3">
						<small>LAPORKAN SEKARANG!</small>
						<a href="#lapor" class="btn btn-c mt-2" style="margin-left: 10px;">Lapor</a>
					</div>
				</div>
				<div class="col-md-6 d-flex justify-content-end">
					<img src="<?= base_url() ?>/assets/img/banner.png" class="img-fluid" alt="...">
				</div>
			</div>
		</div>
	</section>
	<div data-bs-spy="scroll" data-bs-target="#navbar">
		<div class="variasi">
			<img src="<?= base_url() ?>/assets/img/waves.png" alt="">
		</div>
		<section class="container" id="lapor">
			<div class="card bg-white" style="margin-top: -220px;">
				<div class="card-body">
					<h3 class="text-center p-2" style="border:2px solid black;"><b>LAPOR</b></h3>
					<form class="p-3 row	" action="<?= base_url() ?>/lapor/store" enctype="multipart/form-data" method="post">
						<?= csrf_field() ?>
						<div class="col-md-12 mb-3">
							<select name="jenis" id="jenis" class="form-control" required>
								<option value="" disabled selected>-- Pilih Jenis Laporan --</option>
								<option value="Aspirasi"> Aspirasi </option>
								<option value="Pengaduan"> Pengaduan </option>
								<option value="Informasi"> Informasi </option>
							</select>
							<div class="invalid-feedback">
								<?= $validation->getError('jenis') ?>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" required class="form-control <?= ($validation->getError('judul') ? 'is-invalid' : '') ?>" placeholder="Judul Laporan" name="judul" value="<?= (old('judul') ? old('judul') : '') ?>">
							<div class="invalid-feedback">
								<?= $validation->getError('judul') ?>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<textarea name="isi" id="isi" cols="30" rows="10" required class="form-control <?= ($validation->getError('isi') ? 'is-invalid' : '') ?>" placeholder="Isi Laporan"><?= (old('isi') ? old('isi') : '') ?></textarea>
							<div class="invalid-feedback">
								<?= $validation->getError('isi') ?>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="input-group date" id="datepicker">
								<input type="text" required class="form-control <?= ($validation->getError('tgl') ? 'is-invalid' : '') ?>" id="date" name="tgl" placeholder="Tanggal" value="<?= (old('tgl') ? old('tgl') : '') ?>" />
								<span class="input-group-append">
									<span class="input-group-text bg-light d-block">
										<i class="fa fa-calendar"></i>
									</span>
								</span>
								<div class="invalid-feedback">
									<?= $validation->getError('tgl') ?>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<input type="text" required class="form-control <?= ($validation->getError('lokasi') ? 'is-invalid' : '') ?>" placeholder="Lokasi" name="lokasi" value="<?= (old('lokasi') ? old('lokasi') : '') ?>">
							<div class="invalid-feedback">
								<?= $validation->getError('lokasi') ?>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<select name="tujuan" id="tujuan" class="form-control" required>
								<option value="" disabled selected>-- Pilih Tujuan --</option>
								<?php foreach ($tujuan as $t) : ?>
									<option value="<?= $t->kode ?>"> <?= $t->jurusan ?></option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								<?= $validation->getError('lokasi') ?>
							</div>
						</div>
						<div class="row mb-3 d-flex flex-column">
							<label for="foto" class="col-md-2 col-form-label">Foto</label>
							<div class="col-md-12">
								<img src="<?= base_url() ?>/assets/img/preview.png" alt="" class="img-thumbnail img-preview">
							</div>
							<div class="col-md-12">
								<div class="input-group mb-3">
									<input type="file" required class="form-control <?= ($validation->getError('foto') ? 'is-invalid' : '') ?>" id="foto" name="foto" onchange="previewImg()">
									<div class="invalid-feedback">
										<?= $validation->getError('foto') ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="anonim">
								<label class="form-check-label" for="inlineCheckbox1">Anonim</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</section>
		<div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('failed'); ?>"></div>
		<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>

		<section class="container d-flex flex-column justify-content-center align-items-center" style="padding-top: 7%; padding-bottom: 7%;" id="about">
			<h3><b>Tentang Kami</b></h3>
			<p class="text-center">Sistem pengaduan Politeknik Negeri Subang adalah sebuah platform atau mekanisme yang digunakan untuk mengelola dan menangani pengaduan yang diajukan oleh mahasiswa, staf, atau pihak terkait terhadap masalah, masukan, atau permasalahan yang terkait dengan lingkungan kampus.</p>
		</section>

		<section class="c-blue p-lg-5 text-white" style="padding: 10%;" id="report">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3>Jumlah Laporan</h3>
						<h1 style="font-size: 12vh;"><?= number_format(jml_laporan(),0,"",".") ?></h1>
					</div>
				</div>
			</div>
		</section>

		<section class="contact-area c-dark" style="margin-top:10%;" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="contact-content text-center">
							<a href="" style="text-decoration: none;color: #fff;"><b>
									<h1>SIPPOLSUB</h1>
								</b></a>
							<p>Pada tanggal 2 April 2014 Politeknik Negeri Subang diresmikan oleh Presiden Republik Indonesia saat itu, Bapak Susilo Bambang Yudhoyono di Istana Negara. Setelah peresmian tersebut, diangkat Direktur pertama POLSUB melalui Surat Keputusan Menteri Pendidikan dan Kebudayaan no. 112/MPK.A4/KP/2014, tertanggal 24 April 2014.</p>
							<div class="hr"></div>
							<h6>Alamat</h6>
							<h6>089123456<span>|</span>02123456</h6>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<footer class="c-dark">
		<p>Copyright &copy; <?= gettime()->getYear() ?> All Rights Reserved.</p>
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script>
		function previewImg() {
			const foto = document.querySelector('#foto');
			const imgPreview = document.querySelector('.img-preview');
			const fileFoto = new FileReader();
			fileFoto.readAsDataURL(foto.files[0]);

			fileFoto.onload = function(e) {
				imgPreview.src = e.target.result;
			}
		}

		$(function() {
			$('#datepicker').datepicker();
		});


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