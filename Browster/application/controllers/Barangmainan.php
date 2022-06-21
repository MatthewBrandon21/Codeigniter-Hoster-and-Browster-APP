<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmainan extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_pinjam');
    }
    
    public function index(){
        $where = array('barang_kategori' => 'Mainan');
		$data['barang'] = $this->m_pinjam->edit_data($where,'barang')->result();
        $this->load->view('frontend/cekbarang.php', $data);
    }
}
