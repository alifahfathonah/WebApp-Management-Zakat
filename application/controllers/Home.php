<?php 

    class Home extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $base = base_url();
           
            $this->load->model('ModelSiswa');
            $this->load->model('ModelPengajar');
            $this->load->model('ModelDonatur');
            $this->load->model('ModelSumbangan');
            $this->load->model('ModelUser');
            $this->load->model('ModelProyek');
            $this->load->model('ModelPengeluaran');
            $this->load->model('ModelGalleri');
        }

        public function index()
        {
            
            $data['gallery'] = $this->db->get('tb_gallery')->result_array();
                $user_id = "";
                $data['proyek'] = $this->ModelProyek->getDataProyek($user_id);
                $this->load->view('layout/header');
                $this->load->view('layout/navbar');
                $this->load->view('layout/banner');
                $this->load->view('home/v-home-donatur',$data);
                $this->load->view('pages/kritik');
                $this->load->view('layout/footer');
            
        }

        public function dashboard()
        {
            if(isset($_POST['submitSumbangan']))
            {
                $tahun = htmlspecialchars($_POST['TahunSumbangan']);
                $data['tahun'] = $tahun;
            }else{
                $tahun = 2019;
                $data['tahun'] = 2019;
            }

            if(isset($_POST['submitProyek']))
            {
                $thn = htmlspecialchars($_POST['TahunProyek']);
                $data['thn'] = $thn;
            }else{
                $thn = 2019;
                $data['thn'] = 2019;
            }
            
            if( $this->session->userdata('admin') || $this->session->userdata('pj') || $this->session->userdata('ketua') ){
                $data['page'] = "Dashboard";
                $data['active'] = "1";
                $data['pesan'] = $this->ModelDonatur->getDataPesan();
                $data['sumbangan'] = $this->ModelSumbangan->getDataSumbangan();
                $data['sumbangan_not'] = $this->ModelSumbangan->getDataSumbanganAprove();
                $data['donatur'] = $this->ModelDonatur->getDataDonatur();
                $data['proyek'] = $this->ModelProyek->getAllDataProyek();
                $data['sumbangan'] = $this->ModelSumbangan->getDataPendapatan($tahun);
                $data['chartP'] = $this->ModelProyek->getDataProyekByTahun($thn);
                $this->load->view('framework/header');
                $this->load->view('framework/sidebar',$data);
                $this->load->view('framework/navbar',$data);
                $this->load->view('framework/mobile-menu',$data);
                $this->load->view('home/index',$data);
                $this->load->view('framework/footer');
            }
            if( $this->session->userdata('donatur') )
            {
                $data['gallery'] = $this->db->get('tb_gallery')->result_array();
                $user_id = "";
                $data['proyek'] = $this->ModelProyek->getDataProyek($user_id);
                $this->load->view('layout/header');
                $this->load->view('layout/navbar');
                $this->load->view('layout/banner');
                $this->load->view('home/v-home-donatur',$data);
                $this->load->view('layout/footer');
            }
            if(!$this->session->userdata('login')){ 
                redirect(base_url());
            }
        }

        // <!-- SISWA -- >

        public function list_siswa()
        {
            if($this->session->userdata('admin')) { 
                $data['pesan'] = $this->ModelDonatur->getDataPesan();
                $data['page'] = "Data Siswa";
                $data['active'] = "2";
                $data['data_siswa'] = $this->ModelSiswa->getDataSiswa();
                $this->load->view('framework/header');
                $this->load->view('framework/sidebar',$data);
                $this->load->view('framework/navbar');
                $this->load->view('framework/mobile-menu');
                $this->load->view('pages/v-data-siswa',$data);
                $this->load->view('framework/footer');
            }else{
                redirect(base_url());
            }
        }

        public function insertSiswa()
        {
            
            $nama = htmlspecialchars($_POST['nama']);
            $jk = htmlspecialchars($_POST['jk']);
            $asal = htmlspecialchars($_POST['asal']);
            $tingkatan = htmlspecialchars($_POST['tingkatan']);
            $hafalan = htmlspecialchars($_POST['hafalan']);
            $status = htmlspecialchars($_POST['status']);

            if(empty($nama) || empty($jk) || empty($asal) || empty($tingkatan) || empty($status))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_siswa/');
            }

            $sendToModel = $this->ModelSiswa->insertSiswa($nama,$jk,$asal,$tingkatan,$hafalan,$status);
            if( $sendToModel )
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Siswa Berhasil disimpan');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_siswa/');
            }
        }

        public function ubahSiswa()
        {
            $id_siswa = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $jk = htmlspecialchars($_POST['jk']);
            $asal = htmlspecialchars($_POST['asal']);
            $tingkatan = htmlspecialchars($_POST['tingkatan']);
            $hafalan = htmlspecialchars($_POST['hafalan']);
            $status = htmlspecialchars($_POST['status']);

            $sendToModel = $this->ModelSiswa->upateSiswa($id_siswa,$nama,$jk,$asal,$tingkatan,$hafalan,$status);
            if( $sendToModel )
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Siswa Berhasil di Ubah');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_siswa/');
            }
        }

        public function deleteSiswa()
        {
            $id = $this->uri->segment(3);
            if (!empty($id))
            {
                $sendToModel = $this->ModelSiswa->deleteSiswa($id);
                if( $sendToModel )
                {
                    $this->session->set_flashdata('status',"success");
                    $this->session->set_flashdata('message','Data Siswa Berhasil di Hapus');
                    $this->session->set_flashdata('title','Success !!');
                    redirect($base.'home/list_siswa/');
                }
            }else{
                redirect($base.'home/list_siswa');
            }
        }

        // <!-- SISWA -- >

        // <!-- Pengajar -->

        public function list_pengajar()
        {
            if($this->session->userdata('admin')) { 
                $data['pesan'] = $this->ModelDonatur->getDataPesan();
                $data['page'] = "Data Pengajar";
                $data['active'] = "3";
                $data['data_pengajar'] = $this->ModelPengajar->getDataPengajar();
                $this->load->view('framework/header');
                $this->load->view('framework/sidebar',$data);
                $this->load->view('framework/navbar');
                $this->load->view('framework/mobile-menu');
                $this->load->view('pages/v-data-pengajar',$data);
                $this->load->view('framework/footer');
            }else{
                redirect(base_url());
            }
        }

        public function insertPengajar()
        {
            $nama = htmlspecialchars($_POST['nama']);
            $alumni = htmlspecialchars($_POST['alumni']);
            $studi = htmlspecialchars($_POST['studi']);
            if( empty($nama) || empty($alumni) || empty($studi) )
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_pengajar/');
            }
            $sendToModel = $this->ModelPengajar->insertPengajar($nama,$alumni,$studi);
            if( $sendToModel ){
                    $this->session->set_flashdata('status',"success");
                    $this->session->set_flashdata('message','Data Pengajar Berhasil di Simpan');
                    $this->session->set_flashdata('title','Success !!');
                    redirect($base.'home/list_pengajar/');
            }
        }

        public function ubahPengajar()
        {   
            $id = $this->uri->segment(3);
            $nama = htmlspecialchars($_POST['nama']);
            $alumni = htmlspecialchars($_POST['alumni']);
            $studi = htmlspecialchars($_POST['studi']);
            if( empty($nama) || empty($alumni) || empty($studi) )
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_pengajar/');
            }

            $sendToModel = $this->ModelPengajar->updatePengajar($nama,$alumni,$studi,$id);
            if( $sendToModel ){
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengajar Berhasil di Ubah');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengajar/');
            }   
        }

        public function deletePengajar()
        {
            $id = $this->uri->segment(3);
            if(!empty($id))
            {
                $sendToModel = $this->ModelPengajar->deletePengajar($id);
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengajar Berhasil di Hapus');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengajar/');
            }else{
                redirect($base.'home/list_pengajar');
            }
        }

        // <!-- Pengajar -->

        // <!-- Donatur -->

        public function list_donatur()
        {
            if($this->session->userdata('admin')) { 
                $data['pesan'] = $this->ModelDonatur->getDataPesan();
                $data['page'] = "Data Donatur";
                $data['active'] = "4";
                $data['data_donatur'] = $this->ModelDonatur->getDataDonatur();
                $this->load->view('framework/header');
                $this->load->view('framework/sidebar',$data);
                $this->load->view('framework/navbar');
                $this->load->view('framework/mobile-menu');
                $this->load->view('pages/v-data-donatur',$data);
                $this->load->view('framework/footer');
            }else{
                redirect(base_url());
            }
        }

        public function insertDonatur()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $tgl = htmlspecialchars($_POST['tgl']);
            $jk = htmlspecialchars($_POST['jk']);
            $role = "donatur";

            if(empty($id) || empty($nama) || empty($alamat) || empty($tgl) || empty($jk))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_donatur/');
            }
            $sendToModel = $this->ModelDonatur->insertDonatur($id,$nama,$alamat,$tgl,$jk,$role);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Donatur Berhasil di Simpan');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_donatur/');
            }
        }

        public function updateDonatur()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $tgl = htmlspecialchars($_POST['tgl']);
            $jk = htmlspecialchars($_POST['jk']);
            if(empty($id) || empty($nama) || empty($alamat) || empty($tgl) || empty($jk))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_donatur/');
            }
            $sendToModel = $this->ModelDonatur->updateDonatur($id,$nama,$alamat,$tgl,$jk);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Donatur Berhasil di Ubah');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_donatur/');
            }
        }

        public function deleteDonatur()
        {
            $id = $this->uri->segment(3);
            $sendToModel = $this->ModelDonatur->deleteDonatur($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Donatur Berhasil di Hapus');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_donatur/');
            }
        }
        // <!-- Donatur -->

        // <!-- Jenis Sumbangan -->

        public function listjenis_sumbangan()
        {
            if($this->session->userdata('admin')) { 
                $data['pesan'] = $this->ModelDonatur->getDataPesan();
                $data['page'] = "Data jenis Sumbangan";
                $data['active'] = "5";
                $data['data_jenis'] = $this->ModelSumbangan->getDataJenisSumbangan();
                $this->load->view('framework/header');
                $this->load->view('framework/sidebar',$data);
                $this->load->view('framework/navbar');
                $this->load->view('framework/mobile-menu');
                $this->load->view('pages/v-data-jenis-sumbangan',$data);
                $this->load->view('framework/footer');
            }else{
                redirect(base_url());
            }
        }

        public function insertJenis()
        {
            $kode = htmlspecialchars($_POST['kode']);
            $nama = htmlspecialchars($_POST['nama']);
            if(empty($kode) || empty($nama))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/listjenis_sumbangan/');
            }
            $sendToModel = $this->ModelSumbangan->insertJenis($kode,$nama);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Jenis Sumbangan Berhasil di Simpan');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/listjenis_sumbangan/');  
            }
        }

        public function updateJenis()
        {
            $kode = htmlspecialchars($_POST['kode']);
            $nama = htmlspecialchars($_POST['nama']);
            if(empty($kode) || empty($nama))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/listjenis_sumbangan/');
            }
            $sendToModel = $this->ModelSumbangan->updateJenis($kode,$nama);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Jenis Sumbangan Berhasil di Ubah');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/listjenis_sumbangan/');  
            }
        }

        public function deleteJenis()
        {
            $id = $this->uri->segment(3);
            if(!empty($id))
            {
                $sendToModel = $this->ModelSumbangan->deleteJenis($id);
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Jenis Sumbangan Berhasil di Hapus');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/listjenis_sumbangan/');
            }else{
                redirect($base.'home/listjenis_sumbangan');
            }
        }

        // <!-- Jenis Sumbangan -->

        // <!-- View Kritik & Saran (Donatur) -->

        public function form_kritik_saran()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Form Kritik & Saran";
            $data['active'] = "6";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-pesan');
            $this->load->view('framework/footer');
        }

        public function insertPesan()
        {
            var_dump($_POST);
            $nama = htmlspecialchars($_POST['nama']);
            $pesan = htmlspecialchars($_POST['pesan']);
            $tgl = htmlspecialchars($_POST['tgl']);

            if(trim($pesan) == ""){
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/');
            }
            $sendToModel = $this->ModelDonatur->insertPesan($nama,$pesan,$tgl);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Pesan Berhasil di Kirim');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/');
            }
        }

        public function list_pesan()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Form Kritik & Saran";
            $data['active'] = "30";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-kritik',$data);
            $this->load->view('framework/footer');
        }

        public function updatePesan()
        {
            $id = $this->uri->segment(3);
            $sendToModel = $this->ModelDonatur->updatePesan($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Pesan sudah terbaca !');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pesan/');
            }
        }
        // <!-- View Kritik & Saran (Donatur) -->

        // <!-- Data sumbangan -- >

        // "ADMIN"
        public function list_sumbangan()
        {
            if($this->session->userdata('admin')) { 
                $data['pesan'] = $this->ModelDonatur->getDataPesan();
                $id_cetak = $this->uri->segment(4);
            
                if($id_cetak != null){
                    $data['detail'] = $this->ModelSumbangan->getDataSumbanganByDetail($id_cetak);
                    $this->load->view('pages/v-kwitansi',$data);
                }else{
                    $data['page'] = "Data Sumbangan";
                    $data['jenis'] = $this->ModelSumbangan->getDataJenisSumbangan();
                    $data['donatur'] = $this->ModelDonatur->getDataDonatur();
                    $data['sumbangan'] = $this->ModelSumbangan->getDataSumbangan();
                    $data['active'] = "7";
                    $this->load->view('framework/header');
                    $this->load->view('framework/sidebar',$data);
                    $this->load->view('framework/navbar');
                    $this->load->view('framework/mobile-menu');
                    $this->load->view('pages/v-data-sumbangan',$data);
                    $this->load->view('framework/footer');
                }
            }else{
                redirect(base_url());
            }
        }

        public function insertSumbangan()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $jenis = htmlspecialchars($_POST['jenis']);
            $nominal = htmlspecialchars($_POST['nominal']);
            $tgl = htmlspecialchars($_POST['tgl']);

            if(empty($id) || empty($nama) || empty($jenis) || empty($nominal) || empty($tgl))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_sumbangan/');
            }

            $sendToModel = $this->ModelSumbangan->insertSumbangan($id,$nama,$jenis,$nominal,$tgl);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Sumbangan Berhasil di Simpan');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_sumbangan/');
            }
        }

        public function updateSumbangan()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $jenis = htmlspecialchars($_POST['jenis']);
            $nominal = htmlspecialchars($_POST['nominal']);
            $tgl = htmlspecialchars($_POST['tgl']);

            if(empty($id) || empty($nama) || empty($jenis) || empty($nominal) || empty($tgl))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_sumbangan/');
            }

            $sendToModel = $this->ModelSumbangan->updateSumbangan($id,$nama,$jenis,$nominal,$tgl);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Sumbangan Berhasil di Ubah');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_sumbangan/');
            }
        }

        public function konfirmasi_sumbangan()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Konfirmasi Sumbangan";
            $id = $this->uri->segment(3);
            $data['active'] = "9";
            $data['sumbangan'] = $this->ModelSumbangan->getDataSumbanganAprove();
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-konfirmasi-sumbangan',$data);
            $this->load->view('framework/footer');
        }

        public function updateSumbanganDonatur()
        {
            $id = $this->uri->segment(3);
            $sendToModel = $this->ModelSumbangan->updateSumbanganDonatur($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Sumbangan Berhasil di Konfirmasi');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/konfirmasi_sumbangan/');
            }
        }

        public function list_pengguna()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Data Pengguna";
            $data['active'] = "10";
            $data['pengguna'] = $this->ModelUser->getAllDataUsers();
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-data-pengguna',$data);
            $this->load->view('framework/footer');
        }

        public function insertPengguna()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $tgl = htmlspecialchars($_POST['tgl']);
            $jk = htmlspecialchars($_POST['jk']);
            $jp =  htmlspecialchars($_POST['jp']);

            if(empty($id) || empty($nama) || empty($alamat) || empty($tgl) || empty($jk) || empty($jp))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_pengguna/');
            }
            $sendToModel = $this->ModelUser->insertPengguna($id,$nama,$alamat,$tgl,$jk,$jp);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengguna Berhasil di Simpan');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengguna/');
            }
        }

        public function updatePengguna()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $tgl = htmlspecialchars($_POST['tgl']);
            $jk = htmlspecialchars($_POST['jk']);
            $jp =  htmlspecialchars($_POST['jp']);

            if(empty($id) || empty($nama) || empty($alamat) || empty($tgl) || empty($jk) || empty($jp))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_pengguna/');
            }
            $sendToModel = $this->ModelUser->updatePengguna($id,$nama,$alamat,$tgl,$jk,$jp);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengguna Berhasil di Ubah');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengguna/');
            }
        }

        public function deletePengguna()
        {
            $id = $this->uri->segment(3);
            $sendToModel = $this->ModelUser->deletePengguna($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengguna Berhasil di Hapus');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengguna/');
            }
        }

        public function laporan_keuangan()
        {   
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Laporan Keuangan";
            if(isset($_POST['submit']))
            {
                $tahun = $_POST['tahun'];
                $data['tahun'] = $tahun;
                $data['sumPemasukan'] = $this->ModelSumbangan->getDataSumSumbangan($tahun);
                $data['sumPengeluaran'] = $this->ModelPengeluaran->getDataSumPengeluaran($tahun);
            }else{
                $tahun = 2019;
                $data['tahun'] = $tahun;
                $data['sumPemasukan'] = $this->ModelSumbangan->getDataSumSumbangan($tahun);
                $data['sumPengeluaran'] = $this->ModelPengeluaran->getDataSumPengeluaran($tahun);
            }
            
            $data['active'] = "11";
            $data['sumbangan'] = $this->ModelSumbangan->getDataPendapatan($tahun);
            $data['pengeluaran'] = $this->ModelPengeluaran->getAllDataPengeluaran($tahun);
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-laporan-keuangan',$data);
            $this->load->view('framework/footer');
        
            
        }
        public function laporan_bulanan()
        {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Laporan Keuangan";
            $data['active'] = "11";
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['sumbangan'] = $this->ModelSumbangan->getDataSumbanganByTahunAndBulan($tahun,$bulan);
            $data['sumPemasukan'] = $this->ModelSumbangan->getDataSumPemasukanByTahunAndBulan($tahun,$bulan);
            $data['pengeluaran'] = $this->ModelPengeluaran->getDataPengeluaranByTahunAndBulan($tahun,$bulan);
            $data['sumPengeluaran'] = $this->ModelPengeluaran->getDataSumPengeluaranByTahunAndBulan($tahun,$bulan);
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-data-bulanan',$data);
            $this->load->view('framework/footer');
        }

       
        public function cetak_laporan()
        {
            if(isset($_POST['submit']))
            {
                $tahun = $_POST['tahun'];
                $data['tahun'] = $tahun;
            }else{
                $tahun = 2019;
                $data['tahun'] = $tahun;
            }
            $data['sumbangan'] = $this->ModelSumbangan->getDataPendapatan($tahun);
            $data['pengeluaran'] = $this->ModelPengeluaran->getAllDataPengeluaran($tahun);

            $this->load->view('pages/v-cetak-laporan',$data);
        }

        public function list_pengeluaran()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Data Pengeluaran";
            $data['active'] = "14";
            $data['pengeluaran'] = $this->ModelPengeluaran->getDataPengeluaran();
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-data-pengeluaran',$data);
            $this->load->view('framework/footer');
        }

        public function cetak_pengeluaran()
        {
            $data['pengeluaran'] = $this->ModelPengeluaran->getDataPengeluaran();
            $this->load->view('pages/cetak-pengeluaran',$data);
        }

        public function insertPengeluaran()
        {
            $id = htmlspecialchars($_POST['id']);
            $tujuan = htmlspecialchars($_POST['tujuan']);
            $nominal = htmlspecialchars($_POST['nominal']);
            $keterangan = htmlspecialchars($_POST['keterangan']);
            $tgl = htmlspecialchars($_POST['tgl']);
            if(empty($id) || empty($tujuan) || empty($nominal) || empty($keterangan) || empty($tgl))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_pengeluaran/');
            }

            $sendToModel = $this->ModelPengeluaran->insertPenguluaran($id,$tujuan,$nominal,$keterangan,$tgl);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengeluaran Berhasil di tambahkan');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengeluaran/');
            }
        }

        public function deletePengeluaran()
        {
            $id = $this->uri->segment(3);
            $sendToModel = $this->ModelPengeluaran->deletePengeluaran($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengeluaran Berhasil di hapus');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_pengeluaran/');
            }
        }
        // "ADMIN"

        // "DONATUR"
        public function data_sumbangan()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Sumbangan";
            $id = $this->uri->segment(3);
            $data['jenis'] = $this->ModelSumbangan->getDataJenisSumbangan();
            $data['active'] = "8";
            $data['sumbangan'] = $this->ModelSumbangan->getDataSumbanganDonatur($id);
            $data['jumlah'] = $this->ModelSumbangan->getDataJumlahSumbanganDonatur($id);
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/banner-post',$data);
            $this->load->view('pages/v-data-sumbangan-donatur',$data);
            $this->load->view('layout/footer');
        }

        public function insertSumbanganDonatur()
        {   
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $jenis = htmlspecialchars($_POST['jenis']);
            $nominal = htmlspecialchars($_POST['nominal']);
            $tgl = htmlspecialchars($_POST['tgl']);
            // if(empty($id) || empty($nama) || $jenis || empty($nominal) || empty($tgl))
            // {
            //     $this->session->set_flashdata('status','warning');
            //     $this->session->set_flashdata('message','Harap Lengkapi data !!');
            //     $this->session->set_flashdata('title','Warning !!');
            //     redirect($base.'home/data_sumbangan/'.$nama);
            // }
			$config['upload_path'] = "./assets/home/img/bukti";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            
			$this->upload->initialize($config);
            if( $this->upload->do_upload('file') )
            {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                $sendToModel = $this->ModelSumbangan->insertSumbanganDonatur($id,$nama,$jenis,$nominal,$tgl,$foto);
                if ($sendToModel)
                {
                    $this->session->set_flashdata('status',"success");
                    $this->session->set_flashdata('message','Sumbangan Berhasil di Simpan');
                    $this->session->set_flashdata('title','Success !!');
                    redirect($base.'home/data_sumbangan/'.$nama);
                }
            }else{
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Silahkan Masukan type File yang disetujui !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/data_sumbangan/'.$nama);
            }
        }

        public function cek_sumbangan()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Sumbangan";
            $id = $this->uri->segment(3);
            $data['sumbangan'] = $this->ModelSumbangan->getDataSumbanganById($id);
            $data['active'] = "9";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-cek-sumbangan',$data);
            $this->load->view('framework/footer');
        }
        // "DONATUR"

        // <!-- Data sumbangan -- >

        // <!-- PROYEK -- >

        public function list_proyek()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $user_id="";
            if(!$this->session->userdata('admin') || !$this->session->userdata('admin')){
                $user_id = $this->session->userdata('id');
            }
            
            $data['active'] = "12";
            $data['page'] = "Data Proyek";
            $data['proyek'] = $this->ModelProyek->getDataProyek($user_id);
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-data-proyek',$data);
            $this->load->view('framework/footer');
        }

        public function form_proyek()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['active'] = "13";
            $data['penanggung_jawab'] = $this->ModelUser->getDataPJ();
            $data['page'] = "Form Proyek";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-form-proyek');
            $this->load->view('framework/footer');
        }

        public function proses_insertproyek()
        {
            $id_proyek = htmlspecialchars($_POST['id_proyek']);
            $proyek = htmlspecialchars($_POST['proyek']);
            $pj = htmlspecialchars($_POST['pj']);
            $durasi = htmlspecialchars($_POST['durasi']);
            $file = $_FILES['file'];
            $tgl = htmlspecialchars($_POST['tgl']);

            if(empty($proyek) || empty($durasi) || empty($pj) || $file == null)
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/form_proyek/');
            }
            $config['upload_path'] = "./assets/home/img/proyek/thumbnail/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if( $this->upload->do_upload('file') )
            {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                $sendToModel = $this->ModelProyek->insertProyek($id_proyek,$pj,$proyek,$durasi,$foto,$tgl);
                if ($sendToModel)
                {
                    $this->session->set_flashdata('status',"success");
                    $this->session->set_flashdata('message','Proyek Berhasil di Simpan');
                    $this->session->set_flashdata('title','Success !!');
                    redirect($base.'home/form_proyek/');
                }
            }else{
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Silahkan Masukan type File yang disetujui !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/form_proyek/');
            }
        }
        public function editProgress()
        {
            $id_proyek = htmlspecialchars($_POST['id_proyek2']);
            $progress = htmlspecialchars($_POST['kemajuan']);
            if(empty($progress))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Harap Lengkapi data !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_proyek/');
            }
            $sendToModel = $this->ModelProyek->updateProgress($id_proyek,$progress);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Kemajuan Proyek Berhasil diperbarui !');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_proyek/');
            }
        }

        public function insertDokumentasi()
        {
            $id_dokumentasi = htmlspecialchars($_POST['id_dokumentasi']);
            $id_proyek = htmlspecialchars($_POST['id_proyek']);
            $gambar = $_FILES['gambar']['name'];
            $laporan = $_FILES['laporan']['name'];
           
            $foto = $this->_uploadImage();
            $file = $this->_uploadFile();

            $sendToModel = $this->ModelProyek->insertDokumentasi($id_dokumentasi,$id_proyek,$foto,$file);
            if ($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Dokumentasi Berhasil di Tambahkan !');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_proyek/');
            }
        
        }
        public function _uploadImage()
        {
            $config['upload_path'] = "./assets/home/img/proyek/dokumentasi/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if($this->upload->do_upload('gambar'))
            {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                return $foto;
            }else{
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Silahkan Masukan type File yang disetujui !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_proyek/');
            }
        }

        public function _uploadFile()
        {
            $config['upload_path'] = "./assets/home/img/proyek/laporan/";
            $config['allowed_types'] = 'pdf|docx|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if($this->upload->do_upload('laporan'))
            {
                $data = array('upload_data' => $this->upload->data());
                $file = $data['upload_data']['file_name'];
                return $file;
            }else{
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Silahkan Masukan type File yang disetujui !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/list_proyek/');
            }
        }

        public function deleteProyek()
        {
            $id = $this->uri->segment(3);
            $deleteDokumentasi = $this->ModelProyek->deleteDokumentasiById($id);
            $sendToModel = $this->ModelProyek->deleteProyek($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Proyek Berhasil Di hapus!');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/list_proyek/'); 
            }
        }

        public function list_dokumentasi()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['active'] = "19";
            $id_proyek = $this->uri->segment(3);
            $data['dokumentasi'] = $this->ModelProyek->getDataDokumentasiById($id_proyek);
            $data['page'] = "Dokumentasi";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-data-dokumentasi',$data);
            $this->load->view('framework/footer');
        }

        public function data_dokumentasi()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['active'] = "20";
            $id_proyek = $this->uri->segment(3);
            $data['dokumentasi'] = $this->ModelProyek->getDataDokumentasi();
            $data['page'] = "Dokumentasi";
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/banner-post',$data);
            $this->load->view('pages/dokumentasi-donatur',$data);
            $this->load->view('layout/footer');
        }

        public function detail_proyek()
        {
            $id_proyek = $this->uri->segment(3);
            $data['dokumentasi'] = $this->ModelProyek->getDataDokumentasiById($id_proyek);
            $data['page'] = "Detail Proyek";
            $data['detail'] = $this->db->query("SELECT * from tb_dokumentasi WHERE id_proyek = '$id_proyek' LIMIT 1")->result_array();
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/banner-post',$data);
            $this->load->view('pages/detail-proyek',$data);
            $this->load->view('layout/footer');
        }

        public function detail_dokumentasi()
        {
            $id_proyek = $this->uri->segment(3);
            $data['page'] = "Detail Dokumentasi";
            $data['dokumentasi'] = $this->ModelProyek->getDataDokumentasiWhereID($id_proyek); 
            //$data['detail'] = $this->db->get_where('tb_dokumentasi',['id_proyek' => $id_proyek])->result_array();
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/banner-post',$data);
            $this->load->view('pages/detail-dokumentasi',$data);
            $this->load->view('layout/footer');
        }

        public function detail_laporan()
        {
            $id = $this->uri->segment(3);
            $data['detail'] = $this->db->get_where('tb_dokumentasi',['id_dokumentasi' => $id])->result_array();
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['active'] = "20";
            $data['page'] = "Dokumentasi";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-detail-dokumentasi',$data);
            $this->load->view('framework/footer');
        
        }
        // <!-- PROYEK -- >
        public function gallery()
        {
            $data['gallery'] = $this->ModelGalleri->getDataGaleri();
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Galleri";
            $data['active'] = "21";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-gallery',$data);
            $this->load->view('framework/footer');
        }

        public function form_gallery()
        {
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = " Form Galleri";
            $data['active'] = "22";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-form-gallery');
            $this->load->view('framework/footer');
        }

        public function insertGallery()
        {
            $judul = htmlspecialchars($_POST['judul']);
            $config['upload_path'] = "./assets/home/img/galeri/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if( $this->upload->do_upload('file') )
            {
                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];
                $sendToModel = $this->ModelProyek->insertGallery($judul,$foto);
                if ($sendToModel)
                {
                    $this->session->set_flashdata('status',"success");
                    $this->session->set_flashdata('message','Galeri Berhasil di Tambahkan !');
                    $this->session->set_flashdata('title','Success !!');
                    redirect($base.'home/form_gallery/');
                }
            }else{
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Silahkan Masukan Gambar yang benar !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/form_gallery/');
            }
        }

        public function deleteGallery()
        {
            $id = $this->uri->segment(3);
            $sendToModel = $this->ModelGalleri->deleleGalleri($id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                    $this->session->set_flashdata('message','Foto Galeri Berhasil di Hapus !');
                    $this->session->set_flashdata('title','Success !!');
                    redirect($base.'home/gallery/');
            }
        }

        public function profile()
        {
            $id = $this->session->userdata('id');
            $data['profile'] = $this->ModelUser->getDataUsersByUser($id);
            $data['pesan'] = $this->ModelDonatur->getDataPesan();
            $data['page'] = "Profile";
            $data['active'] = "25";
            $this->load->view('framework/header');
            $this->load->view('framework/sidebar',$data);
            $this->load->view('framework/navbar');
            $this->load->view('framework/mobile-menu');
            $this->load->view('pages/v-profile',$data);
            $this->load->view('framework/footer');
        }

        public function updateDetails()
        {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $tgl = htmlspecialchars($_POST['ttl']);
            $jk = htmlspecialchars($_POST['jk']);
            $password = htmlspecialchars($_POST['password']);
            $konfirm = htmlspecialchars($_POST['konfirmPassword']);
            if($konfirm != $password)
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Password dan Konfirmasi Password harus sama !!');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/profile/');
            }

            if(empty($nama) || empty($alamat) || empty($tgl) || empty($jk) || empty($password) || empty($konfirm))
            {
                $this->session->set_flashdata('status','warning');
                $this->session->set_flashdata('message','Field Tidak Boleh ada yang kosong !');
                $this->session->set_flashdata('title','Warning !!');
                redirect($base.'home/profile/');
            }

            $sendToModel = $this->ModelUser->updateDetail($nama,$alamat,$tgl,$jk,$password,$id);
            if($sendToModel)
            {
                $this->session->set_flashdata('status',"success");
                $this->session->set_flashdata('message','Data Pengguna Berhasil diperbarui !');
                $this->session->set_flashdata('title','Success !!');
                redirect($base.'home/profile/');
            }
        }

        public function cancelUpdate()
        {
            $this->session->set_flashdata('status','warning');
            $this->session->set_flashdata('message','Silahkan Klik Tombol Ubah Data jika ingin mengubah !!');
            $this->session->set_flashdata('title','Warning !!');
            redirect($base.'home/profile/');
        }

        public function kwitansi()
        {
            $this->load->view('pages/v-kwitansi');
        }

       
        
        public function logout()
        {
            $this->session->sess_destroy();
            redirect($base);
        }
        
    }