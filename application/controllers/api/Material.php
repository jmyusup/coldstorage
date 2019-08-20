<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Material extends REST_Controller
{
	public function index_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Query Database
		$query = $this->db->get('mmaterial');
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

	public function filter_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$nama = $this->get('nama');
		$umur = $this->get('umur');
		// $jumlah = $this->post('jumlah');

		// Query Database
		$this->db->where('nama LIKE ', $nama.'%');
		$this->db->where('umur >=', $umur);
		// $this->db->where('jumlah >=', $jumlah);
		$query = $this->db->get('mmaterial');
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

	public function filterbarcode_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$kode = $this->get('kode');
		// $umur = $this->post('umur');
		// $jumlah = $this->post('jumlah');

		// Query Database
		$this->db->where('kode LIKE ', $kode.'%');
		// $this->db->where('umur >=', $umur);
		// $this->db->where('jumlah >=', $jumlah);
		$query = $this->db->get('mmaterial');
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

	public function filterid_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$id = $this->get('id');

		// Query Database
		$this->db->where('id =', $id);
		$query = $this->db->get('mmaterial');
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

	public function materialdetail_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$idmaterial = $this->get('idmaterial');

		// Query Database
		$this->db->where('mmaterial.id =', $idmaterial);
		$this->db->join('mmaterial_history', 'mmaterial_history.idmaterial = mmaterial.id', 'left');
		// $this->db->group_by('mmaterial.id');
		$query = $this->db->get('mmaterial');
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

	public function useit_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$idmaterial = $this->get('idmaterial');
		$tanggal = date("Y-m-d");
		$jampemakaian = date("H:i:s");

		$this->db->select('umur');
		$this->db->where('id', $idmaterial);
		$query = $this->db->get('mmaterial');
		$row = $query->row();

		if ($row) {
			$kadaluarsa = date("Y-m-d H:i:s", strtotime($tanggal." ".$jampemakaian."+".$row->umur." hours"));
		}

		// Query Database
		$data = array();
		$data['statusmaterial'] = '1';
		
		// Query Database
		$datadetail = array();
		$datadetail['idmaterial'] = $idmaterial;
		$datadetail['tanggal'] = $tanggal;
		$datadetail['jampemakaian'] = $jampemakaian;
		$datadetail['kadaluarsa'] = $kadaluarsa;

		// Query Database & Response

		$this->db->insert('mmaterial_history',$datadetail);
		
		$this->db->where('id', $idmaterial);
		$this->db->update('mmaterial', $data);
	}

	public function finished_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Parameter
		$idmaterial = $this->get('idmaterial');
		$jamselesai = date("H:i:s");

		$this->db->select('mmaterial_history.id as idhistory, jampemakaian, umur');
		$this->db->order_by('idhistory','desc');
		$this->db->limit(1);
		$this->db->join('mmaterial', 'mmaterial.id = mmaterial_history.idmaterial');
		$this->db->where('idmaterial', $idmaterial);
		$query = $this->db->get('mmaterial_history');
		$row = $query->row();

		$waktuterpakai = $jamselesai-$row->jampemakaian;
		if ($row) {
			$idhistory = $row->idhistory;
			$umur = $row->umur - $waktuterpakai;
		}

		// Query Database
		$data = array();
		$data['umur'] = $umur;
		$data['statusmaterial'] = '0';
		
		// Query Database
		$datadetail = array();
		$datadetail['jamselesai'] = $jamselesai;		

		// Query Database & Response
		$this->db->where('id', $idhistory);
		$this->db->update('mmaterial_history',$datadetail);
		
		$this->db->where('id', $idmaterial);
		$this->db->update('mmaterial', $data);
	}

	// public function finished_post()
	// {
    //     header('Access-Control-Allow-Origin: *');
	// 	// Parameter
	// 	$idhistory = $this->post('idhistory');
	// 	$jumlahterpakai = $this->post('jumlah');
	// 	$jamselesai = date("H:i:s");

	// 	// Query Database & Response
	// 	$this->db->set('jamselesai', $jamselesai);
	// 	$this->db->set('jumlahterpakai', $jumlahterpakai);
	// 	$this->db->where('id', $idhistory);
	// 	if ($this->db->update('mmaterial_history', $this)) {

	// 		$this->db->select('mmaterial.umur AS umursebelumnya, mmaterial.jumlah AS jumlahsebelumnya, mmaterial_history.*');
	// 		$this->db->join('mmaterial', 'mmaterial.id = mmaterial_history.idmaterial');
	// 		$this->db->where('mmaterial_history.id', $idhistory);
	// 		$query = $this->db->get('mmaterial_history');
	// 		$row = $query->row();

	// 		if ($row) {
	// 			$sisaumur = $row->umursebelumnya - ($jamselesai - $row->jampemakaian);
	// 			$sisajumlah = $row->jumlahsebelumnya - $jumlahterpakai;

	// 			$data = array();
	// 			$data['umur'] = $sisaumur;
	// 			$data['jumlah'] = $sisajumlah;
	// 			$data['referensi'] = null;

	// 			$this->db->where('id', $row->idmaterial);
	// 			$this->db->update('mmaterial', $data);

	// 			$this->response([
	// 				'status' => true,
	// 				'message' => 'no message'
	// 			]);
	// 		}
	// 	} else {
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'error'
	// 		]);
	// 	}
	// }

	public function totalmaterial_get()
	{
        header('Access-Control-Allow-Origin: *');
		// Query Database
		$this->db->select('COUNT(id) AS jumlahmaterial');
        $query = $this->db->get('mmaterial');
		$data = $query->row();

		// Response
		if ($query->num_rows() > 0) {
			$this->response([
				'status' => true,
				'message' => 'no message',
				'data' => $data->jumlahmaterial
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
