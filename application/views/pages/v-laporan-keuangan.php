
 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="product-buttons">
                                    <a href="" onClick="pilihBulan()" data-toggle="modal" data-target="#ModalBulan"><span style="float:right;font-size:20px;margin-left:5px; color:#078171;"><button type="button" style="background-color:#078171;" class="btn btn-input">pilih bulan</button></a>
                                    <a href="" onClick="pilihTahun()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px;margin-left:5px; color:#078171;"><button type="button" style="background-color:#078171;" class="btn btn-input">pilih tahun</button></a>
                                    <a href="" onClick="cetakLaporan()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><button type="button" style="background-color:#078171;" class="btn btn-input">Cetak</button></a>
                                </div>
                                <div class="main-sparkline13-hd">
                                    <h1>Data  <span class="table-project-n">Laporan</span> Keuangan Tahun <?= $tahun; ?></h1>
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
                                    <table id="table" data-toggle="table" data-pagination="" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="name">Bulan</th>
                                                <th data-field="email">Pemasukan</th>
                                                <th data-field="phone">Pengeluaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                       $blnString = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                        $dataKeluar = array();
                                     
                                        $i = 0; 
                                        $nomor = 1;
                                        $j =0;
                                        foreach($pengeluaran as $pBln){
                                            foreach($pBln as $p){   
                                               $dataKeluar[$j] =  $p['jumlah'];
                                                $j++;
                                            }
                                           }

                                          

                                        foreach($sumbangan as $bln){
                                                foreach($bln as $namabln){
                                                    foreach($namabln as $jml){
                                                       
                                            ?>
                                            
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $blnString[$i] ?></td>
                                                <td>Rp. <?= number_format($jml,2,",","."); ?></td>
                                                <td>Rp. <?= number_format($dataKeluar[$i],2,",",".");?></td>
                                            </tr>
                                                <?php  $i++; $nomor++; }}}?>
                                            <tr>
                                                <td colspan="2"><b>Total</b></td>
                                                <?php foreach($sumPemasukan as $row){ ?>
                                                <td>Rp. <?= number_format($row['jumlah'],2,",","."); ?></td>
                                                <?php } ?>
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
                                        <h4 id="header" class="modal-title">Pilih Tahun</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/laporan_keuangan/" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tahun</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" autocomplete="off" name="tahun" id="datepicker" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">Batal</a>
                                                <button class="btn btn-input" name="submit" type="submit" href="#">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
         <!-- Modal -->
         <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title">Pilih Tahun</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/laporan_keuangan/" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tahun</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" autocomplete="off" name="tahun" id="datepicker" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">Batal</a>
                                                <button class="btn btn-input" name="submit" type="submit" href="#">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
         <!-- Modal -->
         <div id="ModalBulan" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 id="header" class="modal-title">Pilih Bulan</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form" action="<?= base_url() ?>home/laporan_bulanan/" method="post">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="login2 pull-right pull-right-pro">Tahun</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                        <select type="text" autocomplete="off" name="bulan" id="datepicker" class="form-control">
                                                            <option value="">-- Pilih Bulan --</option>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April</option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni</option>
                                                            <option value="7">Juli</option>
                                                            <option value="8">Agustus</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                        <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        
                                    </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" href="#">Batal</a>
                                                <button class="btn btn-input" name="submit" type="submit" href="#">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>