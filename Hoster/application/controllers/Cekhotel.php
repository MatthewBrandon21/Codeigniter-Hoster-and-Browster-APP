<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekhotel extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_booking');
    }
    
    public function index(){
        $data['hotel'] = $this->m_booking->get_data('hotel')->result();
        $this->load->view('frontend/cekhotel.php', $data);
    }
}
