<div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/home/js/swal.js"></script>
    <!-- jquery
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/counterup/waypoints.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/morrisjs/raphael-min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/morrisjs/morris.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/calendar/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/calendar/fullcalendar.min.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="<?= base_url(); ?>assets/home/js/tawk-chat.js"></script> -->
    <script src="<?= base_url(); ?>assets/home/js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="<?= base_url(); ?>assets/home/js/data-table/bootstrap-table.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/tableExport.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/data-table-active.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/bootstrap-editable.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?= base_url(); ?>assets/home/js/data-table/bootstrap-table-export.js"></script>
    
    <script>
        function insertSiswa()
        {
          document.getElementById("header").innerHTML = "Form Tambah Data Siswa";
          document.getElementById("nama").value = "";
          document.getElementById("jk").value = "";
          document.getElementById("asal").value = "";
          document.getElementById("tingkatan").value = "";
          document.getElementById("hafalan").value = "";
          document.getElementById("status").value = "";
          document.getElementById("id_siswa").readOnly = false;
          document.getElementById("form").action = "http://localhost/webzakat/home/insertsiswa/";
        }

        function editSiswa(id,nama,jk,asal,tingkatan,hafalan,status)
        {
          document.getElementById("header").innerHTML = "Form Ubah Data Siswa";
          document.getElementById("nama").value = nama;
          document.getElementById("jk").value = jk;
          document.getElementById("asal").value = asal;
          document.getElementById("tingkatan").value = tingkatan;
          document.getElementById("hafalan").value = hafalan;
          document.getElementById("status").value = status;
          document.getElementById("id_siswa").value = id;
          document.getElementById("id_siswa").readOnly  = true;
          document.getElementById("form").action = "http://localhost/webzakat/home/ubahsiswa/";
        }
        function deleteSiswa(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deletesiswa/" + id;
        }

        function insertPengajar()
        {
          document.getElementById("header").innerHTML = "Form Tambah Data Pengajar";
          document.getElementById("nama").value = "";
          document.getElementById("alumni").value = "";
          document.getElementById("studi").value = "";
          document.getElementById("form").action = "http://localhost/webzakat/home/insertpengajar/";
        }

        function editPengajar(id,nama,alumni,studi)
        {
          document.getElementById("header").innerHTML = "Form Ubah Data Pengajar";
          document.getElementById("nama").value = nama;
          document.getElementById("alumni").value = alumni;
          document.getElementById("studi").value = studi;
          document.getElementById("form").action = "http://localhost/webzakat/home/ubahPengajar/" + id;
        }

        function deletePengajar(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deletepengajar/" + id;
        }

        function deletePengguna(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deletePengguna/" + id;
        }

        function insertJenis()
        {
          document.getElementById("header").innerHTML = "Form Tambah Jenis Sumbangan";
          document.getElementById("kode").value = "S-"+ <?= time();?>;
          document.getElementById("nama").value = "";
          document.getElementById("form").action = "http://localhost/webzakat/home/insertjenis/";
          
        }

        function editJenis(id,nama)
        {
          document.getElementById("header").innerHTML = "Form Ubah Jenis Sumbangan";
          document.getElementById("kode").value = id;
          document.getElementById("nama").value = nama;
          document.getElementById("form").action = "http://localhost/webzakat/home/updatejenis/"+ id;
        }

        function deleteJenis(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deletejenis/" + id;
          document.getElementById("header").innerHTML = "Form Delete Jenis Sumbangan";
        }

        function insertSumbangan()
        {
          document.getElementById("header").innerHTML = "Form Tambah Data Sumbangan";
          document.getElementById("form").action = "http://localhost/webzakat/home/insertsumbangan/";
          document.getElementById("id").value = "SM-" + <?= time(); ?>;
          document.getElementById("nama").value = "";
          document.getElementById("jenis").value = "";
          document.getElementById("nominal").value = "";
          document.getElementById("tgl").value = "";

        }

        function updateSumbangan(id,nama,namasumbangan,nominal,tgl)
        {
          document.getElementById("header").innerHTML = "Form Ubah Data Sumbangan";
          document.getElementById("form").action = "http://localhost/webzakat/home/updateSumbangan/" + id;
          document.getElementById("id").value = id;
          document.getElementById("nama").value = nama;
          document.getElementById("jenis").value = namasumbangan;
          document.getElementById("nominal").value = nominal;
          document.getElementById("tgl").value = tgl;
        }

        //Donatur
        function editDonatur(id,nama,alamat,tgl,jk)
        {
          document.getElementById("header").innerHTML = "Form Update Donatur";
          document.getElementById("id").value = id;
          document.getElementById("nama").value = nama;
          document.getElementById("alamat").value = alamat;
          document.getElementById("tgl").value = tgl;
          document.getElementById("jk").value = jk;
          document.getElementById("id").readOnly  = true;
          document.getElementById("form").action = "http://localhost/webzakat/home/updateDonatur/";
        }
        function insertDonatur()
        {
          document.getElementById("header").innerHTML = "Form Tambah Donatur";
          document.getElementById("id").value = "";
          document.getElementById("nama").value = "";
          document.getElementById("alamat").value = "";
          document.getElementById("tgl").value = "";
          document.getElementById("jk").value = "";
          document.getElementById("id").readOnly  = false;
          document.getElementById("form").action = "http://localhost/webzakat/home/insertDonatur/";
        }
        function deleteDonatur(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deleteDonatur/" + id;
        }
        //Donatur
        //Pengguna
        function insertPengguna()
        {
          document.getElementById("header").innerHTML = "Form Tambah Pengguna";
          document.getElementById("id").value = "";
          document.getElementById("nama").value = "";
          document.getElementById("alamat").value = "";
          document.getElementById("tgl").value = "";
          document.getElementById("jk").value = "";
          document.getElementById("jp").value = "";
          document.getElementById("id").readOnly  = false;
          document.getElementById("form").action = "http://localhost/webzakat/home/insertPengguna/";
        }

        function editPengguna(id,nama,alamat,tgl,jk,jp)
        {
          document.getElementById("header").innerHTML = "Form Ubah Pengguna";
          document.getElementById("id").value = id;
          document.getElementById("nama").value = nama;
          document.getElementById("alamat").value = alamat;
          document.getElementById("tgl").value = tgl;
          document.getElementById("jk").value = jk;
          document.getElementById("jp").value = jp;
          document.getElementById("id").readOnly  = true;
          document.getElementById("form").action = "http://localhost/webzakat/home/updatePengguna/";
        }
        //Pengguna

        //proyek
        function tambahDokumentasi(id,nama)
        {
          document.getElementById("id_proyek").value = id;
          document.getElementById("nama").value = nama;
        }
        function editProyek(id,namaproyek,pj,kemajuan)
        {
          document.getElementById("id_proyek2").value = id;
          document.getElementById("namaproyek").value = namaproyek;
          document.getElementById("kemajuan").value = kemajuan;
        }

        function deleteProyek(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deleteProyek/" + id;
        }

        function deletePengeluaran(id)
        {
          document.getElementById("delete").href = "http://localhost/webzakat/home/deletePengeluaran/" + id;
        }
        //proyek

        function pilihTahun()
        {
          document.getElementById("form").action = "http://localhost/webzakat/home/laporan_keuangan/";

        }
        function cetakLaporan()
        {
          document.getElementById("form").action = "http://localhost/webzakat/home/cetak_laporan/";
        }

        function insertPengeluaran()
        {
          document.getElementById("header").innerHTML = "Form Tambah Data Pengeluaran";
          document.getElementById("tujuan").value = "";
          document.getElementById("nominal").value = "";
          document.getElementById("keterangan").value = "";
          document.getElementById("tgl").value = "";
          document.getElementById("form").action = "http://localhost/webzakat/home/insertPengeluaran/";
        }

        function changeYearSumbangan()
        {
          document.getElementById("btnSubmit").name = "submitSumbangan";
          document.getElementById("datepicker").name = "TahunSumbangan";
        }
        function changeYearProyek()
        {
          document.getElementById("btnSubmit").name = "submitProyek";
          document.getElementById("datepicker").name = "TahunProyek";
        }

        $('#batal').hide();
        function btnUbah(nama,alamat,tgl,jk)
        {
          document.getElementById("nama").readOnly = false;
          document.getElementById("ttl").readOnly = false;
          document.getElementById("jk").disabled = false;
          document.getElementById("alamat").readOnly = false;
          document.getElementById("password").readOnly = false;
          document.getElementById("konfirmPassword").readOnly = false;
          document.getElementById("nama").value = nama;
          document.getElementById("ttl").value = tgl;
          document.getElementById("jk").value = jk;
          document.getElementById("alamat").value = alamat;
          document.getElementById("konfirmPassword").value = ""
          $('#ubah').hide();
          $('#batal').show();
          $('#form').show();
        }

        function btnBatal()
        {
          document.getElementById("nama").readOnly = true;
          document.getElementById("ttl").readOnly = true;
          document.getElementById("jk").disabled = true;
          document.getElementById("alamat").readOnly = true;
          document.getElementById("password").readOnly = true;
          document.getElementById("konfirmPassword").readOnly = true;
          document.getElementById("nama").value = "";
          document.getElementById("ttl").value = "";
          document.getElementById("jk").value = "";
          document.getElementById("alamat").value = "";
          document.getElementById("konfirmPassword").value = ""
           
          $('#ubah').show();
          $('#batal').hide();
        }

        function btnSubmit()
        {
          var nama = document.getElementById("nama").readOnly;
          var base = "http://localhost/webzakat/home/cancelUpdate/";
          if(nama == true)
          {
            var asd = document.getElementById("action").action  = base;
            console.log(asd);
          }
        }
    </script>
    <script>
    
    var alert = document.getElementById("alert"); 

      if(alert !=null){
        var status = document.getElementById("status").innerHTML;
        var message = document.getElementById("message").innerHTML;
        var mtitle = document.getElementById("title").innerHTML;
          swal({
            title: mtitle,
            text: message,
            icon: status,
          });
       }
    </script>
    <script>

    function getData(params){
        
    }
  
    var tempArraySumbangan = <?= json_encode($sumbangan); ?>;
    var totalSumbangan = [];
    for(var i = 0; i<12;i++){
      totalSumbangan[i] = { m: '2019-0'+(i+1),a: tempArraySumbangan[i+1][0]['jumlah']} ;
    }
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    var containerChart = document.getElementById("extra-area-chart");
    if(totalSumbangan.length>0){
    if(containerChart !=null){ 
    Morris.Area({
          element: 'extra-area-chart',
          data:totalSumbangan ,
            xkey: 'm',
            ykeys: ['a'],
            labels: ['Sumbangan'],
            lineColors: ['#8af542'],
            xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
              var month = months[x.getMonth()];
              return month;
            },
            dateFormat: function(x) {
              var month = months[new Date(x).getMonth()];
              return month;
            },
          
        });
      }
    }
    </script>
    <script>
      $("#datepicker").datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
    </script>
    <script>
    var tempArrayProyek = <?= json_encode($chartP)?>;
    var proyek = [];
  
    for(var j = 0; j<12;j++){
      proyek[j] = { m: '2019-0'+(j+1),a: tempArrayProyek[j+1][0]['jumlah']} ;
    }
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var containerChart = document.getElementById("extra-area-chart");
    if(containerChart !=null){ 
    Morris.Area({
          element: 'extra-area-chartt',
          data: proyek,
            xkey: 'm',
            ykeys: ['a'],
            labels: ['Proyek'],
            lineColors: ['#42f551'],
            xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
              var month = months[x.getMonth()];
              return month;
            },
            dateFormat: function(x) {
              var month = months[new Date(x).getMonth()];
              return month;
            },
          
        });
      }
      </script>
  </body>

</html>