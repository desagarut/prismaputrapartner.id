<script>
	$(function() {
		var keyword = <?= $keyword; ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<?= $tipe = ucfirst(str_replace('_master', '', $this->controller)); ?>

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
						<div class="card-header with-border">
							<?php if ($this->CI->cek_hak_akses('u')): ?>
								<a href="<?= site_url("{$this->controller}/form"); ?>" title="Tambah Kategori <?= $tipe; ?> Baru" class="btn btn-social btn-flat bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Kategori <?= $tipe; ?> Baru</a>
							<?php endif; ?>
							<?php if ($this->CI->cek_hak_akses('h')): ?>
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("{$this->controller}/delete_all"); ?>')" class="btn btn-social btn-flat	btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>
							<?php endif; ?>
							<a href="<?= site_url($tipe); ?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar <?= $tipe; ?></a>
						</div>
						<div class="card-body">
							<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<form id="mainform" name="mainform" method="post">
									<div class="row">
										<div class="col-sm-12">
											<div class="input-group input-group-sm pull-right">
												<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari); ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("{$this->controller}/filter/cari") ?>');$('#'+'mainform').submit();}">
												<div class="input-group-btn">
													<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("{$this->controller}/filter/cari") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-responsive table-bordered dataTable table-striped table-hover tabel-daftar">
											<thead class="bg-gray disabled color-palette">
												<tr>
													<th><input type="checkbox" id="checkall" /></th>
													<th>No</th>
													<th>Aksi</th>
													<th><?= url_order($o, "{$this->controller}/{$func}/{$p}", 1, "Kategori {$tipe}"); ?></th>
													<th width="70%">Deskripsi <?= $tipe; ?></th>
													<th>Jumlah <?= $tipe; ?></th>
												</tr>
											</thead>
											<tbody>
												<?php if ($main): ?>
													<?php foreach ($main as $key => $data): ?>
														<tr>
															<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>"></td>
															<td class="padat"><?= ($key + $paging->offset + 1); ?></td>
															<td class="aksi">
																<?php if ($this->CI->cek_hak_akses('u')): ?>
																	<a href="<?= site_url("{$this->controller}/form/{$data['id']}") ?>" class="btn bg-orange btn-flat btn-sm" title="Ubah Kategori <?= $tipe; ?>"><i class="fa fa-edit"></i></a>
																<?php endif; ?>
																<?php if ($this->CI->cek_hak_akses('h')): ?>
																	<a href="#" data-href="<?= site_url("{$this->controller}/delete/{$data['id']}") ?>" class="btn bg-maroon btn-flat btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																<?php endif; ?>
															</td>
															<td nowrap><?= $data['kelompok'] ?></td>
															<td><?= $data['deskripsi'] ?></td>
															<td class="padat"><?= $data['jumlah'] ?></td>
														</tr>
													<?php endforeach; ?>
												<?php else: ?>
													<tr>
														<td class="text-center" colspan="6">Data Tidak Tersedia</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
										<?php $this->load->view('global/paging'); ?>
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