<?php
include_once __DIR__ . '/../../koneksi.php';

// Ambil data admin dan jabatan
$query = mysqli_query($koneksi, "
  SELECT a.*, j.namajabatan 
  FROM admin a 
  LEFT JOIN jabatan j ON a.idjabatan = j.idjabatan 
  ORDER BY a.namaadmin ASC
");
?>

<section class="content">
  <div class="card shadow-sm border-0">

    <!-- Header -->
    <div class="container-fluid">
  <div class="card shadow-sm">
    <div class="card-header bg-gradient-primary text-white">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="m-0"><i class="fas fa-book-reader me-2"></i> Daftar admin</h5>
        <a href="index.php?halaman=tambahadmin" class="btn btn-light btn-sm">
          <i class="fas fa-plus"></i> Tambah admin
        </a>
      </div>
    </div>

    <!-- Body -->
    <div class="card-body">
      <div class="row">
        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body text-center">
                
                <!-- Foto Admin -->
                <img src="foto/admin/<?= !empty($row['fotoadmin']) ? $row['fotoadmin'] : 'default-user.png'; ?>"
                     alt="Foto Admin"
                     class="rounded-circle mb-3 shadow"
                     width="100" height="100"
                     style="object-fit: cover; border: 3px solid #007bff;">

                <!-- Nama Admin -->
                <h6 class="fw-bold mb-1"><?= htmlspecialchars($row['namaadmin']); ?></h6>
                <p class="text-muted small mb-3">
                  <?= htmlspecialchars($row['namajabatan'] ?? 'Belum diatur'); ?>
                </p>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-center flex-wrap gap-2">
                  <a href="?halaman=tampiladmin&id=<?= base64_encode($row['idadmin']); ?>" 
                     class="btn btn-primary btn-sm">
                     <i class="fas fa-eye"></i> View
                  </a>

                  <a href="?halaman=editadmin&id=<?= base64_encode($row['idadmin']); ?>" 
                     class="btn btn-warning btn-sm text-white">
                     <i class="fas fa-edit"></i> Edit
                  </a>

             <a href="db/dbadmin.php?proses=hapus&id=<?= base64_encode($row['idadmin']); ?>"
   onclick="return confirm('Yakin ingin menghapus admin ini?');"
   class="btn btn-danger btn-sm">
   <i class="fas fa-trash"></i> Hapus
</a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

  </div>
</section>

