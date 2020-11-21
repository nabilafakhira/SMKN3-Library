<script type="text/javascript">
	window.print();
</script>
<?php
include 'config.php';
?>
<?php
$user = $_SESSION['username'];
$query_bio = mysqli_query($koneksi,"SELECT * FROM tbguru WHERE nip='$_SESSION[username]'");
$rows_bio = mysqli_fetch_array($query_bio);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak</title>
</head>
<body>
	<table border="1" style="border-collapse: collapse;" width="100%">
		<tr>
			<td colspan='2' style="padding: 5px 50px 30px">
			<h3>Data Guru</h3>
				<table border="1" style="border-collapse: collapse; width: 100%">
					<tr>
						<td width="200px">NIP</td>
						<td>&nbsp;<?php echo $rows_bio['nip']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>&nbsp;<?php echo $rows_bio['nama']; ?></td>
					</tr>
					<tr>
						<td>Mata Pelajaran Ajar</td>
						<td>&nbsp;<?php echo $rows_bio['mapel_ajar']; ?></td>
					</tr>
				</table>
				<br>
				<br>
				<h3>Data Buku Paket yang Dipinjam</h3>
				<?php $no = 1;
$query = mysqli_query($koneksi,"SELECT * FROM tbpinjam_paket WHERE nisn_nip='$user'");
?>
				<table border="1" style="border-collapse: collapse; width: 100%">
					<tr>
						<td width="3%"><div align="center">No</div></td>
						<td width="14%"><div align="center">Tanggal Pinjam</div></td>
						<td width="21%"><div align="center">Mata Pelajaran</div></td>
						<td width="17%"><div align="center">Kelas/Semester</div></td>
						<td width="15%"><div align="center">Kode Buku</div></td>
						<td width="17%"><div align="center">Jumlah</div></td>
						<td width="13%"><div align="center">Tanggal Kembali</div></td>
					</tr>
		<?php while ($rows = mysqli_fetch_array($query)) { ?>
					<tr>
						<td width="3%"><div align="center"><?php echo $no++; ?></div></td>
						<td><div align="center"><?php echo $rows['tanggal_pinjam']; ?></div></td>
						<td><div align="center"><?php echo $rows['mata_pelajaran']; ?></div></td>
						<td><div align="center"><?php echo $rows['kelas_semester']; ?></div></td>
						<td><div align="center"><?php echo $rows['kode_buku']; ?></div></td>
						<td><div align="center"><?php echo $rows['jumlah']; ?></div></td>
						<td><div align="center"><?php echo $rows['tanggal_kembali']; ?></div></td>
					</tr>
			<?php } ?>
				</table>

				<br>
				<br>
				<h3>Data Buku Non-Paket yang Dipinjam</h3>
				<?php 
				$noo = 1;
$paket = mysqli_query($koneksi,"SELECT * FROM tbpinjam_nonpaket WHERE nisn_nip='$user'");
				?>
				<table border="1" style="border-collapse: collapse; width: 100%">
					<tr>
					  <td width="3%"><div align="center">No</div></td>
					  <td width="19%"><div align="center">Tanggal Pinjam</div></td>
					  <td width="24%"><div align="center">Judul Buku</div></td>
						<td width="18%"><div align="center">Kode Buku</div></td>
						<td width="20%"><div align="center">Jumlah</div></td>
						<td width="16%"><div align="center">Tanggal Kembali</div></td>
					</tr>
					<?php while ($row = mysqli_fetch_array($paket)) { ?>
					<tr>
					  <td width="3%"><div align="center"><?php echo $noo++; ?></div></td>
						<td><div align="center"><?php echo $row['tanggal_pinjam']; ?></div></td>
						<td><div align="center"><?php echo $row['judul_buku']; ?></div></td>
						<td><div align="center"><?php echo $row['kode_buku']; ?></div></td>
						<td><div align="center"><?php echo $row['jumlah']; ?></div></td>
						<td><div align="center"><?php echo $row['tanggal_kembali']; ?></div></td>
					</tr>
	<?php } ?>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>