<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
$pages = array();
for ($i = $paging->start_link; $i <= $paging->end_link; $i++) {
	array_push($pages, $i);
}
?>

<div class="row pull-right">
	<div class="col-md-12 pagination ">
		<?php if ((int) $paging->end_link > 1) : ?>
			<div class="navbar-nav">
				<?php if ($paging->start_link) : ?>
					<a href="<?= site_url('first/' . $paging_page . '/' . $paging->start_link) ?>" class="disabled caption">Pref</a>
				<?php endif ?>
				<?php if ($paging->prev) : ?>
					<a href="<?= site_url('first/' . $paging_page . '/' . $paging->prev . $paging->suffix) ?>" class="disabled"><</a>
				<?php endif ?>
				<?php foreach ($pages as $page) : ?>
					<a href="<?= site_url('first/' . $paging_page . '/' . $page . $paging->suffix) ?>" class="active"><?= $page ?></a>
				<?php endforeach ?>
				<?php if ($paging->next) : ?>
					<a href="<?= site_url('first/' . $paging_page . '/' . $paging->next . $paging->suffix) ?>" class="disabled caption">></a>
				<?php endif ?>
				<?php if ($paging->end_link) : ?>
					<a href="<?= site_url('first/' . $paging_page . '/' . $paging->end_link) ?>" class="disabled caption">Next</a>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
</div>