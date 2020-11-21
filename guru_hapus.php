<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM tbguru WHERE id_guru='$id'");
?>
<script type="text/javascript">
	alert('Hapus berhasil ..');
	document.location='dataguru.php'
</script>