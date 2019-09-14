<!--================ Start Popular Causes Area =================-->
<section class="popular-cause-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span>Data</span> Sumbangan</h2>
					</div>
				</div>
            </div>
            <?php if($this->session->flashdata('message')){ ?>
                <p id="alert"></p>
            <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
            <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
            <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
            <?php } ?>
            <?php foreach($jumlah as $row){ ?>
            <div class="alert alert-success" role="alert">
                <span style="padding-right:685px;"> 
                    Total Sumbangan anda Sebesar Rp. <?= number_format($row['jumlah'],2,",","."); ?>
                </span> 
                <span>
                    <?php if($this->session->userdata('login')){ ?>
                    <button data-toggle="modal" style="background:#078171; border:#078171;" data-target="#PrimaryModalhdbgcl" class="btn btn-success">Donasi</button>
                    <?php }else{ ?>
                    <a href="<?= base_url(); ?>login/"><button style="background:#078171; border:#078171;" class="btn btn-success">Donasi</button></a>
                    <?php } ?>
                </span>
            </div>
            <?php } ?>
			<div class="row">
                <?php foreach($sumbangan as $row){ ?>
				<div class="col-lg-4 col-md-6">
					<div class="card single-popular-cause">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="<?= base_url(); ?>assets/home/img/bukti/<?= $row['bukti_transfer']; ?>" alt="Card image cap">
							</figure>
							<div class="card_inner_body">
								<div class="tag"><?= $row['tgl_terima'] ?></div>
								<h4 class="card-title"><?= $row['nama_sumbangan']; ?></h4>
								<div class="d-flex justify-content-between raised_goal">
									<p>Nominal: Rp. <?= number_format($row['nominal_sumbangan'],2,",","."); ?></p>
								</div>
								<div class="d-flex justify-content-between donation align-items-center">
                                    <?php if($row['status'] == "konfirmasi" ) {  ?>
                                    <a href="#" style="background:#078171; border:#078171;" class="primary-btn">Konfirmasi</a>
                                    <?php }else{ ?>
                                    <a href="#" style="background:#078171; border:#078171;" class="primary-btn">Belum Konfirmasi</a>
                                    <?php } ?>
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
<!-- Modal -->
<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width:600px;">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title" style="color:#fff;">Form Tambah Data Sumbangan</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i style="position:relative;bottom:13px;right:6px;"class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body" >
                                        <form id="form" action="<?= base_url() ?>home/insertsumbangandonatur/" enctype="multipart/form-data" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Id Sumbangan </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="id" type="text" readonly name="id" value="SM-<?= time(); ?>" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama Donatur</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input value="<?= $this->session->userdata('users'); ?>" type="text" id="nama" name="" readonly class="form-control" >
                                                        <input type="hidden" name="nama" value="<?= $this->session->userdata('id'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro"> Sumbangan</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <select id="jenis" name="jenis" class="form-control" >
                                                            <option value="">-- Silahkan Pilih Jenis Sumbangan --</option>
                                                            <?php foreach($jenis as $row){ ?>
                                                            <option value="<?= $row['kode_sumbangan'] ?>"><?= $row['nama_sumbangan']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nominal</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="nominal" type="text" name="nominal" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Bukti</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="nominal" type="file" name="file" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tanggal </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <div class="input-group date">
                                                            
                                                            <input type="date" id="tgl" name="tgl" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer"style=" position: relative;top: 40px;left: 60px;">
                                                <a data-dismiss="modal" style="background:#ddd;color:#000;" href="#">Batal</a>
                                                <button class="btn btn-input" type="submit" href="#">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
</div>
        <!-- Modal -->