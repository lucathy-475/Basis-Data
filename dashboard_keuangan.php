<?php
include 'koneksi.php';
if (!isset($_SESSION['logged_in']) || ($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'Manajer')) {
    // Jika Role Keuangan benar-benar ada di DB, ubah kondisinya di atas.
    header("Location: login.php");
    exit;
}
$user_name = $_SESSION['nama_lengkap'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <div class="bg-dark text-white border-end sidebar-wrapper" id="sidebar-wrapper">
        <div class="sidebar-heading p-4 text-center border-bottom text-primary fw-bold fs-5"><i class="fas fa-money-check-alt me-2"></i> KEUANGAN</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-file-invoice-dollar me-2"></i> Laporan Harian</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-chart-line me-2"></i> Laporan Bulanan</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-print me-2"></i> Cetak Pembayaran</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm sticky-top">
            <div class="container-fluid">
                <button class="btn btn-outline-primary" id="sidebarToggle"><i class="fas fa-bars"></i> Menu</button>
                <span class="navbar-text me-3 d-none d-md-inline">Selamat Datang, **<?php echo $user_name; ?>** (Keuangan)!</span>
                <a href="login.php?logout=true" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <h1 class="mb-4 text-primary"><i class="fas fa-chart-bar"></i> Ringkasan Keuangan</h1>
            <p class="lead">Monitoring pendapatan dan pengeluaran klinik.</p>
            </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>document.getElementById("sidebarToggle").addEventListener("click", () => {document.getElementById("wrapper").classList.toggle("toggled");});</script>
</body>
</html>