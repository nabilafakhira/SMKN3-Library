<?php
	session_start();
	$koneksi=mysqli_connect("localhost","root","","perpustakaan");
	mysqli_select_db($koneksi,"perpustakaan");

	if(empty($_SESSION['admin'])){
		if(empty($_SESSION['username'])){
			echo "<script>document.location='login.php'</script>";
		}
	}
?>