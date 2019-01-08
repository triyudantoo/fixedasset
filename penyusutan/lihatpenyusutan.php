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
  require_once "../class/penyusutan.php";
  $penyusutan = new penyusutan();
?>

<html>
<head>
  <title>Penyusutan Aktiva Tetap</title>

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
      <i class="fa fa-edit" style="font-size: 28px; padding-top: 25px;">
        <span style="padding-left: 15px;">Data Penyusutan</span></i>
    <div id="box">
      <div class="box-top"><i>Menampilkan Data Penyusutan</i></div>
      <div class="box-panel">
        <table width=100%;>
        <tr>
        <td style="width:65%; padding-top:15px;"><a href="inputpenyusutan.php">
            <button class="btn"><i class="fa fa-plus" style="font-size:16px">
            <span style="padding-left: 5px"> Penyusutan</span></i></button></a></span>
        </td>
        <td>
            <form method="post" action="lihatpenyusutan.php">
            <?php
            $cari = $_POST['caripenyusutan'];

            if($_POST['caripenyusutan'])
            {
              echo'
                <a href="lihatpenyusutan.php" style="font-size:12px;">Reset Pencarian</>
                <input type="text" name="caripenyusutan" placeholder="Cari Penyusutan" value='.$cari.'>';
            }else{
              echo'<input type="text" name="caripenyusutan" placeholder="Cari Penyusutan">';
            }
            ?>
            <button type="submit" class="btn">
              <i class="fa fa-search" style="font-size:16px;"></i>
            </button>
            </form>
        </td>
        </tr>

        <?php
            $penyusutan->tampil($cari);
        ?>
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
