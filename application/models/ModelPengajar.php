<?php

    class ModelPengajar extends CI_Model{

        public function getDataPengajar()
        {
            $sql = "SELECT * from tb_pengajar";
            return $this->db->query($sql)->result_array();
        }

        public function insertPengajar($nama,$alumni,$studi)
        {
            $sql = "INSERT INTO tb_pengajar (nama_pengajar,alumni,bidang_studi) VALUES(?,?,?)";
            return $this->db->query($sql,array($nama,$alumni,$studi));
        }

        public function updatePengajar($nama,$alumni,$studi,$id)
        {
            $sql = "UPDATE tb_pengajar SET nama_pengajar = ?,alumni= ?, bidang_studi = ? WHERE id_pengajar = ?";
            return $this->db->query($sql,array($nama,$alumni,$studi,$id));
        }

        public function deletePengajar($id)
        {
            $sql = "DELETE from tb_pengajar WHERE id_pengajar = ?";
            return $this->db->query($sql,array($id));
        }
    }