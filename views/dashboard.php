<?php
// Pastikan koneksi tersedia
if (!isset($koneksi)) {
    include_once __DIR__ . '/../../koneksi.php';
}

// Aktifkan error saat pengembangan
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ========== Ambil data total ==========
function get_total($koneksi, $table)
{
    $result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM $table");
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

$total_admin    = get_total($koneksi, 'admin');
$total_jabatan  = get_total($koneksi, 'jabatan');
$total_kategori = get_total($koneksi, 'kategori');
$total_konten   = get_total($koneksi, 'konten');
$total_komentar = get_total($koneksi, 'komentar');

// ========== Ambil data konten per kategori ==========
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

// ========== Ambil 5 konten terbaru ==========
$konten_terbaru = mysqli_query($koneksi, "
    SELECT judul, tanggalpublikasi
    FROM konten
    ORDER BY tanggalpublikasi DESC
    LIMIT 5
");
?>

<section class="content">
  <div class="container-fluid">

    <!-- Judul Halaman -->
    <h4 class="mb-4 text-dark">
      <i class="fas fa-tachometer-alt me-2"></i> Selamat Datang di Dashboard
    </h4>

    <!-- Info Box -->
    <div class="row">
      <?php
      $cards = [
        ['bg' => 'bg-primary', 'icon' => 'fas fa-user-shield', 'label' => 'Admin', 'count' => $total_admin],
        ['bg' => 'bg-success', 'icon' => 'fas fa-briefcase', 'label' => 'Jabatan', 'count' => $total_jabatan],
        ['bg' => 'bg-warning text-dark', 'icon' => 'fas fa-tags', 'label' => 'Kategori', 'count' => $total_kategori],
        ['bg' => 'bg-info', 'icon' => 'fas fa-newspaper', 'label' => 'Konten', 'count' => $total_konten],
        ['bg' => 'bg-danger', 'icon' => 'fas fa-comments', 'label' => 'Komentar', 'count' => $total_komentar],
      ];

      foreach ($cards as $c) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
          <div class="info-box <?= $c['bg']; ?> text-white shadow-sm">
            <span class="info-box-icon"><i class="<?= $c['icon']; ?>"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?= $c['label']; ?></span>
              <span class="info-box-number"><?= $c['count']; ?></span>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Grafik dan Konten -->
    <div class="row mt-3">
      <!-- Grafik Konten per Kategori -->
      <div class="col-md-6 mb-4">
        <div class="card card-outline card-primary h-100 shadow-sm">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i> Statistik Konten per Kategori</h5>
          </div>
          <div class="card-body">
            <canvas id="chartKategori" height="180"></canvas>
          </div>
        </div>
      </div>

      <!-- Tabel Konten Terbaru -->
      <div class="col-md-6 mb-4">
        <div class="card card-outline card-success h-100 shadow-sm">
          <div class="card-header bg-success text-white">
            <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i> Konten Terbaru</h5>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped mb-0">
              <thead class="bg-light">
                <tr>
                  <th>Judul</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php if (mysqli_num_rows($konten_terbaru) > 0): ?>
                  <?php while ($k = mysqli_fetch_assoc($konten_terbaru)) { ?>
                    <tr>
                      <td><?= htmlspecialchars($k['judul']); ?></td>
                      <td><?= date('d M Y', strtotime($k['tanggalpublikasi'])); ?></td>
                    </tr>
                  <?php } ?>
                <?php else: ?>
                  <tr><td colspan="2" class="text-center text-muted py-3">Belum ada konten</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const ctx = document.getElementById('chartKategori');
  if (ctx) {
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode($kategori_nama); ?>,
        datasets: [{
          label: 'Jumlah Konten',
          data: <?= json_encode($kategori_jumlah); ?>,
          backgroundColor: 'rgba(0, 123, 255, 0.7)',
          borderColor: '#007bff',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: { precision: 0 }
          }
        },
        plugins: {
          legend: { display: false },
          title: { display: false }
        }
      }
    });
  }
});
</script>
