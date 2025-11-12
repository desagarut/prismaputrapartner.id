<div class="col-md-4 sidebar">

    <div class="sidebar-box">
        <div class="row">
            <h3 class="text-right">Artikel Lainnya</h3>
            <?php foreach (array('acak' => 'arsip_acak') as $jenis_arsip) : ?>


                <div class="categories">
                    <?php foreach ($$jenis_arsip as $arsip) : ?>
                        <li>
                            <div class="row">
                                <div class="col-md-5">
                                    <?php if (is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar])) : ?>
                                        <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><img width="100%" class="img-responsive img-rounded" src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar]) ?>" /></a>
                                    <?php else : ?>
                                        <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><img class="img-responsive img-rounded" src="<?= base_url() ?>themes/lawmaker/assets/images/blog-1.jpg"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-7">
                                    <span>
                                        <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><?= $arsip['judul'] ?></a>
                                    </span>
                                    <small><?= $data['deskripsi'] ?><br /><?= tgl_indo($arsip['tgl_upload']); ?></small>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <div class="sidebar-box">
        <div class="row">
            <?php $nama = potong_teks($data['deskripsi'], 10); ?>

            <h3 class="text-right">Video Youtube</h3>

            <?php foreach ($gallery_youtube as $data) : ?>
                <?php if ($data['link']) : ?>
                    <div class="categories">
                        <li>
                            <div class="row">
                                <div class="col-md-5">
                                    <iframe height="100px" width="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $data["link"]; ?>" title="<?= $data['nama'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-7">
                                    <span>
                                        <a href="<?= site_url("first/sub_gallery_youtube/{$data['id']}") ?>"><?= $data['nama'] ?></a>
                                    </span>
                                    <small><?= $data['deskripsi'] ?><br /><?= $data['tgl_upload'] ?></small>
                                </div>
                            </div>
                        </li>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <!--
    <div class="sidebar-box">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <div class="sidebar-box">
        <div class="categories">
            <h3>Categories</h3>
            <li><a href="#">Creatives <span>(12)</span></a></li>
            <li><a href="#">News <span>(22)</span></a></li>
            <li><a href="#">Design <span>(37)</span></a></li>
            <li><a href="#">HTML <span>(42)</span></a></li>
            <li><a href="#">Web Development <span>(14)</span></a></li>
        </div>
    </div>
    <div class="sidebar-box">
        <p><img src="images/user-1.jpg" alt="Image" class="img-responsive"></p>
        <h3 class="text-black">About The Author</h3>
        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
        <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
    </div>

    <div class="sidebar-box">
        <h3 class="text-black">Paragraph</h3>
        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
    </div>
                                    -->
</div>