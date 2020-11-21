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
  <div class="tampil">
  <div class="tampil-judul">Daftar Admin</div>
	<div></div>			 
				  <p>
				    <?php
					$no = 1;
                    $query1="select * from tbuser where level='admin'";
                    $tampil=mysqli_query($koneksi,$query1) or die(mysqli_error($koneksi));
                    ?>
    </p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
    <div class="cari">
      <form name="form2" method="post" action="cari_admin.php">
        <input name="cari" type="text">
        <input name="search" type="submit" value="Search">

      </form>
    </div>
				  </p>
				  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td>No</td>
                                        <td>Username</td>
										<td>Password</td>
										<td colspan="2">Aksi</td>
                                  </tr>
                              
                                 <?php while($data=mysqli_fetch_array($tampil))
                    { ?>
                    <tr class="trbody">
					<td><?php echo $no++ ;?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo $data['password']; ?></td>
					<td width="37"><a href="edit_admin.php?id=<?php echo $data['id_user']; ?>">
        <input type="submit" name="Submit" value="Edit" />
      </a></td>
      <td width="51"><div align="center"><a href="hapus_admin.php?id=<?php echo $data['id_user']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a></div></td>
             
    </tr>
	<?php } ?>
	</table>
</div>

							<div class="form-input">
							 <form name="form1" method="post" action="aksi_tambah_admin.php">
				<div class="sidebar-judul">Input Admin</div>
				
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Username*" name="username" value=""/></div>
		  
          <div class="form-group"><input type="password" required autocomplete="off"  class="input-mode"  placeholder="Masukan Password*" name="password" value="" /></div>
           <div class="form-group">
		      <input class="btn-submit-reset" name="reset" type="reset" value="Reset" />
  <button class="btn-submit-input" type="submit" name="simpan">Simpan</button>

 </div>
      <input type="hidden" name="no" value="" />
    </form>
			</div>
			<div class="footer">Copyright &copy; 2017<br>Created by NaTiSa</div>
</body>
</html>



