 <?php
include 'config.php';
?>
 <html>
 <head>
<title>Hasil Pencarian</title>
 <link rel="stylesheet" href="style.css">
</head>
 <body>
 <div class="tampil-paket">
  <div class="tampil-judul">Daftar Buku Paket yang Dipinjam</div>
	<div></div>	
				<p>
				  <?php
		if(!empty($_SESSION['username'])){
		?>

		<?php
					$no = 1;
					$hasil = "SELECT * FROM tbpinjam_paket WHERE nisn_nip = '$_SESSION[username]' order by `kelas_semester` ASC";
					$tampil=mysqli_query($koneksi,$hasil) or die(mysqli_error($koneksi))
					?>
					
				<table width="850" class="table">
                        <tr class="trhead">
						<td width="24">No</td>
						<td width="105">Tanggal Pinjam</td>
						<td width="153">Mata Pelajaran</td>
						<td width="132">Kelas/Semester</td>
						<td width="125">Kode Buku</td>
						<td width="60">Jumlah</td>
						<td width="118">Tanggal Kembali</td>
						<td colspan="2">Aksi</td>
					</tr>
					<?php 					
					while ($rows = mysqli_fetch_array($tampil)) {
						?>
					<tr class="trbody">
						<td><?php echo $no++ ?></td>
						<td><?php echo $rows['tanggal_pinjam'];?></td>
						<td><?php echo $rows['mata_pelajaran']; ?></td>
						<td><?php echo $rows['kelas_semester'];?></td>
						<td><?php echo $rows['kode_buku'];?></td>
						<td><?php echo $rows['jumlah'];?></td>
						<td><input type="text" name="kembali" value="<?php echo $rows['tanggal_kembali'];?>"/></td>
						<td><a href="pinjam_paket">
  						<button  type="submit" name="Selesai">Selesai</button></a></td>
						 
						</tr>

	<?php } ?>
	</table>
	<div class="form-group">
	<a href="pengembalian_paket.php?id=<?php echo $rows['id_pinjam'];?>">
  <button class="btn-submit-input" type="submit" name="simpan">Simpan</button></a>
 </div>
	<?php } ?>

</div>
</body>
</html>
<?php 
if(!empty($_GET['id'])) {
$tanggal = date('d-M-y');
mysqli_query($koneksi,"UPDATE tbpinjam_paket SET tanggal_kembali='$tanggal' WHERE id_pinjam='$_GET[id]'");
echo "<script>
	document.location='pengembalian_paket.php'
	</script>";
	}
	?>