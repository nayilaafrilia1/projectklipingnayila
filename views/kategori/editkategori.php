<?php
// Pastikan koneksi ke database
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

// Ambil ID dari URL
$idkategori = $_GET['idkategori'] ?? null;

if (!$idkategori) {
    echo "<p style='color:red;'>ID Kategori tidak ditemukan di URL.</p>";
    exit;
}

// Ambil data kategori berdasarkan idkategori
$query = "SELECT * FROM kategori WHERE idkategori = '$idkategori'";
$result = mysqli_query($koneksi, $query);
$kategori = mysqli_fetch_assoc($result);

if (!$kategori) {
    echo "<p style='color:red;'>Data kategori tidak ditemukan!</p>";
    exit;
}
?>

<section class="content">

    <div class="card shadow-sm">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">Edit Kategori: <?= htmlspecialchars($kategori['namakategori']); ?></h3>
        </div>

        <form action="db/dbkategori.php?proses=edit" method="POST">
            <div class="card-body">

                <input type="hidden" name="idkategori" value="<?= htmlspecialchars($kategori['idkategori']); ?>">

                <div class="form-group mb-3">
                    <label class="fw-bold">Nama Kategori</label>
                    <input type="text" class="form-control" name="namakategori" 
                           value="<?= htmlspecialchars($kategori['namakategori']); ?>" required>
                </div>

            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="index.php?halaman=kategori" class="btn btn-secondary ml-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</section>
