<?php $data = $program[0]; ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5>Manajemen Kasus</h5>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right text-sm">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('manajemen_kasus') ?>">Manajemen Kasus</a></li>
						<li class="breadcrumb-item active">Tambah Area </li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row text-sm">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header with-border">
							<a href="<?= site_url('manajemen_kasus') ?>" class="btn btn-box btn-info btn-sm" title="Kembali"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
						</div>
						<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
							<div class="card-body">
								<?php $cid = $data["sasaran"]; ?>
								<div class="form-group">
									<label class="col-sm-3 control-label">Bidang Hukum</label>
									<div class="col-sm-3">
										<?php if ($jml <> 0): ?>
											<input type="hidden" name="cid" value="<?= $cid ?>">
											<select class="form-control input-sm" disabled>
											<?php else: ?>
												<select class="form-control input-sm required" name="cid" id="cid">
													<option value="">Pilih Bidang Hukum <?= $cid; ?></option>
													<option value="1" <?php selected($cid, 1); ?>>Hukum Pidana</option>
													<option value="2" <?php selected($cid, 2); ?>>Hukum Perdata</option>
													<option value="3" <?php selected($cid, 3); ?>>Hukum Tata Usaha Negara</option>
													<option value="4" <?php selected($cid, 4); ?>>Lainnya</option>
												</select>
											<?php endif; ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="nama">Nama Area Praktik</label>
									<div class="col-sm-8">
										<input name="nama" class="form-control input-sm nomor_sk" maxlength="100" placeholder="Nama Area Praktik" type="text" value="<?= $data["nama"]; ?>"></input>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="ndesc">Keterangan</label>
									<div class="col-sm-8">
										<textarea id="ndesc" name="ndesc" class="form-control input-sm required" placeholder="Isi Keterangan" maxlength="500" rows="8"><?= $data["ndesc"]; ?></textarea>
									</div>
								</div>
								<?php //$data = $program[0];
								//$val = $data["asaldana"]; ?>
								<!--
								<div class="form-group">
									<label class="col-sm-3 control-label" for="asaldana">Asal Dana</label>
									<div class="col-sm-3">
										<select class="form-control input-sm required" name="asaldana" id="asaldana">
											<option value="">Sumber Dana</option>
											<?php //foreach ($asaldana as $ad): ?>
												<option value="<?= $ad ?>" <?php //selected($val, $ad); ?>><? //= $ad ?></option>
											<?php //endforeach; ?>
										</select>
									</div>
								</div>-->
								<div class="form-group">
									<label class="col-sm-3 control-label" for="tgl_post">Periode</label>
									<div class="col-sm-4">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control input-sm pull-right" id="tgl_1" name="sdate" placeholder="Tgl. Mulai" type="text" value="<?= date("d/m/Y", strtotime($data["sdate"])); ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control input-sm pull-right" id="tgl_2" name="edate" placeholder="Tgl. Akhir" type="text" value="<?= date("d/m/Y", strtotime($data["edate"])); ?>">
										</div>
									</div>
								</div>
								<?php $data = $program[0];
								$status = $data["status"]; ?>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="status">Status</label>
									<div class="col-sm-3">
										<select class="form-control input-sm required" name="status" id="status">
											<option value="1" <?php selected($status, 1); ?>>Aktif</option>
											<option value="0" <?php selected($status, 0); ?>>Tidak Aktif</option>
											<!-- Default Value Aktif -->
										</select>
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>