<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Kunjungan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding-top: 40px;
        }

        /* PRINT MODE */
        @media print {
            .sidebar,
            button,
            .btn {
                display: none !important;
            }

            .content {
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
        }
    </style>
</head>

<body>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">
    <h4 class="text-center mb-4">Manajer Panel</h4>

    <a href="dashboard_manajer.php"><i class="fas fa-home me-2"></i> Dashboard</a>
    <a href="laporan_sdm.php"><i class="fas fa-users me-2"></i> Laporan SDM</a>
    <a href="laporan_keuangan.php"><i class="fas fa-money-bill-wave me-2"></i> Laporan Keuangan</a>
    <a href="statistik_kunjungan.php"><i class="fas fa-chart-bar me-2"></i> Statistik</a>
    <a href="stok_obat.php"><i class="fas fa-pills me-2"></i> Stok Obat</a>
</div>

<!-- ================= CONTENT ================= -->
<div class="content">

    <h2 class="mb-4 text-primary">
        <i class="fas fa-chart-bar me-2"></i> Statistik Kunjungan
    </h2>

    <!-- BUTTON EXPORT -->
    <div class="d-flex justify-content-end mb-3">
        <button onclick="window.print()" class="btn btn-danger me-2">
            <i class="fas fa-file-pdf me-1"></i> Cetak PDF
        </button>

        <button onclick="exportExcel()" class="btn btn-success">
            <i class="fas fa-file-excel me-1"></i> Export Excel
        </button>
    </div>

    <!-- ========== CARD GRAFIK ========== -->
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <i class="fas fa-chart-line me-2"></i> Grafik Kunjungan Bulanan
        </div>
        <div class="card-body">
            <canvas id="chartKunjungan" height="100"></canvas>
        </div>
    </div>

</div>

<!-- ================= CHART SCRIPT ================= -->
<script>
const bulan = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];
const dataKunjungan = [120, 140, 134, 156, 167, 178, 189, 174, 160, 145, 155, 190];

new Chart(document.getElementById("chartKunjungan"), {
    type: "line",
    data: {
        labels: bulan,
        datasets: [{
            label: "Jumlah Kunjungan",
            data: dataKunjungan,
            borderWidth: 2,
            borderColor: "#0d6efd"
        }]
    }
});
</script>

<!-- EXPORT EXCEL -->
<script>
function exportExcel() {
    let tableHTML = `
        <table border='1'>
            <tr><th>Bulan</th><th>Jumlah Kunjungan</th></tr>
    `;

    for (let i = 0; i < bulan.length; i++) {
        tableHTML += `<tr><td>${bulan[i]}</td><td>${dataKunjungan[i]}</td></tr>`;
    }

    tableHTML += "</table>";

    const blob = new Blob([tableHTML], { type: "application/vnd.ms-excel" });
    const url = URL.createObjectURL(blob);

    const a = document.createElement("a");
    a.href = url;
    a.download = "Statistik_Kunjungan.xls";
    a.click();
}
</script>

</body>
</html>
