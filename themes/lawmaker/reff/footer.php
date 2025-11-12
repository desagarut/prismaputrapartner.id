<footer id="ftco-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-3 ftco-widget">
                <h4>Tentang Kami</h4>
                <p><?= $desa['profil_singkat']; ?></p>
            </div>
            <div class="col-md-3 col-md-push-1">
                <h4>Navigation</h4>
                <?php $this->load->view($folder_themes . '/partials/statistik_pengunjung') ?>
<!--
                <ul class="ftco-footer-links">
                    <li><a href="<?= site_url('') ?>">Home</a></li>
                    <li><a href="<?= site_url('') ?>">Bidang Praktik</a></li>
                    <li><a href="<?= site_url('') ?>">Won Cases</a></li>
                    <li><a href="<?= site_url('first/arsip') ?>">Blog</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="<?= site_url('insidega') ?>">Login</a></li>
                </ul>
-->
            </div>

            <div class="col-md-3 col-md-push-1">
                <h4>Kontak</h4>
                <ul class="ftco-footer-links">
                    <li><?= $desa['alamat_instansi']; ?> Kode Pos <?= $desa['kode_pos']; ?></li>
                    <li><a href="tel://<?= $desa['telepon_instansi']; ?>"><?= $desa['telepon_instansi']; ?></a></li>
                    <li><a href="mailto:<?= $desa['email_instansi']; ?>"><?= $desa['email_instansi']; ?></a></li>
                </ul>
            </div>

            <div class="col-md-3 col-md-push-1">
                <h4>Opening Hours</h4>
                <ul class="ftco-footer-links">
                    <li>Mon - Thu: 9:00 - 21 00</li>
                    <li>Fri 8:00 - 21 00</li>
                    <li>Sat 9:30 - 15: 00</li>
                </ul>
            </div>

        </div>

        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Diberdayakan <i class="icon-heart text-danger" aria-hidden="true"></i> oleh <a href="#" target="_blank"><?= $this->setting->website_title ?></a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <p>
                <ul class="ftco-social-icons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
                </p>
            </div>
        </div>

    </div>
</footer>