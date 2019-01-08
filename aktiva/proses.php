<?php
    require "../lib/database.php";
    $db = new database();
    require_once "../class/aktiva.php";

    $aktiva = new aktiva($db);

    if (isset($_POST['simpan'])) {

    $kdaktiva     = $_POST[kdaktiva];
    $namaaktiva   = $_POST[namaaktiva];
    $thn_beli     = $_POST[thn_beli];
    $idkategori   = $_POST[idkategori];
    $usia         = $_POST[usia];
    $harga        = $_POST[harga];
    $supplier     = $_POST[supplier];

    $aktiva->input($kdaktiva, $namaaktiva, $thn_beli, $idkategori, $usia, $harga, $supplier);
    }

    if (isset($_POST['update'])) {

    $kdaktiva     = $_POST[kdaktiva];
    $namaaktiva   = $_POST[namaaktiva];
    $thn_beli     = $_POST[thn_beli];
    $idkategori   = $_POST[idkategori];
    $usia         = $_POST[usia];
    $harga        = $_POST[harga];
    $supplier     = $_POST[supplier];

    $aktiva->update($kdaktiva, $namaaktiva, $thn_beli, $idkategori, $usia, $harga, $supplier);
    }

    if (isset($_POST['hapus'])) {

    	$aktiva->hapus();
    	header("location: lihatkategori.php");
    }
