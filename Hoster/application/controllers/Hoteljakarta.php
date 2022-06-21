<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hoteljakarta extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_booking');
    }
    
    public function index(){
        $where = array('hotel_kota' => 'Jakarta');
		$data['hotel'] = $this->m_booking->edit_data($where,'hotel')->result();
        $this->load->view('frontend/cekhotel.php', $data);
    }
}
