<?php

$user_name = "Admin Klinik";
$current_date = date("d F Y");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="d-flex" id="wrapper">
    <div class="bg-dark text-white border-end sidebar-wrapper" id="sidebar-wrapper">
        <div class="sidebar-heading p-4 text-center border-bottom text-primary fw-bold fs-5">
            <i class="fas fa-heartbeat me-2"></i> K-HEALTH
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white active">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-user-injured me-2"></i> Data Pasien
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-calendar-check me-2"></i> Jadwal
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-briefcase-medical me-2"></i> Layanan
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-dollar-sign me-2"></i> Pembayaran
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-cog me-2"></i> Pengaturan
            </a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm sticky-top">
            <div class="container-fluid">
                <button class="btn btn-outline-primary" id="sidebarToggle"><i class="fas fa-bars"></i> Menu</button>
                <div class="d-flex align-items-center">
                    <span class="navbar-text me-3 d-none d-md-inline">
                        Selamat Datang, **<?php echo $user_name; ?>**!
                    </span>
                    <a href="login.php" class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <h1 class="mb-4 text-primary"><i class="fas fa-tachometer-alt"></i> Dashboard Utama</h1>
            <p class="lead">Ringkasan aktivitas dan statistik klinik Anda hari ini: **<?php echo $current_date; ?>**.</p>

            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-primary h-100 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold">Pasien Hari Ini</div>
                                    <div class="h2 fw-bold mt-2">15</div>
                                </div>
                                <i class="fas fa-user-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-warning h-100 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold">Janji Temu (Pending)</div>
                                    <div class="h2 fw-bold mt-2">4</div>
                                </div>
                                <i class="fas fa-clock fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-success h-100 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold">Dokter Aktif</div>
                                    <div class="h2 fw-bold mt-2">6</div>
                                </div>
                                <i class="fas fa-user-md fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-info h-100 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-uppercase fw-bold">Pendapatan (Bulan Ini)</div>
                                    <div class="h2 fw-bold mt-2">Rp52 Jt</div>
                                </div>
                                <i class="fas fa-chart-line fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header bg-light fw-bold">
                    <i class="fas fa-list-alt me-2"></i> Aktivitas Terbaru
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Pasien **Budi Santoso** telah mendaftar pada pukul 10:15.</li>
                        <li class="list-group-item">Janji temu baru dengan **Dr. Amelia** pada pukul 14:00.</li>
                        <li class="list-group-item">Stock obat **Paracetamol** telah diperbarui.</li>
                    </ul>
                </div>
            </div>

        </div>
        <footer class="footer mt-auto py-3 bg-light border-top">
            <div class="container-fluid">
                <span class="text-muted">© <?php echo date("Y"); ?> Klinik Sehat. Hak Cipta Dilindungi.</span>
            </div>
        </footer>

    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle Sidebar Script
    document.getElementById("sidebarToggle").addEventListener("click", () => {
        document.getElementById("wrapper").classList.toggle("toggled");
    });
</script>
</body>
</html>