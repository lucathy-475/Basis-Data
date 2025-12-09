<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan SDM</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f5f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #0b2c61;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
        }
        .sidebar h4 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #cfd8e3;
            font-size: 15px;
            text-decoration: none;
            border-left: 4px solid transparent;
            transition: 0.2s;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-left: 4px solid #ffc107;
        }

        /* TOPBAR */
        .topbar {
            width: calc(100% - 240px);
            margin-left: 240px;
            height: 65px;
            background: #ffffff;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            z-index: 10;
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding-top: 90px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>Klinik Sehat+</h4>

    <a href="dashboard_manajer.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
    <a href="laporan_sdm.php"><i class="fas fa-users me-2"></i> Laporan SDM</a>
    <a href="laporan_keuangan.php"><i class="fas fa-money-bill-wave me-2"></i> Laporan Keuangan</a>
    <a href="statistik_kunjungan.php"><i class="fas fa-chart-line me-2"></i> Statistik Kunjungan</a>
    <a href="stok_obat.php"><i class="fas fa-pills me-2"></i> Stok Obat</a>
</div>

<!-- TOPBAR -->
<div class="topbar">
    <h5 class="m-0"><i class="fas fa-users me-2 text-primary"></i> Laporan SDM</h5>
</div>

<!-- CONTENT -->
<div class="content">
    <div class="container">

        <!-- DATA DOKTER -->
        <div class="card mb-4 shadow-sm rounded-3">
            <div class="card-header bg-primary text-white fw-bold">
                <i class="fas fa-user-md me-2"></i> Data Dokter
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama</th>
                            <th>Spesialis</th>
                            <th>Pasien / Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Dr. Dimas</td><td>Jantung</td><td>120</td></tr>
                        <tr><td>Dr. Ayu</td><td>Umum</td><td>98</td></tr>
                        <tr><td>Dr. Bian</td><td>Anak</td><td>87</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- DATA PEGAWAI -->
        <div class="card shadow-sm rounded-3">
            <div class="card-header bg-success text-white fw-bold">
                <i class="fas fa-user-nurse me-2"></i> Data Pegawai
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Shift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Siti</td><td>Perawat</td><td>Pagi</td></tr>
                        <tr><td>Dika</td><td>Farmasi</td><td>Siang</td></tr>
                        <tr><td>Nina</td><td>Administrasi</td><td>Malam</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</body>
</html>
