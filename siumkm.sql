-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2024 pada 18.42
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siumkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Produk'),
(2, 'Fashion'),
(3, 'Makanan'),
(4, 'Teknologi'),
(5, 'Jasa'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` varchar(64) NOT NULL,
  `nama_laporan` varchar(128) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `nama_laporan`, `tanggal_laporan`, `created_at`, `updated_at`) VALUES
('LAP-001', 'Laporan Pendapatan UMKM Bulan November', '2024-11-08', '2024-11-08', '2024-11-08'),
('LAP-002', 'Laporan Pendapatan UMKM Bulan October', '2024-10-08', '2024-11-08', '2024-11-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendapatan`
--

CREATE TABLE `tbl_pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `id_laporan` varchar(64) NOT NULL,
  `nama_kecamatan` varchar(128) NOT NULL,
  `jumlah_pendapatan` int(11) NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pendapatan`
--

INSERT INTO `tbl_pendapatan` (`id_pendapatan`, `id_laporan`, `nama_kecamatan`, `jumlah_pendapatan`, `periode`) VALUES
(391, 'LAP-001', 'Bantarkalong', 600000, '2024-11-08'),
(392, 'LAP-001', 'Bojongasih', 110000, '2024-11-08'),
(393, 'LAP-001', 'Bojonggambir', 160000, '2024-11-08'),
(394, 'LAP-001', 'Ciawi', 210000, '2024-11-08'),
(395, 'LAP-001', 'Cibalong', 260000, '2024-11-08'),
(396, 'LAP-001', 'Cigalontang', 310000, '2024-11-08'),
(397, 'LAP-001', 'Cikalong', 360000, '2024-11-08'),
(398, 'LAP-001', 'Cikatomas', 410000, '2024-11-08'),
(399, 'LAP-001', 'Cineam', 460000, '2024-11-08'),
(400, 'LAP-001', 'Cipatujah', 510000, '2024-11-08'),
(401, 'LAP-001', 'Cisayong', 560000, '2024-11-08'),
(402, 'LAP-001', 'Culamega', 610000, '2024-11-08'),
(403, 'LAP-001', 'Gunungtanjung', 660000, '2024-11-08'),
(404, 'LAP-001', 'Jamanis', 710000, '2024-11-08'),
(405, 'LAP-001', 'Jatiwaras', 760000, '2024-11-08'),
(406, 'LAP-001', 'Kadipaten', 810000, '2024-11-08'),
(407, 'LAP-001', 'Karangjaya', 860000, '2024-11-08'),
(408, 'LAP-001', 'Karangnunggal', 910000, '2024-11-08'),
(409, 'LAP-001', 'Leuwisari', 960000, '2024-11-08'),
(410, 'LAP-001', 'Mangunreja', 1010000, '2024-11-08'),
(411, 'LAP-001', 'Manonjaya', 1060000, '2024-11-08'),
(412, 'LAP-001', 'Padakembang', 1110000, '2024-11-08'),
(413, 'LAP-001', 'Pagerageung', 1160000, '2024-11-08'),
(414, 'LAP-001', 'Pancatengah', 1210000, '2024-11-08'),
(415, 'LAP-001', 'Parungponteng', 1260000, '2024-11-08'),
(416, 'LAP-001', 'Puspahiang', 1310000, '2024-11-08'),
(417, 'LAP-001', 'Rajapolah', 1360000, '2024-11-08'),
(418, 'LAP-001', 'Salawu', 1410000, '2024-11-08'),
(419, 'LAP-001', 'Salopa', 1460000, '2024-11-08'),
(420, 'LAP-001', 'Sariwangi', 1510000, '2024-11-08'),
(421, 'LAP-001', 'Singaparna', 1560000, '2024-11-08'),
(422, 'LAP-001', 'Sodonghilir', 1610000, '2024-11-08'),
(423, 'LAP-001', 'Sukahening', 1660000, '2024-11-08'),
(424, 'LAP-001', 'Sukaraja', 1710000, '2024-11-08'),
(425, 'LAP-001', 'Sukarame', 1760000, '2024-11-08'),
(426, 'LAP-001', 'Sukaratu', 1810000, '2024-11-08'),
(427, 'LAP-001', 'Sukaresik', 1860000, '2024-11-08'),
(428, 'LAP-001', 'Tanjungjaya', 1910000, '2024-11-08'),
(429, 'LAP-001', 'Taraju', 1960000, '2024-11-08'),
(430, 'LAP-002', 'Bantarkalong', 1000, '2024-10-08'),
(431, 'LAP-002', 'Bojongasih', 110000, '2024-10-08'),
(432, 'LAP-002', 'Bojonggambir', 160000, '2024-10-08'),
(433, 'LAP-002', 'Ciawi', 210000, '2024-10-08'),
(434, 'LAP-002', 'Cibalong', 260000, '2024-10-08'),
(435, 'LAP-002', 'Cigalontang', 310000, '2024-10-08'),
(436, 'LAP-002', 'Cikalong', 360000, '2024-10-08'),
(437, 'LAP-002', 'Cikatomas', 410000, '2024-10-08'),
(438, 'LAP-002', 'Cineam', 460000, '2024-10-08'),
(439, 'LAP-002', 'Cipatujah', 510000, '2024-10-08'),
(440, 'LAP-002', 'Cisayong', 560000, '2024-10-08'),
(441, 'LAP-002', 'Culamega', 610000, '2024-10-08'),
(442, 'LAP-002', 'Gunungtanjung', 660000, '2024-10-08'),
(443, 'LAP-002', 'Jamanis', 710000, '2024-10-08'),
(444, 'LAP-002', 'Jatiwaras', 760000, '2024-10-08'),
(445, 'LAP-002', 'Kadipaten', 810000, '2024-10-08'),
(446, 'LAP-002', 'Karangjaya', 860000, '2024-10-08'),
(447, 'LAP-002', 'Karangnunggal', 910000, '2024-10-08'),
(448, 'LAP-002', 'Leuwisari', 960000, '2024-10-08'),
(449, 'LAP-002', 'Mangunreja', 1010000, '2024-10-08'),
(450, 'LAP-002', 'Manonjaya', 1060000, '2024-10-08'),
(451, 'LAP-002', 'Padakembang', 1110000, '2024-10-08'),
(452, 'LAP-002', 'Pagerageung', 1160000, '2024-10-08'),
(453, 'LAP-002', 'Pancatengah', 1210000, '2024-10-08'),
(454, 'LAP-002', 'Parungponteng', 1260000, '2024-10-08'),
(455, 'LAP-002', 'Puspahiang', 1310000, '2024-10-08'),
(456, 'LAP-002', 'Rajapolah', 1360000, '2024-10-08'),
(457, 'LAP-002', 'Salawu', 1410000, '2024-10-08'),
(458, 'LAP-002', 'Salopa', 1460000, '2024-10-08'),
(459, 'LAP-002', 'Sariwangi', 1510000, '2024-10-08'),
(460, 'LAP-002', 'Singaparna', 1000, '2024-10-08'),
(461, 'LAP-002', 'Sodonghilir', 1610000, '2024-10-08'),
(462, 'LAP-002', 'Sukahening', 1660000, '2024-10-08'),
(463, 'LAP-002', 'Sukaraja', 1710000, '2024-10-08'),
(464, 'LAP-002', 'Sukarame', 1760000, '2024-10-08'),
(465, 'LAP-002', 'Sukaratu', 1810000, '2024-10-08'),
(466, 'LAP-002', 'Sukaresik', 1860000, '2024-10-08'),
(467, 'LAP-002', 'Tanjungjaya', 1910000, '2024-10-08'),
(468, 'LAP-002', 'Taraju', 1000, '2024-10-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('administrator','petugas','pelaku_umkm') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$6HS9SKPUw04DTBYKaFwVx.dymmtATvI3eWJbGvbDltoMEqVIdKEHC', 'administrator', '2024-11-09', '2024-11-09'),
(2, 'Petugas A', 'petugas', '$2y$10$smRBxbBacdrSSrtF6v.nzOG3igUT9YpxZ0u2p7FN7WsbLTaertABe', 'petugas', '2024-11-10', '2024-11-10'),
(3, 'Fyooo', 'fyoooo', '$2y$10$AmZK4904uSIHBynEk8kjvOvfmCzOxa.bhSCQAdH8wzQl4vLJrI09O', 'pelaku_umkm', '2024-11-10', '2024-11-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_produk` varchar(256) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_umkm`
--

CREATE TABLE `tbl_umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_pemilik` varchar(128) NOT NULL,
  `NIK` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat_umkm` varchar(256) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` enum('Terverifikasi','Belum Terverifikasi') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_umkm`
--

INSERT INTO `tbl_umkm` (`id_umkm`, `nama_pemilik`, `NIK`, `email`, `no_hp`, `alamat_umkm`, `id_pengguna`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Fyooo', '3141341113310001', 'fyo@gmail.com', '08123456789', 'Jl. Maju Mundur Jaya jayaa eyyy No. 31, Kel. Jambu, Kec. Mangga, Kab.  Semangka', 3, 'Terverifikasi', '2024-11-10', '2024-11-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_pendapatan`
--
ALTER TABLE `tbl_pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_umkm` (`id_umkm`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendapatan`
--
ALTER TABLE `tbl_pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `tbl_umkm` (`id_umkm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
