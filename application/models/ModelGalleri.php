<?php 

    class ModelGalleri extends CI_Model{

        public function getDataGaleri()
        {
            $sql = "SELECT * from tb_gallery";
            return $this->db->query($sql)->result_array();
        }

        public function deleleGalleri($id)
        {
            $sql = "DELETE from tb_gallery WHERE id_gambar = ?";
            return $this->db->query($sql,$id);
        }
    }