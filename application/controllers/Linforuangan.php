<?php

class Linforuangan extends CI_Controller {

	/**
	 * Laporan Stok controller.
	 * Developer @Jajang M Yusuf
	 */

	function __construct()
	{
		parent::__construct();
		permissionUserLoggedIn($this->session);

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('Linforuangan_model');
	}

  public function index()
	{
    $data = array();
    $data['tanggal_awal']   = date("Y-m-d");
    $data['tanggal_akhir']  = date("Y-m-d");
    $data['title']          = 'Laporan Info Ruangan';
		$data['content'] 		    = 'laporan/linforuangan';
    $data['laporan']        = $this->Linforuangan_model->getLaporan();
		$data['breadcrum'] 		  = array(
  															array("ColdStorage PT Dirgantara Indonesia",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Ruangan",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
