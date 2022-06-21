<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin extends CI_Controller {
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

        $this->load->view('user_login', $data);
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
                    'user_email' => $email,
                    'user_password' => md5($password)
                );
                $data = $this->m_pinjam->edit_data($where,'user');
                $d = $this->m_pinjam->edit_data($where,'user')->row();
                $cek = $data->num_rows();
                if($cek > 0){
                    $session = array(
                        'user_id' => $d->user_id,
                        'user_email' => $d->user_email,
                        'user_username' => $d->user_username,
                        'user_nama' => $d->user_nama,
                        'user_alamat' => $d->user_alamat,
                        'user_hp' => $d->user_hp,
                        'user_foto' => $d->user_foto,
                        'user_status' => 'login'
                    );
                    $this->session->set_userdata($session);
                    redirect(base_url().'home');
                } else {
                    redirect(base_url().'userlogin?pesan=gagal');
                }
            }else{
                redirect(base_url().'userlogin?pesan=captchasalah');
            }

        } else {
            $this->load->view('user_login');
        }
    }
}
