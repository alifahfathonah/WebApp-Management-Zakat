<body>
   
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo"style="margin-top:20px;" src="<?= base_url(); ?>assets/home/img/logo/logo_1.jpeg" width="100px;" heigth="100px;" alt="" /></a>
                <strong><a href="index.html"><img src="<?= base_url(); ?>assets/home/img/logo/logo_1.jpeg" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar" style="margin-top:20px;">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="">
                            <a class="<?php if($active == "1"){echo "active";}?>" href="<?= base_url(); ?>home/">
                                <i class="fa big-icon fa-home icon-wrap" aria-hidden="true"></i><span class="mini-click-non"> Dashboard</span>
							</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-money icon-wrap"></span> <span class="mini-click-non"> Sumbangan</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a class="" title="Peity Charts" href="<?= base_url(); ?>home/list_siswa/"><span class="mini-sub-pro">Konfirmasi Sumbangan</span></a>
                                </li>
                                <li>
                                    <a class=">" href="<?= base_url(); ?>home/list_pengajar/"><span class="mini-sub-pro">Data Sumbangan</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow <?php if($active == "4"){echo "active";} ?>" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-database icon-wrap"></span> <span class="mini-click-non">Table Data</span></a>
                            <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                                <li><a class="<?php if($active == "4"){echo "active";} ?>" href="<?= base_url() ?>home/list_donatur/"><span class="mini-sub-pro">Data donatur</span></a></li>
                                <li><a title="Basic Form Elements" href="basic-form-element.html"><span class="mini-sub-pro">Data Pengguna</span></a></li>
                                <li><a title="Basic Form Elements" href="basic-form-element.html"><span class="mini-sub-pro">Data Anggaran</span></a></li>
                                <li><a title="Basic Form Elements" href="basic-form-element.html"><span class="mini-sub-pro">Data Proyek</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="mailbox.html" aria-expanded="false"><span class="fa big-icon fa-camera icon-wrap"></span> <span class="mini-click-non">Dokumentasi</span></a>
                            
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->