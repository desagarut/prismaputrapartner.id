<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Form Identitas Instansi</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active"><a href="<?= site_url() ?>identitas_instansi">Identitas Instansi</a></li>
						<li class="breadcrumb-item active"><a href="#!">Form</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<form id="mainform" action="<?= $form_action; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" id="validasi">
						<div class="row">
							<div class="col-lg-3 col-md-12">
								<div class="card">
									<div class="card-body">
										<img class="img-fluid card-img-top" src="<?= gambar_institusi($main['logo']); ?>" alt="Logo">
										<br />
										<p class="text-center text-bold">Lambang <?= $instansi; ?></p>
										<p class="text-muted text-center text-red">(Kosongkan, jika logo tidak berubah)</p>
										<br />
										<div class="input-group input-group-sm">
											<input type="text" class="form-control" id="file_path">
											<input type="file" class="hidden" id="file" name="logo">
											<input type="hidden" name="old_logo" value="<?= $main['logo']; ?>">
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fa fa-search"></i> Browse</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-9 col-md-12">
								<div class="card">
									<div class="card-header text-right">
										<a href="<?= site_url('identitas_instansi'); ?>" class="btn btn-info " title="Kembali Ke Data <?= $kecamatan; ?>"><i class='feather mr-2 icon-skip-back'></i> Kembali </a>
										<button type='reset' class='btn btn-danger'><i class='feather mr-2 icon-x'></i> Batal</button>
										<button type='submit' class='btn btn-success'><i class='feather mr-2 icon-check'></i> Simpan</button>
									</div>
									<div class="card-body">
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="nama">Nama Instansi</label>
											<div class="col-sm-9">
												<input id="nama_instansi" name="nama_instansi" class="form-control input-sm required" maxlength="50" type="text" placeholder="Nama Instansi" value="<?= $main["nama_instansi"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="kode_desa">Kode Instansi</label>
											<div class="col-sm-2">
												<input id="kode_instansi" name="kode_instansi" class="form-control input-sm bilangan required" minlength="6" maxlength="6" type="text" placeholder="Kode Instansi" value="<?= $main["kode_instansi"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="kode_pos">Kode Pos</label>
											<div class="col-sm-2">
												<input id="kode_pos" name="kode_pos" class="form-control input-sm number" minlength="5" maxlength="5" type="text" placeholder="Kode Pos" value="<?= $main["kode_pos"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="nama_pimpinan">Nama Pemimpin</label>
											<div class="col-sm-9">
												<input id="nama_pimpinan" name="nama_pimpinan" class="form-control input-sm nama required" maxlength="50" type="text" placeholder="nama <?= ucwords($this->setting->sebutan_camat); ?>" value="<?= $main["nama_pimpinan"] ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="nip_kepala_desa">NIK/NIP</label>
											<div class="col-sm-9">
												<input id="nip_pimpinan" name="nip_pimpinan" class="form-control input-sm nomor_sk" maxlength="50" type="text" placeholder="NIP Pimpinan" value="<?= $main["nip_pimpinan"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="alamat_kantor">Alamat Kantor</label>
											<div class="col-sm-9">
												<textarea id="alamat_instansi" name="alamat_instansi" class="form-control input-sm alamat required" maxlength="100" placeholder="Alamat Kantor" rows="3" style="resize:none;"><?= $main["alamat_instansi"]; ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="email_instansi">E-Mail</label>
											<div class="col-sm-9">
												<input id="email_instansi" name="email_instansi" class="form-control input-sm email" maxlength="50" type="text" placeholder="E-Mail " value="<?= $main["email_instansi"] ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="telepon">Telepon</label>
											<div class="col-sm-9">
												<input id="telepon_instansi" name="telepon_instansi" class="form-control input-sm bilangan" type="text" maxlength="15" placeholder="Telepon" value="<?= $main["telepon_instansi"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="website">Website </label>
											<div class="col-sm-9">
												<input id="website_instansi" name="website_instansi" class="form-control input-sm url" maxlength="50" type="text" placeholder="Website <?= $kecamatan; ?>" value="<?= $main["website_instansi"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="nama_kabupaten">Nama <?= $kabupaten; ?></label>
											<div class="col-sm-9">
												<input id="nama_kabupaten" name="nama_kabupaten" class="form-control input-sm nama_terbatas required" maxlength="50" type="text" placeholder="Nama <?= $kabupaten; ?>" value="<?= $main["nama_kabupaten"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="kode_kabupaten">Kode <?= $kabupaten; ?></label>
											<div class="col-sm-2">
												<input id="kode_kabupaten" name="kode_kabupaten" class="form-control input-sm bilangan required" minlength="4" maxlength="4" type="text" placeholder="Kode <?= $kabupaten; ?>" value="<?= $main["kode_kabupaten"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="propinsi">Provinsi</label>
											<div class="col-sm-4">
												<select name="nama_propinsi" class="form-control select2 form-control-sm required" onchange="$('input[name=kode_propinsi]').val($(this).find(':selected').data('kode'));" style="width: 100%;">
													<option value="">Pilih Provinsi</option>
													<?php foreach ($list_provinsi as $data) : ?>
														<option value="<?= $data['nama']; ?>" data-kode="<?= $data['kode']; ?>" <?= selected(strtolower($main['nama_propinsi']), strtolower($data['nama'])); ?>><?= $data['nama']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="kode_propinsi">Kode Provinsi</label>
											<div class="col-sm-2">
												<input id="kode_propinsi" name="kode_propinsi" class="form-control input-sm bilangan required" minlength="2" maxlength="2" type="text" placeholder="Kode Provinsi" value="<?= $main["kode_propinsi"]; ?>"></input>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="profil_singkat">Profil Singkat</label>
											<div class="col-sm-9">
												<textarea id="profil_singkat" name="profil_singkat" class="form-control input-sm" placeholder="Profil Singkat" rows="3" style="resize:auto;"><?= $main["profil_singkat"]; ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="visi">Visi</label>
											<div class="col-sm-9">
												<textarea id="visi" name="visi" class="form-control input-sm" placeholder="Visi" rows="3" style="resize:auto;"><?= $main["visi"]; ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="misi">Misi </label>
											<div class="col-sm-9">
												<textarea id="misi" name="misi" class="form-control input-sm" placeholder="Misi" rows="3" style="resize:auto;"><?= $main["misi"]; ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label" for="strategi">Strategi</label>
											<div class="col-sm-9">
												<textarea id="strategi" name="strategi" class="form-control input-sm" placeholder="strategi" rows="3" style="resize:auto;"><?= $main["strategi"]; ?></textarea>
											</div>
										</div>
									</div>
									<div class='card-footer text-right'>
										<button type='reset' class='btn btn-danger'><i class='feather mr-2 icon-x'></i> Batal</button>
										<button type='submit' class='btn btn-success'><i class='feather mr-2 icon-check'></i> Simpan</button>
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