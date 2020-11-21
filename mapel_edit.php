
    <div class="cari">
	<?php
$ubah = "SELECT * FROM tbmata_pelajaran WHERE id_mapel='$_GET[id]'";
$edit=mysqli_query($koneksi,$ubah) or die(mysqli_error($koneksi));
$query = mysqli_fetch_array($edit)
?>
	
      <form name="form2" method="post" action="" size="32">
        <input name="mapel" type="text" value="<?php echo $query['mata_pelajaran'] ?>">
        <input name="simpan" type="submit" value="Simpan">
<a href="mapel.php"><input name="kembali" type="button" value="Kembali"></a>
</form> 

    </div>
		<?php
		if(isset($_POST['simpan'])){
		$mapel = $_POST['mapel'];
			$query = mysqli_query($koneksi,"UPDATE tbmata_pelajaran SET mata_pelajaran = '$mapel' WHERE id_mapel ='$_GET[id]'");
			if($query){
		echo "<script>
		alert('Edit Mata Pelajaran Berhasil ...');
		document.location='mapel.php'
		</script>";
	} else {
		echo "<script>
		alert('Edit Mata Pelajaran Gagal ...');
		document.location='mapel.php'
		</script>";
		mysqli_error($koneksi);
	}
}
		?>
