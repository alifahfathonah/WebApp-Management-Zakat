<?php 

    class ModelPengeluaran extends CI_Model{
        public function insertPenguluaran($id,$tujuan,$nominal,$keterangan,$tgl)
        {
            $sql = "INSERT INTO tb_pengeluaran VALUES(?,?,?,?,?)";
            return $this->db->query($sql,array($id,$tujuan,$nominal,$keterangan,$tgl));
        }

        public function getDataPengeluaran()
        {
            $sql = "SELECT * from tb_pengeluaran ORDER BY tanggal_keluar DESC";
            return $this->db->query($sql)->result_array();
        }


        public function getAllDataPengeluaran($tahun)
        {
            $sql = "SELECT SUM(nominal) as jumlah from tb_pengeluaran WHERE month(tanggal_keluar) = ? and year(tanggal_keluar) = ?";
            $containerBulan = array();
            for($i = 1;$i<=12;$i++){
                $bulan = $this->db->query($sql,array("0".$i,$tahun))->result_array();
                $containerBulan[$i] = $bulan;
            }
            return $containerBulan;
        }
        public function deletePengeluaran($id)
        {
            $sql = "DELETE from tb_pengeluaran WHERE id_pengeluaran = ?";
            return $this->db->query($sql,$id);
        }

        public function getDataSumPengeluaran($tahun)
        {
            $sql = "SELECT sum(nominal)as jumlah from tb_pengeluaran WHERE year(tanggal_keluar) = ?";
            return $this->db->query($sql,$tahun)->result_array();
        }

        public function getDataPengeluaranByTahunAndBulan($tahun,$bulan)
        {
            $sql = "SELECT * from tb_pengeluaran WHERE year(tanggal_keluar) = ? and month(tanggal_keluar) = ?";
            return $this->db->query($sql,array($tahun,$bulan))->result_array();
        }

        public function getDataSumPengeluaranByTahunAndBulan($tahun,$bulan)
        {
            $sql = "SELECT SUM(nominal)as jumlah from tb_pengeluaran WHERE year(tanggal_keluar) = ? and month(tanggal_keluar) = ?";
            return $this->db->query($sql,array($tahun,$bulan))->result_array();
        }
    }