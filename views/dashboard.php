<?php
include 'koneksi.php';

// Ambil data total
$total_admin = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM admin"))['total'];
$total_jabatan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM jabatan"))['total'];
$total_kategori = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kategori"))['total'];
$total_konten = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM konten"))['total'];
$total_komentar = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM komentar"))['total'];

// Ambil data konten per kategori
$kategori_query = mysqli_query($koneksi, "
  SELECT kategori.namakategori, COUNT(konten.idkonten) AS jumlah
  FROM kategori
  LEFT JOIN konten ON kategori.idkategori = konten.idkategori
  GROUP BY kategori.idkategori
");
$kategori_nama = [];
$kategori_jumlah = [];
while ($row = mysqli_fetch_assoc($kategori_query)) {
  $kategori_nama[] = $row['namakategori'];
  $kategori_jumlah[] = $row['jumlah'];
}

// Ambil 5 konten terbaru
$konten_terbaru = mysqli_query($koneksi, "SELECT * FROM konten ORDER BY tanggalpublikasi DESC LIMIT 5");
?>

<section class="content">
  <div class="container-fluid">
    <h4 class="mb-3 text-white"></h4>

    <!-- Info Box -->
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="info-box bg-primary">
          <span class="info-box-icon"><i class="fas fa-user-shield"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Admin</span>
            <span class="info-box-number"><?= $total_admin; ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="info-box bg-success">
          <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jabatan</span>
            <span class="info-box-number"><?= $total_jabatan; ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="info-box bg-warning">
          <span class="info-box-icon"><i class="fas fa-tags"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Kategori</span>
            <span class="info-box-number"><?= $total_kategori; ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="info-box bg-info">
          <span class="info-box-icon"><i class="fas fa-newspaper"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Konten</span>
            <span class="info-box-number"><?= $total_konten; ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i class="fas fa-comments"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Komentar</span>
            <span class="info-box-number"><?= $total_komentar; ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- Grafik dan Konten -->
    <div class="row mt-4">
      <!-- Grafik Konten per Kategori -->
      <div class="col-md-6">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h5 class="card-title">Statistik Konten per Kategori</h5>
          </div>
          <div class="card-body">
            <canvas id="chartKategori"></canvas>
          </div>
        </div>
      </div>

      <!-- Tabel Konten Terbaru -->
<div class="col-md-6">
  <div class="card card-outline card-success">
    <div class="card-header">
      <h5 class="card-title">Konten Terbaru</h5>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped mb-0">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($k = mysqli_fetch_assoc($konten_terbaru)) { ?>
            <tr>
              <td><?= htmlspecialchars($k['judul']); ?></td>
              <td><?= date('d M Y', strtotime($k['tanggalpublikasi'])); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


  </div>
</section>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartKategori');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($kategori_nama); ?>,
    datasets: [{
      label: 'Jumlah Konten',
      data: <?= json_encode($kategori_jumlah); ?>,
      borderWidth: 1,
      backgroundColor: '#007bff'
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true }
    }
  }
});
</script>
