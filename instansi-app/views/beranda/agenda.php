<!-- ======= Artikel ======= -->

<div class="card card-primary elevation-3">
    <div class="card-header">
        <h3 class="card-title text-sm">Agenda</h3>
        <div class="card-tools">
            <?php if ($this->CI->cek_hak_akses('h')) : ?>
                <a href="<?= site_url('man_user') ?>"><span class="label label-default text-sm"> Detail</span></a>
            <?php endif; ?>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($artikel as $data) : ?>
            <?php if ($data['gambar']) : ?>
                <ul class="products-list product-list-in-box">
                    <li class="item">
                        <div class="product-img">
                            <?php if ($data['gambar']) : ?>
                                <img style="width:100%;height:50px" src="<?= AmbilFotoArtikel($data['gambar'], 'kecil') ?>" alt="<?= $data['nama'] ?>">
                            <?php else : ?>
                                <img style="width:100%;height:50px" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="<?= $data['nama'] ?>" style="width:40px">
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <?php if ($this->CI->cek_hak_akses('u')) : ?>
                                <a href="<?= site_url("web/form/$data[id]") ?>" class="product-title" alt="<?= $data['judul'] ?>"><?= $data['judul'] ?>
                                </a>
                            <?php else : ?>
                                <?= $data['judul'] ?>
                            <?php endif; ?>
                            <span class="product-description">
                                <?= $data['tgl_upload'] ?> | <?= $data['owner'] ?>
                            </span>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="card-footer text-center">
        <a href="<?= site_url("web") ?>" class="uppercase">Semua Agenda</a>
    </div>
</div>