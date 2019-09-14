<div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Cek Sumbangan</h4>
                            <!-- <div class="add-product">
                                <a href="#"></a>
                            </div> -->
                            <div class="asset-inner">
                                 <?php if($this->session->flashdata('message')){ ?>
                                    <p id="alert"></p>
                                    <p style="display:none;" id="status"><?= $this->session->flashdata('status');  ?></p>
                                    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
                                    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
                                 <?php } ?>
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Sumbangan</th>
                                        <th>Nama</th>
                                        <th>Jenis Sumbangan</th>
                                        <th>Tanggal</th>
                                        <th>Nominal</th>
                                        <th>Bukti Transfer</th>
                                        <th>Konfirmasi</th>
                                    </tr>
                                    <?php $i = 0; foreach($sumbangan as $row){$i++; ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['id_sumbangan']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nama_sumbangan']; ?></td>
                                        <td><?= $row['tgl_terima']; ?></td>
                                        <td>Rp. <?= number_format($row['nominal_sumbangan'],2,",","."); ?></td>
                                        <td>
                                             <a href="<?= base_url() ?>assets/home/img/bukti/<?= $row['bukti_transfer']; ?>">Foto Bukti TF</a>
                                        </td>
                                        <td>
                                            <?php if($row['status'] == "belum konfirmasi"){ ?>
                                            <a href="<?= base_url(); ?>home/updateSumbanganDonatur/<?= $row['id_sumbangan']; ?>/" class="pd-setting">Konfirmasi</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>