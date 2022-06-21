<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_pinjam');
    }
    
    public function index(){
        $path = './assets/captcha/';
        if(!file_exists($path)){
            $buat = mkdir($path,0777);
            if(!$buat){
                return;
            }
        }
        $kata = array_merge(range('0','9'),range('A','Z'));
        $acak = shuffle($kata);
        $str = substr(implode($kata), 0, 5);
        $data_ses = array('captcha_str'=>$str);
        $this->session->set_userdata($data_ses);
        $vals =  array(
            'word' => $str,
            'img_path' => $path,
            'img_url' => base_url().'assets/captcha/',
            'img_width' => '150',
            'img_height' => 40,
            'expiration' => 7200
        );
        $capc = create_captcha($vals);
        $data['captcha_image'] = $capc['image'];

        $this->load->view('admin_login', $data);
    }
    
    function login(){
        $po_captcha = $this->input->post('captcha');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('captcha','required');
        if($this->form_validation->run() != false){
            if($po_captcha == $this->session->userdata('captcha_str')){
                $where = array(
                    'admin_email' => $email,
                    'admin_password' => md5($password)
                );
                $data = $this->m_pinjam->edit_data($where,'admin');
                $d = $this->m_pinjam->edit_data($where,'admin')->row();
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
            }else{
                redirect(base_url().'adminlogin?pesan=captchasalah');
            }

        } else {
            $this->load->view('admin_login');
        }
    }
}