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
  <div class="tampil-judul">Daftar Guru </div>
	<div></div>	
 <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
    <div class="cari">
      <form name="form2" method="post" action="cari_guru.php">
        <input name="cari" type="text">
        <input name="search" type="submit" value="Search">

      </form>
</div>	  
				  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td width="173">NIP</td>
                                        <td width="304">Nama Guru</td>
										<td width="199">Mapel Ajar</td>
										<td width="104" colspan="2">Aksi</td>
								  </tr>
	<?php
	$query = mysqli_query($koneksi,"SELECT * FROM tbguru ORDER BY nip ASC");
	while ($rows = mysqli_fetch_array($query)) {
	?>
	<tr class="trbody">
		<td><?php echo $rows['nip']; ?></td>
		<td><?php echo $rows['nama']; ?></td>
		<td><?php echo $rows['mapel_ajar']; ?></td>
		<td>
		<form method="post" name="<?php echo $rows['nip'] ?>">
			<input type="hidden" name="lvladmin" value="<?php echo $_SESSION['admin'] ?>">
			<input type="hidden" name="nipguru" value="<?php echo $rows['nip'] ?>">
			<input type="submit" name="liatdata" value="Lihat Data Guru">
		</form>
		</td>
		<td>
		<a href="guru_hapus.php?id=<?php echo $rows['id_guru']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a>
		</td>
	</tr>
	<?php 
	}
	if(isset($_POST['liatdata'])){
		$_SESSION['admin'] = $_POST['lvladmin'];
		$_SESSION['username'] = $_POST['nipguru'];
		echo "<script>document.location='index.php'</script>";
	}
	?>
    </table>
</div>
			<div class="footer">Copyright &copy; 2017<br>Created by NaTiSa</div>
</body>
</html>



