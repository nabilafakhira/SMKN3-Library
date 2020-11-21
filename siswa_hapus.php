<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tbsiswa WHERE id_siswa='$id'");
?>
<script type="text/javascript">
	alert('Hapus berhasil ..');
	document.location='datasiswa.php'
</script>