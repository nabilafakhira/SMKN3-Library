<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Perpustakaan SMK Negeri 3 Bogor</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="title">
    <p><img src="SMKN3.png" width="130" height="125" align="left">Perpustakaan </p>
    <p>SMK Negeri 3 Bogor</p>
  </div>
  <?php include 'menu.php'; ?>
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
					 					
			</p>				
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
    <div class="cari">
      <form name="form2" method="post" action="cari_paket.php">
        <input name="cari" type="text">
        <input name="search" style="text-decoration:none" type="submit" value="Search">
        <a href="pengembalian_paket.php"></a>
      </form>
    </div>
				<table width="850" class="table">
                        <tr class="trhead">
						<td width="24">No</td>
						<td width="105">Tanggal Pinjam</td>
						<td width="153">Mata Pelajaran</td>
						<td width="132">Kelas/Semester</td>
						<td width="125">Kode Buku</td>
						<td width="60">Jumlah</td>
						<td width="118">Tanggal Kembali</td>
						<td colspan="3">Aksi</td>
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
						<td><?php echo $rows['tanggal_kembali'];?></td>
						      <td width="37"><a href="edit_paket.php?id=<?php echo $rows['id_pinjam']; ?>">
        <input style="text-decoration:none" type="submit" name="edit" value="Edit" />
      </a></td>

	  	  <?php
		if(!empty($_SESSION['admin'])){
		?>
      <td width="51"><div align="center"><a href="hapus_paket.php?id=<?php echo $rows['id_pinjam']; ?>">
            <input style="text-decoration:none;" type="submit" name="Submit3" value="Hapus" />
        </a></div></td>
		<td><a href="pinjam_paket.php?id=<?php echo $rows['id_pinjam'];?>">
  						<button type="submit" style="text-decoration:none;" name="simpan">Cek</button></a></td>
				<?php } ?>
	<?php } ?>
	</table>
	<?php } ?>

</div>
				 
							<div class="form-input-paket">
							 <form name="form1" method="post" action="aksi_peminjaman_paket.php">
				<div class="sidebar-judul">Input Pinjam Buku Paket</div>
				<div class="form-group"><input type="text" style="cursor:default;" required autocomplete="off"  class="input-mode"  name="tanggal_pinjam" value="<?php $tgl=date('d-M-y'); echo $tgl; ?>" readonly="readonly"/></div>
				
				<div class="form-group"><select name="mata_pelajaran" class="input-mode" style="width: 100%;padding: 1px" style="cursor:default;" required autocomplete="off">
						<option value="" disabled selected> Pilih Mata Pelajaran*</option>
						<?php
						$query = mysqli_query($koneksi,"SELECT * FROM tbmata_pelajaran");
						while ($rows = mysqli_fetch_array($query)) {
							echo "<option style='color:#000000;' value='".$rows['mata_pelajaran']."'>".$rows['mata_pelajaran']."</option>";
							
						}
						?>
						</select>
						</div>
				
				<div class="form-group"><input type="text" required autocomplete="off"   class="input-mode"  placeholder="Masukan Kelas/Semester*" name="kelas_semester" value=""/></div>
				
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Kode Buku*" name="kode" value=""/></div>
		  
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Jumlah Buku*" name="jumlah" value="" /></div>
		  
           <div class="form-group">
		      <input class="btn-submit-reset" name="reset" type="reset" value="Reset" />
  <button class="btn-submit-input" type="submit" name="simpan">Simpan</button>

 </div>
      <input type="hidden" name="no" value="" />
    </form>
			</div>
<div class="footer">Copyright &copy; 2017<br>Created by NaTiSa</div>
</body>
</html>
	<?php 
if(!empty($_GET['id'])) {
$tanggal = date('d-M-y');
mysqli_query($koneksi,"UPDATE tbpinjam_paket SET tanggal_kembali='$tanggal' WHERE id_pinjam='$_GET[id]'");
echo "<script>
	document.location='pinjam_paket.php'
	</script>";
	}
	?>					