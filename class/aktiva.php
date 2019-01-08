<?php

class aktiva {

	function tampil($cari)
	{
		require_once "../lib/database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM aktiva, kategori where aktiva.idkategori=kategori.idkategori and aktiva.namaaktiva like '%$cari%'");

	echo'
		<table class="table table-bordered">
		<thead style="font-weight: bold; font-size: 14px;">
			<tr>
				<td width="2%" style="text-align: center">No.</td>
				<td width="10%" style="text-align: center">Kode Aktiva</td>
				<td width="15%" style="text-align: center">Nama Aktiva</td>
				<td width="5%" style="text-align: center">Tahun Perolehan</td>
				<td width="3%" style="text-align: center">Kategori</td>
				<td width="5%" style="text-align: center">Masa Manfaat</td>
				<td width="15%" style="text-align: center">Harga Beli</td>
				<td width="15%" style="text-align: center">Supplier</td>
				<td width="8%" style="text-align: center" colspan="2">Aksi</td>
			</tr>
		</thead>

		<tbody style="font-size: 14px">';
				$no = 1;
				while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">'.$no.'</td>
							<td>'.$row[kdaktiva].'</td>
							<td>'.$row[namaaktiva].'</td>
							<td style="text-align: center">'.$row[thn_beli].'</td>
							<td>'.$row[namakategori].'</td>
							<td style="text-align: right">'.$row[usia].' thn</td>
							<td style="text-align: right">Rp '.number_format($row['harga'],0,',','.').'</td>
							<td>'.$row[supplier].'</td>

							<td style="text-align: center"><a href="editaktiva.php?kdaktiva='.$row['kdaktiva'].'">
							<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapusaktiva.php?kdaktiva='.$row['kdaktiva'].'"
								onclick="return confirm("Anda yakin ingin menghapus aktiva?");">
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

	function input($kdaktiva, $namaaktiva, $thn_beli, $idkategori, $usia, $harga, $supplier) {
		require_once "../lib/database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO aktiva (kdaktiva, namaaktiva, thn_beli, idkategori, usia, harga, supplier) VALUES ('$kdaktiva', '$namaaktiva', '$thn_beli', '$idkategori', '$usia', '$harga', '$supplier')";
		$qcek = $kon->query("SELECT * FROM aktiva where kdaktiva='$kdaktiva'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='../aktiva/inputaktiva.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data berhasil Ditambahkan'); window.location='../aktiva/lihataktiva.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='../aktiva/lihataktiva.php';</script>";
			}
		}
	}

	public function update($kdaktiva, $namaaktiva, $thn_beli, $idkategori, $usia, $harga, $supplier)
	{
		require_once "../lib/database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE aktiva SET namaaktiva='$namaaktiva', thn_beli='$thn_beli', idkategori='$idkategori', usia='$usia', harga='$harga', supplier='$supplier' WHERE kdaktiva='$kdaktiva'";

		$update = $kon->query("$query");

		if($update) {
				echo"<script>alert('Data berhasil Diperbarui'); window.location='../aktiva/lihataktiva.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Memperbarui Data'); window.location='../aktiva/lihataktiva.php';</script>";
			}
	}

	function hapus($kdaktiva) {

				require_once "../lib/database.php";
				$db  = new database();
				$kon = $db->connect();

				$hapus = $kon->query("DELETE FROM aktiva WHERE kdaktiva = '$kdaktiva'");

				if($hapus) {
						echo"<script>alert('Data berhasil Dihapus'); window.location='../aktiva/lihataktiva.php';</script>";
				}
				else {
						echo"<script>alert('Data gagal dihapus'); window.location='../aktiva/lihataktiva.php';</script>";
				}
		}

/*	public function kategori()
	{
		$query = "SELECT * FROM kategori";
		$stmt  = $this->db->prepare($sql);
		$stmt->execute();

		//Menampilkan semua data
		$data = array();
        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }
    return $data;
	}
*/
}
