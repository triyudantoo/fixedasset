<?php

class penyusutan {

	function tampil($cari)
	{
		require_once "../lib/database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM penyusutan, aktiva where penyusutan.kdaktiva = aktiva.kdaktiva and aktiva.namaaktiva like '%$cari%'");

		echo'
			<table class="table table-bordered">
			<thead style="font-weight: bold; font-size: 14px;">
				<tr>
						<td width="2%" style="text-align: center">No.</td>
						<td width="20%" style="text-align: center">Nama Aktiva</td>
						<td width="5%" style="text-align: center">Masa Manfaat</td>
						<td width="20%" style="text-align: center">Harga Perolehan</td>
						<td width="15%" style="text-align: center">Nilai Penyusutan</td>
						<td width="2%" style="text-align: center">Lama Pakai</td>
						<td width="20%" style="text-align: center">Akumulasi Penyusutan</td>
						<td width="35 %" style="text-align: center">Nilai Buku</td>
				</tr>
			</thead>

			<tbody style="font-size: 14px">';
					$no = 1;
					while ($row = $query->fetch_array()) {

					echo '
							<tr>
								<td style="text-align: right">'.$no.'</td>
								<td>'.$row[namaaktiva].'</td>
								<td style="text-align: right">'.$row[usia].' thn</td>
								<td style="text-align: right">Rp '.number_format($row['harga'],0,',','.').'</td>
								<td style="text-align: right">Rp '.number_format($row['tarif'],0,',','.').'</td>
								<td style="text-align: right">'.$row[thn_berjalan].' thn</td>
								<td style="text-align: right">Rp '.number_format($row['akumulasi'],0,',','.').'</td>
								<td style="text-align: right">Rp '.number_format($row['nilai_buku'],0,',','.').'</td>
							</tr>';
									$no++;
						}
						echo '
						</tbody>
					</table>
					';
	}

	public function input($kdaktiva, $usia, $harga, $tarif, $thn_berjalan, $akumulasi, $nilai_buku)
	{
		require_once "../lib/database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO penyusutan (kdaktiva, usia, harga, tarif, thn_berjalan, akumulasi, nilai_buku) VALUES ('$kdaktiva', '$usia', '$harga', '$tarif', '$thn_berjalan', '$akumulasi', '$nilai_buku')";
		$qcek = $kon->query("SELECT * FROM penyusutan where kdpenyusutan='$kdpenyusutan'");
		$jmbaris = $qcek->num_rows;
		if($jmbaris==1)
		{
			echo"<script>alert('Data sudah ada'); window.location='../penyusutan/inputpenyusutan.php';</script>";
		}
		else {
			$simpan = $kon->query("$query");

			if($simpan) {
				echo"<script>alert('Data berhasil Ditambahkan'); window.location='../penyusutan/lihatpenyusutan.php';</script>";
			}
			else {
				echo"<script>alert('Gagal Menambahkan Data'); window.location='../penyusutan/lihatpenyusutan.php';</script>";
			}
		}
	}
}
?>
