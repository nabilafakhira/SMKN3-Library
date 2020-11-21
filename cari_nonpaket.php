<?php
include 'config.php';
?>
<?php
$colname_cari = "-1";
if (isset($_POST['cari'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['cari'] : addslashes($_POST['cari']);
}
$query_cari = sprintf("SELECT * FROM tbpinjam_nonpaket WHERE nisn_nip='$_SESSION[username]' AND judul_buku LIKE '%%%s%%'", $colname_cari);
$cari = mysqli_query($koneksi,$query_cari) or die(mysqli_error($koneksi));
$row_cari = mysqli_fetch_assoc($cari);
$totalRows_cari = mysqli_num_rows($cari);
$no = 1;
if($totalRows_cari == 0){
echo "<script>
		alert('Data tidak ditemukan');
		document.location='pinjam_nonpaket.php'
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
  <table width="940" class="table">
                        <tr class="trhead">
						<td width="24">No</td>
						<td width="131">Tanggal Pinjam</td>
						<td width="211">Judul Buku</td>
						<td width="110">Kode Buku</td>
						<td width="91">Jumlah</td>
						<td width="214">Tanggal Kembali</td>
						<td colspan="3">Aksi</td>
					</tr>
    <?php do { ?>
    				<tr class="trbody">
						<td><?php echo $no++ ?></td>
						<td><?php echo $row_cari['tanggal_pinjam'];?></td>
						<td><?php echo $row_cari['judul_buku']; ?></td>
						<td><?php echo $row_cari['kode_buku'];?></td>
						<td><?php echo $row_cari['jumlah'];?></td>
						<td><?php echo $row_cari['tanggal_kembali'];?></td>
      <td width="37"><a href="edit_nonpaket.php?id=<?php echo $row_cari['id_pinjam']; ?>">
        <button type="submit" name="edit">Edit</button>
      </a></td>
	  	  <?php
		if(!empty($_SESSION['admin'])){
		?>
      <td width="51"><div align="center"><a href="hapus_nonpaket.php?id=<?php echo $row_cari['id_pinjam']; ?>">
            <button type="submit" name="hapus">Hapus</button>
        </a></div></td>
		<td width="31"><a href="pinjam_nonpaket.php?id=<?php echo $rows_cari['id_pinjam'];?>">
					  <button type="submit" name="simpan">Cek</button></a></td>
				<?php } ?>
    </tr>
    <?php } while ($row_cari = mysqli_fetch_assoc($cari)); ?>
  </table>
  <?php
mysqli_free_result($cari);
?>
<div class="form-group">
<a href="pinjam_paket.php" style="text-decoration:none;"><button class="btn-submit-reset" type="submit" name="kembali">Kembali</button></a>
</div>
</div>
</body>
</html>

<?php 
if(!empty($_GET['id'])) {
$tanggal = date('d-M-y');
mysqli_query($koneksi,"UPDATE tbpinjam_nonpaket SET tanggal_kembali='$tanggal' WHERE id_pinjam='$_GET[id]'");
echo "<script>
	document.location='pinjam_nopaket.php'
	</script>";
	}
	?>		