<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Form Pendaftaran</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form">
 <form action="aksi_daftar_guru.php" method="post">
<h1 class="form-h1"><i class="fa-user"></i>Daftar Guru</h1>
<h2 class="form-h2"><i class="fa-user"></i>Isikan Data Berikut Dengan Benar</h2>
 <div class="form-group">
  <input type="text" required autocomplete="off" class="input-mode" name="username" placeholder="Nama*">
 </div>
 <div class="form-group">
 <input type="text" required autocomplete="off" class="input-mode" name="mapel" placeholder="Mata Pelajaran yang Diajar*">
 </div>
 <div class="form-group">
 <input type="password" required autocomplete="off" class="input-mode" name="password" placeholder="NIP*">
 </div>
  <br/>
 <div class="form-group">
  <button class="btn-submit" type="submit" name="daftar">Daftar</button>
    <br/>
  <a href="login.php" style="text-decoration:none;"><button class="btn-submit" type="button" name="back">Kembali</button></a>
 </div>
 <br/>

 </form>
</div>
 <!--Design By NATISA---->
</body>
</html>