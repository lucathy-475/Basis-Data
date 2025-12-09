<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Obat & Logistik</title>

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

        /* PRINT MODE */
        @media print {
            .sidebar,
            .topbar,
            .btn,
            button {
                display: none !important;
            }
            .content {
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
            table {
                zoom: 90%;
            }
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
    <h5 class="m-0">
        <i class="fas fa-pills me-2 text-primary"></i> Stok Obat & Logistik
    </h5>
</div>

<!-- CONTENT -->
<div class="content">
    <div class="container">

        <!-- BUTTON EXPORT -->
        <div class="d-flex justify-content-end mb-3">
            <button onclick="window.print()" class="btn btn-danger me-2">
                <i class="fas fa-file-pdf me-1"></i> Cetak PDF
            </button>

            <button onclick="exportExcel()" class="btn btn-success">
                <i class="fas fa-file-excel me-1"></i> Export Excel
            </button>
        </div>

        <!-- DATA STOK OBAT -->
        <div class="card mb-4 shadow-sm rounded-3">
            <div class="card-header bg-danger text-white fw-bold">
                <i class="fas fa-pills me-2"></i> Daftar Stok Obat
            </div>
            <div class="card-body">
                <table id="tabelObat" class="table table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                            <th>Kadaluarsa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Paracetamol</td><td>250</td><td>2026-02-12</td></tr>
                        <tr><td>Amoxicillin</td><td>80</td><td>2025-10-01</td></tr>
                        <tr><td>Oralit</td><td>310</td><td>2027-01-15</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- EXPORT EXCEL -->
<script>
function exportExcel() {
    const table = document.getElementById("tabelObat");
    const html = table.outerHTML;

    const blob = new Blob([html], { type: "application/vnd.ms-excel" });
    const url = URL.createObjectURL(blob);

    const a = document.createElement("a");
    a.href = url;
    a.download = "Stok_Obat.xls";
    a.click();
}
</script>

</body>
</html>
