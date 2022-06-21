<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjamuser extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_pinjam');
    }

    function index($id){
		$where = array('barang_id' => $id);
		$data['page_title']       = 'barang Edit';
		$data['barang'] = $this->m_pinjam->edit_data($where,'barang')->result();
		$this->load->view('backend/dashboard/barang_edit',$data);
	}
	function barang_update(){
		$data['page_title']       = 'barang Edit';
		$id   = $this->input->post('id');
		$nama   = $this->input->post('nama');
		$bintang   = $this->input->post('bintang');
		$harga  = $this->input->post('harga');
		$kota  = $this->input->post('kota');
		$lokasi = $this->input->post('lokasi');
		$kamar = $this->input->post('kamar');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->input->post('foto');
		$this->form_validation->set_rules('bintang','bintang barang','required');
		$this->form_validation->set_rules('kota','kota barang','required');
		$this->form_validation->set_rules('kamar','kamar barang','required');
		
		if($this->form_validation->run() != false){
			$where = array('barang_id' => $id);
			$data = array(
				'barang_nama'       => $nama,
				'barang_bintang'    => $bintang,
				'barang_harga'      => $harga,
				'barang_kota'       => $kota,
				'barang_lokasi'     => $lokasi,
				'barang_kamar'      => $kamar,
				'barang_deskripsi'  => $deskripsi,
				'barang_foto'       => $foto
			);
			
			$this->m_pinjam->update_data($where, $data, 'barang');
			redirect(base_url().'backend/dashboard/barang');
		} else {
			$where = array('barang_id' => $id);
			$data['barang'] = $this->m_pinjam->edit_data($where,'barang')->result();
			$this->load->view('backend/dashboard/barang_edit',$data);
		}
	}
}