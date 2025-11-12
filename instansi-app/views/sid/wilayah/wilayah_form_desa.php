<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Wilayah Desa/Kelurahan <?= $desa['desa'] ?></h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active"><a href="<?= site_url('identitas_instansi') ?>">Identitas Instansi</a></li>
						<li class="breadcrumb-item active"><a href="#!">wilayah Desa/Kelurahan</a></li>
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
						<a href="<?= site_url("sid_core/sub_kecamatan/$id_provinsi/$id_kabkota/$id_kecamatan") ?>" class="btn btn-box btn-info btn-sm" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>&nbsp;Kembali ke Kecamatan
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
													<label class="col-sm-3 control-label" for="desa">Nama <?= ucwords($this->setting->sebutan_desa) ?></label>
													<div class="col-sm-7">
														<input id="desa" class="form-control form-control-sm nama_terbatas required" maxlength="100" type="text" placeholder="Nama <?= ucwords($this->setting->sebutan_desa) ?>" name="desa" value="<?= $desa ?>">
													</div>
												</div>
											</div>
											<?php if ($desa) : ?>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="kepala_lama">Kepala <?= ucwords($this->setting->sebutan_desa) ?> Sebelumnya</label>
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
													<label class="col-sm-3 control-label" for="id_kepala">NIK / Nama Koordinator</label>
													<div class="col-sm-7">
														<select class="form-control select2 form-control-sm" style="width: 100%;" id="id_kepala" name="id_kepala">
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
									<div class="card-footer">
											<button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
											<button type='submit' class='btn btn-box btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
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
		$('#kabkota').rules('add', {
			maxlength: 50
		})
	}, 500);
</script>