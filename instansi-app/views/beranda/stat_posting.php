<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-md-2">
    <a href="<?= site_url('web/clear') ?>" class="small-card-footer" title="Artikel">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-3"><i class="fas fa-envelope-open"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Artikel</span>
                <?php foreach ($artikel as $data) : ?>
                    <span class="info-box-number"><?= $data['jumlah'] ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </a>
</div>
<div class="col-md-2">
    <a href="<?= site_url('sid_core') ?>" title="Galeri Foto">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-purple elevation-3"><i class="fas fa-camera"></i></span>
            <div class="info-box-content">
                <?php foreach ($pegawai as $data) : ?>
                    <span class="info-box-text">Foto</span>
                    <span class="info-box-number"><?= $data['jumlah'] ?> <small></small></span>
                <?php endforeach; ?>
            </div>
        </div>
    </a>
</div>
<div class="col-md-2">
    <a href="<?= site_url('penduduk/clear') ?>" title="Galeri Video">
        <div class="info-box  mb-3">
            <span class="info-box-icon bg-maroon elevation-3"><i class="fas fa-play"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Video</span>
                <?php foreach ($penduduk as $data) : ?>
                    <span class="info-box-number">
                        <?= $data['jumlah'] ?>
                        <small></small>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </a>
</div>
