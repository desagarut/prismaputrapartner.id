<h5><b>Detail Area Praktik</b></h5>
<div class="row">
	<table class="table table-responsive table-bordered table-striped table-hover tabel-rincian">
		<tbody>
			<tr>
				<td width="20%">Nama Program</td>
				<td width="1">:</td>
				<td><?= strtoupper($detail["nama"]); ?></td>
			</tr>
			<tr>
				<td>Sasaran Peserta</td>
				<td> : </td>
				<td><?= $bidang_hukum[$detail["bidang_hukum"]]?></td>
			</tr>
			<tr>
				<td>Masa Berlaku</td>
				<td> : </td>
				<td><?= fTampilTgl($detail["sdate"],$detail["edate"])?></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td> : </td>
				<td><?= $detail["ndesc"]?></td>
			</tr>
		</tbody>
	</table>
</div>
<br>
