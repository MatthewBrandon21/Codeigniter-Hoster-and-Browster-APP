<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bookinguser extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_booking');
    }

    function index($id){
		$where = array('hotel_id' => $id);
		$data['page_title']       = 'Hotel Edit';
		$data['hotel'] = $this->m_booking->edit_data($where,'hotel')->result();
		$this->load->view('backend/dashboard/hotel_edit',$data);
	}
	function hotel_update(){
		$data['page_title']       = 'Hotel Edit';
		$id   = $this->input->post('id');
		$nama   = $this->input->post('nama');
		$bintang   = $this->input->post('bintang');
		$harga  = $this->input->post('harga');
		$kota  = $this->input->post('kota');
		$lokasi = $this->input->post('lokasi');
		$kamar = $this->input->post('kamar');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->input->post('foto');
		$this->form_validation->set_rules('bintang','bintang hotel','required');
		$this->form_validation->set_rules('kota','kota hotel','required');
		$this->form_validation->set_rules('kamar','kamar hotel','required');
		
		if($this->form_validation->run() != false){
			$where = array('hotel_id' => $id);
			$data = array(
				'hotel_nama'       => $nama,
				'hotel_bintang'    => $bintang,
				'hotel_harga'      => $harga,
				'hotel_kota'       => $kota,
				'hotel_lokasi'     => $lokasi,
				'hotel_kamar'      => $kamar,
				'hotel_deskripsi'  => $deskripsi,
				'hotel_foto'       => $foto
			);
			
			$this->m_booking->update_data($where, $data, 'hotel');
			redirect(base_url().'backend/dashboard/hotel');
		} else {
			$where = array('hotel_id' => $id);
			$data['hotel'] = $this->m_booking->edit_data($where,'hotel')->result();
			$this->load->view('backend/dashboard/hotel_edit',$data);
		}
	}
}