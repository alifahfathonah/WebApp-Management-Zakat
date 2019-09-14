<div class="contacts-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($dokumentasi as $row){ ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="student-inner-std res-mg-b-30" style="margin-bottom:40px;">
                            <div class="student-img">
                                <img src="<?= base_url(); ?>assets/home/img/proyek/dokumentasi/<?= $row['gambar']; ?>" style="width:257px;height:257px;" alt="" />
                            </div>
                            <div class="student-dtl">
                                <h2><?= $row['nama_proyek']; ?></h2>
                                <p class="dp-ag"><b>Penanggung Jawab :</b> </p>
                                <p class="dp">-<?= $row['nama']; ?>-</p>
                                <div class="product-buttons" >
                                    <p class="dp"><a href="<?= base_url(); ?>home/detail_laporan/<?= $row['id_dokumentasi']; ?>/"><button class="btn btn-input" style="background-color:#078171;">Lihat Laporan</button></a></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>