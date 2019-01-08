<?php
    require "../lib/database.php";
    $db = new database();
    require_once "../class/kategori.php";

    $kategori = new kategori($db);

    if (isset($_POST['simpan'])) {

      $idkategori   = $_POST[idkategori];
      $namakategori = $_POST[namakategori];

    	$kategori->input($idkategori,$namakategori);
    }

    if (isset($_POST['update'])) {

      $idkategori   = $_POST[idkategori];
      $namakategori = $_POST[namakategori];

      $kategori->update($idkategori,$namakategori);
    }

    if (isset($_POST['hapus'])) {

    	$kategori->hapus();
    	header("location: lihatkategori.php");
    }
