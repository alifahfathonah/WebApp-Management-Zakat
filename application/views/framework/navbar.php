<!-- Start Welcome area -->
<div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="<?= base_url(); ?>"><img class="main-logo" src="" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                            <?php if($this->session->userdata('admin') || $this->session->userdata('pj') || $this->session->userdata('ketua')){ ?>
                                                <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link">Home</a>
                                                </li>
                                                <!-- <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li> -->
                                                <li class="nav-item"><a href="<?= base_url() ?>home/gallery/" class="nav-link">Gallery</a>
                                                </li>
                                            <?php } ?>
                                            <?php if($this->session->userdata('donatur')){ ?>
                                                <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link">Home</a>
                                                </li>
                                                <!-- <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li> -->
                                                <li class="nav-item"><a href="<?= base_url() ?>home/data_dokumentasi/" class="nav-link">Dokumentasi</a>
                                                </li>
                                                <li class="nav-item"><a href="<?= base_url() ?>home/data_sumbangan/<?= $this->session->userdata('id'); ?>" class="nav-link">Sumbangan</a>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <?php if($this->session->userdata('admin')){ ?>
                                                <?php  if($pesan == null){?>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="" style="font-size:20px;"></span></a>
                                                <?php }else{ ?>
                                                    <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt" style="font-size:20px;"></span></a>
                                                <?php } ?>
                                                    <div style="margin-left:-100px;" role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul   class="notification-menu">
                                                        <?php foreach($pesan as $row){ ?>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-message edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date"><?= $row['tgl']; ?></span>
                                                                        <h2><?= $row['nama']; ?></h2>
                                                                        <a href="<?= base_url() ?>home/list_pesan/"><p>Silahkan klik disini untuk lihat kritik & saran! </p></a>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="<?= base_url() ?>home/list_pesan/">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php }?>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="<?= base_url() ?>assets/home/img/profile/user.png" alt="" />
                                                            <span class="admin-name"><?= $this->session->userdata('users'); ?></span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul style="margin-left:-100px;" role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        </li>
                                                        <li><a href="<?= base_url(); ?>home/profile/"><span class="edu-icon edu-locked author-log-ic"></span>Profile</a>
                                                        </li>
                                                        <li><a href="<?= base_url(); ?>home/logout/"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>