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
		$data['booking'] = $this->db->query("select * from booking,hotel,user where booking_hotel=hotel_id and booking_user=user_id and user_id=".$this->session->userdata('user_id')." order by booking_id desc limit 10")->result(); //menampilkan 10 booking terakhir
        $data['hotel'] = $this->db->query("select * from hotel order by hotel_id desc limit 3")->result(); //menampilkan hotel baru
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
            $this->m_booking->update_data($w,$data,'user');
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

	//CRUD hotel
	function hotel(){
		$data['page_title']       = 'Hotel Data';
		$data['hotel'] = $this->m_booking->get_data('hotel')->result();
		$this->load->view('frontend/dashboard/hotel', $data);
	}
	function hotel_add(){
		$data['page_title']       = 'Add Hotel';
		$this->load->view('frontend/dashboard/hotel_add', $data);
	}
	function hotel_add_act(){
		$data['page_title']       = 'Add Hotel';
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
			
			$this->m_booking->insert_data($data, 'hotel');
			redirect(base_url().'frontend/dashboard/hotel');
		} else {
			$this->load->view('frontend/dashboard/hotel_add');
		}
	}

	function hotel_edit($id){
		$where = array('hotel_id' => $id);
		$data['page_title']       = 'Hotel Edit';
		$data['hotel'] = $this->m_booking->edit_data($where,'hotel')->result();
		$this->load->view('frontend/dashboard/hotel_edit',$data);
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
			redirect(base_url().'frontend/dashboard/hotel');
		} else {
			$where = array('hotel_id' => $id);
			$data['hotel'] = $this->m_booking->edit_data($where,'hotel')->result();
			$this->load->view('frontend/dashboard/hotel_edit',$data);
		}
	}
	function hotel_hapus($id){
		$where = array('hotel_id' => $id);
		$this->m_booking->delete_data($where, 'hotel');
		redirect(base_url().'frontend/dashboard/hotel');
	}
	
	//CURD user
	function user(){
		$data['user'] = $this->m_booking->get_data('user')->result();
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
			
			$this->m_booking->insert_data($data, 'user');
			redirect(base_url().'frontend/dashboard/user');
		} else {
			$data['page_title']       = 'Add User';
			$this->load->view('frontend/dashboard/user_add');
		}
	}
	function user_edit($id){
		$where = array('user_id' => $id);
		$data['user'] = $this->m_booking->edit_data($where,'user')->result();
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
			$tgllahir    = $this->input->post('tgllahir');
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
				$tgllahir    = $this->input->post('tgllahir');
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
				'user_tgllahir'  => $tgllahir,
				'user_hp'   => $hp,
				'user_foto'  => $foto
			);
			
			$this->m_booking->update_data($where, $data, 'user');
			redirect(base_url().'frontend/dashboard/user');
		} else {
			$where = array('user_id' => $id);
			$data['user'] = $this->m_booking->edit_data($where,'user')->result();
			$this->load->view('frontend/dashboard/user_edit',$data);
		}
	}
	function user_hapus($id){
		$where = array('user_id' => $id);
		$this->m_booking->delete_data($where, 'user');
		redirect(base_url().'frontend/dashboard/user');
	}

	//CRUD booking
	function booking(){
		$data['page_title']       = 'List Booking';
		$data['booking'] = $this->db->query("select * from booking,hotel,user where booking_hotel=hotel_id and booking_user=user_id and user_id=".$this->session->userdata('user_id'))->result();
		$this->load->view('frontend/dashboard/booking', $data);
	}
	function booking_add($id){
		$data['page_title']       = 'Add reservation';
		$whereu = array('user_id' => $this->session->userdata('user_id'));
		$whereh = array('hotel_id' => $id);
		$data['user'] = $this->m_booking->edit_data($whereu,'user')->result();
		$data['hotel'] = $this->m_booking->edit_data($whereh,'hotel')->result();
		$this->load->view('frontend/dashboard/booking_add', $data);
	}
	function booking_add_act(){
		$data['page_title']       = 'Add reservation';
		$user   = $this->input->post('user');
		$hotel      = $this->input->post('hotel');
		$tglcheckin = $this->input->post('tglcheckin');
		$tglcheckout= $this->input->post('tglcheckout');
		$nama      = $this->input->post('nama');
		$hp      = $this->input->post('hp');
		$email      = $this->input->post('email');
		$jmlkamar      = $this->input->post('jmlkamar');

		$w      = array('hotel_id' => $hotel);
		$data   = $this->m_booking->edit_data($w,'hotel')->row();
		$hargakamar = $data->hotel_harga;
		$jumlahkamar = $data->hotel_kamar;

		$this->form_validation->set_rules('user', 'User', 'required');
		$this->form_validation->set_rules('hotel', 'Hotel', 'required');
		$this->form_validation->set_rules('tglcheckin', 'Tanggal Checkin', 'required|callback_check_equal_less['.$tglcheckout.']');
		$this->form_validation->set_rules('tglcheckout', 'Tanggal Checkout', 'required');
		$this->form_validation->set_rules('nama', 'Name', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jmlkamar', 'Jumlah Kamar', 'trim|required|is_natural_no_zero|callback_check_equal_less['.$jumlahkamar.']');
		
		if($this->form_validation->run() != false){

			$masuk  = strtotime($tglcheckin);
			$keluar   = strtotime($tglcheckout);
			$jmlhari        = abs(($masuk - $keluar)/(60*60*24));
			$harga    = $hargakamar * $jmlhari * $jmlkamar;

			$data = array(
				'booking_user'    		=> $user,
				'booking_hotel'    		=> $hotel,
				'booking_tgltransaksi'  => date('Y-m-d'),
				'booking_tglcheckin'    => $tglcheckin,
				'booking_tglcheckout'  	=> $tglcheckout,
				'booking_nama' 			=> $nama,
				'booking_hp'       		=> $hp,
				'booking_email'       	=> $email,
				'booking_jmlkamar'      => $jmlkamar,
				'booking_harga'       	=> $harga
			);
			
			$this->m_booking->insert_data($data, 'booking');
			
			//update status mobil yg dipinjam
			$d = array('hotel_kamar' => ($jumlahkamar - $jmlkamar));
			$this->m_booking->update_data($w, $d, 'hotel');
			
			redirect(base_url().'frontend/dashboard/booking');
		} else {
			//$data['hotel'] = $this->m_booking->get_data('hotel')->result();
			//$data['user'] = $this->m_booking->get_data('user')->result();
			$this->load->view('frontend/dashboard/booking_add', $data);
		}
	}
	function check_equal_less($second_field,$first_field) 
	{ if ($second_field >= $first_field) { $this->form_validation->set_message('check_equal_less', 'Jumlah kamar tidak tersedia'); 
		return false; }
		else { return true; } 
	}
	function booking_hapus($id){
		$w      = array('booking_id' => $id);
		$data   = $this->m_booking->edit_data($w,'booking')->row();
		$jmlkamar = $data->booking_jmlkamar;
		$w2     = array('hotel_id' => $data->booking_hotel);
		$data2  = array('hotel kamar' => 'hotel kamar' + $jmlkamar);

		$this->m_booking->update_data($w2,$data2,'hotel');
		$this->m_booking->delete_data($w,'booking');
		redirect(base_url().'frontend/dashboard/booking');
	}
	
}
