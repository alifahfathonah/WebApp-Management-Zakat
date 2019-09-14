<?php

    class ModelProyek extends CI_Model{

        public function insertProyek($id_proyek,$pj,$proyek,$durasi,$foto,$tgl)
        {
            $sql = "INSERT INTO tb_proyek VALUES(?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($id_proyek,$pj,$proyek,$durasi,0,$foto,$tgl));
        }

        public function getAllDataProyek()
        {
            $sql = "SELECT * from tb_proyek ";
            return $this->db->query($sql)->result_array();
        }

        public function getDataProyek($user_id)
        {
            $sql = "";
            if($user_id!=null){
                $sql = "SELECT id_proyek,tb_pengguna.nama,nama_proyek,durasi,kemajuan,thumbnail
                         from 
                         tb_proyek,tb_pengguna
                         WHERE
                         tb_pengguna.id_pengguna = tb_proyek.id_pengguna AND
                         tb_proyek.id_pengguna = '$user_id'";

            }else{
            $sql = "SELECT id_proyek,tb_pengguna.nama,nama_proyek,durasi,kemajuan,thumbnail,tanggal_proyek
                         from 
                         tb_proyek,tb_pengguna
                         WHERE
                         tb_pengguna.id_pengguna = tb_proyek.id_pengguna";
            }
            return $this->db->query($sql)->result_array();

        }
        public function updateProgress($id_proyek,$progress)
        {
            $sql = "UPDATE tb_proyek SET kemajuan = ? WHERE id_proyek = ?";
            return $this->db->query($sql,array($progress,$id_proyek));
        }

        public function insertDokumentasi($id_dokumentasi,$id_proyek,$foto,$file)
        {
            $sql = "INSERT INTO tb_dokumentasi VALUES(?,?,?,?)";
            return $this->db->query($sql,array($id_dokumentasi,$id_proyek,$foto,$file));
        }

        public function getDataDokumentasiById($id_proyek)
        {
            $sql = "SELECT gambar,nama,nama_proyek,id_dokumentasi,tanggal_proyek,durasi,thumbnail
                        FROM tb_dokumentasi,tb_proyek,tb_pengguna 
                        WHERE
                        tb_proyek.id_proyek = tb_dokumentasi.id_proyek AND
                        tb_pengguna.id_pengguna = tb_proyek.id_pengguna AND
                        tb_proyek.id_proyek = ? ORDER BY id_dokumentasi DESC LIMIT 1";
            return $this->db->query($sql,$id_proyek)->result_array();
        }
        public function getDataDokumentasi()
        {
            $sql = "SELECT gambar,nama,nama_proyek,id_dokumentasi,tanggal_proyek 
                        FROM tb_dokumentasi,tb_proyek,tb_pengguna 
                        WHERE
                        tb_proyek.id_proyek = tb_dokumentasi.id_proyek AND
                        tb_pengguna.id_pengguna = tb_proyek.id_pengguna ORDER BY id_dokumentasi DESC";
            return $this->db->query($sql)->result_array();
        }

        public function deleteDokumentasiById($id)
        {
            $sql = "DELETE from tb_dokumentasi WHERE id_proyek = ?";
            return $this->db->query($sql,$id);
        }

        public function insertGallery($judul,$foto)
        {
            $sql = "INSERT INTO tb_gallery(judul_gambar,gambar)VALUES(?,?)";
            return $this->db->query($sql,array($judul,$foto));
        }

        public function getDataProyekByTahun($tahun){
            $sql = "SELECT count(id_proyek) as jumlah from tb_proyek
                        WHERE 
                        month(tanggal_proyek) = ? AND
                        year(tanggal_proyek) = ?";
            $containerBulan = array();
            for($i = 1;$i<=12;$i++)
            {
                $bulan = $this->db->query($sql,array("0".$i,$tahun))->result_array();
                $containerBulan[$i] = $bulan;
            }
            return $containerBulan;
        }

        public function deleteProyek($id)
        {
            $sql = "DELETE from tb_proyek WHERE id_proyek = ?";
            return $this->db->query($sql,$id);
        }
       
        public function getDataDokumentasiWhereID($id_proyek)
        {
            $sql = "SELECT tb_proyek.nama_proyek,detail,gambar
                        from tb_dokumentasi,tb_proyek
                        WHERE tb_proyek.id_proyek = tb_dokumentasi.id_proyek and
                              tb_dokumentasi.id_dokumentasi = ?";
            return $this->db->query($sql,$id_proyek)->result_array();
        }
    }