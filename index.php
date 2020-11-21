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
  <div class="tampil-judul">Daftar Pengunjung</div>
	<div></div>			 
				  <p>
				    <?php
                    $tanggal = date('d-M-y');
                    $query1="select * from tbpengunjung where tanggal='$tanggal'";
                    $tampil=mysqli_query($koneksi,$query1);
                    ?>
    </p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
    <div class="cari">
      <form name="form2" method="post" action="cari.php">
        <input name="cari" type="text">
        <input name="search" type="submit" value="Search">

      </form>
    </div>
				  </p>
				  <table width="800" class="table">
                                    <tr class="trhead">
                                        <td width="88">Tanggal</td>
                                        <td width="116">Jam Berkunjung </td>
										<td width="244">Nama</td>
                                        <td width="236">Keperluan</td>
										<td colspan="2">Aksi</td>
                                  </tr>
                              
                                 <?php while($data=mysqli_fetch_array($tampil))
                    { ?>
                    <tr class="trbody">
					<td><?php echo $data['tanggal'];?></td>
                    <td><?php echo $data['jam'];?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['keperluan'];?></td>
						  	  <?php
		if(!empty($_SESSION['admin'])){
		?>
					<td width="37"><a href="edit_pengunjung.php?id=<?php echo $data['id_pengunjung']; ?>">
        <input type="submit" name="Submit" value="Edit" />
      </a></td>

      <td width="51"><div align="center"><a href="hapus_pengunjung.php?id=<?php echo $data['id_pengunjung']; ?>">
            <input type="submit" name="Submit3" value="Hapus" />
        </a></div></td>
				<?php } else { ?>
				<td>Tidak Tersedia</td>
				<?php } ?>
					</tr>
                    <?php   
              } 
              ?>
             
    </tr></table>
                    <?php $tampil=mysqli_query($koneksi,"select * from tbpengunjung where tanggal='$tanggal'");
                          $user=mysqli_num_rows($tampil);
                    ?>
                  <center><h4>Jumlah Pengunjung Hari Ini : <?php echo "$user"; ?> Orang </h4> </center>
</div>
              </section>
							<div class="form-input">
							 <form name="form1" method="post" action="aksi_input_pengunjung.php">
				<div class="sidebar-judul">Input Data Pengunjung</div>
				<div class="form-group"><input type="text" style="cursor:default;" required autocomplete="off"  class="input-mode"  name="tanggal" value="<?php $tgl=date('d-M-y'); echo $tgl; ?>" readonly="readonly"/></div>
				
				<div class="form-group"><input type="text" style="cursor:default;" required autocomplete="off"  class="input-mode"   name="jam" value="<?php date_default_timezone_set("Asia/Jakarta"); $wkt=date('H:i:s'); echo $wkt;?>" readonly="readonly"/></div>
				
				<div class="form-group"><input type="text" required autocomplete="off"   class="input-mode"  placeholder="Masukan Nama*" name="nama" value=""/></div>
				
          <div class="form-group"><input type="password" required autocomplete="off"  class="input-mode"  placeholder="Masukan NISN/NIP*" name="nisn_nip" value=""/></div>
		  
          <div class="form-group"><input type="text" required autocomplete="off"  class="input-mode"  placeholder="Masukan Kelas/Mata Pelajaran Ajar*" name="kelas_mapel_ajar" value="" /></div>
		  
          <div class="form-group"><textarea class="input-mode" name="keperluan" required autocomplete="off" placeholder="Masukan Keperluan*"></textarea></div>
		  
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



