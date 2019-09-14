<?php 

    class ModelDonatur extends CI_Model{

        public function getDataDonatur()
        {
            $sql = "SELECT * from tb_pengguna WHERE jenis_pengguna = ? ";
            return $this->db->query($sql,"donatur")->result_array();
        }

        public function insertDonatur($id,$nama,$alamat,$tgl,$jk,$role)
        {
            $sql = "INSERT INTO tb_pengguna VALUES(?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($id,$nama,$alamat,$tgl,$jk,$role,md5($id)));
        }

        public function insertPesan($nama,$pesan,$tgl)
        {
            $sql = "INSERT INTO tb_pesan (id_pengguna,isi_pesan,tgl) VALUE(?,?,?)";
            return $this->db->query($sql,array($nama,$pesan,$tgl));
        }

        public function getDataPesan()
        {
            $sql = "SELECT tb_pengguna.nama,tb_pesan.tgl,tb_pesan.isi_pesan,tgl,status,id_pesan 
                        from tb_pesan,tb_pengguna 
                        WHERE 
                        tb_pengguna.id_pengguna = tb_pesan.id_pengguna AND
                        tb_pesan.status = ?
                        ";
            return $this->db->query($sql,"")->result_array();
        }

        public function updateDonatur($id,$nama,$alamat,$tgl,$jk)
        {
            $sql = "UPDATE tb_pengguna SET nama = ?,alamat = ?,tgl_lahir = ?, jenis_kelamin = ? 
                        WHERE id_pengguna = ?";
            return $this->db->query($sql,array($nama,$alamat,$tgl,$jk,$id));
        }
        public function deleteDonatur($id)
        {
            $sql = "DELETE from tb_pengguna WHERE id_pengguna = ?";
            return $this->db->query($sql,$id);
        }
        public function updatePesan($id)
        {
            $sql = "UPDATE tb_pesan SET status = ? 
                        WHERE id_pesan = ?";
            return $this->db->query($sql,array("dibaca",$id));
        }
    }