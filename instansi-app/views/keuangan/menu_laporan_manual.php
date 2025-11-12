<div id="penduduk" class="card-info">
	<div class="card-header">
		<h3 class="card-title">Grafik Laporan Keuangan</h3>
		<div class="box-tools">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="card-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li <?php if ($_SESSION['submenu'] == "Grafik Keuangan"): ?>class="active"<?php endif; ?>><a href="<?= site_url('keuangan_manual/grafik_manual/grafik-RP-APBD-manual')?>">Grafik Pelaksanaan APBDes</a></li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
<div id="penduduk" class="card-info">
	<div class="card-header">
		<h3 class="card-title">Tabel Laporan (Belanja Per Bidang)</h3>
		<div class="box-tools">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="card-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li <?php if ($_SESSION['submenu'] == "Laporan Keuangan Akhir Bidang Manual"): ?>class="active"<?php endif; ?>><a href="<?=site_url("keuangan_manual/grafik_manual/rincian_realisasi_bidang_manual")?>">Laporan Pelaksanaan APBDes Manual</a></li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
