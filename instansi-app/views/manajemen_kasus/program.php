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
						<li class="breadcrumb-item active">Manajemen Kasus</li>
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
						<div class="card-header">
							<?php if ($this->CI->cek_hak_akses('h')): ?>
								<a href="<?= site_url('manajemen_kasus/create') ?>" class="btn btn-box bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Program Bantuan"><i class="fa fa-plus"></i> Tambah</a>
								<a href="<?= site_url('manajemen_kasus/impor') ?>" class="btn btn-box bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Program Bantuan" data-target="#impor" data-remote="false" data-toggle="modal" data-backdrop="false" data-keyboard="false"><i class="fa fa-upload"></i> Impor</a>
							<?php endif; ?>
							<!--<a href="<?= site_url('manajemen_kasus/panduan') ?>" class="btn btn-box btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Panduan"><i class="fa fa-question-circle"></i> Panduan</a>-->
							<?php if ($tampil != 0): ?>
								<a href="<?= site_url('manajemen_kasus') ?>" class="btn btn-box btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Program Bantuan"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Program Bantuan</a>
							<?php endif; ?>
						</div>
						<div class="card-body">
							<div class="dataTables_wrapper table-responsive form-inline dt-bootstrap no-footer">
								<form id="mainform" name="mainform" action="" method="post">
									<div class="row">
										<div class="col-md-9">
											<h5><b>Area Praktik</b></h5>
										</div>
										<div class="col-md-3 float-right">
											<select class="form-control select2 input-sm" name="sasaran" onchange="formAction('mainform', '<?= site_url('manajemen_kasus/filter/sasaran') ?>')">
												<option value="">Pilih Bidang Hukum</option>
												<?php foreach ($list_bidang_hukum as $key => $value): ?>
													<option value="<?= $key; ?>" <?= selected($set_bidang_hukum, $key); ?>><?= $value ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-responsive table-striped dataTable table-hover">
												<thead class="bg-gray disabled color-palette">
													<tr>
														<th class="text-center">No</th>
														<?php if ($this->CI->cek_hak_akses('h')): ?>
															<th width="5%" class="text-center">Aksi</th>
														<?php endif ?>
														<th class="text-center">Area Praktik</th>
														<th class="text-center">Jumlah Klien</th>
														<th class="text-center">Periode</th>
														<th class="text-center">Bidang Hukum</th>
														<th class="text-center">Status</th>
													</tr>
												</thead>
												<tbody>
													<?php $nomer = $paging->offset; ?>
													<?php foreach ($program as $item): ?>
														<?php $nomer++; ?>
														<tr>
															<td class="text-center"><?= $nomer ?></td>
															<?php if ($this->CI->cek_hak_akses('h')): ?>
																<td nowrap>
																	<a href="<?= site_url("manajemen_kasus/detail/$item[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian"><i class="fa fa-list"></i></a>
																	<a href="<?= site_url("manajemen_kasus/edit/$item[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																	<?php if ($item['jml_peserta'] != 0): ?>
																		<a href="<?= site_url("manajemen_kasus/expor/$item[id]"); ?>" class="btn bg-navy btn-box btn-sm" title="Expor"><i class="fa fa-download"></i></a>
																		<a href="#" class="btn bg-maroon btn-box btn-sm disabled" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																	<?php endif ?>
																	<?php if ($item['jml_peserta'] == 0): ?>
																		<a href="#" data-href="<?= site_url("manajemen_kasus/hapus/$item[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																	<?php endif ?>
																</td>
															<?php endif; ?>
															<td nowrap><a href="<?= site_url("manajemen_kasus/detail/$item[id]") ?>"><?= $item["nama"] ?></a></td>
															<td align="center"><?= $item['jml_peserta'] ?></td>
															<td align="center"><?= fTampilTgl($item["sdate"], $item["edate"]); ?></td>
															<td align="center"><?= $sasaran[$item["sasaran"]] ?></td>
															<td align="center"><?= $item['status'] ?></td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
											<?php $this->load->view('global/paging'); ?>
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

<?php $this->load->view('global/confirm_delete'); ?>

<?php include('district-app/views/manajemen_kasus/impor.php'); ?>