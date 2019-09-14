<!--================ Start Recent Event Area =================-->
<section class="event_details section-gap-top mb-70">
		<div class="container">
            <?php foreach($dokumentasi as $row){ ?>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<img src="<?= base_url(); ?>assets/home/img/proyek/dokumentasi/<?= $row['gambar']; ?>" alt="" class="img-fluid">
				</div>
			</div>


			<div class="event_content">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="right_content">
							<h2>Dokumentasi pada Proyek <?= $row['nama_proyek']; ?>. </h2>
                            <embed style="margin-top:20px; border-radius:10px;" src= "<?= base_url() ?>assets/home/img/proyek/laporan/<?= $row['detail'];?>" width= "100%" height= "600">
						</div>
					</div>
					
				</div>
            </div>
            <?php } ?>
		</div>
	</section>
	<!--================ End Recent Event Area =================-->