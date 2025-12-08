-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2025 pada 12.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik_pro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail` int(11) NOT NULL,
  `no_resep` char(10) DEFAULT NULL,
  `kode_obat` char(5) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `aturan_pakai` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail`, `no_resep`, `kode_obat`, `jumlah`, `aturan_pakai`) VALUES
(1, 'R-001', 'OB01', 2, '3x1 Sesudah Makan'),
(2, 'R-002', 'OB01', 3, '3x1 Sesudah Makan'),
(3, 'R-003', 'OB05', 1, '3x1 Sebelum Makan'),
(4, 'R-004', 'OB21', 1, '2x1 Tetes Mata'),
(5, 'R-005', 'OB04', 2, '2x1 Sesudah Makan'),
(6, 'R-006', 'OB20', 1, '3x1 Kunyah'),
(7, 'R-007', 'OB22', 1, 'Oleskan pada luka'),
(8, 'R-008', 'OB06', 3, '3x1 Jika Gatal'),
(9, 'R-009', 'OB01', 3, '3x1 Sesudah Makan'),
(10, 'R-010', 'OB11', 1, '1x1 Pagi Hari'),
(11, 'R-011', 'OB15', 1, 'Jika Sesak'),
(12, 'R-012', 'OB08', 3, '3x1 Sesudah Makan'),
(13, 'R-013', 'OB04', 3, '2x1 Sesudah Makan'),
(14, 'R-014', 'OB03', 3, '3x1 Sesudah Makan'),
(15, 'R-015', 'OB17', 1, '1x1 Pagi Hari'),
(16, 'R-016', 'OB17', 1, '1x1 Malam Hari'),
(17, 'R-017', 'OB16', 1, '1x1 Pagi Hari'),
(18, 'R-018', 'OB03', 2, '3x1 Sesudah Makan'),
(19, 'R-019', 'OB04', 2, '2x1 Sesudah Makan'),
(20, 'R-020', 'OB19', 2, '3x1 Sesudah Makan'),
(21, 'R-021', 'OB16', 1, '1x1 Pagi Hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `no_dokter` char(5) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_dokter` varchar(100) DEFAULT NULL,
  `id_poli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`no_dokter`, `id_user`, `nama_dokter`, `id_poli`) VALUES
('D001', 2, 'Dr. Budi Santoso', 1),
('D002', 5, 'Dr. Adi Pratama', 3),
('D003', 6, 'Dr. Siti Aminah', 4),
('D004', 7, 'Dr. Bambang Pamungkas', 5),
('D005', 8, 'Dr. Dewi Sartika', 6),
('D006', 9, 'Dr. Eko Patrio', 7),
('D007', 10, 'Dr. Fajar Nugraha', 8),
('D008', 11, 'Dr. Gina Salsabila', 9),
('D009', 12, 'Dr. Hadi Sucipto', 10),
('D010', 13, 'Dr. Indah Permata', 11),
('D011', 14, 'Dr. Joko Anwar', 12),
('D012', 15, 'Dr. Kartika Putri', 13),
('D013', 16, 'Dr. Lukman Hakim', 14),
('D014', 17, 'Dr. Maiya Estianty', 15),
('D015', 18, 'Dr. Nana Mirdad', 16),
('D016', 19, 'Dr. Oscar Oasis', 17),
('D017', 20, 'Dr. Putri Titian', 18),
('D018', 21, 'Dr. Qori Sandioriva', 19),
('D019', 22, 'Dr. Rio Febrian', 20),
('D020', 23, 'Dr. Sandra Dewi', 21),
('D021', 24, 'Dr. Tommy Kurniawan', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `no_kunjungan` int(11) NOT NULL,
  `no_pasien` char(5) DEFAULT NULL,
  `no_dokter` char(5) DEFAULT NULL,
  `tgl_periksa` datetime DEFAULT current_timestamp(),
  `keluhan` text DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `status` enum('Menunggu','Diperiksa','Selesai','Batal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`no_kunjungan`, `no_pasien`, `no_dokter`, `tgl_periksa`, `keluhan`, `diagnosa`, `status`) VALUES
(1, 'P001', 'D001', '2025-11-28 07:59:48', 'Sakit Gigi', NULL, 'Menunggu'),
(2, 'P002', 'D002', '2025-11-28 08:00:00', 'Demam Tinggi', 'Febris', 'Selesai'),
(3, 'P003', 'D003', '2025-11-28 08:30:00', 'Mual Muntah', 'Gastritis', 'Selesai'),
(4, 'P004', 'D004', '2025-11-28 09:00:00', 'Sakit Mata', 'Konjungtivitis', 'Selesai'),
(5, 'P005', 'D005', '2025-11-28 09:30:00', 'Telinga Berdengung', 'Otitis Media', 'Selesai'),
(6, 'P006', 'D006', '2025-11-28 10:00:00', 'Nyeri Perut', 'Dyspepsia', 'Selesai'),
(7, 'P007', 'D007', '2025-11-28 10:30:00', 'Luka Sayat', 'Vulnus Ictum', 'Selesai'),
(8, 'P008', 'D008', '2025-11-28 11:00:00', 'Gatal Kulit', 'Dermatitis', 'Selesai'),
(9, 'P009', 'D009', '2025-11-28 11:30:00', 'Sakit Kepala', 'Cephalgia', 'Selesai'),
(10, 'P010', 'D010', '2025-11-28 13:00:00', 'Nyeri Dada', 'Angina Pectoris', 'Selesai'),
(11, 'P011', 'D011', '2025-11-28 13:30:00', 'Sesak Nafas', 'Asthma', 'Selesai'),
(12, 'P012', 'D012', '2025-11-28 14:00:00', 'Patah Tulang Ringan', 'Fraktur', 'Selesai'),
(13, 'P013', 'D013', '2025-11-28 14:30:00', 'Susah Buang Air Kecil', 'ISK', 'Selesai'),
(14, 'P014', 'D014', '2025-11-28 15:00:00', 'Nyeri Otot', 'Myalgia', 'Selesai'),
(15, 'P015', 'D015', '2025-11-28 15:30:00', 'Berat Badan Turun', 'Malnutrisi', 'Selesai'),
(16, 'P016', 'D016', '2025-11-28 16:00:00', 'Stress', 'Anxiety', 'Selesai'),
(17, 'P017', 'D017', '2025-11-28 16:30:00', 'Lemas Lansia', 'Geriatri Problem', 'Selesai'),
(18, 'P018', 'D018', '2025-11-28 17:00:00', 'Nyeri Punggung', 'Low Back Pain', 'Selesai'),
(19, 'P019', 'D019', '2025-11-28 17:30:00', 'Ingin Operasi Hidung', 'Estetika', 'Selesai'),
(20, 'P020', 'D020', '2025-11-28 18:00:00', 'Visum', 'Pemeriksaan Luar', 'Selesai'),
(21, 'P021', 'D021', '2025-11-28 18:30:00', 'Cek Kesehatan', 'Medical Checkup', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode_obat` char(5) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `stok` int(11) DEFAULT 0,
  `harga_satuan` decimal(10,2) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `stok`, `harga_satuan`, `satuan`) VALUES
