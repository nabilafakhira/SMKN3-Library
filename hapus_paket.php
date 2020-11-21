<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tbpinjam_paket WHERE id_pinjam='$id'");
?>
<script type="text/javascript">
	alert('Hapus berhasil ..');
	document.location='pinjam_paket.php'
</script>