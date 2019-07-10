<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capture extends CI_Controller {

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
				$this->load->model('Perusahaan_model');
				$this->load->model('Person_model');
				$this->load->model('Capture_model');
		}
		else {
			redirect('login','refresh');
		}
	}

	public function index()
	{
	}

	public function diri()
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->load->view('capture/diri');
		}
		else {
			redirect('login','refresh');
		}
	}

	public function capture_diri()
	{
		$image = $this->input->post('image');
		$nama_foto = $this->input->post('nama_foto');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$this->input->post('nama_foto');
		$filename = $nama_foto.'.jpg';
		// $filename = $this->input->post('fk_foto');
		file_put_contents(FCPATH.'/assets/uploads/'.$filename,$image);
		$data = array(
			'image' => $filename,
		);

		// $res = $this->Capture_model->insert_diri($data);
		// echo json_encode($res);
	}

	public function capture_ktp()
	{
		$image = $this->input->post('image');
		$nama_foto = $this->input->post('nama_foto');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$this->input->post('nama_foto');
		$filename = 'ktp_'.$nama_foto.'.jpg';
		// $filename = $this->input->post('fk_foto');
		file_put_contents(FCPATH.'/assets/uploads/'.$filename,$image);
		$data = array(
			'image' => $filename,
		);

		// $res = $this->Capture_model->insert_ktp($data);
		// echo json_encode($res);
	}

	public function ktp()
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->load->view('capture/ktp');
		}
		else {
			redirect('login','refresh');
		}
	}

}

/* End of file Capture.php */
/* Location: ./application/controllers/Capture.php */