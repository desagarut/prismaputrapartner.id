<script type="text/javascript">
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header text-sm">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5 class="m-0">Dokumen Lampau</h5>
				</div>
				<div class="col-sm-6 text-xs">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i></a></li>
						<li class="breadcrumb-item active">Dokumen Lampau</li>
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

					<form id="mainform" name="mainform" action="" method="post">
						<div class="card">
							<div class="card-header">
								<a href="<?= site_url("dokumen_lampau/form") ?>" class="btn btn-box btn-success btn-sm btn-sm " title="Tambah">
									<i class="fa fa-plus"></i> Tambah Dokumen Lampau
								</a>
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("dokumen_lampau/delete_all/$p/$o") ?>')" class="btn btn-box btn-danger btn-sm  hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
							</div>
							<div class="card-body">
								<div class="row mb-2">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="col-md-9">
											<select class="form-control form-control-sm col-sm-3" name="filter" onchange="formAction('mainform', '<?= site_url('dokumen_lampau/filter') ?>')">
												<option value="">Semua</option>
												<option value="1" <?php if ($filter == 1) : ?>selected<?php endif ?>>Aktif</option>
												<option value="2" <?php if ($filter == 2) : ?>selected<?php endif ?>>Tidak Aktif</option>
											</select>
										</div>
										<div class="col-md-3">
											<div class="input-group input-group-sm float-right">
												<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url('dokumen_lampau/search') ?>');$('#'+'mainform').submit();endif">
												<div class="input-group-btn">
													<button type="submit" class="btn btn-default btn-sm" onclick="$('#'+'mainform').attr('action', '<?= site_url("dokumen_lampau/search") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="row">
									<div class="col-md-12">

										<form id="mainform" name="mainform" action="" method="post">
											<table class="table table-responsive table-hover table-striped table-bordered">
												<thead>
													<tr>
														<th><input type="checkbox" id="checkall" /></th>
														<th>No</th>
														<th>Aksi</th>
														<?php if ($o == 2) : ?>
															<th><a href="<?= site_url("dokumen_lampau/index/$p/1") ?>">Nama Album <i class='fa fa-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 1) : ?>
															<th><a href="<?= site_url("dokumen_lampau/index/$p/2") ?>">Nama Album <i class='fa fa-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th><a href="<?= site_url("dokumen_lampau/index/$p/1") ?>">Nama Album <i class='fa fa-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<?php if ($o == 4) : ?>
															<th nowrap><a href="<?= site_url("dokumen_lampau/index/$p/3") ?>">Aktif <i class='fa fa-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 3) : ?>
															<th nowrap><a href="<?= site_url("dokumen_lampau/index/$p/4") ?>">Aktif <i class='fa fa-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("dokumen_lampau/index/$p/3") ?>">Aktif <i class='fa fa-sort fa-sm'></i></a></th>
														<?php endif; ?>
														<?php if ($o == 6) : ?>
															<th nowrap><a href="<?= site_url("dokumen_lampau/index/$p/5") ?>">Dimuat Pada <i class='fa fa-sort-asc fa-sm'></i></a></th>
														<?php elseif ($o == 5) : ?>
															<th nowrap><a href="<?= site_url("dokumen_lampau/index/$p/6") ?>">Dimuat Pada <i class='fa fa-sort-desc fa-sm'></i></a></th>
														<?php else : ?>
															<th nowrap><a href="<?= site_url("dokumen_lampau/index/$p/5") ?>">Dimuat Pada <i class='fa fa-sort fa-sm'></i></a></th>
														<?php endif; ?>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($main as $data) : ?>
														<tr>
															<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
															<td><?= $data['no'] ?></td>
															<td nowrap>
																<a href="<?= site_url("dokumen_lampau/urut/$data[id]/1") ?>" class="btn bg-olive btn-box btn-sm" title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a>
																<a href="<?= site_url("dokumen_lampau/urut/$data[id]/2") ?>" class="btn bg-olive btn-box btn-sm" title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a>
																<a href="<?= site_url("dokumen_lampau/sub_dokumen_lampau/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian Album"><i class="fa fa-bars"></i></a>
																<a href="<?= site_url("dokumen_lampau/form/$p/$o/$data[id]") ?>" class="btn btn-warning btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																<?php if ($data['enabled'] == '2') : ?>
																	<a href="<?= site_url("dokumen_lampau/dokumen_lampau_lock/" . $data['id']) ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan Album"><i class="fa fa-lock"></i></a>
																<?php elseif ($data['enabled'] == '1') : ?>
																	<a href="<?= site_url("dokumen_lampau/dokumen_lampau_unlock/" . $data['id']) ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan Album"><i class="fa fa-unlock"></i></a>
																<?php endif ?>
																<?php if ($this->CI->cek_hak_akses('h')) : ?>
																	<a href="#" data-href="<?= site_url("dokumen_lampau/delete/$p/$o/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																<?php endif; ?>
															</td>
															<td width="60%">
																<label data-rel="popover" data-content="<img width=200 height=134 src=<?= AmbilGaleri($data['gambar'], 'kecil') ?>>"><?= $data['nama'] ?></label>
															</td>
															<td><?= $data['aktif'] ?></td>
															<td nowrap><?= tgl_indo2($data['tgl_upload']) ?></td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>