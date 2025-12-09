<?php
session_start();
include 'koneksi.php';

// 1. Cek Login & Role
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'Dokter') {
    header("Location: login.php");
    exit;
}

$user_name = $_SESSION['nama_lengkap'];
$id_user_current = $_SESSION['id_user'];

// 2. Dapatkan No_Dokter dari sesi login
// Kita perlu tahu siapa dokter yang login agar history-nya tidak tertukar
$query_dokter = mysqli_query($koneksi, "SELECT no_dokter FROM dokter WHERE id_user = '$id_user_current'");
$data_dokter = mysqli_fetch_assoc($query_dokter);

if ($data_dokter) {
    $no_dokter_login = $data_dokter['no_dokter'];
} else {
    echo "Error: Data dokter tidak ditemukan.";
    exit;
}

// 3. Logika Pencarian (Search)
$search_keyword = "";
$search_query = "";

if (isset($_GET['cari'])) {
    $search_keyword = mysqli_real_escape_string($koneksi, $_GET['cari']);
    // Cari berdasarkan Nama Pasien ATAU Diagnosa
    $search_query = " AND (p.nama_pasien LIKE '%$search_keyword%' OR k.diagnosa LIKE '%$search_keyword%') ";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Riwayat Pasien - Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-dark text-white border-end sidebar-wrapper" id="sidebar-wrapper">
        <div class="sidebar-heading p-4 text-center border-bottom text-primary fw-bold fs-5"><i class="fas fa-user-md me-2"></i> DR. PANEL</div>
        <div class="list-group list-group-flush">
            <a href="dashboard_dokter.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            <a href="daftar_kunjungan.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-procedures me-2"></i> Daftar Kunjungan</a>
            <a href="riwayat_pasien.php" class="list-group-item list-group-item-action bg-dark text-white active"><i class="fas fa-history me-2"></i> Riwayat Pasien</a>
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
            <h1 class="mb-4 text-primary"><i class="fas fa-history"></i> Riwayat Pengobatan Pasien</h1>
            <p class="lead">Daftar pasien yang telah selesai Anda tangani.</p>
            
            <div class="card shadow mb-4">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="m-0 font-weight-bold text-primary">Log Medis Pasien</h5>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="GET" class="d-flex">
                                <input class="form-control me-2" type="search" name="cari" placeholder="Cari nama pasien atau diagnosa..." value="<?php echo $search_keyword; ?>" aria-label="Search">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                <?php if($search_keyword): ?>
                                    <a href="riwayat_pasien.php" class="btn btn-secondary ms-2"><i class="fas fa-sync"></i></a>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan Awal</th>
                                    <th>Diagnosa Dokter</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // 4. QUERY UTAMA
                                // Mengambil data kunjungan + nama pasien
                                // Filter: Hanya milik dokter login, Status Selesai, dan Filter Pencarian
                                $query_riwayat = "
                                    SELECT k.tgl_periksa, k.keluhan, k.diagnosa, k.status, p.nama_pasien, p.alamat
                                    FROM kunjungan k
                                    JOIN pasien p ON k.no_pasien = p.no_pasien
                                    WHERE k.no_dokter = '$no_dokter_login' 
                                    AND k.status = 'Selesai'
                                    $search_query
                                    ORDER BY k.tgl_periksa DESC
                                ";
                                
                                $result = mysqli_query($koneksi, $query_riwayat);
                                $no = 1;

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $tgl_indo = date('d-m-Y H:i', strtotime($row['tgl_periksa']));
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $tgl_indo; ?></td>
                                        <td>
                                            <strong><?php echo $row['nama_pasien']; ?></strong><br>
                                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> <?php echo $row['alamat']; ?></small>
                                        </td>
                                        <td><?php echo $row['keluhan']; ?></td>
                                        <td class="text-primary fw-bold"><?php echo $row['diagnosa']; ?></td>
                                        <td><span class="badge bg-success"><i class="fas fa-check-circle"></i> Selesai</span></td>
                                    </tr>
                                <?php 
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center text-muted py-4'>Belum ada riwayat pengobatan yang ditemukan.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("sidebarToggle").addEventListener("click", () => {document.getElementById("wrapper").classList.toggle("toggled");});</script>
</body>
</html>