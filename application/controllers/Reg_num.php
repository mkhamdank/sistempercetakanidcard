<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_num extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->load->helper('url','form','file');
				$this->load->library('form_validation');
				$this->load->model('Reg_number_model');
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$data['level'] = $level;
				$data['nama'] = $nama;
				$data['reg_num'] = $this->Reg_number_model->getRegNum();
				$this->load->view('reg_num/view', $data);
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function create()
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$data['level'] = $level;
				$data['nama'] = $nama;

				$this->form_validation->set_rules('reg_number', 'Registration Number', 'trim|required|numeric');
				
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('reg_num/create', $data);
				} else {
					$this->Reg_number_model->insert();
					echo "<script>alert('Tambah Data Berhasil.')</script>";
					redirect('Reg_num','refresh');
				}
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function delete($id)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->Reg_number_model->delete($id);
				echo "<script>alert('Hapus Data Berhasil.')</script>";
				redirect('Reg_num','refresh');
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function update($id)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$data['level'] = $level;
				$data['nama'] = $nama;
				$data['reg_num'] = $this->Reg_number_model->getRegNumById($id);

				$this->form_validation->set_rules('reg_number', 'Registration Number', 'trim|required|numeric');
				
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('reg_num/update', $data);
				} else {
					$regnum = $this->input->post('reg_number');
					$this->Reg_number_model->update($id,$regnum);
					echo "<script>alert('Update Data Berhasil.')</script>";
					redirect('Reg_num','refresh');
				}
		} 
		else {
			redirect('login','refresh');
		}
	}

}

/* End of file Reg_num.php */
/* Location: ./application/controllers/Reg_num.php */