<div class="courses-area">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($proyek as $row){ ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:10px; margin-bottom:30px;">
                        <div class="courses-inner res-mg-b-30">
                            <div class="courses-title">
                                <a href="#"><img src="<?= base_url(); ?>assets/home/img/proyek/thumbnail/<?= $row['thumbnail']; ?>" style="width:230px;height:180px;"  alt=""></a>
                                <h2><?= $row['nama_proyek']; ?></h2>
                            </div>
                            <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                    <?php } ?>
                            <!-- <div class="courses-alaltic" style="margin-left:-3px;">
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                            </div> -->
                            
                            <div class="course-des" style="margin-left:-3px;">
                                <p><span><i class="fa fa-clock"></i></span> <b>Durasi:</b> <?= $row['durasi']; ?></p>
                                <p><span><i class="fa fa-clock"></i></span> <b>PJ :</b> <?= $row['nama']; ?></p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Kemajuan:</b> <?= $row['kemajuan']; ?>%</p>
                                <div class="progress m-b-0" style="height:6px; margin-left:3px;margin-top:10px;">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?= $row['kemajuan']; ?>%;"> <span class="sr-only"></span> </div>
                                </div>
                            </div>

                           
                            <div class="product-buttons" >
                                <a href="<?= base_url(); ?>home/list_dokumentasi/<?= $row['id_proyek'];?>/"><button type="button" style="background-color:#078171;" class="btn btn-input">Lihat</button></a>
                                <?php if($this->session->userdata('admin') || $this->session->userdata('pj')){ ?>
                                <button type="button" onClick="tambahDokumentasi('<?= $row['id_proyek'];?>','<?= $row['nama_proyek']; ?>')" data-toggle="modal" data-target="#addDokumentasi" style="background-color:#078171;" class="btn btn-input"><i class="fa fa-plus"></i> dokumentasi</button>
                                <button type="button" onClick="editProyek('<?= $row['id_proyek']; ?>','<?= $row['nama_proyek']; ?>','<?= $row['nama']; ?>','<?= $row['kemajuan']; ?>')" data-toggle="modal" data-target="#editProyek" style="background-color:#078171;" class="btn btn-input">Edit</button>
                                <button type="button" onClick="deleteProyek('<?= $row['id_proyek']; ?>')" data-toggle="modal" data-target="#ModalDelete" style="background-color:#078171;margin-top:3px;margin-left:70px;" class="btn btn-input"><i class="fa fa-trash"></i> Hapus</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    
        <!-- Modal Edit-->
        <div id="editProyek" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 id="header" class="modal-title">Edit Kemajuan Proyek</h4>
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form id="form" action="<?= base_url() ?>home/editProgress/" method="post">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">ID Proyek </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input id="id_proyek2" type="text" readonly name="id_proyek2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Nama Proyek </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input id="namaproyek" type="text" readonly name="namaproyek" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Kemajuan</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <div class="input-group date">
                                                        <input id="kemajuan" type="text"  name="kemajuan" class="form-control" />
                                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                    
                                </div>
                                        <div class="modal-footer">
                                            <a data-dismiss="modal" href="#">Batal</a>
                                            <button class="btn btn-input" type="submit" href="#">Proses</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
        <!-- Modal Dokumentasi-->
        <div id="addDokumentasi" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header header-color-modal bg-color-1">
                                    <h4 id="header" class="modal-title">Tambah dokumentasi</h4>
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form id="form" action="<?= base_url() ?>home/insertDokumentasi/" method="post" enctype="multipart/form-data">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">ID Proyek </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input id="" type="hidden" readonly name="id_dokumentasi" value="DOK-<?= time();?>" class="form-control" />
                                                    <input id="id_proyek" type="text" readonly name="id_proyek" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Nama Proyek </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input id="nama" type="text" readonly name="nama" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Gambar</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="file" id="gambar" name="gambar" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Laporan</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="file" id="laporan" name="laporan" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    
                                </div>
                                        <div class="modal-footer">
                                            <a data-dismiss="modal" href="#">Batal</a>
                                            <button class="btn btn-input" type="submit" href="#">Proses</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
        <div id="ModalDelete" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title">Delete Data Proyek</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Information!</h2>
                                        <p>Anda yakin ingin menghapus data tersebut ?</p>
                                    </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">Batal</a>
                                                <a id="delete" href="">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>