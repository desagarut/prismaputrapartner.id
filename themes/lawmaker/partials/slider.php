<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<aside id="ftco-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
			<?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
				<?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
				<li style="background-image: url(<?php echo base_url() . $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar'] ?>)">
					<div class="overlay-gradient"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
								<div class="slider-text-inner">
									<h1><strong><?= $gambar['judul'] ?></strong></h1>
									<h2><?= $gambar['hit'] ?> <a href="#" target="_blank"><?= tgl_indo($gambar['tgl_upload']) ?></a> <?= $gambar['hri'] ?> <?= bulan($gambar['bln']) ?> <?= $gambar['thn'] ?></h2>
									<p><a class="btn btn-primary btn-lg btn-learn" href="<?= 'artikel/' . buat_slug($gambar); ?>" target="_blank">Selengkapnya</a></p>
								</div>
							</div>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>