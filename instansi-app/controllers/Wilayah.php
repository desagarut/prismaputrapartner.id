<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wilayah extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('wilayah_model');
	}

	public function list_kabkota($provinsi = '')
	{
		$list_kabkota = $this->wilayah_model->list_kabkota($provinsi);
		echo json_encode($list_kabkota);
	}

	public function list_kecamatan($provinsi = '', $kabkota = '')
	{
		$list_kecamatan = $this->wilayah_model->list_kecamatan($provinsi, $kabkota);
		echo json_encode($list_kecamatan);
	}

	public function list_desa($provinsi = '', $kabkota = '', $kecamatan = '')
	{
		$list_desa = $this->wilayah_model->list_desa($provinsi, $kabkota, $kecamatan);
		echo json_encode($list_desa);
	}

	public function list_rw($provinsi = '', $kabkota = '', $kecamatan = '', $desa = '')
	{
		$list_rw = $this->wilayah_model->list_rw($provinsi, $kabkota, $kecamatan, $desa);
		echo json_encode($list_rw);
	}

	public function list_rt($provinsi = '', $kabkota = '', $kecamatan = '', $desa = '', $rw = '-')
	{
		$list_rt = $this->wilayah_model->list_rt($provinsi, $kabkota, $kecamatan, $desa, $rw);
		echo json_encode($list_rt);
	}
}
