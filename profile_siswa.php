<?php
	include 'koneksi.php';
if(!empty($_SESSION['username'])){
		?>
		<?php
					$hasil2 = "SELECT * FROM tbsiswa WHERE nisn = '$_SESSION[username]'";
					$tampil=mysqli_query($koneksi,$hasil2) or die(mysqli_error($koneksi))
					?>
					<?php				
					while ($rows = mysqli_fetch_array($tampil)) {
					?>
					 					
			</p>				
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
				<table width="714" class="table">
						<tr>
						<td class="trhead-profile" width="248">NISN</td>
						<td width="521" class="trbody-profile" ><?php echo $rows['nisn'];?></td>
				  		</tr>
                        <tr>
						<td class="trhead-profile" width="248">Nama</td>
						<td width="521" class="trbody-profile" ><?php echo $rows['nama'];?></td>
						</tr>
						<tr>
						<td  class="trhead-profile"width="248">Tempat Tanggal Lahir</td>
						<td class="trbody-profile"><?php echo $rows['ttl'];?></td>
						</tr>
						<tr>
						<td class="trhead-profile" width="248">Jenis Kelamin</td>
						<td class="trbody-profile"><?php echo $rows['jenis_kelamin'];?></td>
						</tr>
						<tr>
						<td class="trhead-profile" width="248">Paket Keahlian</td>
						<td class="trbody-profile"><?php echo $rows['paket_keahlian'];?></td>
						</tr>
						<tr>
						<td class="trhead-profile" width="248">Angkatan</td>
						<td class="trbody-profile"><?php echo $rows['angkatan'];?></td>
						</tr>
						<tr>
						<td class="trhead-profile" width="248">Alamat</td>
						<td class="trbody-profile"><?php echo $rows['alamat'];?></td>
						</tr>
						<tr>
						<td class="trhead-profile" width="248">No Telepon</td>
						<td class="trbody-profile"><?php echo $rows['no_telepon'];?></td>
						</tr>
						
	<?php } ?>
	</table>
	<?php } ?>
	</div>
				 
							<div class="form-input-paket">
<form name="form1" method="post" action="">
		  <div class="sidebar-judul">Edit Profile</div>
<?php

					$result = "SELECT * FROM tbsiswa WHERE nisn = '$_SESSION[username]'";
					$tampil1=mysqli_query($koneksi,$result) or die(mysqli_error($koneksi));
					$hasil = mysqli_fetch_array($tampil1);
					?>
		  <div class="form-group"><input type="text" style="cursor:default;" required autocomplete="off" placeholder="Masukan NISN*" class="input-mode"  name="nisn" value="<?php echo $hasil['nisn'];?>" readonly="readonly"/></div>
		  <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan Nama*" class="input-mode" name="nama" value="<?php echo $hasil['nama'];?>"/></div>
          <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan Tempat Tanggal Lahir*" class="input-mode" name="ttl" value="<?php echo $hasil['ttl'];?>"/></div>
          <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan Jenis Kelamin*" class="input-mode" name="jenis_kelamin" value="<?php echo $hasil['jenis_kelamin'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan Paket Keahlian*" class="input-mode" name="paket_keahlian" value="<?php echo $hasil['paket_keahlian'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan Angkatan*" class="input-mode" name="angkatan" value="<?php echo $hasil['angkatan'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan Alamat*" class="input-mode" name="alamat" value="<?php echo $hasil['alamat'];?>" /></div>
		  <div class="form-group"><input type="text" required autocomplete="off" placeholder="Masukan No Telepon*" class="input-mode" name="no_telepon" value="<?php echo $hasil['no_telepon'];?>" /></div>
		  
           <div class="form-group"><button class="btn-submit-input" type="submit" name="edit">Simpan</button></div>
    </form>
			</div>
	<?php
if(isset($_POST['edit'])){
	$nisn = $_SESSION['username'];
$cekdata = mysqli_query($koneksi,"SELECT * FROM tbsiswa WHERE nisn='$nisn'");
	if(mysqli_num_rows($cekdata) == 1){
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
		alamat = '$alamat',
		no_telepon = '$no_telepon'
		WHERE nisn = '$nisn'");
		}

	if($query){
		echo "<script>
		alert('Ubah Profile Berhasil ...');
		document.location='profile_siswaguru.php'
		</script>";
	} else {
		echo "<script>
		alert('Ubah Profile Berhasil ...');
		</script>";
		mysqli_error($koneksi);
	}
}
?>
	