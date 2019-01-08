<?php
  $id = $_GET['kdaktiva'];
  require_once "../class/aktiva.php";
  $aktiva = new aktiva();
  $aktiva->hapus($id);
?>

