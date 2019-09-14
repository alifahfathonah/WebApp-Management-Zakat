
<body>

<!--================ Start Header Area =================-->
<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a class="active" href="<?= base_url(); ?>">Home</a></li>
                    <li><a href="<?= base_url() ?>home/data_dokumentasi/">Dokumentasi</a></li>
                    <li><a href="<?=  base_url(); ?>home/data_sumbangan/<?= $this->session->userdata('id'); ?>">Sumbangan</a></li>
                    <?php if($this->session->userdata('admin') || $this->session->userdata('ketua') || $this->session->userdata('pj')) { ?>
                    <li><a href="<?= base_url() ?>home/dashboard/">Dashboard</a></li>
                    <?php } ?>
                    <?php if($this->session->userdata('login')){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?= $this->session->userdata('users'); ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url(); ?>home/profile/">Profile</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>home/Logout/">Logout</a>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if(!$this->session->userdata('login')){ ?>
                        <li><a href="<?= base_url(); ?>login/">Login  </a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--=====