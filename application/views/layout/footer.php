
	<!--================ start footer Area =================-->
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-5 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Tentang</h4>
							<p>
							Pesantren Tahfizh Yatim Dhuafa Ashabul Kahfi dirintis pendiriannya pada awal tahun 2016 oleh Yayasan Islamic Center Cikarang Bekasi. Pesantren ini menempati tanah wakaf seluas kurang lebih 3.000 meter persegi yang beralamat di Jl. Desa Satria Jaya, Kp. Gebang RT 002/003, Desa Satria Jaya, Kec. tambun Utara, Kab. Bekasi – JABAR 17510..
							</p>
							
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Links</h4>
							<ul class="list">
								<li><a href="<?= base_url(); ?>">Home</a></li>
								<li><a href="<?= base_url(); ?>home/data_dokumentasi/">Dokumentasi</a></li>
								<li><a href="<?= base_url(); ?>home/data_sumbangan/<?= $this->session->userdata('id'); ?>">Sumbangan</a></li>
								<li><a href="<?= base_url(); ?>login/">Login</a></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Kontak Kami</h4>
							<div class="ml-5">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Alamat
								</p>
								<p>Yayasan Islamic Center Cikarang Bekasi</p>

								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Nomor Telepon
								</p>
								<p>
									+62 813 8606 8612
								</p>

								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									pesantrentahfizhashabulkahfi@gmail.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area =================-->

	<script src="<?= base_url() ?>assets/donatur/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/donatur/js/vendor/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/parallax.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/isotope.pkgd.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/countdown.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/jquery.sticky.js"></script>
	<script src="<?= base_url() ?>assets/donatur/js/main.js"></script>
	<script src="<?= base_url(); ?>assets/home/js/swal.js"></script>
	<script>
    
    var alert = document.getElementById("alert"); 

      if(alert !=null){
        var status = document.getElementById("status").innerHTML;
        var message = document.getElementById("message").innerHTML;
        var mtitle = document.getElementById("title").innerHTML;
          swal({
            title: mtitle,
            text: message,
            icon: status,
          });
       }
    </script>
</body>

</html>