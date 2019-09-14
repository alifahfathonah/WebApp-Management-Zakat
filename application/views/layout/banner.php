<!--================ start banner Area =================-->
<section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/donatur/img/bg.jpg">
	
    <div class="overlay-bg overlay"></div>
    <div class="container">
        <div class="row fullscreen justify-content-lg-end">
            <div class="banner-content col-lg-7">
                <h1>
                    Pesantren Ashabul Kahfi <br>
                    
                </h1>
                <h4>Lebih banyak amal. Kehidupan yang lebih baik	.</h4>
                <?php if(!$this->session->userdata('login')){ ?>
                <a href="<?= base_url(); ?>registrasi/" class="primary-btn">
                    Daftar
                    <i class="ti-angle-right ml-1"></i>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!--================ End banner Area =================-->