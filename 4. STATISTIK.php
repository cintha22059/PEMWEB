<?php
include "conn/db_connect.php";
include "conn/sesion.php";

// Fungsi untuk mengeksekusi query dan menangani error
function executeQuery($conn, $query) {
    $result = $conn->query($query);
    if (!$result) {
        die("Query error: " . $conn->error);
    }
    return $result;
}

// Ambil data jumlah pengaduan per jenis
$queryJenis = "SELECT kategori_pengaduan, COUNT(*) as jumlah FROM pengaduan GROUP BY kategori_pengaduan";
$resultJenis = executeQuery($conn, $queryJenis);
$dataJenis = [];
while ($row = $resultJenis->fetch_assoc()) {
    $dataJenis[] = $row;
}

// Ambil data rata-rata waktu penyelesaian per jenis
$queryWaktu = "SELECT kategori_pengaduan, AVG(tanggal) as rata_waktu FROM pengaduan GROUP BY kategori_pengaduan";
$resultWaktu = executeQuery($conn, $queryWaktu);
$dataWaktu = [];
while ($row = $resultWaktu->fetch_assoc()) {
    $dataWaktu[] = $row;
}

// Ambil data jumlah pengaduan per wilayah
$queryWilayah = "SELECT wilayah, COUNT(*) as jumlah FROM pengaduan GROUP BY wilayah";
$resultWilayah = executeQuery($conn, $queryWilayah);
$dataWilayah = [];
while ($row = $resultWilayah->fetch_assoc()) {
    $dataWilayah[] = $row;
}

// Ambil data 10 pengaduan terakhir
$queryTerbaru = "
    SELECT p.id_pengaduan, p.tanggal, s.status 
    FROM pengaduan p 
    JOIN status_pengaduan s ON p.id_pengaduan = s.id_pengaduan
    ORDER BY p.tanggal DESC 
    LIMIT 10
";
$resultTerbaru = executeQuery($conn, $queryTerbaru);
$dataTerbaru = [];
while ($row = $resultTerbaru->fetch_assoc()) {
    $dataTerbaru[] = $row;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="indexstyle.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Statistik dan Analisis - Layanan Pengaduan</title>
<style>
/* CSS */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5;
}
h1 {
    font-size: 2.5rem;
}

h2 {
    font-size: 1.75rem;
    margin-bottom: 2rem;
    border-bottom: 5px solid #ffc857;
    padding-bottom: 0.5rem;
}
.header {
    margin-top: 60px;
    background-color: #760504;
    color: #412234;
    padding: 1rem;
    text-align: center;
}

.chart-header{
    margin-bottom: 1.5rem;
}
.header h1 {
    color: white;
} 

.container {
    padding: 3rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    background-color: #fff;
    border-radius: 0.5rem;
}

.header h2 {
    color: #000000;
}

.chart-header {
    margin-bottom: 1.5rem;
}

.chart {
    border: 1px solid #ddd;
    border-radius: 0.5rem;
    padding: 1rem;
    box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

h2.chart-label {
    color: #000000;
    background-color: #ffc857;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.chart-container-inner {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding: 1rem;
    box-sizing: border-box;
}

.chart-container-inner table {
    flex: 1;
    margin-right: 1rem;
}

.chart-container-inner .chart {
    flex: 1;
    margin-left: 1rem;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #760504;
    color: #FFFFFF;
}

tr:nth-child(even) {
    background-color: #f3e8d2;
}
</style>
</head>
<?php include "asset/navbar.php" ?>
<body>
<div class="header">
    <h1>Statistik dan Analisis</h1>
</div>
<div class="chart-container">
    <div class="chart-header">
        <h2>Jumlah Pengaduan per Jenis</h2>
    </div>
    <div class="chart-container-inner">
        <table>
            <thead>
                <tr>
                    <th>Jenis Pengaduan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataJenis as $jenis): ?>
                <tr>
                    <td><?php echo $jenis['kategori_pengaduan']; ?></td>
                    <td><?php echo $jenis['jumlah']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="chart" id="jenis-chart-container">
            <canvas id="jenis-chart" width="400" height="100"></canvas>
        </div>
    </div>
</div>

<div class="chart-container card card-body">
    <div class="chart-header">
        <h2>Rata-rata Waktu Penyelesaian Pengaduan (Hari)</h2>
    </div>
    <div class="chart-container-inner">
        <table>
            <thead>
                <tr>
                    <th>Jenis Pengaduan</th>
                    <th>Rata-rata Waktu Penyelesaian</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataWaktu as $waktu): ?>
                <tr>
                    <td><?php echo $waktu['kategori_pengaduan']; ?></td>
                    <td><?php echo round($waktu['rata_waktu'], 2); ?> hari</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>    
        <div class="chart" id="waktu-chart-container">
            <canvas id="waktu-chart" width="600" height="200"></canvas>
        </div>           
    </div>
</div>

<div class="chart-container">
    <div class="chart-header">
        <h2>Pengaduan Terbanyak dari Wilayah</h2>
    </div>
    <div class="chart-container-inner">
        <table>
            <thead>
                <tr>
                    <th>Wilayah</th>
                    <th>Jumlah Pengaduan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataWilayah as $wilayah): ?>
                <tr>
                    <td><?php echo $wilayah['wilayah']; ?></td>
                    <td><?php echo $wilayah['jumlah']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="chart" id="wilayah-chart-container">
            <canvas id="wilayah-chart" width="400" height="300"></canvas>
        </div>
    </div>
</div>

<h2 class="chart-label">10 Pengaduan Terbaru</h2>
<table>
    <thead>
        <tr>
            <th>Nomor Pengaduan</th>
            <th>Tanggal Pengaduan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataTerbaru as $pengaduan): ?>
        <tr>
            <td><?php echo $pengaduan['id_pengaduan']; ?></td>
            <td><?php echo $pengaduan['tanggal']; ?></td>
            <td><?php echo $pengaduan['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    const jenisData = <?php echo json_encode($dataJenis); ?>;
    const waktuData = <?php echo json_encode($dataWaktu); ?>;
    const wilayahData = <?php echo json_encode($dataWilayah); ?>;

    function drawChart() {
        const labels = jenisData.map(item => item.kategori_pengaduan);
        const dataValues = jenisData.map(item => item.jumlah);

        const jenisChart = new Chart(document.getElementById('jenis-chart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pengaduan per Jenis',
                    data: dataValues,
                    backgroundColor: ['#6c8196', '#bdd9bf','#f5dcab'],
                    borderColor: ['#6c8196', '#bdd9bf','#f5dcab'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function drawChartWaktu() {
        const labels = waktuData.map(item => item.kategori_pengaduan);
        const dataValues = waktuData.map(item => item.rata_waktu);

        const ctx = document.getElementById('waktu-chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Rata-rata Waktu Penyelesaian (Hari)',
                        data: dataValues,
                        backgroundColor: ['#6c8196', '#bdd9bf','#f5dcab'],
                        borderColor: ['#6c8196', '#bdd9bf','#f5dcab'],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function drawWilayahChart() {
        const labels = wilayahData.map(item => item.wilayah);
        const dataValues = wilayahData.map(item => item.jumlah);

        const ctx = document.getElementById('wilayah-chart').getContext('2d');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: ['#6c8196', '#bdd9bf','#f5dcab'],
                    borderColor: ['#6c8196', '#bdd9bf','#f5dcab'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 1,
                width: 400,
                height: 300
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        drawChart();
        drawChartWaktu();
        drawWilayahChart();
    });
</script>

</body>
</html>
