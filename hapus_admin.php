<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tbuser WHERE id_user='$id'");
?>
<script type="text/javascript">
	alert('Hapus berhasil ..');
	document.location='tambah_admin.php'
</script>