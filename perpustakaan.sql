-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2020 pada 12.22
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbguru`
--

CREATE TABLE `tbguru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `mapel_ajar` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbguru`
--

INSERT INTO `tbguru` (`id_guru`, `nip`, `nama`, `ttl`, `jenis_kelamin`, `mapel_ajar`, `alamat`, `no_telepon`) VALUES
(5, 332211, 'Salsa', '', '', 'IPA', '', 0),
(6, 777, 'nida', '', '', 'agama', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbmata_pelajaran`
--

CREATE TABLE `tbmata_pelajaran` (
  `id_mapel` int(50) NOT NULL,
  `mata_pelajaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbmata_pelajaran`
--

INSERT INTO `tbmata_pelajaran` (`id_mapel`, `mata_pelajaran`) VALUES
(1, 'Agama Islam'),
(2, 'Bahasa Indonesia'),
(3, 'Bahasa Inggris'),
(4, 'Bahasa Sunda'),
(5, 'Matematika'),
(6, 'Penjasorkes'),
(7, 'PKN'),
(8, 'PKWU'),
(9, 'Sejarah'),
(10, 'Seni Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengunjung`
--

CREATE TABLE `tbpengunjung` (
  `id_pengunjung` int(50) NOT NULL,
  `tanggal` text NOT NULL,
  `jam` time NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn_nip` varchar(50) NOT NULL,
  `kelas_mapel_ajar` varchar(50) NOT NULL,
  `keperluan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengunjung`
--

INSERT INTO `tbpengunjung` (`id_pengunjung`, `tanggal`, `jam`, `nama`, `nisn_nip`, `kelas_mapel_ajar`, `keperluan`) VALUES
(14, '16-Oct-17', '08:27:06', 'Salsabilla', '123', '12tkj2', 'Meminjam buku paket adser'),
(15, '16-Oct-17', '08:39:53', 'Tiara', '678', '12tkj2', 'Mencari buku novel'),
(16, '26-Oct-17', '13:01:45', 'dwi', '123', 'XII TKJ 1', 'baca'),
(17, '02-Nov-17', '14:46:36', 'Nabil', '111', '11tkj2', 'cari buku\r\n'),
(18, '16-Nov-17', '14:01:04', 'Sri Kartini', '234', '12tkj2', 'baca buku'),
(20, '25-Nov-17', '21:01:31', 'Nabila Fakhiratunisa', '23', '12TKJ2', 'baca buku'),
(21, '03-Jan-18', '21:19:59', 'Nur', '111222333', '12 tkj2', 'baca buku aja\r\n'),
(22, '03-Jan-18', '21:36:37', 'Salsa', '332211', 'Matematika', 'pinjam buku'),
(23, '12-Jun-20', '00:07:11', 'Ajeung', '444', '12 tkj 2', 'baca buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpinjam_nonpaket`
--

CREATE TABLE `tbpinjam_nonpaket` (
  `id_pinjam` int(50) NOT NULL,
  `nisn_nip` varchar(50) NOT NULL,
  `tanggal_pinjam` text NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `kode_buku` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tanggal_kembali` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpinjam_nonpaket`
--

INSERT INTO `tbpinjam_nonpaket` (`id_pinjam`, `nisn_nip`, `tanggal_pinjam`, `judul_buku`, `kode_buku`, `jumlah`, `tanggal_kembali`) VALUES
(1, '23', '27-Oct-17', 'AADC', 56, 1, '27-Oct-17'),
(3, '777', '02-Nov-17', 'Dilan', 123, 2, '09-Nov-17'),
(4, '123', '02-Nov-17', 'Dilan', 123, 1, ''),
(6, '23', '02-Nov-17', 'Dilan', 1, 1, '02-Nov-17'),
(7, '000', '09-Nov-17', 'Dialan', 111, 1, ''),
(8, '000', '09-Nov-17', 'gatau', 1, 1, ''),
(9, '23', '09-Nov-17', 'iyaa', 1, 1, '09-Nov-17'),
(10, '12345', '24-Nov-17', 'Dilan', 222, 1, '03-Jan-18'),
(11, '111222333', '03-Jan-18', 'Dia', 0, 1, ''),
(12, '332211', '03-Jan-18', 'gatau', 0, 1, '03-Jan-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpinjam_paket`
--

CREATE TABLE `tbpinjam_paket` (
  `id_pinjam` int(50) NOT NULL,
  `nisn_nip` varchar(50) NOT NULL,
  `tanggal_pinjam` text NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `kelas_semester` varchar(50) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tanggal_kembali` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpinjam_paket`
--

INSERT INTO `tbpinjam_paket` (`id_pinjam`, `nisn_nip`, `tanggal_pinjam`, `mata_pelajaran`, `kelas_semester`, `kode_buku`, `jumlah`, `tanggal_kembali`) VALUES
(1, '11', '26-Oct-17', 'PKN', '1', '1', 1, ''),
(2, '23', '27-Oct-17', 'Matematika', '12/2', '34', 1, '27-Oct-17'),
(4, '777', '02-Nov-17', 'Bahasa Inggris', '12 TKJ 2/2', '123', 10, '09-Nov-17'),
(5, '777', '02-Nov-17', 'Bahasa Indonesia', '12 TKJ 2', '123', 10, '09-Nov-17'),
(6, '123', '02-Nov-17', 'Bahasa Indonesia', '12 TKJ 2/2', '123', 1, ''),
(7, '23', '02-Nov-17', 'Bahasa Indonesia', '12/1', '1', 1, '02-Nov-17'),
(8, '567', '09-Nov-17', 'Agama Islam', '12/1', '000', 1, ''),
(10, '567', '09-Nov-17', 'Bahasa Sunda', '12/1', '001', 1, ''),
(11, '000', '09-Nov-17', 'Agama Islam', '11/1', '001', 1, ''),
(12, '000', '09-Nov-17', 'Bahasa Indonesia', '10/1', '009', 1, ''),
(13, '444', '16-Nov-17', 'Agama Islam', '12/1', '001', 1, '16-Nov-17'),
(14, '23', '16-Nov-17', 'Penjasorkes', '12/1', '009', 1, ''),
(15, '23', '16-Nov-17', 'Seni Budaya', '12/1', '222', 1, ''),
(16, '12345', '24-Nov-17', 'Bahasa Indonesia', '12/2', '345', 1, '26-Nov-17'),
(17, '111222333', '03-Jan-18', 'Matematika', '11/2', '009', 1, ''),
(18, '332211', '03-Jan-18', 'Bahasa Indonesia', '12/1', '0089', 2, '03-Jan-18'),
(19, 'Ajeung', '12-Jun-20', 'Penjasorkes', '12/2', '001', 2, ''),
(20, 'Nabila Fakhira', '19-Nov-20', 'Agama Islam', '10/1', '007', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `id_siswa` int(50) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `paket_keahlian` varchar(50) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbsiswa`
--

INSERT INTO `tbsiswa` (`id_siswa`, `nisn`, `nama`, `ttl`, `jenis_kelamin`, `paket_keahlian`, `angkatan`, `alamat`, `no_telepon`) VALUES
(8, 23, 'Nabila Fakhiratunisa', 'Bogor, 11 Juli 2000', 'Perempuan', 'TKJ', '10', 'Cibedug', '000999888777'),
(9, 777, 'Salsabilla Delyan', 'Bogor 11 April 2000', 'Perempuan', 'TKJ-2', '10', 'Ciper', '082299128148'),
(10, 111222333, 'Nur', '', '', 'TKJ', '11', '', ''),
(11, 118022, 'Merry', '', '', 'Perhotelan', '11', '', ''),
(12, 118123, 'nada', '', '', 'Jasa Boga', '15', '', ''),
(13, 118138, 'adit', '', '', 'rpl', '12', '', ''),
(14, 118138, 'adit', '', '', 'rpl', '12', '', ''),
(15, 118137, 'luthfi', '', '', 'rpl', '13', '', ''),
(16, 118135, 'Nabila Fakhira', '', '', 'TKJ', '11', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `username`, `password`, `level`) VALUES
(0, 'admin', 'admin', 'admin'),
(13, 'Nabila Fakhiratunisa', '123', 'siswa'),
(14, 'dwi', '123', 'siswa'),
(15, 'nabil', '11', 'siswa'),
(16, 'Nabila Fakhiratunisa', '23', 'siswa'),
(17, 'Salsabila', '111', 'guru'),
(18, 'Tiara', '222', 'guru'),
(19, 'Salsabilla Delyan', '777', 'siswa'),
(21, 'Ajeung', '444', 'guru'),
(22, 'Fakta', '111', 'admin'),
(23, 'Tiara', '567', 'siswa'),
(24, 'Tiara', '000', 'siswa'),
(25, 'Natisa', '202629', 'siswa'),
(26, 'Sri', '234', 'siswa'),
(27, 'Salsa', '12345', 'guru'),
(28, 'Nur', '111222333', 'siswa'),
(29, 'Salsa', '332211', 'guru'),
(30, 'Merry', '000118022', 'siswa'),
(31, 'nada', '118123', 'siswa'),
(32, 'nida', '777', 'guru'),
(33, 'adit', '118138', 'siswa'),
(35, 'luthfi', '118137', 'siswa'),
(36, 'Nabila Fakhira', '118135', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbguru`
--
ALTER TABLE `tbguru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbmata_pelajaran`
--
ALTER TABLE `tbmata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbpengunjung`
--
ALTER TABLE `tbpengunjung`
  ADD UNIQUE KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `tbpinjam_nonpaket`
--
ALTER TABLE `tbpinjam_nonpaket`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbpinjam_paket`
--
ALTER TABLE `tbpinjam_paket`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbguru`
--
ALTER TABLE `tbguru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbmata_pelajaran`
--
ALTER TABLE `tbmata_pelajaran`
  MODIFY `id_mapel` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbpengunjung`
--
ALTER TABLE `tbpengunjung`
  MODIFY `id_pengunjung` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbpinjam_nonpaket`
--
ALTER TABLE `tbpinjam_nonpaket`
  MODIFY `id_pinjam` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbpinjam_paket`
--
ALTER TABLE `tbpinjam_paket`
  MODIFY `id_pinjam` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
