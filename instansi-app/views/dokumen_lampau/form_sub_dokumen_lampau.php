<!-- Content Header (Page header) -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header text-sm">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5 class="m-0">Form Sub Dokumen Lampau</h5>
				</div>
				<div class="col-sm-6 text-xs">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('dokumen_lampau'); ?>">Dokumen Lampau</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('dokumen_lampau'); ?>">Sub Dokumen Lampau</a></li>
						<li class="breadcrumb-item active">Form Sub Dokumen Lampau</li>
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
							<div class="row">
								<div class="col-md-12">

									<div class="card-header">
										<a href="<?= site_url("gallery/sub_gallery/$album") ?>" class="btn btn-box btn-info btn-sm" title="Kembali">
											<i class="fa fa-arrow-circle-left "></i>Kembali 
										</a>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label class="control-label col-sm-4" for="nama">Nama Dokumen</label>
											<div class="col-sm-6">
												<input name="nama" class="form-control input-sm nomor_sk" maxlength="50" type="text" value="<?= $gallery['nama'] ?>"></input>
											</div>
										</div>
										<?php if ($gallery['gambar']) : ?>
											<div class="form-group">
												<label class="control-label col-sm-4" for="nama">File</label>
												<div class="col-sm-6">
													<input type="hidden" name="old_gambar" value="<?= $gallery['gambar'] ?>">
													<img class="attachment-img img-responsive" src="<?= AmbilGaleri($gallery['gambar'], 'sedang') ?>" alt="Gambar Album">
												</div>
											</div>
										<?php endif; ?>
										<div class="form-group">
											<label class="control-label col-sm-4" for="upload">Unggah file</label>
											<div class="col-sm-6">
												<div class="input-group input-group-sm">
													<input type="text" class="form-control <?php !($gallery['gambar']) and print('required') ?>" id="file_path">
													<input id="file" type="file" class="hidden" name="gambar">
													<span class="input-group-btn">
														<button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fa fa-search"></i> Browse</button>
													</span>
												</div>
												<?php $upload_mb = max_upload(); ?>
												<p><label class="control-label">Batas maksimal pengunggahan berkas <strong><?= $upload_mb ?> MB.</strong></label></p>
											</div>
										</div>
									</div>
									<div class='card-footer'>
										<div class='col-xs-12'>
											<button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
											<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>