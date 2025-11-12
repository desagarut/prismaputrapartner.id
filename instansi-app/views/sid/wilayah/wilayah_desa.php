<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-4">
					<h5 class="m-0">Wilayah Kec. <?= $kecamatan ?></h5>
				</div>
				<div class="col-sm-8">
					<small>
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
							<li class="breadcrumb-item active"><a href="<?= site_url('identitas_instansi') ?>">wilayah </a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($id_provinsi) ?></a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($kabkota) ?></a></li>
							<li class="breadcrumb-item active"><a href="#!"><?= strtolower($kecamatan) ?></a></li>
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
						<a href="<?= site_url("sid_core/sub_kecamatan/$id_provinsi/$id_kabkota/$id_kecamatan") ?>" class="btn btn-box btn-info btn-sm btn-sm" title="Kembali Ke Daftar Kabupaten Kota">
							<i class="fa fa-arrow-circle-left "></i>&nbsp;Kembali ke Daftar Kecamatan
						</a>
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="<?= site_url("sid_core/form_desa/$id_provinsi/$id_kabkota/$id_kecamatan") ?>" class="btn btn-box btn-success btn-sm" title="Tambah Desa / Kelurahan"><i class="fa fa-plus"></i></a>
						<?php endif; ?>
						<a href="<?= site_url("sid_core/cetak_desa/$id_provinsi/$id_kecamatan") ?>" class="btn btn-box bg-purple btn-sm" title="Cetak Data" target="_blank"><i class="fa fa-print "></i></a>
						<a href="<?= site_url("sid_core/excel_desa/$id_provinsi/$id_kecamatan") ?>" class="btn btn-box bg-navy btn-sm" title="Unduh Data" target="_blank"><i class="fa fa-download"></i></a>
					</div>
					<div class="card-header">
					<small>Wilayah Administratif <?= ucwords($this->setting->sebutan_kecamatan) ?> : <?= $kecamatan ?> </small>
					</div>
					<div class="card-body">
						<form id="mainform" name="mainform" action="" method="post">
							<div class="row">
								<div class="card-body table-responsive">
									<table class="table table-hover">
										<thead>
											<tr>
												<th class="padat">No</th>
												<th wlass="padat">Aksi</th>
												<th width="35%">Desa / Kelurahan</th>
												<th width="35%">Koordinator</th>
												<th class="text-center">RW</th>
												<th class="text-center">RT</th>
												<th class="text-center">KK</th>
												<th class="text-center">L+P</th>
												<th class="text-center">L</th>
												<th class="text-center">P</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$total = array();
											$total['total_rw'] = 0;
											$total['total_rt'] = 0;
											$total['total_kk'] = 0;
											$total['total_warga'] = 0;
											$total['total_warga_l'] = 0;
											$total['total_warga_p'] = 0;
											foreach ($main as $data) :
											?>
												<tr>
													<td class="no_urut"><?= $data['no'] ?></td>
													<td nowrap>
														<a href="<?= site_url("sid_core/sub_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian Sub Wilayah RW">Lihat RW</a>
														<?php if ($this->CI->cek_hak_akses('h')) : ?>
															<a href="<?= site_url("sid_core/form_desa/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
															<a href="#" data-href="<?= site_url("sid_core/delete/dusun/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
														<?php endif; ?>
													</td>
													<td><?= strtoupper($data['desa']) ?></td>
													<td nowrap><strong><?= strtoupper($data['nama_kadus']) ?></strong> - <?= $data['nik_kadus'] ?></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rw'] ?></a></td>
													<td class="bilangan"><?= $data['jumlah_rt'] ?></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga_kk/$data[id]") ?>"><?= $data['jumlah_kk'] ?></a></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga/$data[id]") ?>"><?= $data['jumlah_warga'] ?></a></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga_l/$data[id]") ?>"><?= $data['jumlah_warga_l'] ?></a></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga_p/$data[id]") ?>"><?= $data['jumlah_warga_p'] ?></a></td>
												</tr>
											<?php
												$total['total_rw'] += $data['jumlah_rw'];
												$total['total_rt'] += $data['jumlah_rt'];
												$total['total_kk'] += $data['jumlah_kk'];
												$total['total_warga'] += $data['jumlah_warga'];
												$total['total_warga_l'] += $data['jumlah_warga_l'];
												$total['total_warga_p'] += $data['jumlah_warga_p'];
											endforeach;
											?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="4"><label align="center">TOTAL</label></th>
												<th class="bilangan"><?= $total['total_rw'] ?></th>
												<th class="bilangan"><?= $total['total_rt'] ?></th>
												<th class="bilangan"><?= $total['total_kk'] ?></th>
												<th class="bilangan"><?= $total['total_warga'] ?></th>
												<th class="bilangan"><?= $total['total_warga_l'] ?></th>
												<th class="bilangan"><?= $total['total_warga_p'] ?></th>
											</tr>
										</tfoot>
									</table>
									<?php $this->load->view('global/paging');
									?>
								</div>
								<?php //$this->load->view('global/paging'); 
								?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>