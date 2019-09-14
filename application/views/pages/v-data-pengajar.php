 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                 <?php if($this->session->userdata('admin')){ ?>
                                <a href="" onClick="insertPengajar()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><i class="fa fa-plus"  aria-hidden="true"></i></span>
                                </a>
                                 <?php }?>
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Table</span> Pengajar</h1>
                                </div>
                                    <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                    <?php } ?>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="name">Nama</th>
                                                <th data-field="email">Alumni</th>
                                                <th data-field="phone">Bidang Studi</th>
                                                <?php if($this->session->userdata('admin')){ ?>
                                                <th data-field="action">Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach($data_pengajar as $row){ $i++;?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['nama_pengajar']; ?></td>
                                                <td><?= $row['alumni']; ?></td>
                                                <td><?= $row['bidang_studi']; ?></td>
                                                <?php if($this->session->userdata('admin')){ ?>
                                                <td class="datatable-ct">
                                                    <button onClick="editPengajar(<?= $row['id_pengajar']; ?>,'<?= $row['nama_pengajar'];?>','<?= $row['alumni'];?>','<?= $row['bidang_studi']; ?>')" data-toggle="modal" data-target="#PrimaryModalhdbgcl" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    <button data-toggle="modal" onClick="deletePengajar(<?= $row['id_pengajar']; ?>)" data-target="#ModalDelete" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->

        <!-- Modal -->
        <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title">Tambah Data Pengajar</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/insertPengajar/" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="nama" type="text" name="nama" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Alumni</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="alumni" name="alumni" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Bidang Studi</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="studi" type="text" name="studi" class="form-control" />
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
                                        <h4 id="header" class="modal-title">Delete Data Pengajar</h4>
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