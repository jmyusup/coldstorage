<?php

class Home extends CI_Controller {

	/**
	 * Home controller.
	 * Developer @Jajang M Yusuf
	 */

	function __construct()
	{
		parent::__construct();
		permissionUserLoggedIn($this->session);
		$this->load->model('home_model');
	}

  public function index()
	{
    $data = array(
			'jumlahMaterial' => $this->home_model->getCountMaterial()->jumlahmaterial,
			'jumlahUser' => $this->home_model->getCountUser()->jumlahuser,
		);
    $data['title']      = 'Home';
		$data['content'] 		= 'home';
		$data['breadcrum'] 	= array(
												    array("ColdStorage PT Dirgantara Indonesia",'#'),
												    array("Home",'#'),
												    array("Index",'')
													);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
