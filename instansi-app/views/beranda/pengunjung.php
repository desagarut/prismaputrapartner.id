<!-- Pengaturan Grafik (Graph) Data Statistik-->
<script type="text/javascript">
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart',
				defaultSeriesType: 'column'
			},
			title: {
				text: ''
			},
			xAxis: {
				title: {
					text: '<?= ucwords($main['lblx']) ?>'
				},
				categories: [
					<?php foreach ($main['pengunjung'] as $data): ?>['<?= ($main['lblx'] == 'Bulan') ? getBulan($data['Tanggal']) . " " . date('Y') : tgl_indo2($data['Tanggal']); ?>', ],
					<?php endforeach; ?>
				]
			},
			yAxis: {
				title: {
					text: 'Pengunjung (Orang)'
				}
			},
			legend: {
				layout: 'vertical',
				enabled: false
			},
			plotOptions: {
				series: {
					colorByPoint: true
				},
				column: {
					pointPadding: 0,
					borderWidth: 0
				}
			},
			series: [{
				shadow: 1,
				border: 1,
				data: [
					<?php foreach ($main['pengunjung'] as $data): ?>['<?= ($main['lblx'] == 'Tanggal') ? getBulan($data['Tanggal']) . " " . date('Y') : tgl_indo2($data['Tanggal']); ?>', <?= $data['Jumlah'] ?>],
					<?php endforeach; ?>
				]
			}]
		});
	});
</script>

<!-- Highcharts -->
<script src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
<script src="<?= base_url() ?>assets/js/highcharts/highcharts-more.js"></script>

<div class="card card-primary elevation-3">
	<div class="card-header">
		<h3 class="card-title text-sm">Pengunjung Web </h3>
		<div class="card-tools">
			<?php if ($this->CI->cek_hak_akses('h')): ?>
				<a href="<?= site_url("pengunjung") ?>"><span class="label label-default text-sm"> Detail</span></a>
			<?php endif; ?>
			<button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
			<button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
		</div>
	</div>
	<div class="card-body">
		<div class="card-group" id="accordion">
			<div class="col-md-12">
				<!-- Ini Grafik -->
				<br>
				<div id="chart" style="height:250px"> </div>
			</div>
		</div>
	</div>
</div>