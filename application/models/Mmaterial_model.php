<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mmaterial_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->where('status !=', '0');
        $query = $this->db->get('mmaterial');
        return $query->result();
    }

    public function getSpecified($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('mmaterial');
        return $query->row();
    }

    public function saveData()
		{
				$this->kode 	= $_POST['kode'];
				$this->nama 	= $_POST['nama'];
				$this->lokasi = $_POST['lokasi'];
				$this->umur 	= $_POST['umur'];
				$this->jumlah = $_POST['jumlah'];
				$this->status = $_POST['status'];

				if($this->db->insert('mmaterial', $this)){
					return true;
				}else{
					$this->errorMessage = "Penyimpanan Gagal";
					return false;
				}
	  }

	  public function updateData()
		{
				$this->kode 	= $_POST['kode'];
				$this->nama 	= $_POST['nama'];
				$this->lokasi = $_POST['lokasi'];
				$this->umur 	= $_POST['umur'];
				$this->jumlah = $_POST['jumlah'];
				$this->status = $_POST['status'];

				if($this->db->update('mmaterial', $this, array('id' => $_POST['id']))){
					return true;
				}else{
					$this->errorMessage = "Penyimpanan Gagal";
					return false;
				}
	  }

    public function softDelete($id)
    {
        $this->status = 0;

        if ($this->db->update('mmaterial', $this, array('id' => $id))) {
            return true;
        } else {
            $this->errorMessage = "Penyimpanan Gagal";
            return false;
        }
    }
}
