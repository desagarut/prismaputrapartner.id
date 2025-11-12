<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title> <?= strtoupper($this->setting->login_title)
				. ' ' . strtoupper($this->setting->sebutan_kecamatan_singkat)
				. strtoupper(($header['nama_kecamatan']) ? ' ' . $header['nama_kecamatan'] : '')
				. get_dynamic_title_page_from_path();
			?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/jquery-ui.min.css">

  <?php if (is_file("instansi/css/insidega.css")) : ?>
		<link type='text/css' href="<?= base_url() ?>instansi/css/insidega.css" rel='Stylesheet' />
	<?php endif; ?>
	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")) : ?>
		<link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_DESA ?>favicon.ico" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
	<?php endif; ?>

	<script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/validasi.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
	<?php require __DIR__ . '/head_tags.php' ?>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-purple">
			<div class="card-header text-center">
				<a href="<?= site_url('first'); ?>"><img src="<?= gambar_institusi($header['logo']); ?>" alt="<?= $header['nama_instansi'] ?>" class="img-responsive" style="max-width: 80px; max-height: 80px" /></a>
			
			<h1 align="center" style="font-size:18px"><strong>LOGIN</strong> <br/><?= strtoupper($this->setting->sebutan_pt) ?> <?= strtoupper($header['nama_instansi']) ?></h1>
			</div>
			<div class="card-body">
				<form id="validasi" class="text-center" action="<?= site_url('insidega/auth') ?>" method="post">
					<?php if ($this->session->insidega_wait == 1) : ?>
						<div class="error login-footer-top">
							<p id="countdown" style="color:red; text-transform:uppercase"></p>
						</div>
					<?php else : ?>
						<div class="input-group mb-3">
							<input name="username" type="text" placeholder="Nama pengguna" <?php jecho($this->session->insidega_wait, 1, "disabled") ?> value="" class="form-username form-control required">
						</div>
						<div class="input-group mb-3">
							<input name="password" id="password" type="password" placeholder="Kata sandi" <?php jecho($this->session->insidega_wait, 1, "disabled") ?> value="" class="form-username form-control required">
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="icheck-primary">
								<input type="checkbox" id="checkbox">
								<label for="checkbox">
									Tampilkan kata sandi
									</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-12">
								<button type="submit" class="btn bg-purple btn-block">MASUK</button>
							</div>
						</div>
						<?php if ($this->session->insidega == -1 && $this->session->insidega_try < 4) : ?>
							<div class="error">
								<p style="color:red; text-transform:uppercase">Login Gagal.<br />Nama pengguna atau kata sandi yang Anda masukkan salah!<br />
									<?php if ($this->session->insidega_try) : ?>
										Kesempatan mencoba <?= ($this->session->insidega_try - 1); ?> kali lagi.</p>
							<?php endif; ?>
							</div>
						<?php elseif ($this->session->insidega == -2) : ?>
							<div class="error">
								Redaksi belum boleh masuk, Sistem belum memiliki sambungan internet!
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>

		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>
<script>
	function start_countdown() {
		var times = eval(<?= json_encode($this->session->insidega_timeout) ?>) - eval(<?= json_encode(time()) ?>);
		var menit = Math.floor(times / 60);
		var detik = times % 60;
		timer = setInterval(function() {
			detik--;
			if (detik <= 0 && menit >= 1) {
				detik = 60;
				menit--;
			}
			if (menit <= 0 && detik <= 0) {
				clearInterval(timer);
				location.reload();
			} else {
				document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
			}
		}, 1000)
	}

	$('document').ready(function() {
		var pass = $("#password");
		$('#checkbox').click(function() {
			if (pass.attr('type') === "password") {
				pass.attr('type', 'text');
			} else {
				pass.attr('type', 'password')
			}
		});

		if ($('#countdown').length) {
			start_countdown();
		}
	});
</script>