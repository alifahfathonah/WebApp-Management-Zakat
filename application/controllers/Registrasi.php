<?php

    class Registrasi extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('ModelUser');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('nama','Name','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('password','Password','trim|required|matches[konfirmasi]|min_length[3]',[
                'matches' => "Password don't Match !",
                'min_length' => 'Password too short !'
            ]);
            $this->form_validation->set_rules('konfirmasi','Password','trim|required|matches[password]');

            if($this->form_validation->run() === false)
            {
                $this->load->view('pages/v-pendaftaran');
            }else{
                $username = htmlspecialchars($_POST['username']);
                $nama = htmlspecialchars($_POST['nama']);
                $password = htmlspecialchars($_POST['password']);
                $konfirmasi = htmlspecialchars($_POST['konfirmasi']);
                $email = $_POST['email'];
                $cekUSer = $this->ModelUser->getDataUsersByID($username,$email);
                if(!empty($cekUSer))
                {
                    $this->session->set_flashdata('failed','ID Pengguna atau Email Sudah ada !');
                    $typeAlert = "alert-warning";
                    $this->session->set_flashdata('alert',$typeAlert);
                    redirect($base.'registrasi/');
                }else{
                    $sendToModel = $this->ModelUser->insertUser($username,$nama,$email,$password);
                    if($sendToModel)
                    {
                        $this->session->set_flashdata('failed','Pendaftaran Akun Berhasil,Silahkan Log in !');
                        $typeAlert = "alert-success";
                        $this->session->set_flashdata('alert',$typeAlert);
                        redirect($base.'registrasi/');
                    }
                }
            }
        }

        public function prosesRegistrasi()
        {
            $username = htmlspecialchars($_POST['username']);
            $nama = htmlspecialchars($_POST['nama']);
            $password = htmlspecialchars($_POST['password']);
            $konfirmasi = htmlspecialchars($_POST['konfirmasi']);

            
            
           

          

           
            
            
        }
    }