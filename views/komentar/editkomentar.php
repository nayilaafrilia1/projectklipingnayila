<?php
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

$idkomentar = $_GET['idkomentar'] ?? null;
if (!$idkomentar) {
    echo "<p style='color:red;'>ID Komentar tidak ditemukan!</p>";
    exit;
}

$query = "SELECT * FROM komentar WHERE idkomentar = '$idkomentar'";
$result = mysqli_query($koneksi, $query);
$komentar = mysqli_fetch_assoc($result);
?>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">Edit Komentar</h3>
        </div>
        <form action="db/dbkomentar.php?proses=edit" method="POST">
            <div class="card-body">
                <input type="hidden" name="idkomentar" value="<?= htmlspecialchars($komentar['idkomentar']); ?>">
                <div class="form-group mb-3">
                    <label class="fw-bold">Isi Komentar</label>
                    <textarea name="isikomentar" class="form-control" rows="4" required><?= htmlspecialchars($komentar['isikomentar']); ?></textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="index.php?halaman=komentar" class="btn btn-secondary ml-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</section>
