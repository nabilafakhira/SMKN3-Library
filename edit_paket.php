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
					$hasil2 = "SELECT * FROM tbpinjam_paket WHERE id_pinjam = '$_GET[id]'";
					$tampil=mysqli_query($koneksi,$hasil2) or die(mysqli_error($koneksi));
					$result = mysqli_fetch_array($tampil);
					$id = $_GET['id'];
		?>
					
					<div class="form-input-cari">
							 <form name="form1" method="post" action="">
				<div class="sidebar-judul">Edit Pinjam Buku Paket</div>
				<div class="form-group"><input type="text" style="cursor:default;" required autocomplete="off"  class="input-mode"  name="tanggal_pinjam" value="<?php echo $result['tanggal_pinjam'];?>" readonly="readonly"/></div>
				<div class="form-group">
				<select name="mata_pelajaran" class="input-mode" style="width: 100%;padding: 1px" style="cursor:default;" required autocomplete="off">
				<?php $mp = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbmata_pelajaran WHERE mata_pelajaran='$result[mata_pelajaran]'")); ?>
				<option value="<?php echo $result['mata_pelajaran'] ?>"><?php echo $mp['mata_pelajaran'] ?></option>
						<?php
						$query = mysqli_query($koneksi,"SELECT * FROM tbmata_pelajaran");
						while ($rows = mysqli_fetch_array($query)) {
							echo "<option style='color:#000000;' value='".$rows['mata_pelajaran']."'>".$rows['mata_pelajaran']."</option>";
							
						}
						?>

				
				<div class="form-group"><input type="text" required autocomplete="off"   class="input-mode"  placeholder="Masukan Kelas/Semester*" name="kelas_semester" value="<?php echo $result['kelas_semester'];?>"/></div>
				
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Kode Buku*" name="kode" value="<?php echo $result['kode_buku'];?>"/></div>
		  
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Jumlah Buku*" name="jumlah" value="<?php echo $result['jumlah'];?>" /></div>
		  
           <div class="form-group">
		    <a href="pinjam_paket.php">
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
	$tanggal_pinjam = $_POST['tanggal_pinjam'];
	$mapel = $_POST['mata_pelajaran'];
	$kelas_semester = $_POST['kelas_semester'];
	$kode = $_POST['kode'];
	$jumlah = $_POST['jumlah'];
	$query = mysqli_query($koneksi,"UPDATE tbpinjam_paket SET
		tanggal_pinjam = '$tanggal_pinjam',
		mata_pelajaran = '$mapel', 
		kelas_semester = '$kelas_semester', 
		kode_buku = '$kode', 
		jumlah = '$jumlah' 
		WHERE id_pinjam ='$id'");

	if($query){
		echo "<script>
		alert('Ubah Pinjam Paket Berhasil ...');
		document.location='pinjam_paket.php'
		</script>";
	} else {
		echo "<script>
		alert('Ubah Pinjam Paket Gagal ...');
		document.location='pinjam_paket.php'
		</script>";
		mysqli_error($koneksi);
	}
}
?>