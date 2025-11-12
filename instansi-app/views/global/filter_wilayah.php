<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
 * Neo SIDeGa
 */
?>
<div class="col-md-2">
	<select class="form-control form-control-sm" id="list_provinsi" name="provinsi" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/provinsi"); ?>')">
		<option value="">Pilih Provinsi</option>
		<?php foreach ($list_provinsi as $data): ?>
			<option value="<?= $data['provinsi']; ?>" <?= selected($provinsi, $data['provinsi']); ?>><?= set_ucwords($data['provinsi']); ?></option>
		<?php endforeach; ?>
	</select>
</div>
<div class="col-md-2">
	<?php if ($provinsi): ?>
		<select class="form-control form-control-sm" id="list_kabkota" name="kabkota" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/kabkota"); ?>')">
			<option value="">Pilih Kab/Kota</option>
			<?php foreach ($list_kabkota as $data): ?>
				<option value="<?= $data['kabkota']; ?>" <?= selected($kabkota, $data['kabkota']); ?>><?= set_ucwords($data['kabkota']); ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif; ?>
</div>

<div class="col-md-2">
	<?php if ($kabkota): ?>
		<select class="form-control form-control-sm" id="list_kecamatan" name="kecamatan" onchange="formAction('<?= $form; ?>','<?= site_url("{$this->controller}/filter/kecamatan"); ?>')">
			<option value="">Pilih Kecamatan</option>
			<?php foreach ($list_kecamatan as $data): ?>
				<option value="<?= $data['kecamatan']; ?>" <?= selected($kecamatan, $data['kecamatan']); ?>><?= set_ucwords($data['kecamatan']); ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif; ?>
</div>
