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
					$hasil2 = "SELECT * FROM tbpinjam_nonpaket WHERE id_pinjam = '$_GET[id]'";
					$tampil=mysqli_query($koneksi,$hasil2) or die(mysqli_error($koneksi));
					$result = mysqli_fetch_array($tampil);
					$id = $_GET['id'];
		?>
					
					<div class="form-input-cari">
							 <form name="form1" method="post" action="">
				<div class="sidebar-judul">Edit Pinjam Buku Paket</div>
				<div class="form-group"><input type="text" style="cursor:default;" required autocomplete="off"  class="input-mode"  name="tanggal_pinjam" value="<?php echo $result['tanggal_pinjam'];?>" readonly="readonly"/></div>
				<div class="form-group"><input type="text" required autocomplete="off"   class="input-mode"  placeholder="Masukan Kelas/Semester*" name="judul" value="<?php echo $result['judul_buku'];?>"/></div>
				
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Kode Buku*" name="kode" value="<?php echo $result['kode_buku'];?>"/></div>
		  
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Jumlah Buku*" name="jumlah" value="<?php echo $result['jumlah'];?>" /></div>
		  
           <div class="form-group">
		    <a href="pinjam_nonpaket.php">
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
	$judul = $_POST['judul'];
	$kode = $_POST['kode'];
	$jumlah = $_POST['jumlah'];
	$query = mysqli_query($koneksi,"UPDATE tbpinjam_nonpaket SET
		tanggal_pinjam = '$tanggal_pinjam',
		judul_buku = '$judul', 
		kode_buku = '$kode', 
		jumlah = '$jumlah' 
		WHERE id_pinjam ='$id'");

	if($query){
		echo "<script>
		alert('Ubah Pinjam NonPaket Berhasil ...');
		document.location='pinjam_nonpaket.php'
		</script>";
	} else {
		echo "<script>
		alert('Ubah Pinjam NonPaket Gagal ...');
		document.location='pinjam_nonpaket.php'
		</script>";
		mysqli_error($koneksi);
	}
}
?>