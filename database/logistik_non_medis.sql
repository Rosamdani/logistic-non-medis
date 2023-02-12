-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2023 pada 14.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistik_non_medis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL DEFAULT '',
  `kode_satuan` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode`, `kode_barang`, `kode_satuan`, `nama_barang`, `jumlah`, `harga`, `keterangan`) VALUES
(1, 'BR201907001', 27, 'HANDSOAP', 0, 20000, 'BAIK'),
(2, 'BR201907002', 27, 'BAYCLIN', 0, 10000, 'BAIK'),
(3, 'BR201907003', 2, 'LAMPU', 0, 12000, 'BAIK'),
(4, 'BR201907004', 2, 'AMPLOP UK BESAR/KECIL', 0, 15000, 'BAIK'),
(5, 'BR201907005', 2, 'BUKU EXSPEDISI BESAR', 0, 17000, 'BAIK\r\n'),
(6, 'BR201907006', 10, 'TISSUE', 0, 10500, 'BAIK'),
(7, 'BR201907007', 2, 'BUKU EXSPEDISI KECIL', 0, 8000, 'BAIK'),
(8, 'BR201907008', 6, 'PENGHARUM RUANGAN', 0, 25000, 'BAIK'),
(9, 'BR201907009', 32, 'SPIDOL PERMANENT', 0, 12500, 'BAIK'),
(10, 'BR201907010', 32, 'SPIDOL NON PERMANENT', 0, 11500, 'BAIK'),
(11, 'BR201907011', 2, 'KALKULATOR', 0, 30000, 'BAIK'),
(12, 'BR201907012', 20, 'KERTAS A4', 0, 45000, 'BAIK'),
(13, 'BR201907013', 20, 'KERTAS F4', 0, 50000, 'BAIK'),
(14, 'BR201907014', 2, 'SUPER PELL', 0, 17500, 'BAIK'),
(15, 'BR201907015', 10, 'PLASTIK SAMPAH HITAM', 0, 70000, 'BAIK'),
(16, 'BR201907016', 10, 'PLASTIK KUNING', 0, 65000, 'BAIK'),
(17, 'BR201907017', 41, 'KASA GULUNG', 0, 75000, 'BAIK'),
(18, 'BR201907018', 2, 'GUNTING', 0, 10000, 'BAIK'),
(19, 'BR201907019', 25, 'BATERAI ABC KECIL', 0, 20000, 'BAIK'),
(20, 'BR201907020', 25, 'BATERAI ABC BESAR', 0, 22500, 'BAIK'),
(21, 'BR201907021', 20, 'HVS WARNA KUNING', 0, 65000, 'BAIK'),
(22, 'BR201907022', 20, 'HVS WARNA HIJAU', 0, 63000, 'BAIK'),
(23, 'BR201907023', 2, 'BUSSINESS FILE', 0, 25000, 'BAIK'),
(24, 'BR201907024', 10, 'PLASTIK ASOY', 0, 30000, 'BAIK'),
(25, 'BR201907025', 20, 'HVS WARNA BIRU', 0, 65000, 'BAIK'),
(26, 'BR201907026', 10, 'AMPLOP COKELAT BESAR', 0, 44000, 'BAIK'),
(27, 'BR201907027', 2, 'PAKAR', 0, 80000, 'BAIK'),
(28, 'BR201907028', 2, 'KERTAS LABEL', 0, 35000, 'BAIK'),
(29, 'BR201907029', 2, 'PENSIL ', 0, 12000, 'BAIK'),
(30, 'BR201907030', 2, 'STAPLER', 0, 40000, 'BAIK'),
(31, 'BR201907031', 2, 'LEM KERTAS', 0, 30000, 'BAIK'),
(32, 'BR201907032', 2, 'ISI STAPLER', 0, 34500, 'BAIK'),
(33, 'BR201907033', 2, 'SELOTIP BENING KECIL', 0, 32000, 'BAIK'),
(34, 'BR201907034', 2, 'SELOTIP BENING BESAR', 0, 35500, 'BAIK'),
(35, 'BR201907035', 2, 'SELOTIP HITAM BESAR', 0, 41000, 'BAIK'),
(36, 'BR201907036', 2, 'TINTA PRINTER', 0, 55000, 'BAIK'),
(37, 'BR201907037', 2, 'SAPU', 0, 27000, 'BAIK'),
(38, 'BR201907038', 2, 'KAIN PEL', 0, 52000, 'BAIK'),
(39, 'BR201907039', 2, 'TONG SAMPAH', 0, 90000, 'BAIK'),
(40, 'BR201907040', 20, 'KERTAS UBI', 0, 33000, 'BAIK'),
(41, 'BR201907041', 32, 'TIP-X', 0, 6000, 'BAIK'),
(42, 'BR201907042', 10, 'MAP MERAH', 0, 22500, 'BAIK'),
(43, 'BR201907043', 10, 'MAP BIRU', 0, 22500, 'BAIK'),
(44, 'BR201907044', 10, 'MAP KUNING', 0, 22500, 'BAIK'),
(45, 'BR201907045', 2, 'SAPU LIDI', 0, 34000, 'BAIK'),
(46, 'BR201907046', 2, 'ALAS KAKI', 0, 60000, 'BAIK'),
(47, 'BR201907047', 32, 'DOUBLE TIPE', 0, 47000, 'BAIK'),
(48, 'BR201907048', 2, 'PENGGARIS', 0, 10000, 'BAIK'),
(49, 'BR201907049', 2, 'KWINTANSI', 0, 11500, 'BAIK'),
(50, 'BR201907050', 20, 'BROSUR', 0, 80000, 'BAIK'),
(51, 'BR201907051', 20, 'KOP SURAT', 0, 44000, 'BAIK'),
(52, 'BR201907052', 2, 'SABUN CUCI', 0, 40000, 'BAIK'),
(53, 'BR201907053', 2, 'KEMOCENG', 0, 11000, 'BAIK'),
(54, 'BR201907054', 2, 'SIKAT TOILET', 0, 30000, 'BAIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `kode` int(11) NOT NULL,
  `kode_ruangan` int(11) DEFAULT NULL,
  `kode_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_keluar`
--

INSERT INTO `tbl_keluar` (`kode`, `kode_ruangan`, `kode_barang`, `tanggal`, `jumlah`, `catatan`) VALUES
(1, 4, 5, '2019-07-10', 10, 'BAIK'),
(6, 3, 1, '2019-07-10', 5, 'BAIK'),
(7, 2, 7, '2019-07-10', 2, 'BAIK'),
(8, 37, 1, '2019-07-10', 3, 'BAIK'),
(9, 35, 5, '2019-07-10', 3, 'BAIK'),
(10, 9, 17, '2019-07-11', 5, 'BAIK'),
(11, 41, 37, '2019-07-11', 2, 'BAIK'),
(12, 73, 3, '2019-07-11', 2, 'BAIK'),
(13, 23, 4, '2019-07-11', 3, 'BAIK'),
(14, 32, 8, '2019-07-11', 2, 'BAIK'),
(15, 82, 12, '2019-07-11', 5, 'BAIK'),
(16, 43, 12, '2019-07-11', 10, 'BAIK'),
(17, 83, 13, '2019-07-11', 3, 'BAIK'),
(18, 7, 9, '2019-07-11', 3, 'BAIK'),
(19, 5, 5, '2019-07-11', 4, 'BAIK'),
(20, 13, 2, '2019-07-11', 2, 'BAIK'),
(21, 14, 15, '2019-07-11', 1, 'BAIK'),
(22, 28, 6, '2019-07-11', 3, 'BAIK'),
(23, 44, 1, '2019-07-11', 2, 'BAIK'),
(24, 16, 1, '2019-07-11', 4, 'BAIK'),
(25, 16, 16, '2019-07-11', 3, 'BAIK'),
(26, 42, 8, '2019-07-11', 2, 'BAIK'),
(27, 87, 12, '2019-07-11', 2, 'BAIK'),
(28, 84, 9, '2019-07-11', 2, 'BAIK'),
(29, 15, 2, '2019-07-11', 6, 'BAIK'),
(30, 25, 11, '2019-07-11', 1, 'BAIK'),
(31, 87, 11, '2019-07-11', 2, 'BAIK'),
(32, 26, 1, '2019-07-11', 3, 'BAIK'),
(33, 67, 17, '2019-07-11', 1, 'BAIK'),
(34, 34, 22, '2019-07-11', 1, 'BAIK'),
(35, 24, 3, '2019-07-11', 2, 'BAIK'),
(36, 72, 34, '2019-07-11', 2, 'BAIK'),
(37, 36, 14, '2019-07-11', 2, 'BAIK'),
(38, 17, 10, '2019-07-11', 2, 'BAIK'),
(39, 45, 6, '2019-07-11', 2, 'BAIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `kode` int(11) NOT NULL,
  `kode_supplier` int(11) DEFAULT NULL,
  `kode_barang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`kode`, `kode_supplier`, `kode_barang`, `tanggal`, `jumlah`, `harga`, `total`) VALUES
