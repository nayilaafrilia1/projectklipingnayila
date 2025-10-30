<?php
// Pastikan koneksi ke database
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

// Ambil ID dari URL
$idjabatan = $_GET['idjabatan'] ?? null;

if (!$idjabatan) {
    echo "<p style='color:red;'>ID Jabatan tidak ditemukan di URL.</p>";
    exit;
}

// Ambil data jabatan berdasarkan idjabatan
$query = "SELECT * FROM jabatan WHERE idjabatan = '$idjabatan'";
$result = mysqli_query($koneksi, $query);
$jabatan = mysqli_fetch_assoc($result);

if (!$jabatan) {
    echo "<p style='color:red;'>Data jabatan tidak ditemukan!</p>";
    exit;
}
?>

<section class="content">

    <div class="card shadow-sm">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">Edit Jabatan: <?= htmlspecialchars($jabatan['namajabatan']); ?></h3>
        </div>

        <form action="db/dbjabatan.php?proses=edit" method="POST">
            <div class="card-body">

                <input type="hidden" name="idjabatan" value="<?= htmlspecialchars($jabatan['idjabatan']); ?>">

                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Jabatan</label>
                    <input type="text" class="form-control" name="namajabatan" 
                           value="<?= htmlspecialchars($jabatan['namajabatan']); ?>" required>
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="index.php?halaman=jabatan" class="btn btn-secondary ml-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</section>
