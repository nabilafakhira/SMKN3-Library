  	<a href="index.php" style="text-decoration:none;"><button type="submit"  class="menu">Home</button></a>
	<?php
	if(!empty($_SESSION['username'])){
	?>
	 <a href="pinjam_paket.php" style="text-decoration:none;"><button type="submit"  class="menu">Pinjam Buku Paket</button></a>
  	<a href="pinjam_nonpaket.php" style="text-decoration:none;"><button type="submit"  class="menu">Pinjam Buku Non-Paket</button></a>
 	<a href="profile_siswaguru.php" style="text-decoration:none;"><button type="submit"  class="menu">My Profile</button></a>
	<a href="<?php
				if(!empty($_SESSION['username'])){
					$query = mysqli_query($koneksi,"SELECT * FROM tbuser WHERE password ='$_SESSION[username]'");
					if(mysqli_num_rows($query) == 1){
					$data = mysqli_fetch_array($query);
					if($data['level'] != "guru"){
					 echo 'cetak_siswa.php';
					 } else {
					  echo 'cetak_guru.php';
					 }
		}
		}
				?>?id_print=print" target="_blank" style="text-decoration:none;"><button type="submit"  class="menu">Cetak</button></a>
	<?php } else { ?>
	<a href="mapel.php" style="text-decoration:none;"><button type="submit"  class="menu">Mapel</button></a>
	<a href="datasiswa.php" style="text-decoration:none;"><button type="submit"  class="menu">Data Siswa</button></a>
	<a href="dataguru.php" style="text-decoration:none;"><button type="submit"  class="menu">Data Guru</button></a>
	<a href="tambah_admin.php" style="text-decoration:none;"><button type="submit"  class="menu">Tambah Admin</button></a>
	<?php }
	if(!empty($_SESSION['admin'])){
		if(empty($_SESSION['username'])){
			?><a href="logout.php" style="text-decoration:none;"><button type="submit"  class="menu">Logout</button></a><?php
		} else {
			?><a href="back.php?id=<?php echo $_SESSION['admin'] ?>"style="text-decoration:none;"><button type="submit"  class="menu">Menu Admin</button></a><?php
		}
	} else {
		?><a href="logout.php" style="text-decoration:none;"><button type="submit"  class="menu">Logout</button></a><?php
	}
	?>