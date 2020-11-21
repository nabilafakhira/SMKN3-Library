<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Form Login</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form">
 <form method="post">
<h1 class="form-h1"><i class="fa-user"></i>Login</h1>
<h2 class="form-h2"><i class="fa-user"></i>Selamat Datang Kembali</h2>
 <div class="form-group">
  <input type="text" required autocomplete="off" class="input-mode" name="username" placeholder="Masukan Nama Sebagai Username*">
 </div>
 <div class="form-group">
 <input type="password" required autocomplete="off" class="input-mode" name="password" placeholder="Masukan NISN/NIP Sebagai Password*">
 </div>
 <br/>
 <div class="form-group">
  <button class="btn-submit" type="submit" name="login">Login</i></button>
  <br/>
  <a href="daftar_siswa.php" style="text-decoration:none;"><button class="btn-submit" type="button" name="daftarsiswa">Daftar Siswa</button></a>
  <br/>
  <a href="daftar_guru.php" style="text-decoration:none;"><button class="btn-submit" type="button" name="daftarguru">Daftar Guru</button></a> </div>
<br>
 </form>
</div>

 <!--Design By NATISA---->
</body>
</html>
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