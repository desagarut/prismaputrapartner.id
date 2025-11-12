<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header text-sm">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Form Data Klien</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('penduduk'); ?>">Daftar Klien</a></li>
            <li class="breadcrumb-item active">Form</li>
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
          <form id="mainform" name="mainform" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" onreset="reset_hamil();">
            <div class="row">
              <?php include("instansi-app/views/sid/kependudukan/penduduk_form_isian.php"); ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>