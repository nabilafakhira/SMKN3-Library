<?php
session_start();
include 'koneksi.php';
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	mysqli_select_db($koneksi,"perpustakaan");
	$perintah = "SELECT * FROM tbuser WHERE username='$username' AND password='$password'";
	$query = mysqli_query($koneksi,$perintah);
	$rows = mysqli_num_rows($query);
	if($rows == 1){
		$data = mysqli_fetch_array($query);
		if($data['level'] != "admin"){
			$_SESSION['username'] = $data['username'];
			echo "<script>
		alert('Login Berhasil ...')
		document.location='gurusiswa.php'
		</script>";
		} else {
			$_SESSION['admin'] = $data['username'];
		}
		echo "<script>
		alert('Login Berhasil ...')
		document.location='gurusiswa.php'
		</script>";
	} else {
		echo "<script>
		alert('Username dan Password Salah...');
		document.location='login.html'
		</script>";
	}
}
?>