<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password',MD5($password));
		$query = $this->db->get('login');
		if($query->num_rows()==1){
			return $query->result();
		}
		else{
			return false;
		}
	}

}