<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Login extends REST_Controller
{
	public function index_post()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$username = $this->post('username');
		$password = $this->post('password');

		// Query Database
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('muser');
		$data = $query->row();

		// Response
		if ($query->num_rows() > 0) {
			$this->response([
				'status' => true,
				'message' => 'no message',
				'data' => $data
			]);
		} else {
			$this->response([
				'status' => false,
				'message' => 'error',
				'data' => array()
			]);
		}
	}
}
