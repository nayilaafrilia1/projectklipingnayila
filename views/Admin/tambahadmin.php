<?php
// Pastikan koneksi ke database
include_once __DIR__ . '/../../koneksi.php';

// Ambil data jabatan untuk dropdown
$q_jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY namajabatan ASC");
?>

<section class="content">
  <div class="card shadow-sm border-0">
    
    <!-- Header Card -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h3 class="card-title m-0">
        <i class="fas fa-user-shield me-2"></i> Tambah Admin Baru
      </h3>
      <a href="index.php?halaman=admin" class="btn btn-light btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
      </a>
    </div>

    <!-- Form Tambah Admin -->
    <form action="db/dbadmin.php?proses=tambah" method="POST" enctype="multipart/form-data">
      <div class="card-body">

        <div class="form-group mb-3">
          <label class="fw-bold">Nama Admin</label>
          <input type="text" class="form-control" name="namaadmin"
                 placeholder="Masukkan nama admin" required>
        </div>

        <div class="form-group mb-3">
          <label class="fw-bold">Username</label>
          <input type="text" class="form-control" name="username"
                 placeholder="Masukkan username" required>
        </div>

        <div class="form-group mb-3">
          <label class="fw-bold">Password</label>
          <input type="password" class="form-control" name="password"
                 placeholder="Masukkan password" required>
        </div>

        <div class="form-group mb-3">
          <label class="fw-bold">Nomor HP</label>
          <input type="text" class="form-control" name="nohp"
                 placeholder="Masukkan nomor HP" required>
        </div>

        <div class="form-group mb-3">
          <label class="fw-bold">Email</label>
          <input type="email" class="form-control" name="email"
                 placeholder="Masukkan email admin" required>
        </div>

        <div class="form-group mb-3">
          <label class="fw-bold">Jabatan</label>
          <select name="idjabatan" class="form-control" required>
            <option value="">-- Pilih Jabatan --</option>
            <?php while ($j = mysqli_fetch_assoc($q_jabatan)) { ?>
              <option value="<?= $j['idjabatan']; ?>">
                <?= htmlspecialchars($j['namajabatan']); ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group mb-4">
          <label class="fw-bold">Foto Admin</label>
          <input type="file" class="form-control" name="fotoadmin" accept="image/*">
        </div>

      </div>

      <!-- Footer Card -->
      <div class="card-footer text-end">
        <button type="reset" class="btn btn-warning me-2">
          <i class="fas fa-retweet"></i> Reset
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> Simpan Admin
        </button>
      </div>
    </form>
  </div>
</section>
