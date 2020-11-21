<?php
include 'config.php';
?>
<?php
$colname_cari = "-1";
if (isset($_POST['cari'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['cari'] : addslashes($_POST['cari']);
}
$query_cari = sprintf("SELECT * FROM tbpengunjung WHERE nama LIKE '%%%s%%'", $colname_cari);
$cari = mysqli_query($koneksi,$query_cari) or die(mysqli_error($koneksi));
$row_cari = mysqli_fetch_assoc($cari);
$totalRows_cari = mysqli_num_rows($cari);
$no = 1;
if($totalRows_cari == 0){
echo "<script>
		alert('Data tidak ditemukan');
		document.location='gurusiswa.php'
		</script>";
}
?>
<html>
<head>
<title>Hasil Pencarian</title>
 <link rel="stylesheet" href="style.css">
</head>
<html>
<body>
<div class="tampil-cari">
  <div class="tampil-judul">
    <p>Hasil Pencarian Pengunjung </p>
  </div> 
  <table width="980" border="0" class="table">
    <tr class="trhead">
	<td width="35">No</td>
      <td width="94">Tanggal</td>
      <td width="77">Jam</td>
      <td width="143">Nama</td>
      <td width="126">NISN/NIP</td>
      <td width="168">Kelas/Mata Pelajaran Ajar</td>
      <td width="211">keperluan</td>
      <td colspan="2">Aksi</td>
    </tr>
    <?php do { ?>
    <tr class="trbody">
	<td><?php echo $no++; ?></td>
      <td><?php echo $row_cari['tanggal']; ?></td>
      <td><?php echo $row_cari['jam']; ?></td>
      <td><?php echo $row_cari['nama']; ?></td>
      <td><?php echo $row_cari['nisn_nip']; ?></td>
      <td><?php echo $row_cari['kelas_mapel_ajar']; ?></td>
      <td><?php echo $row_cari['keperluan']; ?></td>
	  <?php
		if(!empty($_SESSION['admin'])){
		?>
      <td width="37"><a href="edit_pengunjung.php?id=<?php echo $row_cari['id_pengunjung']; ?>">
        <input type="submit" name="Submit" value="Edit" />
      </a></td>
	  	  
      <td width="51"><div align="center"><a href="hapus_pengunjung.php?id=<?php echo $row_cari['id_pengunjung']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a></div></td>
				<?php } else { ?>
				<td>Tidak Tersedia</td>
				<?php } ?>
    </tr>
    <?php } while ($row_cari = mysqli_fetch_assoc($cari)); ?>
  </table>
  <?php
mysqli_free_result($cari);
?>
<div class="form-group">
<a href="index.php" style="text-decoration:none;"><button class="btn-submit-reset" type="submit" name="kembali">Kembali</button></a>
</div>
</div>
</body>
</html>

