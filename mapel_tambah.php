 <div class="cari">
      <form name="form2" method="post" action="" size="32">
        <input name="mapel" type="text" required autocomplete="off">
        <input name="tambah" type="submit" value="Tambah">

      </form>
    </div>
		<?php
		if(isset($_POST['tambah'])){
		$mapel = $_POST['mapel'];
			$query = mysqli_query($koneksi,"INSERT INTO tbmata_pelajaran VALUES(NULL, '$mapel')");
			if($query){
		echo "<script>
		alert('Tambah Mata Pelajaran Berhasil ...');
		document.location='mapel.php'
		</script>";
	} else {
		echo "<script>
		alert('Tambah Mata Pelajaran Gagal ...');
		document.location='mapel.php'
		</script>";
		mysqli_error($koneksi);
	}
}
		?>
