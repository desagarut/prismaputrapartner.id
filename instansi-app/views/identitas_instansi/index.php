<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
  .table {
    font-size: 14px;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Identitas Instansi</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="#!">Identitas Instansi</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->


  <!-- /.content-header -->
  <section class="content" id="maincontent">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-md-12">
          <?php // $this->load->view('identitas_instansi/peta.php'); 
          ?>

          <div class="card">
            <form id="mainform" name="mainform" action="" method="post">
              <div class="card-header">
                <div class="col-md-12">
                  <div class="text-right">
                    <?php if ($this->CI->cek_hak_akses('h')) : ?>
                      <a href="<?= site_url('identitas_instansi/form'); ?>" class="btn btn-warning" title="Ubah Data"><i class="fa fa-edit"></i> Ubah Data</a>
                      <!--<a href="<?= site_url('identitas_instansi/maps/kantor'); ?>" class="btn btn-box bg-purple btn-sm "><i class='fa fa-map-marker'></i> Lokasi Kantor <?= $kecamatan; ?></a>-->
                      <a href="<?= site_url('identitas_instansi/maps/kantor'); ?>" class="btn btn-success " title="Ubah Lokasi Kantor"><i class="feather mr-2 icon-map-pin"></i> Lokasi Kantor
                      </a>
                      <!--<a href="<?= site_url('identitas_instansi/maps/wilayah'); ?>" class="btn btn-box btn-info btn-sm btn-sm "><i class='fa fa-map'></i> Peta Wilayah <?= $kecamatan; ?></a>-->
                      <a href="<?= site_url('identitas_instansi/maps/wilayah'); ?>" class="btn btn-primary" title="Ubah Wilayah Desa"><i class="feather mr-2 icon-map"></i> Wilayah </a>
                      <!--<a href="<?= site_url('identitas_instansi/maps_openstreet/wilayah'); ?>" class="btn btn-secondary" title="Ubah Wilayah Desa"><i class='feather mr-2 icon-map'></i> Wilayah Desa | OSM</a>-->
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="card-body table-border-style">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <th colspan="3" style="background-color:#606BFD; color:#fff"><strong>
                            IDENTITAS INSTANSI
                          </strong></th>
                      </tr>
                      <tr>
                        <td width="300">Nama Lembaga</td>
                        <td width="1">:</td>
                        <td><?= $main['nama_instansi']; ?></td>
                      </tr>
                      <tr>
                        <td>Kode Instansi</td>
                        <td>:</td>
                        <td><?= kode_wilayah($main['kode_instansi']); ?></td>
                      </tr>
                      <tr>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td><?= $main['kode_pos']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama Pemimpin</td>
                        <td>:</td>
                        <td><?= $main['nama_pimpinan']; ?></td>
                      </tr>
                      <tr>
                        <td>NIK/NIP</td>
                        <td>:</td>
                        <td><?= $main['nip_pimpinan']; ?></td>
                      </tr>
                      <tr>
                        <td>Alamat Kantor</td>
                        <td>:</td>
                        <td><?= $main['alamat_instansi']; ?></td>
                      </tr>
                      <tr>
                        <td>E-Mail</td>
                        <td>:</td>
                        <td><?= $main['email_instansi']; ?></td>
                      </tr>
                      <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><?= $main['telepon_instansi']; ?></td>
                      </tr>
                      <tr>
                        <td>Website</td>
                        <td>:</td>
                        <td><?= $main['website_instansi']; ?></td>
                      </tr>
                      <tr>
                        <th colspan="3" style="background-color:#606BFD; color:#fff"><strong>
                            PROFIL SINGKAT</strong></th>
                      </tr>
                      <tr>
                        <td>Profil
                        </td>
                        <td>:</td>
                        <td><?= $main['profil_singkat']; ?></td>
                      </tr>
                      <tr>
                        <td>Visi</td>
                        <td>:</td>
                        <td><?= $main['visi']; ?></td>
                      </tr>
                      <tr>
                        <td>Misi </td>
                        <td>:</td>
                        <td><?= $main['misi']; ?></td>
                      </tr>
                      <tr>
                        <td>Strategi</td>
                        <td>:</td>
                        <td><?= $main['strategi']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>