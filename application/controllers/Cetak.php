<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
				$data['person'] = $this->Person_model->getPersonByPerusahaan();
				$this->load->view('print/filter',$data);
		}
		else {
			redirect('login','refresh');
		}
	}

	public function filter($id_perusahaan)
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
				$data['personil'] = $this->Person_model->getPersonByPerusahaan($id_perusahaan);

				$this->form_validation->set_rules('hidden', 'hidden', 'trim|required');
				$this->form_validation->set_rules('person[]', 'Personil', 'trim|required');
				$this->form_validation->set_message('required','Harus Pilih Salah Satu Personil.');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('print/filter',$data);
				} else {
					$person = $this->input->post('person');
					if (count($person) > 5) {
						echo '<script type="text/javascript">
							    alert("Pilihlah maksimal 5 personil!");
							</script>';
						redirect('Cetak/filter/'.$id_perusahaan,'refresh');
					}
					else{
						$data['person'] = $person;
						for ($i=0; $i < count($person); $i++) { 
							$pers[] = $this->Person_model->getPersonById($person[$i]);
						}
						for ($row = 0; $row < count($pers); $row++) {
						  	for ($col = 0; $col < 1; $col++) {
						  		$this->Person_model->updateStatusCetak($pers[$row][$col]->id_person);
						  		// var_dump($pers[$row][$col]->id_person);
							}
						}
						// redirect('Cetak/preview/'.$id_perusahaan,'refresh');
						$this->load->view('print/cetak', $data);
					}
				}
		}
		else {
			redirect('login','refresh');
		}
	}

}

/* End of file Print.php */
/* Location: ./application/controllers/Print.php */