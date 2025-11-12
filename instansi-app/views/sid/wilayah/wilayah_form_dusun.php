<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Wilayah Dusun <?= $desa['desa'] ?></h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active"><a href="<?= site_url('identitas_instansi') ?>">Identitas Instansi</a></li>
						<li class="breadcrumb-item active"><a href="#!">wilayah Dusun</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<a href="<?= site_url("sid_core/sub_desa/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa") ?>" class="btn bbtn-box btn-info btn-sm" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-left "></i> Kembali ke  <?= ucwords($this->setting->sebutan_desa) ?>
						</a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
									<div class="card-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="dusun">Nama <?= ucwords($this->setting->sebutan_dusun) ?></label>
													<div class="col-sm-7">
														<input id="dusun" class="form-control input-sm nama_terbatas required" maxlength="100" type="text" placeholder="Nama  <?= ucwords($this->setting->sebutan_dusun) ?>" name="dusun" value="<?= $dusun ?>">
													</div>
												</div>
											</div>
											<?php if ($dusun) : ?>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="kepala_lama">Kepala <?= ucwords($this->setting->sebutan_dusun) ?> Sebelumnya</label>
														<div class="col-sm-7">
															<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
																<strong><?= $individu["nama"] ?></strong>
																<br />NIK - <?= $individu["nik"] ?>
															</p>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="id_kepala">NIK / Nama Kepala <?= ucwords($this->setting->sebutan_dusun) ?></label>
													<div class="col-sm-7">
														<select class="form-control select2" style="width: 100%;" id="id_kepala" name="id_kepala">
															<option selected="selected">-- Silakan Masukan NIK / Nama--</option>
															<?php foreach ($penduduk as $data) : ?>
																<option value="<?= $data['id'] ?>">NIK :<?= $data['nik'] . " - " . $data['nama'] . " - " . $data['dusun'] ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class='card-footer'>
										<div class='col-xs-12'>
											<button type='reset' class='btn btn-social btn-box btn-danger btn-sm invisible'><i class='fa fa-times'></i> Batal</button>
											<button type='submit' class='btn btn-social btn-box btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
<script type="text/javascript">
	setTimeout(function() {
		$('#dusun').rules('add', {
			maxlength: 50
		})
	}, 500);
</script>