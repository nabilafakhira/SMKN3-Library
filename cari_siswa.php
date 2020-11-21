<?php
include 'config.php';
?>
<?php
$colname_cari = "-1";
if (isset($_POST['cari'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['cari'] : addslashes($_POST['cari']);
}
$query_cari = sprintf("SELECT * FROM tbsiswa WHERE nisn LIKE '%%%s%%' ", $colname_cari);
$cari = mysqli_query($koneksi,$query_cari) or die(mysqli_error($koneksi));
$row_cari = mysqli_fetch_assoc($cari);
$totalRows_cari = mysqli_num_rows($cari);
$no = 1;
if($totalRows_cari == 0){
echo "<script>
		alert('Data tidak ditemukan');
		document.location='datasiswa.php'
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
    <p>Hasil Pencarian Data Siswa </p>
  </div> 
  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td width="210">NISN</td>
                                        <td width="289">Nama Siswa</td>
										<td width="170">Angkatan</td>
										<td width="111" colspan="2">Aksi</td>
								  </tr>
    <?php do { ?>
    <tr class="trbody">
	<td><?php echo $row_cari['nisn']; ?></td>
      <td><?php echo $row_cari['nama']; ?></td>
      <td><?php echo $row_cari['angkatan']; ?></td>
      <td>
		<form method="post" name="<?php echo $rows['nisn'] ?>">
			<input type="hidden" name="lvladmin" value="<?php echo $_SESSION['admin'] ?>">
			<input type="hidden" name="nisnsiswa" value="<?php echo $rows['nisn'] ?>">
			<input type="submit" name="liatdata" value="Lihat Data Siswa">
		</form>
		</td>
		<td>
		<a href="siswa_hapus.php?id=<?php echo $row_cari['id_siswa']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a>
		</td>
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

