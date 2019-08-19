<?php

class Musers extends CI_Controller {

	/**
	 * Users controller.
	 * Developer @Jajang M Yusuf
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('musers_model');
	}

	function index(){
		permissionUserLoggedIn($this->session);

		$data = array();
		$data['error'] 			= '';
		$data['title'] 			= 'Users';
		$data['content'] 		= 'Musers/index';
		$data['breadcrum'] 	= array(
										array("ColdStorage PT Dirgantara Indonesia",'#'),
										array("Users",'#'),
										array("List",'musers')
									);

		$data['list_index'] = $this->musers_model->getAll();

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	function add(){
		permissionUserLoggedIn($this->session);

		$data = array(
			'id' 				=> '',
			'nik' 				=> '',
			'foto' 				=> '',
			'nama' 				=> '',
			'username' 			=> '',
			'password' 			=> '',
			'idhakakses' 		=> '',
			'status' 			=> '',
		);
		$data['error'] 			= '';
		$data['title'] 			= 'Tambah User';
		$data['content'] 		= 'Musers/manage';
		$data['breadcrum']	 = array(
										array("ColdStorage PT Dirgantara Indonesia",'#'),
										array("Users",'#'),
										array("Tambah",'musers')
									);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	function edit($id){
		permissionUserLoggedIn($this->session);

		if($id != ''){
			$row = $this->musers_model->getSpecified($id);
			if(isset($row->id)){
				$data = array(
					'id' 				=> $row->id,
					'nik' 				=> $row->nik,
					'foto' 				=> $row->foto,
					'nama' 				=> $row->nama,
					'username' 			=> $row->username,
					'password' 			=> $row->password,
					'idhakakses' 		=> $row->idhakakses,
					'status' 			=> $row->status,
				);
				$data['error'] 			= '';
				$data['title'] 			= 'Ubah User';
				$data['content']	 	= 'Musers/manage';
				$data['breadcrum'] 	= array(
												array("ColdStorage PT Dirgantara Indonesia",'#'),
												array("Users",'#'),
											    array("Ubah",'musers')
											);

				$data = array_merge($data,backend_info());
				$this->parser->parse('module_template',$data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','data tidak ditemukan.');
				redirect('musers','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('musers');
		}
	}

	function save(){
		permissionUserLoggedIn($this->session);

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|max_length[6]|regex_match[/^[0-9-]+$/]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[1]|regex_match[/^[a-zA-Z ]+$/]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|regex_match[/^[a-zA-Z0-9]+$/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('idhakakses', 'Permission', 'trim|required|min_length[1]');

		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->musers_model->save()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','data telah tersimpan.');
					redirect('musers','location');
				}
			} else {
				if($this->musers_model->update()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','data telah tersimpan.');
					redirect('musers','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id, $image=false){
		permissionUserLoggedIn($this->session);

		$data = $this->input->post();
		$data['foto'] 						= '';
		$data['error'] 						= validation_errors();
		$data['content'] 					= 'Musers/manage';

		if($image) $data['error']  .= $this->musers_model->errorMessage;

		if($id==''){
			$data['title'] = 'Tambah User';
			$data['breadcrum'] = array(
											array("ColdStorage PT Dirgantara Indonesia",'#'),
											array("Users",'#'),
											array("Tambah",'musers')
										);
		}else{
			$data['title'] = 'Ubah User';
			$data['breadcrum'] = array(
											array("ColdStorage PT Dirgantara Indonesia",'#'),
											array("Users",'#'),
											array("Ubah",'musers')
										);
		}

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	function remove($id){
		permissionUserLoggedIn($this->session);

		$this->musers_model->remove($id);
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','data telah terhapus.');
		redirect('musers','location');
	}

	function profile(){
		permissionUserLoggedIn($this->session);

		if($this->session->userdata('user_id') != ''){
			$row = $this->musers_model->getSpecified($this->session->userdata('user_id'));
			if(isset($row->id)){
				$data = array(
						'id' 				=> $row->id,
						'nik' 				=> $row->nik,
						'foto' 				=> $row->foto,
						'nama' 				=> $row->nama,
						'username' 			=> $row->username,
						'password' 			=> $row->password,
						'idhakakses' 		=> $row->idhakakses,
						'status' 			=> $row->status,
						);
				$data['error'] = '';
				$data['title'] = 'Ubah Profile';
				$data['content'] = 'Musers/profile';
				$data['breadcrum'] = array(
												array("ColdStorage PT Dirgantara Indonesia",'home'),
												array("Users",'musers'),
												array("Profile",'#')
											);

				$data = array_merge($data,backend_info());
				$this->parser->parse('module_template',$data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','data tidak ditemukan.');
				redirect('home','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('home');
		}
	}

	function profile_update(){
		permissionUserLoggedIn($this->session);
		
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[1]|regex_match[/^[0-9-]+$/]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[1]|regex_match[/^[a-zA-Z0-9 ]+$/]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|regex_match[/^[a-zA-Z0-9]+$/]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('idhakakses', 'Permission', 'trim|required|min_length[1]');

		if ($this->form_validation->run() == TRUE){
			if($this->musers_model->update()){
				$this->session->set_flashdata('confirm',true);
				$this->session->set_flashdata('message_flash','data telah tersimpan.');
				redirect('musers/profile','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak berhasil disimpan.');
			redirect('musers/profile','location');
		}
	}

	function sign_in(){
		permissionUserLoggin($this->session);

		$data = array('username' => '', 'remember' => FALSE, 'error' => '');
		$data = array_merge($data,backend_info());
		$this->load->view('Musers/login_area',$data);
	}

	function dosign_in(){
		permissionUserLoggin($this->session);

		$username	=  $this->input->post('username');
		$password =  $this->input->post('password');
		 
		if ($username == '') {
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','username harus diisi.');
		} else if ($password == '') {
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','password harus diisi.');
		}

		//call the model for auth
		if($this->musers_model->sign_in($username, $password)){
			redirect('home','location');
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','username atau password salah.');
			redirect('musers/sign_in','location');
		}
	}

	function sign_out(){
		permissionUserLoggedIn($this->session);

		$this->musers_model->sign_out();
		redirect('musers/sign_in','location');
	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
