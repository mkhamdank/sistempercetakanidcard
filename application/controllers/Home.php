<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
				$this->load->model('Foto_model');
				$this->load->model('Reg_number_model');
		} 
		else {
			redirect('login','refresh');
		}
	}

	public function index()
	{

	}

	public function report_perusahaan()
	{
		if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$id_login = $session_data['id_login'];
				$username = $session_data['username'];
				$password = $session_data['password'];
				$nama = $session_data['nama'];
				$seksi = $session_data['seksi'];
				$level = $session_data['level'];

				$data['nama'] = $nama;
				$data['level'] = $level;
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

				$data['nama'] = $nama;
				$data['nama'] = $nama;	
				$data['level'] = $level;
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
				// $this->form_validation->set_message('is_unique','Data Safety Permit Number Sudah Diinputkan');
				$this->form_validation->set_rules('mulai_bekerja', 'Mulai Bekerja', 'trim|required');
				$this->form_validation->set_rules('finish_work', 'Terakhir Bekerja', 'trim|required');
				$this->form_validation->set_rules('jumlah_personil', 'Jumlah Personil', 'trim|required|numeric');


				$data['nama'] = $nama;	
				$data['level'] = $level;

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('home/create',$data);
				} else {
						$mulai = date("m-d-Y", strtotime($this->input->post('mulai_bekerja')));
						$akhir = date("m-d-Y", strtotime(str_replace("/","-",$this->input->post('finish_work'))));
						$mulai_bekerja = date("Y-m-d", strtotime(str_replace("/","-",$this->input->post('mulai_bekerja'))));
						$akhir_bekerja = date("Y-m-d", strtotime(str_replace("/","-",$this->input->post('finish_work'))));
						// $akhir = date("m/d/Y", strtotime($this->input->post('finish_work')));
						// echo $mulai_bekerja.$akhir_bekerja;
						if (strtotime($mulai_bekerja)>strtotime($akhir_bekerja)) {
							echo '<script>alert("Tanggal yang anda inputkan salah")</script>';
							$this->load->view('home/create', $data);
						}else {
							$config['upload_path'] = './assets/uploads/';
							$config['allowed_types'] = 'pdf';
							$config['max_size']  = 0;
							
							$this->load->library('upload', $config);
							
							if ( ! $this->upload->do_upload('userfile')){
								$data['error'] = $this->upload->display_errors();
								$this->load->view('home/create', $data);
							}
							else{
								$image_data = $this->upload->data();

								$this->Perusahaan_model->create($mulai_bekerja,$akhir_bekerja);
								$nama_perusahaan = $this->input->post('nama_perusahaan');
								$jumlah_personil = $this->input->post('jumlah_personil');
								$perusahaan = $this->Perusahaan_model->getPerusahaanByNama($nama_perusahaan);
								foreach ($perusahaan as $key) {
									$id_perusahaan = $key->id_perusahaan;
								}
								echo "<script>alert('Tambah Data Perusahaan Berhasil.')</script>";
								$base_url = base_url('index.php/Home/create_personil/'.$id_perusahaan.'/1');
								for ($i=0; $i < $jumlah_personil; $i++) { 
									echo "<script>window.open('".$base_url."','_blank');</script>";
								}
								redirect('Perusahaan/details/'.$id_perusahaan,'refresh');
							}
						}
				}
		} 
		else {
			redirect('login','refresh');
		}
	}

	function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->Perusahaan_model->search_perusahaan($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_perusahaan;
            	// $arr_result[] = $row->alias;
                echo json_encode($arr_result);
            }
        }
    }

    function get_alias($nama_perusahaan){
    	$nama = explode( '%20', $nama_perusahaan );
    	// var_dump($nama);
        $result = $this->Perusahaan_model->search_alias($nama[1]);
        // if (count($result) > 0) {
	       //  foreach ($result as $row){
	       //  	echo $row->alias;
	       //  }
        // }
        // var_dump($result);
        // var_dump($result);
        foreach ($result as $key) {
        	$data = array('alias' => $key->alias);
        }
        echo json_encode($data);
    	// echo $nama_perusahaan;
    }

    function get_autocomplete_foto(){
        if (isset($_GET['term'])) {
            $result = $this->Foto_model->search_foto($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
            	// $path = base_url('assets/uploads/'.$row->image);
            	// ."<img src='".$path."'>"
                $arr_result[] = $row->image;
                echo json_encode($arr_result);
            }
        }
    }

    public function add($id_perusahaan)
    {
    	$this->form_validation->set_rules('jumlah_personil', 'Jumlah Personil', 'trim|required|is_numeric');

    	if ($this->form_validation->run() == FALSE) {
    		redirect('Perusahaan/details/'.$id_perusahaan,'refresh');
    	} else {
    		$jumlah = $this->input->post('jumlah_personil');
    		// redirect('Home/create_personil/'.$id_perusahaan.'/'.$jumlah,'refresh');
    		$base_url = base_url('index.php/Home/create_personil/'.$id_perusahaan.'/1');
    		for ($i=0; $i < $jumlah; $i++) { 
    			echo "<script>window.open('".$base_url."', '_blank');</script>";
    		}
    		 redirect('Perusahaan/details/'.$id_perusahaan,'refresh');

    		// echo "<script>window.close();</script>";
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
				$this->form_validation->set_rules('nama[]', 'Nama', 'trim|required');
				// $this->form_validation->set_message('is_unique','Personil sudah diinputkan');

				$data['jumlah_personil'] = $jumlah_personil;
				$data['nama'] = $nama;	
				$data['level'] = $level;
				$per = $this->Perusahaan_model->getPerusahaanById($id_perusahaan);
				foreach ($per as $nam) {
					$data['nama_perusahaan'] = $nam->nama_perusahaan;
				}

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('home/create_personil',$data);
				} else {
							$nama = $this->input->post('nama');
							$no_ktp = $this->input->post('no_ktp');
							$address = $this->input->post('address');
							$nama_foto = $this->input->post('nama_foto');
							$person = $this->Person_model->getPersonLast();
							$perusahaan = $this->Perusahaan_model->getPerusahaanById($id_perusahaan);
							foreach ($perusahaan as $key) {
								$date = $key->reg_date;
								$reg_date = date("dmy", strtotime($date));
								$jumlahlama = $key->jumlah_personil;
							}
							$jml_baru = $jumlahlama + $jumlah_personil;
							$this->Perusahaan_model->updateJumlah($id_perusahaan,$jml_baru);

							$reg_ber = $this->Reg_number_model->getRegNum();

							// if (count($person) >= 1) {
							// 	foreach ($person as $val) {
							// 		$reg_num = $val->reg_num;
							// 		$nomor = substr($reg_num, -6);
							// 	}
							// }
							// else{
							// 	$nomor = 0;
							// }
							foreach ($reg_ber as $rb) {
								$id_reg = $rb->id;
								$nomor = $rb->reg_num;
							}

								$config['upload_path'] = './assets/uploads/'; //path folder
						        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
						        $config['max_size']  = 100000;
								$config['max_width']  = 200000;
								$config['max_height']  = 100000;
						 
						        $this->load->library('upload',$config);
						        
						        for ($i=0; $i < $jumlah_personil ; $i++) { 
						            if(!empty($_FILES['filefoto'.$i]['name'])){
						                if(!$this->upload->do_upload('filefoto'.$i)){
						                    	
						                }
						                else if (!$this->upload->do_upload('filefotoktp'.$i)) {
						                	$this->upload->display_errors();

						                }
						                else{
						                	
						                	// else{
						                		$nomor = $nomor+1;
												$reg = $reg_date.'.'.$nomor;
												$jmlnomor = strlen($nomor);
												$nomor = str_pad($nomor, 5, '0', STR_PAD_LEFT);
												$reg = $reg_date.'.'.$nomor;
												$this->Reg_number_model->update($id_reg,$nomor);
								               	$this->Person_model->create($nama[$i],$no_ktp[$i],$address[$i],$reg,$id_perusahaan,$_FILES['filefoto'.$i]['name'],$_FILES['filefotoktp'.$i]['name']);
								               	
						                	// }
						            	}
						            }
						            else{
						            			$nomor = $nomor+1;
												$reg = $reg_date.'.'.$nomor;
												$jmlnomor = strlen($nomor);
												$nomor = str_pad($nomor, 5, '0', STR_PAD_LEFT);
												$reg = $reg_date.'.'.$nomor;
												$this->Reg_number_model->update($id_reg,$nomor);
												// $per = $this->Perusahaan_model->getPerusahaanById($id_perusahaan);
												// foreach ($per as $val) {
												// 	$jumlahlama = $val->jumlah_personil;
												// }
												// $jml_baru = $jumlahlama + $jumlah_personil;
												// $this->Perusahaan_model->updateJumlah($id_perusahaan,$jml_baru);
												$this->upload->do_upload('filefotoktp'.$i);
								               	$this->Person_model->create($nama[$i],$no_ktp[$i],$address[$i],$reg,$id_perusahaan,$nama[$i].'.jpg','ktp_'.$nama[$i].'.jpg');
								               	
						            }
						        }
						        echo "<script>alert('Tambah Data Personil Berhasil.')</script>";
								// redirect('Perusahaan/details/'.$id_perusahaan,'refresh');
								echo  "<script type='text/javascript'>window.close();</script>";
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