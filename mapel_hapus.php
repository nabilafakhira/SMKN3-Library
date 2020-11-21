<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tbmata_pelajaran WHERE id_mapel='$id'");
?>
<script type="text/javascript">
	alert('Hapus berhasil ..');
	document.location='mapel.php'
</script>