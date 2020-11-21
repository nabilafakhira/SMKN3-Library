<?php require_once('koneksi.php'); ?>
<?php
if(isset($_POST['simpan'])){
	$user = $_POST['username'];
	$pass= $_POST['password'];
	mysqli_select_db($koneksi, "perpustakaan");
	$query = mysqli_query($koneksi,"INSERT INTO tbuser (username, password, level) VALUES ('$user', '$pass', 'admin')");
	if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'tambah_admin.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'tambah_admin.php'</script>";	
}
		}
?>