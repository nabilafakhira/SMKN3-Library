<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Edit Pinjam Admin</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	include 'koneksi.php';
?>
		<?php
					$hasil2 = "SELECT * FROM tbuser WHERE id_user = '$_GET[id]'";
					$tampil=mysqli_query($koneksi,$hasil2) or die(mysqli_error($koneksi));
					$result = mysqli_fetch_array($tampil);
					$id = $_GET['id'];
		?>
					
					<div class="form-input-admin">
							 <form name="form1" method="post" action="">
				<div class="sidebar-judul">Edit Pinjam Admin</div>
				
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Username*" name="user" value="<?php echo $result['username'];?>"/></div>
		  
          <div class="form-group"><input type="password" required autocomplete="off"  class="input-mode"  placeholder="Masukan Password*" name="pass" value="<?php echo $result['password'];?>" /></div>
		  
           <div class="form-group">
		    <a href="tambah_admin.php">
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
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$query = mysqli_query($koneksi,"UPDATE tbuser SET
		username = '$user',
		password = '$pass'
		WHERE id_user ='$id'");

	if($query){
		echo "<script>
		alert('Ubah Data Admin Berhasil ...');
		document.location='tambah_admin.php'
		</script>";
	} else {
		echo "<script>
		alert('Ubah Data Admin Gagal ...');
		document.location='tambah_admin.php'
		</script>";
		mysqli_error($koneksi);
	}
}
?>