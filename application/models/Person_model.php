<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model {

	public function getPerson()
	{
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = person.fk_perusahaan', 'join');
		return $this->db->get('person')->result();
	}

	public function getPersonLast()
	{
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = person.fk_perusahaan', 'join');
		$this->db->order_by('RIGHT(reg_num,6)', '');
		return $this->db->get('person')->result();
	}

	public function getPersonById($id_person)
	{
		$this->db->where('id_person', $id_person);
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = person.fk_perusahaan', 'join');
		return $this->db->get('person')->result();
	}

	public function getPersonByPerusahaan($fk_perusahaan)
	{
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = person.fk_perusahaan', 'join');
		$this->db->where('fk_perusahaan', $fk_perusahaan);
		return $this->db->get('person')->result();
	}

	public function create($nama,$no_ktp,$address,$reg_num,$fk_perusahaan,$foto,$fotoktp)
	{
		$object = array(
		'nama' => $nama,
		'address' => $address,
		'fk_perusahaan' => $fk_perusahaan,
		'reg_num' => $reg_num,
		'foto_ktp' => $fotoktp,
		'foto_diri' => $foto,
		'status_cetak' => '0');
		$this->db->insert('person', $object);
	}

	public function updateById($id_person,$foto_diri,$foto_ktp)
	{
		$data = array('nama' =>$this->input->post('nama'),
					'address' =>$this->input->post('address'),
					'reg_num' =>$this->input->post('reg_num'),
					'foto_diri' =>$foto_diri,
					'foto_ktp' =>$foto_ktp);
		$this->db->where('id_person', $id_person);
		$this->db->update('person', $data);
	}

	public function updateFotoDiri($id_person,$foto_diri)
	{
		$data = array('nama' =>$this->input->post('nama'),
					'address' =>$this->input->post('address'),
					'reg_num' =>$this->input->post('reg_num'),
					'foto_diri' =>$foto_diri);
		$this->db->where('id_person', $id_person);
		$this->db->update('person', $data);
	}

	public function updateFotoKtp($id_person,$foto_ktp)
	{
		$data = array('nama' =>$this->input->post('nama'),
					'address' =>$this->input->post('address'),
					'reg_num' =>$this->input->post('reg_num'),
					'foto_ktp' =>$foto_ktp);
		$this->db->where('id_person', $id_person);
		$this->db->update('person', $data);
	}

	public function updateByIdTanpaFoto($id_person)
	{
		$data = array('nama' =>$this->input->post('nama'),
					'address' =>$this->input->post('address'),
					'reg_num' =>$this->input->post('reg_num'));
		$this->db->where('id_person', $id_person);
		$this->db->update('person', $data);
	}

	public function updateStatusCetak($id_person)
	{
		$data = array('status_cetak' => '1');
		$this->db->where('id_person', $id_person);
		$this->db->update('person', $data);
	}

	public function delete($id_person)
	{
		$this->db->where('id_person', $id_person);
		$this->db->delete('person');
	}

	
}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>