<?php
if(!empty($_SESSION['username'])){
$query = mysqli_query($koneksi,"SELECT * FROM tbsiswa WHERE nisn ='$_GET[id]'");
$hasil = mysqli_fetch_array($query)
?>
<div class="form-group">
<form name="form1" method="post">
		  <div class="sidebar-judul">Edit Profile</div>
		  <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="nama" value="<?php echo $hasil['nama'];?>"/></div>
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="ttl" value="<?php echo $hasil['ttl'];?>"/></div>
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="jenis_kelamin" value="<?php echo $hasil['jenis_kelamin'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="peket_keahlian" value="<?php echo $hasil['paket_keahlian'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="angkatan" value="<?php echo $hasil['angkatan'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="alamat" value="<?php echo $hasil['alamat'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode" name="no_telepon" value="<?php echo $hasil['no_telepon'];?>" /></div>
		  
           <div class="form-group">
		      <input class="btn-submit-reset" name="reset" type="reset" value="Reset" />
			  <button class="btn-submit-input" type="submit" name="edit">Simpan</button>

 </div>
    </form>
</div>
<?php } ?>
	<?php
if(isset($_POST['edit'])){
	$nisn = $_SESSION['username'];
$cekdata = mysqli_query($koneksi,"SELECT * FROM tbsiswa WHERE nisn='$nisn'");
	if(mysqli_num_rows($cekdata) == 1){
	$nisn = $_SESSION['username'];
	$nama = $_POST['nama'];
	$ttl = $_POST['ttl'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$paket_keahlian = $_POST['paket_keahlian'];
	$angkatan = $_POST['angkatan'];
	$alamat = $_POST['alamat'];
	$no_telepon = $_POST['no_telepon'];
	$query = mysqli_query($koneksi,"UPDATE tbsiswa SET
		nisn = '$nisn',
		nama = '$nama', 
		ttl = '$ttl', 
		jenis_kelamin = '$jenis_kelamin', 
		paket_keahlian = '$paket_keahlian', 
		angkatan = '$angkatan', 
		alamat = '$alamat'
		no_telepon = '$no_telepon'
		WHERE nisn = '$nisn'");
		}

	if($query){
		echo "<script>
		alert('Ubah kegiatan berhasil ...');
		document.location='profile_siswa.php'
		</script>";
	} else {
		echo "<script>
		alert('Ubah kegiatan Gagal ...');
		</script>";
		mysqli_error($koneksi);
	}
}
?>
			