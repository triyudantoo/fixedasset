<?php
  $id = $_GET['idkategori'];
  require_once "../class/kategori.php";
  $kategori = new kategori();
  $kategori->hapus($id);
?>
