<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0">Biodata Klien</h5>
        </div>
        <div class="col-sm-6 text-xs">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('penduduk/clear') ?>"> Daftar Klien</a></li>
            <li class="breadcrumb-item active"> Biodata Klien</li>

          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <form id="mainform" name="mainform" action="" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <?php if ($this->CI->cek_hak_akses('h')) : ?>
                  <a href="<?= site_url("penduduk/dokumen/$penduduk[id]") ?>" class="btn btn-box btn-success btn-sm " title="Manajemen Dokumen"><i class="fa fa-book"></i> Manajemen Dokumen</a>
                  <!--<a href="<?= site_url("penduduk/rumah/$penduduk[id]") ?>" class="btn btn-box btn-success btn-sm " title="Rumah Penduduk" ><i class="fa fa-book"></i> Rumah Penduduk</a>-->
                  <?php if ($penduduk['status_dasar_id'] == 1) : ?>
                    <a href="<?= site_url("penduduk/form/$p/$o/$penduduk[id]") ?>" class="btn btn-box btn-warning btn-sm " title="Ubah Biodata"><i class="fa fa-edit"></i> Ubah Biodata</a>
                  <?php endif; ?>
                <?php endif; ?>
                <a href="<?= site_url("penduduk/cetak_biodata/$penduduk[id]") ?>" class="btn btn-box bg-purple btn-sm " title="Cetak Biodata" target="_blank"><i class="fa fa-print"></i> Cetak Biodata</a>
                <?php if ($penduduk['status_dasar_id'] == 1 and !empty($penduduk['id_kk'])) : ?>
                  <a href="<?= site_url("keluarga/anggota/$p/$o/$penduduk[id_kk]") ?>" class="btn btn-box btn-danger btn-sm " title="Anggota Keluarga"><i class="fa fa-users"></i> Anggota Keluarga</a>
                <?php endif; ?>
                <a href="<?= site_url("penduduk/clear") ?>" class="btn btn-box btn-info btn-sm btn-sm " title="Kembali Ke Daftar Klien"> <i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Klien </a>
              </div>
            </div>
            <!-- Main content -->
            <div class="row">
              <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary">
                  <div class="card-body box-profile">
                    <div align="center">
                      <?php if ($penduduk['foto']) : ?>
                        <img class="img-responsive img-circle" src="<?= AmbilFoto($penduduk['foto'], '', $penduduk['id_sex']) ?>" alt="Foto Penduduk" style="width:150px">
                      <?php else : ?>
                        <img class="img-responsive img-circle" alt="Foto Penduduk" src="<?= AmbilFoto($penduduk['foto'], '', $penduduk['id_sex']) ?>" style="width:150px" />
                      <?php endif; ?>
                      <h3 class="profile-username text-center">
                        <?= strtoupper($penduduk['nama']) ?>
                      </h3>
                      <p class="text-muted text-center">
                        <?= strtoupper($penduduk['sex']) ?>
                      </p>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title text-sm">Ringkasan</h3>
                  </div>
                  <div class="card-body"> <strong><i class="fa fa-book margin-r-5"></i> Pendidikan Terakhir</strong>
                    <p class="text-muted">
                      <?= strtoupper($penduduk['pendidikan_kk']) ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat Sekarang</strong>
                    <p class="text-muted">
                      <?= strtoupper($penduduk['alamat']) ?>
                      ,
                      <?= strtoupper($penduduk['dusun']) ?>
                      ,
                      <?= strtoupper($penduduk['rt']) ?>
                      /
                      <?= $penduduk['rw'] ?>
                      , </p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Kontak</strong>
                    <p> <span class="label label-info"><i class="fa fa-phone"></i>
                        <?= $penduduk['telepon'] ?>
                      </span> <span class="label label-warning"><i class="fa fa-envelope"></i>
                        <?= $penduduk['email'] ?>
                      </span> </p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan:</strong> <br>
                    Biodata Penduduk (NIK :
                    <?= $penduduk['nik'] ?>
                    )
                    <?php if (!empty($penduduk['nama_pendaftar'])) : ?>
                      <p class="kecil"> Terdaftar pada: <i class="fa fa-clock-o"></i>
                        <?= tgl_indo2($penduduk['created_at']); ?>
                        Oleh: <i class="fa fa-user"></i>
                        <?= $penduduk['nama_pendaftar'] ?>
                      </p>
                    <?php else : ?>
                      <p class="kecil"> Terdaftar sebelum: <i class="fa fa-clock-o"></i>
                        <?= tgl_indo2($penduduk['created_at']); ?>
                      </p>
                    <?php endif; ?>
                    <?php if (!empty($penduduk['nama_pengubah'])) : ?>
                      <p class="kecil"> Terakhir diubah: <i class="fa fa-clock-o"></i>
                        <?= tgl_indo2($penduduk['updated_at']); ?>
                        <i class="fa fa-user"></i>
                        <?= $penduduk['nama_pengubah'] ?>
                      </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-9">
                <div class="card card-primary card-outline card-tabs">
                  <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="#dokumen" data-toggle="tab">Dokumen</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="#bantuan" data-toggle="tab">Data Kasus</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " href="#rumah" data-toggle="tab">Foto Kegiatan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#peta" data-toggle="tab">Lokasi</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="biodata">
                        <!-- Post -->
                        <div class="post">
                          <div class="user-block">
                            <table class="table table-bordered table-striped table-hover">
                              <tbody>
                                <tr>
                                  <td>Status Dasar</td>
                                  <td>:</td>
                                  <td><span class="<?= ($penduduk['status_dasar_id'] != 1) ? 'label label-danger' : '' ?>"><strong>
                                        <?= strtoupper($penduduk['status_dasar']) ?>
                                      </strong></span></td>
                                </tr>
                                <tr>
                                  <td width="300">Nama</td>
                                  <td width="1">:</td>
                                  <td><?= strtoupper($penduduk['nama']) ?></td>
                                </tr>
                                <tr>
                                  <td>Status Kepemilikan KTP</td>
                                  <td>:</td>
                                  <td>
                                    <table class="table table-bordered table-striped table-hover detail">
                                      <tr>
                                        <th>Wajib KTP</th>
                                        <th>KTP-EL</th>
                                        <th>Status Rekam</th>
                                        <th>Tag ID Card</th>
                                      </tr>
                                      <tr>
                                        <td><?= strtoupper($penduduk['wajib_ktp']) ?></td>
                                        <td><?= strtoupper($penduduk['ktp_el']) ?></td>
                                        <td><?= strtoupper($penduduk['status_rekam']) ?></td>
                                        <td><?= $penduduk['tag_id_card'] ?></td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Nomor Kartu Keluarga</td>
                                  <td>:</td>
                                  <td><?= $penduduk['no_kk'] ?>
                                    <?php if ($penduduk['status_dasar_id'] <> '1' and $penduduk['no_kk'] <> $penduduk['log_no_kk']) : ?>
                                      (waktu peristiwa {
                                      <?= $penduduk['status_dasar'] ?>
                                      }: {
                                      <?= $penduduk['log_no_kk'] ?>
                                      })
                                    <?php endif; ?></td>
                                </tr>
                                <tr>
                                  <td>Nomor KK Sebelumnya</td>
                                  <td>:</td>
                                  <td><?= $penduduk['no_kk_sebelumnya'] ?></td>
                                </tr>
                                <tr>
                                  <td>Hubungan Dalam Keluarga</td>
                                  <td>:</td>
                                  <td><?= $penduduk['hubungan'] ?></td>
                                </tr>
                                <tr>
                                  <td>Jenis Kelamin</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['sex']) ?></td>
                                </tr>
                                <tr>
                                  <td>Agama</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['agama']) ?></td>
                                </tr>
                                <tr>
                                  <td>Status Penduduk</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['status']) ?></td>
                                </tr>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
                                </tr>
                                <tr>
                                  <td>Akta Kelahiran</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['akta_lahir']) ?></td>
                                </tr>
                                <tr>
                                  <td>Tempat / Tanggal Lahir</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['tempatlahir']) ?>
                                    /
                                    <?= strtoupper($penduduk['tanggallahir']) ?></td>
                                </tr>
                                <tr>
                                  <td>Tempat Dilahirkan</td>
                                  <td>:</td>
                                  <td><?= $penduduk['tempat_dilahirkan_nama'] ?></td>
                                </tr>
                                <tr>
                                  <td>Jenis Kelahiran</td>
                                  <td>:</td>
                                  <td><?= $penduduk['jenis_kelahiran_nama'] ?></td>
                                </tr>
                                <tr>
                                  <td>Kelahiran Anak Ke</td>
                                  <td>:</td>
                                  <td><?= $penduduk['kelahiran_anak_ke'] ?></td>
                                </tr>
                                <tr>
                                  <td>Penolong Kelahiran</td>
                                  <td>:</td>
                                  <td><?= $penduduk['penolong_kelahiran_nama'] ?></td>
                                </tr>
                                <tr>
                                  <td>Berat Lahir</td>
                                  <td>:</td>
                                  <td><?= $penduduk['berat_lahir'] ?>
                                    Gram</td>
                                </tr>
                                <tr>
                                  <td>Panjang Lahir</td>
                                  <td>:</td>
                                  <td><?= $penduduk['panjang_lahir'] ?>
                                    cm</td>
                                </tr>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>PENDIDIKAN DAN PEKERJAAN</strong></th>
                                </tr>
                                <tr>
                                  <td>Pendidikan dalam KK</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['pendidikan_kk']) ?></td>
                                </tr>
                                <tr>
                                  <td>Pendidikan sedang ditempuh</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['pendidikan_sedang']) ?></td>
                                </tr>
                                <tr>
                                  <td>Pekerjaan</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['pekerjaan']) ?></td>
                                </tr>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>DATA KEWARGANEGARAAN</strong></th>
                                </tr>
                                <tr>
                                  <td>Warga Negara</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['warganegara']) ?></td>
                                </tr>
                                <tr>
                                  <td>Nomor Paspor</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['dokumen_pasport']) ?></td>
                                </tr>
                                <tr>
                                  <td>Tanggal Berakhir Paspor</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['tanggal_akhir_paspor']) ?></td>
                                </tr>
                                <tr>
                                  <td>Nomor KITAS/KITAP</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['dokumen_kitas']) ?></td>
                                </tr>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>ORANG TUA</strong></th>
                                </tr>
                                <tr>
                                  <td>NIK Ayah</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['ayah_nik']) ?></td>
                                </tr>
                                <tr>
                                  <td>Nama Ayah</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['nama_ayah']) ?></td>
                                </tr>
                                <tr>
                                  <td>NIK Ibu</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['ibu_nik']) ?></td>
                                </tr>
                                <tr>
                                  <td>Nama Ibu</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['nama_ibu']) ?></td>
                                </tr>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>ALAMAT</strong></th>
                                </tr>
                                <tr>
                                  <td>Nomor Telepon</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['telepon']) ?></td>
                                </tr>
                                <tr>
                                  <td>Alamat Email</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['email']) ?></td>
                                </tr>
                                <tr>
                                  <td>Alamat</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['alamat']) ?></td>
                                </tr>
                                <tr>
                                  <td>Dusun</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['dusun']) ?></td>
                                </tr>
                                <tr>
                                  <td>RT/ RW</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['rt']) ?>
                                    /
                                    <?= $penduduk['rw'] ?></td>
                                </tr>
                                <tr>
                                  <td>Alamat Sebelumnya</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['alamat_sebelumnya']) ?></td>
                                </tr>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>STATUS KAWIN</strong></th>
                                </tr>
                                <tr>
                                  <td>Status Kawin</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['kawin']) ?></td>
                                </tr>
                                <?php if ($penduduk['status_kawin'] <> 1) : ?>
                                  <tr>
                                    <td>Akta perkawinan</td>
                                    <td>:</td>
                                    <td><?= strtoupper($penduduk['akta_perkawinan']) ?></td>
                                  </tr>
                                  <tr>
                                    <td>Tanggal perkawinan</td>
                                    <td>:</td>
                                    <td><?= strtoupper($penduduk['tanggalperkawinan']) ?></td>
                                  </tr>
                                <?php endif ?>
                                <?php if ($penduduk['status_kawin'] <> 1 and $penduduk['status_kawin'] <> 2) : ?>
                                  <tr>
                                    <td>Akta perceraian</td>
                                    <td>:</td>
                                    <td><?= strtoupper($penduduk['akta_perceraian']) ?></td>
                                  </tr>
                                  <tr>
                                    <td>Akta perceraian</td>
                                    <td>:</td>
                                    <td><?= strtoupper($penduduk['tanggalperceraian']) ?></td>
                                  </tr>
                                <?php endif ?>
                                <tr>
                                  <th colspan="3" class="subtitle_head"><strong>DATA KESEHATAN</strong></th>
                                </tr>
                                <tr>
                                  <td>Golongan Darah</td>
                                  <td>:</td>
                                  <td><?= $penduduk['golongan_darah'] ?></td>
                                </tr>
                                <tr>
                                  <td>Cacat</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['cacat']) ?></td>
                                </tr>
                                <tr>
                                  <td>Sakit Menahun</td>
                                  <td>:</td>
                                  <td><?= strtoupper($penduduk['sakit_menahun']) ?></td>
                                </tr>
                                <?php if ($penduduk['status_kawin'] == 2) : ?>
                                  <tr>
                                    <td>Akseptor KB</td>
                                    <td>:</td>
                                    <td><?= strtoupper($penduduk['cara_kb']) ?></td>
                                  </tr>
                                <?php endif ?>
                                <?php if ($penduduk['id_sex'] == 2) : ?>
                                  <tr>
                                    <td>Status Kehamilan</td>
                                    <td>:</td>
                                    <td><?= empty($penduduk['hamil']) ? 'TIDAK HAMIL' : 'HAMIL' ?></td>
                                  </tr>
                                <?php endif; ?>
                                <tr>
                                  <td>Nama Asuransi</td>
                                  <td>:</td>
                                  <td><?= $penduduk['asuransi'] ?></td>
                                </tr>
                                <?php if (!empty($penduduk['id_asuransi']) and $penduduk['id_asuransi'] <> '1') : ?>
                                  <tr>
                                    <td><?= ($penduduk['id_asuransi'] == '99') ? 'Nama/nomor Asuransi' : 'No Asuransi' ?></td>
                                    <td>:</td>
                                    <td><?= strtoupper($penduduk['no_asuransi']) ?></td>
                                  </tr>
                                <?php endif; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane" id="keluarga">
                        <div class="post">
                          <div class="user-block"> <a href="<?= site_url("keluarga/anggota/$p/$o/$penduduk[id_kk]") ?>" class="btn btn-danger btn-block"> <b>Daftar Keluarga</b></a> </div>
                        </div>
                      </div>

                      <div class="tab-pane" id="dokumen">
                        <h5>Dokumen Pribadi</h5>
                        <table class="table table-bordered table-hover ">
                          <thead class="bg-gray disabled color-palette">
                            <tr>
                              <th><input type="checkbox" id="checkall"></th>
                              <th>No</th>
                              <th>Aksi</th>
                              <th>Nama Dokumen</th>
                              <th>Jenis Dokumen</th>
                              <th>Tanggal Upload</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($list_dokumen as $data) : ?>
                              <tr>
                                <td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>"></td>
                                <td><?= $key + 1 ?></td>
                                <td nowrap><a href="<?= base_url() . LOKASI_DOKUMEN ?><?= urlencode($data['satuan']) ?>" class="btn bg-info btn-box btn-sm" rel=”noopener noreferrer” target="_blank" title="Buka Dokumen"><i class="fa fa-eye"></i></a>
                                  <?php if (!$data['hidden']) : ?>
                                    <a href="<?= site_url("penduduk/dokumen_form/$penduduk[id]/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data" title="Ubah Data"><i class="fa fa-edit"></i></a> <a href="#" data-href="<?= site_url("penduduk/delete_dokumen/$penduduk[id]/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                  <?php endif ?>
                                </td>
                                <td width="40%"><?= $data['nama'] ?></td>
                                <td width="30%"><?= $jenis_syarat_surat[$data['id_syarat']]['ref_syarat_nama'] ?>
                                  </a></td>
                                <td nowrap><?= tgl_indo2($data['tgl_upload']) ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <div class="timeline-footer" align="right"> <a href="<?= site_url("penduduk/dokumen_form/$penduduk[id]") ?>" title="Tambah Dokumen" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Dokumen" class="btn btn-box bg-olive btn-sm "><i class='fa fa-plus'></i>Tambah Dokumen</a> <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("penduduk/delete_all_dokumen/$penduduk[id]") ?>')" class="btn btn-box	btn-danger btn-sm  hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a> </div>
                      </div>
                      <!-- /.tab-pane -->

                      <div class="tab-pane" id="bantuan">
                        <h4>Data Kasus</h4>
                        <table class="table table-bordered table-striped table-hover detail">
                          <tr>
                            <th class="padat">No</th>
                            <th>Waktu / Tanggal</th>
                            <th>Nama Kasus</th>
                            <th>Keterangan</th>
                          </tr>
                          <?php foreach ($program['programkerja'] as $key => $item) : ?>
                            <tr>
                              <td class="text-center"><?= $key + 1 ?></td>
                              <td><?= fTampilTgl($item["sdate"], $item["edate"]); ?></td>
                              <td><a href="<?= site_url("manajemen_kasus/data_peserta/$item[peserta_id]"); ?>">
                                  <?= $item["nama"]; ?>
                                </a></td>
                              <td><?= $item["ndesc"]; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                      </div>
                      <!-- /.tab-pane -->

                      <div class="tab-pane" id="rumah">
                        <!-- The Rumah -->
                        <h3 class="timeline-header"><a href="#">Dokumentasi Kegiatan </a></h3>
                        <div class="timeline-body">
                          <div class="col-md-12">
                            <table class="table table-hover">
                              <tr>
                                <th class="padat">No</th>
                                <th width="10%">Aksi</th>
                                <th width="50%">Nama</th>
                                <th width="40%">Keterangan </th>
                                <!--<th width="15%">File</th>
                                  <th width="15%">Tanggal Upload</th>-->
                              </tr>
                              <?php foreach ($list_rumah as $key => $data) : ?>
                                <tr>
                                  <td class="text-center"><?= $key + 1; ?></td>
                                  <td nowrap><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']) ?>" class="btn bg-info btn-box btn-sm" rel=”noopener noreferrer” target="_blank" title="Buka Dokumentasi"><i class="fa fa-eye"></i></a></br>
                                    <?php if (!$data['hidden']) : ?>
                                      <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data" title="Ubah Data"><i class="fa fa-edit"></i></a></br>
                                      <a href="#" data-href="<?= site_url("penduduk/delete_rumah/$penduduk[id]/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                    <?php endif ?>
                                  </td>
                                  <td><?= $data['nama'] ?>
                                    <br />
                                    Tanggal Upload:
                                    <?= tgl_indo2($data['tgl_upload']); ?>
                                  </td>
                                  <td><img class="img-responsive" style="width:250px" src="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" alt="Dokumentasi Kegiatan"></td>
                                  <!--<td><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" >
                                    <?= $data['satuan']; ?>
                                    </a></td>
                                  <td><?= tgl_indo2($data['tgl_upload']); ?></td>-->
                                </tr>
                              <?php endforeach; ?>
                            </table>
                            <div class="timeline-footer" align="right">
                              <a href="<?= site_url("penduduk/rumah/$penduduk[id]") ?>" class="btn bg-maroon btn-box	btn-danger btn-sm " title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                              <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]") ?>" title="Tambah Dokumentasi Kegiatan" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah" class="btn btn-box bg-olive btn-sm "><i class='fa fa-plus'></i> Tambah</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.tab-pane -->

                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="peta">
                        <!-- The Resume -->
                        <div class="card">
                          <div class="card-body">
                            <?php $this->load->view($folder_themes . '/sid/kependudukan/penduduk_map.php') ?>
                          </div>
                          <div class="card-footer" align="right">
                            <label>Lat: </label>
                            <input type="text" disabled="disabled" name="lat" id="lat" value="<?= $penduduk_map['lat'] ?>" />
                            <label>Lng: </label>
                            <input type="text" disabled="disabled" name="lng" id="lng" value="<?= $penduduk_map['lng'] ?>" />
                            <a href="<?= site_url("penduduk/ajax_penduduk_maps_koordinat/$p/$o/$penduduk[id]/1") ?>" title="Lokasi <?= $penduduk['nama'] ?>" class="btn btn-box bg-purple btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Input Koordinat Rumah : <?= strtoupper($penduduk['nama']) ?>"><i class='fa fa-map-marker'></i> Ubah Koordinat</a>
                            <a href="<?= site_url("penduduk/ajax_penduduk_maps_google/$p/$o/$penduduk[id]/1") ?>" title="Lokasi <?= $penduduk['nama'] ?>" class="btn btn-box btn-primary btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Lokasi Rumah"><i class='fa fa-google'></i> Ubah di GoogleMap</a>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title"><a href="#">Dokumentasi Kegiatan</a></h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i> </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i> </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <table class="table table-bordered table-striped table-hover detail">
                              <tr>
                                <th class="padat">No</th>
                                <th width="10%">Aksi</th>
                                <th width="40%">Nama </th>
                                <th width="50%">Foto</th>
                              </tr>
                              <?php foreach ($list_rumah as $key => $data) : ?>
                                <tr>
                                  <td class="text-center"><?= $key + 1; ?></td>
                                  <td nowrap><a href="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']) ?>" class="btn bg-info btn-box btn-sm" rel=”noopener noreferrer” target="_blank" title="Lihat"><i class="fa fa-eye"></i></a></br>
                                    <?php if (!$data['hidden']) : ?>
                                      <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data" title="Ubah Data"><i class="fa fa-edit"></i></a></br>
                                      <a href="#" data-href="<?= site_url("penduduk/delete_rumah/$penduduk[id]/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                    <?php endif ?>
                                  </td>
                                  <td><small><?= $data['nama'] ?></small>
                                  </td>
                                  <td class="text-center"><img class="img-responsive" src="<?= base_url() . LOKASI_RUMAH ?><?= urlencode($data['satuan']); ?>" alt="Foto" style="width:150px"><br />
                                    <small><?= $data['tgl_upload']; ?></small>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </table>
                          </div>
                          <div class="card-footer" align="right">
                            <a href="<?= site_url("penduduk/rumah/$penduduk[id]") ?>" class="btn bg-maroon btn-box btn-danger btn-sm " title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                            <a href="<?= site_url("penduduk/rumah_form/$penduduk[id]") ?>" title="Upload" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Upload" class="btn btn-box bg-olive btn-sm"><i class='fa fa-plus'></i> Upload</a>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title"><a href="#bantuan">Daftar Penanganan Kasus</a></h3>
                            <div class="card-tools"> <span class="time"><a class="btn btn-primary btn-xs" href="<?= site_url() ?>manajemen_kasus"><i class="fa fa-list"></i> Daftar Kasus</a></span>
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i> </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i> </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <table class="table table-bordered table-striped table-hover detail">
                              <tr>
                                <th class="padat">No</th>
                                <th>Waktu / Tanggal</th>
                                <th>Nama Kasus</th>
                                <th>Keterangan</th>
                              </tr>
                              <?php foreach ($program['programkerja'] as $key => $item) : ?>
                                <tr>
                                  <td class="text-center"><?= $key + 1 ?></td>
                                  <td><?= fTampilTgl($item["sdate"], $item["edate"]); ?></td>
                                  <td><a href="<?= site_url("manajemen_kasus/data_peserta/$item[peserta_id]"); ?>">
                                      <?= $item["nama"]; ?>
                                    </a></td>
                                  <td><?= $item["ndesc"]; ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </table>
                          </div>
                          <div class="card-footer"> </div>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>