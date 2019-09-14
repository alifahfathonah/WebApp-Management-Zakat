<!--================ Start Recent Event Area =================-->

<section class="event_details section-gap-top mb-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
                <?php foreach($dokumentasi as $row){ ?>
					<img src="<?= base_url(); ?>/assets/home/img/proyek/thumbnail/<?= $row['thumbnail']; ?>" alt="" class="img-fluid">
				</div>
			</div>


			<div class="event_content">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="right_content">
                            
                            <h2>Proyek <?= $row['nama_proyek'] ?>. </h2>
                            <?php } ?>
                            <?php foreach($detail as $row){ ?>
                            <embed style="margin-top:20px; border-radius:10px;" src= "<?= base_url() ?>assets/home/img/proyek/laporan/<?= $row['detail'];?>" width= "100%" height= "600">
                            <?php } ?>
						</div>
                    </div>
                    <?php foreach($dokumentasi as $row){ ?>
					<div class="col-lg-2 mt-lg-0 mt-5">
						<div class="left_content">
							<div class="mb-40">
								<h5>
									<i class="ti-time"></i>
									Start Time
								</h5>
								<div class="ml-30"><?= $row['tanggal_proyek']; ?></div>
							</div>

							<div class="mb-40">
								<h5>
									<i class="ti-check-box"></i>
									Finish Time
								</h5>
								<div class="ml-30">Selesai dalam waktu <?= $row['durasi'] ;?></div>
							</div>

							<div class="">
								<h5>
									<i class="ti-location-pin"></i>
									Address
								</h5>
								<div class="ml-30">Jalan Tugu Bojong. Kampung Gebang RT.02/003 Desa Satria Jaya Kecamatan. Tambun Utara. Kabupaten Bekasi</div>
							</div>
                        </div>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================ End Recent Event Area =================-->
