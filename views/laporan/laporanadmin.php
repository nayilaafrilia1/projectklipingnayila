<?php
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

$query = mysqli_query($koneksi, "
    SELECT a.idadmin, a.namaadmin, a.username, a.nohp, a.email, j.namajabatan
    FROM admin a
    LEFT JOIN jabatan j ON a.idjabatan = j.idjabatan
    ORDER BY a.idadmin DESC
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
      <h3 class="card-title m-0"><i class="fas fa-users"></i> Laporan Data Admin</h3>
      <button onclick="window.print()" class="btn btn-light btn-sm btn-print">
        <i class="fas fa-print"></i> Cetak
      </button>
    </div>

    <div class="card-body">
      <table class="table table-bordered table-striped table-sm text-sm text-center">
        <thead class="bg-primary text-white">
          <tr>
            <th width="5%">No</th>
            <th>Nama Admin</th>
            <th>Jabatan</th>
            <th>Username</th>
            <th>No. HP</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1; 
          while ($row = mysqli_fetch_assoc($query)): 
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['namaadmin']); ?></td>
            <td><?= htmlspecialchars($row['namajabatan'] ?? '-'); ?></td>
            <td><?= htmlspecialchars($row['username']); ?></td>
            <td><?= htmlspecialchars($row['nohp'] ?? '-'); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
