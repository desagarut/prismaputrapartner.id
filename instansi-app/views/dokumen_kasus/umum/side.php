<div class="card">
  <div class="card-header">
    <h3 class="card-title">Menu</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body">
    <ul class="nav nav-pills nav-stacked">
      <li class=" <?php ($this->tab_ini == 2) and print('active') ?>"><a href="<?= site_url('surat_masuk/clear') ?>">Surat Masuk</a></li>
    </ul>
  </div>
</div>

<?php if ($this->CI->cek_hak_akses('u')) : ?>

  <div class="card-header">
    <h3 class="card-title">Menu</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body no-padding">
    <div class="nav nav-pills flex-column">
      <li class="<?php compared_return($selected_nav, "peraturan", "active"); ?>"><a href="<?= site_url('dokumen_sekretariat/clear/3') ?>">Arsip Peraturan</a></li>
      <li class="<?php compared_return($selected_nav, "keputusan", "active"); ?>"><a href="<?= site_url('dokumen_sekretariat/clear/2') ?>">Arsip Surat Keputusan</a></li>
      <li class="<?php compared_return($selected_nav, "aparat", "active"); ?>"><a href="<?= site_url('pengurus') ?>">Buku Pegawai</a></li>
      <li class="<?php compared_return($selected_nav, "agenda_masuk", "active"); ?>"><a href="<?= site_url('surat_masuk') ?>">Arsip Surat Masuk</a></li>
      <li class="<?php compared_return($selected_nav, "agenda_keluar", "active"); ?>"><a href="<?= site_url('surat_keluar') ?>">Arsip Surat Keluar</a></li>
      <li class="<?php compared_return($selected_nav, "ekspedisi", "active"); ?>"><a href="<?= site_url('ekspedisi/clear') ?>">Buku Ekspedisi</a></li>
      <!--<li class="<?php compared_return($selected_nav, "lembaran", "active"); ?>"><a href="<?= site_url('buku_umum/lembaran_desa/clear') ?>">Buku Lembaran Desa dan Berita Desa</a></li>-->
      <li class="<?php compared_return($selected_nav, "agenda", "active"); ?>"><a href="<?= site_url('web/tab/1000') ?>">Agenda Kampus</a></li>
      </ul>
    </div>
  </div>
<?php endif; ?>