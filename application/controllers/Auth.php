<?php

    class Auth extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
        }

        public function forgot_password()
        {
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            if($this->form_validation->run() == false)
            {
                $this->load->view('pages/v-forgot-password');

            }else{
                $email = $this->input->post('email');
                $user = $this->db->get_where('tb_pengguna',['email' => $email])->row_array();
                if($user)
                {
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created'  => time()
                    ];
                    $this->db->insert('user_token',$user_token);

                    $this->_sendEmail($token);
                    $this->session->set_flashdata('sukses','Tolong cek Email untuk Reset Password !');
                    $typeAlert = "alert-success";
                    $this->session->set_flashdata('alert',$typeAlert);
                    redirect($base.'auth/forgot_password');
                }else{
                    $this->session->set_flashdata('failed','Email Tidak Terdaftar !');
                    $typeAlert = "alert-warning";
                    $this->session->set_flashdata('alert',$typeAlert);
                    redirect($base.'auth/forgot_password');
                }
            }
        }

        public function _sendEmail($token)
        {
            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'webzakat1122@gmail.com',
                'smtp_pass' => 'Webzakat123',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n" 
            ];

            $this->load->library('email',$config);

            $this->email->from('AshabulKahfi@gmail.com','Pesantren Ashabul Kahfi');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Reset Password');
            $this->email->message('Klik Link tersebut untuk reset Password Anda : <a href="'. base_url() . 'auth/resetpassword?email='. $this->input->post('email') .'&token='. urlencode($token) .'">Reset Password</a>');
            if($this->email->send())
            {
                return true;
            }else{
                echo $this->email->print_debugger();
                die;
            }
        }

        public function resetpassword()
        {
            $email = $this->input->get('email');
            $token = $this->input->get('token');
             
            $user = $this->db->get_where('tb_pengguna',['email' => $email])->row_array();
            if($user)
            {
                $user_token = $this->db->get_where('user_token',['token'=> $token])->row_array();
                if($user_token)
                {
                    $this->session->set_userdata('reset_email',$email);
                    $this->changePassword();
                }else{
                    $this->session->set_flashdata('failed','Reset Password gagal, Token tidak sesuai!');
                    $typeAlert = "alert-warning";
                    $this->session->set_flashdata('alert',$typeAlert);
                    redirect($base.'auth/forgot_password');
                }
            }else{
                $this->session->set_flashdata('failed','Reset Password gagal, Email tidak sesuai!');
                $typeAlert = "alert-warning";
                $this->session->set_flashdata('alert',$typeAlert);
                redirect($base.'auth/forgot_password');
            }
        }

        public function changePassword()
        {
            if(!$this->session->userdata('reset_email'))
            {
                redirect(base_url());
            }
            $this->form_validation->set_rules('password','Password','trim|required|matches[konfirmasi]',[
                'matches' => 'Password tidak sama'
            ]);
            $this->form_validation->set_rules('konfirmasi','Password Confimation','trim|required|matches[password]',[
                'matches' => 'Password tidak sama'
            ]);
            if($this->form_validation->run() == false)
            {
                $this->load->view('pages/v-reset-password');

            }else{
                $password = $this->input->post('password');
                $hash = md5($password);

                $this->db->set('password',$hash);
                $this->db->where('email',$this->session->userdata('reset_email'));
                $this->db->update('tb_pengguna');

                $this->session->set_flashdata('sukses','Reset Password Sukses, silahkan Login!');
                $typeAlert = "alert-success";
                $this->session->set_flashdata('alert',$typeAlert);
                redirect(base_url()."login/");
                
                $this->session->unset('reset_email');

            }
        }
    }