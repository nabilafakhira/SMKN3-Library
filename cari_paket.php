<?php
include 'config.php';
?>
<?php
$colname_cari = "-1";
if (isset($_POST['cari'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['cari'] : addslashes($_POST['cari']);
}
$query_cari = sprintf("SELECT * FROM tbpinjam_paket WHERE nisn_nip='$_SESSION[username]' AND mata_pelajaran LIKE '%%%s%%'", $colname_cari);
$cari = mysqli_query($koneksi,$query_cari) or die(mysqli_error($koneksi));
$row_cari = mysqli_fetch_assoc($cari);
$totalRows_cari = mysqli_num_rows($cari);
$no = 1;
if($totalRows_cari == 0){
echo "<script>
		alert('Data tidak ditemukan');
		document.location='pinjam_paket.php'
		</script>";
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head><title>Hasil Pencarian</title>
 <link rel="stylesheet" href="style.css">
</head>
<html>
<body>
<div class="tampil-cari">
  <div class="tampil-judul">
    <p>Hasil Pencarian Data Peminjaman Paket </p>
  </div>
  <table width="912" class="table">
    <tr class="trhead">
      <td width="30">No</td>
      <td width="134">Tanggal Pinjam</td>
      <td width="159">Mata Pelajaran</td>
      <td width="133">Kelas/Semester</td>
      <td width="110">Kode Buku</td>
      <td width="80">Jumlah</td>
      <td width="138">Tanggal Kembali</td>
      <td colspan="3">Aksi</td>
    </tr>
    <?php do { ?>
    <tr class="trbody">
      <td><?php echo $no++ ?></td>
      <td><?php echo $row_cari['tanggal_pinjam'];?></td>
      <td><?php echo $row_cari['mata_pelajaran']; ?></td>
      <td><?php echo $row_cari['kelas_semester'];?></td>
      <td><?php echo $row_cari['kode_buku'];?></td>
      <td><?php echo $row_cari['jumlah'];?></td>
      <td><?php echo $row_cari['tanggal_kembali'];?></td>
      <td width="37"><a href="edit_paket.php?id=<?php echo $row_cari['id_pinjam']; ?>">
        <input type="submit" name="edit" value="Edit" />
      </a></td>
      <?php
		if(!empty($_SESSION['admin'])){
		?>
      <td width="51"><div align="center"><a href="hapus_paket.php?id=<?php echo $row_cari['id_pinjam']; ?>">
        <input type="submit" name="Submit3" value="Hapus" />
      </a></div></td>
	  <td><a href="pinjam_paket.php?id=<?php echo $rows['id_pinjam'];?>">
  						<button type="submit" name="simpan">Cek</button></a></td>
      <?php } ?>
    </tr>
    <?php } while ($row_cari = mysqli_fetch_assoc($cari)); ?>
  </table>
  <?php
mysqli_free_result($cari);
?>
  <div class="form-group"> <a href="pinjam_paket.php" style="text-decoration:none;">
    <button class="btn-submit-reset" type="submit" name="kembali">Kembali</button>
  </a> </div>
</div>
<?php 
if(isset($_POST['edit'])){ ?>

<div class="form-input-cari">
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

<?php } ?>

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