<?php
include_once __DIR__ . '/../../koneksi.php';

// Cek apakah ada parameter id terenkripsi
if (!isset($_GET['id'])) {
    die('ID Admin tidak ditemukan.');
}

// Dekripsi base64 dan validasi angka
$encodedId = $_GET['id'];
$decodedId = base64_decode($encodedId, true);
if ($decodedId === false || !is_numeric($decodedId)) {
    die('ID Admin tidak valid.');
}

$idadmin = intval($decodedId); // konversi ke integer agar aman

// Ambil data admin dari database
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin = $idadmin");
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}
$data = mysqli_fetch_assoc($query);
if (!$data) {
    die("Data admin tidak ditemukan.");
}

// Ambil semua data jabatan
$q_jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY namajabatan ASC");
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><i class="fas fa-user-edit"></i> Edit Admin</h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card shadow-sm p-4 border-0">
        <form action="db/dbadmin.php?proses=edit" method="post" enctype="multipart/form-data">

          <!-- ID disimpan dalam hidden input -->
          <input type="hidden" name="idadmin" value="<?= $data['idadmin']; ?>">

          <!-- Nama Admin -->
          <div class="form-group mb-3">
            <label class="fw-semibold">Nama Admin</label>
            <input type="text" name="namaadmin" class="form-control"
                   value="<?= htmlspecialchars($data['namaadmin']); ?>" required>
          </div>

          <!-- Username -->
          <div class="form-group mb-3">
            <label class="fw-semibold">Username</label>
            <input type="text" name="username" class="form-control"
                   value="<?= htmlspecialchars($data['username']); ?>" required>
          </div>

          <!-- Password -->
          <div class="form-group mb-3">
            <label class="fw-semibold">Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••">
          </div>

          <!-- No HP -->
          <div class="form-group mb-3">
            <label class="fw-semibold">No. HP</label>
            <input type="text" name="nohp" class="form-control"
                   value="<?= htmlspecialchars($data['nohp']); ?>" required>
          </div>

          <!-- Email -->
          <div class="form-group mb-3">
            <label class="fw-semibold">Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= htmlspecialchars($data['email']); ?>" required>
          </div>

          <!-- Jabatan -->
          <div class="form-group mb-3">
            <label class="fw-semibold">Jabatan</label>
            <select name="idjabatan" class="form-control" required>
              <option value="">-- Pilih Jabatan --</option>
              <?php while ($j = mysqli_fetch_assoc($q_jabatan)) { ?>
                <option value="<?= $j['idjabatan']; ?>"
                  <?= ($data['idjabatan'] == $j['idjabatan']) ? 'selected' : ''; ?>>
                  <?= htmlspecialchars($j['namajabatan']); ?>
                </option>
              <?php } ?>
            </select>
          </div>

          <!-- Foto Admin -->
          <div class="form-group mb-3">
            <label class="fw-semibold">Foto Admin</label>
            <input type="file" name="fotoadmin" class="form-control">
            <?php 
              $fotoPath = !empty($data['fotoadmin']) && file_exists(__DIR__ . "/../../foto/admin/" . $data['fotoadmin'])
                ? "foto/admin/" . $data['fotoadmin']
                : "dist/img/default-user.png";
            ?>
            <div class="mt-2">
              <img src="<?= htmlspecialchars($fotoPath); ?>" 
                   height="100" class="rounded border">
            </div>
          </div>

          <!-- Tombol Aksi -->
          <div class="mt-4">
            <button type="submit" class="btn btn-warning">
              <i class="fas fa-save"></i> Update
            </button>
            <a href="index.php?halaman=admin" class="btn btn-secondary">
              <i class="fas fa-arrow-left"></i> Batal
            </a>
          </div>

        </form>
      </div>
    </div>
  </section>
</div>
