<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>

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
    <h5 class="m-0"><i class="fas fa-money-bill-wave me-2 text-success"></i> Laporan Keuangan</h5>
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

        <!-- Kartu Laporan -->
        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">Pemasukan Bulan Ini</h6>
                        <p class="fs-3 fw-bold text-success">Rp 128.450.000</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">Pengeluaran Bulan Ini</h6>
                        <p class="fs-3 fw-bold text-danger">Rp 78.300.000</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center">
                        <h6 class="fw-bold">Laba Bersih</h6>
                        <p class="fs-3 fw-bold text-primary">Rp 50.150.000</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tabel Transaksi -->
        <div class="card shadow-sm mt-4 rounded-3">
            <div class="card-header bg-warning text-white fw-bold">
                <i class="fas fa-file-invoice-dollar me-2"></i> Detail Transaksi Terakhir
            </div>
            <div class="card-body">
                <table id="tabelKeuangan" class="table table-hover">
                    <thead class="table-warning">
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>2025-12-01</td><td>Pembayaran Konsultasi</td><td>Rp 350.000</td></tr>
                        <tr><td>2025-12-02</td><td>Pembelian Obat</td><td>-Rp 1.200.000</td></tr>
                        <tr><td>2025-12-03</td><td>Rawat Inap</td><td>Rp 2.500.000</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- ========== SCRIPT EXPORT EXCEL ========== -->
<script>
function exportExcel() {
    const table = document.getElementById("tabelKeuangan");
    const html = table.outerHTML;

    const blob = new Blob([html], { type: "application/vnd.ms-excel" });
    const url = URL.createObjectURL(blob);

    const a = document.createElement("a");
    a.href = url;
    a.download = "Laporan_Keuangan.xls";
    a.click();
}
</script>

</body>
</html>
