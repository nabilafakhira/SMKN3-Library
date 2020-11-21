<?php
include 'config.php';
?>
<?php
$colname_cari = "-1";
if (isset($_POST['cari'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['cari'] : addslashes($_POST['cari']);
}
$query_cari = sprintf("SELECT * FROM tbguru WHERE nip LIKE '%%%s%%' ", $colname_cari);
$cari = mysqli_query($koneksi,$query_cari) or die(mysqli_error($koneksi));
$row_cari = mysqli_fetch_assoc($cari);
$totalRows_cari = mysqli_num_rows($cari);
$no = 1;
if($totalRows_cari == 0){
echo "<script>
		alert('Data tidak ditemukan');
		document.location='dataguru.php'
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
    <p>Hasil Pencarian Data Guru </p>
  </div> 
  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td width="173">NIP</td>
                                        <td width="304">Nama Guru</td>
										<td width="199">Mapel Ajar</td>
										<td width="104" colspan="2">Aksi</td>
								  </tr>
    <?php do { ?>
    <tr class="trbody">
	<td><?php echo $row_cari['nip']; ?></td>
      <td><?php echo $row_cari['nama']; ?></td>
      <td><?php echo $row_cari['mapel_ajar']; ?></td>
      <td>
		<form method="post" name="<?php echo $rows['nip'] ?>">
			<input type="hidden" name="lvladmin" value="<?php echo $_SESSION['admin'] ?>">
			<input type="hidden" name="nipguru" value="<?php echo $rows['nip'] ?>">
			<input type="submit" name="liatdata" value="Lihat Data Guru">
		</form>
		</td>
		<td>
		<a href="guru_hapus.php?id=<?php echo $row_cari['id_guru']; ?>">
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

