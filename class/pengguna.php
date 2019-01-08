<?php

class pengguna {

	function input($nama, $email, $password)
	{
		require_once "../lib/database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pengguna (nama,email,password) VALUES ('$nama','$email','$password')";
		$qcek = $kon->query("select * from pengguna where id='$id'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='../user/inputuser.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data berhasil Ditambahkan'); window.location='../user/lihatuser.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='../user/lihatuser.php';</script>";
				}
		}
	}

	function tampil($cari) {

	require_once "../lib/database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM pengguna where id != '1' and nama like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%" style="text-align: center">No.</td>
					<td width="20%" style="text-align: center">Nama Pengguna</td>
					<td width="20%" style="text-align: center">Email Pengguna</td>
					<td colspan="2" width="5%" style="text-align: center">Aksi</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[nama].'</td>
							<td>'.$row[email].'</td>

							<td style="text-align: center"><a href="edituser.php?id='.$row['id'].'">
							<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapususer.php?id='.$row['id'].'"
								onclick="return confirm("Anda yakin ingin menghapus pengguna?");">
								<i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>
							</td>
									 </tr>';
								$no++;
					}
					echo '
					</tbody>
				</table>
				';

	}

	function update($id, $nama, $email, $password) {

			require_once "../lib/database.php";
			$db  = new database();
			$kon = $db->connect();

			$query = "UPDATE pengguna set nama='$nama', email='$email', password='$password' WHERE id='$id'";

			$update = $kon->query("$query");

			if($update) {
					echo"<script>alert('Data berhasil Diperbarui'); window.location='../user/lihatuser.php';</script>";
				}
				else {
					echo"<script>alert('Gagal Memperbarui Data'); window.location='../user/lihatuser.php';</script>";
				}
    }

	function hapus($id) {

				require_once "../lib/database.php";
				$db  = new database();
				$kon = $db->connect();
				session_start();
				$nama = $_SESSION['nama'];
				$cekhapus = $kon->query("select * from pengguna where nama = '$nama'");
				$data = $cekhapus->fetch_array();
				if($id == $data['id'])
				{
					echo"<script>alert('User sedang digunakan. Tidak dapat menghapus data !'); window.location='../user/lihatuser.php';</script>";
				}
				else
				{
					$hapus = $kon->query("DELETE FROM pengguna WHERE id = '$id'");

					if($hapus) {
							echo"<script>alert('Data berhasil Dihapus'); window.location='../user/lihatuser.php';</script>";
					}
					else {
							echo"<script>alert('Data gagal dihapus'); window.location='../user/lihatuser.php';</script>";
					}
				}
    }
}
?>
