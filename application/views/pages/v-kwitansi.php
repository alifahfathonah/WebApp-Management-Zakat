<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kwitansi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>assets/kwitansi/style.css">
	<style type="text/css" media="print">
		@page { size: landscape; }
	</style>
	<script>
	window.print();
	</script>
</head>
<body>
	<div class="container"style="margin-top:80px;">
		<div class="row">
			<div class="col-4">
				<img class="logo" src="<?= base_url(); ?>assets/home/img/logo/logo_1.png" alt="">
			</div>
			<div class="col-8">
				<h3 class="yayasan">Pondok Pesantren Tahfidz Yatim Dhuafa Ashabul Kahfi</h3>
				<ul class="list-unstyled desc">
					<li>Jalan Desa Satria Jaya, Kampung Gebang RT.02/03 , Desa Satria Jaya, Kecamatan Tambun Utara Kabupaten Bekasi</li>
					<li>0813-8305-0338</li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="kotak">
			<h5 class="bukti">Tanda Bukti Pembayaran</h5>
		</div>
		<div class="row" style="margin-bottom:20px;">
			<center>
			<table>
				<?php foreach($detail as $row){ ?>
				<tr>
					<th>Terima Dari</th>
					<td>:</td>
					<td><?= $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Uang Sejumlah</th>
					<td>:</td>
					<td>Rp. <?= number_format($row['nominal_sumbangan'],2,",","."); ?></td>
				</tr>
				<tr>
					<th>Untuk Pembayaran</th>
					<td>:</td>
					<td><?= $row['nama_sumbangan']; ?></td>
				</tr>
				<?php } ?>
			</table>
			</center>
		</div>
		<?php 
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			$sekarang = date("n");
		?>
		<div class="row">
			<div class="col" style="text-align:right;">
				<h6 class="date">Jakarta, <?= date("d"); ?> <?=  $bulan[$sekarang-1]; ?>  2019</h6>
				<p class="name">Admin</p>
			</div>
		</div>
	</div>
</body>
</html>