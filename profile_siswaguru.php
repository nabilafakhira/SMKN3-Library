<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
 <title>Perpustakaan SMK Negeri 3 Bogor</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="title">
    <p><img src="SMKN3.png" width="130" height="125" align="left">Perpustakaan </p>
    <p>SMK Negeri 3 Bogor</p>
  </div>
  <?php include 'menu.php'; ?>
  <div class="tampil-paket">
  <div class="tampil-judul">My Profile</div>
	<div></div>	
				<p>
				<?php
				if(!empty($_SESSION['username'])){
					$query = mysqli_query($koneksi,"SELECT * FROM tbuser WHERE password ='$_SESSION[username]'");
					$row=mysqli_num_rows($query);
					if($row == 1){
					$data = mysqli_fetch_array($query);
					if($data['level'] != "guru"){
					 include 'profile_siswa.php';
					 } else {
					  include 'profile_guru.php';
					 }
		}
		}
				?>	
<div class="footer">Copyright &copy; 2017<br>Created by NaTiSa</div>
</body>
</html>