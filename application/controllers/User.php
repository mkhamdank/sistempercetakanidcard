<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','file');
		$this->load->library('form_validation');
		$this->load->model('User_model');
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
				$data['user'] = $this->User_model->getUser();

				if ($level == 1) {
					$this->load->view('user/view_user', $data);
				}

		}
		else{
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

				$this->User_model->deleteUser($id);
				echo "<script>alert('Hapus Data Berhasil.')</script>";
				redirect('User','refresh');
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

				$this->form_validation->set_rules('username', 'username', 'trim|required');
				$this->form_validation->set_rules('password', 'password', 'trim|required');
				$this->form_validation->set_rules('nama', 'nama' ,'trim|required');
				$this->form_validation->set_rules('seksi', 'Seksi', 'trim|required');

				$data['level'] = $level;
				$data['nama'] = $nama;	

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('user/create', $data);
				} else {
					$this->User_model->createUser();
					echo "<script>alert('Tambah Data Berhasil.')</script>";
					redirect('User','refresh');
				}
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function update($id_user)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->form_validation->set_rules('username', 'username', 'trim|required');
				$this->form_validation->set_rules('password', 'password', 'trim|required');
				$this->form_validation->set_rules('nama', 'nama' ,'trim|required');
				$this->form_validation->set_rules('seksi', 'Seksi', 'trim|required');

				$data['level'] = $level;
				$data['nama'] = $nama;	
				$data['user'] = $this->User_model->getUserById($id_user);

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('user/update', $data);
				} else {
					$this->User_model->updateUser($id_user);
					echo "<script>alert('Update Data Berhasil.')</script>";
					redirect('User','refresh');
				}
		} 
		else {
			redirect('login','refresh');
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */ ?>