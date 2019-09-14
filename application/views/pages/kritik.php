<!--================ Start CTA Area =================-->
<div class="cta-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<p class="top_text" style="color:#017181;">Kritik Dan Saran</p>
					<h1>Silahkan Ketik Pesan dan 
                        Saran Anda Disini
                     </h1> 
                        <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                    <?php } ?>
						<form  action="<?= base_url() ?>home/insertPesan/" method="post">
							<div class="row align-items-center">
								<div class="col-lg-5 mb-lg-0 mb-3">
									<input class="form-control" value="<?= $this->session->userdata('users'); ?>" placeholder="Nama Anda" required="" readonly type="text" />
                                    <input type="hidden" name="nama" value="<?= $this->session->userdata('id'); ?>">
								</div>
								<div class="col-lg-5 mb-lg-0 mb-3">
									<input class="form-control" name="pesan" placeholder="Pesan Anda" 
                                     required="" type="text" />
                                     <input type="hidden" name="tgl" value="<?= date('d M Y'); ?>">
								</div>
								
								<div class="col-lg-2">
                                    <?php if($this->session->userdata('login')){ ?>
									<button class="primary-btn" type="submit">Kirim</button>
                                    <?php }else{ ?>
                                    <a class="primary-btn" href="<?= base_url(); ?>login/">Kirim</a> 
                                    <?php } ?>

									<div class="info"></div>
                                </div>
                               
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
	<!--================ End CTA Area =================-->