<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tbpengunjung WHERE id_pengunjung='$id'");
?>
<script type="text/javascript">
	alert('Hapus berhasil ..');
	document.location='index.php'
</script>