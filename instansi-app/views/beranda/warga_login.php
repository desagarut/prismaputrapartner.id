<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="card card-primary elevation-3">
    <div class="card-header">
        <h3 class="card-title text-sm">Klien Login</h3>
        <div class="card-tools">
            <?php if ($this->CI->cek_hak_akses('h')) : ?>
                <a href="<?= site_url('mandiri') ?>"><span class="label label-default text-sm"> Detail</span></a>
            <?php endif; ?>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($last_login as $key => $data) { ?>
                        <tr>
                            <td>
                                <a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>">
                                    <div class="d-inline-block align-middle">
                                        <?php if ($data['foto']) : ?>
                                            <img src="<?= AmbilFoto($data['foto']) ?>" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                        <?php else : ?>
                                            <img src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                        <?php endif; ?>
                                        <div class="d-inline-block">
                                            <h6><?= $data['nama'] ?></h6>
                                            <p class="text-muted m-b-0"> <?= $data['nik'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="text-left"><label class="badge badge-light-danger"><?= $data['dusun'] ?></label></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>