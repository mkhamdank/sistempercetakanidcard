<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_report extends CI_Controller {

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
				$this->load->library('Datatables');
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function index()
	{

	}

	public function login_perusahaan()
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

				$this->load->view('perusahaan/view_perusahaan', $data);
		}
		else {
			redirect('login','refresh');
		}
	}

	public function report_person()
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

				$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
				$this->form_validation->set_rules('safety_permit_number', 'Safety Permit Number', 'trim|required');
				$this->form_validation->set_rules('mulai_bekerja', 'Mulai Bekerja', 'trim|required');
				$this->form_validation->set_rules('finish_work', 'Terakhir Bekerja', 'trim|required');
				$this->form_validation->set_rules('jumlah_personil', 'Jumlah Personil', 'trim|required|numeric');

				$data['level'] = $level;
				$data['nama'] = $nama;	

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('home/create',$data);
				} else {
						$config['upload_path'] = './assets/uploads/';
						$config['allowed_types'] = 'jpg|png';
						$config['max_size']  = 100000;
						$config['max_width']  = 200000;
						$config['max_height']  = 100000;
						
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('userfile')){
							$data['error'] = $this->upload->display_errors();
							$this->load->view('home/create', $error);
						}
						else{
							$image_data = $this->upload->data();

							$this->Perusahaan_model->create();
							$nama_perusahaan = $this->input->post('nama_perusahaan');
							$jumlah_personil = $this->input->post('jumlah_personil');
							$perusahaan = $this->Perusahaan_model->getPerusahaanByNama($nama_perusahaan);
							foreach ($perusahaan as $key) {
								$id_perusahaan = $key->id_perusahaan;
							}
							redirect('Home/create_personil/'.$id_perusahaan.'/'.$jumlah_personil,'refresh');
						}
				}
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function create_personil($id_perusahaan,$jumlah_personil)
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$this->form_validation->set_rules('hidden', 'Nama Personil', 'trim|required');
				$this->form_validation->set_rules('no_ktp[]', 'Nomor KTP', 'trim|required|numeric');

				$data['jumlah_personil'] = $jumlah_personil;
				$data['level'] = $level;
				$data['nama'] = $nama;	

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('home/create_personil',$data);
				} else {
						// $config['upload_path'] = './assets/uploads/';
						// $config['allowed_types'] = 'jpg|png';
						// $config['max_size']  = 100000;
						// $config['max_width']  = 200000;
						// $config['max_height']  = 100000;
						
						// $this->load->library('upload', $config);
						
						// if ( ! $this->upload->do_upload('userfile')){
						// 	$data['error'] = $this->upload->display_errors();
						// 	$this->load->view('home/create_personil', $data);
						// }
						// else{

							// $image_data = $this->upload->data();

							// $configer = array (
							// 	'image_library' => 'gd2',
							// 	'source_image' => $image_data['full_path'],
							// 	'maintain_ratio' => TRUE,
							// 	'width' => 500,
							// 	'height' => 768,
							// 	);

							// $this->load->library('image_lib', $config);
							// $this->image_lib->clear();
							// $this->image_lib->initialize($configer);
							// $this->image_lib->resize();
							// $this->upload->do_upload('userfile');


							// $dataInfo = array();
		    	// 			$files = $_FILES['userfile'];

							
							$nama = $this->input->post('nama');
							$no_ktp = $this->input->post('no_ktp');
							$address = $this->input->post('address');
							$person = $this->Person_model->getPerson();
							$perusahaan = $this->Perusahaan_model->getPerusahaanById($id_perusahaan);
							foreach ($perusahaan as $key) {
								$date = $key->reg_date;
								$reg_date = date("d/m/Y", strtotime($date));
							}

							if (count($person) >= 1) {
								foreach ($person as $val) {
									$reg_num = $val->reg_num;
									$nomor = substr($reg_num, -6);
								}
							}
							else{
								$nomor = 0;
							}

								$config['upload_path'] = './assets/uploads/'; //path folder
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
						        $config['max_size']  = 100000;
								$config['max_width']  = 200000;
								$config['max_height']  = 100000;
						        // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
						 
						        $this->load->library('upload',$config);
						        for ($i=0; $i < $jumlah_personil ; $i++) { 
						            if(!empty($_FILES['filefoto'.$i]['name'])){
						                if(!$this->upload->do_upload('filefoto'.$i)){
						                    $this->upload->display_errors(); 
						                }
						                else{
						                	if (!$this->upload->do_upload('filefotoktp'.$i)) {
						                		$this->upload->display_errors();
						                	}
						                	else{
						                		$nomor = $nomor+1;
												$reg = $reg_date.'.'.$nomor;
												$jmlnomor = strlen($nomor);
												$nomor = str_pad($nomor, 6, '0', STR_PAD_LEFT);
												$reg = $reg_date.'.'.$nomor;
								               	$this->Person_model->create($nama[$i],$no_ktp[$i],$address[$i],$reg,$id_perusahaan,$_FILES['filefoto'.$i]['name'],$_FILES['filefotoktp'.$i]['name']);
						                	}
						            	}
						            }
						        }
							
							// for ($i=0; $i < $jumlah_personil; $i++) {
								// $_FILES['userfile']['name']= $files['userfile']['name'][$i];
						        // $this->upload->initialize($this->set_upload_options());
						        // $this->upload->do_upload();
						        // $dataInfo[$i] = $this->upload->data('file_name');
								
								// $this->Person_model->create($dataInfo[$i]);
								// $nama[$i],$no_ktp[$i],$address[$i],$id_perusahaan,$reg,
							// }
							redirect('Home/create','refresh');
						// }
				}
		} 
		else {
			redirect('login','refresh');
		}
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'jpg|png';
		

	    return $config;
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */