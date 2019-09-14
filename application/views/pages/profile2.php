<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="<?= base_url(); ?>assets/home/img/profile/user.png" style="margin-left:65px;width:200px;height:200px;text-align:center;" alt="" />
                            </div>
                            <?php foreach($profile as $row){ ?>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>ID Pengguna</b><br /> <?= $row['id_pengguna']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Nama Lengkap</b><br /> <?= $row['nama']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Tanggal Lahir</b><br /> <?= $row['tgl_lahir']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Jenis Kelamin</b><br /> <?= $row['jenis_kelamin']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Alamat</b><br /> <?= $row['alamat']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <h3>500</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <h3>900</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <h3>600</h3>
                                        </div>
                                    </div>
                                </div> -->
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#INFORMATION">Update Details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="INFORMATION">
                                    <div class="row">
                                    <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                    <?php } ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form action="<?= base_url(); ?>home/updateDetails/" id="action" method="post" >
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <?php foreach($profile as $row){ ?>
                                                        <div class="form-group">
                                                            <input  type="text" value="<?= $row['id_pengguna']; ?>" class="form-control" id="idUser" name="id" readonly placeholder="Username">
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" readonly name="nama" id="nama" placeholder="Nama Lengkap">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" readonly id="ttl" name="ttl" placeholder="Tanggal Lahir">
                                                        </div>
                                                        <div class="form-group">
                                                            <select type="text" id="jk" disabled="true" name="jk" class="form-control" >
                                                                <option  value="">-- Pilih Jenis Kelamin --</option>
                                                                <option value="Pria">Pria</option>
                                                                <option value="Wanita">Wanita</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" name="alamat" readonly id="alamat" placeholder="Alamat">
                                                        </div>
                                                         <div class="form-group">
                                                            <input type="password" class="form-control" name="password" readonly id="password" placeholder="Password">
                                                        </div>
                                                         <div class="form-group">
                                                            <input type="password" class="form-control"readonly name="konfirmPassword" id="konfirmPassword" placeholder="Konfirmasi Password">
                                                        </div>
                                                    </div>
                                                   
                                                    <?php } ?>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <a id="ubah" onClick="btnUbah('<?= $row['nama'];?>','<?= $row['alamat']; ?>','<?= $row['tgl_lahir']; ?>','<?= $row['jenis_kelamin']; ?>','<?= $row['password']; ?>')"  style="background-color:#f8f9fa; border-color:#f8f9fa;color:#212529;" class="btn btn-primary waves-effect waves-light mg-b-15">Ubah Data</a>
                                                            <a id="batal" onClick="btnBatal()" style="background-color:#f8f9fa; border-color:#f8f9fa;color:#212529;" class="btn btn-primary waves-effect waves-light mg-b-15">Batal</a>
                                                            <button type="submit" onClick="btnSubmit()" id="submit" style="background-color:#078171; border-color:#078171;" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
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
        </div>  