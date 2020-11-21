<?php
//Pengenalan database
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksi = "localhost";
$database_koneksi = "perpustakaan";
$username_koneksi = "root";
$password_koneksi = "";
//Koneksi database
$koneksi = mysqli_connect($hostname_koneksi, $username_koneksi, $password_koneksi, $database_koneksi);

if(mysqli_connect_errno()){
    echo "koneksi gagal : " . mysqli_connect_error();
}
?>