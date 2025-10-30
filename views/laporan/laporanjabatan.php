<?php
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

$query = mysqli_query($koneksi, "
    SELECT idjabatan, namajabatan
    FROM jabatan
    ORDER BY idjabatan ASC
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
      <h3 class="card-title m-0"><i class="fas fa-briefcase"></i> Laporan Data Jabatan</h3>
      <button onclick="window.print()" class="btn btn-light btn-sm btn-print">
        <i class="fas fa-print"></i> Cetak
      </button>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-striped table-sm text-sm text-center">
        <thead class="bg-primary text-white">
          <tr>
            <th width="5%">No</th>
            <th>Nama Jabatan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1; 
          while ($row = mysqli_fetch_assoc($query)): 
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['namajabatan']); ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
