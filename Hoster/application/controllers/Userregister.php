<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userregister extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_booking');
    }
    
    public function index(){
        $this->load->view('user_register');
    }
    
	public function user_add_act(){
		$email   = $this->input->post('email');
		$username = $this->input->post('username');
		$nama     = $this->input->post('nama');
		$password     = $this->input->post('password');
		$ulang_pass = $this->input->post('ulang_pass');
		$tgllahir    = $this->input->post('tgllahir');
		$hp     = $this->input->post('hp');
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
			);
			
			$this->m_booking->insert_data($data, 'user');
			redirect(base_url().'home');
		} else {
			$data['page_title']       = 'Add User';
			$this->load->view('userregister');
		}
	}
}
