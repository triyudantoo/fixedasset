<?php
include_once('class/login.php');

 $email = $_POST['email'];
 $pass = md5($_POST['password']);

 $log = new login($email,$pass);
 $log->validasi();

?>
