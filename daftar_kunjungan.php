<?php
include 'koneksi.php';

// 1. Cek Login & Role
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'Dokter') {
    header("Location: login.php");
    exit;
}

$user_name = $_SESSION['nama_lengkap'];
$id_user_current = $_SESSION['id_user']; // Pastikan ini diset saat proses login!

// 2. Cari No_Dokter berdasarkan ID User yang login
// Kita butuh no_dokter untuk memfilter kunjungan
$query_dokter = mysqli_query($koneksi, "SELECT no_dokter FROM dokter WHERE id_user = '$id_user_current'");
$data_dokter = mysqli_fetch_assoc($query_dokter);

if ($data_dokter) {
    $no_dokter_login = $data_dokter['no_dokter'];
} else {
    // Error handling jika data dokter tidak ditemukan
    echo "Error: Data dokter tidak ditemukan untuk user ini.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-dark text-white border-end sidebar-wrapper" id="sidebar-wrapper">
        <div class="sidebar-heading p-4 text-center border-bottom text-primary fw-bold fs-5"><i class="fas fa-user-md me-2"></i> DR. PANEL</div>
        <div class="list-group list-group-flush">
            <a href="dashboard_dokter.php" class="list-group-item list-group-item-action bg-dark text-white active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            <a href="daftar_kunjungan.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-procedures me-2"></i> Daftar Kunjungan</a>
            <a href="riwayat_pasien.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-history me-2"></i> Riwayat Pasien</a>
        </div>
    </div>
    
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm sticky-top">
            <div class="container-fluid">
                <button class="btn btn-outline-primary" id="sidebarToggle"><i class="fas fa-bars"></i> Menu</button>
                <span class="navbar-text me-3 d-none d-md-inline">Selamat Datang, <b><?php echo $user_name; ?></b> (Dokter)!</span>
                <a href="login.php?logout=true" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </div>
        </nav>

        <div class="container-fluid py-4">
            <h1 class="mb-4 text-primary"><i class="fas fa-procedures"></i> Daftar Pasien Hari Ini</h1>
            <p class="lead">Berikut adalah daftar pasien yang mengantre untuk Anda hari ini.</p>
            
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white fw-bold">Antrian Kunjungan (Status: Menunggu)</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Waktu Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // 3. Query Mengambil Data Pasien
                            // Syarat: Pasien milik dokter yg login, Tanggal hari ini, Status 'Menunggu'
                            $query_kunjungan = "
                                SELECT k.no_kunjungan, p.nama_pasien, k.keluhan, k.tgl_periksa, k.status
                                FROM kunjungan k
                                JOIN pasien p ON k.no_pasien = p.no_pasien
                                WHERE k.no_dokter = '$no_dokter_login' 
                                AND DATE(k.tgl_periksa) = CURDATE()
                                AND k.status = 'Menunggu'
                                ORDER BY k.tgl_periksa ASC
                            ";
                            
                            $result = mysqli_query($koneksi, $query_kunjungan);
                            $no = 1;

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Format jam saja dari tgl_periksa
                                    $jam_periksa = date('H:i', strtotime($row['tgl_periksa']));
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_pasien']; ?></td>
                                    <td><?php echo $row['keluhan']; ?></td>
                                    <td><?php echo $jam_periksa; ?> WIB</td>
                                    <td><span class="badge bg-warning text-dark"><?php echo $row['status']; ?></span></td>
                                    <td>
                                        <a href="periksa_pasien.php?no_kunjungan=<?php echo $row['no_kunjungan']; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-stethoscope"></i> Periksa
                                        </a>
                                    </td>
                                </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center text-muted'>Tidak ada antrian pasien untuk Anda hari ini.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("sidebarToggle").addEventListener("click", () => {document.getElementById("wrapper").classList.toggle("toggled");});</script>
</body>
</html>