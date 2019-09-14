<!-- Basic Form Start -->
<div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Form Kritik dan Saran   </h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                            <?php if($this->session->flashdata('message')){ ?>
                                            <p id="alert"></p>
                                            <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                            <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                            <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                            <?php } ?>
                                                <form action="<?= base_url() ?>home/insertPesan/" method="post">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Nama </label>
                                                            </div>
                                                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" value="<?= $this->session->userdata('users'); ?>"readonly class="form-control" />
                                                                <input type="hidden" name="nama" value="<?= $this->session->userdata('id'); ?>">
                                                                <input type="hidden" name="tgl" value="<?= date('d M Y'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Kritik atau Saran </label>
                                                            </div>
                                                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                                                <textarea type="text" name="pesan" class="form-control" >
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                                        <button style="background-color:#078171; border-color:#078171;" class="btn btn-sm btn-input login-submit-cs" type="submit">Save Change</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Form End-->