('OB01', 'Paracetamol', 100, 5000.00, 'Strip'),
('OB02', 'Amoxicillin', 50, 15000.00, 'Strip'),
('OB03', 'Asam Mefenamat', 100, 3000.00, 'Strip'),
('OB04', 'Cefadroxil', 50, 12000.00, 'Strip'),
('OB05', 'Antasida Doen', 200, 5000.00, 'Botol'),
('OB06', 'CTM', 150, 2000.00, 'Strip'),
('OB07', 'Dexamethasone', 100, 4000.00, 'Strip'),
('OB08', 'Ibuprofen', 80, 8000.00, 'Strip'),
('OB09', 'Loperamide', 60, 3500.00, 'Strip'),
('OB10', 'Metformin', 90, 7000.00, 'Strip'),
('OB11', 'Amlodipine', 100, 6000.00, 'Strip'),
('OB12', 'Simvastatin', 70, 15000.00, 'Strip'),
('OB13', 'Omeprazole', 80, 10000.00, 'Strip'),
('OB14', 'Ranitidine', 50, 5000.00, 'Strip'),
('OB15', 'Salbutamol', 40, 4000.00, 'Strip'),
('OB16', 'Vitamin C', 300, 15000.00, 'Botol'),
('OB17', 'Vitamin B Complex', 200, 10000.00, 'Botol'),
('OB18', 'Sangobion', 50, 20000.00, 'Strip'),
('OB19', 'Bodrex', 100, 3000.00, 'Strip'),
('OB20', 'Promag', 100, 8000.00, 'Strip'),
('OB21', 'Insto', 50, 15000.00, 'Botol'),
('OB22', 'Betadine', 30, 25000.00, 'Botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_pasien` char(5) NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nama_pasien`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `no_telepon`) VALUES
('P001', 'Udin Sedunia', 'Surabaya', '1995-05-20', 'L', '08123456789'),
('P002', 'Andi Wijaya', 'Jakarta Selatan', '1990-01-01', 'L', '081234567890'),
('P003', 'Bunga Citra', 'Bandung', '1992-02-02', 'P', '081234567891'),
('P004', 'Chandra Liow', 'Surabaya', '1988-03-03', 'L', '081234567892'),
('P005', 'Dinda Hauw', 'Malang', '1995-04-04', 'P', '081234567893'),
('P006', 'Erik Tohir', 'Medan', '1985-05-05', 'L', '081234567894'),
('P007', 'Fatin Shidqia', 'Semarang', '1998-06-06', 'P', '081234567895'),
('P008', 'Gilang Dirga', 'Yogyakarta', '1989-07-07', 'L', '081234567896'),
('P009', 'Hesti Purwadinata', 'Bogor', '1991-08-08', 'P', '081234567897'),
('P010', 'Indra Bekti', 'Depok', '1980-09-09', 'L', '081234567898'),
('P011', 'Jessica Mila', 'Tangerang', '1993-10-10', 'P', '081234567899'),
('P012', 'Kevin Julio', 'Bekasi', '1994-11-11', 'L', '081234567800'),
('P013', 'Luna Maya', 'Denpasar', '1983-12-12', 'P', '081234567801'),
('P014', 'Marcel Chandrawinata', 'Makassar', '1987-01-13', 'L', '081234567802'),
('P015', 'Nagita Slavina', 'Palembang', '1988-02-14', 'P', '081234567803'),
('P016', 'Omesh', 'Sukabumi', '1986-03-15', 'L', '081234567804'),
('P017', 'Prilly Latuconsina', 'Ambon', '1996-04-16', 'P', '081234567805'),
('P018', 'Raditya Dika', 'Jakarta Pusat', '1984-05-17', 'L', '081234567806'),
('P019', 'Syahrini', 'Sukabumi', '1982-06-18', 'P', '081234567807'),
('P020', 'Tora Sudiro', 'Jakarta Utara', '1975-07-19', 'L', '081234567808'),
('P021', 'Ussy Sulistiawaty', 'Jakarta Barat', '1981-08-20', 'P', '081234567809');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_bayar` char(10) NOT NULL,
  `no_kunjungan` int(11) DEFAULT NULL,
  `total_biaya_tindakan` decimal(10,2) DEFAULT NULL,
  `total_biaya_obat` decimal(10,2) DEFAULT NULL,
  `total_akhir` decimal(10,2) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_bayar`, `no_kunjungan`, `total_biaya_tindakan`, `total_biaya_obat`, `total_akhir`, `tgl_bayar`, `id_petugas`) VALUES
