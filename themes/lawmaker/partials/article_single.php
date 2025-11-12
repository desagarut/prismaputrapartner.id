<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $article = $single_artikel ?>

<aside id="ftco-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <?php if ($article['gambar']) : ?>
                <li style="background-image: url(<?= AmbilFotoArtikel($article['gambar' . $i], 'sedang') ?>);">
                <?php else : ?>
                <li style="background-image: url(<?= base_url() ?>themes/lawmaker/assets/images/blog-1.jpg);">
                <?php endif ?>
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <h1><strong><?= $article['judul'] ?></strong></h1>
                                <h2><?= tgl_indo($article['tgl_upload']) ?> &bullet; by <?= $article['owner'] ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
        </ul>
    </div>
</aside>

<div id="ftco-blog">

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-content">
                    <!--<p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>-->
                    <p><?= $article['isi'] ?>
                        <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <?php endfor ?></p>

                    <?php if ($article['dokumen']) : ?>
                        <div> <strong>Dokumen Lampiran</strong> <a href="<?= base_url(LOKASI_DOKUMEN . $article['dokumen']) ?>" class="content__attachment__link" target="_blank"> <i class="fa fa-cloud-download content__attachment__icon"></i> <span>
                                    <?= $article['link_dokumen'] ?>
                                </span> </a>
                        </div>
                    <?php endif ?>
                    <!--
                    <blockquote>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                    </blockquote>

                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>

                    <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                        -->

                    <div class="pt-5">
                        <p>
                            <?php if ($article['kategori']) : ?>
                                Kategori: <a href="<?= site_url('first/kategori/' . $article['kat_slug']) ?>"><?= $article['kategori'] ?></a>,
                            <?php endif ?>
                            <a href="#">dibaca <?= hit($article['hit']) ?></a>
                            Tags: <a href="#">#html</a>, <a href="#">#trends</a>
                        </p>
                    </div>
                </div>
                <?php $this->load->view($folder_themes . '/partials/sidebar')
                ?>
            </div>
        </div>
    </div>
</div>