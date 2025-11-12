<!-- Content Header (Page header) -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header text-sm">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5 class="m-0">Daftar Klien</h5>
				</div>
				<div class="col-sm-6 text-xs">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item active">Daftar Klien</li>
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
						<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">

							<div class="card-header">
								<a href="<?= site_url("dokumen_lampau") ?>" class="btn btn-box btn-info btn-sm" title="Kembali">
									<i class="fa fa-arrow-circle-left "></i> Kembali ke Daftar Kasus Lampau
								</a>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label class="control-label col-sm-4" for="nama">Nama Kasus</label>
									<div class="col-sm-8">
										<input name="nama" class="form-control form-control-sm nomor_sk" maxlength="50" type="text" value="<?= $dokumen_lampau['nama'] ?>"></input>
									</div>
								</div>
								<?php if ($dokumen_lampau['gambar']) : ?>
									<div class="form-group row">
										<label class="control-label col-sm-4" for="nama">Sampul Dokumen </label>
										<div class="col-sm-8">
											<input type="hidden" name="old_gambar" value="<?= $dokumen_lampau['gambar'] ?>">
											<img class="attachment-img img-responsive" style="width: 100%;" src="<?= AmbilGaleri($dokumen_lampau['gambar'], 'sedang') ?>" alt="Dokumen">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group row">
									<label class="control-label col-sm-4" for="nama">Bidang hukum </label>
									<div class="col-sm-3">
										<select class="form-control form-control-sm required" name="cid" id="cid">
											<option value="">Pilih Bidang Hukum <?= $cid; ?></option>
											<option value="1" <?php selected($cid, 1); ?>>Hukum Pidana</option>
											<option value="2" <?php selected($cid, 2); ?>>Hukum Perdata</option>
											<option value="3" <?php selected($cid, 3); ?>>Hukum Tata Usaha Negara</option>
											<option value="4" <?php selected($cid, 4); ?>>Lainnya</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-sm-4" for="nama">Jenis Penanganan </label>
									<div class="col-sm-3">
										<select class="form-control form-control-sm required" name="cid" id="cid">
											<option value="">Pilih Penanganan <?= $cid; ?></option>
											<option value="1" <?php selected($cid, 1); ?>>Litigasi</option>
											<option value="2" <?php selected($cid, 2); ?>> Non Litigasi</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-sm-4" for="nama">Area Praktik</label>
									<div class="col-sm-8">
										<input name="nama" class="form-control form-control-sm nomor_sk" maxlength="50" type="text" value="<?= $dokumen_lampau['nama'] ?>"></input>
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-sm-4" for="upload">Sampul Dokumen</label>
									<div class="col-sm-8">
										<div class="input-group input-group-sm">
											<input type="text" class="form-control <?php !($dokumen_lampau['gambar']) and print('required') ?>" id="file_path">
											<input id="file" type="file" class="hidden" name="gambar">
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-box btn-sm" id="file_browser"><i class="fa fa-search"></i> Browse</button>
											</span>
										</div>
										<?php $upload_mb = max_upload(); ?>
										<p><label class="control-label"><small>Batas maksimal <?= $upload_mb ?> MB. Format file JPG/PNG</small></label></p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class='col-xs-12 text-right'>
									<button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
									<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>