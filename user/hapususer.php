<?php
  $id = $_GET['id'];
  require_once "../class/pengguna.php";
  $pengguna = new pengguna();
  $pengguna->hapus($id);
?>
