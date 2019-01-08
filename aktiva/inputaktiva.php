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
  <title>Tambah Aktiva Tetap</title>
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
    <i class="fa fa-plus-square" style="font-size: 28px; margin-top: 25px"><span style="padding-left: 15px">Form Input Aktiva Tetap</i>

      <div id="box">
        <div class="box-top"><i>Menambahkan Data Aktiva</i></div>
        <div class="box-panel">
					<form method="POST" action="proses.php">
					<table class="table">
						<tr>
							<td style="text-align: right">Kode Aktiva</td>
							<td><input class="form-control" type="text" name="kdaktiva" required></td>
						</tr>
						<tr>
							<td style="text-align: right">Nama Aktiva</td>
							<td><input class="form-control" type="text" name="namaaktiva" required></td>
						</tr>
            <tr>
							<td style="text-align: right">Tahun Perolehan</td>
              <td>
                <select class="form-control" name="thn_beli" placeholder="Pilih Tahun" required>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                </select>
              </td>
						</tr>
            <tr>
							<td style="text-align: right">Kategori</td>
              <td>
                <select class="form-control" name="idkategori" placeholder="Pilih Kategori" required>
                  <option value=""></option>
                  <?php
                    require_once "../lib/database.php";
                    $db  = new database();
                    $kon = $db->connect();
                    $qcek = $kon->query("select * from kategori");
                    while ($row = $qcek->fetch_array()) {
                      echo"<option value='".$row['idkategori']."'>".$row['namakategori']."</option>";
                    }
                  ?>

        				</select>
              </td>
						</tr>
            <tr>
							<td style="text-align: right">Masa Manfaat (thn)</td>
							<td><input type="text" name="usia"></td>
						</tr>
            <tr>
							<td style="text-align: right">Harga Perolehan (Rp)</td>
							<td><input type="text" name="harga"></td>
						</tr>
            <tr>
							<td style="text-align: right">Supplier</td>
							<td><input type="text" name="supplier"></td>
						</tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn" name="simpan">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Simpan</i>
								</button>
									<span style="padding-left: 20px"><a href="../aktiva/lihataktiva.php" class="btn-default">
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
