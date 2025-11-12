<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Lembar Disposisi</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="<?= base_url() ?>assets/css/report.css" rel="stylesheet" type="text/css">
	<?php if (is_file(LOKASI_LOGO_INSTANSI . "favicon.ico")) : ?>
		<link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_INSTANSI ?>favicon.ico" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
	<?php endif; ?>
	<style type="text/css">
		#disposisi td.judul {
			text-align: center;
			font-weight: bold;
			font-size: larger;
		}

		#disposisi th {
			text-align: left;
			font-style: normal;
			font-weight: normal;
			width: 1%;
			white-space: nowrap;
			padding-left: 5px;
			padding-right: 10px;
			background-color: inherit;
			border: 0px;
			text-transform: none;
		}

		table.border th.no-border {
			border: 0px !important;
		}

		table.border td.no-border {
			border: 0px !important;
		}

		table.border td.no-border-kanan {
			border-right: 0px !important;
		}

		table.border td.no-border-kiri {
			border-left: 0px !important;
		}

		td.nostretch {
			width: 1%;
			white-space: nowrap;
		}

		.header {
			border-bottom: 0px;
		}

		.kop {
			text-align: center;
			font-size: larger;
		}
	</style>
</head>

<body>
	<div id="container">
		<!-- Print Body -->
		<div id="body">
			<table width="100%">
				<tr>
					<td class="nostretch">
						<img src="<?= gambar_institusi($desa['logo']); ?>" alt="" width="80px" height="80px" class="logo">
					</td>
					<td>
						<div class="header">
							<h2 class="kop">SEKOLAH TINGGI HUKUM GARUT</h2>
							<h3 class="kop">( TERAKREDITASI B)</h3>
							<h5 class="kop">SK. BAN-PT No. 793/BAN-PT/Akred/S/III/2018</h5>
							<h5 class="kop">SK. BAN-PT No. 257/SK/BAN-PT/Akred/PT/XI/2018</h5>
							<h6 class="kop">Alamat : Jl. H. Hasan Arief No.2 Telp./Fax. (0262)236615</h6>
						</div>
					</td>
				</tr>
			</table><br/><br/>
			<table id="disposisi" class="border thick">
				<tbody>
					<tr>
						<td colspan="6" class="judul">LEMBAR DISPOSISI</td>
					</tr>
					<tr>
						<th class="no-border">Nomor Urut</th>
						<td class="no-border nostretch">:</td>
						<td colspan="4" class="no-border"><?= $surat['nomor_urut'] ?></td>
					</tr>
					<tr>
						<th class="no-border">Nomor & Tgl Surat</th>
						<td class="no-border nostretch">:</td>
						<td colspan="4" class="no-border"><?= $surat['nomor_surat'] . ', ' . tgl_indo($surat['tanggal_surat']) ?></td>
					</tr>
					<tr>
						<th class="no-border">Dari</th>
						<td class="no-border nostretch">:</td>
						<td colspan="4" class="no-border"><?= $surat['pengirim'] ?></td>
					</tr>
					<tr>
						<th class="no-border">Perihal</th>
						<td class="no-border nostretch">:</td>
						<td colspan="4" class="no-border"><?= $surat['isi_singkat'] ?></td>
					</tr>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="6" class="judul">DISPOSISI KEPADA</td>
					</tr>
					<tr>
						<td colspan="6">
							<table>
								<?php for ($i = 0; $i < count($ref_disposisi); $i += 2) : ?>
									<tr>
										<td class="nostretch no-border-kanan" style="vertical-align: text-top;">
											<?= $ref_disposisi[$i] ?>
										</td>
										<td class="no-border-kiri" style="vertical-align: text-top;">
											<input type="checkbox" style="zoom: 2; padding: 10px" disabled="disabled" <?php foreach ($disposisi_surat_masuk as $value) : ?> <?= selected($ref_disposisi[$i], $value['disposisi_ke'], true) ?> <?php endforeach ?> />
										</td>
										<td class="nostretch no-border-kanan" style="vertical-align: text-top;">
											<?php if ($ref_disposisi[$i + 1]) echo $ref_disposisi[$i + 1] ?>
										</td>
										<td class="no-border-kiri" style="vertical-align: text-top;">
											<input type="checkbox" style="zoom: 2; padding: 10px" disabled="disabled" <?php foreach ($disposisi_surat_masuk as $value) : ?> <?= selected($ref_disposisi[$i + 1], $value['disposisi_ke'], true) ?> <?php endforeach ?> />
										</td>
									</tr>
								<?php endfor; ?>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="6" height="100px;" style="vertical-align: text-top;">
							<span style="text-decoration: underline;">Isi Disposisi</span><br>
							<p style="margin: 5px 0 0 10px;">
								<?= $surat['isi_disposisi'] ?>
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<table>
				<col span="5" style="width: 8%">
				<col style="width: 28%">
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="1">&nbsp;</td>
					<td colspan="2">Mengetahui</td>
					<td colspan="2">&nbsp;</td>
					<td><?= ucwords($this->setting->sebutan_kabupaten) ?> <?= $desa['nama_kabupaten'] ?>, <?= tgl_indo(date("Y m d")) ?></td>
				</tr>
				<tr>
					<td colspan="1">&nbsp;</td>
					<td colspan="2"><?= $pamong_ketahui['jabatan'] ?> </td>
					<td colspan="2">&nbsp;</td>
					<td><?= $pamong_ttd['jabatan'] ?></td>
				</tr>
				<tr>
					<td colspan="6">&nbsp;</td>
				<tr>
					<td colspan="6">&nbsp;</td>
				<tr>
					<td colspan="6">&nbsp;</td>
				<tr>
					<td colspan="6">&nbsp;</td>
				<tr>
					<td colspan="1">&nbsp;</td>
					<td colspan="2">( <?= $pamong_ketahui['pamong_nama'] ?> )</td>
					<td colspan="2">&nbsp;</td>
					<td>( <?= $pamong_ttd['pamong_nama'] ?> )</td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>