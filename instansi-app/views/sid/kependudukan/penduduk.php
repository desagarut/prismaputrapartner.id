<script>
	$(document).ready(function() {
		$('#cari').focus();
	});

	$(function() {
		$("#cari").autocomplete({
			source: function(request, response) {
				$.ajax({
					type: "POST",
					url: '<?= site_url("penduduk/autocomplete"); ?>',
					dataType: "json",
					data: {
						cari: request.term
					},
					success: function(data) {
						response(JSON.parse(data));
					}
				});
			},
			minLength: 2,
		});
	});
</script>


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
						<form id="mainform" name="mainform" action="" method="post">
							<div class="card-header">
								<div class="row">
									<div class="col-sm-9">
										<?php if ($this->CI->cek_hak_akses('h')) : ?>
											
											<a class="btn btn-success btn-sm" data-toggle="dropdown"><i class='fa fa-plus'></i> Tambah Klien</a>
												<ul class="dropdown-menu" role="menu">
												<a href="<?= site_url('penduduk/form'); ?>" class="dropdown-item" title="Tambah Data"><i class="fa fa-plus"></i> Tambah Klien dari KTP</a>
													<a href="<?= site_url('keluarga/form') ?>" class="dropdown-item" title="Tambah Data KK Baru"><i class="fa fa-plus"></i> Tambah Klien dari KK Baru</a>
													<a href="<?= site_url('keluarga/form_old') ?>" class="dropdown-item" title="Tambah Data KK dari Klien yang sudah ter-input" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Data Kepala Keluarga"><i class="fa fa-plus"></i> Tambah KK dari Klien yang Ada</a>
												</ul>
											<a href="#confirm-delete" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform', '<?= site_url("penduduk/delete_all/$p/$o"); ?>')" class="btn btn-danger btn-sm hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
										<?php endif; ?>

										<?php if ($this->CI->cek_hak_akses('h')) : ?>
											<div class="btn-group-vertical">
												<a class="btn btn-primary btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Aksi</a>
												<ul class="dropdown-menu" role="menu">
													<a href="<?= site_url("penduduk/ajax_cetak/$o/cetak"); ?>" class="dropdown-item" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data">Cetak</a>
													<a href="<?= site_url("penduduk/ajax_cetak/$o/unduh"); ?>" class="dropdown-item" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data">Unduh</a>
													<a href="<?= site_url("penduduk/ajax_adv_search"); ?>" class="dropdown-item" title="Pencarian Spesifik" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pencarian Spesifik">Pencarian Spesifik</a>
												</ul>
											</div>
										<?php endif; ?>
										<a href="<?= site_url("{$this->controller}/clear"); ?>" class="btn btn-warning btn-sm">
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
												<path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160H336c-17.7 0-32 14.3-32 32s14.3 32 32 32H463.5c0 0 0 0 0 0h.4c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32s-32 14.3-32 32v51.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1V448c0 17.7 14.3 32 32 32s32-14.3 32-32V396.9l17.6 17.5 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352H176c17.7 0 32-14.3 32-32s-14.3-32-32-32H48.4c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z" />
											</svg> Bersihkan Filter
										</a>
									</div>

									<div class="col-sm-3">
										<div class="input-group float-right">
											<input name="cari" id="cari" class="form-control form-control-sm" placeholder="Cari..." type="text" title="Pencarian berdasarkan nama penduduk" value="<?= html_escape($cari); ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("penduduk/filter/cari"); ?>');$('#'+'mainform').submit();}">
											<button type="submit" class="btn btn-sm	btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("penduduk/filter/cari"); ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-sm-2">
										<select class="form-control form-control-sm" name="filter" onchange="formAction('mainform', '<?= site_url('penduduk/filter/filter'); ?>')">
											<option value="">Status kependudukan</option>
											<?php foreach ($list_status_penduduk as $data) : ?>
												<option value="<?= $data['id']; ?>" <?= selected($filter, $data['id']); ?>><?= set_ucwords($data['nama']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-sm-2">
										<select class="form-control form-control-sm" name="status_dasar" onchange="formAction('mainform', '<?= site_url('penduduk/filter/status_dasar'); ?>')">
											<option value="">Status Dasar</option>
											<?php foreach ($list_status_dasar as $data) : ?>
												<option value="<?= $data['id']; ?>" <?= selected($status_dasar, $data['id']); ?>><?= set_ucwords($data['nama']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-sm-2">
										<select class="form-control form-control-sm" name="sex" onchange="formAction('mainform', '<?= site_url('penduduk/filter/sex'); ?>')">
											<option value="">Jenis Kelamin</option>
											<?php foreach ($list_jenis_kelamin as $data) : ?>
												<option value="<?= $data['id']; ?>" <?= selected($sex, $data['id']); ?>><?= set_ucwords($data['nama']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<?php $this->load->view('global/filter_wilayah', ['form' => 'mainform']); ?>
								</div>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-responsive table-hover">
											<thead>
												<tr>
													<th><input type="checkbox" id="checkall" /></th>
													<th class="text-center">No</th>
													<th class="text-center">Aksi</th>
													<th><?= url_order($o, "{$this->controller}/{$func}/$p", 3, 'Nama'); ?></th>
													<th><?= url_order($o, "{$this->controller}/{$func}/$p", 7, 'Umur'); ?></th>
													<th>Alamat</th>
													<th>Pekerjaan</th>
													<th>Kontak</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($main) : ?>
													<?php foreach ($main as $key => $data) : ?>
														<tr data-widget="expandable-table" aria-expanded="false">
															<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
															<td class="padat text-center"><?= ($key + $paging->offset + 1); ?></td>
															<td>
																<div class="card-profile">
																	<div class="text-center" style="max-width:70px; max-height:70px">
																		<img class="profile-user-img img-fluid img-circle img-responsive" alt="Foto Penduduk" src="<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>" />
																	</div>
																	<div class="btn-group">
																		<a href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>">
																			<button type="button" class="btn btn-sm btn-success" title="Lihat Detail Biodata Penduduk">Lihat</button></a>
																		<button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
																			<span class="sr-only">Toggle Dropdown</span>
																		</button>
																		<div class="dropdown-menu" role="menu">
																			<a class="dropdown-item" href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>">Lihat Detail Biodata Penduduk</a>
																			<?php if ($data['status_dasar'] == 9) : ?>
																				<a class="dropdown-item" href="#" data-href="<?= site_url("penduduk/kembalikan_status/$p/$o/$data[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#confirm-status">Kembalikan ke Status HIDUP</a>
																			<?php endif; ?>
																			<?php if ($data['status_dasar'] == 1) : ?>
																				<?php if ($this->CI->cek_hak_akses('u')) : ?>
																					<a class="dropdown-item" href="<?= site_url("penduduk/form/$p/$o/$data[id]"); ?>">Ubah Biodata Penduduk</a>
																				<?php endif; ?>
																				<a class="dropdown-item" href="<?= site_url("penduduk/ajax_penduduk_maps_google/$p/$o/$data[id]/0"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" title="Lokasi <?= $data['nama'] ?> " data-title="Lokasi <?= $data['nama'] ?> - <?= strtoupper($data['dusun']); ?>, RW <?= $data['rw']; ?> / RT <?= $data['rt']; ?>">Lokasi Tempat Tinggal</a>
																				<?php if ($this->CI->cek_hak_akses('h')) : ?>
																					<a class="dropdown-item" href="<?= site_url("penduduk/edit_status_dasar/$p/$o/$data[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Status Dasar">Ubah Status Dasar</a>
																				<?php endif; ?>
																				<a class="dropdown-item" href="<?= site_url("penduduk/dokumen/$data[id]"); ?>">Upload Dokumen Penduduk</a>
																				<a class="dropdown-item" href="<?= site_url("penduduk/rumah_form/$data[id]"); ?>" title="Tambah rumah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah rumah">Tambah Rumah</a>
																				<a class="dropdown-item" href="<?= site_url("penduduk/cetak_biodata/$data[id]"); ?>" target="_blank">Cetak Biodata Penduduk</a>
																				<a class="dropdown-item" href="#">Something else here</a>
																				<div class="dropdown-divider"></div>
																				<?php if ($this->CI->cek_hak_akses('h')) : ?>
																					<a class="dropdown-item" href="#" data-href="<?= site_url("penduduk/delete/$p/$o/$data[id]"); ?>" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
																				<?php endif; ?>
																			<?php endif; ?>
																		</div>
																	</div>
																</div>
															</td>
															<td nowrap >
																<p><strong><?= strtoupper($data['nama']); ?></strong></br></p>
																<p class="text-sm">
																	<small>NIK : <a href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>" id="test" name="<?= $data['id']; ?>"><?= $data['nik']; ?></a></small><br />
																	<small>No KK : <a href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>" id="test" name="<?= $data['id']; ?>"><?= $data['no_kk']; ?></a></small><br />
																</p>
															</td>
															<td nowrap>
																Usia : <strong><?= $data['umur']; ?></strong> <small>tahun</small><br />
																<small>Gender : <?= $data['sex']; ?><br />
																	Lahir di : <?= $data['tempatlahir']; ?><br />
																	Tanggal : <?= tgl_indo2($data['tanggallahir']) ?></small>
															</td>
															<td width=30%><small>
																	<?= $data['alamat']; ?><br />
																	RT <?= $data['rt']; ?> / RW <?= $data['rw']; ?>,
																	Desa/Kelurahan <?= $data['desa']; ?>, Kec. <?= $data['kecamatan']; ?>, Kab/Kota <?= $data['kabkota']; ?>, Prov <?= $data['provinsi']; ?> Kode Pos <?= $data['kode_pos']; ?>
																</small>
															</td>
															<td nowrap>
																<small><?= $data['pekerjaan']; ?></small>
															</td>
															<td nowrap>
																<small>Telepon: <?= $data['telepon']; ?></small><br/>
																<small>Email: <?= $data['email']; ?></small>
															</td>
														</tr>
														<tr class="expandable-body">
															<td colspan="7">
																<small>Pendidikan :<?= $data['pendidikan']; ?><br />
																	Perkawinan : <?= $data['kawin']; ?><br />
																	Pendaftar : <?= $data['nama_pendaftar']; ?><br />
																	Tanggal : <?= tgl_indo2($data['created_at']) ?></small>
															</td>
														</tr>
													<?php endforeach; ?>
												<?php else : ?>
													<tr>
														<td class="text-center" colspan="20">Data Tidak Tersedia</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</form>
						<?php $this->load->view('global/paging'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('global/confirm_delete'); ?>
<?php $this->load->view('global/konfirmasi'); ?>

<div class='modal fade' id='confirm-status' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
			</div>
			<div class='modal-body btn-info'>
				Apakah Anda yakin ingin mengembalikan status data penduduk ini?
			</div>
			<div class='modal-footer'>
				<button type="button" class="btn btn-social btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
				<a class='btn-ok'>
					<button type="button" class="btn btn-social btn-box btn-info btn-sm" id="ok-status"><i class='fa fa-check'></i> Simpan</button>
				</a>
			</div>
		</div>
	</div>
</div>