('BYR-001', 2, 30000.00, 15000.00, 45000.00, '2025-11-28 08:20:00', 3),
('BYR-002', 3, 30000.00, 5000.00, 35000.00, '2025-11-28 08:50:00', 3),
('BYR-003', 4, 30000.00, 15000.00, 45000.00, '2025-11-28 09:20:00', 3),
('BYR-004', 5, 60000.00, 24000.00, 84000.00, '2025-11-28 09:50:00', 3),
('BYR-005', 6, 30000.00, 8000.00, 38000.00, '2025-11-28 10:20:00', 3),
('BYR-006', 7, 50000.00, 25000.00, 75000.00, '2025-11-28 10:50:00', 3),
('BYR-007', 8, 30000.00, 6000.00, 36000.00, '2025-11-28 11:20:00', 3),
('BYR-008', 9, 30000.00, 15000.00, 45000.00, '2025-11-28 11:50:00', 3),
('BYR-009', 10, 100000.00, 6000.00, 106000.00, '2025-11-28 13:20:00', 3),
('BYR-010', 11, 75000.00, 4000.00, 79000.00, '2025-11-28 13:50:00', 3),
('BYR-011', 12, 150000.00, 24000.00, 174000.00, '2025-11-28 14:20:00', 3),
('BYR-012', 13, 30000.00, 36000.00, 66000.00, '2025-11-28 14:50:00', 3),
('BYR-013', 14, 30000.00, 9000.00, 39000.00, '2025-11-28 15:20:00', 3),
('BYR-014', 15, 30000.00, 10000.00, 40000.00, '2025-11-28 15:50:00', 3),
('BYR-015', 16, 20000.00, 10000.00, 30000.00, '2025-11-28 16:20:00', 3),
('BYR-016', 17, 30000.00, 15000.00, 45000.00, '2025-11-28 16:50:00', 3),
('BYR-017', 18, 30000.00, 6000.00, 36000.00, '2025-11-28 17:20:00', 3),
('BYR-018', 19, 750000.00, 24000.00, 774000.00, '2025-11-28 17:50:00', 3),
('BYR-019', 20, 25000.00, 6000.00, 31000.00, '2025-11-28 18:20:00', 3),
('BYR-020', 21, 25000.00, 15000.00, 40000.00, '2025-11-28 18:50:00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `lokasi_ruang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `lokasi_ruang`) VALUES
(1, 'Poli Umum', 'Lantai 1'),
(2, 'Poli Gigi', 'Lantai 2'),
(3, 'Poli Anak', 'Lantai 1'),
(4, 'Poli Kandungan', 'Lantai 2'),
(5, 'Poli Mata', 'Lantai 3'),
(6, 'Poli THT', 'Lantai 3'),
(7, 'Poli Penyakit Dalam', 'Lantai 1'),
(8, 'Poli Bedah', 'Lantai 1'),
(9, 'Poli Kulit & Kelamin', 'Lantai 2'),
(10, 'Poli Syaraf', 'Lantai 2'),
(11, 'Poli Jantung', 'Lantai 1'),
(12, 'Poli Paru', 'Lantai 3'),
(13, 'Poli Ortopedi', 'Lantai 1'),
(14, 'Poli Urologi', 'Lantai 2'),
(15, 'Poli Rehabilitasi Medik', 'Lantai 4'),
(16, 'Poli Gizi', 'Lantai 4'),
(17, 'Poli Psikologi', 'Lantai 4'),
(18, 'Poli Geriatri', 'Lantai 1'),
(19, 'Poli Akupuntur', 'Lantai 4'),
(20, 'Poli Bedah Plastik', 'Lantai 3'),
(21, 'Poli Forensik', 'Gedung Belakang'),
(22, 'Poli MCU', 'Lantai Dasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `no_resep` char(10) NOT NULL,
  `no_kunjungan` int(11) DEFAULT NULL,
  `tgl_resep` date DEFAULT NULL,
  `status_resep` enum('Antre','Diproses','Diambil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`no_resep`, `no_kunjungan`, `tgl_resep`, `status_resep`) VALUES
('R-001', 1, '2025-11-28', 'Diproses'),
('R-002', 2, '2025-11-28', 'Diambil'),
('R-003', 3, '2025-11-28', 'Diambil'),
('R-004', 4, '2025-11-28', 'Diambil'),
('R-005', 5, '2025-11-28', 'Diambil'),
('R-006', 6, '2025-11-28', 'Diambil'),
('R-007', 7, '2025-11-28', 'Diambil'),
('R-008', 8, '2025-11-28', 'Diambil'),
('R-009', 9, '2025-11-28', 'Diambil'),
('R-010', 10, '2025-11-28', 'Diambil'),
('R-011', 11, '2025-11-28', 'Diambil'),
('R-012', 12, '2025-11-28', 'Diambil'),
('R-013', 13, '2025-11-28', 'Diambil'),
('R-014', 14, '2025-11-28', 'Diambil'),
('R-015', 15, '2025-11-28', 'Diambil'),
('R-016', 16, '2025-11-28', 'Diambil'),
('R-017', 17, '2025-11-28', 'Diambil'),
('R-018', 18, '2025-11-28', 'Diambil'),
('R-019', 19, '2025-11-28', 'Diambil'),
('R-020', 20, '2025-11-28', 'Diambil'),
('R-021', 21, '2025-11-28', 'Diambil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `kode_tindakan` char(5) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `tarif` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`kode_tindakan`, `nama_tindakan`, `tarif`) VALUES
('T01', 'Konsultasi Dokter', 50000.00),
('T02', 'Cabut Gigi', 150000.00),
('T03', 'Pemeriksaan Umum', 30000.00),
('T04', 'Pemeriksaan Gigi', 40000.00),
('T05', 'Tambal Gigi', 100000.00),
('T06', 'Scaling Gigi', 150000.00),
('T07', 'Nebulizer', 75000.00),
('T08', 'Cek Gula Darah', 25000.00),
('T09', 'Cek Kolesterol', 35000.00),
('T10', 'Cek Asam Urat', 25000.00),
('T11', 'Jahit Luka Ringan', 100000.00),
('T12', 'Ganti Perban', 50000.00),
('T13', 'Suntik Vitamin', 50000.00),
('T14', 'EKG (Rekam Jantung)', 100000.00),
('T15', 'USG 2D', 150000.00),
('T16', 'USG 4D', 250000.00),
('T17', 'Khitan / Sunat', 500000.00),
('T18', 'Pembersihan Telinga', 60000.00),
('T19', 'Operasi Kecil', 750000.00),
('T20', 'Rawat Inap per Hari', 300000.00),
('T21', 'Surat Keterangan Sehat', 20000.00),
('T22', 'Tes Buta Warna', 25000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `role` enum('Admin','Dokter','Apoteker','Kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `role`) VALUES
(1, 'admin', '12345', 'Administrator', 'Admin'),
(2, 'dr_budi', '12345', 'Dr. Budi Santoso', 'Dokter'),
(3, 'kasir1', '12345', 'Siti Kasir', 'Kasir'),
(4, 'apotek1', '12345', 'Rina Farmasi', 'Apoteker'),
(5, 'dr_adi', '12345', 'Dr. Adi Pratama', 'Dokter'),
(6, 'dr_siti', '12345', 'Dr. Siti Aminah', 'Dokter'),
(7, 'dr_bambang', '12345', 'Dr. Bambang Pamungkas', 'Dokter'),
(8, 'dr_dewi', '12345', 'Dr. Dewi Sartika', 'Dokter'),
(9, 'dr_eko', '12345', 'Dr. Eko Patrio', 'Dokter'),
(10, 'dr_fajar', '12345', 'Dr. Fajar Nugraha', 'Dokter'),
(11, 'dr_gina', '12345', 'Dr. Gina Salsabila', 'Dokter'),
(12, 'dr_hadi', '12345', 'Dr. Hadi Sucipto', 'Dokter'),
(13, 'dr_indah', '12345', 'Dr. Indah Permata', 'Dokter'),
(14, 'dr_joko', '12345', 'Dr. Joko Anwar', 'Dokter'),
(15, 'dr_kartika', '12345', 'Dr. Kartika Putri', 'Dokter'),
(16, 'dr_lukman', '12345', 'Dr. Lukman Hakim', 'Dokter'),
(17, 'dr_maiya', '12345', 'Dr. Maiya Estianty', 'Dokter'),
(18, 'dr_nana', '12345', 'Dr. Nana Mirdad', 'Dokter'),
(19, 'dr_oscar', '12345', 'Dr. Oscar Oasis', 'Dokter'),
(20, 'dr_putri', '12345', 'Dr. Putri Titian', 'Dokter'),
(21, 'dr_qori', '12345', 'Dr. Qori Sandioriva', 'Dokter'),
(22, 'dr_rio', '12345', 'Dr. Rio Febrian', 'Dokter'),
(23, 'dr_sandra', '12345', 'Dr. Sandra Dewi', 'Dokter'),
(24, 'dr_tommy', '12345', 'Dr. Tommy Kurniawan', 'Dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `no_resep` (`no_resep`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`no_dokter`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`no_kunjungan`),
  ADD KEY `no_pasien` (`no_pasien`),
  ADD KEY `no_dokter` (`no_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_pasien`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_bayar`),
  ADD KEY `no_kunjungan` (`no_kunjungan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`no_resep`),
  ADD KEY `no_kunjungan` (`no_kunjungan`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kode_tindakan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `no_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`no_resep`) REFERENCES `resep` (`no_resep`),
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`no_pasien`) REFERENCES `pasien` (`no_pasien`),
  ADD CONSTRAINT `kunjungan_ibfk_2` FOREIGN KEY (`no_dokter`) REFERENCES `dokter` (`no_dokter`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`no_kunjungan`) REFERENCES `kunjungan` (`no_kunjungan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`no_kunjungan`) REFERENCES `kunjungan` (`no_kunjungan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
