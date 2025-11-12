<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * File ini:
 * Neo SIDEGA
 * 
 * 
 * <div class="card-footer clearfix">
 *               <ul class="pagination pagination-sm m-0 float-right">
 *               <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
 *                  <li class="page-item"><a class="page-link" href="#">1</a></li>
 *                 <li class="page-item"><a class="page-link" href="#">2</a></li>
 *                <li class="page-item"><a class="page-link" href="#">3</a></li>
 *               <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
 *            </ul>
 *         </div>
 **/
?>

<div class="card-footer clearfix">
	<ul class="pagination pagination-sm m-0 float-right">
		<?php if ($paging->start_link) : ?>
			<li class="page-item" <?= jecho($paging->page, 1, "class='disabled'"); ?>>
				<a class="page-link" href="<?= site_url("$this->controller/$func/1/$o");
											jecho($paging->page . '!', 1, "#"); ?>" aria-label="First"><span aria-hidden="true">Awal</span></a>
			</li>
		<?php endif; ?>
		<?php if ($paging->prev) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= site_url("$this->controller/$func/$paging->prev/$o"); ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
			</li>
		<?php endif; ?>
		<?php for ($i = $paging->start_link; $i <= $paging->end_link; $i++) : ?>
			<li <?= jecho($paging->page, $i, "class='page-item active'"); ?>>
				<a class="page-link" href="<?= ($i == 1) ? site_url("$this->controller/$func") : site_url("$this->controller/$func/$i/$o"); ?>"><?= $i; ?></a>
			</li>
		<?php endfor; ?>
		<?php if ($paging->next) : ?>
			<li class="page-item">
				<a class="page-link" href="<?= site_url("$this->controller/$func/$paging->next/$o"); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
			</li>
		<?php endif; ?>
		<?php if ($paging->end) : ?>
			<li class="page-item" <?= jecho($paging->page . '!', $paging->end, "class='disabled'"); ?>>
				<a class="page-link" href="<?= site_url("$this->controller/$func/$paging->end/$o");
											jecho($paging->page, $paging->end_link, "#"); ?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a>
			</li>
		<?php endif; ?>
	</ul>
</div>