(12, 6, 1, '2019-07-10', 4, 100000, 400000),
(13, 5, 2, '2019-07-10', 2, 900000, 1800000),
(14, 35, 3, '2019-07-11', 8, 90000, 720000),
(15, 2, 3, '2019-07-11', 15, 80000, 1200000),
(16, 3, 9, '2019-07-11', 15, 15500, 232500),
(17, 3, 10, '2019-07-11', 15, 15000, 225000),
(18, 13, 4, '2019-07-11', 4, 20000, 80000),
(19, 111, 17, '2019-07-11', 20, 90000, 1800000),
(20, 112, 49, '2019-07-11', 10, 25000, 250000),
(21, 76, 23, '2019-07-11', 12, 22500, 270000),
(22, 42, 37, '2019-07-11', 15, 12000, 180000),
(23, 42, 45, '2019-07-11', 15, 30000, 450000),
(24, 9, 27, '2019-07-11', 5, 50000, 250000),
(25, 5, 24, '2019-07-11', 10, 18000, 180000),
(26, 17, 30, '2019-07-11', 8, 42000, 336000),
(27, 5, 19, '2019-07-11', 6, 60000, 360000),
(28, 5, 20, '2019-07-11', 10, 55000, 550000),
(29, 29, 52, '2019-07-11', 20, 8500, 170000),
(30, 8, 36, '2019-07-11', 5, 50000, 250000),
(31, 112, 41, '2019-07-11', 15, 9000, 135000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `kode` int(11) NOT NULL,
  `uraian` varchar(100) DEFAULT NULL,
  `telepon` varchar(14) DEFAULT NULL,
  `lantai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`kode`, `uraian`, `telepon`, `lantai`) VALUES
(1, 'Gudang LogistikIGD', '113', '1'),
(2, 'Gudang Farmasi', '114', '1'),
(3, 'Instalasi Gawat Darurat (IGD)', '115', '1'),
(4, 'IGD Kebidanan', '116', '1'),
(5, 'Farmasi Rawat Inap', '117', '1'),
(6, 'Farmasi Poli Umum', '118', '1'),
(7, 'Farmasi Poli Spesialis', '119', '1'),
(8, 'Farmasi Klinik Marelan', '120', '1'),
(9, 'CCSD', '121', '1'),
(10, 'Bakti Sosial', '122', '1'),
(11, 'Praktek Pendidikan', '123', '1'),
(12, 'Sanitasi Lingkungan', '124', '1'),
(13, 'Laboratorium', '125', '1'),
(14, 'Ruang Radiologi', '126', '1'),
(15, 'Ruang Gizi', '127', '1'),
(16, 'Ruang Operasi', '128', '1'),
(17, 'Ruang Rawat Teratai I', '129', '1'),
(18, 'Ruang Rawat Mawar', '130', '1'),
(19, 'Ruang Rawat Tulip', '131', '1'),
(20, 'Ruang Rawat Kemuning', '132', '1'),
(21, 'Ruang Rawat VIP', '133', '1'),
(22, 'Ruang Rawat Delima', '134', '1'),
(23, 'Ruang Rawat Asoka', '135', '1'),
(24, 'Ruang Rawat Anggrek', '136', '1'),
(25, 'Ruang Rawat Katalia', '137', '1'),
(26, 'Ruang Rawat Melati', '138', '1'),
(27, 'Ruang Rawat Sakura', '139', '1'),
(28, 'Ruang Rawat Matahari', '140', '1'),
(29, 'Ruang Rawat Teratai II', '141', '1'),
(30, 'Ruang VK Dalima', '142', '1'),
(31, 'Ruang VK', '143', '1'),
(32, 'Ruang Rawat Luka Bakar', '144', '1'),
(33, 'Ruang Bersalin', '145', '1'),
(34, 'Ruang Perinatologi', '146', '1'),
(35, 'Ruang Neonati', '147', '1'),
(36, 'Balai Kesehatan Ibu dan Anak', '148', '1'),
(37, 'Intensive Care Unit (ICU)', '149', '1'),
(38, 'Intensive Cardio Care Unit (ICCU)', '150', '1'),
(39, 'Neonatal Intensive Care Unit (NICU)', '151', '1'),
(40, 'Pediatrik Intensive Care Unit (PICU)', '152', '1'),
(41, 'High Dependency Unit (HDU) I', '153', '1'),
(42, 'High Dependency Unit (HDU) II', '154', '1'),
(43, 'Ruang Rekam Medis', '155', '1'),
(44, 'Poliklinik Umum', '156', '1'),
(45, 'Poliklinik Penyakit Dalam', '157', '1'),
(46, 'Poliklinik P. Dalam (Endokrin) & Diabetes', '158', '1'),
(47, 'Poliklinik P. Dalam (Gastro Hepatologi)', '159', '1'),
(48, 'Poliklinik Anak', '160', '1'),
(49, 'Poliklinik THT', '161', '1'),
(50, 'Poliklinik Paru', '162', '1'),
(51, 'Poliklinik Bedah Orthopedi', '163', '1'),
(52, 'Poliklinik Kebidanan & Kandungan', '164', '1'),
(53, 'Poliklinik Mata', '165', '1'),
(54, 'Poliklinik Kulit & Kelamin', '166', '1'),
(55, 'Poliklinik Neurologi', '167', '1'),
(56, 'Poliklinik Bedah Umum', '168', '1'),
(57, 'Poliklinik Bedah Anak', '169', '1'),
(58, 'Poliklinik Bedah PLASTIK', '170', '1'),
(59, 'Poliklinik Bedah Syaraf', '171', '2'),
(60, 'Poliklinik Bedah Mulut', '172', '2'),
(61, 'Poliklinik Gigi & MuLut', '173', '2'),
(62, 'Poliklinik Urologi', '174', '2'),
(63, 'Poliklinik Kejiwaan (Psikiater)', '175', '2'),
(64, 'Poliklinik Patologi Klinik', '176', '2'),
(65, 'Poliklinik Patologi Anatomi', '177', '2'),
(66, 'Poliklinik Jantung & Pembuluh Darah', '178', '2'),
(67, 'Perawatan Luka', '179', '2'),
(68, 'Poly VCT', '180', '2'),
(69, 'Poliklinik DOTS', '181', '2'),
(70, 'Poliklinik Sp. Bedah Onkologi', '182', '2'),
(71, 'Ruang Diagnostik dan ERCP', '183', '2'),
(72, 'Ruang Fisiotherapi', '184', '2'),
(73, 'Hemodialisa', '185', '2'),
(74, 'Registrasi Pasien Rawat Jalan', '186', '2'),
(75, 'Registrasi Pasien Rawat Inap', '187', '2'),
(76, 'Praktek Dokter Umum', '188', '2'),
(77, 'Praktek Dokter Spesialis', '189', '2'),
(78, 'Kemoterapi', '190', '2'),
(79, 'PENATA REKENING', '191', '2'),
(80, 'Medical Check Up (MCU)', '192', '2'),
(81, 'FISIOTERAPI', '193', '2'),
(82, 'BPJS RSU IMELDA', '194', '2'),
(83, 'SIRS (SISTEM INFROMASI RUMAH SAKIT)', '195', '2'),
(84, 'APOTIK', '196', '2'),
(87, 'KASIR', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `kode` int(11) NOT NULL,
  `uraian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`kode`, `uraian`) VALUES
