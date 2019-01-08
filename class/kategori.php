<?php

class kategori {

	function tampil($cari) {

	require_once "../lib/database.php";
	$db = new database();
	$kon = $db->connect();

  $query = $kon->query("SELECT * FROM kategori where namakategori like '%$cari%'");

	echo'
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%" style="text-align: center">No.</td>
					<td width="10%" style="text-align: center">ID Kategori</td>
					<td width="20%" style="text-align: center">Nama Kategori</td>
					<td colspan="2" width="5%" style="text-align: center">Aksi</td>
				</tr>
			</thead>

			<tbody>';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[idkategori].'</td>
							<td>'.$row[namakategori].'</td>

							<td style="text-align: center"><a href="editkategori.php?idkategori='.$row['idkategori'].'">
							<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapuskategori.php?idkategori='.$row['idkategori'].'"
								onclick="return confirm("Anda yakin ingin menghapus kategori?");">
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

	function input($idkategori, $namakategori)
	{
		require_once "../lib/database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO kategori (idkategori,namakategori) VALUES ('$idkategori','$namakategori')";
		$qcek = $kon->query("select * from kategori where idkategori='$idkategori'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='../kategori/inputkategori.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data berhasil Ditambahkan'); window.location='../kategori/lihatkategori.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='../kategori/lihatkategori.php';</script>";
				}
		}
	}

	function update($idkategori, $namakategori) {

			require_once "../lib/database.php";
			$db  = new database();
			$kon = $db->connect();

			$query = "UPDATE kategori set idkategori='$idkategori', namakategori='$namakategori' where idkategori='$idkategori'";

			$update = $kon->query("$query");

			if($update) {
					echo"<script>alert('Data berhasil Diperbarui'); window.location='../kategori/lihatkategori.php';</script>";
				}
				else {
					echo"<script>alert('Gagal Memperbarui Data'); window.location='../kategori/lihatkategori.php';</script>";
				}
    }

	function hapus($idkategori) {

				require_once "../lib/database.php";
				$db  = new database();
				$kon = $db->connect();

				$hapus = $kon->query("DELETE FROM kategori WHERE idkategori = '$idkategori'");

				if($hapus) {
						echo"<script>alert('Data berhasil Dihapus'); window.location='../kategori/lihatkategori.php';</script>";
				}
				else {
						echo"<script>alert('Data gagal dihapus'); window.location='../kategori/lihatkategori.php';</script>";
				}
    }
}
?>
