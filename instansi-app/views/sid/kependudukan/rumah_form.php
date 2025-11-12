<style type="text/css">
	#rumah_penduduk label {
		padding-left: 10px;
	}
</style>

<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script>
	$(document).ready(function() {
		$('#file_browser').click(function(e) {
			e.preventDefault();
			$('#file').click();
		});

		$('#file').change(function() {
			$('#file_path').val($(this).val());
		});

		$('#file_path').click(function() {
			$('#file_browser').click();
		});
	});
</script>
<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="card card-danger">
					<div class="card-body">
						<div class="form-group">
							<label for="nama">Nama Dokumentasi Kegiatan</label>
							<input id="nama" name="nama" class="form-control" type="text" placeholder="Nama Dokumentasi Kegiatan" value="<?= $rumah['nama'] ?>"></input> <input type="hidden" name="id_pend" value="<?= $penduduk['id'] ?>" />
						</div>
						<div class="form-group">
							<label for="file">Pilih File:</label>
							<div class="input-group input-group-sm">
								<input type="text" class="form-control" id="file_path" name="satuan">
								<input type="file" class="hidden" id="file" name="satuan">
								<input type="hidden" name="old_file" value="<?= $rumah['satuan'] ?>">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-box btn-sm" id="file_browser"><i class="fa fa-search"></i> Browse</button>
								</span>
							</div>
							<p class="help-block">Kosongkan jika tidak ingin mengubah dokumen.<br />
								Batas maksimal pengunggahan berkas <strong><?= max_upload() ?> MB.</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out-alt'></i> Tutup</button>
		<button type="submit" class="btn btn-box btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
	</div>
</form>