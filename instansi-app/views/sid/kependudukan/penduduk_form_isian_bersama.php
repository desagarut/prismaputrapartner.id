<script type="text/javascript">
	$(document).ready(function() {
		$("select[name='sex']").change();
		$("select[name='status_kawin']").change();
		$("select[name='id_asuransi']").change();
	});
	$('#mainform').on('reset', function(e) {
		setTimeout(function() {
			$("select[name='sex']").change();
			$("select[name='status_kawin']").change();
			$("select[name='id_asuransi']").change();
		});
	});

	function show_hide_hamil(sex) {
		if (sex == '2') {
			$("#isian_hamil").show();
		} else {
			$("#isian_hamil").hide();
		}
	};

	function reset_hamil() {
		setTimeout(function() {
			$('select[name=sex]').change();
		});
	};

	function show_hide_asuransi(asuransi) {
		if (asuransi == '1' || asuransi == '') {
			$('#asuransi_pilihan').hide();
		} else {
			if (asuransi == '99') {
				$('#label-no-asuransi').text('Nama/nomor Asuransi');
			} else {
				$('#label-no-asuransi').text('No Asuransi');
			}

			$('#asuransi_pilihan').show();
		}
	}

	function disable_kawin_cerai(status) {
		// Status 1 = belum kawin, 2 = kawin, 3 = cerai hidup, 4 = cerai mati
		switch (status) {
			case '1':
			case '4':
				$("#akta_perkawinan").attr('disabled', true);
				$("input[name=tanggalperkawinan]").attr('disabled', true);
				$("#akta_perceraian").attr('disabled', true);
				$("input[name=tanggalperceraian]").attr('disabled', true);
				break;
			case '2':
				$("#akta_perkawinan").attr('disabled', false);
				$("input[name=tanggalperkawinan]").attr('disabled', false);
				$("#akta_perceraian").attr('disabled', true);
				$("input[name=tanggalperceraian]").attr('disabled', true);
				break;
			case '3':
				$("#akta_perkawinan").attr('disabled', true);
				$("input[name=tanggalperkawinan]").attr('disabled', true);
				$("#akta_perceraian").attr('disabled', false);
				$("input[name=tanggalperceraian]").attr('disabled', false);
				break;
		}
	}

	function ubah_provinsi(provinsi) {
		$('#isi_kecamatan').hide();
		$('#isi_desa').hide();
		$('#isi_rw').hide();
		$('#isi_rt').hide();
		var kabkota = $('#kabkota');
		select_options(kabkota, urlencode(provinsi));
	}

	function ubah_kabkota(provinsi, kabkota) {
		$('#isi_kecamatan').show();
		$('#isi_desa').hide();
		$('#isi_rw').hide();
		$('#isi_rt').hide();
		var kecamatan = $('#kecamatan');
		select_options(kecamatan, urlencode(provinsi) + '/' + urlencode(kabkota));
	}

	function ubah_kecamatan(provinsi, kabkota, kecamatan) {
		$('#isi_desa').show();
		$('#isi_rw').hide();
		$('#isi_rt').hide();
		var desa = $('#desa');
		select_options(desa, urlencode(provinsi) + '/' + urlencode(kabkota) + '/' + urlencode(kecamatan));
	}

	function ubah_desa(provinsi, kabkota, kecamatan, desa) {
		$('#isi_rw').show();
		$('#isi_rt').hide();
		var rw = $('#rw');
		select_options(rw, urlencode(provinsi) + '/' + urlencode(kabkota) + '/' + urlencode(kecamatan) + '/' + urlencode(desa));
	}

	function ubah_rw(provinsi, kabkota, kecamatan, desa, rw) {
		$('#isi_rt').show();
		var rt = $('#id_cluster');
		select_options(rt, urlencode(provinsi) + '/' + urlencode(kabkota) + '/' + urlencode(kecamatan) + '/' + urlencode(desa) + '/' + urlencode(rw));
	}
</script>

