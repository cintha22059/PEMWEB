async function fetchData() {
  const response = await fetch('fetch_data.php');
  const data = await response.json();
  return data;
}

async function drawChart() {
  const data = await fetchData();
  const jenisLabels = data.jenis.map(item => item.jenis);
  const jenisDataValues = data.jenis.map(item => item.jumlah);

  const jenisChart = new Chart(document.getElementById('jenis-chart'), {
      type: 'bar',
      data: {
          labels: jenisLabels,
          datasets: [{
              label: 'Jumlah Pengaduan per Jenis',
              data: jenisDataValues,
              backgroundColor: ['#6c8196', '#bdd9bf', '#f5dcab'],
              borderColor: ['#6c8196', '#bdd9bf', '#f5dcab'],
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

async function drawChartWaktu() {
  const data = await fetchData();
  const waktuLabels = data.waktu.map(item => item.jenis);
  const waktuDataValues = data.waktu.map(item => item.rata_waktu);

  const ctx = document.getElementById('waktu-chart').getContext('2d');
  const chart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: waktuLabels,
          datasets: [
              {
                  label: 'Rata-rata Waktu Penyelesaian (Hari)',
                  data: waktuDataValues,
                  backgroundColor: ['#6c8196', '#bdd9bf', '#f5dcab'],
                  borderColor: ['#6c8196', '#bdd9bf', '#f5dcab'],
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

async function drawWilayahChart() {
  const data = await fetchData();
  const wilayahLabels = data.wilayah.map(item => item.wilayah);
  const wilayahDataValues = data.wilayah.map(item => item.jumlah);

  const ctx = document.getElementById('wilayah-chart').getContext('2d');
  new Chart(ctx, {
      type: 'pie',
      data: {
          labels: wilayahLabels,
          datasets: [{
              data: wilayahDataValues,
              backgroundColor: ['#6c8196', '#bdd9bf', '#f5dcab'],
              borderColor: ['#6c8196', '#bdd9bf', '#f5dcab'],
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

document.addEventListener('DOMContentLoaded', function () {
  drawChart();
  drawChartWaktu();
  drawWilayahChart();
});
