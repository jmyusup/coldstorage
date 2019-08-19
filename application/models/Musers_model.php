<?php

class Musers_model extends CI_Model {

  function __construct(){
      parent::__construct();
  }

	function getAll(){
		$this->db->where('muser.status','1');
		$query = $this->db->get('muser');
		return $query->result();
  }

	function getSpecified($id){
		$this->db->where('muser.id',$id);
		$query = $this->db->get('muser');
    return $query->row();
  }

	function save(){
		$this->nik 				    = $_POST['nik'];
		$this->nama 				  = $_POST['nama'];
		$this->username 			= $_POST['username'];
		$this->idhakakses 	  = $_POST['idhakakses'];
		$this->status 			  = 1;

		($_POST['password'] !='')? $this->password = md5($_POST['password']) : $this->password = md5('123456');

		if($this->upload()){
			$this->db->insert('muser', $this);
			return true;
		}else{
			$this->errorMessage = "Penyimpanan Gagal";
			return false;
		}
  }

  function update(){
		$this->nik 				    = $_POST['nik'];
		$this->nama 				  = $_POST['nama'];
		$this->username 			= $_POST['username'];
		$this->idhakakses 	  = $_POST['idhakakses'];
		$this->status 			  = 1;

		if($_POST['password'] !='') $this->password = md5($_POST['password']);

		if($this->upload(true)){
			$this->db->update('muser', $this, array('id' => $_POST['id']));
			return true;
		}else{
			$this->errorMessage = "Penyimpanan Gagal";
			return false;
		}
  }

	function remove($id){
		$this->status = 0;

		if($this->db->update('muser', $this, array('id' => $id))){
			$this->remove_image($id);
			return true;
		}else{
			$this->errorMessage = "Penyimpanan Gagal";
			return false;
		}
  }

	function upload($update = false){
		if(isset($_FILES['foto'])){
			if($_FILES['foto']['name'] != ''){
				$config['upload_path'] = './assets/upload/users_avatar';
				$config['allowed_types'] = 'jpg|bmp';
				$config['encrypt_name']  = TRUE;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')){
					$image_upload = $this->upload->data();
					$this->foto = $image_upload['file_name'];

					if($update == true) $this->remove_image($_POST['id']);

					return true;
				}else{
					$this->errorMessage = $this->upload->display_errors();
					return false;
				}
			}else{
				return true;
			}
		}else{
			return true;
		}

	}

	function remove_image($id){
		$row = $this->getSpecified($id);
		if(file_exists('./assets/upload/users_avatar/'.$row->foto) && $row->foto !='') {
			unlink('./assets/upload/users_avatar/'.$row->foto);
		}
	}

	function sign_in($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('muser');

		if($query->num_rows() > 0){
			$row = $query->row();
			$data = array(
      					'user_id' 					=> $row->id,
      					'user_avatar' 			=> $row->foto,
      					'user_name' 				=> $row->nama,
      					'user_username' 		=> $row->username,
      					'user_password' 		=> $row->password,
      					'user_permission' 	=> $row->idhakakses,
      					'logged_in'  				=> TRUE,
    					);
			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}

	function sign_out(){
		$data = array(
  					   'user_id'  				  => $this->session->userdata('user_id'),
  					   'user_avatar'  			=> $this->session->userdata('user_avatar'),
  					   'user_name'  			  => $this->session->userdata('user_name'),
  					   'user_username'  		=> $this->session->userdata('user_username'),
  					   'user_permission'  	=> $this->session->userdata('user_permission'),
  					   'logged_in'    			=> $this->session->userdata('logged_in'),
  					);
		$this->session->unset_userdata($data);
    $this->session->sess_destroy();
	}
}

?>
