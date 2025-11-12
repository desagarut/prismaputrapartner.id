<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="ftco-about">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center ftco-heading">
                <h2>Our Team</h2>
                <p>Sebagai sebuah firma, kami percaya pada kolaborasi. Untuk menyelesaikan masalah klien kami yang paling mendesak dan untuk memberikan peluang terbaik bagi mereka, kami berkolaborasi dengan mitra aliansi dan menawarkan kelompok kerja kami untuk menyediakan layanan lintas batas yang lancar bagi klien kami.</p>
            </div>
        </div>
        <div class="row">
        <?php foreach ($aparatur_desa['daftar_perangkat'] as $data) : ?>
            <div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                <div class="ftco-staff">
                    <img src="<?= $data['foto'] ?>" alt="<?= $data['nama'] ?>">
                    <h3><?= strtoupper($data['nama']) ?></h3>
                    <strong class="role"><?= strtoupper($data['jabatan']) ?></strong>
                    <p>.</p>
                    <ul class="ftco-social-icons">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>