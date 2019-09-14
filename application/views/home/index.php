        <?php 
            $counts = count($sumbangan);
            $countnot = count($sumbangan_not);
            $countdon = count($donatur);
            $countpro = count($proyek);
        ?>
   
        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Jumlah Sumbangan</h5>
                                <h2><span class="counter"><?= $counts ?></span> <span class="tuition-fees">Konfirmasi</span></h2>
                                <span class="text-success"></span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only"></span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Jumlah Sumbangan</h5>
                                <h2><span class="counter"><?= $countnot ?></span> <span class="tuition-fees">Belum Konfirmasi</span></h2>
                                <span class="text-success"></span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only"></span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Jumlah Proyek</h5>
                                <h2><span class="counter"><?= $countpro ?></span> <span class="tuition-fees"></span></h2>
                                <span class="text-success"></span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only"></span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Jumlah Donatur</h5>
                                <h2><span class="counter"><?= $countdon; ?></span> <span class="tuition-fees"></span></h2>
                                <span class="text-success"></span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only"></span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Chart Sumbangan <?= $tahun; ?> </b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                         <div class="product-buttons">
                                            <a href="" onClick="changeYearSumbangan()"  data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><button type="button" style="background-color:#078171;" class="btn btn-input">pilih tahun</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <!-- <li>
                                    <h5><i class="fa fa-circle" style="color: #99f542;"></i>Proyek</h5>
                                    <h5><i class="fa fa-circle" style="color: #42f58d;"></i>Sumbangan</h5>
                                </li> -->
                                
                            </ul>
                            <div id="extra-area-chart" style="height: 356px;">
                            
                            </div>
                        </div>
                    </div>
	
                </div>
            </div>
        </div>
       
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Chart Proyek <?= $thn; ?></b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="product-buttons">
                                            <a href="" onClick="changeYearProyek()" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><span style="float:right;font-size:20px; color:#078171;"><button type="button" style="background-color:#078171;" class="btn btn-input">pilih tahun</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <!-- <li>
                                    <h5><i class="fa fa-circle" style="color: #99f542;"></i>Proyek</h5>
                                    <h5><i class="fa fa-circle" style="color: #42f58d;"></i>Sumbangan</h5>
                                </li> -->
                                
                            </ul>
                            <div id="extra-area-chartt" style="height: 356px;"></div>
                        </div>
                    </div>
	
                </div>
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
                                        <form id="form" action="<?= base_url(); ?>home/dashboard/" method="post">
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
                                                <button class="btn btn-input" id="btnSubmit" name="submit" type="submit" href="#">Proses</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>