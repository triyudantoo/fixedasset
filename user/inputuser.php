<?php
  session_start();
  if(!isset($_SESSION['nama']))
  {
    echo "
      <script type=text/javascript>
        alert('Silakan login terlebih dahulu !');
        window.location = '../login.php';
      </script>
    ";
    exit;
  }
?>

<html>
<head>
  <title>Tambah Pengguna</title>
  <link rel="shortcut icon" href="../img/favicon.png">

  <link href="../icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/global.css" /></link>
</head>

<body>
  <div id="header">
		<img src="../img/header.png">
	</div>

  <div class="sidebar">
    <div style='color:#FFFF00; font-size: 20px; padding-top: 20px; padding-bottom: 20px; text-align: center;'>
      <?php session_start(); echo "Selamat Datang,<br>".$_SESSION['nama']; ?>
    </div>
    <ul id="nav">
      <li><a href="../index.php"><i class="fa fa-home" style="font-size:18px;"><span style="padding-left: 15px">Beranda</span></i></a></li>
      <li><a href="../kategori/lihatkategori.php"><i class="fa fa-flag" style="font-size:18px"><span style="padding-left: 15px">Kategori</span></i></a></li>
      <li><a href="../aktiva/lihataktiva.php"><i class="fa fa-briefcase" style="font-size:18px"><span style="padding-left: 15px">Aktiva Tetap</span></i></a></li>
      <li><a href="../penyusutan/lihatpenyusutan.php"><i class="fa fa-calculator" style="font-size:18px"><span style="padding-left: 15px">Penyusutan</span></i></a></li>
      <li><a href="../user/lihatuser.php"><i class="fa fa-user" style="font-size:18px"><span style="padding-left: 20px">Pengguna</span></i></a></li>
      <li><a href="../logout.php"><i class="fa fa-sign-out" style="font-size:18px"><span style="padding-left: 15px">Keluar</i></a></li>
    </ul>
  </div>

  <div class="content">
    <i class="fa fa-plus-square" style="font-size: 28px; padding-top: 25px"><span style="padding-left: 15px">Form Input Pengguna</i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Data Pengguna</i></div>
        <div class="box-panel">
					<form method="POST" action="proses.php">
					<table class="table">
						<tr>
							<td style="text-align: right">Nama Pengguna</td>
							<td><input type="text" name="nama"></td>
						</tr>
						<tr>
							<td style="text-align: right">Email Pengguna</td>
							<td><input type="text" name="email"></td>
						</tr>
            <tr>
              <td style="text-align: right">Password</td>
              <td><input type="password" name="password"></td>
            </tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn" name="simpan">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Simpan</i>
								</button>
									<span style="padding-left: 20px"><a href="../user/lihatuser.php" class="btn-default">
										<i class="fa fa-backward" style="font-size:16px">
										<span style="padding-left: 5px">Lihat Data</i></button></a>
							</td>
						</tr>
					</table>
					</form>
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
