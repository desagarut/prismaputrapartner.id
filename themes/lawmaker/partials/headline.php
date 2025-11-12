<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $abstract = potong_teks($headline['isi'], 250); ?>
<?php $url = site_url('artikel/' . buat_slug($headline)); ?>
<?php $image = ($headline['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $headline['gambar'])) ?
    AmbilFotoArtikel($headline['gambar'], 'sedang') :
    base_url($this->theme_folder . '/' . $this->theme . '/assets/images/placeholder.png') ?>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <?php if ($headline['gambar']) : ?>
                <img src="<?= $image ?>" alt="<?= $headline['judul'] ?>" class="img-responsive img-rounded">
                <?php else : ?>
                    <a href="<?= site_url('artikel/' . buat_slug($data)) ?>"><img class="img-responsive img-rounded" src="<?= base_url() ?>themes/lawmaker/assets/images/blog-1.jpg"></a>
                    <?php endif; ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <h2><?= $headline['judul'] ?></h2>
                <p><?= $abstract ?></p>
                <p><a href="<?= $url ?>" class="btn btn-primary">Baca Selengkapnya</a></p>
            </div>
        </div>
    </div>
</div>