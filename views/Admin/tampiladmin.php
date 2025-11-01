<?php
include_once __DIR__ . '/../../koneksi.php';

// Pastikan ada parameter id di URL
if (!isset($_GET['id'])) {
  echo "<script>alert('ID tidak ditemukan');window.location='?halaman=admin';</script>";
  exit;
}

$idadmin = base64_decode($_GET['id']);
$q = mysqli_query($koneksi, "
  SELECT a.*, j.namajabatan 
  FROM admin a 
  LEFT JOIN jabatan j ON a.idjabatan = j.idjabatan 
  WHERE a.idadmin='$idadmin'
");
$data = mysqli_fetch_assoc($q);

// Jika data tidak ditemukan
if (!$data) {
  echo "<script>alert('Data tidak ditemukan');window.location='?halaman=admin';</script>";
  exit;
}
?>

<section class="content">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><i class="fas fa-user-shield"></i> Tampil Admin</h5>
    
     
    </div>

    <div class="card-body">
      <div class="row">
        <!-- Bagian Foto dan Nama -->
        <div class="col-md-4 text-center">
          <img src="foto/admin/<?= !empty($data['fotoadmin']) ? $data['fotoadmin'] : 'default-user.png'; ?>" 
               class="img-circle mb-3 shadow" width="150" height="150" alt="Foto Admin">
          <h5 class="fw-bold"><?= htmlspecialchars($data['namaadmin']); ?></h5>
          <span class="badge bg-success px-3 py-2">Admin</span>
        </div>

        <!-- Bagian Detail -->
        <div class="col-md-8">
          <table class="table table-bordered table-striped">
            <tr>
              <th width="30%"><i class="fas fa-user"></i> Nama</th>
              <td><?= htmlspecialchars($data['namaadmin']); ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-user-tag"></i> Username</th>
              <td><?= htmlspecialchars($data['username']); ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-envelope"></i> Email</th>
              <td><?= htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-phone"></i> No HP</th>
              <td><?= htmlspecialchars($data['nohp']); ?></td>
            </tr>
            <tr>
              <th><i class="fas fa-briefcase"></i> Jabatan</th>
              <td><?= htmlspecialchars($data['namajabatan'] ?? '-'); ?></td>
            </tr>
          </table>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="mt-4 text-center">
        <!-- 🔸 Tombol Edit Profil -->
        <a href="?halaman=editadmin&id=<?= base64_encode($data['idadmin']); ?>" class="btn btn-warning me-2">
          <i class="fas fa-edit"></i> Edit Profil
        </a>

        <!-- 🔹 Tombol Kembali -->
        <a href="?halaman=admin" class="btn btn-danger">
          <i class="fas fa-arrow-left"></i> Kembali ke Daftar Admin
        </a>
      </div>
    </div>
  </div>
</section>
