	<!--================ Start About Area =================-->
	<section class="about_area lite_bg">
		<div class="container">
			<div class="row align-items-end">
				<div class="col-lg-5">
					<div class="about_details lite_bg">
						<h2>Pesantren Tahfidz Yatim Dhuafa Ashabul Kahfi </h2>
						<p class="top_text" style="color:#017181;">
							Visi
						</p>
						<p class="mb-0">
							Mencetak Generasi ber-Karakter Qur'ani, Mandiri, Cerdas, dan ber-Akhlakul Karimah
						</p>
						
						<p class="top_text mt-15" style="color:#017181;">
							Misi
						</p>
						<p class="mb-0">
							- Memperagakan Al-Quran dan As-Sunnah secara kolektif dan sistematis <span class="pl-2"> dalam kehidupan sehari-hari </span><br>
							- Menjadi pusat belajar Al-Quran bagi masyarakat Bekasi dan sekitarnya. <br>
							- Mengembangkan Wirausaha sebagai pilar ekonomi demi kemajuan dan <span class="pl-2"> kesejahteraan bersama.</span>
						</p>
						

						<!-- <div class="active-brand-carusel">
							<div class="single-brand">
								<img class="mx-auto w-auto" src="<?= base_url() ?>assets/donatur/img/brands/b1.png" alt="">
							</div>
							<div class="single-brand">
								<img class="mx-auto w-auto" src="<?= base_url() ?>assets/donatur/img/brands/b2.png" alt="">
							</div>
							<div class=" single-brand">
								<img class="mx-auto w-auto" src="<?= base_url() ?>assets/donatur/img/brands/b3.png" alt="">
							</div>
							<div class=" single-brand">
								<img class="mx-auto w-auto" src="<?= base_url() ?>assets/donatur/img/brands/b2.png" alt="">
							</div>
						</div> -->
					</div>
				</div>
				<div class="col-lg-4 offset-lg-3 col-md-6 offset-md-1 d-lg-block d-none">
					<div class="about_right">
						<div class="video-inner justify-content-center align-items-center d-flex">
							<a id="play-home-video" class="video-play-button" 
							href="https://www.youtube.com/watch?v=ooyhN7Kn3DU">
								<span></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="about_bg d-lg-block d-none"></div>
		</div>
	</section>
	<!--================ End About Area =================-->

	

	<!--================ Start Upcoming Event Area =================-->
	<section class="upcoming_event_area section-gap-top mt-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span style="color:#078171;">Proyek</span> Berjalan</h2>
					</div>
				</div>
			</div>

			<div class="row">
                <?php foreach($proyek as $row) {?>
				<div class="col-lg-6">
					<div class="single_upcoming_event">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<figure>
									<img class="img-fluid w-100" src="<?= base_url() ?>assets/home/img/proyek/thumbnail/<?= $row['thumbnail']; ?>" style="width:252px;height:272px;" alt="">
									<div class="date">
										<?= $row['tanggal_proyek']; ?>
									</div>
								</figure>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="content_wrapper">
									<h3 class="title">
										<a href="event-details.html"><?= $row['nama_proyek']; ?></a>
									</h3>
									<p>
										Penanggung Jawab : <?= $row['nama']; ?>
									</p>
									<div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv1">
										<div class="single_time">
                                            <h2 style="font-size:16px;">Durasi</h2>
											<p><?= $row['durasi']; ?></p>
										</div>
										
									</div>
									<a href="<?= base_url(); ?>home/detail_proyek/<?= $row['id_proyek']; ?>" class="primary-btn2">Detail Proyek</a>
								</div>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
				
			</div>
		</div>
	</section>
	<!--================ End Upcoming Event Area =================-->

	

	<!--================ Start Instagram Area =================-->
	<section class="instagram-area section-gap-top mb-100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span style="color:#078171;">Galeri</span> </h2>
					</div>
				</div>
			</div>  
		</div>
		<div class="instagram-slider owl-carousel">
            <?php foreach($gallery as $row){ ?> 
			<a href="<?= base_url() ?>assets/home/img/galeri/<?= $row['gambar']; ?>"  class="single-instagram d-block img-pop-up">
				<div class="instagram-img">
					<img src="<?= base_url() ?>assets/home/img/galeri/<?= $row['gambar']; ?>" style="width:500px;height:276px;" alt="">
					<div class="instagram-text">
						<i class="ti-instagram"></i>
					</div>
				</div>
            </a>
            <?php } ?>
		</div>
	</section>
	<!--================ End Instagram Area =================-->