<div class="row">
	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="nik">NIK </label>
			<input id="nik" name="nik" class="form-control form-control-sm  input-sm required nik" type="text" placeholder="Nomor NIK" value="<?= $penduduk['nik'] ?>"></input>
			<input name="nik_lama" type="hidden" value="<?= $_SESSION['nik_lama'] ?>" />
		</div>
	</div>
	<div class='col-sm-8'>
		<div class='form-group'>
			<label for="nama">Nama Lengkap <code> (Tanpa Gelar) </code> </label>
			<input id="nama" name="nama" class="form-control form-control-sm  input-sm required nama" maxlength="100" type="text" placeholder="Nama Lengkap" value="<?= strtoupper($penduduk['nama']) ?>"></input>
		</div>
	</div>

	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="sex">Jenis Kelamin </label>
			<select class="form-control form-control-sm input-sm required" name="sex" onchange="show_hide_hamil($(this).find(':selected').val());">
				<option value="">Jenis Kelamin</option>
				<option value="1" <?php selected($penduduk['id_sex'], '1'); ?>>Laki-Laki</option>
				<option value="2" <?php selected($penduduk['id_sex'], '2'); ?>>Perempuan</option>
			</select>
		</div>
	</div>
	<div class='col-sm-7'>
		<div class='form-group'>
			<label for="agama_id">Agama</label>
			<select class="form-control form-control-sm input-sm required" name="agama_id">
				<option value="">Pilih Agama</option>
				<?php foreach ($agama as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['agama_id'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class='col-sm-5'>
		<div class='form-group'>
			<label for="status">Status Penduduk </label>
			<select class="form-control form-control-sm input-sm required" name="status" <?php ($penduduk['no_kk']) and print('disabled') ?>>
				<option value="">Pilih Status Penduduk</option>
				<?php foreach ($status_penduduk as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['id_status'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class='col-sm-12'>
		<div class="form-group subtitle_head">
			<label class="text-right"><strong>DATA KELAHIRAN :</strong></label>
		</div>
	</div>
	<div class='col-sm-6'>
		<div class='form-group'>
			<label for="tempatlahir">Tempat Lahir</label>
			<input id="tempatlahir" name="tempatlahir" class="form-control form-control-sm  input-sm required" maxlength="100" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($penduduk['tempatlahir']) ?>"></input>
		</div>
	</div>
	<!--
	<div class="col-sm-4">
		<div class="form-group">
			<label for="tanggallahir">Tanggal Lahir</label>
			<div class="col-sm-6">
				<input class="form-control form-control-sm pengurus_terdata" type="text" placeholder="Tanggal Lahir" value="<?= strtoupper($penduduk['tanggallahir']) ?>" disabled="disabled">
				</input>
				<div class="input-group date input-sm" id="tgl_1" data-target-input="nearest" style="display: none;">
					<input type="text" class="form-control datetimepicker-input tgl_1" data-target="#tanggallahir" name="tanggallahir" value="<?= $penduduk['tanggallahir'] ?>" />
					<div class="input-group-append" data-target="#tanggallahir" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
				-->
	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="tanggallahir">Tanggal Lahir</label>
			<div class="input-group input-group-sm date">
				<div class="input-group-addon" id="tgl_1">
					<i class="fa fa-calendar"></i>
				</div>
				<input class="form-control form-control-sm  input-sm pull-right required" id="tgl_1" name="tanggallahir" type="text" value="<?= $penduduk['tanggallahir'] ?>">
			</div>
		</div>
	</div>
				
	<div class='col-sm-12'>
		<div class="form-group subtitle_head">
			<label class="text-right"><strong>PENDIDIKAN DAN PEKERJAAN :</strong></label>
		</div>
	</div>
	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="pendidikan_kk_id">Pendidikan Terakhir </label>
			<select class="form-control form-control-sm required" name="pendidikan_kk_id">
				<option value="">Pilih Pendidikan Terakhir </option>
				<?php foreach ($pendidikan_kk as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['pendidikan_kk_id'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="pekerjaan_id">Pekerjaaan</label>
			<select class="form-control form-control-sm  input-sm required" name="pekerjaan_id">
				<option value="">Pilih Pekerjaan</option>
				<?php foreach ($pekerjaan as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['pekerjaan_id'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class='col-sm-12'>
		<div class="form-group subtitle_head">
			<label class="text-right"><strong>DATA KEWARGANEGARAAN :</strong></label>
		</div>
	</div>
	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="warganegara_id">Status Warga Negara</label>
			<select class="form-control form-control-sm required select2" name="warganegara_id">
				<option value="">Pilih Warga Negara</option>
				<?php foreach ($warganegara as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['warganegara_id'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class='col-sm-8'>
		<div class='form-group'>
			<label for="dokumen_pasport">Nomor Paspor </label>
			<input id="dokumen_pasport" name="dokumen_pasport" class="form-control form-control-sm  input-sm nomor_sk" maxlength="45" type="text" placeholder="Nomor Paspor" value="<?= strtoupper($penduduk['dokumen_pasport']) ?>"></input>
		</div>
	</div>
	<div class='col-sm-12'>
		<div class="form-group subtitle_head">
			<label class="text-right"><strong>ALAMAT :</strong></label>
		</div>
	</div>
	<?php if (!empty($penduduk['no_kk']) or $kk_baru) : ?>
		<div class='col-sm-12'>
			<div class='form-group'>
				<label for="telepon">Alamat KK </label>
				<input id="alamat" name="alamat" class="form-control form-control-sm  input-sm" maxlength="200" ype="text" placeholder="Alamat di Kartu Keluarga" size="20" value="<?= $penduduk['alamat'] ?>"></input>
			</div>
		</div>
	<?php endif; ?>
	<?php if (empty($id_kk)) : ?>
		<div class='col-sm-12'>

			<div class="row">
				<div class='form-group col-md-6'>
					<label>Provinsi</label>
					<select name="provinsi" class="form-control form-control-sm required select2" onchange="ubah_provinsi($(this).val())" style="width: 100%">
						<option value="">Pilih Provinsi</option>
						<?php foreach ($provinsi as $data) : ?>
							<option value="<?= $data['provinsi'] ?>" <?php selected($penduduk['provinsi'], $data['provinsi']) ?>><?= $data['provinsi'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class='form-group col-sm-6'>
					<label>Kabupaten/Kota <?php (empty($penduduk['no_kk']) and empty($kk_baru)) or print('KK') ?></label>
					<select id="kabkota" class="form-control form-control-sm select2" name="kabkota" data-source="<?= site_url() ?>wilayah/list_kabkota/" data-valueKey="kabkota" data-displayKey="kabkota" onchange="ubah_kabkota($('select[name=provinsi]').val(), $(this).val())">
						<option class="placeholder" value="">Pilih Kab/Kota</option>
						<?php foreach ($kabkota as $data) : ?>
							<option value="<?= $data['kabkota'] ?>" <?php selected($penduduk['kabkota'], $data['kabkota']) ?>><?= $data['kabkota'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div id='isi_kecamatan' class='form-group col-sm-6'>
					<label>Kecamatan <?php (empty($penduduk['no_kk']) and empty($kk_baru)) or print('KK') ?></label>
					<select id="kecamatan" class="form-control form-control-sm select2" name="kecamatan" data-source="<?= site_url() ?>wilayah/list_kecamatan/" data-valueKey="kecamatan" data-displayKey="kecamatan" onchange="ubah_kecamatan($('select[name=kabkota]').val(), $(this).val())">
						<option class="placeholder" value="">Pilih Kecamatan</option>
						<?php foreach ($kecamatan as $data) : ?>
							<option value="<?= $data['kecamatan'] ?>" <?php selected($penduduk['kecamatan'], $data['kecamatan']) ?>><?= $data['kecamatan'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div id='isi_desa' class='form-group col-sm-6'>
					<label>Desa / Kel <?php (empty($penduduk['no_kk']) and empty($kk_baru)) or print('KK') ?></label>
					<select id="desa" class="form-control form-control-sm select2" name="desa" data-source="<?= site_url() ?>wilayah/list_desa/" data-valueKey="desa" data-displayKey="desa" onchange="ubah_desa($('select[name=kecamatan]').val(), $(this).val())">
						<option class="placeholder" value="">Pilih Desa/Kelurahan</option>
						<?php foreach ($desa as $data) : ?>
							<option value="<?= $data['desa'] ?>" <?php selected($penduduk['desa'], $data['desa']) ?>><?= $data['desa'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div id='isi_rw' class='form-group col-sm-6'>
					<label>RW <?php (empty($penduduk['no_kk']) and empty($kk_baru)) or print('KK') ?></label>
					<select id="rw" class="form-control form-control-sm select2" name="rw" data-source="<?= site_url() ?>wilayah/list_rw/" data-valueKey="rw" data-displayKey="rw" onchange="ubah_rw($('select[name=dusun]').val(), $(this).val())">
						<option class="placeholder" value="">Pilih RW</option>
						<?php foreach ($rw as $data) : ?>
							<option value="<?= $data['rw'] ?>" <?php selected($penduduk['rw'], $data['rw']) ?>><?= $data['rw'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div id='isi_rt' class='form-group col-sm-6'>
					<label>RT <?php (empty($penduduk['no_kk']) and empty($kk_baru)) or print('KK') ?></label>
					<select id="id_cluster" class="form-control form-control-sm select2" name="id_cluster" data-source="<?= site_url() ?>wilayah/list_rt/" data-valueKey="id" data-displayKey="rt">
						<option class="placeholder" value="">Pilih RT </option>
						<?php foreach ($rt as $data) : ?>
							<option value="<?= $data['id'] ?>" <?php selected($penduduk['id_cluster'], $data['id']) ?>><?= $data['rt'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<br />
	<div class='col-sm-12'>
		<div class='form-group'>
			<label for="lokasi">Lokasi Tempat Tinggal </label>
			<div class="row">
				<div class='col-sm-12'>
					<a href="<?= site_url("penduduk/ajax_penduduk_maps/$p/$o/$penduduk[id]/1") ?>" title="Lokasi <?= $penduduk['nama'] ?>" class="btn btn-social btn-box bg-navy btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Lokasi Rumah"><i class='fa fa-map-marker'></i> Cari Lokasi Tempat Tinggal</a>
				</div>
			</div>
		</div>
	</div>
	<div class='col-sm-12'>
		<div class='form-group'>
			<label for="telepon"> Nomor Telepon </label>
			<input id="telepon" name="telepon" class="form-control form-control-sm" type="text" placeholder="Nomor Telepon" size="20" value="<?= $penduduk['telepon'] ?>"></input>
		</div>
	</div>
	<div class='col-sm-12'>
		<div class='form-group'>
			<label for="email"> Alamat Email </label>
			<input id="email" name="email" class="form-control form-control-sm  input-sm email" maxlength="50" placeholder="Alamat Email" size="20" value="<?= $penduduk['email'] ?>"></input>
		</div>
	</div>
	<div class='col-sm-12'>
		<div class='form-group'>
			<label for="alamat_sebelumnya">Alamat Sebelumnya </label>
			<input id="alamat_sebelumnya" name="alamat_sebelumnya" class="form-control form-control-sm  input-sm" maxlength="200" type="text" placeholder="Alamat Sebelumnya" value="<?= strtoupper($penduduk['alamat_sebelumnya']) ?>"></input>
		</div>
	</div>
	<?php if (!$penduduk['no_kk'] and !$kk_baru) : ?>
		<div class='col-sm-12'>
			<div class='form-group'>
				<label for="alamat_sekarang">Alamat Sekarang </label>
				<input id="alamat_sekarang" name="alamat_sekarang" class="form-control form-control-sm  input-sm" maxlength="200" type="text" placeholder="Alamat Sekarang" value="<?= strtoupper($penduduk['alamat_sekarang']) ?>"></input>
			</div>
		</div>
	<?php endif; ?>
	<div class='col-sm-12'>
		<div class="form-group subtitle_head">
			<label class="text-right"><strong>STATUS PERKAWINAN :</strong></label>
		</div>
	</div>
	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="status_kawin">Status Perkawinan</label>
			<select class="form-control form-control-sm  input-sm required" name="status_kawin" onchange="disable_kawin_cerai($(this).find(':selected').val())">
				<option value="">Pilih Status Perkawinan</option>
				<?php foreach ($kawin as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['status_kawin'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<div class='col-sm-4'>
		<div class='form-group'>
			<label for="id_asuransi">Asuransi </label>
			<select class="form-control form-control-sm  input-sm" name="id_asuransi" onchange="show_hide_asuransi($(this).find(':selected').val());">
				<option value="">Pilih Asuransi</option>
				<?php foreach ($pilihan_asuransi as $data) : ?>
					<option value="<?= $data['id'] ?>" <?php selected($penduduk['id_asuransi'], $data['id']); ?>><?= strtoupper($data['nama']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div id='asuransi_pilihan' class='col-sm-4'>
		<div class='form-group'>
			<label id="label-no-asuransi" for="no_asuransi">No Asuransi </label>
			<input id="no_asuransi" name="no_asuransi" class="form-control form-control-sm  input-sm" type="text" maxlength="50" placeholder="Nomor Asuransi" value="<?= $penduduk['no_asuransi'] ?>"></input>
		</div>
	</div>
</div>

<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', {
			'placeholder': 'dd/mm/yyyy'
		})
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', {
			'placeholder': 'mm/dd/yyyy'
		})
		//Money Euro
		$('[data-mask]').inputmask()

		//Date picker
		$('#tanggallahir').datetimepicker({
			format: 'L'
		});

		//Date picker
		$('#pamong_tglsk').datetimepicker({
			format: 'L'
		});

		//Date picker
		$('#pamong_tglhenti').datetimepicker({
			format: 'L'
		});

		//Date and time picker
		$('#reservationdatetime').datetimepicker({
			icons: {
				time: 'far fa-clock'
			}
		});

		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
				format: 'MM/DD/YYYY hh:mm A'
			}
		})
		//Date range as a button
		$('#daterange-btn').daterangepicker({
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate: moment()
			},
			function(start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
			}
		)

		//Timepicker
		$('#timepicker').datetimepicker({
			format: 'LT'
		})

		//Bootstrap Duallistbox
		$('.duallistbox').bootstrapDualListbox()

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		$('.my-colorpicker2').on('colorpickerChange', function(event) {
			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
		})

		$("input[data-bootstrap-switch]").each(function() {
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		})

	})
	// BS-Stepper Init
	document.addEventListener('DOMContentLoaded', function() {
		window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	})

	// DropzoneJS Demo Code Start
	Dropzone.autoDiscover = false

	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template")
	previewNode.id = ""
	var previewTemplate = previewNode.parentNode.innerHTML
	previewNode.parentNode.removeChild(previewNode)

	var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
		url: "/target-url", // Set the url
		thumbnailWidth: 80,
		thumbnailHeight: 80,
		parallelUploads: 20,
		previewTemplate: previewTemplate,
		autoQueue: false, // Make sure the files aren't queued until manually added
		previewsContainer: "#previews", // Define the container to display the previews
		clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
	})

	myDropzone.on("addedfile", function(file) {
		// Hookup the start button
		file.previewElement.querySelector(".start").onclick = function() {
			myDropzone.enqueueFile(file)
		}
	})

	// Update the total progress bar
	myDropzone.on("totaluploadprogress", function(progress) {
		document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
	})

	myDropzone.on("sending", function(file) {
		// Show the total progress bar when upload starts
		document.querySelector("#total-progress").style.opacity = "1"
		// And disable the start button
		file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
	})

	// Hide the total progress bar when nothing's uploading anymore
	myDropzone.on("queuecomplete", function(progress) {
		document.querySelector("#total-progress").style.opacity = "0"
	})

	// Setup the buttons for all transfers
	// The "add files" button doesn't need to be setup because the config
	// `clickable` has already been specified.
	document.querySelector("#actions .start").onclick = function() {
		myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	}
	document.querySelector("#actions .cancel").onclick = function() {
		myDropzone.removeAllFiles(true)
	}
	// DropzoneJS Demo Code End
</script>