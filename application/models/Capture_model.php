<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capture_model extends CI_Model {

	public function insert_diri($data)
	{
		$this->db->insert('foto_diri', $data);
		return $this->db->insert_id();
	}

	public function insert_ktp($data)
	{
		$this->db->insert('foto_ktp', $data);
		return $this->db->insert_id();
	}

}

/* End of file Capture_model.php */
/* Location: ./application/models/Capture_model.php */