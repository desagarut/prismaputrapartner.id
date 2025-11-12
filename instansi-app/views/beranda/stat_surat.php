<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-md-2">
    <a href="<?= site_url('surat_masuk') ?>" class="small-card-footer" title="Surat Masuk">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-3"><i class="fas fa-envelope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Surat Masuk</span>
                <?php foreach ($surat_masuk as $data) : ?>
                    <span class="info-box-number"><?= $data['jumlah'] ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </a>
</div>
<div class="col-md-2">
    <a href="<?= site_url('surat_keluar') ?>" class="small-card-footer" title="Surat Keluar">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-3"><i class="fas fa-envelope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Surat Keluar</span>
                <?php foreach ($surat_keluar as $data) : ?>
                    <span class="info-box-number"><?= $data['jumlah'] ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </a>
</div>
<div class="col-md-2">
    <a href="<?= site_url('surat') ?>" class="small-card-footer" title="Buat Surat">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-3"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Buat Surat</span>
                <?php foreach ($log_surat as $data) : ?>
                    <span class="info-box-number"><small>Tercetak </small><?= $data['jumlah'] ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </a>
</div>
