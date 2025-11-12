<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-4">
					<h5>Wilayah Desa/Kel <?= $desa ?></h5>
				</div>
				<div class="col-sm-8">
					<small>
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
							<li class="breadcrumb-item active"><a href="<?= site_url('identitas_instansi') ?>">wilayah </a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($provinsi) ?></a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($kabkota) ?></a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($kecamatan) ?></a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($desa) ?></a></li>
						</ol>
					</small>
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
						<a href="<?= site_url("sid_core/sub_desa/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa") ?>" class="btn btn-box btn-info btn-sm" title="Kembali Ke Daftar Desa / Kelurahan">
							<i class="fa fa-arrow-left "></i>&nbsp;Kembali ke Daftar Desa/Kel.
						</a>
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="<?= site_url("sid_core/form_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_rw") ?>" class="btn btn-box btn-success btn-sm " title="Tambah RW"><i class="fa fa-plus"></i></a>
						<?php endif; ?>
						<a href="<?= site_url("sid_core/cetak_rw/$id_dusun") ?>" class="btn btn-box bg-purple btn-sm" title="Cetak Data" target="_blank"><i class="fa fa-print "></i> </a>
						<a href="<?= site_url("sid_core/excel_rw/$id_dusun") ?>" class="btn btn-box bg-navy btn-sm" title="Unduh Data" target="_blank"><i class="fa fa-download"></i> </a>
					</div>
					<div class="card-header">
						<small>Wilayah Administratif <?= ucwords($this->setting->sebutan_desa) ?> : <?= $desa ?> </small>
					</div>
					<div class="card-body">
						<form id="mainform" name="mainform" action="" method="post">
							<div class="row">
								<div class="col-sm-12">
									<div class="card-body table-responsive" >
										<table class="table table-hover">
											<thead>
												<tr>
													<th class="padat">No</th>
													<th class="padat">Aksi</th>
													<th>RW</th>
													<th>Koordinator</th>
													<th>RT</th>
													<th>KK</th>
													<th>L+P</th>
													<th>L</th>
													<th>P</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($main as $data) : ?>
													<tr>
														<td><?= $data['no'] ?></td>
														<td nowrap>
															<a href="<?= site_url("sid_core/sub_rt/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Lihat RT">Lihat RT</a>
															<?php if ($this->CI->cek_hak_akses('u')) : ?>
																<?php if ($data['rw'] != "-") : ?>
																	<a href="<?= site_url("sid_core/form_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah RW"><i class="fa fa-edit"></i></a>
																<?php endif; ?>
																<?php if ($data['rw'] != "-") : ?>
																	<a href="#" data-href="<?= site_url("sid_core/delete/rw/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus RW" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																<?php endif; ?>
															<?php endif; ?>
														</td>
														<td><?= $data['rw'] ?></td>
														<?php if ($data['rw'] == "-") : ?>
															<td colspan="2">
																Pergunakan RW ini apabila RT berada langsung di bawah <?= ucwords($this->setting->sebutan_desa) ?>, yaitu tidak ada RW
															</td>
														<?php else : ?>
															<td nowrap><strong><?= $data['nama_ketua'] ?></strong><br />
																<?= $data['nik_ketua'] ?></td>
														<?php endif; ?>
														<td><a href="<?= site_url("sid_core/sub_rt/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rt'] ?></a></td>
														<td><?= $data['jumlah_kk'] ?></td>
														<td><?= $data['jumlah_warga'] ?></td>
														<td><?= $data['jumlah_warga_l'] ?></td>
														<td><?= $data['jumlah_warga_p'] ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
											<tfoot>
												<tr>
													<th colspan="5"><label>TOTAL</label></th>
													<th><?= $total['jmlrt'] ?></th>
													<th><?= $total['jmlkk'] ?></th>
													<th><?= $total['jmlwarga'] ?></th>
													<th><?= $total['jmlwargal'] ?></th>
													<th><?= $total['jmlwargap'] ?></th>
												</tr>
											</tfoot>
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