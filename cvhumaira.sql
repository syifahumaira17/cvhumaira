-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2025 at 07:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvhumaira`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT 'Perempuan',
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `deskripsi_singkat` text,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `email`, `no_hp`, `deskripsi_singkat`, `foto`) VALUES
(1, 'Syifa Humaira', 'Sukabumi', '2005-02-17', 'Perempuan', 'Jl. Rancakadu RT01/RW08, Sukabumi, Jawa Barat', 'syifahumaira@gmail.com', '081234567890', 'Mahasiswa Informatika yang antusias di bidang web development, desain UI/UX, dan pengembangan aplikasi kreatif. Berorientasi pada detail dan memiliki kemampuan komunikasi yang baik.', 'img/foto_syifa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` int NOT NULL,
  `id_biodata` int DEFAULT NULL,
  `nama_keahlian` varchar(100) DEFAULT NULL,
  `tingkat` enum('Pemula','Menengah','Mahir','Profesional') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `id_biodata`, `nama_keahlian`, `tingkat`) VALUES
(1, 1, 'HTML & CSS', 'Mahir'),
(2, 1, 'JavaScript', 'Menengah'),
(3, 1, 'PHP & MySQL', 'Menengah'),
(4, 1, 'Bootstrap & Tailwind CSS', 'Menengah'),
(5, 1, 'UI/UX Design (Figma)', 'Mahir'),
(6, 1, 'Git & GitHub', 'Menengah'),
(7, 1, 'Adobe Photoshop', 'Menengah'),
(8, 1, 'Canva', 'Mahir'),
(9, 1, 'Excel', 'Mahir'),
(10, 1, 'Python', 'Mahir'),
(11, 1, 'Flutter', 'Menengah');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int NOT NULL,
  `id_biodata` int DEFAULT NULL,
  `jenjang` varchar(50) DEFAULT NULL,
  `nama_institusi` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `tahun_masuk` year DEFAULT NULL,
  `tahun_lulus` year DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `id_biodata`, `jenjang`, `nama_institusi`, `jurusan`, `tahun_masuk`, `tahun_lulus`, `keterangan`) VALUES
(1, 1, 'SD', 'SDN Melati Bandung', '-', '2009', '2015', 'Lulus dengan nilai UN memuaskan'),
(2, 1, 'SMP', 'SMPN 4 Bandung', '-', '2015', '2018', 'Aktif di ekstrakurikuler desain grafis'),
(3, 1, 'SMA', 'SMAN 2 Bandung', 'IPA', '2018', '2021', 'Juara 2 lomba desain poster tingkat kota'),
(4, 1, 'S1', 'Universitas Muhammadiyah Sukabumi', 'Teknik Informatika', '2021', '2025', 'Mahasiswa aktif semester akhir');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id_pengalaman` int NOT NULL,
  `id_biodata` int DEFAULT NULL,
  `jenis_pengalaman` enum('Organisasi','Magang','Proyek','Pekerjaan') DEFAULT NULL,
  `nama_tempat` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `tahun_mulai` year DEFAULT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id_pengalaman`, `id_biodata`, `jenis_pengalaman`, `nama_tempat`, `posisi`, `tahun_mulai`, `tahun_selesai`, `deskripsi`) VALUES
(1, 1, 'Organisasi', 'Himpunan Mahasiswa Informatika', 'Divisi Publikasi dan Dokumentasi', '2022', '2023', 'Bertanggung jawab membuat konten visual dan desain publikasi acara kampus.'),
(2, 1, 'Magang', 'PT Digital Kreatif Indonesia', 'Front-End Developer Intern', '2023', '2023', 'Membantu pengembangan antarmuka website perusahaan menggunakan HTML, CSS, dan JavaScript.'),
(3, 1, 'Proyek', 'Project Website KasihAksi', 'Full Stack Developer', '2024', '2024', 'Membuat aplikasi donasi sosial berbasis Android dan web dengan fitur CRUD dan integrasi Firebase.'),
(4, 1, 'Pekerjaan', 'Freelance', 'UI/UX Designer', '2024', '2025', 'Mengerjakan proyek desain antarmuka untuk beberapa klien dengan tools Figma dan Adobe XD.');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id_portofolio` int NOT NULL,
  `id_biodata` int DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `link_karya` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id_portofolio`, `id_biodata`, `judul`, `deskripsi`, `link_karya`, `gambar`) VALUES
(1, 1, 'Web Portfolio – Syifa Humaira', 'Website pribadi responsif yang menampilkan profil, pengalaman, dan proyek berbasis HTML, CSS, dan JavaScript. Dirancang dengan tampilan modern dan UX yang bersih.', 'https://syifahumaira.dev', 'img/portfolio_web.png'),
(2, 1, 'Sistem Informasi Rumah Sakit – R.S. Syifa Medika', 'Aplikasi web berbasis PHP & MySQL untuk manajemen pasien, dokter, dan rekam medis dengan dashboard interaktif.', 'https://github.com/syifahumaira/rs-syifamedika', 'img/rs_syifamedika.png'),
(3, 1, 'KasihAksi – Aplikasi Donasi Berbasis Android', 'Aplikasi mobile yang mempermudah penggalangan dana sosial dengan fitur CRUD donasi, notifikasi real-time, dan integrasi Firebase.', 'https://github.com/syifahumaira/kasihaksi', 'img/kasihaksi_app.png'),
(4, 1, 'Smart Attendance System', 'Sistem absensi berbasis QR Code menggunakan PHP dan MySQL, dengan fitur login admin dan laporan kehadiran otomatis.', 'https://github.com/syifahumaira/smart-attendance', 'img/attendance_system.png'),
(5, 1, 'Fotografi Alam', 'Mengambil foto-foto pemandangan alam menggunakan DSLR dan drone.', 'https://drive.google.com/foto-alam', NULL),
(6, 1, 'Ilustrasi Digital', 'Membuat ilustrasi karakter lucu menggunakan Procreate & tablet Wacom.', 'https://behance.net/syifa-ilustrasi', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id_pengalaman`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_portofolio`),
  ADD KEY `id_biodata` (`id_biodata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id_keahlian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id_pengalaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id_portofolio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`id_biodata`) REFERENCES `biodata` (`id_biodata`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`id_biodata`) REFERENCES `biodata` (`id_biodata`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`id_biodata`) REFERENCES `biodata` (`id_biodata`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`id_biodata`) REFERENCES `biodata` (`id_biodata`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
