<?php

class First_penduduk_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function wilayah()
	{
		$sql = "SELECT u.*, a.nama AS nama_kadus, a.nik AS nik_kadus,
		(SELECT COUNT(rw.id) FROM tweb_wilayah rw WHERE dusun = u.dusun AND rw <> '-' AND rt = '-') AS jumlah_rw,
		(SELECT COUNT(v.id) FROM tweb_wilayah v WHERE dusun = u.dusun AND v.rt <> '0' AND v.rt <> '-') AS jumlah_rt,
		(SELECT COUNT(p.id) FROM tweb_penduduk p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) and status_dasar=1) AS jumlah_warga,
		(SELECT COUNT(p.id) FROM tweb_penduduk p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) AND p.sex = 1 and status_dasar = 1) AS jumlah_warga_l,
		(SELECT COUNT(p.id) FROM tweb_penduduk p WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) AND p.sex = 2 and status_dasar = 1) AS jumlah_warga_p,
		(SELECT COUNT(p.id) FROM tweb_keluarga k inner join tweb_penduduk p ON k.nik_kepala = p.id  WHERE p.id_cluster IN(SELECT id FROM tweb_wilayah WHERE dusun = u.dusun) AND p.kk_level = 1 and status_dasar = 1) AS jumlah_kk
		FROM tweb_wilayah u LEFT JOIN tweb_penduduk a ON u.id_kepala = a.id WHERE u.rt = '0' AND u.rw = '0'  ";

		$query = $this->db->query($sql);
		$data = $query->result_array();

		//Formating Output
		for ($i=0; $i<count($data); $i++)
		{
			$data[$i]['no'] = $i + 1;
		}
		return $data;
	}
}
