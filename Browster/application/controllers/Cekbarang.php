<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekbarang extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_pinjam');
    }
    
    public function index(){
        $data['barang'] = $this->m_pinjam->get_data('barang')->result();
        $this->load->view('frontend/cekbarang.php', $data);
    }
}
