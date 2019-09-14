<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Sistem Informasi Zakat - Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/login/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/login/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/login/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/login/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/login/assets/css/demo.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/login/assets/font.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets/home/img/logo/logo_1.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box " style="height:500px;">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?= base_url(); ?>assets/home/img/logo/logo_1.jpeg" width="120" height="120" alt="Klorofil Logo"></div>
								<p class="lead">Reset Password untuk <?= $this->session->userdata('reset_email'); ?></p>
                            </div>
                            <?php if( $this->session->flashdata('failed')){ ?>
                            <div class="alert <?= $this->session->flashdata('alert'); ?>" role="alert">
                                <?php echo $this->session->flashdata('failed'); ?>
                            </div>
                            <?php } ?>
                            <?php if( $this->session->flashdata('sukses')){ ?>
                            <div class="alert <?= $this->session->flashdata('alert'); ?>" role="alert">
                                <?php echo $this->session->flashdata('sukses'); ?>
                            </div>
                            <?php } ?>
							<form class="form-auth-small"  method="post">
								<div class="form-group">  
									<label for="signin-email" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-email" name="password"  value="" placeholder="Masukan Password ...">
                                     <small class="text-danger text-left " >
                                    <?= form_error('password') ?>
                                    </small>
								</div>
								<div class="form-group">  
									<label for="signin-email" class="control-label sr-only">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="signin-email" name="konfirmasi"  value="" placeholder="Masukan Konfirmasi Password ...">
                                     <small class="text-danger text-left " >
                                    <?= form_error('konfirmasi') ?>
                                    </small>
								</div>
                              
								<!-- <div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<a href="<?= base_url(); ?>registrasi/"><span>Belum Punya Akun ?</span></a>
									</label>
								</div> -->
								<button type="submit" name="submit" style="background-color:#078171;color:#fff; border-color:#078171;" class="btn btn-success btn-lg btn-block">Simpan Kata Sandi</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-share"></i> <a href="<?= base_url(); ?>">Login Kembali</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right" style="background-image:url(<?= base_url().'assets/login/assets/img/bg.jpg'; ?>)">
						<div class="overlay" style="background:rgba(7,129,113, 0.82);"></div>
						<div class="content text">
							<h1 class="heading">Sistem Informasi Pengolahan Dana Donasi Pesantren Ashabul Kahfi </h1>
							<!-- <p>by Rizky</p> -->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
