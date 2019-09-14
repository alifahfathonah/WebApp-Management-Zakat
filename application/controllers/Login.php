<?php

    class Login extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('ModelUser');
            $base = base_url();
            if($this->session->userdata('admin') || $this->session->userdata('donatur'))
            {
                redirect($base.'home');
            }
        }

        public function index()
        {
            $this->load->view('pages/login');
        }

        public function prosesLogin()
        {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $typeAlert;

            if(empty($username) && empty($password))
            {
                $this->session->set_flashdata('failed','ID Pengguna dan Kata Sandi tidak boleh kosong!');
                $typeAlert = "alert-warning";
                $this->session->set_flashdata('alert',$typeAlert);
                redirect($base.'login/');
            }
          
            if(empty($username))
            {   
                $this->session->set_flashdata('failed','ID Pengguna tidak boleh kosong!');
                $typeAlert = "alert-warning";
                $this->session->set_flashdata('alert',$typeAlert);
                redirect($base.'login/');
            }   

            if(empty($password))
            {   
                $this->session->set_flashdata('failed','Kata Sandi tidak boleh kosong!');
                $typeAlert = "alert-warning";
                $this->session->set_flashdata('alert',$typeAlert);
                redirect($base.'login/');
            }   
            
            if(!empty($username) && !empty($password))
            {

                $dataUsers = $this->ModelUser->getDataUsers($username,$password);
                $convertToArray = $dataUsers->row_array();
                $type = $convertToArray['jenis_pengguna'];
                if ($type == "Admin")
                {
                    $this->session->set_userdata('admin',TRUE);
                    $this->session->set_userdata('login',TRUE);
                    $this->session->set_userdata('users',$convertToArray['nama']);
                    $this->session->set_userdata('id',$convertToArray['id_pengguna']);
                    redirect($base.'home/dashboard/');

                }else if($type == "donatur"){
                    $this->session->set_userdata('donatur',TRUE);
                    $this->session->set_userdata('login',TRUE);
                    $this->session->set_userdata('users',$convertToArray['nama']);
                    $this->session->set_userdata('id',$convertToArray['id_pengguna']);
                    redirect($base.'home/dashboard/');
                }else if($type == "Penanggung Jawab"){
                    $this->session->set_userdata('pj',TRUE);
                    $this->session->set_userdata('login',TRUE);
                    $this->session->set_userdata('users',$convertToArray['nama']);
                    $this->session->set_userdata('id',$convertToArray['id_pengguna']);
                    redirect($base.'home');
                }else if($type == "Ketua Pesantren")
                {
                    $this->session->set_userdata('ketua',TRUE);
                    $this->session->set_userdata('login',TRUE);
                    $this->session->set_userdata('users',$convertToArray['nama']);
                    $this->session->set_userdata('id',$convertToArray['id_pengguna']);
                    redirect($base.'home');
                }else{
                    $this->session->set_flashdata('failed','ID Pengguna dan Kata Sandi Tidak Sesuai');
                    $typeAlert = "alert-danger";
                    $this->session->set_flashdata('alert',$typeAlert);
                    redirect($base.'login/');
                }
        }
    }

}