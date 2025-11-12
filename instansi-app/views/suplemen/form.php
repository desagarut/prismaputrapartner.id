<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header text-sm">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5 class="m-0">Form Data Tambahan</h5>
				</div>
				<div class="col-sm-6 text-xs">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('penduduk'); ?>"> Data Klien</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('suplemen'); ?>"> Data Tambahan</a></li>
						<li class="breadcrumb-item active">Form</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<a href="<?= site_url('suplemen') ?>" class="btn btn-box btn-info btn-sm "><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Suplemen</a>
						</div>
						<form id="validasi" action="<?= $form_action; ?>" method="POST" class="form-horizontal">
							<div class="card-body">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="id_master">Sasaran Data</label>
									<div class="col-sm-7">
										<?php if ($suplemen['jml'] <> 0): ?>
											<input type="hidden" name="sasaran" value="<?= $suplemen['sasaran']; ?>">
											<select class="form-control input-sm" disabled>
											<?php else: ?>
												<select class="form-control input-sm required" name="sasaran">
												<?php endif; ?>
												<option value="">Pilih Sasaran</option>
												<?php foreach ($list_sasaran as $key => $value): ?>
													<?php if (in_array($key, ['1', '2'])) : ?>
														<option value="<?= $key; ?>" <?= selected($suplemen['sasaran'], $key); ?>><?= $value ?></option>
													<?php endif; ?>
												<?php endforeach; ?>
												</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="nama">Nama Data Suplemen</label>
									<div class="col-sm-7">
										<input class="form-control input-sm nomor_sk required" maxlength="100" type="text" placeholder="Nama Data Suplemen" name="nama" id="nama" value="<?= $suplemen['nama'] ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
									<div class="col-sm-7">
										<textarea name="keterangan" id="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="3" style="resize:none;"><?= $suplemen['keterangan'] ?></textarea>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="reset" class="btn btn-box btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
								<button type="submit" class="btn btn-box btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>