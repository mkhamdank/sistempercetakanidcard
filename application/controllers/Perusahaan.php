<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

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
			    $data['perusahaan'] = $this->Perusahaan_model->getPerusahaan();

				if ($level == 1) {
					$this->load->view('perusahaan/view_perusahaan',$data);
				}
				elseif ($level == 2) {
					redirect('Home_report/login_perusahaan','refresh');
				}
				elseif ($level == 3) {
					redirect('Home/report_perusahaan','refresh');
				}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function details($id_perusahaan)
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
			    $data['perusahaan'] = $this->Perusahaan_model->getPerusahaanById($id_perusahaan);
			     $data['person'] = $this->Person_model->getPersonByPerusahaan($id_perusahaan);


				$this->load->view('perusahaan/details', $data);
		}
		else{
			redirect('login','refresh');
		}
	}

	public function update($id_perusahaan)
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

				$this->form_validation->set_rules('nama_perusahaan','nama_perusahaan','trim|required');
				$this->form_validation->set_rules('alias','alias','trim|required');
				$this->form_validation->set_rules('safety_permit_number','safety_permit_number','trim|required');
				$this->form_validation->set_rules('mulai_bekerja','mulai_bekerja','trim|required');
				$this->form_validation->set_rules('finish_work','finish_work','trim|required');
				$this->form_validation->set_rules('mulai_bekerja','mulai_bekerja','trim|required');
				// $this->form_validation->set_rules('reg_date','reg_date','trim|required');

			$data['level'] = $level;
			$data['nama'] = $nama;	
			$data['perusahaan'] = $this->Perusahaan_model->getPerusahaanById($id_perusahaan);

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('perusahaan/edit_perusahaan_view',$data);
			}
			else
			{
				$config['upload_path'] = './assets/uploads/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']  = 0;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('userfile')){
					$data['error'] = $this->upload->display_errors();
					// $this->load->view('perusahaan/edit_perusahaan_view', $data);
					$this->Perusahaan_model->updateById2($id_perusahaan);
					echo "<script>alert('Update Data Berhasil.')</script>";
					if ($level == 3) {
						redirect('Home/report_perusahaan','refresh');
					}
					else{
						redirect('Perusahaan','refresh');
					}
				}
				else{
					$image_data = $this->upload->data();
					$this->Perusahaan_model->updateById($id_perusahaan);
					echo "<script>alert('Update Data Berhasil.')</script>";
					redirect('Perusahaan','refresh');
				}
			}
		}
		else {
			redirect('login','refresh');
		}
	}

	public function delete($id_perusahaan)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$perusahaan = $this->Person_model->getPersonByPerusahaan($id_perusahaan);
				if (count($perusahaan) > 0) {
					echo '<script type="text/javascript">
							    alert("Data ini tidak bisa dihapus!");
							</script>';
					redirect('Perusahaan','refresh');
				}else{
					$this->Perusahaan_model->delete($id_perusahaan);
						echo "<script>alert('Hapus Data Berhasil.')</script>";
						redirect('Perusahaan','refresh');
				}
				
		} 
		else {
			redirect('login','refresh');
		}
	}

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */