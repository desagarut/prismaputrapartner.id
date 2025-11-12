<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="ftco-blog">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center ftco-heading">
                <h2>Blog Artikel</h2>
            </div>
        </div>
        <div class="row">
            <?php if ($artikel) : ?>
                <?php foreach ($artikel as $article) : ?>
                    <?php $data['article'] = $article ?>
                    <?php $url = site_url('artikel/' . buat_slug($article)) ?>
                    <?php $abstract = potong_teks(strip_tags($article['isi']), 200) ?>
                    <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) ?
                        AmbilFotoArtikel($article['gambar'], 'sedang') :
                        base_url($this->theme_folder . '/' . $this->theme . '/assets/img/placeholder.png');
                    ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="blog-featured animate-box">
                            <?php if ($article['gambar']) : ?>
                                <a href="<?= site_url('artikel/' . buat_slug($article)) ?>"><img class="img-responsive img-rounded" src="<?= AmbilFotoArtikel($article['gambar' . $i], 'sedang') ?>" alt="<?= $article['judul'] ?>"></a>
                            <?php else : ?>
                                <a href="<?= site_url('artikel/' . buat_slug($article)) ?>"><img class="img-responsive img-rounded" src="<?= base_url() ?>themes/lawmaker/assets/images/blog-1.jpg"></a>
                            <?php endif ?>
                            <h2><a href="<?= site_url('artikel/' . buat_slug($article)) ?>"><?= $article['judul'] ?></a></h2>
                            <p class="meta"><span><?= tgl_indo($article['tgl_upload']) ?></span> | <span><?= $article['owner'] ?></span> | <span>dibaca <?= $article['hit'] ?></span></p>
                            <p><?= potong_teks($article['isi'], 100) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="container">
        <?php //$this->load->view($folder_themes . '/reff/paging') ?>
        </div>
    </div>
</div>