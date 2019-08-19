<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linforuangan_model extends CI_Model {

	
	public function getLaporan()
	{
	 $this->db->order_by("id", "desc");
		$query = $this->db->get('inforuangan');
		return $query->result();
	}
}
