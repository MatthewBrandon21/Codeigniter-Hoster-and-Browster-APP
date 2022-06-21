<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Laporan extends CI_Controller {
    public function __construct()
        {   
            parent::__construct();
            $this->load->library('Pdf');
        }
    public function cetak_invoice($id)
        {
            $data['booking'] = $this->db->query("select * from booking,hotel,user where booking_hotel=hotel_id and booking_user=user_id and user_id=".$this->session->userdata('user_id')." and booking_id=".$id)->result();
            $this->load->view('frontend/dashboard/cetak_invoice', $data);
    }   
}