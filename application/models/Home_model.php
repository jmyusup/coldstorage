<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCountMaterial()
    {
        $this->db->select('COUNT(id) AS jumlahmaterial');
        $query = $this->db->get('mmaterial');
        return $query->row();
    }

    public function getCountUser()
    {
      $this->db->select('COUNT(id) AS jumlahuser');
      $query = $this->db->get('muser');
      return $query->row();
    }
}
