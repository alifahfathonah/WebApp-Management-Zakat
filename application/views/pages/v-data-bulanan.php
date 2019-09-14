 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                            <div class="product-buttons">
                                    <a href="<?= base_url() ?>home/laporan_keuangan/" ><span style="float:right;font-size:20px;margin-left:5px; color:#078171;"><button type="button" style="background-color:#078171;" class="btn btn-input">Kembali</button></a>
                                   
                                </div>
                            <?php
                            $namaBulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                            ?>
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Pemasukan Bulan <?= $namaBulan[$bulan]; ?></span> Tahun <?= $tahun; ?></h1>
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
                                                <th data-field="name">Kode Sumbangan</th>
                                                <th data-field="email">Nama Donatur</th>
                                                <th data-field="phone">Nama Sumbangan</th>
                                                <th data-field="jk">Tanggal Terima</th>
                                                <th data-field="tgl">Nominal Sumbangan</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=0; foreach($sumbangan as $row){ $i++; ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row['id_sumbangan']; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['nama_sumbangan']; ?></td>
                                                <td><?= $row['tgl_terima']; ?></td>
                                                <td>Rp. <?= number_format($row['nominal_sumbangan'],2,",","."); ?></td>
                                            </tr>
                                           <?php } ?>
                                           <tr>
                                                <td colspan="5"><b>Total</b></td>
                                                <?php foreach($sumPemasukan as $row){ ?>
                                                <td>Rp. <?= number_format($row['jumlah'],2,",","."); ?></td>
                                                <?php } ?>
                                           </tr>
                                        </tbody>
                                                
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Pengeluaran Bulan <?= $namaBulan[$bulan]; ?></span> Tahun <?= $tahun; ?></h1>
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
                                    
                                    <table id="table" data-toggle="table" >
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="name">Kode Pengeluaran</th>
                                                <th data-field="email">Tujuan</th>
                                                <th data-field="tgl">Keterangan</th>
                                                <th data-field="jk">Tanggal Keluar</th>
                                                <th data-field="phone">Nominal Pengeluaran</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php  $i = 0;foreach($pengeluaran as $row){ $i++;?>
                                            <tr>
                                                <td><?= $i;?></td>
                                                <td><?= $row['id_pengeluaran']; ?></td>
                                                <td><?= $row['tujuan']; ?></td>
                                                <td><?= $row['keterangan']; ?></td>
                                                <td><?= $row['tanggal_keluar']; ?></td>
                                                <td>Rp. <?= number_format($row['nominal'],2,",","."); ?></td>
                                            </tr>
                                          <?php } ?>
                                           <tr>
                                                <td colspan="5"><b>Total</b></td>
                                                <?php foreach($sumPengeluaran as $row){ ?>
                                                <td>Rp. <?= number_format($row['jumlah'],2,",","."); ?></td>
                                                <?php } ?>
                                           </tr>
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
                                        <h4 id="header" class="modal-title">Form Tambah Data Sumbangan</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/insertsumbangan/" method="post">
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
                                                        <select type="text" id="nama" name="nama" class="form-control" >
                                                            <option value="">-- Silahkan Pilih Donatur</option>
                                                            <?php foreach($donatur as $row){ ?>
                                                                <option value="<?= $row['id_pengguna']; ?>">Nama : <?= $row['nama']; ?> -- Id :<?= $row['id_pengguna']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Nama Sumbangan</label>
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
                                                        <label class="login2 pull-right pull-right-pro">Nominal Sumbangan</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input id="nominal" type="text" name="nominal" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                          
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Tanggal Terima </label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="date" id="tgl" name="tgl" class="form-control" >
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
                                        <h4 id="header" class="modal-title">Tambah Data Siswa</h4>
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