(2, 'Pcs'),
(4, 'Tablet'),
(6, 'Botol'),
(9, 'Ampul'),
(10, 'Bungkus'),
(12, 'Blister'),
(13, 'Tube'),
(15, 'Lusin'),
(16, 'Box'),
(17, 'Dus'),
(19, 'Lembar'),
(20, 'Pcs'),
(24, 'Tabung'),
(25, 'Pasang'),
(27, 'Liter'),
(32, 'Kotak'),
(33, 'Meter'),
(34, 'Unit'),
(39, 'Pack'),
(41, 'Gulung'),
(43, 'Rim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `kode` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`kode`, `nama`, `telepon`, `alamat`) VALUES
(2, 'PT PARIT PADANG', '061-6610073', 'JL. Bilal No. 616 S, Pulo Brayan Darat 02'),
(3, 'SUMBER JAYA BARU', '061-6610074', 'JL. Bilal No. 616 S, Pulo Brayan Darat 03'),
(4, 'PT.  ANTARMITRA SEMBADA', '061-6610075', 'JL. Bilal No. 616 S, Pulo Brayan Darat 04'),
(5, 'PT. MENSA BINASUKSES', '061-6610076', 'JL. Bilal No. 616 S, Pulo Brayan Darat 05'),
(6, 'PT. INDOFARMA GLOBAL MEDIKA', '061-6610077', 'JL. Bilal No. 616 S, Pulo Brayan Darat 06'),
(7, 'PT. VENTA VALENT', '061-6610078', 'JL. Bilal No. 616 S, Pulo Brayan Darat 07'),
(8, 'PT. ANUGERAH PHARMINDO LESTARI (APL)', '061-6610079', 'JL. Bilal No. 616 S, Pulo Brayan Darat 08'),
(9, 'PT. BINA CATUR MARGA', '061-6610080', 'JL. Bilal No. 616 S, Pulo Brayan Darat 09'),
(10, 'PARAZELSUS', '061-6610081', 'JL. Bilal No. 616 S, Pulo Brayan Darat 10'),
(11, 'PT. AMALMULIA FARMAALKESINDO', '061-6610082', 'JL. Bilal No. 616 S, Pulo Brayan Darat 11'),
(12, 'PT. TEMPO', '061-6610083', 'JL. Bilal No. 616 S, Pulo Brayan Darat 12'),
(13, 'PT. DOSNI ROHA', '061-6610084', 'JL. Bilal No. 616 S, Pulo Brayan Darat 13'),
(14, 'PT. KALISTA PRIMA', '061-6610085', 'JL. Bilal No. 616 S, Pulo Brayan Darat 14'),
(15, 'PT. SUKSES JAYA ALKESINDO', '061-6610086', 'JL. Bilal No. 616 S, Pulo Brayan Darat 15'),
(16, 'PANCA JAYA', '061-6610087', 'JL. Bilal No. 616 S, Pulo Brayan Darat 16'),
(17, 'CV. SUMBER MEDIKA', '061-6610088', 'JL. Bilal No. 616 S, Pulo Brayan Darat 17'),
(18, 'PT. GARUDA PERKASA INTIMEDICA', '061-6610089', 'JL. Bilal No. 616 S, Pulo Brayan Darat 18'),
(19, 'PT. SAWAH BESAR', '061-6610090', 'JL. Bilal No. 616 S, Pulo Brayan Darat 19'),
(20, 'PT. KIMIA FARMA', '061-6610091', 'JL. Bilal No. 616 S, Pulo Brayan Darat 20'),
(21, 'PT. KEBAYORAN FARMA', '061-6610092', 'JL. Bilal No. 616 S, Pulo Brayan Darat 21'),
(22, 'PT. UNITED DICO CITAS', '061-6610093', 'JL. Bilal No. 616 S, Pulo Brayan Darat 22'),
(23, 'PT. BINA SAN PRIMA', '061-6610094', 'JL. Bilal No. 616 S, Pulo Brayan Darat 23'),
(24, 'PT. DAYA MUDA AGUNG', '061-6610095', 'JL. Bilal No. 616 S, Pulo Brayan Darat 24'),
(25, 'TP. JOVI', '061-6610096', 'JL. Bilal No. 616 S, Pulo Brayan Darat 25'),
(26, 'CV. AZKA BERSAUDARA', '061-6610097', 'JL. Bilal No. 616 S, Pulo Brayan Darat 26'),
(27, 'PT. HEXALAB SUMATERA', '061-6610098', 'JL. Bilal No. 616 S, Pulo Brayan Darat 27'),
(28, 'PT. ANUGRAH ARGON MEDICA (AAM)', '061-6610099', 'JL. Bilal No. 616 S, Pulo Brayan Darat 28'),
(29, 'PT. GLOBAL MITRA PRIMA', '061-6610100', 'JL. Bilal No. 616 S, Pulo Brayan Darat 29'),
(30, 'ITC', '061-6610101', 'JL. Bilal No. 616 S, Pulo Brayan Darat 30'),
(31, 'PT. MILLENIUM PHARMACON INTERNATIONAL', '061-6610102', 'JL. Bilal No. 616 S, Pulo Brayan Darat 31'),
(32, 'PT. DISTRIVERSA BUANAMAS', '061-6610103', 'JL. Bilal No. 616 S, Pulo Brayan Darat 32'),
(33, 'TIGARAKSA SATRIA', '061-6610104', 'JL. Bilal No. 616 S, Pulo Brayan Darat 33'),
(34, 'PT. PPI MEDAN', '061-6610105', 'JL. Bilal No. 616 S, Pulo Brayan Darat 34'),
(35, 'PT. MERAPI UTAMA PHARMA', '061-6610106', 'JL. Bilal No. 616 S, Pulo Brayan Darat 35'),
(36, 'APOTEK MANDIRI', '061-6610107', 'JL. Bilal No. 616 S, Pulo Brayan Darat 36'),
(37, 'PT. SAPTA SARI TAMA', '061-6610108', 'JL. Bilal No. 616 S, Pulo Brayan Darat 37'),
(38, 'RAJAWALI NUSINDO', '061-6610109', 'JL. Bilal No. 616 S, Pulo Brayan Darat 38'),
(39, 'PT.GLOBAL PRIMA NUSANTARA', '061-6610110', 'JL. Bilal No. 616 S, Pulo Brayan Darat 39'),
(40, 'PERUSAHAAN PERDAGANGAN INDONESIA', '061-6610111', 'JL. Bilal No. 616 S, Pulo Brayan Darat 40'),
(41, 'PT. BRATACO', '061-6610112', 'JL. Bilal No. 616 S, Pulo Brayan Darat 41'),
(42, 'PT. SURGIKA ALKESINDO', '061-6610113', 'JL. Bilal No. 616 S, Pulo Brayan Darat 42'),
(43, 'PT ADYAJATI LESTARI', '061-6610114', 'JL. Bilal No. 616 S, Pulo Brayan Darat 43'),
(44, 'PT. ANUGRAH REZEKI BERSAMA INDONESIA', '061-6610115', 'JL. Bilal No. 616 S, Pulo Brayan Darat 44'),
(45, 'PT. CAHAYA DUA DELAPAN', '061-6610116', 'JL. Bilal No. 616 S, Pulo Brayan Darat 45'),
(46, 'PT. CAHAYA DUA DELAPAN', '061-6610117', 'JL. Bilal No. 616 S, Pulo Brayan Darat 46'),
(47, 'CV.ESTER FARMA', '061-6610118', 'JL. Bilal No. 616 S, Pulo Brayan Darat 47'),
(48, 'PT. DANVI MEDILAB PERKASA', '061-6610119', 'JL. Bilal No. 616 S, Pulo Brayan Darat 48'),
(49, 'APOTEK YAKIN', '061-6610120', 'JL. Bilal No. 616 S, Pulo Brayan Darat 49'),
(50, 'ADI MAKMUR ', '061-6610121', 'JL. Bilal No. 616 S, Pulo Brayan Darat 50'),
(51, 'PERCETAKAN CHANDRA', '061-6610122', 'JL. Bilal No. 616 S, Pulo Brayan Darat 51'),
(52, 'ANUGRAH REZEKI BERSAMA INDONESIA', '061-6610123', 'JL. Bilal No. 616 S, Pulo Brayan Darat 52'),
(53, 'METRO DRUG INDONESIA', '061-6610124', 'JL. Bilal No. 616 S, Pulo Brayan Darat 53'),
(54, 'PT.ALEXA MEDIKA', '061-6610125', 'JL. Bilal No. 616 S, Pulo Brayan Darat 54'),
(55, 'INSABA CAKRABUANA', '061-6610126', 'JL. Bilal No. 616 S, Pulo Brayan Darat 55'),
(56, 'PT. ADAM DANI LESTARI', '061-6610127', 'JL. Bilal No. 616 S, Pulo Brayan Darat 56'),
(57, 'PT. PROTEUSSABA NUSANTARA', '061-6610128', 'JL. Bilal No. 616 S, Pulo Brayan Darat 57'),
(58, 'PT. ULY MANDIRI SEJAHTERA', '061-6610129', 'JL. Bilal No. 616 S, Pulo Brayan Darat 58'),
(59, 'PT. EXZER AMSAL MANDIRI', '061-6610130', 'JL. Bilal No. 616 S, Pulo Brayan Darat 59'),
(60, 'SABA INDOMEDICA', '061-6610131', 'JL. Bilal No. 616 S, Pulo Brayan Darat 60'),
(61, 'BS MDN MEDICAL & DENTAL SUPPLIER', '061-6610132', 'JL. Bilal No. 616 S, Pulo Brayan Darat 61'),
(62, 'PT.IDS MEDICAL SYSTEMS INDONESIA', '061-6610133', 'JL. Bilal No. 616 S, Pulo Brayan Darat 62'),
(63, 'COBRA DENTAL', '061-6610134', 'JL. Bilal No. 616 S, Pulo Brayan Darat 63'),
(64, 'PT.MEDIKA TEKNIK BAHAMATAMA', '061-6610135', 'JL. Bilal No. 616 S, Pulo Brayan Darat 64'),
(65, 'PT.MULTIPLUS MEDILAB', '061-6610136', 'JL. Bilal No. 616 S, Pulo Brayan Darat 65'),
(66, 'CV.RAFIKARYA', '061-6610137', 'JL. Bilal No. 616 S, Pulo Brayan Darat 66'),
(67, 'MODERN INTERNASIONAL TBK', '061-6610138', 'JL. Bilal No. 616 S, Pulo Brayan Darat 67'),
(68, 'PT.EDISON DUTA SARANA', '061-6610139', 'JL. Bilal No. 616 S, Pulo Brayan Darat 68'),
(69, 'PT.DARMAWANGSAH MEDICAL SUPPLIES', '061-6610140', 'JL. Bilal No. 616 S, Pulo Brayan Darat 69'),
(70, 'CV. MAHKOTA MEDICA', '061-6610141', 'JL. Bilal No. 616 S, Pulo Brayan Darat 70'),
(71, 'PT. ANUGRAH PHARMINDO LESTARI', '061-6610142', 'JL. Bilal No. 616 S, Pulo Brayan Darat 71'),
(72, 'PI. GLOBAL MEDILAB INDONESIA', '061-6610143', 'JL. Bilal No. 616 S, Pulo Brayan Darat 72'),
(73, 'PT.DIMAS ANDALS MAKMUR', '061-6610144', 'JL. Bilal No. 616 S, Pulo Brayan Darat 73'),
(74, 'CV. USAHA BERSAMA', '061-6610145', 'JL. Bilal No. 616 S, Pulo Brayan Darat 74'),
(75, 'CV.HORAS ALKESINDO', '061-6610146', 'JL. Bilal No. 616 S, Pulo Brayan Darat 75'),
(76, 'CV. USAHA BERSAMA', '061-6610147', 'JL. Bilal No. 616 S, Pulo Brayan Darat 76'),
(77, 'PT. VERSACON MEDICAL', '061-6610148', 'JL. Bilal No. 616 S, Pulo Brayan Darat 77'),
(78, 'PT. MENDJANGAN ', '061-6610149', 'JL. Bilal No. 616 S, Pulo Brayan Darat 78'),
(79, 'CV. ATHIQA', '061-6610150', 'JL. Bilal No. 616 S, Pulo Brayan Darat 79'),
(80, 'APOTEK ISTANA', '061-6610151', 'JL. Bilal No. 616 S, Pulo Brayan Darat 80'),
(84, 'PT. TRIDO ABED UTAMA', '061-6610155', 'JL. Darat No.123'),
(85, 'PT. DIAN LANGGENG PRATAMA', '061-6610156', 'JL. Pratama No. 88'),
(87, 'MEDICAL DAN DENTAL SUPPLIER', '061-6610158', 'JL. Makmur No. 05'),
(88, 'PT. INTEGRITAS ARTHA NUSANTARA', '061-6610159', 'JL. Nusantara No. 33'),
(89, 'PT. GLOBAL KHARISMA SEJATI', '061-6610160', 'JL. Ayu No. 01'),
(90, 'MEGA INTI MAKMUR MEDIKA', '061-6610161', 'JL. Mega No. 99'),
(91, 'PT. ARKARIM JAYA FARMA', '061-6610162', 'JL. Flamboyan Raya No. 401'),
(92, 'PT. BASARIA JAYA MANDIRI', '061-6610163', 'JL. Sejahtera No. 22'),
(95, 'PT. SIGMA KARSA MAGNA', '061-6610166', 'JL. Duku No. 66'),
(96, 'PT. SIDHARTA HUSADA', '061-6610167', 'JL. Setia No. 31'),
(97, 'PT. MENARA ANUGRAH SENTOSA', '061-6610168', 'JL. Rakyat No. 90'),
(98, 'MITRAPRIMA LESTARI', '061-6610169', 'JL. Pisang No. 12'),
(100, 'PT. TRI SAPTA JAYA', '061-6610171', 'JL. Kelapa No. 100'),
(101, 'CV. AVARA JAGADITHA', '061-6610172', 'JL. Bukit Barisan No. 32'),
(102, 'AIRMAS CHEMICAL MEDAN', '061-6610173', 'JL. Sejati No. 44'),
(104, 'PT. DWI PUTRA BERKARYA', '061-6610175', 'JL. Hati No. 99'),
(109, 'PT. DIMAS ANDALANS MEDIKA', '061-6610180', 'JL. Sukamadu No. 132'),
(110, 'PT. HOSPI MEDIK INDONESIA', '061-6610181', 'JL. Bahagia No. 55'),
(111, 'PT. WIJAYA ', '061-6610182', 'JL. Bilal No. 12'),
(112, 'PT. NIAGA MANDIRI LESTARI MOTIVASI', '061-6610183', 'JL. Karya No. 112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kode` int(11) NOT NULL,
  `user_name` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`kode`, `user_name`, `password`, `status`) VALUES
(8, 'puisi', '3d53d7dce9e6757d300933693cd05297', 'Admin'),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(11, 'user1', '6ad14ba9986e3615423dfca256d04e3f', 'Pengawas'),
(12, 'user2', 'eb889d1b7261dae2c7a456552d3bc15b', 'User'),
(13, 'super', '21232f297a57a5a743894a0e4a801fc3', 'SupAdmin');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_barang` (
`kode` int(11)
,`kode_barang` varchar(15)
,`kode_satuan` int(11)
,`nama_barang` varchar(100)
,`harga` int(11)
,`keterangan` text
,`satuan` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_keluar1`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_keluar1` (
`kode` int(11)
,`kode_ruangan` int(11)
,`kode_barang` int(11)
,`tanggal` date
,`jumlah` int(11)
,`uraian` varchar(100)
,`telepon` varchar(14)
,`lantai` varchar(20)
,`nama_barang` varchar(100)
,`kd_barang` varchar(15)
,`catatan` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS SELECT `tbl_barang`.`kode` AS `kode`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`kode_satuan` AS `kode_satuan`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`harga` AS `harga`, `tbl_barang`.`keterangan` AS `keterangan`, `tbl_satuan`.`uraian` AS `satuan` FROM (`tbl_barang` join `tbl_satuan` on(`tbl_satuan`.`kode` = `tbl_barang`.`kode_satuan`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_keluar1`
--
DROP TABLE IF EXISTS `v_keluar1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keluar1`  AS SELECT `tbl_keluar`.`kode` AS `kode`, `tbl_keluar`.`kode_ruangan` AS `kode_ruangan`, `tbl_keluar`.`kode_barang` AS `kode_barang`, `tbl_keluar`.`tanggal` AS `tanggal`, `tbl_keluar`.`jumlah` AS `jumlah`, `tbl_ruangan`.`uraian` AS `uraian`, `tbl_ruangan`.`telepon` AS `telepon`, `tbl_ruangan`.`lantai` AS `lantai`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`kode_barang` AS `kd_barang`, `tbl_keluar`.`catatan` AS `catatan` FROM ((`tbl_keluar` join `tbl_ruangan` on(`tbl_keluar`.`kode_ruangan` = `tbl_ruangan`.`kode`)) join `tbl_barang` on(`tbl_keluar`.`kode_barang` = `tbl_barang`.`kode`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `SATUA` (`kode_satuan`);

--
-- Indeks untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `CUSTOMER` (`kode_ruangan`),
  ADD KEY `kode5` (`kode_barang`);

--
-- Indeks untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode6` (`kode_supplier`),
  ADD KEY `kode9` (`kode_barang`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `kode1` FOREIGN KEY (`kode_satuan`) REFERENCES `tbl_satuan` (`kode`);

--
-- Ketidakleluasaan untuk tabel `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD CONSTRAINT `kode3` FOREIGN KEY (`kode_ruangan`) REFERENCES `tbl_ruangan` (`kode`),
  ADD CONSTRAINT `kode5` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode`);

--
-- Ketidakleluasaan untuk tabel `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD CONSTRAINT `kode6` FOREIGN KEY (`kode_supplier`) REFERENCES `tbl_supplier` (`kode`),
  ADD CONSTRAINT `kode9` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
