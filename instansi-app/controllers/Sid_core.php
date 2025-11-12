<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sid_Core extends Admin_Controller
{

	private $_set_page;

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['wilayah_model', 'config_model', 'pamong_model']);
		$this->load->library('form_validation');
		$this->modul_ini = 11;
		$this->sub_modul_ini = 20;
		$this->_set_page = ['20', '50', '100'];
	}

	public function clear()
	{
		$this->session->unset_userdata('cari');
		$this->session->per_page = $this->_set_page[0];
		redirect('sid_core');
	}

	public function index($p = 1, $o = 0)
	{
		$data['p'] = $p;
		$data['o'] = $o;
		$this->set_minsidebar(1);

		$per_page = $this->input->post('per_page');
		if (isset($per_page))
			$this->session->per_page = $per_page;

		$data['cari'] = $this->session->cari ?: '';
		$data['func'] = 'index';
		$data['set_page'] = $this->_set_page;
		$data['per_page'] = $this->session->per_page;
		$data['paging'] = $this->wilayah_model->paging($p, $o);
		$data['main'] = $this->wilayah_model->list_data($o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->wilayah_model->autocomplete();
		$data['total'] = $this->wilayah_model->total();

		$this->render('sid/wilayah/wilayah_provinsi', $data);
	}

	/*
	 * $aksi = cetak/unduh
	 */
	public function dialog($aksi = 'cetak')
	{
		$data['aksi'] = $aksi;
		$data['pamong'] = $this->pamong_model->list_data();
		$data['form_action'] = site_url("sid_core/daftar/$aksi");
		$this->load->view('global/ttd_pamong', $data);

		// $data['header'] = $this->header['desa'];
		// $data['main'] = $this->wilayah_model->list_data(0, 0, 1000);
		// $data['total'] = $this->wilayah_model->total();

		// $this->load->view('sid/wilayah/wilayah_print', $data);
	}

	/*
	 * $aksi = cetak/unduh
	 */
	public function daftar($aksi = 'cetak')
	{
		$data['pamong_ttd'] = $this->pamong_model->get_data($this->input->post('pamong_ttd'));
		$data['pamong_ketahui'] = $this->pamong_model->get_data($this->input->post('pamong_ketahui'));
		$data['desa'] = $this->_header;
		$data['main'] = $this->wilayah_model->list_semua_wilayah();
		$data['total'] = $this->wilayah_model->total();

		$this->load->view("sid/wilayah/wilayah_$aksi", $data);
	}

	//Form Provinsi
	public function form_provinsi($id = '')
	{
		$data['penduduk'] = $this->wilayah_model->list_penduduk();
		$this->set_minsidebar(1);
		if ($id) {
			$temp = $this->wilayah_model->cluster_by_id($id);
			$data['provinsi'] = $temp['provinsi'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_provinsi/$id");
		} else {
			$data['provinsi'] = null;
			$data['form_action'] = site_url("sid_core/insert_provinsi");
		}

		$data['provinsi_id'] = $this->wilayah_model->get_provinsi_maps($id);

		$this->render('sid/wilayah/wilayah_form_provinsi', $data);
	}

	public function search()
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$this->session->cari = $cari;
		else $this->session->unset_userdata('cari');
		redirect('sid_core');
	}

	public function insert_provinsi($provinsi = '')
	{
		$this->wilayah_model->insert_provinsi();
		redirect('sid_core');
	}

	public function update_provinsi($id = '')
	{
		$this->wilayah_model->update_provinsi($id);
		redirect('sid_core');
	}

	//Delete provinsi/kabkota/kecamatan/desa/rw/rt tergantung tipe
	public function delete($tipe = '', $id = '')
	{
		$kembali = $_SERVER['HTTP_REFERER'];
		$this->redirect_hak_akses('h', $kembali);
		$this->wilayah_model->delete($tipe, $id);
		redirect($kembali);
	}

	// Awal Data Kabupaten Kota
	public function sub_kabkota($id_provinsi = '', $p = 1, $o = 0)
	{
		$data['p'] = $p;
		$data['o'] = $o;
		$this->set_minsidebar(1);

		$per_page = $this->input->post('per_page');
		if (isset($per_page))
			$this->session->per_page = $per_page;

		$data['set_page'] = $this->_set_page;
		$data['per_page'] = $this->session->per_page;
		$data['paging'] = $this->wilayah_model->paging($p, $o);

		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$data['main'] = $this->wilayah_model->list_data_kabkota($id_provinsi, $data['paging']->offset, $data['paging']->per_page);
		//$data['main'] = $this->wilayah_model->list_data_kabkota($id_provinsi);
		$data['total'] = $this->wilayah_model->total_kabkota($nama_provinsi);

		$this->render('sid/wilayah/wilayah_kabkota', $data);
	}

	public function form_kabkota($id_provinsi = '', $id_kabkota = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $temp['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		if ($id_kabkota) {
			$temp = $this->wilayah_model->cluster_by_id($id_kabkota);
			$data['id_kabkota'] = $id_kabkota;
			$data['kabkota'] = $temp['kabkota'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_kabkota/$id_provinsi/$id_kabkota");
		} else {
			$data['kabkota'] = NULL;
			$data['form_action'] = site_url("sid_core/insert_kabkota/$id_provinsi");
		}
		$this->set_minsidebar(1);

		$this->render('sid/wilayah/wilayah_form_kabkota', $data);
	}

	public function insert_kabkota($id_provinsi = '')
	{
		$this->wilayah_model->insert_kabkota($id_provinsi);
		redirect("sid_core/sub_kabkota/$id_provinsi");
	}

	public function update_kabkota($id_provinsi = '', $id_kabkota = '')
	{
		$this->wilayah_model->update_kabkota($id_kabkota);
		redirect("sid_core/sub_kabkota/$id_provinsi/$id_kabkota");
	}

	public function cetak_kabkota($id_provinsi = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;
		$data['main'] = $this->wilayah_model->list_data_kabkota($id_provinsi);
		$data['total'] = $this->wilayah_model->total_kabkota($nama_provinsi);

		$this->load->view('sid/wilayah/wilayah_kabkota_print', $data);
	}

	public function excel_kabkota($id_provinsi = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;
		$data['main'] = $this->wilayah_model->list_data_rw($id_provinsi);
		$data['total'] = $this->wilayah_model->total_rw($nama_provinsi);

		$this->load->view('sid/wilayah/wilayah_provinsi_excel', $data);
	}

	// Akhir Data Kabupaten Kota

	// Awal Data Kecamatan
	public function sub_kecamatan($id_provinsi = '', $id_kabkota = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$data['main'] = $this->wilayah_model->list_data_kecamatan($provinsi, $data['kabkota']);
		$data['total'] = $this->wilayah_model->total_kecamatan($provinsi, $data['kabkota']);

		$this->render('sid/wilayah/wilayah_kecamatan', $data);
	}

	public function form_kecamatan($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		//$provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$kabkota = $kabkota['kabkota'];
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		if ($id_kecamatan) {
			$temp = $this->wilayah_model->cluster_by_id($id_kecamatan);
			$data['id_kecamatan'] = $id_kecamatan;
			$data['kecamatan'] = $temp['kecamatan'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_kecamatan/$id_provinsi/$id_kabkota/$id_kecamatan");
		} else {
			$data['kecamatan'] = NULL;
			$data['form_action'] = site_url("sid_core/insert_kecamatan/$id_provinsi/$id_kabkota");
		}

		$this->render('sid/wilayah/wilayah_form_kecamatan', $data);
	}

	public function insert_kecamatan($id_provinsi = '', $id_kabkota = '')
	{
		$this->wilayah_model->insert_kecamatan($id_provinsi, $id_kabkota);
		redirect("sid_core/sub_kecamatan/$id_provinsi/$id_kabkota");
	}

	public function update_kecamatan($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '')
	{
		$this->wilayah_model->update_kecamatan($id_provinsi, $id_kabkota, $id_kecamatan);
		redirect("sid_core/sub_kecamatan/$id_provinsi/$id_kabkota/$id_kecamatan");
	}

	public function cetak_kecamatan($id_provinsi = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;
		$data['main'] = $this->wilayah_model->list_data_kabkota($id_provinsi);
		$data['total'] = $this->wilayah_model->total_kabkota($nama_provinsi);

		$this->load->view('sid/wilayah/wilayah_kabkota_print', $data);
	}

	public function excel_kecamatan($id_provinsi = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;
		$data['main'] = $this->wilayah_model->list_data_rw($id_provinsi);
		$data['total'] = $this->wilayah_model->total_rw($nama_provinsi);

		$this->load->view('sid/wilayah/wilayah_provinsi_excel', $data);
	}

	// Akhir Data Kecamatan

	// Awal Data Desa / Kelurahan
	public function sub_desa($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$data['main'] = $this->wilayah_model->list_data_desa($provinsi, $kabkota, $data['kecamatan']);
		$data['total'] = $this->wilayah_model->total_desa($provinsi, $kabkota, $data['kecamatan']);

		$this->render('sid/wilayah/wilayah_desa', $data);
	}

	public function form_desa($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_provinsi);
		//$provinsi = $temp['provinsi'];
		$data['provinsi'] = $temp['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$data_kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $data_kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$data_kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $data_kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		if ($id_desa) {
			$temp = $this->wilayah_model->cluster_by_id($id_desa);
			$data['id_desa'] = $id_desa;
			$data['desa'] = $temp['desa'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_desa/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa");
		} else {
			$data['desa'] = NULL;
			$data['form_action'] = site_url("sid_core/insert_desa/$id_provinsi/$id_kabkota/$id_kecamatan");
		}

		$this->render('sid/wilayah/wilayah_form_desa', $data);
	}

	public function insert_desa($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '')
	{
		$this->wilayah_model->insert_desa($id_provinsi, $id_kabkota, $id_kecamatan);
		redirect("sid_core/sub_desa/$id_provinsi/$id_kabkota/$id_kecamatan");
	}

	public function update_desa($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '')
	{
		$this->wilayah_model->update_desa($id_provinsi, $id_kabkota, $id_kecamatan, $id_desa);
		redirect("sid_core/sub_desa/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa");
	}

	public function cetak_desa($id_provinsi = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;
		$data['main'] = $this->wilayah_model->list_data_kabkota($id_provinsi);
		$data['total'] = $this->wilayah_model->total_kabkota($nama_provinsi);

		$this->load->view('sid/wilayah/wilayah_kabkota_print', $data);
	}

	public function excel_desa($id_provinsi = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$nama_provinsi = $provinsi['provinsi'];
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;
		$data['main'] = $this->wilayah_model->list_data_rw($id_provinsi);
		$data['total'] = $this->wilayah_model->total_rw($nama_provinsi);

		$this->load->view('sid/wilayah/wilayah_provinsi_excel', $data);
	}

	// Akhir Data Desa / Kelurahan

	// Awal Sub RW
	public function sub_rw($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$desa = $this->wilayah_model->cluster_by_id($id_desa);
		$data['desa'] = $desa['desa'];
		$data['id_desa'] = $id_desa;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		$data['main'] = $this->wilayah_model->list_data_rw($provinsi, $kabkota, $kecamatan, $data['desa']);
		$data['total'] = $this->wilayah_model->total_rw($provinsi, $kabkota, $kecamatan, $data['desa']);

		$this->render('sid/wilayah/wilayah_rw', $data);
	}

	public function form_rw($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_rw = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$desa = $this->wilayah_model->cluster_by_id($id_desa);
		$data['desa'] = $desa['desa'];
		$data['id_desa'] = $id_desa;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		if ($id_rw) {
			$temp = $this->wilayah_model->cluster_by_id($id_rw);
			$data['id_desa'] = $id_desa;
			$data['rw'] = $temp['rw'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_rw");
		} else {
			$data['rw'] = NULL;
			$data['form_action'] = site_url("sid_core/insert_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa");
		}

		$this->render('sid/wilayah/wilayah_form_rw', $data);
	}

	public function insert_rw($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '')
	{
		$this->wilayah_model->insert_rw($id_provinsi, $id_kabkota, $id_kecamatan, $id_desa);
		redirect("sid_core/sub_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa");
	}

	public function update_rw($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_rw = '')
	{
		$this->wilayah_model->update_rw($id_rw);
		redirect("sid_core/sub_rw/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa");
	}
	// END SUB RW

	// START SUB RT

	public function sub_rt($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_rw = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$desa = $this->wilayah_model->cluster_by_id($id_desa);
		$data['desa'] = $desa['desa'];
		$data['id_desa'] = $id_desa;

		$rw = $this->wilayah_model->cluster_by_id($id_rw);
		$data['rw'] = $rw['rw'];
		$data['id_rw'] = $id_rw;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		$data['main'] = $this->wilayah_model->list_data_rt($provinsi, $kabkota, $kecamatan, $desa, $data['rw']);
		$data['total'] = $this->wilayah_model->total_rt($provinsi, $kabkota, $kecamatan, $desa, $data['rw']);

		$this->render('sid/wilayah/wilayah_rt', $data);
	}

	public function form_rt($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_rw = '', $id_rt = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$desa = $this->wilayah_model->cluster_by_id($id_desa);
		$data['desa'] = $desa['desa'];
		$data['id_desa'] = $id_desa;

		$rw = $this->wilayah_model->cluster_by_id($id_rw);
		$data['rw'] = $rw['rw'];
		$data['id_rw'] = $id_rw;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		if ($id_rt) {
			$temp = $this->wilayah_model->cluster_by_id($id_rt);
			$data['id_rw'] = $id_rw;
			$data['rt'] = $temp['rt'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_rt/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_rw/$id_rt");
		} else {
			$data['rt'] = NULL;
			$data['form_action'] = site_url("sid_core/insert_rt/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_rw");
		}

		$this->render('sid/wilayah/wilayah_form_rt', $data);
	}

	public function insert_rt($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_rw = '')
	{
		$this->wilayah_model->insert_rt($id_provinsi, $id_kabkota, $id_kecamatan, $id_desa, $id_rw);
		redirect("sid_core/sub_rt/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_rw");
	}

	public function update_rt($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_rw = '')
	{
		$this->wilayah_model->update_rt($id_rt);
		redirect("sid_core/sub_rt/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_rw");
	}

	// END SUB RT

	//awal sub_dusun
	/*	public function sub_dusun($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '')
	{
		$provinsi = $this->wilayah_model->cluster_by_id($id_provinsi);
		$data['provinsi'] = $provinsi['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$data_desa = $this->wilayah_model->cluster_by_id($id_desa);
		$data['desa'] = $data_desa['desa'];
		$data['id_desa'] = $id_desa;

		$data['main'] = $this->wilayah_model->list_data_dusun($provinsi, $kabkota, $kecamatan, $data['desa']);
		$data['total'] = $this->wilayah_model->total_dusun($provinsi, $kabkota, $kecamatan, $data['desa']);

		$this->render('sid/wilayah/wilayah_dusun', $data);
	}

	public function cetak_dusun($id_desa = '')
	{
		$desa = $this->wilayah_model->cluster_by_id($id_desa);
		$nama_desa = $desa['desa'];
		$data['desa'] = $desa['desa'];
		$data['id_desa'] = $id_desa;
		$data['main'] = $this->wilayah_model->list_data_dusun($id_desa);
		$data['total'] = $this->wilayah_model->total_dusun($nama_desa);

		$this->load->view('sid/wilayah/wilayah_dusun_print', $data);
	}

	public function excel_dusun($id_desa = '')
	{
		$desa = $this->wilayah_model->cluster_by_id($id_desa);
		$nama_desa = $desa['desa'];
		$data['desa'] = $desa['desa'];
		$data['id_desa'] = $id_desa;
		$data['main'] = $this->wilayah_model->list_data_dusun($id_desa);
		$data['total'] = $this->wilayah_model->total_dusun($nama_desa);

		$this->load->view('sid/wilayah/wilayah_dusun_excel', $data);
	}

	public function form_dusun($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_dusun = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_provinsi);
		//$provinsi = $temp['provinsi'];
		$data['provinsi'] = $temp['provinsi'];
		$data['id_provinsi'] = $id_provinsi;

		$data_kabkota = $this->wilayah_model->cluster_by_id($id_kabkota);
		$data['kabkota'] = $data_kabkota['kabkota'];
		$data['id_kabkota'] = $id_kabkota;

		$data_kecamatan = $this->wilayah_model->cluster_by_id($id_kecamatan);
		$data['kecamatan'] = $data_kecamatan['kecamatan'];
		$data['id_kecamatan'] = $id_kecamatan;

		$data_desa = $this->wilayah_model->cluster_by_id($id_desa);
		$data['desa'] = $data_desa['desa'];
		$data['id_desa'] = $id_desa;

		$data['penduduk'] = $this->wilayah_model->list_penduduk();

		if ($id_dusun) {
			$temp = $this->wilayah_model->cluster_by_id($id_dusun);
			$data['id_desa'] = $id_desa;
			$data['dusun'] = $temp['dusun'];
			$data['individu'] = $this->wilayah_model->get_penduduk($temp['id_kepala']);
			$data['form_action'] = site_url("sid_core/update_dusun/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/$id_dusun");
		} else {
			$data['rw'] = NULL;
			$data['form_action'] = site_url("sid_core/insert_dusun/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa/");
		}

		$this->render('sid/wilayah/wilayah_form_dusun', $data);
	}

	public function insert_dusun($id_provinsi = '', $id_kabkota = '', $id_kecamatan = '', $id_desa = '', $id_dusun = '')
	{
		$this->wilayah_model->insert_dusun($id_provinsi, $id_kabkota, $id_kecamatan,$id_desa);
		redirect("sid_core/sub_dusun/$id_provinsi/$id_kabkota/$id_kecamatan/$id_desa");
	}

	public function update_dusun($desa = '', $id_dusun = '')
	{
		$this->wilayah_model->update_rw($id_rw);
		redirect("sid_core/sub_dusun/$desa");
	}


	//alkhir sub_dusun
*/



	public function warga($id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id);
		$id_dusun = $temp['id'];
		$dusun = $temp['dusun'];

		$_SESSION['per_page'] = 100;
		$_SESSION['dusun'] = $dusun;
		redirect("penduduk/index/1/0");
	}

	public function warga_kk($id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id);
		$id_dusun = $temp['id'];
		$dusun = $temp['dusun'];
		$_SESSION['per_page'] = 50;
		$_SESSION['dusun'] = $dusun;
		redirect("keluarga/index/1/0");
	}

	public function warga_l($id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id);
		$id_dusun = $temp['id'];
		$dusun = $temp['dusun'];

		$_SESSION['per_page'] = 100;
		$_SESSION['dusun'] = $dusun;
		$_SESSION['sex'] = 1;
		redirect("penduduk/index/1/0");
	}

	public function warga_p($id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id);
		$id_dusun = $temp['id'];
		$dusun = $temp['dusun'];

		$_SESSION['per_page'] = 100;
		$_SESSION['dusun'] = $dusun;
		$_SESSION['sex'] = 2;
		redirect("penduduk/index/1/0");
	}

	public function ajax_kantor_dusun_maps_google($id = '')

	{

		$sebutan_deskel = ucwords($this->setting->sebutan_deskel);
		$data['wil_atas'] = $this->config_model->get_data();
		$data['wil_ini'] = $this->wilayah_model->get_dusun_maps($id);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();

		$data['nama_wilayah'] = ucwords($this->setting->sebutan_wilayah . " " . $data['wil_ini']['dusun'] . " " . $sebutan_deskel . " " . $data['wil_atas']['nama_deskel']);
		$data['wilayah'] = ucwords($this->setting->sebutan_wilayah);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $data['wilayah']),
		);
		$data['form_action'] = site_url("sid_core/update_kantor_dusun_map/$id");
		$namadesa =  $data['wil_atas']['nama_deskel'];
		$data['logo'] = $this->config_model->get_data();

		if (!empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'] && !empty($data['wil_atas']['path'])))) {
			$this->render("sid/wilayah/maps_google_kantor", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Lokasi Kantor $sebutan_deskel $nama_deskel Belum Dilengkapi";
			redirect("sid_core", $data);
		}
	}

	public function ajax_wilayah_dusun_openstreet_maps($id = '')
	{
		$sebutan_desa = ucwords($this->setting->sebutan_desa);
		$data['wil_atas'] = $this->config_model->get_data();
		$data['wil_ini'] = $this->wilayah_model->get_dusun_maps($id);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = ucwords($this->setting->sebutan_dusun . " " . $data['wil_ini']['dusun'] . " " . $sebutan_desa . " " . $data['wil_atas']['nama_desa']);
		$data['wilayah'] = ucwords($this->setting->sebutan_dusun);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $data['wilayah']),
		);
		$data['form_action'] = site_url("sid_core/update_wilayah_dusun_map/$id");
		$namadesa =  $data['wil_atas']['nama_desa'];
		$data['logo'] = $this->config_model->get_data();
		if (!empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'] && !empty($data['wil_atas']['path'])))) {
			$this->render("sid/wilayah/maps_openstreet_wilayah", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Peta Lokasi/Wilayah $sebutan_desa $namadesa Belum Dilengkapi";
			redirect("sid_core");
		}
	}

	public function ajax_wilayah_dusun_maps_google($id = '')
	{
		$sebutan_deskel = ucwords($this->setting->sebutan_deskel);
		$data['wil_atas'] = $this->config_model->get_data();
		$data['wil_ini'] = $this->wilayah_model->get_dusun_maps($id);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = ucwords($this->setting->sebutan_wilayah . " " . $data['wil_ini']['dusun'] . " " . $sebutan_deskel . " " . $data['wil_atas']['nama_deskel']);
		$data['wilayah'] = ucwords($this->setting->sebutan_wilayah);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $data['wilayah']),
		);
		$data['form_action'] = site_url("sid_core/update_wilayah_dusun_map/$id");
		$nama_deskel =  $data['wil_atas']['nama_deskel'];
		$data['logo'] = $this->config_model->get_data();
		if (!empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'] && !empty($data['wil_atas']['path'])))) {
			$this->render("sid/wilayah/maps_google_wilayah", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Peta Lokasi/Wilayah $sebutan_deskel $namadesa Belum Dilengkapi";
			redirect("sid_core");
		}
	}

	public function update_kantor_dusun_map($id = '')
	{
		$sebutan_dusun = ucwords($this->setting->sebutan_dusun);
		$namadusun =  $this->input->post('dusun');
		$iddusun =  $this->input->post('id');

		$this->wilayah_model->update_kantor_dusun_map($id);
		redirect("sid_core");
	}

	public function update_wilayah_dusun_map($id = '')
	{
		$sebutan_dusun = ucwords($this->setting->sebutan_dusun);
		$namadusun =  $this->input->post('dusun');
		$iddusun =  $this->input->post('id');

		$this->wilayah_model->update_wilayah_dusun_map($id);
		redirect("sid_core");
	}

	public function ajax_kantor_rw_google_maps($id_dusun = '', $id_rw = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_dusun);
		$dusun = $temp['dusun'];
		$data['id_dusun'] = $id_dusun;
		$sebutan_wilayah = ucwords($this->setting->sebutan_wilayah);
		$temp = $this->wilayah_model->cluster_by_id($id_rw);

		$rw = $temp['rw'];
		$data['rw'] = $rw;
		$data['id_rw'] = $id_rw;
		$data['wil_atas'] = $this->wilayah_model->get_dusun_maps($id_dusun);
		$data['wil_ini'] = $this->wilayah_model->get_rw_maps($dusun, $rw);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = 'RW ' . $data['wil_ini']['rw'] . " " . ucwords($sebutan_wilayah . " " . $data['wil_ini']['dusun']);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $sebutan_wilayah),
			array('link' => site_url("sid_core/sub_rw/$id_dusun"), 'judul' => 'Daftar RW')
		);

		$data['wilayah'] = 'RW';
		$data['form_action'] = site_url("sid_core/update_kantor_rw_map/$id_dusun/$id_rw");
		$data['logo'] = $this->config_model->get_data();


		if (!empty($data['wil_atas']['path'] && !empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'])))) {
			$this->render("sid/wilayah/maps_google_kantor", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Lokasi Kantor $sebutan_wilayah $dusun Belum Dilengkapi";
			redirect("sid_core/sub_rw/$id_dusun");
		}
	}

	public function ajax_wilayah_rw_openstreet_maps($id_dusun = '', $id_rw = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_dusun);
		$dusun = $temp['dusun'];
		$data['id_dusun'] = $id_dusun;
		$sebutan_dusun = ucwords($this->setting->sebutan_dusun);
		$temp = $this->wilayah_model->cluster_by_id($id_rw);
		$rw = $temp['rw'];
		$data['rw'] = $rw;
		$data['id_rw'] = $id_rw;
		$data['wil_atas'] = $this->wilayah_model->get_dusun_maps($id_dusun);
		$data['wil_ini'] = $this->wilayah_model->get_rw_maps($dusun, $rw);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = 'RW ' . $data['wil_ini']['rw'] . " " . ucwords($sebutan_dusun . " " . $data['wil_ini']['dusun']);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $sebutan_dusun),
			array('link' => site_url("sid_core/sub_rw/$id_dusun"), 'judul' => 'Daftar RW')
		);
		$data['wilayah'] = 'RW';
		$data['form_action'] = site_url("sid_core/update_wilayah_rw_map/$id_dusun/$id_rw");
		$data['logo'] = $this->config_model->get_data();

		if (!empty($data['wil_atas']['path'] && !empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'])))) {
			$this->render("sid/wilayah/maps_openstreet_wilayah", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Peta Lokasi/Wilayah $sebutan_dusun $dusun Belum Dilengkapi";
			redirect("sid_core/sub_rw/$id_dusun");
		}
	}

	public function ajax_wilayah_rw_google_maps($id_dusun = '', $id_rw = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_dusun);
		$dusun = $temp['dusun'];
		$data['id_dusun'] = $id_dusun;
		$sebutan_dusun = ucwords($this->setting->sebutan_dusun);
		$temp = $this->wilayah_model->cluster_by_id($id_rw);
		$rw = $temp['rw'];
		$data['rw'] = $rw;
		$data['id_rw'] = $id_rw;
		$data['wil_atas'] = $this->wilayah_model->get_dusun_maps($id_dusun);
		$data['wil_ini'] = $this->wilayah_model->get_rw_maps($dusun, $rw);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = 'RW ' . $data['wil_ini']['rw'] . " " . ucwords($sebutan_dusun . " " . $data['wil_ini']['dusun']);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $sebutan_dusun),
			array('link' => site_url("sid_core/sub_rw/$id_dusun"), 'judul' => 'Daftar RW')
		);
		$data['wilayah'] = 'RW';
		$data['form_action'] = site_url("sid_core/update_wilayah_rw_map/$id_dusun/$id_rw");
		$data['logo'] = $this->config_model->get_data();

		if (!empty($data['wil_atas']['path'] && !empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'])))) {
			$this->render("sid/wilayah/maps_google_wilayah", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Peta Lokasi/Wilayah $sebutan_dusun $dusun Belum Dilengkapi";
			redirect("sid_core/sub_rw/$id_dusun");
		}
	}

	public function update_kantor_rw_map($id_dusun = '', $id_rw = '')
	{
		$this->wilayah_model->update_kantor_rw_map($id_rw);
		redirect("sid_core/sub_rw/$id_dusun");
	}

	public function update_wilayah_rw_map($id_dusun = '', $rw = '')
	{
		$this->wilayah_model->update_wilayah_rw_map($id_rw);
		redirect("sid_core/sub_rw/$id_dusun");
	}

	public function ajax_kantor_rt_maps($id_dusun = '', $id_rw = '', $id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_dusun);
		$dusun = $temp['dusun'];
		$data['id_dusun'] = $id_dusun;
		$temp_rw = $this->wilayah_model->cluster_by_id($id_rw);
		$rw = $temp_rw['rw'];

		$sebutan_wilayah = ucwords($this->setting->sebutan_wilayah);
		$data['wil_atas'] = $this->wilayah_model->get_dusun_maps($id_dusun);
		$data_rw = $this->wilayah_model->get_rw_maps($dusun, $rw);
		$data['wil_ini'] = $this->wilayah_model->get_rt_maps($id);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = 'RT ' . $data['wil_ini']['rt'] . ' RW ' . $data['wil_ini']['rw'] . ' ' . ucwords($sebutan_wilayah . " " . $data['wil_ini']['dusun']);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $sebutan_wilayah),
			array('link' => site_url("sid_core/sub_rw/$id_dusun"), 'judul' => 'Daftar RW'),
			array('link' => site_url("sid_core/sub_rt/$id_dusun/$id_rw"), 'judul' => 'Daftar RT')
		);

		$data['wilayah'] = 'RT';
		$data['form_action'] = site_url("sid_core/update_wilayah_rt_map/$id_dusun/$id_rw/$id");
		$data['logo'] = $this->config_model->get_data();

		if (!empty($data['wil_atas']['path'] && !empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'])))) {
			$this->render("sid/wilayah/maps_google_kantor", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Lokasi Kantor $sebutan_wilayah $dusun Belum Dilengkapi";
			redirect("sid_core/sub_rt/$id_dusun/$id_rw");
		}
	}

	public function ajax_wilayah_rt_google_maps($id_dusun = '', $id_rw = '', $id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_dusun);
		$dusun = $temp['dusun'];
		$data['id_dusun'] = $id_dusun;

		$sebutan_dusun = ucwords($this->setting->sebutan_dusun);
		$data['wil_atas'] = $this->wilayah_model->get_dusun_maps($id_dusun);
		$data_rw = $this->wilayah_model->get_rw_maps($dusun, $rw);
		$data['wil_ini'] = $this->wilayah_model->get_rt_maps($id);
		$data['dusun_gis'] = $this->wilayah_model->list_dusun();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = 'RT ' . $data['wil_ini']['rt'] . ' RW ' . $data['wil_ini']['rw'] . ' ' . ucwords($sebutan_dusun . " " . $data['wil_ini']['dusun']);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $sebutan_dusun),
			array('link' => site_url("sid_core/sub_rw/$id_dusun"), 'judul' => 'Daftar RW'),
			array('link' => site_url("sid_core/sub_rt/$id_dusun/$id_rw"), 'judul' => 'Daftar RT')
		);
		$data['wilayah'] = 'RT';
		$data['form_action'] = site_url("sid_core/update_wilayah_rt_map/$id_dusun/$id_rw/$id");
		$data['logo'] = $this->config_model->get_data();

		if (!empty($data['wil_atas']['path'] && !empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'])))) {
			$this->render("sid/wilayah/maps_google_wilayah", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Peta Lokasi/Wilayah $sebutan_dusun $dusun Belum Dilengkapi";
			redirect("sid_core/sub_rt/$id_dusun/$id_rw");
		}
	}

	public function ajax_wilayah_rt_openstreet_maps($id_dusun = '', $id_rw = '', $id = '')
	{
		$temp = $this->wilayah_model->cluster_by_id($id_dusun);
		$dusun = $temp['dusun'];
		$data['id_dusun'] = $id_dusun;

		$sebutan_desa = ucwords($this->setting->sebutan_desa);
		$data['wil_atas'] = $this->wilayah_model->get_dusun_maps($id_desa);
		$data_rw = $this->wilayah_model->get_rw_maps($dusun, $rw);
		$data['wil_ini'] = $this->wilayah_model->get_rt_maps($id);
		$data['desa_gis'] = $this->wilayah_model->list_desa();
		$data['rw_gis'] = $this->wilayah_model->list_rw_gis();
		$data['rt_gis'] = $this->wilayah_model->list_rt_gis();
		$data['nama_wilayah'] = 'RT ' . $data['wil_ini']['rt'] . ' RW ' . $data['wil_ini']['rw'] . ' ' . ucwords($sebutan_desa . " " . $data['wil_ini']['desa']);
		$data['breadcrumb'] = array(
			array('link' => site_url('sid_core'), 'judul' => "Daftar " . $sebutan_desa),
			array('link' => site_url("sid_core/sub_rw/$id_desa"), 'judul' => 'Daftar RW'),
			array('link' => site_url("sid_core/sub_rt/$id_desa/$id_rw"), 'judul' => 'Daftar RT')
		);
		$data['wilayah'] = 'RT';
		$data['form_action'] = site_url("sid_core/update_wilayah_rt_map/$id_desa/$id_rw/$id");
		$data['logo'] = $this->config_model->get_data();

		if (!empty($data['wil_atas']['path'] && !empty($data['wil_atas']['lat'] && !empty($data['wil_atas']['lng'])))) {
			$this->render("sid/wilayah/maps_openstreet_wilayah", $data);
		} else {
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = "Peta Lokasi/Wilayah $sebutan_desa $desa Belum Dilengkapi";
			redirect("sid_core/sub_rt/$id_desa/$id_rw");
		}
	}

	public function update_kantor_rt_map($id_desa = '', $id_rw = '', $id = '')
	{
		$this->wilayah_model->update_kantor_rt_map($id);
		redirect("sid_core/sub_rt/$id_desa/$id_rw");
	}

	public function update_wilayah_rt_map($id_desa = '', $id_rw = '', $id = '')
	{
		$this->wilayah_model->update_wilayah_rt_map($id);
		redirect("sid_core/sub_rt/$id_desa/$id_rw");
	}
}
