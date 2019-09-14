<?php

    class ModelSumbangan extends CI_Model{

        public function getDataJenisSumbangan()
        {
            $sql = "SELECT * from tb_jenis_sumbangan";
            return $this->db->query($sql)->result_array();
        }

        public function insertJenis($kode,$nama)
        {
            $sql = "INSERT INTO tb_jenis_sumbangan VALUES(?,?)";
            return $this->db->query($sql,array($kode,$nama));
        }

        public function updateJenis($kode,$nama)
        {
            $sql = "UPDATE tb_jenis_sumbangan SET nama_sumbangan = ? WHERE kode_sumbangan = ?";
            return $this->db->query($sql,array($nama,$kode));
        }

        public function deleteJenis($id)
        {
            $sql = "DELETE from tb_jenis_sumbangan WHERE kode_sumbangan = ?";
            return $this->db->query($sql,$id);
        }

        public function getDataSumbangan()
        {
            $sql = "SELECT tb_sumbangan.id_sumbangan,tb_pengguna.nama,tb_jenis_sumbangan.nama_sumbangan,tb_sumbangan.nominal_sumbangan,
                            tb_sumbangan.tgl_terima,tb_pengguna.id_pengguna,tb_jenis_sumbangan.kode_sumbangan from tb_sumbangan,tb_pengguna,tb_jenis_sumbangan WHERE
                                                    tb_pengguna.id_pengguna = tb_sumbangan.id_pengguna and
                                                    tb_jenis_sumbangan.kode_sumbangan = tb_sumbangan.kode_sumbangan and
                                                    status=? ORDER BY tgl_terima DESC";
            return $this->db->query($sql,"konfirmasi")->result_array();
        }

        public function getDataSumbanganAprove()
        {
            $sql = "SELECT tb_sumbangan.id_sumbangan,tb_pengguna.nama,tb_jenis_sumbangan.nama_sumbangan,tb_sumbangan.nominal_sumbangan,
                            tb_sumbangan.tgl_terima,tb_sumbangan.status,tb_sumbangan.bukti_transfer from tb_sumbangan,tb_pengguna,tb_jenis_sumbangan WHERE
                                                    tb_pengguna.id_pengguna = tb_sumbangan.id_pengguna and
                                                    tb_jenis_sumbangan.kode_sumbangan = tb_sumbangan.kode_sumbangan and
                                                    status=?";
            return $this->db->query($sql,"belum konfirmasi")->result_array();
        }

        public function getDataSumbanganById($id)
        {
            $sql = "SELECT tb_sumbangan.id_sumbangan,tb_pengguna.nama,tb_jenis_sumbangan.nama_sumbangan,tb_sumbangan.nominal_sumbangan,
                            tb_sumbangan.tgl_terima,tb_sumbangan.bukti_transfer,tb_sumbangan.status
                        from tb_sumbangan,tb_pengguna,tb_jenis_sumbangan WHERE
                                    tb_pengguna.id_pengguna = tb_sumbangan.id_pengguna and
                                    tb_jenis_sumbangan.kode_sumbangan = tb_sumbangan.kode_sumbangan and
                                    tb_sumbangan.id_pengguna = ?";
            return $this->db->query($sql,$id)->result_array();
        }

        public function updateSumbanganDonatur($id)
        {
            $sql = "UPDATE tb_sumbangan SET status = ? WHERE id_sumbangan = ?";
            return $this->db->query($sql,array("konfirmasi",$id));
        }

        public function getDataSumbanganDonatur($id)
        {
            $sql = "SELECT tb_sumbangan.id_sumbangan,tb_pengguna.nama,tb_jenis_sumbangan.nama_sumbangan,tb_sumbangan.nominal_sumbangan,
                            tb_sumbangan.tgl_terima,tb_sumbangan.bukti_transfer,tb_sumbangan.status
                        from tb_sumbangan,tb_pengguna,tb_jenis_sumbangan WHERE
                                    tb_pengguna.id_pengguna = tb_sumbangan.id_pengguna and
                                    tb_jenis_sumbangan.kode_sumbangan = tb_sumbangan.kode_sumbangan and
                                    tb_sumbangan.id_pengguna = ? ";
            return $this->db->query($sql,$id)->result_array();
        }

        public function getDataJumlahSumbanganDonatur($id)
        {
            $sql = "SELECT SUM(nominal_sumbangan)as jumlah from tb_sumbangan WHERE id_pengguna = ? and status = ?";
            return $this->db->query($sql,array($id,"konfirmasi"))->result_array();
        }

        public function insertSumbangan($id,$nama,$jenis,$nominal,$tgl)
        {
            $sql = "INSERT INTO tb_sumbangan (id_sumbangan,id_pengguna,kode_sumbangan,nominal_sumbangan,tgl_terima,status) 
                        VALUES(?,?,?,?,?,?)";
            return $this->db->query($sql,array($id,$nama,$jenis,$nominal,$tgl,"konfirmasi"));
        }

        public function updateSumbangan($id,$nama,$jenis,$nominal,$tgl)
        {
            $sql = "UPDATE tb_sumbangan SET id_pengguna = ?,kode_sumbangan = ?,nominal_sumbangan = ?,tgl_terima = ? 
                        WHERE id_sumbangan = ?";
            return $this->db->query($sql,array($nama,$jenis,$nominal,$tgl,$id));

        }

        public function getDataJumlahSumbangan()
        {
            $sql = "SELECT SUM(nominal_sumbangan)as jumlah from tb_sumbangan WHERE status=?";
            return $this->db->query($sql,"konfirmasi")->result_array();
        }

        public function insertSumbanganDonatur($id,$nama,$jenis,$nominal,$tgl,$foto)
        {
            $sql = "INSERT INTO tb_sumbangan VALUES(?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($id,$nama,$jenis,$nominal,$tgl,$foto,"belum konfirmasi"));
        }

        public function getDataPendapatan($tahun)
        {
            $sql = "SELECT sum(nominal_sumbangan)as jumlah from tb_sumbangan WHERE month(tgl_terima) = ? and year(tgl_terima) = ? and status = ? ";
            $containerBulan = array();
            for($i = 1; $i<=12;$i++){
            $bulan =$this->db->query($sql,array("0".$i,$tahun,"konfirmasi"))->result_array();
            $containerBulan[$i] =  $bulan;
           }
            return $containerBulan;
        }

        public function getDataSumbanganByDetail($id)
        {
            $sql = "SELECT nama,nominal_sumbangan,tgl_terima,nama_sumbangan 
                        From tb_pengguna,tb_sumbangan,tb_jenis_sumbangan
                        WHERE
                        tb_pengguna.id_pengguna = tb_sumbangan.id_pengguna AND
                        tb_jenis_sumbangan.kode_sumbangan = tb_sumbangan.kode_sumbangan AND
                        tb_sumbangan.id_sumbangan = ?";
            return $this->db->query($sql,$id)->result_array();
        }

        public function getDataSumSumbangan($tahun)
        {
            $sql = "SELECT SUM(nominal_sumbangan)as jumlah from tb_sumbangan WHERE year(tgl_terima) = ?";
            return $this->db->query($sql,$tahun)->result_array();
        }
        
        public function getDataSumbanganByTahunAndBulan($tahun,$bulan)
        {
            $sql = "SELECT tb_sumbangan.id_sumbangan,tb_pengguna.nama,tb_jenis_sumbangan.nama_sumbangan,tb_sumbangan.nominal_sumbangan,
                            tb_sumbangan.tgl_terima,tb_pengguna.id_pengguna,tb_jenis_sumbangan.kode_sumbangan from tb_sumbangan,tb_pengguna,tb_jenis_sumbangan WHERE
                                                    tb_pengguna.id_pengguna = tb_sumbangan.id_pengguna and
                                                    tb_jenis_sumbangan.kode_sumbangan = tb_sumbangan.kode_sumbangan and
                                                    year(tgl_terima) = ? and
                                                    month(tgl_terima) = ? and
                                                    status=? ORDER BY tgl_terima DESC";
            return $this->db->query($sql,array($tahun,$bulan,"konfirmasi"))->result_array();
        }

        public function getDataSumPemasukanByTahunAndBulan($tahun,$bulan)
        {
            $sql = "SELECT SUM(nominal_sumbangan)as jumlah from tb_sumbangan WHERE year(tgl_terima) = ? and month(tgl_terima) = ? and status = ?";
            return $this->db->query($sql,array($tahun,$bulan,"konfirmasi"))->result_array();
        }
    }