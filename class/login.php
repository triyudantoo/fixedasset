<?php
session_start();

class login {
	public $email;
	public $password;

	public function __construct($email,$password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	public function validasi() {
    //echo"sampe";
    require_once "lib/database.php";
  	$db = new database();
  	$kon = $db->connect();

		$_SESSION['email']    = $this->email;
		$_SESSION['password'] = $this->password;

		$lihat = $kon->query("select * from pengguna where email ='".$this->email."' and password ='".$this->password."'");

		$datalogin = $lihat->fetch_array();
		$dtemail = $datalogin['email'];
		$dtpass = $datalogin['password'];
		$dtnama = $datalogin['nama'];

		$_SESSION['nama'] = $dtnama;
		$_SESSION['akses'] = $dtakses;

		if(($dtemail == $this->email) and ($dtpass == $this->password))
			{
				header("location:index.php");
			}
		else
			{
				//penanganan error
				$error ="Username dan Password Tidak Sesuai";
				?>
					<script type="text/javascript">
							function timedMsg()
							{
								alert ("Login GAGAL. <?php echo $error; ?>");
								window.location = "login.php";
							}
							setTimeout("timedMsg()", 000);
					</script>
				<?php
			}
	}

	public function doLogout() {
		session_start();
		session_destroy();
		session_unset();
		header('Location:login.php');
		exit();
	}
}
?>
