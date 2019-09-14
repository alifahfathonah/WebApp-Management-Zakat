<?php if($this->session->userdata('donatur')){ ?>
<body class="mini-navbar">
<?php }else{ ?>
<body>
<?php }?> 
    <div class="left-sidebar-pro">
        <?php if($this->session->userdata('donatur')){ ?>
        <nav id="sidebar" class="active">
        <?php }else{ ?>
            <nav id="sidebar" class="">
        <?php }?>
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo"style="margin-top:20px;" src="<?= base_url(); ?>assets/home/img/logo/logo_1.jpeg" width="100px;" heigth="100px;" alt="" /></a>
                <strong><a href="index.html"><img src="<?= base_url(); ?>assets/home/img/logo/logo_1.jpeg" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar" style="margin-top:20px;">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    <?php if($this->session->userdata('admin') || $this->session->userdata('pj') || $this->session->userdata('ketua')){ ?>
                        <li class="">
                            <a class="<?php if($active == "1"){echo "active";}?>" href="<?= base_url(); ?>home/">
                                <i class="fa big-icon fa-home icon-wrap" aria-hidden="true"></i><span class="mini-click-non"> Dashboard</span>
							</a>
                        </li>
                    <?php } ?>
                        <?php if($this->session->userdata('admin') || $this->session->userdata('ketua')){ ?>
                        <li>
                            <a class="has-arrow <?php if($active == "2" || $active == "3" || $active=="5"){echo "active";} ?>" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-table icon-wrap"></span> <span class="mini-click-non">Data Master</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a class="<?php if($active == "2"){echo "active";} ?>" title="Peity Charts" href="<?= base_url(); ?>home/list_siswa/"><span class="mini-sub-pro">Data Siswa</span></a>
                                </li>
                                <li>
                                    <a class="<?php if($active == "3"){echo "active";} ?>" href="<?= base_url(); ?>home/list_pengajar/"><span class="mini-sub-pro">Data Pengajar</span></a>
                                </li>
                                <li><a class="<?php if($active == "5"){echo "active";} ?>" href="<?= base_url() ?>home/listjenis_sumbangan/"><span class="mini-sub-pro">Jenis Sumbangan</span></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('admin') || $this->session->userdata('ketua')){ ?>
                        <li>
                            <a class="has-arrow <?php if($active == "9" || $active == "7"){echo "active";} ?>" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-money icon-wrap"></span> <span class="mini-click-non"> Sumbangan</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <?php if($this->session->userdata('admin') || $this->session->userdata('ketua')){ ?>
                                    <li>
                                        <a class="<?php if($active == "9"){echo "active";} ?>" title="Peity Charts" href="<?= base_url(); ?>home/konfirmasi_sumbangan/"><span class="mini-sub-pro">Konfirmasi Sumbangan</span></a>
                                    </li>
                                    <li>
                                        <a class="<?php if($active == "7"){echo "active";} ?>" href="<?= base_url(); ?>home/list_sumbangan/"><span class="mini-sub-pro">Data Sumbangan</span></a>
                                    </li>
                                <?php } ?>
                                <?php if($this->session->userdata('donatur')){ ?>
                                    <li>
                                        <a class="" title="Peity Charts" href="<?= base_url(); ?>home/cek_sumbangan/<?= $this->session->userdata('id'); ?>/"><span class="mini-sub-pro">Cek Sumbangan</span></a>
                                    </li>
                                    <li>
                                        <a class="<?php if($active == "8"){echo "active";} ?>" href="<?= base_url(); ?>home/data_sumbangan/<?= $this->session->userdata('id'); ?>/"><span class="mini-sub-pro">Data Sumbangan</span></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('admin') || $this->session->userdata('pj') || $this->session->userdata('ketua')){ ?>
                        <li>
                            <a class="has-arrow <?php if($active == "4" || $active == "10" || $active == "11" || $active == "12" || $active=="14"){echo "active";} ?>" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-table icon-wrap"></span> <span class="mini-click-non">Table Data</span></a>
                            <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                                <?php if($this->session->userdata('admin') || $this->session->userdata('ketua')){ ?>
                                    <li><a class="<?php if($active == "4"){echo "active";} ?>" href="<?= base_url() ?>home/list_donatur/"><span class="mini-sub-pro">Data donatur</span></a></li>
                                    <li><a class="<?php if($active == "10"){echo "active";} ?>" href="<?= base_url() ?>home/list_pengguna/"><span class="mini-sub-pro">Data Pengguna</span></a></li>
                                    <li><a class="<?php if($active == "14"){echo "active";} ?>" href="<?= base_url() ?>home/list_pengeluaran/"><span class="mini-sub-pro">Data Pengeluaran</span></a></li>
                                    <li><a class="<?php if($active == "11"){echo "active";} ?>" href="<?= base_url() ?>home/laporan_keuangan/"><span class="mini-sub-pro">Laporan Keuangan</span></a></li>
                                <?php } ?>
                                <li><a class="<?php if($active == "12"){echo "active";} ?>"href="<?= base_url() ?>home/list_proyek/"><span class="mini-sub-pro">Data Proyek</span></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if($this->session->userdata('admin') || $this->session->userdata('pj')){ ?>
                            <li>
                            <a class="has-arrow <?php if($active == "13" || $active == "22" ){echo "active";} ?>" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-database icon-wrap"></span> <span class="mini-click-non">Tambah Data</span></a>
                            <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                                <li><a class="<?php if($active == "13"){echo "active";} ?>" href="<?= base_url() ?>home/form_proyek/"><span class="mini-sub-pro">Proyek</span></a></li>
                                <!-- <li><a class="" href="<?= base_url() ?>home/form_proyek/"><span class="mini-sub-pro">Pengeluaran</span></a></li> -->
                                <?php if($this->session->userdata('admin')){ ?>
                                     <li><a class="<?php if($active == "22"){echo "active";} ?>" href="<?= base_url() ?>home/form_gallery/"><span class="mini-sub-pro">Gallery</span></a></li>
                                <?php } ?>
                              
                            </ul>
                        </li>
                        <?php } ?>
                       <?php if($this->session->userdata('admin') || $this->session->userdata('pj') || $this->session->userdata('ketua')){ ?>
                        <li>
                            <a class="<?php if($active == "20"){echo "active";} ?>" href="<?= base_url() ?>home/data_dokumentasi/" aria-expanded="false"><span class="fa big-icon fa-camera icon-wrap"></span> <span class="mini-click-non">Dokumentasi</span></a>
                            
                        </li>
                       <?php } ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->