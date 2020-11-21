<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Edit Pinjam Buku Paket</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	include 'koneksi.php';
?>
		<?php
					$hasil2 = "SELECT * FROM tbpengunjung WHERE id_pengunjung = '$_GET[id]'";
					$tampil=mysqli_query($koneksi,$hasil2) or die(mysqli_error($koneksi));
					$result = mysqli_fetch_array($tampil);
					$id = $_GET['id'];
		?>
					
					<div class="form-input-cari">
							 <form name="form1" method="post" action="">
				<div class="sidebar-judul">Edit Pinjam Buku Paket</div>
				
				<div class="form-group"><input type="text" required autocomplete="off"   class="input-mode"  placeholder="Masukan Nama*" name="nama" value="<?php echo $result['nama'];?>"/></div>
				
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan NISN/NIP*" name="nisn_nip" value="<?php echo $result['nisn_nip'];?>"/></div>
		  
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Kelas/Mata Pelajaran Ajar*" name="kelas_mapel_ajar" value="<?php echo $result['kelas_mapel_ajar'];?>"/></div>
		  
          <div class="form-group"><textarea class="input-mode" name="keperluan" required autocomplete="off" placeholder="Masukan Keperluan*"><?php echo $result['keperluan'];?></textarea></div>
		  
		  
           <div class="form-group">
		    <a href="index.php">
		      <input class="btn-submit-reset" name="kembali" type="button" value="Kembali" /></a>
  <button class="btn-submit-input" type="submit" name="edit">Simpan</button>
      <input type="hidden" name="no" value="" />
    </form>
			   </div>
			   </div>
</body>
</html>
<?php
if(isset($_POST['edit'])){
	$nama = $_POST['nama'];
	$nisnnip = $_POST['nisn_nip'];
	$mapel = $_POST['kelas_mapel_ajar'];
	$keperluan = $_POST['keperluan'];
	$query = mysqli_query($koneksi,"UPDATE tbpengunjung SET
		nama = '$nama',
		nisn_nip = '$nisnnip', 
		kelas_mapel_ajar = '$mapel', 
		keperluan = '$keperluan' 
		WHERE id_pengunjung ='$id'");

	if($query){
		echo "<script>
		alert('Ubah Data Pengunjug Berhasil ...');
		document.location='index.php'
		</script>";
	} else {
		echo "<script>
		alert('UbahData Pengunjug Gagal ...');
		document.location='index.php'
		</script>";
		mysqli_error($koneksi);
	}
}
?>