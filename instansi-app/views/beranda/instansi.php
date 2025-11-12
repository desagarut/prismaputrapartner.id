<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0">Beranda</h5>
        </div>
        <div class="col-sm-6 text-sm">
          <ol class="breadcrumb float-sm-right text-sm">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda"><i class="fa fa-home"></i></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row text-sm">
        <?php $this->load->view('beranda/stat_surat.php'); ?>
        <?php $this->load->view('beranda/stat_posting.php'); ?>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row text-sm">
        <?php $this->load->view('beranda/peta.php'); ?>
        <?php $this->load->view('beranda/stat_kasus.php'); ?>
        <?php $this->load->view('beranda/link_site.php'); ?>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-4">
          <?php $this->load->view('beranda/agenda.php'); ?>
        </div>
        <div class="col-md-4">
          <?php $this->load->view('beranda/artikel.php'); ?>
        </div>
        <div class="col-md-4">
          <?php $this->load->view('beranda/pengunjung.php'); ?>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-4">
          <?php $this->load->view('beranda/warga_login.php'); ?>
        </div>
        <div class="col-md-4">
          <?php $this->load->view('beranda/aparat_login.php'); ?>
        </div>
      </div>
    </div>
  </section>
</div>