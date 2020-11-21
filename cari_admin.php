<?php
include 'config.php';
?>
<?php
$colname_cari = "-1";
if (isset($_POST['cari'])) {
  $colname_cari = (get_magic_quotes_gpc()) ? $_POST['cari'] : addslashes($_POST['cari']);
}
$query_cari = sprintf("SELECT * FROM tbuser WHERE username LIKE '%%%s%%' AND level='admin'", $colname_cari);
$cari = mysqli_query($koneksi, $query_cari) or die(mysqli_error($koneksi));
$row_cari = mysqli_fetch_assoc($cari);
$totalRows_cari = mysqli_num_rows($cari);
$no = 1;
if($totalRows_cari == 0){
echo "<script>
		alert('Data tidak ditemukan');
		document.location='tambah_admin.php'
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
  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td>No</td>
                                        <td>Username</td>
										<td>Password</td>
										<td colspan="2">Aksi</td>
                                  </tr>
    <?php do { ?>
    <tr class="trbody">
	<td><?php echo $no++; ?></td>
      <td><?php echo $row_cari['username']; ?></td>
      <td><?php echo $row_cari['password']; ?></td>
      <td width="37"><a href="edit_admin.php?id=<?php echo $row_cari['id_user']; ?>">
        <input type="submit" name="Submit" value="Edit" />
      </a></td>
      <td width="51"><div align="center"><a href="hapus_admin.php?id=<?php echo $row_cari['id_user']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a></div></td>
    </tr>
    <?php } while ($row_cari = mysqli_fetch_assoc($cari)); ?>
  </table>
  <?php
mysqli_free_result($cari);
?>
<div class="form-group">
<a href="tambah_admin.php" style="text-decoration:none;"><button class="btn-submit-reset" type="submit" name="kembali">Kembali</button></a>
</div>
</div>
</body>
</html>

