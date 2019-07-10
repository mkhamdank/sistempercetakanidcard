<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_model extends CI_Model {

	public function create($mulai_bekerja,$finish_work)
	{
		$object = array('nama_perusahaan' => $this->input->post('nama_perusahaan'),
		'alias' => $this->input->post('alias'),
		'safety_permit_number' => $this->input->post('safety_permit_number'),
		// 'mulai_bekerja' => date("m-d-Y", strtotime($this->input->post('mulai_bekerja'))),
		'mulai_bekerja' => $mulai_bekerja,
		'finish_work' => $finish_work,
		'reg_date' => date("Y/m/d"),
		// 'reg_date' => $mulai_bekerja,
		'foto_safety_permit' => $this->upload->data('file_name'),
		'jumlah_personil' => '0',
		'pic' => $this->input->post('pic'));
		$this->db->insert('perusahaan', $object);
	}

	function search_perusahaan($title){
		// $this->db->select('nama_perusahaan,alias');
        $this->db->like('nama_perusahaan', $title);
        // $this->db->order_by('nama_perusahaan', 'ASC');
        $this->db->distinct();
        $this->db->limit(10);
        return $this->db->get('perusahaan')->result();
    }

    function search_alias($title){
		// $this->db->select('nama_perusahaan,alias');
        // $this->db->like('nama_perusahaan', $title);
        $this->db->select('alias');
        $this->db->like('nama_perusahaan', $title);
        // $this->db->order_by('nama_perusahaan', 'ASC');
        $this->db->distinct();
        $this->db->limit(10);
        return $this->db->get('perusahaan')->result();
    }

	public function getPerusahaanById($id_perusahaan)
	{
		$this->db->where('id_perusahaan', $id_perusahaan);
		return $this->db->get('perusahaan')->result();
	}

	public function getPerusahaan()
	{
		$this->db->order_by('reg_date', 'desc');
		$data = $this->db->get('perusahaan');
		return $data->result();
	}

	public function getPerusahaanByNama($nama_perusahaan)
	{
		$this->db->order_by('id_perusahaan', 'asc');
		$this->db->where('nama_perusahaan', $nama_perusahaan);
		return $this->db->get('perusahaan')->result();
	}

	public function updateJumlah($id_perusahaan,$jumlah_personil)
	{
		$data = array(
					'jumlah_personil' => $jumlah_personil);
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->update('perusahaan', $data);
	}

	public function updateById($id_perusahaan)
	{
		$data = array('nama_perusahaan' =>$this->input->post('nama_perusahaan'),
					'alias' =>$this->input->post('alias'),
					'safety_permit_number' =>$this->input->post('safety_permit_number'),
					'mulai_bekerja' =>$this->input->post('mulai_bekerja'),
					'finish_work' =>$this->input->post('finish_work'),
					// 'reg_date' =>$this->input->post('reg_date'),
					'foto_safety_permit'=>$this->upload->data('file_name'),
					'jumlah_personil' => $this->input->post('jumlah_personil'),
					'pic' => $this->input->post('pic'));
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->update('perusahaan', $data);
	}

	public function updateById2($id_perusahaan)
	{
		$data = array('nama_perusahaan' =>$this->input->post('nama_perusahaan'),
					'alias' =>$this->input->post('alias'),
					'safety_permit_number' =>$this->input->post('safety_permit_number'),
					'mulai_bekerja' =>$this->input->post('mulai_bekerja'),
					'finish_work' =>$this->input->post('finish_work'),
					// 'reg_date' =>$this->input->post('reg_date'),
					'jumlah_personil' => $this->input->post('jumlah_personil'),
					'pic' => $this->input->post('pic'));
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->update('perusahaan', $data);
	}

	public function delete($id_perusahaan)
	{
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->delete('perusahaan');
	}

}

/* End of file Perusahaan_model.php */
/* Location: ./application/models/Perusahaan_model.php */