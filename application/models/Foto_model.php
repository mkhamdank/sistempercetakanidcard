<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_model extends CI_Model {

	function search_foto($title){
        $this->db->like('image', $title , 'both');
        $this->db->order_by('image', 'ASC');
        $this->db->limit(10);
        return $this->db->get('foto_diri')->result();
    }

}

/* End of file Foto_model.php */
/* Location: ./application/models/Foto_model.php */