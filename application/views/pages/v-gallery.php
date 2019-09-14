<div class="contacts-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                <?php foreach($gallery as $row){ ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                        <div class="student-inner-std res-mg-b-30">
                            <div class="student-img">
                                <img src="<?= base_url(); ?>assets/home/img/galeri/<?= $row['gambar']; ?>" style="width:230px;height:180px;" alt="" />
                            </div>
                            <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                            <?php } ?>
                            <div class="student-dtl">
                                <h2><?= $row['judul_gambar']; ?></h2>
                                <div class="product-buttons" >
                                    <?php if($this->session->userdata('admin')){ ?>
                                    <p class="dp"><a href="<?= base_url(); ?>home/deleteGallery/<?= $row['id_gambar']; ?>"><button class="btn btn-input" style="background-color:#078171;"><i class="fa fa-trash"></i></button></a></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    
                </div>
            </div>
        </div>