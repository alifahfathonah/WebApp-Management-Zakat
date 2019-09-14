<?php

    class ModelUser extends CI_Model{

        public function getDataUsers($username,$password)
        {
            $sql = "SELECT * from tb_pengguna WHERE id_pengguna = ? and password = ?";
            return $this->db->query($sql,array($username,md5($password)));
        }
        
        public function getAllDataUsers()
        {
            $sql = "SELECT * from tb_pengguna WHERE jenis_pengguna != ? ORDER BY jenis_pengguna = ? DESC";
            return $this->db->query($sql,array("donatur","Ketua Pesantren"))->result_array();
        }
        public function insertPengguna($id,$nama,$alamat,$tgl,$jk,$jp)
        {
            $sql = "INSERT INTO tb_pengguna VALUES(?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($id,$nama,$alamat,$tgl,$jk,$jp,md5($id)));
        }

        public function updatePengguna($id,$nama,$alamat,$tgl,$jk,$jp)
        {
            $sql = "UPDATE tb_pengguna SET nama = ?,alamat = ?,tgl_lahir = ?,jenis_kelamin = ?, jenis_pengguna = ?
                        WHERE id_pengguna = ?";
            return $this->db->query($sql,array($nama,$alamat,$tgl,$jk,$jp,$id));
        }

        public function getDataPJ()
        {
            $sql = "SELECT * from tb_pengguna WHERE jenis_pengguna = ?";
            return $this->db->query($sql,"Penanggung Jawab")->result_array();
        }

        public function getDataUsersByID($id,$email)
        {
            $sql = "SELECT * from tb_pengguna WHERE id_pengguna = ? or email = ?";
            return $this->db->query($sql,array($id,$email))->result_array();
        }

        public function getDataUsersByUser($id)
        {
            $sql = "SELECT * from tb_pengguna WHERE id_pengguna = ?";
            return $this->db->query($sql,$id)->result_array();
        }

        public function insertUser($username,$nama,$email,$password)
        {
            $sql = "INSERT INTO tb_pengguna (id_pengguna,nama,email,jenis_pengguna,password) VALUES(?,?,?,?,?)";
            return $this->db->query($sql,array($username,$nama,$email,"donatur",md5($password)));
        }
        
        public function deletePengguna($id)
        {
            $sql = "DELETE from tb_pengguna WHERE id_pengguna = ?";
            return $this->db->query($sql,$id);
        }

        public function updateDetail($nama,$alamat,$tgl,$jk,$password,$id)
        {
            $sql = "UPDATE tb_pengguna SET nama = ?,alamat = ?,tgl_lahir = ?,jenis_kelamin = ?, password = ? WHERE id_pengguna = ?";
            return $this->db->query($sql,array($nama,$alamat,$tgl,$jk,md5($password),$id));

        }
    }