<?php

    class ModelSiswa extends CI_Model{

        public function getDataSiswa()
        {
            $sql = "SELECT * from tb_siswa";
            return $this->db->query($sql)->result_array();
        }        

        public function insertSiswa($nama,$jk,$asal,$tingkatan,$hafalan,$status)
        {
            $sql = "INSERT INTO tb_siswa (nama_siswa,jenis_kelamin,asal,tingkatan,hafalan,status) VALUES(?,?,?,?,?,?)";
            return $this->db->query($sql,array($nama,$jk,$asal,$tingkatan,$hafalan,$status));
        }

        public function upateSiswa($id,$nama,$jk,$asal,$tingkatan,$hafalan,$status)
        {
            $sql = "UPDATE tb_siswa SET nama_siswa = ?,jenis_kelamin = ?,asal = ?,tingkatan = ?,hafalan = ?,status = ? 
                        WHERE id_siswa = ? ";
            return $this->db->query($sql,array($nama,$jk,$asal,$tingkatan,$hafalan,$status,$id));
        }

        public function deleteSiswa($id)
        {
            $sql = "DELETE from tb_siswa WHERE id_siswa = ?";
            return $this->db->query($sql,$id);
        }
        
    }