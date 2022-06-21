<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_booking');
    }
    
    public function index(){
        $this->load->view('admin_login');
    }
    
    function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run() != false){
            $where = array(
                'admin_email' => $email,
                'admin_password' => md5($password)
            );
            $data = $this->m_booking->edit_data($where,'admin');
            $d = $this->m_booking->edit_data($where,'admin')->row();
            $cek = $data->num_rows();
            if($cek > 0){
                $session = array(
                    'id' => $d->admin_id,
                    'email' => $d->admin_email,
					'username' => $d->admin_username,
					'nama' => $d->admin_nama,
                    'status' => 'login'
                );
                $this->session->set_userdata($session);
                redirect(base_url().'backend/dashboard/index');
            } else {
                redirect(base_url().'adminlogin?pesan=gagal');
            }
        } else {
            $this->load->view('admin_login');
        }
    }
}
