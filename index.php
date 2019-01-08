<?php
  session_start();
  if(!isset($_SESSION['nama']))
  {
    echo "
      <script type=text/javascript>
        alert('Silakan login terlebih dahulu !');
        window.location = 'login.php';
      </script>
    ";
    exit;
  }
?>

<html>
<head>
<title>.:: Beranda ::.</title>
<link rel="shortcut icon" href="../fixedasset/img/favicon.png">

<link href="../fixedasset/icon/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/global.css" /></link>

</head>

<body>
	<div id="header">
    <img src="img/header.png">
	</div>

	<div id="container">
		<div class="sidebar">
		  <div style='color:#FFFF00; font-size: 20px; padding-top: 20px; padding-bottom: 20px; text-align: center;'>
		    <?php echo "Selamat Datang,<br>".$_SESSION['nama']; ?>
		  </div>
		  <ul id="nav">
		    <li><a href="./index.php"><i class="fa fa-home" style="font-size:18px;"><span style="padding-left: 15px">Beranda</span></i></a></li>
		    <li><a href="./kategori/lihatkategori.php"><i class="fa fa-flag" style="font-size:18px"><span style="padding-left: 15px">Kategori</span></i></a></li>
		    <li><a href="./aktiva/lihataktiva.php"><i class="fa fa-briefcase" style="font-size:18px"><span style="padding-left: 15px">Aktiva Tetap</span></i></a></li>
		    <li><a href="./penyusutan/lihatpenyusutan.php"><i class="fa fa-calculator" style="font-size:18px"><span style="padding-left: 15px">Penyusutan</span></i></a></li>
		    <li><a href="./user/lihatuser.php"><i class="fa fa-user" style="font-size:18px"><span style="padding-left: 20px">Pengguna</span></i></a></li>
		    <li><a href="./logout.php"><i class="fa fa-sign-out" style="font-size:18px"><span style="padding-left: 15px">Keluar</i></a></li>
		  </ul>
		</div>

		<div class="content">
			<i class="fa fa-home" style="font-size: 30px; padding-top: 25px;"><span style="padding-left: 15px">Beranda</span></i>

			<div id="box">
				<div class="box-top"><i>Application System Name</i></div>
				<div class="box-panel">
					<span style="font-size: 16px"><strong>Aplikasi Pengelolaan Penyusutan Aktiva Tetap PT Syapril Janizar</strong></span>
				</div>
			</div>

			<div id="box">
				<div class="box-top"><i>About the System</i></div>
				<div class="box-panel">
					<span style="font-size: 16px">Fitur-fitur yang terdapat dalam aplikasi ini adalah:
					<ol style="padding-left: 20px">
						<li>Kelola Kategori</li>
						<li>Kelola Aktiva Tetap</li>
						<li>Kelola Penyusutan</li>
						<li>Kelola Pengguna</li>
					</ol></span>
				</div>
			</div>

			<div id="box">
				<div class="box-top"><i>Developer</i></div>
				<div class="box-panel">
					<i class="fa fa-user" style="font-size:16px"><span style="padding-left: 20px">Randi Triyudanto</span></i><br><br>
					<i class="fa fa-address-card-o" style="font-size:16px"><span style="padding-left: 15px">43E57006155122</span></i><br><br>
					<i class="fa fa-graduation-cap" style="font-size:16px"><span style="padding-left: 12px">Informatics</span></i><br><br>
					<i class="fa fa-building-o" style="font-size:16px"><span style="padding-left: 20px">STMIK Kharisma Karawang</span></i>
				</div>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="footer">&copy; STMIK Kharisma Karawang - 2018
      <span style="padding-left: 670px;">http://www.stmik-kharisma.ac.id</span>
    </div>
	</div>

</body>

</html>
