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

<?php
  require_once "../lib/database.php";
  $db  = new database();
  $kon = $db->connect();

  $kdaktiva = $_POST['namaaktiva'];

  $sql = "select usia, harga from aktiva where kdaktiva = '$kdaktiva'";
  $query = $kon->query($sql);
  $data = $query->fetch_array();

  $usia = $data['usia'];
  $harga = $data['harga'];
  if($_POST['namaaktiva'])
  {
    $tarif = $harga / $usia;
  }
  else {
    $tarif = '';
  }
?>

<html>
<head>
  <title>Penyusutan</title>
  <link rel="shortcut icon" href="../img/favicon.png">

  <link href="../icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/global.css" /></link>


    <script>
      function tampil(a, b)
      {
        document.getElementById(a).action=b;
        document.getElementById(a).submit();
      }
      function hasil()
      {
        var trf = document.getElementById('tarif').value;
        var lama = document.getElementById('thn_berjalan').value;
        var akumulasi = trf * lama;
        document.getElementById('akumulasi').value=akumulasi;

        var harga = document.getElementById('harga').value;
        var nilbuk = harga - akumulasi;
        document.getElementById('nilai_buku').value=nilbuk;
      }
    </script>

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
    <i class="fa fa-plus-square" style="font-size: 28px; padding-top: 25px;"><span style="padding-left: 15px">Form Input Penyusutan</i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Data Penyusutan</i></div>
        <div class="box-panel">
					<form method="POST" id="penyusutan" name="penyusutan" action="proses.php">
					<table class="table">
						<tr>
							<td style="text-align: right">Nama Aktiva</td>
							<td>
                <select class="form-control" name="namaaktiva" placeholder="Pilih Aktiva" required>
                  <?php
                    require_once "../lib/database.php";
                    $db  = new database();
                    $kon = $db->connect();
                    $qcek = $kon->query("select * from aktiva");
                    while ($row = $qcek->fetch_array()) {
                      if($row['kdaktiva'] == $kdaktiva)
                      {
                        ?>
                        <option value='<?php echo $row['kdaktiva']; ?>' onclick="tampil('penyusutan','inputpenyusutan.php');" selected><?php echo $row['namaaktiva']; ?></option>
                        <?php
                      //echo"<option value='".$row['kdaktiva']."' onclick='tampil('penyusutan', 'inputpenyusutan.php');' >".$row['namaaktiva']."</option>";
                    } else {
                      ?>
                      <option value='<?php echo $row['kdaktiva']; ?>' onclick="tampil('penyusutan','inputpenyusutan.php');"><?php echo $row['namaaktiva']; ?></option>
                      <?php
                    }
                    }
                  ?>

        				</select>
              </td>
						</tr>
						<tr>
							<td style="text-align: right">Masa Manfaat (thn)</td>
							<td><input class="form-control" type="text" name="usia"  value='<?php echo $usia; ?>' readonly></td>
						</tr>
            <tr>
							<td style="text-align: right">Harga Perolehan</td>
              <td><input class="form-control" type="text" name="harga" id="harga"  value='<?php echo $harga; ?>' readonly></td>
						</tr>
            <tr>
							<td style="text-align: right">Nilai Penyusutan</td>
              <td><input class="form-control" type="text" name="tarif" id="tarif"  value='<?php echo $tarif; ?>' readonly></td>
						</tr>
            <tr>
							<td style="text-align: right">Lama Pemakaian (thn)</td>
							<td><input type="text" name="thn_berjalan" id="thn_berjalan" onchange="hasil();"></td>
						</tr>
            <tr>
							<td style="text-align: right">Akumulasi Penyusutan</td>
							<td><input type="text" name="akumulasi" id="akumulasi"></td>
						</tr>
            <tr>
							<td style="text-align: right">Nilai Buku</td>
							<td><input type="text" name="nilai_buku" id="nilai_buku"></td>
						</tr>
						<tr><td></td></tr><tr><td></td></tr>
							<td></td>
							<td>
								<button type="submit" class="btn" name="simpan">
									<i class="fa fa-save" style="font-size:16px">
									<span style="padding-left: 5px">Simpan</i>
								</button>
									<span style="padding-left: 20px"><a href="../penyusutan/lihatpenyusutan.php" class="btn-default">
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
