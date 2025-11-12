<nav class="ftco-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="ftco-logo"><a href="<?= site_url('') ?>">
                            <img src="<?= gambar_institusi($desa['logo']) ?>" style="padding-bottom: 5px; width:30px;" alt="<?= ucfirst($this->setting->sebutan_desa) . ' ' . ucwords($desa['nama_desa']) ?>">
                            <?= ucwords($desa['nama_instansi']) ?></a>
                    </div>
                </div>
                <div class="col-md-7 text-right menu-1">
                    <ul>
                    <li><a href="<?= site_url('') ?>">Beranda</a></li>
                        <?php if (menu_atas) : ?>
                            <?php foreach ($menu_atas as $menu) : ?>
                                <li class="has-dropdown">
                                    <a href="<?= $menu['link'] ?>" class="active"><?= $menu['nama'] ?></a>
                                    <?php if (count($menu['submenu']) > 0) : ?>
                                        <ul class="dropdown">
                                            <?php foreach ($menu['submenu'] as $submenu) : ?>
                                                <li><a href="<?= $submenu['link'] ?>"><?= $submenu['nama'] ?></a></li>
                                            <?php endforeach ?>
                                        </ul>
                                    <?php endif ?>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                        <li class="has-dropdown">
                            <a href="<?= site_url('insidega') ?>">Login</a>
                            <ul class="dropdown">
                                <li><a href="<?= site_url('insidega') ?>">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>