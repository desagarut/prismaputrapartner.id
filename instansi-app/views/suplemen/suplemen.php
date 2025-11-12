<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header text-sm">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5 class="m-0">Data Tambahan</h5>
				</div>
				<div class="col-sm-6 text-xs">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('penduduk'); ?>"> Data Klien</a></li>
						<li class="breadcrumb-item active">Data Tambahan</li>
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
						<form id="mainform" name="mainform" action="" method="post">
							<div class="card-header">
								<a href="<?= site_url('suplemen/form') ?>" class="btn btn-box bg-olive btn-sm " title="Tambah Data Baru"><i class="fa fa-plus"></i> Tambah Data Baru</a>
								<a href="<?= site_url('suplemen/panduan') ?>" class="btn btn-box btn-info btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Panduan"><i class="fa fa-question-circle"></i> Panduan</a>
							</div>
							<div class="card-body">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<select class="form-control input-sm" name="sasaran" onchange="formAction('mainform', '<?= site_url('suplemen'); ?>')">
											<option value="">Pilih Sasaran</option>
											<?php foreach ($list_sasaran as $key => $value): ?>
												<?php if (in_array($key, ['1', '2'])) : ?>
													<option value="<?= $key; ?>" <?= selected($set_sasaran, $key); ?>><?= $value ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
									</form>
									<div class="table-responsive">
										<table class="table table-bordered table-striped dataTable table-hover tabel-daftar">
											<thead class="bg-gray disabled color-palette">
												<tr>
													<th>No</th>
													<th>Aksi</th>
													<th>Nama Data</th>
													<th>Jumlah Terdata</th>
													<th>Sasaran</th>
													<th>Keterangan</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($suplemen): ?>
													<?php foreach ($suplemen as $key => $item):	?>
														<tr>
															<td class="padat"><?= ($key + 1); ?></td>
															<td class="aksi">
																<a href="<?= site_url("suplemen/clear/$item[id]"); ?>" class="btn bg-purple btn-box btn-sm" title="Rincian Data"><i class="fa fa-list-ol"></i></a>
																<a href="<?= site_url("suplemen/form/$item[id]"); ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class='fa fa-edit'></i></a>
																<a
																	<?php if ($item['jml'] <= 0): ?>
																	href="#" data-href="<?= site_url("suplemen/hapus/$item[id]") ?>" data-toggle="modal" data-target="#confirm-delete"
																	<?php endif; ?>
																	class="btn bg-maroon btn-box btn-sm" title="Hapus" <?= jecho($item['jml'] > 0, true, 'disabled'); ?>><i class="fa fa-trash"></i>
																</a>
															</td>
															<td width="20%"><a href="<?= site_url("suplemen/rincian/$item[id]"); ?>"><?= $item["nama"] ?></a></td>
															<td class="padat"><?= $item['jml'] ?></td>
															<td class="nostretch"><?= $sasaran[$item["sasaran"]] ?></td>
															<td><?= $item['keterangan'] ?></td>
														</tr>
													<?php endforeach; ?>
												<?php else: ?>
													<tr>
														<td class="text-center" colspan="6">Data Tidak Tersedia</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
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
<?php $this->load->view('global/confirm_delete'); ?>