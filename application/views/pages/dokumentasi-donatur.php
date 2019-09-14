<!--================ Start Popular Causes Area =================-->
<section class="popular-cause-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span>Data</span> dokumentasi</h2>
					</div>
				</div>
            </div>
            <?php if($this->session->flashdata('message')){ ?>
                <p id="alert"></p>
            <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
            <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
            <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
            <?php } ?>
            
			<div class="row">
                <?php foreach($dokumentasi as $row){ ?>
				<div class="col-lg-4 col-md-6">
					<div class="card single-popular-cause">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="<?= base_url(); ?>assets/home/img/proyek/dokumentasi/<?= $row['gambar']; ?>" alt="Card image cap">
							</figure>
							<div class="card_inner_body">
								<div class="tag" style="color:#017181;"><?= $row['tanggal_proyek'] ?></div>
								<h4 class="card-title"><?= $row['nama_proyek']; ?></h4>
								<div class="d-flex justify-content-between raised_goal">
									<p style="font-size:13px;">Penanggung Jawab: <?= $row['nama']; ?> </p>
								</div>
								<div class="d-flex justify-content-between donation align-items-center">
                                  
                                    <a href="<?= base_url(); ?>home/detail_dokumentasi/<?= $row['id_dokumentasi']; ?>" class="primary-btn">Detail Laporan</a>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>
	</section>
	<!--================ End Popular Causes Area =================-->
