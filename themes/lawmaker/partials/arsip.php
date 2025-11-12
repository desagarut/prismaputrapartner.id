<aside id="ftco-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(<?= base_url() ?>themes/lawmaker/assets/images/hero_3.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <h1><strong>Artikel</strong></h1>
                                <h2>Kumpulan <a href="#" target="_blank">Opini</a> dan artikel</h2>
                                <p><a class="btn btn-primary btn-lg btn-learn" href="#" target="_blank">Colorlib</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="ftco-blog">
    <div class="container">
        <div class="row">
            <?php if (count($farsip) > 0) : ?>
                <?php foreach ($farsip as $data) : ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-featured blog-entry animate-box">
                            <?php if ($data['gambar']) : ?>
                                <a href="<?= site_url('artikel/' . buat_slug($data)) ?>"><img class="img-responsive img-rounded" src="<?= AmbilFotoArtikel($data['gambar' . $i], 'sedang') ?>" alt="<?= $data['judul'] ?>"></a>
                            <?php else : ?>
                                <a href="<?= site_url('artikel/' . buat_slug($data)) ?>"><img class="img-responsive img-rounded" src="<?= base_url() ?>themes/lawmaker/assets/images/blog-1.jpg"></a>
                            <?php endif; ?>
                            <h2><a href="<?= site_url('artikel/' . buat_slug($data)) ?>"><?= $data['judul'] ?></a></h2>
                            <p class="meta"><span><?= tgl_indo($data['tgl_upload']) ?></span> | <span><?= $data['owner'] ?></span> | <span>dilihat <?= $data['hit'] ?> kali</span> </p>
                            <p><?= potong_teks($data['isi'], 150) ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php $this->load->view($folder_themes . '/reff/paging') ?>

    </div>
</div>