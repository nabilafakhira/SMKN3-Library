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
  <div class="tampil-cari" style="margin-bottom:20px; margin-top:70px;">
  <div class="tampil-judul">Daftar Siswa </div>
	<div></div>
 <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
    <div class="cari">
      <form name="form2" method="post" action="cari_siswa.php">
        <input name="cari" type="text">
        <input name="search" type="submit" value="Search">

      </form>
</div>	
				  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td width="210">NISN</td>
                                        <td width="289">Nama Siswa</td>
										<td width="170">Angkatan</td>
										<td width="111" colspan="2">Aksi</td>
								  </tr>
	<?php
	$query = mysqli_query($koneksi,"SELECT * FROM tbsiswa ORDER BY nisn ASC");
	while ($rows = mysqli_fetch_array($query)) {
	?>
	<tr class="trbody">
		<td><?php echo $rows['nisn']; ?></td>
		<td><?php echo $rows['nama']; ?></td>
		<td><?php echo $rows['angkatan']; ?></td>
		<td>
		<form method="post" name="<?php echo $rows['nisn'] ?>">
			<input type="hidden" name="lvladmin" value="<?php echo $_SESSION['admin'] ?>">
			<input type="hidden" name="nisnsiswa" value="<?php echo $rows['nisn'] ?>">
			<input type="submit" name="liatdata" value="Lihat Data Siswa">
		</form>
		</td>
		<td>
		<a href="siswa_hapus.php?id=<?php echo $rows['id_siswa']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a>
		</td>
	</tr>
	<?php 
	}
	if(isset($_POST['liatdata'])){
		$_SESSION['admin'] = $_POST['lvladmin'];
		$_SESSION['username'] = $_POST['nisnsiswa'];
		echo "<script>document.location='index.php'</script>";
	}
	?>
    </table>
</div>
			<div class="footer">Copyright &copy; 2017<br>Created by NaTiSa</div>
</body>
</html>



