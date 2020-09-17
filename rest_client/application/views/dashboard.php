<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">
	<title>PLN ULP MALANG KOTA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Logo_PLN.svg" alt="logoBrand" id="logoBrand" width="150" height="70">
			</div>
			<ul class="nav navbar-nav">
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">General Electric<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url() . 'ge_pb' ?>">Pemasangan Baru</a></li>
						<li><a href="<?php echo base_url() . 'ge_pd' ?>">Penambahan Daya</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url() . 'kolektif' ?>">Kolektif</a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">3 Phasa<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url() . 'tgphasa_pb' ?>">Pemasangan Baru</a></li>
						<li><a href="<?php echo base_url() . 'tgphasa_pb' ?>">Penambahan Daya</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://localhost/PLN/login/login"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Teknik", "Fisip", "Ekonomi", "Pertanian"],
				datasets: [{
					label: '',
					data: [
						<?php
						$jumlah_teknik = mysqli_query($koneksi, "select * from mahasiswa where fakultas='teknik'");
						echo mysqli_num_rows($jumlah_teknik);
						?>,
						<?php
						$jumlah_ekonomi = mysqli_query($koneksi, "select * from mahasiswa where fakultas='ekonomi'");
						echo mysqli_num_rows($jumlah_ekonomi);
						?>,
						<?php
						$jumlah_fisip = mysqli_query($koneksi, "select * from mahasiswa where fakultas='fisip'");
						echo mysqli_num_rows($jumlah_fisip);
						?>,
						<?php
						$jumlah_pertanian = mysqli_query($koneksi, "select * from mahasiswa where fakultas='pertanian'");
						echo mysqli_num_rows($jumlah_pertanian);
						?>
					],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	</script>
</body>