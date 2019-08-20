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

		if ($suhu > -18) {
			// API access key from Google API's Console
			define( 'API_ACCESS_KEY', 'AAAAKGQdmfs:APA91bGIewuTtE-guUR1GL_DRHmQKy0vHnRfkGZ66GuJShyoB8cKrLjFE0pCGW0MomDwOBdB7V2hUXN9I5vRlmq4_m4TQICfyaN3hA96HbAjHaSJ6zjuO8JffjnLGihKNuwnOfdlD9gw');
			$to = "e_9Wf0XHo6E:APA91bHttAk3AeTWyoIxxGPEvFrSIcCaCWhp376bm2wwfotpEOn0y6AXQIfbqIEIvjg1gfMbcy2mCkmTWC98V33yL4nx2bXrWlxnhNODsZa2AjBV_d3vcaKERr3txufQ1pOdcnXaREpD";
			// prep the bundle
			$msg = array
			(
				'body'   => 'Suhu lebih dari -18 C',
				'title'     => 'WARNING!!!',
				// 'subtitle'  => 'This is a subtitle. subtitle',
				// 'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
				'vibrate'   => 1,
				'sound'     => 1,
				'largeIcon' => 'large_icon',
				'smallIcon' => 'small_icon'
			);
			$data = array
			(
				'landing_page'  => 'temperature',
				'temperature'   => $suhu
			);
			$fields = array
			(
				'priority'      =>'high',
				'restricted_package_name'=>'',
				'to'                => $to,
				'notification'      => $msg,
				'data'              => $data
			);
			
			$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
			
			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			echo $result;
		}

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
