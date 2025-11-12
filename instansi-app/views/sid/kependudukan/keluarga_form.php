<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid text-sm">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Form Data Keluarga</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('keluarga/clear') ?>"> Daftar Keluarga</a></li>
						<li class="breadcrumb-item active">Form</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="<?= $form_action ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div id="nik_kepala" name="nik_kepala"></div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<a href="<?= site_url("keluarga") ?>" class="btn btn-info btn-sm" title="Kembali ke Daftar Keluarga">
								<i class="fa fa-arrow-left "></i> Kembali
							</a>
						</div>
						<div class='card-body'>
							<div class="row">
								<div class='col-sm-7'>
									<div class='form-group'>
										<label for="alamat"> Nomor KK</label>
										<?php
										// $penduduk dipakai kalau validasi data gagal
										if ($penduduk):
											$no_kk = $penduduk['no_kk'];
										else:
											$no_kk = $kk['no_kk'];
										endif;
										?>
										<input id="no_kk" name="no_kk" class="form-control input-sm nik" type="text" placeholder="Nomor KK" value="<?= $no_kk ?>"></input>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-sm-12'>
							<div class="form-group bg-primary" style="padding:10px">
								<strong>DATA KEPALA KELUARGA :</strong>
							</div>
						</div>
						<?php include("instansi-app/views/sid/kependudukan/penduduk_form_isian.php"); ?>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>