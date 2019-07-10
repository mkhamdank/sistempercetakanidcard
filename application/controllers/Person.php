<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','file');
		$this->load->library('form_validation');
		$this->load->model('Perusahaan_model');
		$this->load->model('Person_model');
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
				$data['person'] = $this->Person_model->getPerson();
				$this->load->view('person/view_person',$data);
		}
		else {
			redirect('login','refresh');
		}
	}

	public function update($id_person,$foto_ktp,$foto_diri)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->form_validation->set_rules('nama','nama','trim|required');
				$this->form_validation->set_rules('address','addres','trim|required');
				$this->form_validation->set_rules('reg_num','reg_num','trim|required');

				$data['level'] = $level;
				$data['nama'] = $nama;	
				$person = $this->Person_model->getPersonById($id_person);
				$data['person'] = $person;
				foreach ($person as $key) {
					$id_perusahaan = $key->fk_perusahaan;
				}

				if($this->form_validation->run()==FALSE)
				{
					$this->load->view('person/edit_person_view',$data);
				}
				else
				{
					$config['upload_path'] = './assets/uploads/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size']  = 10000000;
					$config['max_width']  = 200000;
					$config['max_height']  = 100000;
					
					$this->load->library('upload', $config);

									// if(!empty($_FILES['foto_diri']['name'])){
										if (!$this->upload->do_upload('foto_ktp') && !$this->upload->do_upload('foto_diri')) {
						                	$this->Person_model->updateByIdTanpaFoto($id_person);
						                }
						                elseif(!$this->upload->do_upload('foto_diri')){
						                    $this->Person_model->updateFotoKtp($id_person,$_FILES['foto_ktp']['name']);
						                }
						                else if (!$this->upload->do_upload('foto_ktp')) {
						                	$this->Person_model->updateFotoDiri($id_person,$_FILES['foto_diri']['name']);
						                }
						                else{
								             $this->Person_model->updateById($id_person,$_FILES['foto_diri']['name'],$_FILES['foto_ktp']['name']);
						            	}
						            // }
					echo "<script>alert('Update Data Berhasil.')</script>";
					redirect('Perusahaan/details/'.$id_perusahaan,'refresh');
				}
		}
		else {
			redirect('login','refresh');
		}
	}

	public function delete($id_person)
	{
		// ,$foto_ktp,$foto_diri
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				// unlink("assets/uploads/".$foto_ktp);
				// unlink("assets/uploads/".$foto_diri);
				$person = $this->Person_model->getPersonById($id_person);
				foreach ($person as $key) {
					$id_perusahaan = $key->fk_perusahaan;
					$jumlah = $key->jumlah_personil;

				}
				$jmlh=$jumlah-1; 
				$this->Perusahaan_model->updateJumlah($id_perusahaan,$jmlh);
				$this->Person_model->delete($id_person);
				echo "<script>alert('Hapus Data Berhasil.')</script>";
				redirect('Person','refresh');
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function delete2($id_person)
	{
		// ,$foto_ktp,$foto_diri
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				// unlink("assets/uploads/".$foto_ktp);
				// unlink("assets/uploads/".$foto_diri);
				$person = $this->Person_model->getPersonById($id_person);
				foreach ($person as $key) {
					$id_perusahaan = $key->fk_perusahaan;
					$jumlah = $key->jumlah_personil;

				}
				$jmlh=$jumlah-1; 
				$this->Perusahaan_model->updateJumlah($id_perusahaan,$jmlh);
				$this->Person_model->delete($id_person);
				echo "<script>alert('Hapus Data Berhasil.')</script>";
				redirect('Perusahaan/details/'.$id_perusahaan,'refresh');
		} 
		else {
			redirect('login','refresh');
		}
	}
}

/* End of file Person.php */
/* Location: ./application/controllers/Person.php */