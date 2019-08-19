<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Temperature extends REST_Controller
{
	public function index_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Query Database
		$this->db->limit(1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('inforuangan');
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

	public function index_post()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$data = json_decode(file_get_contents('php://input'),TRUE);

		$suhu = $data['data']['temperature'];
		$kelembaban = $data['data']['humidity'];

		// Query Database
		$data = array();
		$data['tanggal'] = date("Y-m-d H:i:s");
		$data['suhu'] = $suhu;
		$data['kelembaban'] = $kelembaban;

		// Query Database & Response
		if ($this->db->on_duplicate('inforuangan', $data)) {
			$this->response([
				'status' => true,
				'message' => 'no message'
			]);

		} else {
			$this->response([
				'status' => false,
				'message' => 'error'
			]);
		}
	}

	public function history_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Query Database
		$this->db->order_by('id', 'DESC');
		$this->db->limit(20);
		$query = $this->db->get('inforuangan');
		$data = $query->result();

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

	public function lasthistory_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Query Database
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('inforuangan');
		$data = $query->row();

		// Response
		if ($query->num_rows() > 0) {
			$this->response([
				'status' => true,
				'message' => 'no message',
				'data' => $data->suhu
			]);
		} else {
			$this->response([
				'status' => false,
				'message' => 'error',
				'data' => array()
			]);
		}
	}

	public function filter_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$tanggal = $this->get('tanggal');

		// Query Database
		$this->db->where('DATE(tanggal)', $tanggal);
		$query = $this->db->get('inforuangan');
		$data = $query->result();

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

	public function totalhistory_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Query Database
		$this->db->select('COUNT(id) AS jumlahhistory');
        $query = $this->db->get('inforuangan');
		$data = $query->row();

		// Response
		if ($query->num_rows() > 0) {
			$this->response([
				'status' => true,
				'message' => 'no message',
				'data' => $data->jumlahhistory
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
