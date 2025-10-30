<?php
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

$query = mysqli_query($koneksi, "
    SELECT k.idkonten, k.judul, k.tanggalpublikasi, 
           ka.namakategori, a.namaadmin
    FROM konten k
    LEFT JOIN kategori ka ON k.idkategori = ka.idkategori
    LEFT JOIN admin a ON k.idadmin = a.idadmin
    ORDER BY k.idkonten DESC
");
?>

<section class="content">
  <style>
    table th, table td {
      text-align: center !important;
      vertical-align: middle !important;
    }
    .card-header .btn-print {
      margin-left: auto; /* dorong tombol ke kanan */
    }
  </style>

  <div class="card shadow-sm">
    <div class="card-header bg-gradient-primary text-white d-flex align-items-center">
      <h3 class="card-title m-0"><i class="fas fa-newspaper"></i> Laporan Data Konten</h3>
      <button onclick="window.print()" class="btn btn-light btn-sm btn-print">
        <i class="fas fa-print"></i> Cetak
      </button>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-striped table-sm text-sm text-center">
        <thead class="bg-primary text-white">
          <tr>
            <th width="5%">No</th>
            <th>Judul Konten</th>
            <th>Kategori</th>
            <th>Admin Pembuat</th>
            <th>Tanggal Publikasi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1; 
          while ($row = mysqli_fetch_assoc($query)): 
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['judul']); ?></td>
            <td><?= htmlspecialchars($row['namakategori'] ?? '-'); ?></td>
            <td><?= htmlspecialchars($row['namaadmin'] ?? '-'); ?></td>
            <td><?= htmlspecialchars($row['tanggalpublikasi']); ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
