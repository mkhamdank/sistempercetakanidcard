<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getUser()
	{
		$data = $this->db->get('login');
		return $data->result();
	}

	public function getUserById($id_login)
	{
		$this->db->where('id_login', $id_login);
		return $this->db->get('login')->result();
	}

	public function createUser()
	{
		$object = array(
			'username'=>$this->input->post('username'),
			'password' =>md5($this->input->post('password')),
			'nama' =>$this->input->post('nama'),
			'seksi' => $this->input->post('seksi'),
			'level' => $this->input->post('level'),
		);
		$this->db->insert('login', $object);
	}

	public function updateUser($id_login)
	{
		$object = array(
			'username'=>$this->input->post('username'),
			'password' =>md5($this->input->post('password')),
			'nama' =>$this->input->post('nama'),
			'seksi' => $this->input->post('seksi'),
			'level' => $this->input->post('level')
		);
		$this->db->where('id_login', $id_login);
		$this->db->update('login', $object);
	}

	public function deleteUser($id_login)
	{
		$this->db->where('id_login', $id_login);
		$this->db->delete('login');
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */ ?>