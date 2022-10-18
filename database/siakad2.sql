-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2022 pada 06.46
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `kode_dosen` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `nama_dosen` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `nip` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`kode_dosen`, `nama_dosen`, `telpon`, `email`, `alamat`, `foto`, `nip`) VALUES
('D010', 'Novia', '081351322369', 'novia12@gmail.com', 'Jl.gurame', 'download (3).jpg', '123456789'),
('D008', 'SEPRIANTO,ST', '081346239783', 'sepri7980@gmail.com', 'jl. kaja no 05', 'download (1).png', '-'),
('D009', 'FRISNANDO,ST', '081351322369', 'admin@admin.com', 'Jl. Tingang', 'IMG_8212.jpg', '-'),
('D011', 'Alfrid Sentosa,SH.,MH', '081351322369', 'alfrid@admin.com', 'jl.simpei karuhai 2', 'NEFCREVFRjgtMEMzMi00MDBELTgwQUUtNjIzRkFFOTgzRDk1.jpg', '2147483647'),
('D012', 'Tutik Haryani,SS.,M.Pd.,B.I', '1234567789', 'tutikharyani21@gmail.com', 'Jl. Rajawali', 'download.jpg', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(9) NOT NULL,
  `kode_mk` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kode_ruang` int(5) NOT NULL,
  `hari` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kode_dosen` varchar(8) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `kode_mk`, `kode_ruang`, `hari`, `jam_mulai`, `jam_selesai`, `kode_dosen`) VALUES
