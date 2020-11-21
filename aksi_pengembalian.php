<?php 
include 'koneksi.php';
if(!empty($_GET['id'])) {
$tanggal = date('d-M-y');
mysqli_query($koneksi,"UPDATE tbpinjam_paket SET tanggal_kembali='$tanggal' WHERE id_pinjam='$_GET[id]'");
echo "<script>
	document.location='pengembalian_paket.php'
	</script>";
	}
	?>