<?php
    require "../lib/database.php";
    $db = new database();
    require_once "../class/penyusutan.php";

    $penyusutan = new penyusutan($db);

    if (isset($_POST['simpan']))
    {
      $kdaktiva     = $_POST[namaaktiva];
      $usia         = $_POST[usia];
      $harga        = $_POST[harga];
      $tarif        = $_POST[tarif];
      $thn_berjalan = $_POST[thn_berjalan];
      $akumulasi    = $_POST[akumulasi];
      $nilai_buku   = $_POST[nilai_buku];

    	$penyusutan->input($kdaktiva, $usia, $harga, $tarif, $thn_berjalan, $akumulasi, $nilai_buku);
    }
?>