(72, '123PGRI', 11, 'Rabu', '17:06:00', '19:06:00', 'D008'),
(71, 'M004', 1, 'Kamis', '20:03:00', '22:03:00', 'D009'),
(70, 'UNIV103', 15, 'Sabtu', '22:45:00', '23:45:00', 'D010'),
(74, 'M006', 14, 'Jumat', '00:51:00', '01:51:00', 'D010'),
(75, 'PGRI01', 11, 'Kamis', '12:14:00', '14:15:00', 'D011'),
(73, 'M005', 14, 'Kamis', '00:29:00', '01:29:00', 'D011'),
(69, 'UNIV1201', 15, 'Jumat', '21:45:00', '22:45:00', 'D012'),
(68, 'POL201', 14, 'Senin', '13:42:00', '14:45:00', 'D011'),
(66, 'POL202', 11, 'Rabu', '16:24:00', '17:30:00', 'D009'),
(65, 'M002', 2, 'Selasa', '20:30:00', '22:30:00', 'D008'),
(67, 'UNIV105', 14, 'Kamis', '12:30:00', '14:30:00', 'D011'),
(64, 'M001', 1, 'Senin', '21:30:00', '22:50:00', 'D010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_jurusan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `fakultas` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `fakultas`) VALUES
(2, 'SI', 'Sosiologi', 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK'),
(4, 'MI', 'Ilmu Politik', 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_khs`
--

CREATE TABLE `tb_khs` (
  `nim` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `kode_mk` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nilai` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krs`
--

CREATE TABLE `tb_krs` (
  `kode` int(9) NOT NULL,
  `kode_mk` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nim` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `kode_jurusan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `status_nilai` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_krs`
--

INSERT INTO `tb_krs` (`kode`, `kode_mk`, `nim`, `kode_jurusan`, `status_nilai`) VALUES
(127, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(126, 'UNIV', 'DBC116081 ', 'MI', '1'),
(125, 'UNIV', 'DBC116081 ', 'MI', '1'),
(124, 'UNIV', 'DBC116081 ', 'MI', '1'),
(123, 'UNIV', 'DBC116081 ', 'MI', '1'),
(122, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(121, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(120, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(119, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(118, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(117, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(116, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(115, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(114, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(113, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(112, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(111, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(110, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(105, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(106, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(103, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(101, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(108, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(99, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(107, 'M002', 'DBC116081 ', 'Ilmu', '1'),
(97, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(96, 'M002', 'DBC116081 ', 'Ilmu', '1'),
(95, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(109, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(148, 'PGRI', 'DBC116081 ', 'Ilmu', '1'),
(90, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(128, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(129, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(130, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(131, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(132, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(133, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(137, 'POL2', 'DBC116081 ', 'Ilmu', '1'),
(139, '123P', 'DBC116081 ', 'Ilmu', '1'),
(136, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(138, '123P', 'DBC116081 ', 'Ilmu', '1'),
(140, '123P', 'DBC116081 ', 'Ilmu', '1'),
(141, 'M004', 'DBC116081 ', 'Ilmu', '1'),
(143, 'M005', 'DBC116081 ', 'Ilmu', '1'),
(144, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(145, 'UNIV', 'DBC116081 ', 'Ilmu', '1'),
(147, 'M006', 'DBC116081 ', 'Ilmu', '1'),
(149, 'UNIV105', 'DBC116081 ', 'Ilmu', '1'),
(150, 'M005', 'DBC116081 ', 'Ilmu', '1'),
(151, 'POL201', 'DBC116081 ', 'Ilmu', '1'),
(152, 'POL202', 'DBC116081 ', 'Ilmu', '1'),
(153, 'PGRI01', 'DBC116081 ', 'Ilmu Politik', '1'),
(154, 'M005', 'DBC116081 ', 'Ilmu Politik', '1'),
(155, 'POL202', 'DBC116081 ', 'Ilmu Politik', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `kode_jurusan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `smester` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status_krs` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_jurusan`, `smester`, `jenis_kelamin`, `email`, `telpon`, `foto`, `status_krs`) VALUES
('1130028', 'Parman', 'Blora', '1988-02-03', 'Blora Jaya Mustika Indonesia Raya', 'TI', '2', 'L', 'parmanp79@gmail.com', '085781480396', 'parman1.jpg', '0'),
('1120025', 'Fitri Handayani', 'Jakarta ', '1994-04-22', 'Cilandak Jakarta Selatan ', 'TI', '2', 'P', 'fitrihandayani@gmail.com', '085781480396', 'WhatsApp+Image+2022-02-09+at+22.01.51.jpeg.jpg', '0'),
('1130001', 'agustinus', 'Jakarta', '1989-03-15', 'Jakarta', 'SI', '1', 'L', 'agustinus@gmail.com', '085781480396', 'parman.jpg', '0'),
('1130002', 'Ayu Selvia ', 'Jakarta', '1996-07-17', 'Jakarta', 'SI', '1', 'P', 'ayuselvia@gmail.com', '085781480396', 'model inggris.jpg', '1'),
('1130003', 'Budi', 'Jakarta', '1996-11-19', 'Jakarta Selatan', 'MI', '1', 'L', 'budi@gmail.com', '085781480396', 'WhatsApp Image 2022-02-09 at 22.01.51 (1).jpeg', '0'),
('1130004', 'Dedi', 'Jakarta', '2001-02-06', 'Jakarta', 'SI', '1', 'L', 'dedi@gmail.com', '085781480396', 'parman.jpg', '1'),
('DBC116081', 'FRISNANDO', 'Tumbang Kunyi', '1997-03-26', 'jl.Simpei', 'MI', '1', 'L', 'frisnando34@gmail.com', '081351322369', 'Screenshot 2022-10-08 193926.png', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_mk` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_mk` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `sks` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `smester` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_mk`, `nama_mk`, `sks`, `smester`) VALUES
('UNIV103', 'Pendidikan Kewarganegaraan', '2', '1'),
('POL201', 'Pengantar Ilmu Politik', '3', '1'),
('POL202', 'Pengantar Ilmu Ekonomi', '2', '1'),
('M004', 'Sosiologi Lingkungan', '3', '1'),
('M003', 'Sosiologi Ekonomiasddddddddddddddddddddddddasdasd', '3', '3'),
('UNIV105', 'Bahasa Inggris', '2', '1'),
('M006', 'Pendidikan Agama Kristen', '2', '1'),
('123PGRI', 'DICOBA', '2', '1'),
('M005', 'Bahasa Indonesia', '2', '1'),
('PGRI01', 'Ke-PGRI-anasdddddddddddddddddddddddddddddddddddddd', '2', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `kode_mk` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kode_dosen` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `smester` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `grade` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `nim`, `kode_mk`, `kode_dosen`, `smester`, `grade`, `tugas`, `uts`, `uas`) VALUES
(1, '1130028', 'M002', 'D003', '1', '', 90, 90, 90),
(2, '1130001', 'M002', 'D003', '1', '', 70, 90, 85),
(3, '1130028', 'M005', 'D003', '1', '', 80, 85, 80),
(4, '1130004', 'M005', 'D003', '1', '', 60, 50, 70),
(5, '1130001', 'M005', 'D003', '1', '', 80, 80, 80),
(6, '1130028', 'M009', 'D002', '2', '', 60, 60, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nim` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `tanggal`, `nim`, `bukti_pembayaran`) VALUES
(5, '2022-08-11', '1130003', '20220811_2043_1130003.png'),
(6, '2022-10-08', 'FRISNANDO', '20221008_1434_FRISNANDO.png'),
(8, '2022-10-08', 'admin', '20221008_1545_admin.png'),
(11, '2022-10-10', 'DBC116081', '20221010_1020_DBC116081.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `kode_ruang` int(5) NOT NULL,
  `nama_ruang` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`kode_ruang`, `nama_ruang`) VALUES
(1, 'Kelas A'),
(2, 'Kelas B'),
(14, 'kelas D'),
(11, 'Kelas C'),
(15, 'Kelas E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(9) NOT NULL,
  `user_id` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `useracc_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_id`, `nama`, `pass`, `level`, `foto`, `useracc_status`) VALUES
(1, 'admin', 'Admin PGRI', 'admin', 'admin', 'visimisi.jpg', 1),
(40, 'D007', '', '123456', 'dosen', 'download (2).jpg', 1),
(30, '1130003', 'Budi', '12345', 'mahasiswa', 'WhatsApp Image 2022-02-09 at 22.01.51 (1).jpeg', 0),
(31, '1130004', 'Dedi', '12345', 'mahasiswa', 'parman.jpg', 0),
(29, '1130002', 'Ayu Selvia ', '12345', 'mahasiswa', 'model inggris.jpg', 0),
(28, '1130001', 'agustinus', '12345', 'mahasiswa', 'parman.jpg', 0),
(26, '1130028', 'Parman', '12345', 'mahasiswa', 'parman1.jpg', 0),
(27, '1120025', 'Fitri Handayani', '12345', 'mahasiswa', 'WhatsApp+Image+2022-02-09+at+22.01.51.jpeg.jpg', 0),
(39, 'D006', '', 'faldi2008', 'dosen', 'download (1).png', 1),
(41, 'D008', 'SEPRIANTO,ST', '123456', 'dosen', 'download (1).png', 1),
(42, 'D009', 'FRISNANDO,ST', '12345', 'dosen', 'IMG_8212.jpg', 1),
(46, 'D010', 'Novia', '123456', 'dosen', 'download (3).jpg', 1),
(45, 'DBC116081', 'FRISNANDO', '12345', 'mahasiswa', 'Screenshot 2022-10-08 193926.png', 1),
(47, 'D011', 'Alfrid Sentosa,SH.,MH', '12345', 'dosen', 'NEFCREVFRjgtMEMzMi00MDBELTgwQUUtNjIzRkFFOTgzRDk1.jpg', 1),
(48, 'D012', 'Tutik Haryani,SS.,M.Pd.,B.I', '12345', 'dosen', 'download.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indeks untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `kode` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `kode_ruang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
