<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Perpustakaan SMK Negeri 3 Bogor</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="title">
    <p><img src="SMKN3.png" width="130" height="125" align="left">Perpustakaan </p>
    <p>SMK Negeri 3 Bogor</p>
  </div>
  <?php include 'menu.php'; ?>
  <div class="tampil-cari" style="margin-bottom:20px; margin-top:70px;">
  <div class="tampil-judul">Daftar Mata Pelajaran </div>
	<div></div>			 
				  <p>
				    <?php
					$no = 1;
                    $query1="select * from tbmata_pelajaran";
                    $tampil=mysqli_query($koneksi,$query1) or die(mysqli_error($koneksi));
                    ?>
	<p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
      <?php
					if(empty($_GET['id'])){
						include 'mapel_tambah.php';
					} else {
						include 'mapel_edit.php';
					}
				?>
  
				  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td width="115">No</td>
                                        <td width="576">Mata Pelajaran</td>
										<td colspan="2">Aksi</td>
								  </tr>
                              
                                 <?php while($data=mysqli_fetch_array($tampil))
                    { ?>
                    <tr class="trbody">
					<td><?php echo $no++;?></td>
                    <td><?php echo $data['mata_pelajaran'];?></td>
					<td width="38"><a href="mapel.php?id=<?php echo $data['id_mapel']; ?>">
        <input type="submit" name="edit" value="Edit" />
      </a></td>
      <td width="51"><div align="center"><a href="mapel_hapus.php?id=<?php echo $data['id_mapel']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a></div></td>           
    </tr>
	<?php } ?></table>
</div>
			<div class="footer">Copyright &copy; 2017<br>Created by NaTiSa</div>
</body>
</html>



