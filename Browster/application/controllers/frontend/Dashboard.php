<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
        parent::__construct();
        //cek login
        if($this->session->userdata('user_status') != 'login'){
            redirect(base_url().'userlogin?pesan=belumlogin');
        }
    }

	public function index()
	{
		$data['pinjam'] = $this->db->query("select * from pinjam,barang,user where pinjam_barang=barang_id and pinjam_user=user_id and user_id=".$this->session->userdata('user_id')." order by pinjam_id desc limit 10")->result(); //menampilkan 10 pinjam terakhir
        $data['barang'] = $this->db->query("select * from barang order by barang_id desc limit 3")->result(); //menampilkan barang baru
		$data['page_title']       = 'Dashboard';

		$this->load->view('frontend/dashboard/index', $data);
	}

	//ganti password admin
	public function ganti_password(){
		$data['page_title']       = 'Ganti Password User';
		$this->load->view('frontend/dashboard/ganti_password', $data);
    }
    function ganti_password_act(){
		$data['page_title']       = 'Ganti Password User';
        $pass_baru  = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');
        
        $this->form_validation->set_rules('pass_baru','Password baru','required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','Ulangi password baru','required');
        
        if($this->form_validation->run() != false){
            $data   = array('user_password' => md5($pass_baru));
            $w      = array('user_id' => $this->session->userdata('user_id'));
            $this->m_pinjam->update_data($w,$data,'user');
            redirect(base_url().'frontend/dashboard/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('frontend/dashboard/ganti_password');
        }
    }

	//logout
	function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'home');
    }

	//CRUD barang
	function barang(){
		$data['page_title']       = 'barang Data';
		$data['barang'] = $this->m_pinjam->get_data('barang')->result();
		$this->load->view('frontend/dashboard/barang', $data);
	}
	function barang_add(){
		$data['page_title']       = 'Add barang';
		$this->load->view('frontend/dashboard/barang_add', $data);
	}
	function barang_add_act(){
		$data['page_title']       = 'Add barang';
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
			
			$this->m_pinjam->insert_data($data, 'barang');
			redirect(base_url().'frontend/dashboard/barang');
		} else {
			$this->load->view('frontend/dashboard/barang_add');
		}
	}

	function barang_edit($id){
		$where = array('barang_id' => $id);
		$data['page_title']       = 'barang Edit';
		$data['barang'] = $this->m_pinjam->edit_data($where,'barang')->result();
		$this->load->view('frontend/dashboard/barang_edit',$data);
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
			redirect(base_url().'frontend/dashboard/barang');
		} else {
			$where = array('barang_id' => $id);
			$data['barang'] = $this->m_pinjam->edit_data($where,'barang')->result();
			$this->load->view('frontend/dashboard/barang_edit',$data);
		}
	}
	function barang_hapus($id){
		$where = array('barang_id' => $id);
		$this->m_pinjam->delete_data($where, 'barang');
		redirect(base_url().'frontend/dashboard/barang');
	}
	
	//CURD user
	function user(){
		$data['user'] = $this->m_pinjam->get_data('user')->result();
		$data['page_title']       = 'User Data';
		$this->load->view('frontend/dashboard/user',$data);
	}
	function user_add(){
		$data['page_title']       = 'Add User';
		$this->load->view('frontend/dashboard/user_add', $data);
	}
	function user_add_act(){
		$email   = $this->input->post('email');
		$username = $this->input->post('username');
		$nama     = $this->input->post('nama');
		$password     = $this->input->post('password');
		$ulang_pass = $this->input->post('ulang_pass');
		$tgllahir    = $this->input->post('tgllahir');
		$hp     = $this->input->post('hp');
		$foto    = $this->input->post('foto');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('nama','Name','required');
		$this->form_validation->set_rules('password','Password','required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','Ulangi password baru','required');
		
		if($this->form_validation->run() != false){
			$data = array(
				'user_email' => $email,
				'user_username' => $username,
				'user_nama'   => $nama,
				'user_password'   => md5($password),
				'user_tgllahir'  => $tgllahir,
				'user_hp'   => $hp,
				'user_foto'  => $foto
			);
			
			$this->m_pinjam->insert_data($data, 'user');
			redirect(base_url().'frontend/dashboard/user');
		} else {
			$data['page_title']       = 'Add User';
			$this->load->view('frontend/dashboard/user_add');
		}
	}
	function user_edit($id){
		$where = array('user_id' => $id);
		$data['user'] = $this->m_pinjam->edit_data($where,'user')->result();
		$data['page_title']       = 'User Edit';
		$this->load->view('frontend/dashboard/user_edit',$data);
	}
	function user_update(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG';
		$config['max_size']             = 5000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('userfile'))
		{
			$foto = $this->input->post('old_image');
			$id   = $this->input->post('id');
			$email   = $this->input->post('email');
			$username = $this->input->post('username');
			$nama     = $this->input->post('nama');
			$alamat    = $this->input->post('alamat');
			$hp     = $this->input->post('hp');
		}
		else
		{
				$foto = $this->upload->data();
				$foto = $foto['file_name'];
				$id   = $this->input->post('id');
				$email   = $this->input->post('email');
				$username = $this->input->post('username');
				$nama     = $this->input->post('nama');
				$alamat    = $this->input->post('alamat');
				$hp     = $this->input->post('hp');
		}

		$data['page_title']       = 'User Edit';
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('nama','Name','required');
		
		if($this->form_validation->run() != false){
			$where = array('user_id' => $id);
			$data = array(
				'user_email' => $email,
				'user_username' => $username,
				'user_nama'   => $nama,
				'user_alamat'  => $alamat,
				'user_hp'   => $hp,
				'user_foto'  => $foto
			);
			
			$this->m_pinjam->update_data($where, $data, 'user');
			redirect(base_url().'frontend/dashboard/user_edit/'.$id);
		} else {
			$where = array('user_id' => $id);
			$data['user'] = $this->m_pinjam->edit_data($where,'user')->result();
			$this->load->view('frontend/dashboard/user_edit/'.$id);
		}
	}
	function user_hapus($id){
		$where = array('user_id' => $id);
		$this->m_pinjam->delete_data($where, 'user');
		redirect(base_url().'frontend/dashboard/user');
	}

	//CRUD pinjam
	function pinjam(){
		$data['page_title']       = 'List pinjam';
		$data['pinjam'] = $this->db->query("select * from pinjam,barang,user where pinjam_barang=barang_id and pinjam_user=user_id and user_id=".$this->session->userdata('user_id'))->result();
		$this->load->view('frontend/dashboard/pinjam', $data);
	}
	function pinjam_add($id){
		$data['page_title']       = 'Add reservation';
		$whereu = array('user_id' => $this->session->userdata('user_id'));
		$whereh = array('barang_id' => $id);
		$data['user'] = $this->m_pinjam->edit_data($whereu,'user')->result();
		$data['barang'] = $this->m_pinjam->edit_data($whereh,'barang')->result();
		$this->load->view('frontend/dashboard/pinjam_add', $data);
	}
	function pinjam_add_act(){
		$data['page_title']       = 'Add reservation';
		$user   = $this->input->post('user');
		$barang      = $this->input->post('barang');
		$hari = $this->input->post('hari');

		$w      = array('barang_id' => $barang);
		$data   = $this->m_pinjam->edit_data($w,'barang')->row();
		$hargabarang = $data->barang_harga;
		$jumlahbarang = $data->barang_jumlah;

		$this->form_validation->set_rules('user', 'User', 'required');
		$this->form_validation->set_rules('barang', 'Barang', 'required');
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		
		if($this->form_validation->run() != false){
			$harga    = $hargabarang * $hari;

			$data = array(
				'pinjam_user'    		=> $user,
				'pinjam_barang'    		=> $barang,
				'pinjam_tgltransaksi'  => date('Y-m-d'),
				'pinjam_hari'      => $hari,
				'pinjam_harga'       	=> $harga
			);
			
			$this->m_pinjam->insert_data($data, 'pinjam');
			
			//update status mobil yg dipinjam
			$d = array('barang_jumlah' => ($jumlahbarang - 1));
			$this->m_pinjam->update_data($w, $d, 'barang');
			
			redirect(base_url().'frontend/dashboard/pinjam');
		} else {
			//$data['barang'] = $this->m_pinjam->get_data('barang')->result();
			//$data['user'] = $this->m_pinjam->get_data('user')->result();
			$this->load->view('frontend/dashboard/pinjam_add', $data);
		}
	}
	function check_equal_less($second_field,$first_field) 
	{ if ($second_field >= $first_field) { $this->form_validation->set_message('check_equal_less', 'Jumlah kamar tidak tersedia'); 
		return false; }
		else { return true; } 
	}
	function pinjam_hapus($id){
		$w      = array('pinjam_id' => $id);
		$data   = $this->m_pinjam->edit_data($w,'pinjam')->row();
		$jmlkamar = $data->pinjam_jmlkamar;
		$w2     = array('barang_id' => $data->pinjam_barang);
		$data2  = array('barang kamar' => 'barang kamar' + $jmlkamar);

		$this->m_pinjam->update_data($w2,$data2,'barang');
		$this->m_pinjam->delete_data($w,'pinjam');
		redirect(base_url().'frontend/dashboard/pinjam');
	}
	function pinjam_edit($id){
		$where = array('pinjam_id' => $id);
		$data['pinjam'] = $this->m_pinjam->edit_data($where,'pinjam')->result();
		$data['page_title']       = 'Order Edit';
		$this->load->view('frontend/dashboard/pinjam_edit',$data);
	}
	function pinjam_update(){
		$status = $this->input->post('status');
		$id   = $this->input->post('id');

		$data['page_title']       = 'User Edit';
		$this->form_validation->set_rules('status','Status','required');
		
		if($this->form_validation->run() != false){
			$where = array('pinjam_id' => $id);
			$data = array(
				'pinjam_status' => $status
			);
			
			$this->m_pinjam->update_data($where, $data, 'pinjam');
			redirect(base_url().'frontend/dashboard/pinjam');
		} else {
			$where = array('pinjam_id' => $id);
			$data['pinjam'] = $this->m_pinjam->edit_data($where,'pinjma')->result();
			$this->load->view('frontend/dashboard/pinjam_edit',$data);
		}
	}
}
