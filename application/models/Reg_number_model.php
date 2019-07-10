<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_number_model extends CI_Model {

	public function getRegNum()
	{
		return $this->db->get('reg_number')->result();
	}

	public function getRegNumById($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('reg_number')->result();
	}

	public function insert()
	{
		$object = array('reg_number' => $this->input->post('reg_number') );
		$this->db->insert('reg_number', $object);
	}

	public function update($id,$reg)
	{
		$this->db->where('id', $id);
		$object = array('reg_number' => $reg );
		$this->db->update('reg_number', $object);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('reg_number');
	}

}

/* End of file Reg_number_model.php */
/* Location: ./application/models/Reg_number_model.php */