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
            $data['pinjam'] = $this->db->query("select * from pinjam,barang,user where pinjam_barang=barang_id and pinjam_user=user_id and user_id=".$this->session->userdata('user_id')." and pinjam_id=".$id)->result();
            $this->load->view('frontend/dashboard/cetak_invoice', $data);
    }   
}