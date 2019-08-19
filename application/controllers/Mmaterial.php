<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class Mmaterial extends CI_Controller {

	/**
	 * Mmaterial controller.
	 * Developer @Jajang M Yusuf
	 */

	public function __construct()
  	{
		parent::__construct();
		permissionUserLoggedIn($this->session);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('Mmaterial_model');
  	}

	function index(){
		$data = array();
		$data['error'] 			= '';
		$data['title'] 			= 'Material';
		$data['content'] 		= 'Mmaterial/index';
		$data['breadcrum'] 	= array(
														array("ColdStorage PT Dirgantara Indonesia",'#'),
														array("Material",'#'),
									    			array("List",'Material')
													);

		$data['list_index'] = $this->Mmaterial_model->getAll();

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template', $data);
	}

	function create(){
		$data = array(
			'id' 			=> '',
			'kode' 		=> '',
			'nama' 		=> '',
			'lokasi' 	=> '',
			'umur' 		=> '',
			// 'jumlah' 	=> '',
			'status' 	=> ''
		);

		$data['error'] 			= '';
		$data['title'] 			= 'Tambah Material';
		$data['content'] 		= 'Mmaterial/manage';
		$data['breadcrum']	= array(
														array("ColdStorage PT Dirgantara Indonesia",'#'),
														array("Material",'#'),
									    			array("Tambah",'Material')
													);

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template', $data);
	}

	function update($id){
		if($id != ''){
			$row = $this->Mmaterial_model->getSpecified($id);
			if(isset($row->id)){
				$data = array(
					'id' 						=> $row->id,
					'kode' 					=> $row->kode,
					'nama' 					=> $row->nama,
					'lokasi' 				=> $row->lokasi,
					'umur' 					=> $row->umur,
					// 'jumlah' 				=> $row->jumlah,
					'status' 				=> $row->status
				);
				$data['error'] 			= '';
				$data['title'] 			= 'Ubah Material';
				$data['content']	 	= 'Mmaterial/manage';
				$data['breadcrum'] 	= array(
																array("ColdStorage PT Dirgantara Indonesia",'#'),
																array("Material",'#'),
											    			array("Ubah",'Material')
															);

				$data = array_merge($data, backend_info());
				$this->parser->parse('module_template', $data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','data tidak ditemukan.');
				redirect('Mmaterial','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('Mmaterial');
		}
	}

	function qrcode($id){
		if($id != ''){
			$row = $this->Mmaterial_model->getSpecified($id);
			if(isset($row->id)){
				$data = array(
					'id' => $row->id,
					'kode' => $row->kode,
					'nama' => $row->nama,
					'repeat' => 4
				);
	
				$data['error'] 			= '';
				$data['title'] 			= 'QRCode Material';
				$data['content']	 	= 'Mmaterial/qrcode';
				$data['breadcrum'] 	= array(
											array("ColdStorage PT Dirgantara Indonesia",'#'),
											array("Material",'#'),
											array("QRCode",'Material')
										);

				$data = array_merge($data, backend_info());
				$this->parser->parse('module_template', $data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','data tidak ditemukan.');
				redirect('Mmaterial','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('Mmaterial');
		}
	}

	public function print_qrcode($id)
	{
		$row = $this->Mmaterial_model->getSpecified($id);
		if($row){
			$data = array(
				'id' => $row->id,
				'kode' => $row->kode,
				'nama' => $row->nama,
				'repeat' => 4,
			);

			// instantiate and use the dompdf class
			$options = new Options();
			$options->set('isRemoteEnabled', true);
			$dompdf = new Dompdf($options);

			$html = $this->load->view('Mmaterial/printqrcode', $data, true);
			$dompdf->loadHtml($html);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portrait');

			// Render the HTML as PDF
			$dompdf->render();

			// // Output the generated PDF to Browser
			$dompdf->stream('Barcode '.$row->nama.'.pdf', array("Attachment" => false));
		}
	}

	function delete($id){
		$this->Mmaterial_model->softDelete($id);
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','data telah terhapus.');
		redirect('Mmaterial','location');
	}

	function save(){
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|regex_match[/^[a-zA-Z0-9-.]+$/]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|regex_match[/^[a-zA-Z0-9 ]+$/]');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|regex_match[/^[a-zA-Z0-9. ]+$/]');
		$this->form_validation->set_rules('umur', 'Umur', 'trim|required|regex_match[/^[0-9]+$/]|greater_than[0]');
		// $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->Mmaterial_model->saveData()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','data telah tersimpan.');
					redirect('Mmaterial','location');
				}
			} else {
				if($this->Mmaterial_model->updateData()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','data telah tersimpan.');
					redirect('Mmaterial','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id){
		$data = $this->input->post();
		$data['error'] 	 = validation_errors();
		$data['content'] = 'Mmaterial/manage';

		if($id==''){
			$data['title'] = 'Tambah Material';
			$data['breadcrum'] = array(
															array("ColdStorage PT Dirgantara Indonesia",'#'),
															array("Material",'#'),
															array("Tambah",'Material')
													);
		}else{
			$data['title'] = 'Ubah Material';
			$data['breadcrum'] = array(
															array("ColdStorage PT Dirgantara Indonesia",'#'),
															array("Material",'#'),
															array("Ubah",'Material')
													);
		}

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function barcode_pdf(){

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);
	
		$this->load->library('pdf');
	
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "barcode.pdf";
		$this->pdf->load_view('mmaterial/barcode_pdf', $data);
	
	}
}
