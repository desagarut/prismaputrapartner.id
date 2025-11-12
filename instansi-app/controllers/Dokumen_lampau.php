<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen_lampau extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('dokumen_lampau_model');
		$this->modul_ini = 52;
		$this->sub_modul_ini = 101;
	}

	public function clear()
	{
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
		redirect('dokumen_lampau');
	}

	public function index($p=1, $o=0)
	{
		$data['p'] = $p;
		$data['o'] = $o;

		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page'] = $_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging'] = $this->dokumen_lampau_model->paging($p,$o);
		$data['main'] = $this->dokumen_lampau_model->list_data($o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->dokumen_lampau_model->autocomplete();
		$this->set_minsidebar(1);
		$this->render('dokumen_lampau/table', $data);
	}

	public function form($p=1, $o=0, $id='')
	{
		$data['p'] = $p;
		$data['o'] = $o;

		if ($id)
		{
			$data['dokumen_lampau'] = $this->dokumen_lampau_model->get_dokumen_lampau($id);
			$data['form_action'] = site_url("dokumen_lampau/update/$id/$p/$o");
		}
		else
		{
			$data['dokumen_lampau'] = null;
			$data['form_action'] = site_url("dokumen_lampau/insert");
		}
		$this->set_minsidebar(1);
		$this->render('dokumen_lampau/form', $data);
	}

	public function search($dokumen_lampau='')
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$_SESSION['cari'] = $cari;
		else unset($_SESSION['cari']);
		if ($dokumen_lampau != '')
		{
			redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
		}
		else
		{
			redirect('dokumen_lampau');
		}
	}

	public function filter($dokumen_lampau='')
	{
		$filter = $this->input->post('filter');
		if ($filter != 0)
			$_SESSION['filter'] = $filter;
		else unset($_SESSION['filter']);
		if ($dokumen_lampau != '')
		{
			redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
		}
		else
		{
			redirect('dokumen_lampau');
		}
	}

	public function insert()
	{
		$this->dokumen_lampau_model->insert();
		redirect('dokumen_lampau');
	}

	public function update($id='', $p=1, $o=0)
	{
		$this->dokumen_lampau_model->update($id);
		redirect("dokumen_lampau/index/$p/$o");
	}

	public function delete($p=1, $o=0, $id='')
	{
		$this->redirect_hak_akses('h', "dokumen_lampau/index/$p/$o");
		$this->dokumen_lampau_model->delete_dokumen_lampau($id);
		redirect("dokumen_lampau/index/$p/$o");
	}

	public function delete_all($p=1, $o=0)
	{
		$this->redirect_hak_akses('h', "dokumen_lampau/index/$p/$o");
		$_SESSION['success'] = 1;
		$this->dokumen_lampau_model->delete_all_dokumen_lampau();
		redirect("dokumen_lampau/index/$p/$o");
	}

	public function dokumen_lampau_lock($id='', $dokumen_lampau='')
	{
		$this->dokumen_lampau_model->dokumen_lampau_lock($id, 1);
		if ($dokumen_lampau != '')
			redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau/$p");
		else
			redirect("dokumen_lampau/index/$p/$o");
	}

	public function dokumen_lampau_unlock($id='', $dokumen_lampau='')
	{
		$this->dokumen_lampau_model->dokumen_lampau_lock($id, 2);
		if ($dokumen_lampau != '')
			redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau/$p");
		else
			redirect("dokumen_lampau/index/$p/$o");
	}

	public function sub_dokumen_lampau($gal=0, $p=1, $o=0)
	{
		$data['p'] = $p;
		$data['o'] = $o;

		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page'] = $_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging'] = $this->dokumen_lampau_model->paging2($gal, $p);
		$data['sub_dokumen_lampau'] = $this->dokumen_lampau_model->list_sub_dokumen_lampau($gal, $o, $data['paging']->offset, $data['paging']->per_page);
		$data['dokumen_lampau'] = $gal;
		$data['sub'] = $this->dokumen_lampau_model->get_dokumen_lampau($gal);
		$data['keyword'] = $this->dokumen_lampau_model->autocomplete();
		$this->set_minsidebar(1);
		$this->render('dokumen_lampau/sub_dokumen_lampau_table', $data);
	}

	public function form_sub_dokumen_lampau($dokumen_lampau=0, $id=0)
	{
		if ($id)
		{
			$data['dokumen_lampau'] = $this->dokumen_lampau_model->get_dokumen_lampau($id);
			$data['form_action'] = site_url("dokumen_lampau/update_sub_dokumen_lampau/$dokumen_lampau/$id");
		}
		else
		{
			$data['dokumen_lampau'] = null;
			$data['form_action'] = site_url("dokumen_lampau/insert_sub_dokumen_lampau/$dokumen_lampau");
		}
		$data['album']=$dokumen_lampau;
		$this->set_minsidebar(1);
		$this->render('dokumen_lampau/form_sub_dokumen_lampau', $data);
	}

	public function insert_sub_dokumen_lampau($dokumen_lampau='')
	{
		$this->dokumen_lampau_model->insert_sub_dokumen_lampau($dokumen_lampau);
		redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
	}

	public function update_sub_dokumen_lampau($dokumen_lampau='', $id='')
	{
		$this->dokumen_lampau_model->update_sub_dokumen_lampau($id);
		redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
	}

	public function delete_sub_dokumen_lampau($dokumen_lampau='', $id='')
	{
		$this->redirect_hak_akses('h', "dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
		$this->dokumen_lampau_model->delete($id);
		redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
	}

	public function delete_all_sub_dokumen_lampau($dokumen_lampau='')
	{
		$this->redirect_hak_akses('h', "dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
		$_SESSION['success']=1;
		$this->dokumen_lampau_model->delete_all();
		redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
	}

	public function dokumen_lampau_lock_sub_dokumen_lampau($dokumen_lampau='', $id='')
	{
		$this->dokumen_lampau_model->dokumen_lampau_lock($id, 1);
		redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
	}

	public function dokumen_lampau_unlock_sub_dokumen_lampau($dokumen_lampau='', $id='')
	{
		$this->dokumen_lampau_model->dokumen_lampau_lock($id, 2);
		redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
	}

	public function urut($id, $arah = 0, $dokumen_lampau='')
	{
		$this->dokumen_lampau_model->urut($id, $arah, $dokumen_lampau);
		if ($dokumen_lampau != '')
			redirect("dokumen_lampau/sub_dokumen_lampau/$dokumen_lampau");
		else
			redirect("dokumen_lampau/index");
	}
}
