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
  <title>Edit Kategori</title>
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
    <i class="fa fa-edit" style="font-size: 28px;  padding-top: 20px"><span style="padding-left: 15px;">Form Edit Kategori</i>

<?php
  $id = $_GET['idkategori'];

	require_once "../lib/database.php";
	$db = new database();
	$kon = $db->connect();
  $query = $kon->query("SELECT * FROM kategori where idkategori='$id'");
  while ($row = $query->fetch_array()) {
      $idkategori = $row['idkategori'];
      $namakategori = $row['namakategori'];
  }
?>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Kategori</i></div>
        <div class="box-panel">
					<form method="POST" action="proses.php">
					<table class="table">
						<tr>
							<td>ID Kategori</td>
							<td><input type="text" name="idkategori" readonly value="<?=$idkategori;?>"></td>
						</tr>
						<tr>
							<td>Nama Kategori</td>
							<td><input type="text" name="namakategori" value="<?=$namakategori;?>"></td>
						</tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn-default" name="update">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Update</i>
								</button>
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
