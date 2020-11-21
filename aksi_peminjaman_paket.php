<?php
include 'config.php';
?>
<?php
if(isset($_POST['simpan'])){
	$nis = $_SESSION['username'];
	$tanggal_pinjam = $_POST['tanggal_pinjam'];
	$mapel = $_POST['mata_pelajaran'];
	$kelas = $_POST['kelas_semester'];
	$kode = $_POST['kode'];
	$jumlah = $_POST['jumlah'];
	$query = mysqli_query($koneksi,"INSERT INTO tbpinjam_paket VALUES(NULL, '$nis', '$tanggal_pinjam', '$mapel', '$kelas', '$kode', '$jumlah', '')");

	if($query){
		echo "<script>
		alert('Peminjaman Berhasil ...');
		document.location='pinjam_paket.php'
		</script>";
	} else {
		echo "<script>
		alert('Peminjaman Gagal ...');
		document.location='pinjam_paket.php'
		</script>";
		mysqli_error($koneksi);
	}
}
?>